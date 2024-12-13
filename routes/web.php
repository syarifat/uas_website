<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

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

Route::get('produk/lihat', [ProdukController::class, 'lihat'])->name('project.tambah');
Route::post('produk/delete/{kode_produk}', [ProdukController::class, 'destroy'])->name('project.delete');
Route::get('/produk/edit/{id}', [ProdukController::class,'edit'])->name('project.edit');


