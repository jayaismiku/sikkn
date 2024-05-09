<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" href="{{ asset('material/favicons/favicon.ico') }}">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts and icons -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
	<!-- Nucleo Icons -->
	<link href="{{ asset('material/css/nucleo-icons.css') }}" rel="stylesheet" />
	<link href="{{ asset('material/css/nucleo-svg.css') }}" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	<!-- CSS Files -->
	<link id="pagestyle" href="{{ asset('material/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />

</head>

<body class="g-sidenav-show  bg-gray-100">
	<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
		<div class="sidenav-header">
			<i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
			<a class="navbar-brand m-0" href="./" target="_blank">
				<img src="{{ asset('material/favicons/favicon-32x32.png') }}" class="navbar-brand-img h-100" alt="main_logo">
				<span class="ms-1 font-weight-bold text-white">SI KKN UMBdg</span>
			</a>
		</div>
		<hr class="horizontal light mt-0 mb-2">
		<div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('home') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">dashboard</i>
						</div>
						<span class="nav-link-text ms-1">Dashboard</span>
					</a>
				</li>
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{ __('Administrator') }}</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="./pages/tables.html">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">admin_panel_settings</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Admin') }}</span>
					</a>
				</li>
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{ __('LPPM') }}</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="./pages/billing.html">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">supervisor_account</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Info LPPM') }}</span>
					</a>
				</li>
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{ __('Panitia KKN') }}</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="./pages/virtual-reality.html">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">manage_accounts</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Panitia') }}</span>
					</a>
				</li>
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{ __('Dosen Pendamping Lapangan') }}</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="./notifications.html">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">auto_stories</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Validasi Logbook') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="./notifications.html">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">book</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Validasi Laporan') }}</span>
					</a>
				</li>
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{ __('Mahasiswa') }}</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="./notifications.html">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">group</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Kelompok') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="./notifications.html">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">auto_stories</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Logbook') }}</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="./notifications.html">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">book</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Laporan') }}</span>
					</a>
				</li>
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{ __('Lokus Kegiatan KKN') }}</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="./notifications.html">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">my_location</i>
						</div>
						<span class="nav-link-text ms-1">{{ __('Info Desa') }}</span>
					</a>
				</li>
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
												<img src="material/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
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
								© 2024, made with <i class="fa fa-heart"></i> by <a href="#" class="font-weight-bold" target="_blank">Cave Team</a> for a better web.
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</main>

	<!--   Core JS Files   -->
  <script src="{{ asset('material/js/core/popper.min.js') }}" ></script>
	<script src="{{ asset('material/js/core/bootstrap.min.js') }}" ></script>
	<script src="{{ asset('material/js/plugins/perfect-scrollbar.min.js') }}" ></script>
	<script src="{{ asset('material/js/plugins/smooth-scrollbar.min.js') }}" ></script>
	<script>
		var win = navigator.platform.indexOf('Win') > -1;
		if (win && document.querySelector('#sidenav-scrollbar')) {
			var options = {
				damping: '0.5'
			}
			Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
		}
	</script>
	<!-- Github buttons -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="{{ asset('material/js/material-dashboard.min.js?v=3.1.0') }}"></script>

</body>
</html>
