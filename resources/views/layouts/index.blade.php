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
	<!-- tabel style -->


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
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('broadcastmessage') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">dashboard</i>
						</div>
						<span class="nav-link-text ms-1">Broadcast Message</span>
					</a>
				</li>
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">MASTER DATA</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('datadosen') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">group</i>
						</div>
						<span class="nav-link-text ms-1">Dosen</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('datamahasiswa') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">group</i>
						</div>
						<span class="nav-link-text ms-1">Mahasiswa</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('desa') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">my_location</i>
						</div>
						<span class="nav-link-text ms-1">Desa</span>
					</a>
				</li>
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">LPPM</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('panitia') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">admin_panel_settings</i>
						</div>
						<span class="nav-link-text ms-1">Panitia</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('timpemonev') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">supervisor_account</i>
						</div>
						<span class="nav-link-text ms-1">Tim Pemonev</span>
					</a>
				</li>
        <li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">DOSEN</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="./pages/billing.html">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">supervisor_account</i>
						</div>
						<span class="nav-link-text ms-1">Dosen Pembimbing</span>
					</a>
				</li>
        <li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">MAHASISWA</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="./pages/virtual-reality.html">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">manage_accounts</i>
						</div>
						<span class="nav-link-text ms-1">Mahasiswa</span>
					</a>
				</li>
        <li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">DESA</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="./notifications.html">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">my_location</i>
						</div>
						<span class="nav-link-text ms-1">Desa</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="./notifications.html">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">group</i>
						</div>
						<span class="nav-link-text ms-1">Kepala Desa</span>
					</a>
				</li>
				<li class="nav-item mt-3">
					<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="{{ route('profile') }}">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">person</i>
						</div>
						<span class="nav-link-text ms-1">Profil</span>
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
								© 2024, made with <i class="fa fa-heart"></i> by <a href="#" class="font-weight-bold" target="_blank">KKN Team</a> 
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</main>

	@yield('script')

	<!--   Core JS Files   -->
  <script src="{{ asset('material/js/core/popper.min.js') }}" ></script>
	<script src="{{ asset('material/js/core/bootstrap.min.js') }}" ></script>
	<script src="{{ asset('material/js/plugins/perfect-scrollbar.min.js') }}" ></script>
	<script src="{{ asset('material/js/plugins/smooth-scrollbar.min.js') }}" ></script>
	<script src="{{ asset('material//js/plugins/chartjs.min.js')}}"></script>

	<script src="{{ asset('material/js/dataTables/jquery.dataTables.js')}}"></script>
            <script src="{{ asset('material/js/dataTables/dataTables.bootstrap.js')}}"></script>
            <script>
                $(document).ready(function () {
                    $('#dataTables-example').dataTable();
                });
            </script>
	<script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Akses",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Akses Bulanan",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Laporan",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [10, 30, 50, 100, 120, 200, 250, 300, 350],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
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
