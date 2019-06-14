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
                <a href="/user/create" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Delete Akun</a>
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