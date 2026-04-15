<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon">
          <img src="{{ asset('img/logo/logo.jpeg') }}">
        </div>
        <div class="sidebar-brand-text mx-3">Fanda-express</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tableau de bord</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Fonctionnalités
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{route('reservation.index')}}">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Reservations</span>
        </a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="{{route('admin.etablissements')}}">
          <i class="fas fa-fw fa-building"></i>
          <span>Etablissements</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{route('admin.clients')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>Clients</span>
        </a>
      </li>
     
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.blog')}}">
          <i class="fas fa-fw fa-blog"></i>
          <span>Blog</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Finances
      </div>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.caisse')}}">
          <i class="fas fa-fw fa-money-bill-wave"></i>
          <span>Caisse</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.rapport')}}">
          <i class="fas fa-fw fa-file-invoice"></i>
          <span>Rapports</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>