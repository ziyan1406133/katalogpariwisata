@extends('layouts.admin.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Admin</h1>
    <hr>
    <div class="card">
        <div class="card-body">
        @include('layouts.messages')
        {!! Form::open(['action' => 'UserController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('nama', 'Nama Lengkap') !!}
                </div>
                <div class="col">
                    {!! Form::text('nama', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('username', 'Username') !!}
                </div>
                <div class="col">
                    {!! Form::text('username', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('email', 'Email') !!}
                </div>
                <div class="col">
                    {!! Form::text('email', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('status', 'Status') !!}
                </div>
                <div class="col">
                    {!! Form::select('status', ['Admin' => 'Admin', 'Super Admin' => 'Super Admin'], 'Admin', ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('password', 'Password') !!}
                </div>
                <div class="col">
                    {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('password1', 'Konfirmasi Password') !!}
                </div>
                <div class="col">
                    {!! Form::password('password1', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('Avatar') !!}
                </div>
                <div class="col">
                    {!! Form::file('foto', ['class' => 'form-control']) !!}
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