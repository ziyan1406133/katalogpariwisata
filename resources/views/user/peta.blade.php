<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', "Katalog Pariwisata") }}</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/admin/sb-admin.min.js')}}"></script>
    {!! $map['js'] !!}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet" >
</head>
<body>
    @include('layouts.user.navbarpeta')

    <div id="wrapper">
        @include('layouts.user.sidebarpeta')
        <div id="content-wrapper">
            <div class="container-fluid">
                @if(count($lokasis) > 0)
                {!! $map['html'] !!}
                @else
                    <h4>Belum ada data pariwisata di wilayah ini.</h4>
                @endif
            </div>
        </div>
    </div>
</body>
</html>