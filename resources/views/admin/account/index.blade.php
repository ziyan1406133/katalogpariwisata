@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">Daftar Admin</h1>
        </div>
        <div class="col">
            <a href="/user/create" class="btn btn-success btn-sm pull-right"><span class="fa fa-plus"></span> Tambah Admin</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @include('layouts.messages')
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>E-Mail</th>
                        <th>Avatar</th>
                        <th>Status</th>
                        <th style="text-align:center">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                <tr>
                    <td>{{$admin->nama}}</td>
                    <td>{{$admin->username}}</td>
                    <td>{{$admin->email}}</td>
                    <td><img src="{{asset('/storage/images/avatar/'.$admin->foto)}}" width = "50px"alt=""></td>
                    <td>{{$admin->status}}</td>
                    <td style="text-align:center">
                        <a href="/user/{{$admin->id}}" class="btn btn-info btn-sm"><span class="fa fa-eye"></span></a>
                        <a href="/user/{{$admin->id}}/edit" class="btn btn-warning btn-sm"><span class="fa fa-pencil-alt"></span></a>
                        @if((auth()->user()->status == 'Super Admin') && ($admin->id != '1'))
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirm{{$admin->id}}"><span class="fa fa-trash-alt"></span></a>
                        <div class="modal fade" id="confirm{{$admin->id}}" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Konfirmasi</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p align="left">Apakah anda yakin untuk menghapus akun ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        {!!Form::open(['action' => ['UserController@destroy', $admin->id], 'method' => 'POST'])!!}
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