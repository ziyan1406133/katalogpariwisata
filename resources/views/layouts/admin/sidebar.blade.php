
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-globe"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KAPAGAR</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
        <i class="fas fa-fw fa-chart-pie"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kelola Pariwisata
    </div>

    <li class="nav-item">
        <a class="nav-link" href="/adminlokasi">
        <i class="fas fa-fw fa-map-signs"></i>
        <span>Objek Pariwisata</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/wilayah">
        <i class="fas fa-fw fa-map"></i>
        <span>Wilayah</span></a>
    </li>

    <!--
    @if(auth()->user()->status == 'Super Admin')

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Menu Super Admin
    </div>

    <li class="nav-item">
        <a class="nav-link" href="/user">
        <i class="fas fa-fw fa-user-tie"></i>
        <span>Kelola Admin</span></a>
    </li>
    @endif
    -->
</ul>