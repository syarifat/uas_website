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
Route::get('template', function () { #template
    return view('template');
});

Route::get('dashboard', function () {
    return view('project.dashboard');
});
Route::get('login', function () {
    return view('project.login');
});
Route::get('welcome', function () {
    return view('project.welcome');
});
Route::get('registrasi', function () {
    return view('project.registrasi');
});
Route::get('tambah', function () {
    return view('project.tambah');
});

Route::get('/produk/lihat', [ProdukController::class, 'lihat'])->name('project.lihat');
Route::post('/produk/delete/{kode_produk}', [ProdukController::class, 'destroy'])->name('project.delete');
Route::get('/produk/edit/{kode_produk}', [ProdukController::class,'edit'])->name('project.edit');
Route::get('/produk/tambah', [ProdukController::class, 'tambah'])->name('project.tambah');
Route::post('/tampil-produk', [ProdukController::class, 'store'])->name('project.store');

// Routing Kategori
Route::controller(KategoriController::class)->group(function () {
    Route::get('/tampil-kategori', 'index')->name('kategori.index');
    Route::get('/tambah-kategori', 'create')->name('kategori.create');
    Route::post('/tampil-kategori', 'store')->name('kategori.store');
    Route::get('/kategori/edit/{id}', 'edit')->name('kategori.edit');
    Route::post('/kategori/edit/{id}', 'update')->name('kategori.update');
    Route::post('/kategori/delete/{id}', 'destroy')->name('kategori.delete');
});
