<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Fanda Express - Votre confort, notre priorité</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Fanda Express - Réservez votre chambre d'hôtel en toute simplicité">
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

	<!-- Header -->
	@include('clients.partials.header')

	<!-- Hero Slider -->
	<div class="home" style="height: 500px;">
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">

				<!-- Slide 1 -->
				<div class="slide">
					<div class="background_image" style="background-image:url(images/téléchargement.jpeg)"></div>
					<div class="home_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content text-center">
										<div class="home_title">Bienvenue sur Fanda Express</div>
										<div class="booking_form_container">
											<p class="text-white lead">Découvrez nos hébergements de qualité et profitez d'un séjour inoubliable dans un cadre exceptionnel.</p>
											<a href="#reservation" class="btn btn-primary btn-lg mt-3 px-5 rounded-pill">
												Réserver maintenant
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slide 2 -->
				<div class="slide">
					<div class="background_image" style="background-image:url(images/image_6.jpg)"></div>
					<div class="home_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content text-center">
										<div class="home_title">Retrouvez Votre Luxe</div>
										<div class="booking_form_container">
											<p class="text-white lead">Des chambres élégantes et confortables pour un séjour qui allie raffinement et détente.</p>
											<a href="#chambres" class="btn btn-light btn-lg mt-3 px-5 rounded-pill">
												Voir nos chambres
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slide 3 -->
				<div class="slide">
					<div class="background_image" style="background-image:url(images/room-3.jpg)"></div>
					<div class="home_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content text-center">
										<div class="home_title">Un Moment de Rêve</div>
										<div class="booking_form_container">
											<p class="text-white lead">Vivez une expérience unique dans un environnement paisible et accueillant.</p>
											<a href="#contact" class="btn btn-warning btn-lg mt-3 px-5 rounded-pill">
												Nous contacter
											</a>
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

	<!-- Main Content -->
	<div class="container-fluid my-5" id="chambres">
		@yield('content')
	</div>

	<hr class="my-5">

	<!-- About Section -->
	<section class="container my-5 py-5" id="about">
		<div class="row align-items-center">
			<div class="col-md-6 mb-4">
				<h2 class="font-weight-bold mb-4">Nos etablissements</h2>
				<p class="lead text-muted">
					Fanda Express vous accueille dans un cadre chaleureux et moderne. 
					Notre établissement allie confort, qualité de service et tarifs attractifs 
					pour vous offrir une expérience mémorable.
				</p>
				<p class="text-muted">
					Que vous soyez en voyage d'affaires ou en vacances, notre équipe dévouée 
					est à votre disposition pour répondre à tous vos besoins.
				</p>
				<a href="#contact" class="btn btn-primary mt-3 px-4 rounded-pill">
					En savoir plus
				</a>
			</div>
			<div class="col-md-6">
				<img src="images/téléchargement.jpeg" alt="Fanda Express" class="img-fluid rounded shadow">
			</div>
		</div>
	</section>

	<!-- Footer -->
	@include('clients.partials.footer')

	<!-- Scripts -->
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