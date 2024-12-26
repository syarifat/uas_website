@extends('layouts.master')

@section('title', 'Aplikasi Laravel')

@section('content')
{{-- Top Bar --}}
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Dashboard</h4>
                        <ol class="breadcrumb pull-right">
                            <li>KasirKu</li>
                            <li class="active"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="active"><a href="{{route('produk.lihat')}}">Kelola Produk</a></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
<div class="container">
    <h2>Tabel Produk</h2>
    <a href="{{route('produk.tambah')}}" class="btn btn-success">+ Tambah Data</a>
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
            @foreach($dataProduk as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->kode_produk }}</td>
                <td>{{ $data->nama_produk }}</td>
                <td>{{ $data->kategori->nama_kategori }}</td>
                <td>{{ number_format($data->harga, 0, ',', '.') }}</td>
                <td>{{ $data->stok }}</td>
                <td>
                    <form action="{{route('produk.delete', $data->kode_produk)}}" method="post">@csrf
                            <a href="{{route('produk.edit', $data->kode_produk)}}" class = "btn btn-warning">Edit</a>
                            <button class = "btn btn-danger">Delete</button>
                        </form>
                </td>
            </tr>
             @endforeach
        </tbody>

    </table>
</div>
@endsection
