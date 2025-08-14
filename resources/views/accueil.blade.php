@extends('clients.layout.app')
@section('content')

@include('clients.partials.recherche')

	 <div class="booking">
		<div class="container mt-2">
			<div class="row">
				<div class=" col-lg-12">
					<div class="booking_title">
						<h4>Reserver une chambre</h4>
					</div>
					<div class="text-dark">
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
    <!-- hotels -->
  <section class="container my-5">
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
	</section>

    <hr>
    @include('clients.partials.blog')
    <hr>
        @include('clients.partials.apropos')


@endsection