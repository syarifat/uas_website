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
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
<div class="container">
    <!-- Row untuk Statistik Panel -->
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Barang Terjual Bulan Ini</h4>
                </div>
                <div class="panel-body">
                    <h3><b>{{ $barangTerjual }}</b></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Barang Masuk Bulan Ini</h4>
                </div>
                <div class="panel-body">
                    <h3><b>{{ $barangMasuk }}</b></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Jumlah Transaksi Bulan Ini</h4>
                </div>
                <div class="panel-body">
                    <h3><b>{{ $jumlahTransaksi }}</b></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Penghasilan Bulan Ini</h4>
                </div>
                <div class="panel-body">
                    <h3><b>Rp. {{ number_format($penghasilan, 2, ',', '.') }}</b></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Row untuk Chart -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Chart Transaksi</h3>
                </div>
                <div class="panel-body">
                    <canvas id="transaksiChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('transaksiChart').getContext('2d');

        // Ambil data dari API
        fetch('/api/chart-data')
            .then(response => response.json())
            .then(data => {
                const labels = data.map(item => item.tanggal); // Label untuk tanggal
                const values = data.map(item => item.total);   // Data total pendapatan

                // Buat Chart
                new Chart(ctx, {
                    type: 'bar', // Bisa diubah menjadi 'line', 'pie', dll.
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Pendapatan',
                            data: values,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                enabled: true,
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    });
</script>

</div> <!-- container -->
<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/modernizr.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<script src="assets/pages/dashborad.js"></script>

<script src="assets/js/app.js"></script>
@endsection