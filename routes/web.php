<?php

use App\Http\Controllers\KaransiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [KaransiController::class, 'index'])->name('home');
Route::get('pulsa/detail/{id}', [KaransiController::class, 'detail'])->name('detail');
Route::get('/bayar/{id}', [KaransiController::class, 'payment'])->name('bayar');
Route::post('/beli', [KaransiController::class, 'order'])->name('beli');
Route::get('/product/{nama}',[KaransiController::class, 'produk'])->name('pulsa');

Route::get('/{any}', function ($any) {

    return redirect()->back()->with('error', 'url tidak ditemukan');;

})->where('any', '.*');


Auth::routes();

