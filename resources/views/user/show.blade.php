@extends('layouts.user.app')

@section('content')
@include('layouts.user.navbarshow')
<br><br><br><br><br>
<div class="container">
    <h2>{{$lokasi->nama}}</h2>
    <hr>
    <div class="row">
        <div class="col">
            <p>
                <img class="float-left" src="{{asset('/storage/images/lokasi/'.$lokasi->cover)}}">
                Wilayah : {{$wilayah->nama}} <br>
                Alamat : {{$lokasi->alamat}} <br> <br>
                {{$lokasi->deskripsi_singkat}}
            </p>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">
                                Tentang {{$lokasi->nama}}    
                            </button>									
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            @if($lokasi->deskripsi_detail == null)
                                <p>Belum ada deskripsi detail.</p>
                            @else
                                <p>{!!$lokasi->deskripsi_detail!!}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo">
                                Kumpulan Foto
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            @if(count($fotos) > 0)
                                @foreach($fotos as $foto)
                                    <img class="img-fluid" src="{{asset('/storage/images/lokasi/'.$foto->gambar)}}" style="margin-bottom:20px" alt="">
                                @endforeach
                            @else
                                <p>Belum ada foto yang diunggah.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            {!! $map['html'] !!}
            <br>
            <div class="pull-right">
                <a target="_blank" href="https://www.google.com/maps/dir//{{$lokasi->longitude}},{{$lokasi->latitude}}" class="btn btn-md btn-primary"> <i class="fa fa-location-arrow"></i> Petunjuk Arah</a>
            </div>
        </div>
    </div>
<br><br><br>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection

@section('head')
{!! $map['js'] !!}
@endsection