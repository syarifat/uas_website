@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Barang Terjual Bulan Ini</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>2568</b></h3>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Barang Masuk Bulan Ini</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>25487</b></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Jumlah Transaksi Bulan Ini</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>3685</b></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Penghasilan Bulan Ini</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>Rp. 130.000</b></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Revenue</h4>
                </div>
                <div class="panel-body">
                    <ul class="list-inline m-t-30 widget-chart text-center">
                        <li>
                            <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                            <h4 class=""><b>5248</b></h4>
                            <h5 class="text-muted m-b-0">Marketplace</h5>
                        </li>
                        <li>
                            <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                            <h4 class=""><b>321</b></h4>
                            <h5 class="text-muted m-b-0">Last week</h5>
                        </li>
                        <li>
                            <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                            <h4 class=""><b>964</b></h4>
                            <h5 class="text-muted m-b-0">Last Month</h5>
                        </li>
                    </ul>
                    <div id="sparkline1" style="margin: 0 -21px -22px -22px;"></div>
                </div>
            </div>
    </div>

        {{-- <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h4 class="m-t-0">Email Sent</h4>
                    <ul class="list-inline m-t-30 widget-chart text-center">
                        <li>
                            <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                            <h4 class=""><b>3654</b></h4>
                            <h5 class="text-muted m-b-0">Marketplace</h5>
                        </li>
                        <li>
                            <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                            <h4 class=""><b>954</b></h4>
                            <h5 class="text-muted m-b-0">Last week</h5>
                        </li>
                        <li>
                            <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                            <h4 class=""><b>8462</b></h4>
                            <h5 class="text-muted m-b-0">Last Month</h5>
                        </li>
                    </ul>
                    <div id="sparkline2" style="margin: 0 -21px -22px -22px;"></div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h4 class="m-t-0">Monthly Subscriptions</h4>
                    <ul class="list-inline m-t-30 widget-chart text-center">
                        <li>
                            <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                            <h4 class=""><b>3256</b></h4>
                            <h5 class="text-muted m-b-0">Marketplace</h5>
                        </li>
                        <li>
                            <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                            <h4 class=""><b>785</b></h4>
                            <h5 class="text-muted m-b-0">Last week</h5>
                        </li>
                        <li>
                            <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                            <h4 class=""><b>1546</b></h4>
                            <h5 class="text-muted m-b-0">Last Month</h5>
                        </li>
                    </ul>
                    <div id="sparkline3" style="margin: 0 -21px -22px -22px;"></div>
                </div>
            </div>
        </div> --}}
    </div>


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
                            <tr>
                                <td>Tiger</td>
                                <td>Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>Garrett</td>
                                <td>Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>Ashton</td>
                                <td>Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>66</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>Cedric</td>
                                <td>Kelly</td>
                                <td>Senior Javascript Developer</td>
                                <td>Edinburgh</td>
                                <td>22</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>Airi</td>
                                <td>Satou</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>61</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>Brielle</td>
                                <td>Williamson</td>
                                <td>Integration Specialist</td>
                                <td>New York</td>
                                <td>61</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>Herrod</td>
                                <td>Chandler</td>
                                <td>Sales Assistant</td>
                                <td>San Francisco</td>
                                <td>59</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>Rhona</td>
                                <td>Davidson</td>
                                <td>Integration Specialist</td>
                                <td>Tokyo</td>
                                <td>55</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>Colleen</td>
                                <td>Hurst</td>
                                <td>Javascript Developer</td>
                                <td>San Francisco</td>
                                <td>39</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>Sonya</td>
                                <td>Frost</td>
                                <td>Software Engineer</td>
                                <td>Edinburgh</td>
                                <td>23</td>
                                <td>61</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div> <!-- End Row -->


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