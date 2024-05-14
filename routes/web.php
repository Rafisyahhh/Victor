<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PosisiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
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
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dash', [MasterController::class, 'index'])->name('dash');
    Route::get('/posisi', [PosisiController::class, 'index'])->name('posisi');
    Route::get('/posisi/create', [PosisiController::class, 'create'])->name('posisi.create');
    Route::post('/posisi/store', [PosisiController::class, 'store'])->name('posisi.store');
    Route::get('/posisi/edit/{posisi}', [PosisiController::class, 'edit'])->name('posisi.edit');
    Route::put('/posisi/update/{posisi}', [PosisiController::class, 'update'])->name('posisi.update');
    Route::get('/posisi/destroy{posisi}', [PosisiController::class, 'destroy'])->name('posisi.destroy');
    Route::get('/kategori', [kategoriController::class, 'index'])->name('kategori');
    Route::get('/kategori/create', [kategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store', [kategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{kategori}', [kategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/update/{kategori}', [kategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori}', [kategoriController::class, 'destroy'])->name('kategori.destroy');
});
