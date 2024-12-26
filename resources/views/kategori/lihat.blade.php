@extends('layouts.master')
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
                            <li class="active"><a href="{{route('kategori.lihat')}}">Kelola Kategori</a></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
<div class="container">
    <h2>Tabel Kategori</h2>
    <a href="{{route('kategori.tambah')}}" class="btn btn-success">Tambah Kategori</a>
    <table class="table table-bordered table stripped" id="tabel-kategori">
        <thead>
            <tr>
                <th style="width:1%">No.</th>
                <th style="width:5%">Kode Kategori</th>
                <th style="width:5%">Nama Kategori</th>
                <th style="width:5%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataKategori as $data)
            <tr>
                <td> {{ $loop->iteration }}</td>
                <td> {{ $data->kode_kategori }}</td>
                <td> {{ $data->nama_kategori }}</td>
                <td>
                    <form action="{{route('kategori.delete', $data->kode_kategori)}}" method= "post">@csrf
                        <a href="{{route('kategori.edit', $data->kode_kategori)}}" class = "btn btn-warning">Edit</a>
                        <button class = "btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
