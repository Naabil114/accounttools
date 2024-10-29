<!DOCTYPE html>
<html lang="en">

<head>
	<title>AccountTools</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="{{asset('booksaw/css/normalize.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('booksaw/icomoon/icomoon.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('booksaw/css/vendor.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('booksaw/style.css')}}">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
        <!-- Icon Font Stylesheet -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
  <link href="{{asset('bagus/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('bagus/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
	<link href="{{asset('bagus/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
  <link href="{{asset('bagus/css/style.css')}}" rel="stylesheet">

	<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_id') }}"></script>


		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('lte/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('lte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('lte/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script></head>

				

</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

	<div id="header-wrap">

		

		<header id="header">
			<div class="container-fluid">
				<div class="row">

					<div class="col-md-2">
						<div class="main-logo d-flex">
              <img src="{{ asset('storage/user/' . Auth::user()->foto) }}" alt="Foto Profil" class="img-circle"  style="border-radius: 50%;" width="50px" height="50px"> <a href="#" class="mt-3 ms-2 justify-content-left">{{Auth::user()->nama}}</a>
							
						</div>

					</div>

					<div class="col-md-10">

						<nav id="navbar">
							<div class="main-menu stellarnav">
								<ul class="menu-list">
									<li class="menu-item {{ Request::path() === 'welcome' ? 'active' : '';}}"><a href="{{url('welcome')}}">Home</a></li>
									<!-- <li class="menu-item has-sub">
										<a href="#pages" class="nav-link">Pages</a>

										<ul>
											<li class="active"><a href="#home">Home</a></li>
											<li><a href="index.html">About</a></li>
											<li><a href="index.html">Styles</a></li>
											<li><a href="index.html">Blog</a></li>
											<li><a href="index.html">Post Single</a></li>
											<li><a href="index.html">Our Store</a></li>
											<li><a href="index.html">Product Single</a></li>
											<li><a href="index.html">Contact</a></li>
											<li><a href="index.html">Thank You</a></li>
										</ul>

									</li> -->
									<li class="menu-item {{ Request::path() === 'shop' ? 'active' : '';}}"><a href="{{url('shop')}}" class="nav-link">Shop</a></li>
									<li class="menu-item {{ Request::path() === 'trans' ? 'active' : '';}}"><a href="{{url('trans')}}" class="nav-link">Transaksi</a></li>
									<li class="menu-item {{ Request::path() === 'kritik' ? 'active' : '';}}"><a href="{{url('kritik')}}" class="nav-link">Ulasan Pelanggan</a></li>
									<li class="menu-item"><a href="{{url('logout')}}" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i></a></li>
								</ul>

								<div class="hamburger">
									<span class="bar"></span>
									<span class="bar"></span>
									<span class="bar"></span>
								</div>

							</div>
						</nav>

					</div>

				</div>
			</div>
		</header>

	</div><!--header-wrap-->
  @yield('content')

	

	

	<script src="{{asset('booksaw/js/jquery-1.11.0.min.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src="{{asset('booksaw/js/plugins.js')}}"></script>
	<script src="{{asset('booksaw/js/script.js')}}"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('bagus/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('bagus/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('bagus/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('bagus/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('bagus/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    

    <!-- Template Javascript -->
    <script src="{{asset('bagus/js/main.js')}}"></script>
		@include('sweetalert::alert')
</body>

</html>