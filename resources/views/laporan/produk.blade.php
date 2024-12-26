@extends('layouts.master')
@section('content')
{{-- Top Bar --}}
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Laporan Produk</h4>
                        <ol class="breadcrumb pull-right">
                            <li>KasirKu</li>
                            <li class="active"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="active"><a href="{{url('#')}}">Laporan</a></li>
                            <li class="active"><a href="{{url('#')}}">Laporan Produk</a></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
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
        </div>
    </div>
</div>