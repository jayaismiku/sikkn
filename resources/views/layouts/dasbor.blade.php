<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="auto">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Jaya Kuncara, Mulki Rezka, Dwi Purliantoro">
		<meta name="description" content="">

		<title>Dashboard Template · Bootstrap v5.3</title>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		
		<!-- Favicons -->
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
		<link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}">
		<meta name="theme-color" content="#712cf9">

		<style>
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				user-select: none;
			}

			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
					font-size: 3.5rem;
				}
			}

			.b-example-divider {
				width: 100%;
				height: 3rem;
				background-color: rgba(0, 0, 0, .1);
				border: solid rgba(0, 0, 0, .15);
				border-width: 1px 0;
				box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
			}

			.b-example-vr {
				flex-shrink: 0;
				width: 1.5rem;
				height: 100vh;
			}

			.bi {
				vertical-align: -.125em;
				fill: currentColor;
			}

			.nav-scroller {
				position: relative;
				z-index: 2;
				height: 2.75rem;
				overflow-y: hidden;
			}

			.nav-scroller .nav {
				display: flex;
				flex-wrap: nowrap;
				padding-bottom: 1rem;
				margin-top: -1px;
				overflow-x: auto;
				text-align: center;
				white-space: nowrap;
				-webkit-overflow-scrolling: touch;
			}

			.btn-bd-primary {
				--bd-violet-bg: #712cf9;
				--bd-violet-rgb: 112.520718, 44.062154, 249.437846;

				--bs-btn-font-weight: 600;
				--bs-btn-color: var(--bs-white);
				--bs-btn-bg: var(--bd-violet-bg);
				--bs-btn-border-color: var(--bd-violet-bg);
				--bs-btn-hover-color: var(--bs-white);
				--bs-btn-hover-bg: #6528e0;
				--bs-btn-hover-border-color: #6528e0;
				--bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
				--bs-btn-active-color: var(--bs-btn-hover-color);
				--bs-btn-active-bg: #5a23c8;
				--bs-btn-active-border-color: #5a23c8;
			}

			.bd-mode-toggle {
				z-index: 1500;
			}

			.bd-mode-toggle .dropdown-menu .active .bi {
				display: block !important;
			}
		</style>
		
		<!-- Custom styles for this template -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
		<link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
	</head>

	<body onload="startTime()">
		<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
			<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="/home">{{ config('app.name', 'Laravel') }}</a>
			<ul class="navbar-nav flex-row d-md-none">
				<li class="nav-item text-nowrap">
					<button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search"><i class="bi bi-search"></i></button>
				</li>
				<li class="nav-item text-nowrap">
					<button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="bi bi-list"></i></button>
				</li>
			</ul>
	
			<div id="navbarSearch" class="navbar-search w-100 collapse">
				<input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
			</div>
		</header>

		<div class="container-fluid">
			<div class="row">
				<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
					<div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
						<div class="offcanvas-header">
							<h5 class="offcanvas-title" id="sidebarMenuLabel">{{ config('app.name', 'Laravel') }}</h5>
							<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
						</div>
						<div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
							<ul class="nav flex-column">
								<li class="nav-item">
									<a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#"><i class="bi bi-speedometer"></i> {{ __('Dashboard') }}</a>
								</li>
								<li class="nav-item">
									<a class="nav-link d-flex align-items-center gap-2 collapsed" href="#"  data-toggle="collapse" data-target="#navAdmin" data-parent="#sidenav01"><i class="bi bi-person-lines-fill"></i> {{ __('Admin') }}</a>
									<div class="collapse" id="navAdmin" style="height: 0px;">
										<ul class="nav nav-list">
											<li><a href="#">Submenu Admin 1.1</a></li>
											<li><a href="#">Submenu Admin 1.2</a></li>
											<li><a href="#">Submenu Admin 1.3</a></li>
										</ul>
									</div>
								</li>
								<li class="nav-item">
									<a class="nav-link d-flex align-items-center gap-2" href="#"><i class="bi bi-people-fill"></i> {{ __('Panitia') }}</a>
								</li>
								<li class="nav-item">
									<a class="nav-link d-flex align-items-center gap-2" href="#"><i class="bi bi-person-workspace"></i> {{ __('DPL') }}</a>
								</li>
								<li class="nav-item">
									<a class="nav-link d-flex align-items-center gap-2" href="#"><i class="bi bi-person-badge"></i> {{ __('Mahasiswa') }}</a>
								</li>
								<li class="nav-item">
									<a class="nav-link d-flex align-items-center gap-2" href="#"><i class="bi bi-pin-map-fill"></i> {{ __('Desa') }}</a>
								</li>
							</ul>
					
							<hr class="my-3">
							<ul class="nav flex-column mb-auto">
								<li class="nav-item">
									<a class="nav-link d-flex align-items-center gap-2" href="{{ route('profile') }}"><i class="bi bi-pencil-square"></i> {{ __('Profil') }}</a>
								</li>
								<li class="nav-item">
									<a class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-left"></i> {{ __('Sign Out') }}</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</li>
								<li class="nav-item">
									<p class="nav-link d-flex align-items-center gap-2 fw-light"><i class="bi bi-alarm"></i> {{ date('d M Y') }} <span id="time"></span></p>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
		
				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
					@yield('content')
				</main>
			</div>
		</div>
	
		<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
		<script src="{{ asset('js/dashboard.js') }}"></script>
	</body>
</html>
