@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Form Input Data</h4>
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
                    <select name="kategori" required>
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
