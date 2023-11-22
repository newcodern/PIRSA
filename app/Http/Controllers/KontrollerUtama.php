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
            'masa_berlaku' => 'required|string',
            'noKIM' => 'required|string|unique:kims,noKIM',
        ]);
        if (!empty($request->input('searcher'))) {
        $Final_Selection_IdDriver = IdDriver::where('id_driver', $request->input('searcher'))->first();

        $Kims = new Kim();
        $Kims->nama = $Final_Selection_IdDriver->nama;
        $Kims->berlaku = $request->input('masa_berlaku');
        $Kims->ttl = $Final_Selection_IdDriver->ttl;
        $Kims->noKIM = $request->input('noKIM');
        $Kims->foto = $Final_Selection_IdDriver->foto;
        $Kims->id_driver = $Final_Selection_IdDriver->id_driver;
        $Kims->save();
        return redirect()->intended('/auth/dashboard/manage/KIMandID')->with('success', 'Row deleted successfully');

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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        $imageName = time().'.'.$request->foto->extension();  
         
        $request->foto->move(public_path('uploads'), $imageName);

        $IdDriver = new IdDriver();
        $IdDriver->nama = $request->input('nama');
        $IdDriver->ttl = $request->input('tempat').', '. $request->input('tanggal');
        $IdDriver->foto = $imageName;
        $IdDriver->id_driver = $uniqueCode;

        $IdDriver->save();
        return redirect()->intended('/auth/dashboard/manage/IdDriver')->with('success', 'Id Driver Berhasil Ditambahkan');
    }


    public function dashboard_BottomAdmin_mgIDDriver_add()
    {
        return view('auth.Bottomadmin.add_id_driver');
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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $row = IdDriver::where('id_driver', $id)->first();

    $imageName = time().'.'.$request->foto->extension();  
         
    $request->foto->move(public_path('uploads'), $imageName);

    if ($row) {
        $row->update([
            'nama' => $request->input('nama'),
            'ttl' => $request->input('tempat').', '. $request->input('tanggal'),
            'foto' => $imageName,
        ]);

        return redirect()->route('auth.Bottomadmin.index.manage.mgIDDriver')->with('success', 'Row updated successfully');
    } else {
        return redirect()->route('auth.Bottomadmin.index.manage.mgIDDriver')->with('error', 'Row not found');
    }
    }
    public function BA_rm_kim(Request $request, $id)
    {
    $selector_rm_KIM = Kim::where('noKIM', $id)->first();
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
        return view('auth.Bottomadmin.add_kim', compact('Selection_IdDriver_add'));
    }

// ADMIN LEVEL 2 END// 

// SECURITY //
    public function dashboard_ASecurity()
    {
        return view('auth.ASecurity.index');
    }

// SECURITY END //

}
