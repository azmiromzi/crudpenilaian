 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Page </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">





    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('posts.index') }}">
            <span>All Posts</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <span>All Users</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('categories.index') }}">
            <span>All Category</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('menus.index') }}">
            <span>All Menu</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pesanans.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>All Pesanan</span></a>
    </li>


        <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <span>Laporan</span>
            <i class="bi bi-card-text"></i>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('laporanpost') }}">Laporan Posts</a>
                <a class="collapse-item" href="{{ route('laporanuser') }}">Laporan Users</a>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 " id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->



