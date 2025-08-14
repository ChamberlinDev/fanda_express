<!DOCTYPE html>
<html lang="en">

<head>
	<title>Fanda Express </title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="The River template project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/animate.css">
	<link href="plugins/jquery-datepicker/jquery-ui.css" rel="stylesheet" type="text/css">
	<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>

<body>

	<div class="super_container">

		<!-- Header -->

		@include('clients.partials.header')
		<div class="home">
			<div class="home_slider_container">
				<div class="owl-carousel owl-theme home_slider">

					<!-- Slide -->
					<div class="slide">
						<div class="background_image" style="background-image:url(images/h4.jpeg)"></div>
						<div class="home_container">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="home_content text-center">
											<div class="home_title">Bienvenu(e) sur Fanda-express</div>
											<div class="booking_form_container">
												<p class="text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi eaque cupiditate quo aspernatur quos inventore. Architecto, nobis dolore tenetur accusamus officiis, maxime, dolorum temporibus alias quia quidem eveniet nam quam!</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide -->
					<div class="slide">
						<div class="background_image" style="background-image:url(images/image_6.jpg)"></div>
						<div class="home_container">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="home_content text-center">
											<div class="home_title">Retrouvez votre luxe</div>
											<div class="booking_form_container">
												<p class="text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe odio adipisci est atque in obcaecati reiciendis aspernatur. Dolore exercitationem maiores reprehenderit. Nam sint provident molestiae minima delectus? Optio, perferendis laboriosam.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide -->
					<div class="slide">
						<div class="background_image" style="background-image:url(images/room-3.jpg)"></div>
						<div class="home_container">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="home_content text-center">
											<div class="home_title">Un moment de reve</div>
											<div class="booking_form_container">
												<p class="text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe odio adipisci est atque in obcaecati reiciendis aspernatur. Dolore exercitationem maiores reprehenderit. Nam sint provident molestiae minima delectus? Optio, perferendis laboriosam.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>


			</div>
		</div>

		<!-- formulaire de recherche -->

	</div>
	<!-- Features -->

	<!-- hotels -->

	<!-- <section class="container my-5">
		<div class="row g-4">
			<div class="col-12 col-sm-6 col-lg-4 mb-4">
				<div class="card h-100 shadow-sm border-5">
					<img src="../images/room-3.jpg" class="card-img-top"
						alt="image_hotel"
						style="height: 260px; object-fit: cover;">
					<div class="card-body">
						<h6 class="text-primary mb-1">Hotel Kif</h6>
						<p class="text-muted small mb-2">Pointe-Noire, Congo</p>
						<p class="mb-2 small">Suite Junior</p>
						<p class="fw-bold text-dark mb-1">XOF 252 000</p>
					</div>
					<div class="card-footer bg-white border-0">
						<a href="#" class="btn btn-info btn-sm">Voir plus</a>
						<a href="#" class="btn btn-primary btn-sm">Réserver</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-lg-4 mb-4">
				<div class="card h-100 shadow-sm border-5">
					<img src="../images/room-3.jpg" class="card-img-top"
						alt="image_hotel"
						style="height: 260px; object-fit: cover;">
					<div class="card-body">
						<h6 class="text-primary mb-1">Hotel Kif</h6>
						<p class="text-muted small mb-2">Pointe-Noire, Congo</p>
						<p class="mb-2 small">Suite Junior</p>
						<p class="fw-bold text-dark mb-1">XOF 252 000</p>
					</div>
					<div class="card-footer bg-white border-0">
						<a href="#" class="btn btn-info btn-sm">Voir plus</a>
						<a href="#" class="btn btn-primary btn-sm">Réserver</a>
					</div>
				</div>
			</div>


			<div class="col-12 col-sm-3 col-lg-4 mb-4">
				<div class="card h-100 shadow-sm border-5">
					<img src="../images/room-3.jpg" class="card-img-top"
						alt="image_hotel"
						style="height: 260px; object-fit: cover;">
					<div class="card-body">
						<h6 class="text-primary mb-1">Hotel Kif</h6>
						<p class="text-muted small mb-2">Pointe-Noire, Congo</p>
						<p class="mb-2 small">Suite Junior</p>
						<p class="text-dark mb-1">XOF 252 000</p>
					</div>
					<div class="card-footer bg-white border-0">
						<a href="#" class="btn btn-info btn-sm">Voir plus</a>
						<a href="#" class="btn btn-primary btn-sm">Réserver</a>
					</div>
				</div>
			</div>
		</div>
	</section> -->


	<!-- Blog -->


	<div class="container">
		@yield('content')
	</div>
<hr>
	<!-- a propos de nous -->
	

	<!-- Footer -->
	<div>
		@include('clients.partials.footer')
	</div>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="styles/bootstrap-4.1.2/popper.js"></script>
	<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
	<script src="plugins/greensock/TweenMax.min.js"></script>
	<script src="plugins/greensock/TimelineMax.min.js"></script>
	<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="plugins/greensock/animation.gsap.min.js"></script>
	<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="plugins/OwlCarousel2-2.3.4/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/progressbar/progressbar.min.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="plugins/jquery-datepicker/jquery-ui.js"></script>
	<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>