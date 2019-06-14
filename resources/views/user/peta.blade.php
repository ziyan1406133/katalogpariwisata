<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ config('app.name', "Katalog Pariwisata") }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! $map['js'] !!}

    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('storage/images/misc/LOGO KABUPATEN GARUT.png')}}">
</head>
<body>
    <div id="wrapper">
        @include('layouts.user.sidebarpeta')
        <div id="content-wrapper"  class="d-flex flex-column">
            <div id="content">
                @include('layouts.user.navbarpeta')
                <div class="container-fluid">
                    @if(count($lokasis) > 0)
                    {!! $map['html'] !!}
                    @else
                        <h4>Belum ada data pariwisata di wilayah ini.</h4>
                    @endif
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright &copy; Sekolah Tinggi Teknologi Garut 2019</span>
                </div>
              </div>
            </footer>
            <!-- End of Footer -->
        </div>
    </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/admin/sb-admin-2.min.js')}}"></script>

</body>
</html>