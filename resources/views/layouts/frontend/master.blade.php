<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>拾本書堂</title>

	<!-- Scripts -->
	<script src="{{ asset('js/frontend.js') }}" defer></script>

	<!-- Plugin JavaScript -->
	<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
	<script src="{{ asset('vendor/jquery-cookie/jquery.cookie.js') }}" defer></script>

	<!-- Custom scripts for all pages-->
	{{-- <script src="{{ asset('js/admin/sb-admin.min.js') }}" defer></script> --}}
	@stack('CustomJS')

    <!-- Styles -->
	<link href="{{ asset('css/frontend/frontend.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet" type='text/css'>

    <!-- Page level plugin CSS-->
	<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
	@stack('CustomCSS')
</head>
<body id="page-top">
	@include('partials.frontend.navbar')

	<div id="wrapper">
		@include('partials.frontend.sidebar')

    	<div id="content-wrapper">

			@yield('content')

			@include('partials.frontend.footer')
		</div>

  	</div>

	{{-- <a id="go_top_btn" class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a> --}}
</body>
</html>
