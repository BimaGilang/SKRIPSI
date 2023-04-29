<?php

use App\Http\Controllers\Beranda;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PenjualanDetailController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SettingController;
use Doctrine\DBAL\Schema\Index;
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

        Route::get('kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
        Route::resource('kategori', KategoriController::class);

        Route::get('produk/data', [ProdukController::class, 'data'])->name('produk.data');
        Route::post('produk/delete-selected', [ProdukController::class, 'deleteSelected'])->name('produk.delete_selected');
        Route::post('produk/cetak-barcode', [ProdukController::class, 'cetakBarcode'])->name('produk.cetak_barcode');
        Route::resource('produk', ProdukController::class);

        Route::get('pengeluaran/data', [PengeluaranController::class, 'data'])->name('pengeluaran.data');
        Route::resource('pengeluaran', PengeluaranController::class);

        Route::get('hasilPenjualan/data', [PenjualanController::class, 'data'])->name('penjualan.data');
        Route::get('hasilPenjualan/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
        Route::get('hasilPenjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
        Route::delete('hasilPenjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');

        route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
        route::post('laporan', [LaporanController::class, 'refresh'])->name('laporan.refresh');
        route::get('laporan/data/{awal}/{akhir}', [LaporanController::class, 'data'])->name('laporan.data');
        route::get('laporan/pdf/{awal}/{akhir}', [LaporanController::class, 'exportPDF'])->name('laporan.export_pdf');

        Route::get('kasir/data', [KasirController::class, 'data'])->name('kasir.data');
        Route::resource('kasir', KasirController::class);

        Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
        Route::get('setting/first', [SettingController::class, 'show'])->name('setting.show');
        Route::post('setting', [SettingController::class, 'update'])->name('setting.update');

        Route::get('profil', [KasirController::class, 'profil'])->name('user.profil');
        Route::post('profil', [KasirController::class, 'updateProfil'])->name('user.update_profil');


        // Route::resource('pembelian', PembelianController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::get('transaksi/baru', [PenjualanController::class, 'create'])->name('transaksi.baru');
        Route::post('transaksi/simpan', [PenjualanController::class, 'store'])->name('transaksi.simpan');
        Route::get('transaksi/selesai', [PenjualanController::class, 'selesai'])->name('transaksi.selesai');
        Route::get('transaksi/nota-kecil', [PenjualanController::class, 'notaKecil'])->name('transaksi.nota_kecil');
        Route::get('transaksi/nota-besar', [PenjualanController::class, 'notaBesar'])->name('transaksi.nota_besar');
        Route::get('transaksi/{id}/data', [PenjualanDetailController::class, 'data'])->name('transaksi.data');
        Route::get('transaksi/loadform/{diskon}/{total}/{diterima}', [PenjualanDetailController::class, 'loadForm'])->name('transaksi.load_form');
        Route::resource('transaksi', PenjualanDetailController::class)->except('show');
    });
});
