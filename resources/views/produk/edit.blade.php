@extends('layouts.master')
@section('title', 'Aplikasi Laravel')
@section('content')

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
                    <label for="kategori">Kategori *</label><br>
                    <select name="kategori" required>
                        @foreach ($kategori as $category)
                            <option value="{{ $category->kode_kategori }}">{{ $category->nama_kategori }}</option>
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
