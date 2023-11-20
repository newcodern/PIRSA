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

class KontrollerUtama extends Controller
{
    
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

    public function store_pengguna(Request $request)
    {

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


        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        DB::table('penggunas')->insert([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'key' => $uniqueCode
        ]);

        $credentials = $request->only('name', 'password');
        Auth::guard('AbottomAdmin');
        $request->session()->regenerate();
        return redirect()->route('auth.Bottomadmin.index')
        ->withSuccess('You have successfully registered & logged in!');
    }

    public function auth_BA(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        
        Auth::guard('AbottomAdmin')->attempt($credentials);
        return redirect()->intended('/auth/dashboard/');
    }

        public function logout_auth_BA(Request $request)
    {
        Auth::guard('AbottomAdmin')->logout();
        return redirect()->intended('/auth/');
    }

    public function auth_BA_store_kim(Request $request)
    {
        $request->validate([
            'masa_berlaku' => 'required|string',
            'noKIM' => 'required|string|unique:kims,noKIM',
        ]);

        $Final_Selection_IdDriver = IdDriver::where('id_driver', $request->input('searcher'))->first();

        $Kims = new Kim();
        $Kims->nama = $Final_Selection_IdDriver->nama;
        $Kims->berlaku = $request->input('masa_berlaku');
        $Kims->ttl = $Final_Selection_IdDriver->ttl;
        $Kims->jenis_kelamin = $Final_Selection_IdDriver->jenis_kelamin;
        $Kims->tinggi = $Final_Selection_IdDriver->tinggi;
        $Kims->noKIM = $request->input('noKIM');
        $Kims->foto = $Final_Selection_IdDriver->foto;
        $Kims->save();
        return redirect()->intended('/auth/dashboard/manage/KIMandID');
    }


    public function auth_BA_store_iddriver(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat' => 'required|string',
            'tanggal' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tinggi_badan' => 'required|string',
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
        $IdDriver->jenis_kelamin = $request->input('jenis_kelamin');
        $IdDriver->tinggi = $request->input('tinggi_badan');
        $IdDriver->foto = $imageName;
        $IdDriver->id_driver = $uniqueCode;

        $IdDriver->save();
        return redirect()->intended('/auth/dashboard/manage/IdDriver');
    }


    public function dashboard_BottomAdmin_mgIDDriver_add()
    {
        return view('auth.Bottomadmin.add_id_driver');
    }

    public function dashboard_BottomAdmin_mgKIMandID_add()
    {
        $Selection_IdDriver_add = IdDriver::all()->sortByDesc('id');
        return view('auth.Bottomadmin.add_kim', compact('Selection_IdDriver_add'));
    }


}
