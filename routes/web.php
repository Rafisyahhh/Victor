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
    return view('user.index');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/lowongan', [LowonganController::class, 'index'])->name('lowongan');
    Route::get('/daftarperusahaan', [PerusahaanController::class, 'indexUser'])->name('daftarperusahaan');
    Route::get('/detailperusahaan{id}', [PerusahaanController::class, 'indexDetail'])->name('detailperusahaan');
    Route::get('/daftarlowongan', [LowonganController::class, 'indexUser'])->name('daftarlowongan');
    
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
    Route::get('/dash', [MasterController::class, 'index'])->name('dash');
    Route::get('/posisi', [PosisiController::class, 'index'])->name('posisi');
    Route::get('/posisi/create', [PosisiController::class, 'create'])->name('posisi.create');
    Route::post('/posisi/store', [PosisiController::class, 'store'])->name('posisi.store');
    Route::get('/posisi/edit/{posisi}', [PosisiController::class, 'edit'])->name('posisi.edit');
    Route::put('/posisi/update/{posisi}', [PosisiController::class, 'update'])->name('posisi.update');
    Route::delete('/posisi/{posisi}', [PosisiController::class, 'destroy'])->name('posisi.destroy');

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
});