<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('debugging', function () { 
    return view('debugging');
});
Route::get('dashboard-admin', function () {
    return view('dashboards.dashboard_admin');
})->name('dashboard');
Route::get('login', function () {
    return view('auth.login');
});
Route::get('welcome', function () {
    return view('dashboards.welcome');
});
Route::get('registrasi', function () {
    return view('auth.registrasi');
}); 
Route::get('transaksi', function () {
    return view('dashboards/transaksi');
});

Route::get('/produk-lihat', [ProdukController::class, 'lihat'])->name('produk.lihat');
Route::post('/produk/delete/{kode_produk}', [ProdukController::class, 'destroy'])->name('produk.delete');
Route::get('/produk/edit/{kode_produk}', [ProdukController::class,'edit'])->name('produk.edit');
Route::post('/produk/edit/{kode_produk}', [ProdukController::class, 'update'])->name('produk.update');
Route::get('/produk/tambah', [ProdukController::class, 'tambah'])->name('produk.tambah');
Route::post('/produk/tambah', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/cari', [ProdukController::class, 'cariProduk'])->name('produk.cari');
Route::post('/transaksi/simpan', [ProdukController::class, 'simpanTransaksi'])->name('transaksi.simpan');
Route::get('produk', [ProdukController::class, 'index']);
Route::get('/produk/export/excel', [ProdukController::class, 'exportExcel'])->name('produk.excel');

// Route::get('/produk/edit/{kode_produk}', [KategoriController::class,'edit'])->name('project.edit');
// Routing Kategori
Route::controller(KategoriController::class)->group(function () {
    Route::get('/tampil-kategori', 'index')->name('kategori.index');
    Route::get('/tambah-kategori', 'create')->name('kategori.tambah');
    Route::post('/tampil-kategori', 'store')->name('kategori.store');
    Route::get('/kategori/edit/{kode_kategori}', 'edit')->name('kategori.edit');
    Route::post('/kategori/edit/{kode_kategori}', 'update')->name('kategori.update');
    Route::post('/kategori/delete/{kode_kategori}', 'destroy')->name('kategori.delete');
    // Routing Transaksi
});

Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/api/chart-data', [TransaksiController::class, 'getChartData']);
