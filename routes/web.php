<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/produk/edit/{id}', [ProdukController::class,'edit'])->name('produk.edit');
