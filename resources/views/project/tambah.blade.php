@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Form Input Data</h4>
            <form>
                <div class="form-group">
                    <label for="kode">Kode Produk *</label>
                    <input class="form-control" type="text" id="id">
                </div>
                <div class="form-group">
                    <label for="kode">Nama Produk *</label>
                    <input class="form-control" type="text" id="nama_produk">
                </div>
                <div class="form-group">
                    <label for="nama">Kategori *</label><br>
                    <select>
                        <option value="">Pilih Kategori</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kode">Harga *</label>
                    <input class="form-control" type="text" id="harga">
                </div>
                <div class="form-group">
                    <label for="kode">Stok *</label>
                    <input class="form-control" type="text" id="stock">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="" class="btn btn-success">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection