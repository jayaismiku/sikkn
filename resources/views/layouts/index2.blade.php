<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Jaya Kuncara, Mulki Rezka, Dwi Purliantoro">

	<!-- CSRF Token -->
	<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

	<title>{{ config('app.name', 'Laravel') }}</title>

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

	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

	<!-- CSS Core -->
 	<link id="pagestyle" href="{{ asset('css/vendor.css') }}" rel="stylesheet" />
	<link id="pagestyle" href="{{ asset('material/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
	<!-- Custom style -->
	<link href="{{ asset('css/style-2.css') }}" rel="stylesheet" />

	{{-- <script src="{{ asset('js/jquery-3.7.1.min.js')}}"></script>
  	<script src="{{ asset('js/popper.min.js') }}" ></script> --}}

	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-6.5.2/css/all.min.css') }}">
	<script src="{{ asset('fontawesome-6.5.2/js/all.min.js') }}" crossorigin="anonymous"></script>

	<!-- Bootstrap -->
	{{-- <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-5.3.3/css/bootstrap.min.css') }}">
	<script src="{{ asset('bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script> --}}

	<!-- @yield('script') -->

	<!--   Core JS Files   -->
	<script src="{{ asset('js/app.js') }}" ></script>
	<script src="{{ asset('js/vendor.js') }}" ></script>
	<script src="{{ asset('material/js/plugins/perfect-scrollbar.min.js') }}" ></script>
	<script src="{{ asset('material/js/plugins/smooth-scrollbar.min.js') }}" ></script>
	{{-- <script src="{{ asset('material//js/plugins/chartjs.min.js')}}"></script> --}}
	
	<!-- jQuery DataTable Bootstrap -->
	{{-- <script src="{{ asset('js/dataTables.js')}}"></script>
	<script src="{{ asset('js/dataTables.bootstrap5.js')}}"></script> --}}

	<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
	{{-- <script src="{{ asset('material/js/material-dashboard.min.js?v=3.1.0') }}"></script> --}}
	
	<!-- include summernote css/js -->
	<link href="{{ asset('summernote/summernote-lite.css') }}" rel="stylesheet">
	<script src="{{ asset('summernote/summernote-lite.js') }}"></script>

	<!-- Custom Script -->
	{{-- <script src="{{ asset('js/custom.js')}}"></script> --}}

</head>

<body class="g-sidenav-show  bg-gray-100">
	<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
		<div class="sidenav-header">
			<i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
			<a class="navbar-brand m-0" href="./" target="_blank">
				<img src="{{ asset('material/favicons/favicon-32x32.png') }}" class="navbar-brand-img h-100" alt="main_logo">
				<span class="ms-1 font-weight-bold text-white">SI-KKN UMBdg</span>
			</a>
		</div>
		<hr class="horizontal light mt-0 mb-2">
		<div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
			<ul class="navbar-nav">
				@if(Auth::user()->role == 'admin')
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('home') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">dashboard</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Dashboard') }}</span>
					</a>
				</li>
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{ __('Master Data') }}</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('fakultas.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">apartment</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Fakultas') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('prodi.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">domain</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Program Studi') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('dosen.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">groups</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Dosen') }}</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->role == 'panitia' || Auth::user()->role == 'admin')
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{ __('Panitia') }}</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('mahasiswa.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">account_box</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Mahasiswa') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('kelompok.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">diversity_2</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Kelompok') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('pengelompokan.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">diversity_3</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Pengelompokan') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('desa.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">holiday_village</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Desa') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('perangkat.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">account_circle</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Perangkat Desa') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('post.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">campaign</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Berita') }}</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->role == 'pemonev' || Auth::user()->role == 'admin')
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{ __('Pemonev') }}</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('dasbor.pemonev') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">supervisor_account</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Dashboard') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('monev.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">verified</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Monev Kegiatan') }}</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->role == 'dpl' || Auth::user()->role == 'admin')
        		<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{ __('Dosen Pendamping Lapangan') }}</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('dasbor.dpl') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">supervisor_account</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Dashboard') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('kunjungan.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">commute</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Kunjungan') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('logbook.validasi') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">menu_book</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Validasi Logbook') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('laporan.validasi') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">library_books</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Validasi Laporan') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('desa.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">holiday_village</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Desa') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('perangkat.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">account_circle</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Perangkat Desa') }}</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->role == 'mahasiswa' || Auth::user()->role == 'admin')
        <li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{ __('Mahasiswa') }}</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('dasbor.mahasiswa') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">manage_accounts</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Dashboard') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('logbook.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">auto_stories</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Logbook') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('laporan.index') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">book</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Laporan') }}</span>
					</a>
				</li>
				@endif
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{ __('Akun Pengguna') }}</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('profile') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">person</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Profil') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('profile.ubah.katasandi') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">person</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Ubah Kata Sandi') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">logout</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Keluar') }}</span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
					</a>
				</li>
			</ul>
		</div>
		<div class="sidenav-footer position-absolute w-100 bottom-0 ">
			<div class="mx-3 container">
				<a class="btn btn-outline-info w-40 col-sm" href="#" type="button">
					<i class="material-icons opacity-10">article</i>
				</a>
				<a class="btn btn-outline-info w-40 col-sm" href="#" type="button">
					<i class="material-icons opacity-10">person_pin</i>
				</a>
			</div>
		</div>
	</aside>

	<main class="main-content border-radius-lg ">
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
			<div class="container-fluid py-1 px-3">
        @yield('pathway')
								
				<div class="mt-sm-0 me-md-0 me-sm-4" id="navbar">
					<ul class="navbar-nav justify-content-end me-md-2 me-sm-4">
						<li class="nav-item d-xl-none pe-2 d-flex align-items-center">
							<a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
								</div>
							</a>
						</li>
						<li class="nav-item dropdown pe-2 d-flex align-items-center">
							<a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="material-icons">notifications_active</i>
							</a>
							<ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
								<li class="mb-2">
									<a class="dropdown-item border-radius-md" href="javascript:;">
										<div class="d-flex py-1">
											<div class="my-auto">
												<img src="{{ asset('material/img/team-2.jpg') }}" class="avatar avatar-sm  me-3 ">
											</div>
											<div class="d-flex flex-column justify-content-center">
												<h6 class="text-sm font-weight-normal mb-1">
													<span class="font-weight-bold">New message</span> from Laur
												</h6>
												<p class="text-xs text-secondary mb-0">
													<i class="fa fa-clock me-1"></i> 13 minutes ago
												</p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item d-flex align-items-center">
							<a class="nav-link text-body font-weight-bold px-0" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<span class="material-icons">logout</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End Navbar -->

		<div class="container-fluid py-4 main-content">
			@yield('content')
			
			<footer class="footer py-4">
				<div class="container-fluid">
					<div class="row align-items-center justify-content-lg-between">
						<div class="col-lg-6 mb-lg-0 mb-4">
							<div class="copyright text-center text-sm text-muted text-lg-start">
								© 2024, programmed by <a href="#" class="font-weight-bold" target="_blank">KKN Team</a> 
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</main>

</body>
</html>