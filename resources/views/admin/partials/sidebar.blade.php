<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<div class="sidebar">
	    <div class="scrollbar-inner sidebar-wrapper">
	        <div class="user">
	            <div class="photo">
	                <i class="fas fa-user"></i>
	            </div>
	            <div class="info">
	                <a class="" data-toggle="collapse" href="#" aria-expanded="true">
	                    <span class="text-dark">
	                        <span class="user-level text-success">{{auth()->user()->nom_complet}}</span>
	                    </span>
	                </a>
	            </div>
	        </div>
	        <ul class="nav">
	            <li class="nav-item active">
	                <a href="/home">
	                    <i class="la la-dashboard"></i>
	                    <p>Accueil</p>
	                </a>
	            </li>
	            <li class="nav-item">
	                <a href="/reservation">
	                    <i class="la la-calendar"></i>
	                    <p>Reservations</p>
	                </a>
	            </li>
	            <li class="nav-item">
	                <a href="/etablissement">
	                    <i class="la la-home"></i>
	                    <p>Etablissements</p>
	                    <span class="badge badge-count">1</span>
	                </a>
	            </li>
	            <li class="nav-item">
	                <a href="/clients">
	                    <i class="la la-users"></i>
	                    <p>Clients</p>
	                    <span class="badge badge-count">6</span>
	                </a>
	            </li>
	            <li class="nav-item">
	                <a href="notifications.html">
	                    <i class="la la-money"></i>
	                    <p>Caisses</p>
	                </a>
	            </li>
	           
	           
	        </ul>
            
	                <a href="/" class="btn btn-danger text-white mx-5">
	                    <p>Deconnexion</p>
	                </a>
	    </div>
	</div>