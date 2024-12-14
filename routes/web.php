<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('debugging', function () { #debugging
    return view('debugging');
});
Route::get('dashboard-admin', function () {
    return view('dashboards.dashboard_admin');
});
Route::get('login', function () {
    return view('auth.login');
});
Route::get('dashboards', function () {
    return view('dashboard.welcome');
});
Route::get('registrasi', function () {
    return view('auth.registrasi');
});

Route::get('/produk-lihat', [ProdukController::class, 'lihat'])->name('produk.lihat');
Route::post('/produk/delete/{kode_produk}', [ProdukController::class, 'destroy'])->name('produk.delete');
Route::get('/produk/edit/{kode_produk}', [ProdukController::class,'edit'])->name('produk.edit');
Route::get('/produk/tambah', [ProdukController::class, 'tambah'])->name('produk.tambah');
Route::post('/tampil-produk', [ProdukController::class, 'store'])->name('produk.store');


Route::get('/produk/edit/{kode_produk}', [KategoriController::class,'edit'])->name('project.edit');
// Routing Kategori
Route::controller(KategoriController::class)->group(function () {
    Route::get('/tampil-kategori', 'index')->name('kategori.index');
    Route::get('/tambah-kategori', 'create')->name('kategori.tambah');
    Route::post('/tampil-kategori', 'store')->name('kategori.store');
    Route::get('/kategori/edit/{id}', 'edit')->name('kategori.edit');
    Route::post('/kategori/edit/{id}', 'update')->name('kategori.update');
    Route::post('/kategori/delete/{id}', 'destroy')->name('kategori.delete');
});
?>
