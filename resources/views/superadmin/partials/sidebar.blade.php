    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('superadmin.dashboard') }}">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('img/logo/logo.jpeg') }}">
            </div>
            <div class="sidebar-brand-text mx-3">Fanda-express</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('superadmin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tableau de bord</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Fonctionnalités
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('superadmin.users') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Utilisateurs</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('superadmin.reservations')}}">
                <i class="fas fa-fw fa-calendar"></i>
                <span>Reservations</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('superadmin.hotels') }}">
                <i class="fas fa-fw fa-building"></i>
                <span>Hotels</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('superadmin.appartements') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Appartements</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-blog"></i>
                <span>Blogs</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Systeme
        </div>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-cog"></i>
                <span>Parametres</span>
            </a>
        </li>
        <!-- <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Rapports</span>
        </a>
    </li> -->
        <hr class="sidebar-divider">
        <div class="version" id="version-ruangadmin"></div>
    </ul>