@extends('layouts.master')

@section('title', 'Laporan Produk')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Laporan Produk</h1>

    <!-- Tabel Laporan Produk -->
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $key => $data)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $data->kode_produk }}</td>
                    <td>{{ $data->nama_produk }}</td>
                    <td>{{ $data->kategori->nama_kategori }}</td>
                    <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
                    <td>{{ $data->stok }}</td>
                    <td>{{ $data->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tombol Export ke Excel di Bawah Tabel -->
    <div class="mt-3 text-right">
        <a href="{{ route('produk.excel') }}" class="btn btn-success">
            Export ke Excel
        </a>
    </div>
</div>
@endsection
