<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Jaya Kuncara, Mulki Rezka, Dwi Purliantoro">
  
  <title>@yield('title')</title>

	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{{ asset('favicons/ms-icon-144x144.png') }}">
	<meta name="theme-color" content="#ffffff">    

	<!-- Fonts and icons -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

	<!-- Nucleo Icons -->
	<link href="{{ asset('material/css/nucleo-icons.css') }}" rel="stylesheet" />
	<link href="{{ asset('material/css/nucleo-svg.css') }}" rel="stylesheet" />

	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

	<!-- CSS Files -->
	<link id="pagestyle" href="{{ asset('material/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />

	<!-- Custom style -->
	<link href="{{ asset('css/style-2.css') }}" rel="stylesheet" />
</head>

<body class="pendaftaran">

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('https://images.unsplash.com/photo-1717416699821-b911fa4fd252?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover;">
              </div>
            </div>
            @yield('content')
          </div>
        </div>
      </div>
    </section>
  </main>
  
	<!--   Core JS Files   -->
  <script src="{{ asset('material/js/core/popper.min.js') }}" ></script>
	<script src="{{ asset('material/js/core/bootstrap.min.js') }}" ></script>

  <!-- Nepcha Analytics (nepcha.com) -->
  <script defer data-site="www.umbandung.ac.id" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

</body>

</html>