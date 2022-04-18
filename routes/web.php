<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ProdukController::class, 'index'])->name('home');
Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::get('/show/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::post('/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
Route::group(['prefix' => 'produk', 'as' => 'produk.'], function () {
    Route::get('/', [ProdukController::class, 'index'])->name('home');
    Route::get('/buat', [ProdukController::class, 'create'])->name('tambah-produk');
    Route::post('/buat-produk', [ProdukController::class, 'store'])->name('buat-produk');
    
});

