@extends('layouts.admin.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Profil {{$admin->username}}</h1>
    <hr>
    <div class="card">
        <div class="card-body">
        @include('layouts.messages')
        {!! Form::model($admin, array('route' => array('password', $admin->id), 'method' => 'PUT')) !!}
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('oldpassword', 'Password Lama') !!}
                </div>
                <div class="col">
                    {!! Form::password('oldpassword', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('password1', 'Password Baru') !!}
                </div>
                <div class="col">
                    {!! Form::password('password1', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('password2', 'Konfirmasi Password Baru') !!}
                </div>
                <div class="col">
                    {!! Form::password('password2', ['class' => 'form-control', 'required' => 'required']) !!}
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