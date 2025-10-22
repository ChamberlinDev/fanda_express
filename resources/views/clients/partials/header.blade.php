<header class="header">
	<div class="container-fluid">
		<div class="header_content d-flex flex-row align-items-center justify-content-between py-3">
			{{-- Logo --}}
			<div style="width: 150px;">
				<a href="/">
					<img src="{{ asset('images/logo2.jpeg') }}" alt="Fanda Express" class="img-fluid">
				</a>
			</div>

			{{-- Navigation Desktop --}}
			<div class="ml-auto d-none d-lg-flex flex-row align-items-center">
				<nav class="main_nav mr-4">
					<ul class="d-flex flex-row align-items-center justify-content-start mb-0">
						<li class="mx-3">
							<a href="/" class="{{ request()->is('/') ? 'active' : '' }}">
								<i class="fa fa-home"></i> Accueil
							</a>
						</li>
						<li class="mx-3">
							<a href="/hotels" class="{{ request()->is('hotels') ? 'active' : '' }}">
								<i class="fa fa-building"></i> Hôtels & Appartements
							</a>
						</li>
					</ul>
				</nav>

				<a href="/hotels" class="btn btn-primary mr-3">
					<i class="fa fa-calendar-check-o"></i> Réserver
				</a>

				<a href="/connexion" class="btn btn-outline-light">
					<i class="fa fa-sign-in"></i> Connexion
				</a>
			</div>

			{{-- Menu Mobile --}}
			<button class="navbar-toggler d-lg-none border-0 bg-transparent" type="button" data-toggle="collapse" data-target="#mobileMenu">
				<i class="fa fa-bars fa-2x text-white"></i>
			</button>
		</div>

		{{-- Navigation Mobile (Collapsible) --}}
		<div class="collapse d-lg-none" id="mobileMenu">
			<nav class="mobile_nav bg-dark py-3">
				<ul class="list-unstyled mb-0">
					<li class="py-2 border-bottom border-secondary">
						<a href="/" class="text-white d-block px-3">
							<i class="fa fa-home"></i> Accueil
						</a>
					</li>
					<li class="py-2 border-bottom border-secondary">
						<a href="/hotels" class="text-white d-block px-3">
							<i class="fa fa-building"></i> Hôtels & Appartements
						</a>
					</li>
					<li class="py-2 border-bottom border-secondary">
						<a href="/hotel" class="text-white d-block px-3">
							<i class="fa fa-calendar-check-o"></i> Réserver
						</a>
					</li>
					<li class="py-2">
						<a href="/connexion" class="text-white d-block px-3">
							<i class="fa fa-sign-in"></i> Connexion
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>