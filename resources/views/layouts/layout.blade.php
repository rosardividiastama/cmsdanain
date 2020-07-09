<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap  -->
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
	{{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
	
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
  
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- plugins:css -->
	<link rel="stylesheet" href="{{ asset('asset/iconfonts/mdi/css/materialdesignicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/vendor.bundle.base.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/vendor.bundle.addons.css') }}">

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

	<link rel="shortcut icon" href="{{ asset('asset/images/favicon.png') }}" />
	<link rel="shortcut icon" href="asset/images/favicon.png" />

	<title>CMS - @yield('tittle')</title>
	@yield('extracss')
</head>
<body>
	<div class="container-scroller">
		@include('layouts.navbar')
		<div class="container-fluid page-body-wrapper">
			@include('layouts.sidebar')
				@yield('content')
		</div>
	</div>

	<!-- plugins:js -->
	<script src="asset/js/vendor.bundle.base.js"></script>
	<script src="asset/js/vendor.bundle.addons.js"></script>
	<script src="js/off-canvas.js"></script>
	<script src="js/misc.js"></script>
	<script src="js/dashboard.js"></script>

	@yield('extrajs')

	
</body>
</html>