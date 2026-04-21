<header class="header bg-dark border-bottom shadow-sm sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark py-3">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('/images/logo2.jpeg') }}" 
                     alt="Fanda Express" 
                     class="rounded" 
                     style="height: 90px; width: 90px;">
            </a>

            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item {{ request()->is('/') ? 'active font-weight-bold' : '' }}">
                        <a class="nav-link px-lg-3" href="/">
                            <i class="fa fa-home mr-1"></i> Accueil
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('hotels') ? 'active font-weight-bold' : '' }}">
                        <a class="nav-link px-lg-3" href="/hotels">
                            <i class="fa fa-building mr-1"></i> Hôtels & Appartements
                        </a>
                    </li>
                </ul>

                <div class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center">
                    <a href="/hotels" class="btn btn-primary btn-sm px-4 mb-2 mb-lg-0 mr-lg-3">
                        <i class="fa fa-calendar-check-o mr-1"></i> Réserver
                    </a>
                    
                    <a href="/connexion" class="btn btn-outline-light btn-sm px-4">
                        <i class="fa fa-sign-in mr-1"></i> Connexion
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>