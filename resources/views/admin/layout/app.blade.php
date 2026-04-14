<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="{{ asset('img/logo/logo.png') }}" rel="icon">
	<title>Fanda-express - Tableau de bord</title>
	<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/ruang-admin.min.css') }}" rel="stylesheet">
	<!-- Bootstrap Icons CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- Sidebar -->
		@include('admin.partials.sidebar')
		<!-- Sidebar -->
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<!-- TopBar -->
				@include('admin.partials.header')
				<!-- Topbar -->

				<!-- Container Fluid-->
				@yield('content')


			</div>

			<!-- Modal Logout -->
			<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabelLogout">Deconnexion</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>Etes-vous sur de vouloir vous deconnecter ?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Annuler</button>
							<a href="{{ route('logout') }}" class="btn btn-primary">Se deconnecter</a>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!---Container Fluid-->
	</div>
	<!-- Footer -->

	<!-- Footer -->
	</div>
	</div>

	<!-- Scroll to top -->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('js/ruang-admin.min.js') }}"></script>
	<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
	<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
</body>

</html>