@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">{{$lokasi->nama}}</h1>
        </div>
        <div class="col">
            <div class="pull-right">
                <a target="_blank" href="/lokasi/{{$lokasi->id}}" class="btn btn-info btn-sm"><span class="fa fa-eye"></span></a>
                <a href="/lokasi/{{$lokasi->id}}/edit" class="btn btn-warning btn-sm"><span class="fa fa-pencil-alt"></span> Edit Lokasi</a>
                <a href="#" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Delete Lokasi</a>
            </div>
            <div class="modal fade" id="confirm" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi</h4>
                        </div>
                        <div class="modal-body">
                            <p align="left">Seluruh foto-foto untuk lokasi ini juga akan terhapus, apakah anda yakin untuk menghapus lokasi ini?</p>
                        </div>
                        <div class="modal-footer">
                            {!!Form::open(['action' => ['LokasiController@destroy', $lokasi->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                    <button type="button" class="btn  btn-md" data-dismiss="modal">Batal</button>
                                    {{Form::submit('Ya', ['class' => 'btn btn-danger btn-md'])}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    @include('layouts.messages')
    <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Kumpulan Foto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Tentang {{$lokasi->nama}}</a>
            </li>
            </ul>
        </div>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                {!! Form::open(['action' => 'FotoController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="row">
                    <div class="col-4">
                        {!! Form::file('gambar', ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! Form::text('lokasi_id', $lokasi->id, ['hidden' => 'hidden']) !!}
                    </div>
                    <div class="col">
                        {!! Form::submit('Tambah Foto', ['class' => 'btn btn-sm btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                <br>
                @foreach($lokasi->foto as $foto)
                <div class="foto-list">
                    <img src="{{asset('/storage/images/lokasi/'.$foto->gambar)}}" alt="">
                    {!!Form::open(['action' => ['FotoController@destroy', $foto->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {!! Form::submit('Hapus', ['class' => 'btn btn-sm btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
                @endforeach
            </div>
            <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                <p>
                    <img class="float-left" src="{{asset('/storage/images/lokasi/'.$lokasi->cover)}}">
                    Wilayah : {{$lokasi->wilayah->nama}} <br>
                    Alamat : {{$lokasi->alamat}} <br> 
                    Koordinat : {{$lokasi->longitude}}, {{$lokasi->latitude}} <br> <br>
                    {{$lokasi->deskripsi_singkat}}
                </p>
                <hr>
                {!!$lokasi->deskripsi_detail!!}
            </div>

        </div>
    </div>
@endsection