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
                            <li class="active"><a href="#">Tambah</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Form Input Data</h4>
                        <form action="{{route('kategori.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="kode">Kode Kategori *</label>
                                <input class="form-control" type="text" name="kode_kategori" id="kode_kategori">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Kategori *</label>
                                <input class="form-control" type="text" name="nama_kategori" id="nama_kategori">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('kategori.lihat') }}" class="btn btn-success">Kembali</a>
                            </div>
                        </form>                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection