@extends('layouts.master')

@section('title', 'Aplikasi Laravel')

@section('content')
<br>
<div class="container">
    <h2>Tabel Produk</h2>
    <a href="" class="btn btn-success">+ Tambah Data</a>
    <table class="table table-bordered table-striped" id="tabel-produk">
        <thead>
            <tr>
                <th style="width:1%">No.</th>
                <th style="width:5%">Kode Produk</th>
                <th style="width:5%">Nama Produk</th>
                <th style="width:5%">Kategori</th>
                <th style="width:5%">Harga</th>
                <th style="width:5%">Stok</th>
                <th style="width:5%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataProduk as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->id }}</td>
                <td>{{ $data->nama_produk }}</td>
                <td>{{ number_format($data->harga, 0, ',', '.') }}</td>
                <td>{{ $data->stock }}</td>
                <td>
                    <a href="{{ route('produk.edit', $data->id}}" class="btn btn-warning">Ubah</a>
                    <button class="btn btn-danger">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
