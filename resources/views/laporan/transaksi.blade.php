@extends('layouts.master')

@section('title', 'Transaksi Summary')

@section('content')
<br>
<div class="container">
    <h2>Laporan Transaksi</h2>
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
            </tr>
        </thead>
        <tbody>
            @foreach($transaksiData as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->id_transaksi }}</td>
                <td>{{ $data->produk->nama_produk }}</td> <!-- Nama produk dari join -->
                <td>{{ $data->jumlah }}</td>
                <td>{{ number_format($data->harga, 0, ',', '.') }}</td>
                <td>{{ number_format($data->total_harga, 0, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($data->tanggal_transaksi)->timezone('Asia/Jakarta')->format('d-m-Y') }}</td> <!-- Format tanggal -->
                <td>{{ $data->kasir }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
