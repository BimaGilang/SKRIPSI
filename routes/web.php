<?php

use App\Http\Controllers\Beranda;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilPenjualanController;
use App\Http\Controllers\Kasir;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [LayoutController::class, 'index'])->middleware('auth');
Route::get('/home', [LayoutController::class, 'index'])->middleware('auth');

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('dashboard', DashboardController::class);
        Route::resource('produk', ProdukController::class);
        Route::resource('laporan', LaporanController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('kasir', KasirController::class);
        Route::resource('pembelian', PembelianController::class);
        Route::resource('pengeluaran', PengeluaranController::class);
        Route::resource('hasilPenjualan', HasilPenjualanController::class);
    });
    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('penjualan', PenjualanController::class);
    });
});
