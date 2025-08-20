<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
@extends('clients.layout.app')
@section('content')
@include('clients.partials.recherche')
<hr>
<!-- hotels -->
<section class="container-fluid my-5">
    <div class="row g-4">
        @foreach($etab as $e)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm border-5">
                <img src="{{ asset('storage/'.$e->images) }}"
                    class="card-img-top"
                    alt="image_hotel"
                    style="height:200px; width:100%; object-fit:cover;">


                <div class="card-body">
                    <h6 class="text-primary mb-1">{{ $e->nom }}</h6>
                    <p class="text-muted small mb-2">{{ $e->adresse }}, {{ $e->ville }}</p>
                    @if($e->classement)
                    <p class="mb-2">
                        Classement :
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <=$e->classement)
                            <i class="bi bi-star-fill text-warning"></i>
                            @else
                            <i class="bi bi-star text-warning"></i>
                            @endif
                            @endfor
                    </p>
                    @endif

                </div>
                <div class="card-footer bg-white border-0">
                    <a href="/details" class="btn btn-info btn-sm">Voir plus</a>
                    <a href="/reservation_etablissements" class="btn btn-primary btn-sm">Réserver</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<hr>
@include('clients.partials.blog')
<hr>
@include('clients.partials.apropos')
@endsection