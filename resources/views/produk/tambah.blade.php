@extends('layouts.master')
@section('content')
{{-- Top Bar --}}
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Tambah Produk</h4>
                        <ol class="breadcrumb pull-right">
                            <li>KasirKu</li>
                            <li class="active"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="active"><a href="{{route('produk.lihat')}}">Kelola Produk</a></li>
                            <li class="active"><a href="#">Tambah</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Form Input Data</h4>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('produk.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode">Kode Produk *</label>
                    <input class="form-control" type="text" name="kode_produk" id="kode_produk" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Produk *</label>
                    <input class="form-control" type="text" name="nama_produk" id="nama_produk" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori *</label><br>
                    <select class="form-control" name="kategori" id="kategori" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategori as $category)
                            <option value="{{ $category->kode_kategori }}">{{ $category->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga *</label>
                    <input class="form-control" type="number" name="harga" id="harga" required>
                </div>
                <div class="form-group">
                    <label for="stok">Stok *</label>
                    <input class="form-control" type="number" name="stok" id="stok" required>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('produk.lihat') }}" class="btn btn-success">Kembali</a>
                </div>
            </form>                     
        </div>
    </div>
</div>
@endsection
