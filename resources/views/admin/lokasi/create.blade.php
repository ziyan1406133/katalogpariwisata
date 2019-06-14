@extends('layouts.admin.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Objek Wisata</h1>
    <hr>
    <div class="card">
        <div class="card-body">
        @include('layouts.messages')
        {!! Form::open(['action' => 'LokasiController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('nama', 'Nama Objek Wisata') !!}
                </div>
                <div class="col">
                    {!! Form::text('nama', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('wilayah', 'Wilayah') !!}
                </div>
                <div class="col">
                    <select name="wilayah" id="wilayah" class="form-control" required>
                        <option value="">Pilih Salah Satu...</option>
                        @foreach($wilayahs as $wilayah)
                            <option value="{{$wilayah->id}}">{{$wilayah->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('alamat', 'Alamat') !!}
                </div>
                <div class="col">
                    {!! Form::textarea('alamat', '', ['class' => 'form-control', 'required' => 'required', 'rows' => '3']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('nama', 'Koordinat') !!}
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            {!! Form::text('longitude', '', ['class' => 'form-control', 'required' => 'required', 'Placeholder' => 'Longitude']) !!}
                        </div>
                        <div class="col">
                            {!! Form::text('latitude', '', ['class' => 'form-control', 'required' => 'required', 'Placeholder' => 'Latitude']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('deskripsi_singkat', 'Deskripsi Singkat') !!}
                </div>
                <div class="col">
                    {!! Form::textarea('deskripsi_singkat', '', ['class' => 'form-control', 'required' => 'required', 'rows' => '5']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-3">
                    {!! Form::label('Cover Foto') !!}
                </div>
                <div class="col">
                    {!! Form::file('foto', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group">
            {!! Form::label('deskripsi_detail', 'Deskripsi Detail') !!}
            {!! Form::textarea('deskripsi_detail', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'required' => 'required', 'rows' => '15']) !!}
        </div>
        <br>
        {!! Form::submit('Submit', ['class' => 'btn btn-md btn-primary pull-right']) !!}
        {!! Form::close() !!}
        </div>
    </div>
    <hr>
@endsection

@section('script')
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
@endsection