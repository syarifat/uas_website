@extends('layouts.master')
@section('content')
<div class="container text-center mt-5">
    <h1 class="mb-4">Pilih Laporan</h1>
    <div class="d-flex justify-content-center gap-3">
        <a href="{{route('laporan.produk')}}" class="btn btn-primary btn-lg">Laporan Produk</a>
        <a href="{{route('laporan.transaksi')}}" class="btn btn-success btn-lg">Laporan Transaksi</a>
    </div>
</div>