<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontrollerUtama;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/auth/', [KontrollerUtama::class, 'auth_main_login_OR_register'])->name('auth.main');
    Route::post('/auth/send/login', [KontrollerUtama::class, 'auth_BA'])->name('auth.send.login');
}); 


Route::middleware(['auth:AbottomAdmin', 'AbottomAdmin'])->group(function () {
    Route::get('/auth/dashboard/', [KontrollerUtama::class, 'dashboard_BottomAdmin'])->name('auth.Bottomadmin.index');

    Route::get('/auth/dashboard/manage/users', [KontrollerUtama::class, 'dashboard_BottomAdmin_mgUSR'])->name('auth.Bottomadmin.index.manage.users');

    Route::get('/auth/dashboard/manage/KIMandID', [KontrollerUtama::class, 'dashboard_BottomAdmin_mgKIMandID_D'])->name('auth.Bottomadmin.index.manage.KIMandID');

    Route::get('/auth/dashboard/manage/IdDriver', [KontrollerUtama::class, 'dashboard_BottomAdmin_mgIDDriver'])->name('auth.Bottomadmin.index.manage.mgIDDriver');

    Route::post('/auth/dashboard/manage/KIMandID/store/kim', [KontrollerUtama::class, 'auth_BA_store_kim'])->name('auth.Bottomadmin.index.manage.KIMandID.store');

    Route::post('/auth/dashboard/manage/IdDriver/store/id', [KontrollerUtama::class, 'auth_BA_store_iddriver'])->name('auth.Bottomadmin.index.manage.IdDriver.store');

    Route::get('/auth/dashboard/manage/IdDriver/add', [KontrollerUtama::class, 'dashboard_BottomAdmin_mgIDDriver_add'])->name('auth.Bottomadmin.index.manage.mgIDDriver.add');

    Route::get('/auth/dashboard/manage/KIMandID/add', [KontrollerUtama::class, 'dashboard_BottomAdmin_mgKIMandID_add'])->name('auth.Bottomadmin.index.manage.KIMandID.add');

    Route::post('/auth/dashboard/logout', [KontrollerUtama::class, 'logout_auth_BA'])->name('auth.Bottomadmin.logout');
    Route::post('/auth/send/add/user', [KontrollerUtama::class, 'store_pengguna'])->name('auth.send.add');
});