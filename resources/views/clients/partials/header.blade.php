<header class="header bg-dark text-white py-2 shadow">
	<div class="container-fluid px-3 px-lg-4">
		<div class="header_content d-flex flex-row align-items-center justify-content-between">
			
			{{-- Logo --}}
			<div style="width: 140px;">
				<a href="/" class="d-block">
					<img src="{{ asset('/images/logo2.jpeg') }}" alt="Fanda Express" class="img-fluid">
				</a>
			</div>

			{{-- Navigation Desktop --}}
			<div class="ml-auto d-none d-lg-flex flex-row align-items-center">
				<nav class="main_nav mr-4">
					<ul class="d-flex flex-row align-items-center justify-content-start mb-0 list-unstyled">
						<li class="mx-3">
							<a href="/" class="text-white {{ request()->is('/') ? 'font-weight-bold border-bottom border-white' : 'text-white-50' }}" style="text-decoration: none;">
								<i class="fa fa-home mr-1"></i> Accueil
							</a>
						</li>
						<li class="mx-3">
							<a href="/hotels" class="text-white {{ request()->is('hotels') ? 'font-weight-bold border-bottom border-white' : 'text-white-50' }}" style="text-decoration: none;">
								<i class="fa fa-building mr-1"></i> Hôtels & Appartements
							</a>
						</li>
					</ul>
				</nav>

				<div class="d-flex align-items-center">
					<a href="/hotels" class="btn btn-light mr-2">
						<i class="fa fa-calendar-check-o"></i> Réserver
					</a>

					<a href="/connexion" class="btn btn-outline-light ">
						<i class="fa fa-sign-in"></i> Connexion
					</a>
				</div>
			</div>

			{{-- Bouton Menu Mobile --}}
			<button class="navbar-toggler d-lg-none border-0 bg-transparent p-2" 
					type="button" 
					data-toggle="collapse" 
					data-target="#mobileMenu"
					aria-controls="mobileMenu"
					aria-expanded="false">
				<i class="fa fa-bars fa-2x text-white"></i>
			</button>
		</div>

		{{-- Navigation Mobile (Collapsible) --}}
		<div class="collapse d-lg-none mt-3" id="mobileMenu">
			<nav class="mobile_nav bg-dark rounded">
				<ul class="list-unstyled mb-0">
					<li class="border-bottom border-secondary">
						<a href="/" class="text-white d-block px-3 py-3">
							<i class="fa fa-home mr-2"></i> Accueil
						</a>
					</li>
					<li class="border-bottom border-secondary">
						<a href="/hotels" class="text-white d-block px-3 py-3">
							<i class="fa fa-building mr-2"></i> Hôtels & Appartements
						</a>
					</li>
					<li class="border-bottom border-secondary">
						<a href="/hotels" class="text-white d-block px-3 py-3">
							<i class="fa fa-calendar-check-o mr-2"></i> Réserver
						</a>
					</li>
					<li>
						<a href="/connexion" class="btn btn-primary d-block mx-3 my-3">
							<i class="fa fa-sign-in mr-2"></i> Connexion
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>