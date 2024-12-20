@extends('layouts.master')
@section('title', 'Aplikasi Laravel')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Edit Data Kategori</h4>
            <br>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{route('kategori.update', $data->kode_kategori)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode">Kode Kategori <span class="text-danger">*</span> </label>
                    <input class="form-control" type="text" name="kode_kategori" id="kode_kategori"
                    value="{{$data->kode_kategori}}">
                </div>
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama_kategori" id="nama_kategori" value="{{ $data->nama_kategori }}">
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="{{route('kategori.lihat')}}" class="btn btn-success">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection