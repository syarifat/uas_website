@extends('layouts.master')

@section('title', 'Transaksi Summary')

@section('content')
<br>
<div class="container">
    <h2>Transaksi Summary</h2>
    <table class="table table-bordered table-striped" id="tabel-transaksi">
        <thead>
            <tr>
                <th style="width:1%">No.</th>
                <th style="width:10%">ID Transaksi</th>
                <th style="width:20%">Nama Produk</th>
                <th style="width:10%">Jumlah</th>
                <th style="width:10%">Harga / Pcs</th>
                <th style="width:10%">Total Harga</th>
                <th style="width:10%">Tanggal</th>
                <th style="width:10%">Nama Kasir</th>
                <th style="width:15%">Nama Pembeli</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksiData as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->id_transaksi }}</td>
                <td>{{ $data->nama_produk }}</td>
                <td>{{ $data->jumlah }}</td>
                <td>{{ number_format($data->harga, 0, ',', '.') }}</td>
                <td>{{ number_format($data->total_harga, 0, ',', '.') }}</td> <!-- Total Harga -->
                <td>{{ \Carbon\Carbon::parse($data->tanggal_transaksi)->format('d-m-Y') }}</td> <!-- Format tanggal -->
                <td>{{ $data->nama_kasir }}</td> <!-- Nama kasir -->
                <td>{{ $data->nama_pembeli }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
