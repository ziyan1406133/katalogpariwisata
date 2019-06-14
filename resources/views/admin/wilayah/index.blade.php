@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">Daftar Wilayah</h1>
        </div>
        <div class="col">
            <a href="#" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#tambahwilayah"><span class="fa fa-plus"></span> Tambah Wilayah</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th style="text-align:center">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($wilayahs as $wilayah)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$wilayah->nama}}</td>
                    <td style="text-align:center">
                        <a href="/user/{{$wilayah->id}}" class="btn btn-info btn-sm"><span class="fa fa-eye"></span></a>
                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{$wilayah->id}}"> <span class="fa fa-pencil-alt"></span></a>
                        <div class="modal fade" id="edit{{$wilayah->id}}" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Wilayah</h4>
                                    </div>
                                    {!! Form::model($wilayah, array('route' => array('wilayah.update', $wilayah->id), 'method' => 'PUT')) !!}
                                    <div class="modal-body">
                                        {!! Form::label('nama', 'Nama Wilayah') !!}
                                        {!! Form::text('nama', $wilayah->nama, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-md btn-primary pull-right']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        @if(auth()->user()->status == 'Super Admin')
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirm{{$wilayah->id}}"><span class="fa fa-trash-alt"></span></a>
                        <div class="modal fade" id="confirm{{$wilayah->id}}" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Konfirmasi</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p align="left">Seluruh objek wisata yang terdapat di wilayah ini juga akan terhapus, apakah anda yakin untuk menghapus wilayah ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        {!!Form::open(['action' => ['WilayahController@destroy', $wilayah->id], 'method' => 'POST'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                                <button type="button" class="btn btn-md" data-dismiss="modal">Batal</button>
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
    <div class="modal fade" id="tambahwilayah" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Wilayah</h4>
                </div>
                {!! Form::open(['action' => 'WilayahController@store', 'method' => 'POST']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('nama', 'Nama Wilayah') !!}
                        {!! Form::text('nama', '', ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                {!! Form::submit('Submit', ['class' => 'btn btn-md btn-primary pull-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection