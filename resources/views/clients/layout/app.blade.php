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

		<!-- Menu -->

		<!-- <div class="menu trans_400 d-flex flex-column align-items-end justify-content-start">
		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="menu_content">
			<nav class="menu_nav text-right">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About us</a></li>
					<li><a href="#">Rooms</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</nav>
		</div>
		<div class="menu_extra">
			<div class="menu_book text-right"><a href="#">Book online</a></div>
			<div class="menu_phone d-flex flex-row align-items-center justify-content-center">
				<img src="images/phone-2.png" alt="">
				<span>0183-12345678</span>
			</div>
		</div>
	</div> -->

		<!-- Home -->

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

				<!-- Home Slider Dots -->
				<!-- <div class="home_slider_dots_container">
				<div class="home_slider_dots">
					<ul id="home_slider_custom_dots" class="home_slider_custom_dots d-flex flex-row align-items-start justify-content-start">
						<li class="home_slider_custom_dot active">01.</li>
						<li class="home_slider_custom_dot">02.</li>
						<li class="home_slider_custom_dot">03.</li>
					</ul>
				</div>
			</div> -->

			</div>
		</div>

		<form action="#" class="booking_form">
			<hr>
			<h2>Recherche un appartement ou une chambre d'hôtel</h2>
			<div class="row mt-5 align-items-end">
				<div class="col-3">
					<div class="form-group">
						<label for="checkin">Date d'arrivée</label>
						<input type="date" id="checkin" name="checkin" class="form-control" required>
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label for="checkout">Date de retour</label>
						<input type="date" id="checkout" name="checkout" class="form-control" required>
					</div>
				</div>
				<div class="col-2">
					<div class="form-group">
						<label for="personnes">Personnes</label>
						<input type="number" id="personnes" name="personnes" class="form-control" required>
					</div>
				</div>
				<div class="col-2">
					<div class="form-group">
						<label for="chambres">Chambres</label>
						<input type="number" id="chambres" name="chambres" class="form-control" required>
					</div>
				</div>
				<div class="col-2">
					<button type="submit" class="btn btn-primary w-100">Rechercher</button>
				</div>
			</div>
		</form>

	</div>
	<!-- Features -->





	<!-- Resrvation chambre -->

	<div class="booking">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="booking_title text-center">
						<h2>Reserver une chambre</h2>
					</div>
					<div class="booking_text text-center">
						<p>Réservez votre chambre dès maintenant et profitez d’un séjour alliant confort, tranquillité et qualité de service.
							Que vous voyagiez pour les affaires ou pour le plaisir, notre établissement vous propose des chambres modernes,
							entièrement équipées, et adaptées à tous vos besoins. En quelques clics, choisissez votre type de chambre,
							vos dates de séjour et bénéficiez des meilleurs tarifs disponibles. Notre équipe reste à votre écoute pour rendre votre expérience inoubliable.
							Ne perdez plus de temps — votre confort vous attend</p>
					</div>

				</div>
			</div>
		</div>
	</div>
	<section>

		<div class="card mb-4 shadow-sm">
			<div class="row g-0">
				<div class="col-md-5 card-image-container">
					<img src="../images/room-3.jpg"
						class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="image_hotel">
				</div>
				<div class="col-md-7">
					<div class="card-body py-3 px-3">
						<div class="d-flex justify-content-between align-items-start mb-2">
							<div>
								<h5 class="card-title mb-0 text-primary">Hotel Kif </h5>
								<p class="card-text text-muted small">Pointe-Noire, Congo </p>
							</div>
							<div class="text-end ms-3">
								<div class="rating-badge">
									<span class="label">3 ans </span>
									<span class="score">d'existences</span>
								</div>
							</div>
						</div>

						<h5 class="card-text mb-1">Suite Junior</h5>
						<p class="card-text mb-3 small">Suite privée<br>1 lit double, lustre , Surface: 34 m2 <br><br><a
								href="" class="btn btn-info">voir plus</a> <a href="#" class="btn btn-primary">Reserver</a> </p>

						<div class="price-block text-end mb-3">
							<p class="small text-muted mb-0">8 nuits, 2 adultes</p>
							<h4 class="price mb-0">XOF 252 000</h4>
							<p class="details mb-0">Taxes et frais compris</p>
						</div>


					</div>
					<button class="btn btn-secondary w-100 d-flex justify-content-center align-items-center py-2">
						Voir les disponibilités
					</button>
				</div>
			</div>
		</div>

	</section>
	<section>

		<div class="card mb-4 shadow-sm">
			<div class="row g-0">
				<div class="col-md-5 card-image-container">
					<img src="../images/room-3.jpg"
						class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="image_hotel">
				</div>
				<div class="col-md-7">
					<div class="card-body py-3 px-3">
						<div class="d-flex justify-content-between align-items-start mb-2">
							<div>
								<h5 class="card-title mb-0 text-primary">Hotel Kif </h5>
								<p class="card-text text-muted small">Pointe-Noire, Congo </p>
							</div>
							<div class="text-end ms-3">
								<div class="rating-badge">
									<span class="label">3 ans </span>
									<span class="score">d'existences</span>
								</div>
							</div>
						</div>

						<h5 class="card-text mb-1">Suite Junior</h5>
						<p class="card-text mb-3 small">Suite privée<br>1 lit double, lustre , Surface: 34 m2 <br><br><a
								href="" class="btn btn-info">voir plus</a> <a href="#" class="btn btn-primary">Reserver</a> </p>

						<div class="price-block text-end mb-3">
							<p class="small text-muted mb-0">8 nuits, 2 adultes</p>
							<h4 class="price mb-0">XOF 252 000</h4>
							<p class="details mb-0">Taxes et frais compris</p>
						</div>


					</div>
					<button class="btn btn-secondary w-100 d-flex justify-content-center align-items-center py-2">
						Voir les disponibilités
					</button>
				</div>
			</div>
		</div>

	</section>

	<!-- Blog -->

	<div class="blog">

		<!-- Blog Slider -->
		<div class="blog_slider_container">
			<h2 class="text-center">Blog</h2>
			<hr>
			<div class="owl-carousel owl-theme blog_slider">

				<!-- Slide -->
				<div class="blog_slide">
					<div class="background_image"></div>
					<div class="blog_content">
						<div class="blog_date"><a href="#">Date du blog</a></div>
						<div class="blog_title"><a href="#">Titre du blog</a></div>
					</div>
				</div>

				<!-- Slide -->
				<div class="blog_slide">
					<div class="background_image"></div>
					<div class="blog_content">
						<div class="blog_date"><a href="#">Date du blog</a></div>
						<div class="blog_title"><a href="#">Titre du blog</a></div>
					</div>
				</div>


			</div>
		</div>
	</div>
	<div class="container">
		@yield('content')
	</div>

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