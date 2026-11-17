<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Managements
    </div>

    <!-- Menu Daftar Cucian (Sudah ditambahkan py-2 agar jaraknya sama) -->
    <li class="nav-item">
        <a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-tshirt"></i>
            <span>Daftar Cucian</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Cucian :</h6>
                <a class="collapse-item" href="{{ route('pesanan.baru') }}">Cucian Masuk</a>
                <a class="collapse-item" href="{{ route('pesanan.selesai') }}">Cucian Selesai</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link py-2" href="{{ route('layanan.index') }}">
            <i class="fas fa-fw fa-soap"></i>
            <span>Daftar Layanan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link py-2" href="{{ route('customer.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Daftar Customer</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
