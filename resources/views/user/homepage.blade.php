@extends('layouts.user.app')

@section('content')
    @include('layouts.user.navbarhome')
    @include('layouts.user.header')
    
    <!-- Portfolio Section -->
    <section class="page-section portfolio" id="jelajah">
        <div class="container">

            <!-- Portfolio Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Objek Wisata</h2>

            <!-- Icon Divider -->
            <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
            </div>

            <!-- Portfolio Grid Items -->
            <div class="row">
                @foreach($lokasis as $lokasi)
                    <!-- Portfolio Item 1 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#modal{{$lokasi->id}}">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                            <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-cropped" src="{{asset('storage/images/lokasi/'.$lokasi->cover)}}" alt="">
                        </div>
                    </div>

                    <!-- Portfolio Modal 1 -->
                    <div class="portfolio-modal modal fade" id="modal{{$lokasi->id}}" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="fas fa-times"></i>
                            </span>
                            </button>
                            <div class="modal-body text-center">
                            <div class="container">
                                <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title -->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$lokasi->nama}}</h2>
                                    <!-- Icon Divider -->
                                    <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image -->
                                    <img class="img-fluid rounded mb-5" src="{{asset('storage/images/lokasi/'.$lokasi->cover)}}" alt="">
                                    <!-- Portfolio Modal - Text -->
                                    <p class="mb-5">{{$lokasi->deskripsi_singkat}}</p>
                                    <a class="btn btn-primary" href="/lokasi/{{$lokasi->id}}">
                                    Lihat Lokasi
                                    </a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.row -->
            <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-dark" href="/lokasi">
                Lihat Lebih Banyak
            </a>
            </div>
        </div>
        </section>

        <!-- About Section -->
        <section class="page-section bg-tentang text-white mb-0" id="tentang">
        <div class="container">

            <!-- About Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-white">Tentang</h2>

            <!-- Icon Divider -->
            <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
            </div>

            <!-- About Section Content -->
            <div class="row">
            <div class="col-lg-4 ml-auto">
                <p class="lead">Selamat datang di Kabupaten Garut, dimana keindahan alam priangan berpadu-padan dengan kekayaan produk budaya masyarakatnya. Garis pantai-nya yang terpanjang di Jawa Barat juga melengkapi rangkaian pegunungannya. Santapan lezat khasnya hanya bisa dikalahkan oleh ramah tamah warganya. Selamat datang di Garut, Surga di Tanah Priangan.</p>
            </div>
            <div class="col-lg-4 mr-auto">
                <p class="lead">Website ini dibuat untuk menyajikan informasi mengenai pariwisata unggulan di Kabupaten Garut, mulai dari Wisata Alam, Peninggalan Bersejarah, dan tempat rekreasi lainnya. Juga dilengkapi dengan sebaran peta dan terintegrasi dengan Google Maps untuk mencari petunjuk arah menuju lokasi pariwisata.</p>
            </div>
            </div>

        </div>
        </section>
@endsection

