@extends('layouts.master')
@section('content')
{{-- Top Bar --}}
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Laporan</h4>
                        <ol class="breadcrumb pull-right">
                            <li>KasirKu</li>
                            <li class="active"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="active"><a href="{{url('#')}}">Laporan</a></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
                <div class="container text-center mt-5">
                    <h1 class="mb-4">Pilih Laporan</h1>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{route('laporan.produk')}}" class="btn btn-primary btn-lg">Laporan Produk</a>
                        <a href="{{route('laporan.transaksi')}}" class="btn btn-success btn-lg">Laporan Transaksi</a>
                    </div>
                </div>
        </div>
    </div>
</div>