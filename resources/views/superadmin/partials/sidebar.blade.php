<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">

        <!-- USER -->
        <div class="user">
            <div class="photo">
                <img src="{{ asset('assets/img/profile.jpg') }}">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span class="text-dark">
                        {{ auth()->user()->nom_complet }}
                        <span class="user-level text-success">
                            {{ auth()->user()->getRoleNames()->first() }}
                        </span>
                        <span class="caret"></span>
                    </span>
                </a>

                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#">
                                <span class="link-collapse">
                                    {{ auth()->user()->email }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- MENU -->
        <ul class="nav">

            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="la la-dashboard"></i>
                    <p>Tableau de bord</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('inscription*') ? 'active' : '' }}">
                <a href="/inscription">
                    <i class="bi bi-people"></i>
                    <p>Utilisateurs</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('hotels*') ? 'active' : '' }}">
                <a href="#">
                    <i class="bi bi-building"></i>
                    <p>Hotels</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('appartements*') ? 'active' : '' }}">
                <a href="#">
                    <i class="bi bi-house-door"></i>
                    <p>Appartements</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('blogs*') ? 'active' : '' }}">
                <a href="#">
                    <i class="bi bi-newspaper"></i>
                    <p>Blogs</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('reservations*') ? 'active' : '' }}">
                <a href="#">
                    <i class="bi bi-cart"></i>
                    <p>Reservations</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('settings*') ? 'active' : '' }}">
                <a href="#">
                    <i class="bi bi-gear"></i>
                    <p>Parametres</p>
                </a>
            </li>

            <!-- LOGOUT -->
            <li class="nav-item update-pro">
                <form action="#" method="POST">
                    @csrf
                    <button class="btn btn-danger w-100 text-white">
                        Déconnexion
                    </button>
                </form>
            </li>

        </ul>
    </div>
</div>
