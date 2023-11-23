<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('auth.Bottomadmin.manage_usr');
    }

    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        Pengguna::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('auth.Bottomadmin.index')
        ->withSuccess('User has been successfully registered!');
    }
}
