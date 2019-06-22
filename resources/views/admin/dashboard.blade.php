@extends('layouts.admin.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Halo {{auth()->user()->username}}, Selamat Datang.</h1>
    @include('layouts.messages')
    <div class="row">
        <div class="col">
            <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Wilayah</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jml_wilayah}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-map fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col">
            <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Objek Wisata</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jml_wilayah}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-map-signs fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        
        <div class="col">
            <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Foto Objek Wisata</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jml_foto}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-images fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!--
        <div class="col">
            <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Admin</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jml_admin}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        -->
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Petunjuk Penggunaan</h6>
                </div>
                <div class="card-body">
                    <p>Selamat datang di aplikasi katalog pariwisata Kabupaten Garut. Anda bertugas mengelola data-data objek wisata di Kabupaten Garut yang dibagi menjadi beberapa wilayah. Anda berwenang untuk :</p>
                    <ul>
                        <li>Menambah, mengedit, dan menghapus wilayah di Menu Wilayah.</li>
                        <li>Menambah, mengedit, dan menghapus objek wisata di Menu Objek Wisata.</li>
                        <li>Menambah,  dan menghapus foto-foto objek wisata ketika anda membuka suatu objek wisata dari Menu Objek Wisata.</li>
                        <li>Mengedit dan mengubah password akun milik diri sendiri.</li>
                        <!--
                        @if(auth()->user()->status == "Super Admin")
                            <li>Menambah, mengedit, dan menghapus akun admin di Menu Kelola Admin</li>
                        @endif
                        -->
                    </ul>
                    
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tentang Aplikasi</h6>
                </div>
                <div class="card-body">
                    Aplikasi ini bertujuan untuk menyediakan informasi objek pariwisata kepada wisatawan dari luar Kabupaten Garut dilengkapi dengan sebaran lokasi pada peta <i>Google Maps</i>. <br>
                    <br>
                    Dibuat Oleh : <br>
                    Elga Sukma Wijaya <br>
                    1506028
                </div>
            </div>
        </div>
    </div>
@endsection