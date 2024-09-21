<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PosisiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\datadiriController;
use App\Http\Controllers\IndekController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\DaftarpelamarController;
use App\Http\Controllers\HistorylamaranController;    
use App\Http\Controllers\PengalamanController;    
use App\Http\Controllers\PendidikanController;    
use App\Http\Controllers\KeahlianController;    
use App\Http\Controllers\CvController;    
use App\Http\Controllers\NotifController;
use Illuminate\Routing\Route as RoutingRoute;

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

Route::get('/', [IndekController::class, 'index'])->name('index');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/lowongan', [LowonganController::class, 'index'])->name('lowongan');
    Route::get('/daftarperusahaan', [PerusahaanController::class, 'indexUser'])->name('daftarperusahaan');
    Route::get('/detailperusahaan{id}', [PerusahaanController::class, 'indexDetail'])->name('detailperusahaan');
    Route::get('/daftarlowongan', [LowonganController::class, 'indexUser'])->name('daftarlowongan');
    Route::get('/detaillowongan{id}', [LowonganController::class, 'indexDetail'])->name('detaillowongan');
    Route::get('/createlamaran{id}', [LamaranController::class, 'create'])->name('createlamaran');
    Route::post('/storelamaran', [LamaranController::class, 'store'])->name('lamaran.store');
    Route::get('/historylamaran', [HistorylamaranController::class, 'index'])->name('historylamaran');
    Route::post('/createpengalaman{id}', [PengalamanController::class, 'store'])->name('createpengalaman');
    Route::post('/updatepengalaman{pengalaman}', [PengalamanController::class, 'update'])->name('updatepengalaman');
    Route::post('/creatependidikan{id}', [PendidikanController::class, 'store'])->name('creatependidikan');
    Route::post('/updatependidikan{pendidikan}', [PendidikanController::class, 'update'])->name('updatependidikan');
    Route::post('/createkeahlian{id}', [KeahlianController::class, 'store'])->name('createkeahlian');
    Route::post('/updatekeahlian{keahlian}', [KeahlianController::class, 'update'])->name('updatekeahlian');
    Route::post('/createcv{id}', [CvController::class, 'store'])->name('createcv');
    Route::post('/updatecv{cv}', [CvController::class, 'update'])->name('updatecv');
    Route::get('/notif{id}', [NotifController::class, 'update'])->name('notif');
    
    Route::controller(ProfilController::class)->group(function () {
        Route::get('/profil', 'index')->name('profil');
        Route::get('/profil/create/{profil}', 'create')->name('profil.create');
        Route::post('/profil/store/{profil}', 'store')->name('profil.store');
        Route::get('/profil/edit/{profil}', 'edit')->name('profil.edit');
        Route::put('/profil/update/{profil}', 'update')->name('profil.update');
        Route::delete('/profil/destroy/{profil}', 'destroy')->name('profil.destroy');
    });
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dash', [MasterController::class, 'index'])->name('dash');
    Route::controller(PerusahaanController::class)->group(function () {
        Route::get('/perusahaan', 'index')->name('perusahaan');
        Route::get('/perusahaan/create', 'create')->name('perusahaan.create');
        Route::post('/perusahaan/store', 'store')->name('perusahaan.store');
        Route::get('/perusahaan/edit/{perusahaan}', 'edit')->name('perusahaan.edit');
        Route::put('/perusahaan/update/{perusahaan}', 'update')->name('perusahaan.update');
        Route::delete('/perusahaan/destroy/{perusahaan}', 'destroy')->name('perusahaan.destroy');
    });
    Route::controller(LowonganController::class)->group(function () {
        Route::get('/lowongan', 'index')->name('lowongan');
        Route::get('/lowongan/create', 'create')->name('lowongan.create');
        Route::post('/lowongan/store', 'store')->name('lowongan.store');
        Route::get('/lowongan/edit/{lowongan}', 'edit')->name('lowongan.edit');
        Route::put('/lowongan/update/{lowongan}', 'update')->name('lowongan.update');
        Route::delete('/lowongan/destroy/{lowongan}', 'destroy')->name('lowongan.destroy');
    });

    Route::get('/kategori', [kategoriController::class, 'index'])->name('kategori');
    Route::get('/kategori/create', [kategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store', [kategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{kategori}', [kategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/update/{kategori}', [kategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori}', [kategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/datadiri', [datadiriController::class, 'index'])->name('datadiri');
    Route::get('/datadiri/{datadiri}/edit', [datadiriController::class, 'edit'])->name('datadiri.edit');
    Route::put('/datadiri/{datadiri}', [datadiriController::class, 'update'])->name('datadiri.update');
    Route::delete('/datadiri/{datadiri}', [datadiriController::class, 'destroy'])->name('datadiri.destroy');

    Route::get('/lamaran', [LamaranController::class, 'index'])->name('lamaran');
    Route::post('/terima{daftarpelamar}', [DaftarpelamarController::class, 'terima'])->name('lamaran.terima');
    Route::post('/tolak{daftarpelamar}', [DaftarpelamarController::class, 'tolak'])->name('lamaran.tolak');
});