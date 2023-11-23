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
    Route::post('/auth/send/login', [KontrollerUtama::class, 'auth_main'])->name('auth.send.login');
}); 

// ADMIN LEVEL 2 //
Route::middleware(['auth:AbottomAdmin', 'AbottomAdmin'])->group(function () {
    Route::post('/auth/dashboard/logout/admin', [KontrollerUtama::class, 'logout_main'])->name('auth.Bottomadmin.logout');
    Route::get('/auth/dashboard/admin', [KontrollerUtama::class, 'dashboard_BottomAdmin'])->name('auth.Bottomadmin.index');

    Route::get('/auth/dashboard/manage/users', [KontrollerUtama::class, 'dashboard_BottomAdmin_mgUSR'])->name('auth.Bottomadmin.index.manage.users');

    Route::get('/auth/dashboard/manage/KIMandID', [KontrollerUtama::class, 'dashboard_BottomAdmin_mgKIMandID_D'])->name('auth.Bottomadmin.index.manage.KIMandID');

    Route::post('auth/dashboard/manage/KIMandID/remove/{id}', [KontrollerUtama::class, 'BA_rm_kim'])->name('auth.Bottomadmin.index.manage.KIMandID.remove');

    Route::get('/auth/dashboard/manage/IdDriver', [KontrollerUtama::class, 'dashboard_BottomAdmin_mgIDDriver'])->name('auth.Bottomadmin.index.manage.mgIDDriver');

    Route::post('/auth/dashboard/manage/IdDriver/update/{id}', [KontrollerUtama::class, 'BA_id_driver_edit'])->name('auth.Bottomadmin.index.manage.mgIDDriver.update');

    Route::post('/auth/dashboard/manage/KIMandID/store/kim', [KontrollerUtama::class, 'auth_BA_store_kim'])->name('auth.Bottomadmin.index.manage.KIMandID.store');

    Route::post('/auth/dashboard/manage/IdDriver/store/id', [KontrollerUtama::class, 'auth_BA_store_iddriver'])->name('auth.Bottomadmin.index.manage.IdDriver.store');

    Route::get('/auth/dashboard/manage/IdDriver/add', [KontrollerUtama::class, 'dashboard_BottomAdmin_mgIDDriver_add'])->name('auth.Bottomadmin.index.manage.mgIDDriver.add');

    Route::post('auth/dashboard/manage/IdDriver/remove/{id}', [KontrollerUtama::class, 'BA_rm_id_driver'])->name('auth.Bottomadmin.index.manage.mgIDDriver.remove');

    Route::get('/auth/dashboard/manage/KIMandID/add', [KontrollerUtama::class, 'dashboard_BottomAdmin_mgKIMandID_add'])->name('auth.Bottomadmin.index.manage.KIMandID.add');

    Route::get('/auth/dashboard/manage/SPBE/add', [KontrollerUtama::class, 'dashboard_BottomAdmin_mgSPBE_add'])->name('auth.Bottomadmin.index.manage.SPBE.add');

    Route::post('/auth/dashboard/manage/SPBE/add/post', [KontrollerUtama::class, 'dashboard_BottomAdmin_mgSPBE_add_POST'])->name('auth.Bottomadmin.index.manage.SPBE.POST');

    Route::get('/auth/dashboard/manage/SPBE/', [KontrollerUtama::class, 'dashboard_BottomAdmin_mgSPBE'])->name('auth.Bottomadmin.index.manage.SPBE');

    Route::post('/auth/dashboard/manage/SPBE/import-excel', [KontrollerUtama::class, 'importExcel_SPBE'])->name('auth.Bottomadmin.index.manage.SPBE.importExcel');

    Route::get('/auth/dashboard/manage/kendaraan/add', [KontrollerUtama::class, 'dashboard_BottomAdmin_insert_add_kendaraan'])->name('auth.Bottomadmin.index.manage.kendaraan.add');

    Route::get('/auth/dashboard/manage/kendaraan/view', [KontrollerUtama::class, 'dashboard_BottomAdmin_view_kendaraan'])->name('auth.Bottomadmin.index.manage.kendaraan.view');

    Route::post('/auth/dashboard/manage/kendaraan/add/run', [KontrollerUtama::class, 'dashboard_BottomAdmin_insert_run_kendaraan'])->name('auth.Bottomadmin.index.manage.kendaraan.add.run');


    Route::post('/auth/send/add/user', [KontrollerUtama::class, 'store_pengguna'])->name('auth.send.add');
});
// ADMIN LEVEL 2 END //

// SECURITY //
Route::middleware(['auth:ASecurity', 'ASecurity'])->group(function () {
    Route::post('/auth/dashboard/logout/security', [KontrollerUtama::class, 'logout_main'])->name('auth.ASecurity.logout');
    Route::get('/auth/dashboard/security', [KontrollerUtama::class, 'dashboard_ASecurity'])->name('auth.ASecurity.index');
});
// SECURITY END //