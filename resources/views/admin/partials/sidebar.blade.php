<!-- Sidebar -->
<div class="sidebar bg-dark" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header bg-dark border-bottom border-secondary" data-background-color="dark">
            <a href="/home" class="logo text-decoration-none">
                <div class="d-flex align-items-center">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" 
                         style="width: 40px; height: 40px;">
                        <i class="bi bi-buildings-fill text-white"></i>
                    </div>
                    <div>
                        <small class="text-white-50">Gestion hôtelière</small>
                    </div>
                </div>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar" aria-label="Toggle sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler" aria-label="Toggle side navigation">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more" aria-label="More options">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content px-3 py-3">
            <!-- User Info Card -->
            <div class="card bg-dark border border-secondary mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center me-3 text-white fw-bold" 
                             style="width: 50px; height: 50px;">
                            {{ strtoupper(substr(auth()->user()->nom_complet ?? 'U', 0, 2)) }}
                        </div>
                        <div>
                            <h6 class="text-white mb-0">{{ auth()->user()->nom_complet ?? 'Utilisateur' }}</h6>
                            <small class="text-white-50">Administrateur</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <ul class="nav nav-secondary flex-column">
                {{-- Tableau de bord --}}
                <li class="nav-item mb-2">
                    <a href="/home" class="nav-link d-flex align-items-center rounded {{ Request::is('home') ? 'bg-primary text-white' : 'text-white-50' }}">
                        <i class="bi bi-house-door-fill me-3"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>

                {{-- Établissements --}}
                <li class="nav-item mb-2">
                    <a href="/etablissement" class="nav-link d-flex align-items-center rounded {{ Request::is('etablissement*') ? 'bg-primary text-white' : 'text-white-50' }}">
                        <i class="bi bi-building-fill me-3"></i>
                        <span>Établissements</span>
                    </a>
                </li>

                {{-- Réservations --}}
                <li class="nav-item mb-2">
                    <a href="/reservation" class="nav-link d-flex align-items-center rounded {{ Request::is('reservation*') ? 'bg-primary text-white' : 'text-white-50' }}">
                        <i class="bi bi-calendar-check-fill me-3"></i>
                        <span>Réservations</span>
                        <span class="badge bg-danger ms-auto"></span>
                    </a>
                </li>

                {{-- Clients --}}
                <li class="nav-item mb-2">
                    <a href="/clients" class="nav-link d-flex align-items-center rounded {{ Request::is('clients*') ? 'bg-primary text-white' : 'text-white-50' }}">
                        <i class="bi bi-people-fill me-3"></i>
                        <span>Clients</span>
                    </a>
                </li>

                {{-- Blog --}}
                <li class="nav-item mb-2">
                    <a href="/blog" class="nav-link d-flex align-items-center rounded {{ Request::is('blog*') ? 'bg-primary text-white' : 'text-white-50' }}">
                        <i class="bi bi-newspaper me-3"></i>
                        <span>Blog</span>
                    </a>
                </li>
            </ul>

            <!-- Divider -->
            <hr class="border-secondary my-4">

            <!-- Settings -->
            <ul class="nav nav-secondary flex-column">
                <li class="nav-item mb-2">
                    <a href="/profil" class="nav-link d-flex align-items-center rounded {{ Request::is('profil*') ? 'bg-primary text-white' : 'text-white-50' }}">
                        <i class="bi bi-person-circle me-3"></i>
                        <span>Mon profil</span>
                    </a>
                </li>

                <!-- <li class="nav-item mb-2">
                    <a href="/parametres" class="nav-link d-flex align-items-center rounded {{ Request::is('parametres*') ? 'bg-primary text-white' : 'text-white-50' }}">
                        <i class="bi bi-gear me-3"></i>
                        <span>Paramètres</span>
                    </a>
                </li> -->

                <li class="nav-item">
                    <form action="/logout" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="nav-link d-flex align-items-center rounded text-danger border-0 bg-transparent w-100 text-start">
                            <i class="bi bi-box-arrow-right me-3"></i>
                            <span>Déconnexion</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->