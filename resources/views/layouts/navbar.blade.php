# Left Bar
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="topbar-left">
            <div class="text-center">
                <a href="#" class="logo"><img src="assets/images/logo_white.png" height="28"></a>
            </div>
        </div>
        <div class="user-details">
            <div class="text-center">
                <img src="assets/images/users/avatar1.png" alt="" class="img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Silvy Kumalasari</a>
                </div>
                <form action="{{url('page')}}">
                    <button type="submit" class="btn btn-danger logout-button position-absolute top-0 end-0 mt-3 me-3">Keluar</button>
                </form>
            </div>
        </div>
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="#" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                </li>
                <li>
                    <a href="{{url('transaksi')}}" class="waves-effect"><i class="ti-home"></i><span> Pembelian </span></a>
                </li>
                <li>
                    <a href="{{route('produk.lihat')}}" class="waves-effect"><i class="ti-home"></i><span> Kelola Barang </span></a>
                </li>
                <li>
                    <a href="{{route('kategori.index')}}" class="waves-effect"><i class="ti-home"></i><span> Kelola Kategori </span></a>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i class="ti-home"></i><span> Laporan </span></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

# Top Bar
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Dashboard</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">KasirKu</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>