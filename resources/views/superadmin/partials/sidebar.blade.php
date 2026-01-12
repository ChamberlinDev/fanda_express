	<div class="sidebar">
		<div class="scrollbar-inner sidebar-wrapper">
			<div class="user">
				<div class="photo">
					<img src="assets/img/profile.jpg">
				</div>
				<div class="info">
					<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span class="text-dark">
							{{auth()->user()->nom_complet}}
							<span class="user-level text-success"> {{ auth()->user()->getRoleNames()->first() }}
							</span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample" aria-expanded="true">
						<ul class="nav">
							<li>
								<a href="#">
									<span class="link-collapse">{{auth()->user()->email}}</span>
								</a>
							</li>
							<!-- <li>
										<a href="#">
											<span class="link-collapse">{{auth()->user()->telephone}}</span>
										</a>
									</li> -->
							<!-- <li>
										<a href="#settings">
											<span class="link-collapse">{{auth()->user()->adresse}}</span>
										</a>
									</li> -->
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav">
				<li class="nav-item active">
					<a href="index.html">
						<i class="la la-dashboard"></i>
						<p>Tableau de bord</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="components.html">
						<i class="la la-users"></i>
						<p>Utilisateurs</p>
					</a>
				</li>
				<li class="nav-item text-dark">
					<a href="#">
						<i class="la la-calendar"></i>
						<p>Reservations</p>
					</a>
				</li>
				<li class="nav-item text-dark">
					<a href="#">
						<i class="la la-cog"></i>
						<p>Parametres</p>
					</a>
				</li>



				<li class="nav-item update-pro">
					<a href="/" class="btn btn-danger text-white">
						<p>Deconnexion</p>
					</a>
				</li>
			</ul>
		</div>
	</div>