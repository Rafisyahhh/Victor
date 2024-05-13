<?php
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/admin/dashboard', function () {
    return view('admin.master');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/kategori', [kategoriController::class,'index'])->name('kategori');
Route::get('/kategori/create', [kategoriController::class,'create'])->name('kategori.create');
Route::post('/kategori/store', [kategoriController::class,'store'])->name('kategori.store');
Route::get('/kategori/edit/{kategori}',[kategoriController::class,'edit'])->name('kategori.edit');
Route::put('/kategori/update/{kategori}',[kategoriController::class,'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [kategoriController::class,'destroy'])->name('kategori.destroy');
