@extends('layouts.user.app')

@section('content')
@include('layouts.user.navbar')
<br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-3">
            <h2>Objek Wisata</h2>
        </div>
        <div class="col">
            <div class="pull-right">
                {!! Form::open(['action' => 'LokasiController@search', 'method' => 'POST']) !!}
                <div class="form-group">
                    <div class="row">
                        <div class="col-5">
                            <select name="wilayah" id="wilayah" class="form-control">
                                <option value="0">Wilayah Manapun</option>
                                @foreach($wilayahs as $wilayah)
                                    <option value="{{$wilayah->id}}">{{$wilayah->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    {!! Form::text('search', '', ['class' => 'form-control', 'Placeholder' => 'Search...']) !!}
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-md btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <section class="page-section portfolio" id="jelajah">
        <div class="container">

            <div class="row">
                @if(count($lokasis) > 0)
                    @foreach($lokasis as $lokasi)

                        <div class="col-md-6 col-lg-4">
                            <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#modal{{$lokasi->id}}">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                                <img class="img-cropped" src="{{asset('storage/images/lokasi/'.$lokasi->cover)}}" alt="">
                                <div class="text-block"> 
                                    <h6>{{$lokasi->nama}}</h6>
                                </div>
                            </div>
                        </div>

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
                    {{$lokasis->links()}}
                @else
                    <p>Data tidak ditemukan.</p>
                @endif
            </div>
            <!-- /.row -->
        </div>
    </section>
<br><br><br><br><br>
</div>
@endsection