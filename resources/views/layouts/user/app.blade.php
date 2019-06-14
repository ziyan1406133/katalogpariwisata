<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ config('app.name', "Katalog Pariwisata") }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<link rel="stylesheet" href="{{asset('css/app.css')}}">-->
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/freelancer.min.css')}}">
    <link rel="shortcut icon" href="{{asset('storage/images/misc/LOGO KABUPATEN GARUT.png')}}">
    
    @yield('head')
	<!-- =======================================================
    Theme Name: Maxim
    Theme URL: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>
<body id="page-top">
<div id="app">
    @yield('content')
    <!-- Footer -->
    <footer class="footer text-center">
    <div class="container">
        <div class="row">

        <!-- Footer Social Icons -->
        <div class="col">
            <h4 class="text-uppercase mb-4">Around the Web</h4>
            <a class="btn btn-outline-light btn-social mx-1" target="_blank" href="https://www.facebook.com/pages/category/Government-Organization/Dinas-Kebudayaan-Dan-Pariwisata-Garut-565514513564176/">
            <i class="fab fa-fw fa-facebook-f"></i>
            </a>
            <a class="btn btn-outline-light btn-social mx-1" target="_blank" ref="https://twitter.com/disparbudgarut?lang=en">
            <i class="fab fa-fw fa-twitter"></i>
            </a>
        </div>

        <!-- Footer About Text -->
        <div class="col">
            <h4 class="text-uppercase mb-4">About Freelancer</h4>
            <p class="lead mb-0">Freelance is a free to use, MIT licensed Bootstrap theme created by
            <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
        </div>

        </div>
    </div>
    </footer>

    <!-- Copyright Section -->
    <section class="copyright py-4 text-center text-white">
    <div class="container">
        <small>Copyright &copy; Sekolah Tinggi Teknologi Garut 2019</small>
    </div>
    </section>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top position-fixed ">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Contact Form JavaScript -->
  <script src="{{asset('js/freelancer/jqBootstrapValidation.js')}}"></script>
  <script src="{{asset('js/freelancer/contact_me.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('js/freelancer/freelancer.min.js')}}"></script>
</body>
</html>