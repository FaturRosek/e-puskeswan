<?php

use App\Http\Controllers\Pencatatan\PencatatanController;
use App\Models\Pencatatan\GoodsHandoverDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImpersonateController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Cms\NewsController;
use App\Http\Controllers\Master\BarangController;
use App\Http\Controllers\Master\SatuanController;
use App\Http\Controllers\Master\PengadaanController;
use App\Http\Controllers\Master\PuskeswanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Pencatatan\GudangController;
use App\Http\Controllers\Setting\VeterinaryProfileController;
use App\Http\Controllers\setting\PilihanController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Setting\BerandaController;
use App\Http\Controllers\Master\JenisController;
use App\Http\Controllers\Pencatatan\serahTerimaController;
use App\Http\Controllers\Pencatatan\StokBarangController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\DashboardPuskeswanController;
use App\Http\Controllers\ProfilPuskeswanController;
use App\Http\Controllers\Setting\AnnouncementController;
use App\Http\Controllers\Setting\ContactController;
use App\Http\Controllers\Setting\StatistikController;

Auth::routes();
Route::get('/end-impersonation', [ImpersonateController::class, 'leaveImpersonation'])->name('leaveImpersonation');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    require_once __DIR__ . '/route/master.php';
    require_once __DIR__ . '/route/cms.php';
    require_once __DIR__ . '/route/setting.php';
});

Route::get('/', [LandingPageController::class, 'index'])->name('landing.home');

Route::get('/auth_login', function () {
    return view('auth.login');
});

Route::get('/export', [serahTerimaController::class, 'export']);

Route::group(['middleware' => ['auth', 'checkrole:1,2']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/redirect', [RedirectController::class, 'cek']);
    Route::resource('/pencatatan', PencatatanController::class);
    Route::get('/pencatatan/export/excel', [PencatatanController::class, 'export'])->name('export');
    Route::post('/store', [serahTerimaController::class, 'store']);
    Route::post('/file', [serahTerimaController::class, 'file'])->name('file');
    Route::resource('/stokBarang', StokBarangController::class);
    // Srahterima
    Route::resource('/serahterima', serahTerimaController::class);
    Route::post('/add', [serahTerimaController::class, 'add'])->name('serahterima.add');
    Route::delete('/delete/{id}', [serahTerimaController::class, 'delete'])->name('goods.delete');
    Route::post('/save', [serahTerimaController::class, 'saveDatabase'])->name('goods.save');
    Route::get('/export-pdf/{id}', [serahTerimaController::class, 'export_pdf'])->name('serahterima.export_pdf');
    Route::put('/serahterima/{id}', [serahTerimaController::class, 'update'])->name('handover.update');
    Route::get('serahTerima/export', [serahTerimaController::class, 'excel'])->name('serahTerima.export');
    Route::resource('/stokBarang', StokBarangController::class);

});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'dologin']);
});

Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/barang', BarangController::class);
    Route::resource('/satuan', SatuanController::class);
    Route::resource('/pengadaan', PengadaanController::class);
    Route::resource('/gudang', GudangController::class);
    Route::resource('/user-list', UserController::class)->names('user-list');
    Route::resource('/role', RoleController::class);
    Route::resource('/puskeswans', PuskeswanController::class);
    Route::resource('pilihans', PilihanController::class);
    Route::resource('pilihans', PilihanController::class);
    Route::resource('/berita', NewsController::class);
    Route::resource('/profile', VeterinaryProfileController::class);
    Route::resource('/beranda', BerandaController::class);
    Route::resource('/jenis', JenisController::class);
    Route::resource('/announcement', AnnouncementController::class);
    Route::resource('/contact', ContactController::class);
    Route::resource('/statistik', StatistikController::class);

});


Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/dashboard-puskeswan', [DashboardPuskeswanController::class, 'index'])->name('dashboard.puskeswan');
    Route::resource('/profil-puskeswan', ProfilPuskeswanController::class);
});
