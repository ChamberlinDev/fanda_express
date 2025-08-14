<nav
    class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
    <div class="container-fluid">
        <nav
            class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                        <i class="fa fa-search search-icon"></i>
                    </button>
                </div>
                <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control" />
            </div>
        </nav>

        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
            <li
                class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true">
                    <i class="fa fa-search"></i>
                </a>
                <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                        <div class="input-group">
                            <input
                                type="text"
                                placeholder="Search ..."
                                class="form-control" />
                        </div>
                    </form>
                </ul>
            </li>

            </a>

            <li class="nav-item topbar-user dropdown hidden-caret">
                <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false">
                    <!-- <div class="avatar-sm">
                        <i class="fas fa-home"></i>

                    </div> -->
                    <span class="profile-username">
                        <!-- <span class="op-7"></span> -->
                        <h4 class="fw-bold"><i class="fas fa-home"></i>  {{auth()->user()->nom_hotel}}</h4>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                               
                                <i class="fas fa-home"> </i>
                                <div class="u-text">
                                    <h4>{{auth()->user()->nom_hotel}}</h4>
                                    <p class="text-muted">Email: {{auth()->user()->email}}</p>
                                    <p class="text-muted">Telephone: {{auth()->user()->telephone}}</p>

                                    <a
                                        href="/profil"
                                        class="btn btn-xs btn-secondary btn-sm">Voir profil</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/profil">Mon Profil</a>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/">Deconnexion</a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>