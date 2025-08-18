@extends('clients.layout.app')
@section('content')
@include('clients.partials.recherche')
<hr>
    <!-- hotels -->
     <section class="container-fluid my-5">
    <div class="row g-4">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm border-5">
                <img src="../images/room-3.jpg" class="card-img-top"
                    alt="image_hotel"
                    style="height: 260px; object-fit: cover;">
                <div class="card-body">
                    <h6 class="text-primary mb-1">nom_etablissement</h6>
                    <p class="text-muted small mb-2">adresse, ville</p>
                    <p class="mb-2 small">Suite Junior</p>
                    <p class="fw-bold text-dark mb-1">prix</p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="/details" class="btn btn-info btn-sm">Voir plus</a>
                    <a href="#" class="btn btn-primary btn-sm">Réserver</a>
                </div>
            </div>
        </div>
    </div>
</section>
    <hr>
    @include('clients.partials.blog')
    <hr>
        @include('clients.partials.apropos')


@endsection