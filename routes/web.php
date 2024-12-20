<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('welcome');
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
Route::get('pagelaporan', function () {
    return view('dashboards.pagelaporan');
})->name('dashboards.pagelaporan');

// Routing Produk
Route::controller(ProdukController::class)->group(function() {
    Route::get('/produk-lihat', 'lihat')->name('produk.lihat');
    Route::post('/produk/delete/{kode_produk}', 'destroy')->name('produk.delete');
    Route::get('/produk/edit/{kode_produk}', 'edit')->name('produk.edit');
    Route::post('/produk/edit/{kode_produk}', 'update')->name('produk.update');
    Route::get('/produk/tambah', 'tambah')->name('produk.tambah');
    Route::post('/produk/tambah', 'store')->name('produk.store');
    Route::post('/transaksi/simpan', 'simpanTransaksi')->name('transaksi.simpan');
    Route::get('/laporan-produk', 'showLaporan')->name('laporan.produk');
    Route::get('/produk/export/excel', 'exportExcel')->name('produk.excel');
});

// Routing Kategori
Route::controller(KategoriController::class)->group(function () {
    Route::get('/tampil-kategori', 'showKategori')->name('kategori.lihat');
    Route::get('/tambah-kategori', 'create')->name('kategori.tambah');
    Route::post('/tampil-kategori', 'store')->name('kategori.store');
    Route::get('/kategori/edit/{kode_kategori}', 'edit')->name('kategori.edit');
    Route::post('/kategori/edit/{kode_kategori}', 'update')->name('kategori.update');
    Route::post('/kategori/delete/{kode_kategori}', 'destroy')->name('kategori.delete');
});

// Routing Transaksi
Route::controller(TransaksiController::class)->group(function () {
    Route::get('/laporan-transaksi', 'showlaporan')->name('laporan.transaksi');
    Route::post('/transaksi/store', 'store')->name('transaksi.store');
    Route::get('/produk/cari', 'search');
    Route::post('/checkout', 'checkout');
    Route::get('/transaksi', 'transaksi') ->name('produk.transaksi');
    Route::post('/transaksi', 'store');
    Route::get('/get-harga/{kode_produk}', 'getHarga');
    Route::get('/get-products', 'getProducts')->name('get.products');
    Route::get('/produk/autocomplete', 'autocomplete')->name('produk.autocomplete');
});