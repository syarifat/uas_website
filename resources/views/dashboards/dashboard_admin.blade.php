@extends('layouts.master')

@section('content')
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

    <!-- Row untuk Tabel Pembelian -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Tabel Pembelian</h3>
                </div>
                <div class="panel-body">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nama Kustomer</th>
                                <th>Jumlah Barang</th>
                                <th>Harga Total</th>
                                <th>Hari</th>
                                <th>Tanggal</th>
                                <th>Pukul</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Contoh Data -->
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>15</td>
                                <td>Rp. 1.500.000</td>
                                <td>Senin</td>
                                <td>2024-12-01</td>
                                <td>12:30</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>20</td>
                                <td>Rp. 2.000.000</td>
                                <td>Selasa</td>
                                <td>2024-12-02</td>
                                <td>14:15</td>
                            </tr>
                        </tbody>
                    </table>
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

<!-- Script untuk Datatables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#datatable-responsive').DataTable({
            responsive: true
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

<!-- Datatables-->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>

<script src="assets/pages/dashborad.js"></script>

<script src="assets/js/app.js"></script>
@endsection