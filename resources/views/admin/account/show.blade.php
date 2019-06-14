@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">Profil {{$admin->username}}</h1>
        </div>
        <div class="col">
            <div class="pull-right">
                @if((auth()->user()->id == $admin->id) || (auth()->user()->status == 'Super Admin'))
                <a href="/user/{{$admin->id}}/edit" class="btn btn-warning btn-sm"><span class="fa fa-pencil-alt"></span> Edit Profil</a>
                @endif
                @if((auth()->user()->status == 'Super Admin') && ($admin->id != '1'))
                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirm"><span class="fa fa-trash-alt"></span> Delete Akun</a>
                <div class="modal fade" id="confirm" role="dialog">
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
            </div>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            @include('layouts.messages')
            <div class="row">
                <div class="col-3">
                    <img src="{{asset('/storage/images/avatar/'.$admin->foto)}}" width="100%" alt="">
                </div>
                <div class="col">
                    <table class="table table-borderless table-responsive">
                        <tr>
                            <td>Nama</td>
                            <td>: {{$admin->nama}}</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>: {{$admin->username}}</td>
                        </tr>
                        <tr>
                            <td>E-Mail</td>
                            <td>: {{$admin->email}}</td>
                        </tr>
                        @if(auth()->user()->status == 'Super Admin')
                        <tr>
                            <td>Status</td>
                            <td>: {{$admin->status}}</td>
                        </tr>
                        @endif
                    </table>
                    @if(auth()->user()->id == $admin->id)
                    <a href="/editpassword/{{$admin->id}}/user" class="btn btn-gray btn-sm pull-right"><span class="fa fa-lock"></span> Ubah Password</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection