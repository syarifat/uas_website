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
                {{-- @if (Auth::check()) --}}
                    {{-- <form action="{{ route('logout') }}" method="POST">
                    @csrf --}}
                    <button type="submit" class="btn btn-danger logout-button position-absolute top-0 end-0 mt-3 me-3">Keluar</button>
                    {{-- </form>
                @endif --}}
            </div>
        </div>
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                </li>
                <li>
                    <a href="{{route('produk.transaksi')}}" class="waves-effect"><i class="ti-home"></i><span> Penjualan </span></a>
                </li>
                <li>
                    <a href="{{route('produk.lihat')}}" class="waves-effect"><i class="ti-home"></i><span> Kelola Produk </span></a>
                </li>
                <li>
                    <a href="{{route('kategori.lihat')}}" class="waves-effect"><i class="ti-home"></i><span> Kelola Kategori </span></a>
                </li>
                <li>
                    <a href="{{route('dashboards.pagelaporan')}}" class="waves-effect"><i class="ti-home"></i><span> Laporan </span></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
            @yield('content')
        </div>
    </div>
</div>