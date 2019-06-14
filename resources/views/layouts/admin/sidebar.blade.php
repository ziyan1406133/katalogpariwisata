<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-globe"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KAPAGAR</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/">
        <i class="fas fa-fw fa-home"></i>
        <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kelola Pariwisata
    </div>

    <li class="nav-item">
        <a class="nav-link" href="/lokasi">
        <i class="fas fa-fw fa-map-signs"></i>
        <span>Objek Pariwisata</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/wilayah">
        <i class="fas fa-fw fa-map"></i>
        <span>Wilayah</span></a>
    </li>

    @if(auth()->user()->status == 'Super Admin')
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Super Admin
    </div>

    <li class="nav-item">
        <a class="nav-link" href="/user">
        <i class="fas fa-fw fa-user-tie"></i>
        <span>Kelola Admin</span></a>
    </li>
    @endif
</ul>
<!-- End of Sidebar -->