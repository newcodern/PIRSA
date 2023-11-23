<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Pengguna;
use App\Models\Kim;
use App\Models\IdDriver;
use App\Models\SPBE;
use App\Models\Kendaraan;
use App\Imports\SPBE_imports;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class KontrollerUtama extends Controller
{
        public function store_pengguna(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        DB::table('penggunas')->insert([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        $credentials = $request->only('name', 'password');
        Auth::guard('AbottomAdmin');
        $request->session()->regenerate();
        return redirect()->route('auth.Bottomadmin.index')
        ->withSuccess('You have successfully registered & logged in!');
    }

    public function auth_main(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        if($request->role == 'AbottomAdmin'){
        Auth::guard('AbottomAdmin')->attempt($credentials);
        return redirect()->route('auth.Bottomadmin.index');
        }elseif($request->role == 'security'){
        Auth::guard('ASecurity')->attempt($credentials); 
        return redirect()->route('auth.ASecurity.index');
        }
    }

    public function logout_main(Request $request)
    {
        if(Auth::guard('AbottomAdmin')->check()){
        Auth::guard('AbottomAdmin')->logout();
        return redirect()->route('auth.main');
        }elseif(Auth::guard('ASecurity')->check()){
        Auth::guard('ASecurity')->logout();
        return redirect()->route('auth.main');
        }
    }
   
// ADMIN LEVEL 2 // 
    public function auth_main_login_OR_register()
    {
        return view('auth.auth_page');
    }

    public function dashboard_BottomAdmin()
    {
        return view('auth.Bottomadmin.index');
    }

    public function dashboard_BottomAdmin_mgUSR()
    {
        return view('auth.Bottomadmin.manage_usr');
    }

    public function dashboard_BottomAdmin_mgKIMandID_D()
    {
        $Selection_IdDriver = IdDriver::all()->sortByDesc('id');
        $Kims_All = Kim::all()->sortByDesc('id');
        return view('auth.Bottomadmin.manage_id_kim_driver', compact('Kims_All', 'Selection_IdDriver'));
    }

    public function dashboard_BottomAdmin_mgIDDriver()
    {
        $IdDriver = IdDriver::all()->sortByDesc('id');
        return view('auth.Bottomadmin.manage_id_driver', compact('IdDriver'));
    }

    public function auth_BA_store_kim(Request $request)
    {
        $request->validate([
            'nama_pt' => 'required|string',
            'jenis_produk' => 'required|string',
            'kaspasitas_tangki' => 'required|string',
            'nopol' => 'required|string',
            'urut' => 'required|string',
            'masa_berlaku' => 'required|string',
            'searcher' => 'required|string',
        ]);
        if (!empty($request->input('searcher'))) {
        $Final_Selection_IdDriver = IdDriver::where('id_driver', $request->input('searcher'))->first();

        $Kims = new Kim();
        $Kims->nama_pt = $request->input('nama_pt');
        $Kims->jenis_produk = $request->input('jenis_produk');
        $Kims->kaspasitas_tangki = $request->input('kaspasitas_tangki');
        $Kims->nopol = $request->input('nopol');
        $Kims->urut = $request->input('urut');
        $Kims->nama_driver = $Final_Selection_IdDriver->nama;
        $Kims->id_driver = $Final_Selection_IdDriver->id_driver;
        $Kims->masa_berlaku = $request->input('masa_berlaku');
        $Kims->save();
        return redirect()->intended('/auth/dashboard/manage/KIMandID')->with('success', 'Row added successfully');

    } else {
       return redirect()->route('auth.Bottomadmin.index.manage.KIMandID.add')->with('error', 'all field is required');
    }
    }


    public function auth_BA_store_iddriver(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat' => 'required|string',
            'tanggal' => 'required|string',
            'no_sim' => 'required|string',
        ]);

    function generateUniqueString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $uniqueString = '';
    
    for ($i = 0; $i < $length; $i++) {
        $randomChar = $characters[rand(0, strlen($characters) - 1)];
        $uniqueString .= $randomChar;
    }
    
    return $uniqueString;
    }
    $uniqueCode = generateUniqueString(10);

        $IdDriver = new IdDriver();
        $IdDriver->nama = $request->input('nama');
        $IdDriver->ttl = $request->input('tempat').', '. $request->input('tanggal');
        $IdDriver->no_sim = $request->input('no_sim');
        $IdDriver->id_driver = $uniqueCode;

        $IdDriver->save();
        return redirect()->intended('/auth/dashboard/manage/IdDriver')->with('success', 'Id Driver Berhasil Ditambahkan');
    }


    public function dashboard_BottomAdmin_mgIDDriver_add()
    {
        return view('auth.Bottomadmin.add_id_driver');
    }

    public function dashboard_BottomAdmin_mgSPBE_add()
    {
        return view('auth.Bottomadmin.spbe_add');
    }

    public function dashboard_BottomAdmin_mgSPBE()
    {
        $view_SPBE = SPBE::all()->sortByDesc('id');
        return view('auth.Bottomadmin.spbe_manage', compact('view_SPBE'));
    }

    public function dashboard_BottomAdmin_mgSPBE_add_POST(Request $request)
{
    $company = new SPBE;
    $company->nama_pt = $request->input('namaPt');
    $company->kode_spbe = $request->input('kodeSpbe');
    $company->alamat = $request->input('alamat');
    $company->kota = $request->input('kota');
    $company->no_ref = $request->input('noRef');
    $company->cust_no = $request->input('custNo');
    $company->patra_ref = $request->input('patraRef');
    $company->save();

    return redirect()->route('auth.Bottomadmin.index.manage.SPBE')->with('success', 'Company has been added');
}


    public function BA_rm_id_driver(Request $request, $id)
    {
    $selector_rm = IdDriver::where('id_driver', $id)->first();
    $selector_rm_KIM = Kim::where('id_driver', $id)->first();
    if(isset($selector_rm_KIM)){
    if ($selector_rm) {
        $selector_rm->delete();
        $selector_rm_KIM->delete();

    return redirect()->route('auth.Bottomadmin.index.manage.mgIDDriver')->with('success', 'Row deleted successfully');
    } else {
    return redirect()->route('auth.Bottomadmin.index.manage.mgIDDriver')->with('error', 'Row not found');
    }
    }elseif(!isset($selector_rm_KIM)){
    if ($selector_rm) {
        $selector_rm->delete();

    return redirect()->route('auth.Bottomadmin.index.manage.mgIDDriver')->with('success', 'Row deleted successfully');
    } else {
    return redirect()->route('auth.Bottomadmin.index.manage.mgIDDriver')->with('error', 'Row not found');
    }
    }
    }

    public function BA_id_driver_edit(Request $request, $id)
    {
    $request->validate([
            'nama' => 'required|string|max:255',
            'tempat' => 'required|string',
            'tanggal' => 'required|string',
            'no_sim' => 'required|string',
    ]);
    $row = IdDriver::where('id_driver', $id)->first();

    if ($row) {
        $row->update([
            'nama' => $request->input('nama'),
            'ttl' => $request->input('tempat').', '. $request->input('tanggal'),
            'no_sim' => $request->input('no_sim'),
        ]);

        return redirect()->route('auth.Bottomadmin.index.manage.mgIDDriver')->with('success', 'Row updated successfully');
    } else {
        return redirect()->route('auth.Bottomadmin.index.manage.mgIDDriver')->with('error', 'Row not found');
    }
    }
    public function BA_rm_kim(Request $request, $id)
    {
    $selector_rm_KIM = Kim::where('id', $id)->first();
    if ($selector_rm_KIM) {
    $selector_rm_KIM->delete();

    return redirect()->route('auth.Bottomadmin.index.manage.KIMandID')->with('success', 'Row deleted successfully');
    } else {
    return redirect()->route('auth.Bottomadmin.index.manage.KIMandID')->with('error', 'Row not found');
    }

    }

    public function dashboard_BottomAdmin_mgKIMandID_add()
    {
        $Selection_IdDriver_add = IdDriver::all()->sortByDesc('id');
        $Selection_Kendaraan_add = Kendaraan::all()->sortByDesc('id');
        $Selection_Perseroan_Terbatas = SPBE::all()->sortByDesc('id');
        return view('auth.Bottomadmin.add_kim', compact('Selection_IdDriver_add', 'Selection_Kendaraan_add', 'Selection_Perseroan_Terbatas'));
    }

    public function importExcel_SPBE(Request $request)
    {
    $request->validate([
        'file' => 'required|mimes:xlsx,csv',
    ]);

    Excel::import(new SPBE_imports, $request->file('file'));

    return redirect()->route('auth.Bottomadmin.index.manage.SPBE')->with('success', 'Data imported successfully');
    }

    public function dashboard_BottomAdmin_insert_add_kendaraan()
    {
        return view('auth.Bottomadmin.kendaraan_add');
    }
    public function dashboard_BottomAdmin_view_kendaraan()
    {
        $Kendaraan_view = Kendaraan::all()->sortByDesc('id');
        return view('auth.Bottomadmin.kendaraan_manage', compact('Kendaraan_view'));
    }

    public function dashboard_BottomAdmin_insert_run_kendaraan(Request $request)
    {
    $request->validate([
        'nopol' => 'required',
        'kir_headtruck' => 'required',
        'kaspasitas_tangki' => 'required',
    ]);
    Kendaraan::create([
        'Nopol' => $request->input('nopol'),
        'KIR_Headtruck' => $request->input('kir_headtruck'),
        'Kapasitas_Tangki' => $request->input('kaspasitas_tangki'),
    ]);
    return redirect()->route('auth.Bottomadmin.index.manage.kendaraan.add')->with('success', 'Record created successfully!');
    }

// ADMIN LEVEL 2 END// 

// SECURITY //
    public function dashboard_ASecurity()
    {
        return view('auth.ASecurity.index');
    }

// SECURITY END //

}
