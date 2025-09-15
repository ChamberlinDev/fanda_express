<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
@extends('clients.layout.app')
@section('content')
@include('clients.partials.recherche')
<hr>
<!-- hotels -->
<section class="container-fluid my-5">
    <div class="row g-4">
        @forelse($hotels as $hotel)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm border-2 p-3">
                <a href="{{ asset('storage/' . $hotel->image) }}" target="_blank">
                    @if($hotel->image)
                    <img src="{{ asset('storage/' . $hotel->image) }}" class="card-img-top" alt="{{ $hotel->nom }}" style="height:200px; object-fit:cover;">
                    @else
                    <img src="https://via.placeholder.com/400x200?text=Pas+d'image" class="card-img-top" alt="{{ $hotel->nom }}" style="height:200px; object-fit:cover;">
                    @endif
                </a>

                <div class="card-body">
                    <h4 class="card-title text-primary">{{ $hotel->nom }}</h4>
                    <p class="card-text mb-1"><strong>Ville :</strong> {{ $hotel->ville }}</p>
                    <p class="card-text mb-1"><strong>Adresse :</strong> {{ $hotel->adresse }}</p>
                </div>

                <div class="card-footer bg-white border-0 text-center">
                    <a href="#" class="btn btn-primary btn-sm">Voir l'hôtel</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">Aucun hôtel disponible pour le moment.</p>
        </div>
        @endforelse
    </div>


    {{-- Pagination --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $hotels->links() }}
    </div>
</section>


<hr>
@include('clients.partials.blog')
<hr>
@include('clients.partials.apropos')
@endsection