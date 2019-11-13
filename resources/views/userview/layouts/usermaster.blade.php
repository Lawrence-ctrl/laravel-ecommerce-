<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>@yield('title')</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- Favicons -->
	<link rel="shortcut icon" href="{{ asset('userdesign/images/favicon.ico') }}">
	<link rel="apple-touch-icon" href="{{ asset('userdesign/images/icon.png') }}">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	{{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">  --}}

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('userdesign/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('userdesign/css/plugins.css')}}">
	<link rel="stylesheet" href="{{ asset('userdesign/style.css')}}">

	<!-- Cusom css -->
   <link rel="stylesheet" href="{{ asset('userdesign/css/custom.css') }}">
   <link rel="stylesheet" href="{{ asset('./js/app.css') }}">
   @stack('css')

	<!-- Modernizer js -->
	
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		@include('userview.includes.header')
		<!-- //Header -->
		<!-- Start Search Popup -->
		@yield('content')
	<!-- //Main wrapper -->
    </div>
	<!-- JS Files -->
<script src="{{ asset('userdesign/js/vendor/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('userdesign/js/popper.min.js')}}"></script>
<script src="{{ asset('userdesign/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('userdesign/js/plugins.js')}}"></script>
<script src="{{ asset('userdesign/js/active.js')}}"></script>
<script src="{{ asset('userdesign/js/vendor/modernizr-3.5.0.min.js')}}"></script>	
<script src="{{asset('./js/app.js')}}"></script>
@stack('js')
</body>
</html>