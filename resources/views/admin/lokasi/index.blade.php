@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">Daftar Admin</h1>
        </div>
        <div class="col">
            <a href="/lokasi/create" class="btn btn-success btn-sm pull-right"><span class="fa fa-plus"></span> Tambah Admin</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @include('layouts.messages')
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Wilayah</th>
                        <th>Alamat</th>
                        <th>Koordinat</th>
                        <th style="text-align:center">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($lokasis as $lokasi)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$lokasi->nama}}</td>
                    <td>{{$lokasi->wilayah->nama}}</td>
                    <td>{{$lokasi->alamat}}</td>
                    <td>{{$lokasi->longitude}}, {{$lokasi->latitude}}</td>
                    <td style="text-align:center">
                        <a href="/lokasi/{{$lokasi->id}}" class="btn btn-info btn-sm"><span class="fa fa-eye"></span></a>
                        <a href="/lokasi/{{$lokasi->id}}/edit" class="btn btn-warning btn-sm"><span class="fa fa-pencil-alt"></span></a>
                        @if(auth()->user()->status == 'Super Admin')
                        <a href="/lokasi/{{$lokasi->id}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirm{{$lokasi->id}}"><span class="fa fa-trash-alt"></span></a>
                        <div class="modal fade" id="confirm{{$lokasi->id}}" role="dialog">
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
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
@endsection
