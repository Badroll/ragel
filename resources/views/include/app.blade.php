<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tiga Putri</title>
		<link rel="shortcut icon" type="image/png" href="{{ asset('assets/src/assets/images/logos/logo1.jpg') }}" />
		<link rel="stylesheet" href="{{ asset('assets/src/assets/css/styles.min.css') }}" />
	</head>
	<body>
		<script src="{{ asset('assets/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
		<div id="wrapper">
		<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
			data-sidebar-position="fixed" data-header-position="fixed">
			<!-- Sidebar Start -->
			<aside class="left-sidebar">
				<!-- Sidebar scroll-->
				<div>
					<div class="brand-logo d-flex align-items-center justify-content-between">
						<a href="#" class="text-nowrap logo-img">
						<img src="{{ asset('assets/src/assets/images/logos/logo1.jpg') }}" width="180" alt="" />
						</a>
						<div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
							<i class="ti ti-x fs-8"></i>
						</div>
					</div>
					<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
						<ul id="sidebarnav">
							<li class="nav-small-cap">
								<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
								<span class="hide-menu">DATA MASTER</span>
							</li>
							<li class="sidebar-item">
								<a class="sidebar-link" href="{{ url('kontak') }}" aria-expanded="false">
								<span>
								<i class="ti ti-address-book"></i>
								</span>
								<span class="hide-menu">Customer/Supplier</span>
								</a>
							</li>
							<li class="sidebar-item">
								<a class="sidebar-link" href="{{ url('kategori') }}" aria-expanded="false">
								<span>
								<i class="ti ti-layout-dashboard"></i>
								</span>
								<span class="hide-menu">Kategori Barang</span>
								</a>
							</li>
							<li class="sidebar-item">
								<a class="sidebar-link" href="{{ url('barang') }}" aria-expanded="false">
								<span>
								<i class="ti ti-hanger-2"></i>
								</span>
								<span class="hide-menu">Barang</span>
								</a>
							</li>
							<li class="nav-small-cap">
								<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
								<span class="hide-menu">TRANSAKSI</span>
							</li>
							<li class="sidebar-item">
								<a class="sidebar-link" href="{{ url('transaksi') }}?type=in" aria-expanded="false">
								<span>
								<i class="ti ti-file-invoice"></i>
								</span>
								<span class="hide-menu">Pengadaan</span>
								</a>
							</li>
							<li class="sidebar-item">
								<a class="sidebar-link" href="{{ url('transaksi') }}?type=out" aria-expanded="false">
								<span>
								<i class="ti ti-file-dollar"></i>
								</span>
								<span class="hide-menu">Penjualan</span>
								</a>
							</li>
							<li class="sidebar-item">
								<a class="sidebar-link" href="{{ url('transaksi/laporan') }}?type=all&periode=s" aria-expanded="false">
								<span>
								<i class="ti ti-report"></i>
								</span>
								<span class="hide-menu">Laporan</span>
								</a>
							</li>
						</ul>
					</nav>
					<!-- End Sidebar navigation -->
				</div>
				<!-- End Sidebar scroll-->
			</aside>
			<!--  Sidebar End -->
			<!--  Main wrapper -->
			<div class="body-wrapper">
				<!--  Header Start -->
				<header class="app-header">
					<nav class="navbar navbar-expand-lg navbar-light">
						<!-- <ul class="navbar-nav">
							<li class="nav-item d-block d-xl-none">
								<a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
								<i class="ti ti-menu-2"></i>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link nav-icon-hover" href="javascript:void(0)">
									<i class="ti ti-bell-ringing"></i>
									<div class="notification bg-primary rounded-circle"></div>
								</a>
							</li>
						</ul> -->
						<div class="navbar-collapse justify-content-end px-0" id="navbarNav">
							<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
								<li class="nav-item dropdown">
									<!-- <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
										aria-expanded="false"> -->
									<a class="nav-link nav-icon-hover" href="{{ url('auth/profil') }}" id="drop2"
										aria-expanded="false">
									<img src="{{ asset('assets/src/assets/images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
									</a>
									<div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
										<div class="message-body">
											<a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
												<i class="ti ti-user fs-6"></i>
												<p class="mb-0 fs-3">My Profile</p>
											</a>
											<a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
												<i class="ti ti-mail fs-6"></i>
												<p class="mb-0 fs-3">My Account</p>
											</a>
											<a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
												<i class="ti ti-list-check fs-6"></i>
												<p class="mb-0 fs-3">My Task</p>
											</a>
											<a href="{{ url('auth/logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</nav>
				</header>
				<!--  Header End -->
				<div class="container-fluid">
					<div class="card w-100">
						<div class="card-body">
							<!-- <h5 class="card-title fw-semibold mb-4">Sample Page</h5>
							<p class="mb-0">This is a sample page </p> -->
							@if(Session::get("info"))
								<div class="alert alert-primary" role="alert">
									{{Session::get("info")}}
								</div>
							@endif
							@if(Session::get("success"))
								<div class="alert alert-success" role="alert">
									{{Session::get("success")}}
								</div>
							@endif
							@if(Session::get("error"))
								<div class="alert alert-danger" role="alert">
									{{Session::get("error")}}
								</div>
							@endif
							@yield('content')
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{ asset('assets/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('assets/src/assets/js/sidebarmenu.js') }}"></script>
		<script src="{{ asset('assets/src/assets/js/app.min.js') }}"></script>
		<script src="{{ asset('assets/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
		@yield('js')
	</body>
</html>
