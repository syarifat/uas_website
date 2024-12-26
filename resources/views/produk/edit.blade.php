@extends('layouts.master')
@section('content')
{{-- Top Bar --}}
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Edit Produk</h4>
                        <ol class="breadcrumb pull-right">
                            <li>KasirKu</li>
                            <li class="active"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="active"><a href="{{route('produk.lihat')}}">Kelola Produk</a></li>
                            <li class="active"><a href="#">Edit</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Edit Data Produk</h4>
            <br>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('produk.update', $data->kode_produk) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode">Kode Produk <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="kode_produk" id="kode_produk" value="{{ $data->kode_produk }}">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Produk <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama_produk" id="nama_produk" value="{{ $data->nama_produk }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <select class="form-control" id="kategori" name="kategori" required>
                        @foreach ($kat as $cat)
                            <option value="{{ $cat->kode_kategori }}" 
                                {{ $cat->kode_kategori == $data->kode_kategori ? 'selected' : '' }}>
                                {{ $cat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="harga" id="harga" value="{{ $data->harga }}">
                </div>
                <div class="form-group">
                    <label for="stok">Stok <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="stok" id="stok" value="{{ $data->stok }}">
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="{{ route('produk.lihat') }}" class="btn btn-success">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
