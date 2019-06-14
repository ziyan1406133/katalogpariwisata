@extends('layouts.admin.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Profil {{$admin->username}}</h1>
    <hr>
    <div class="card">
        <div class="card-body">
        @include('layouts.messages')
        {!! Form::model($admin, array('route' => array('user.update', $admin->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('nama', 'Nama Lengkap') !!}
                </div>
                <div class="col">
                    {!! Form::text('nama', $admin->nama, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('username', 'Username') !!}
                </div>
                <div class="col">
                    {!! Form::text('username', $admin->username, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('email', 'Email') !!}
                </div>
                <div class="col">
                    {!! Form::text('email', $admin->email, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        @if($admin->id == '1')
        {!! Form::text('status', $admin->status, ['class' => 'form-control', 'hidden' => 'hidden']) !!}
        @else
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('status', 'Status') !!}
                </div>
                <div class="col">
                    {!! Form::select('status', ['Admin' => 'Admin', 'Super Admin' => 'Super Admin'], $admin->status, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        @endif
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('Avatar') !!}
                </div>
                <div class="col">
                    {!! Form::file('foto', ['class' => 'form-control']) !!}
                </div>
                <div class="col">
                    <a href="/storage/images/avatar/{{$admin->foto}}">
                        <img src="{{asset('/storage/images/avatar/'.$admin->foto)}}" width="20%">
                    </a>
                </div>
            </div>
        </div>
        <br>
        {!! Form::submit('Submit', ['class' => 'btn btn-md btn-primary pull-right']) !!}
        {!! Form::close() !!}
        </div>
    </div>
    <hr>
@endsection