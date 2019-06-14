<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-map"></i>
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
        Wilayah
    </div>

    <li class="nav-item">
        <a class="nav-link" href="/peta">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Seluruh Wilayah</span></a>
    </li>
    @foreach($wilayahs as $wilayah)
    <li class="nav-item">
        <a class="nav-link" href="/peta/{{$wilayah->id}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>{{$wilayah->nama}}</span></a>
    </li>
    @endforeach


</ul>
<!-- End of Sidebar -->