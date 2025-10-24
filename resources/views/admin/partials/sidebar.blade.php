<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="/home" class="logo">
                <h3 class="text-white mb-0">Fanda-Express</h3>
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
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                {{-- Tableau de bord --}}
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                    <a href="/home" class="nav-link">
                        <i class="fas fa-home"></i>
                        <span class="nav-text">Tableau de bord</span>
                    </a>
                </li>

                {{-- Établissements --}}
                <li class="nav-item {{ Request::is('etablissement*') ? 'active' : '' }}">
                    <a href="/etablissement" class="nav-link">
                        <i class="fas fa-building"></i>
                        <span class="nav-text">Établissements</span>
                    </a>
                </li>

                {{-- Réservations --}}
                <li class="nav-item {{ Request::is('reservation*') ? 'active' : '' }}">
                    <a href="/reservation" class="nav-link">
                        <i class="fas fa-calendar-check"></i>
                        <span class="nav-text">Réservations</span>
                    </a>
                </li>

                {{-- Clients --}}
                <li class="nav-item {{ Request::is('clients*') ? 'active' : '' }}">
                    <a href="/clients" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span class="nav-text">Clients</span>
                    </a>
                </li>

                {{-- Blog --}}
                <li class="nav-item {{ Request::is('blog*') ? 'active' : '' }}">
                    <a href="/blog" class="nav-link">
                        <i class="fas fa-calendar"></i>
                        <span class="nav-text">Blog</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->

{{-- Styles additionnels pour améliorer l'UX --}}
<style>
    .sidebar .nav-item .nav-link {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        transition: all 0.3s ease;
    }

    .sidebar .nav-item .nav-link i {
        font-size: 18px;
        margin-right: 12px;
        min-width: 20px;
    }

    .sidebar .nav-item .nav-text {
        font-size: 15px;
        font-weight: 500;
    }

    .sidebar .nav-item.active .nav-link {
        background-color: rgba(255, 255, 255, 0.1);
        border-left: 3px solid #007bff;
    }

    .sidebar .nav-item .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.05);
        transform: translateX(5px);
    }

    .sidebar .logo h3 {
        font-size: 22px;
        font-weight: 700;
        letter-spacing: 0.5px;
    }
</style>