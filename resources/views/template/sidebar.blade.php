<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0"
            href=" https://demos.creative-tim.com/argon-dashboard-pro/pages/dashboards/default.html " target="_blank">
            <img src="../../assets/img/sim.jpg" style="width: 100px" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold"></span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="/">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->role !== 'karyawan')
                @if (auth()->user()->role !== 'pimpinan')
                    <li class="nav-item">
                        <a class="nav-link" href="/perusahaan">
                            <div
                                class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                                <i class="fa-brands fa-squarespace text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">perusahaan</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="/user">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="ni ni-circle-08 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">user</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role !== 'admin')
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">output</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pinjaman">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-cart-shopping text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">output produksi</span>
                    </a>
            @endif
            @if (auth()->user()->role !== 'karyawan')
                @if (auth()->user()->role !== 'admin')
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">input</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kategori">
                            <div
                                class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-copy-04 text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">barang kategori</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/item">
                            <div
                                class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-square-check text-success text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">data barang</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <hr class="horizontal dark" />
                    <a class="nav-link" href="/laporan">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-file text-secondary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/estimasi">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-filter text-secondary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">estimasi</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
