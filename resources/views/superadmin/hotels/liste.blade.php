@extends('superadmin.layout.app ')
@section('content')

<section class="container my-5">
    <div class="mb-4">
        <h3 class="font-weight-bold text-center">
            Affichage de tous les hôtels 
        </h3>
        <hr>
        <p>Sur cette interface, vous pouvez voir la liste complète des hôtels disponibles dans le système.</p>
    </div>
    <hr>

    <div class="row">
        @forelse($hotels as $hotel)
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow border-0 rounded-lg">
                <div class="position-relative">
                    @php
                    $hotelImages = json_decode($hotel->images, true);
                    $firstImage = (!empty($hotelImages) && is_array($hotelImages)) ? $hotelImages[0] : null;
                    @endphp
                    
                    @if($firstImage)
                    <img src="{{ asset('storage/' . $firstImage) }}" 
                            class="card-img-top rounded-top" 
                            alt="{{ $hotel->nom }}" 
                            style="height:280px; object-fit:cover;">
                    @else
                    <img src="https://via.placeholder.com/400x280?text=Pas+d'image" 
                            class="card-img-top rounded-top" 
                            alt="{{ $hotel->nom }}" 
                            style="height:280px; object-fit:cover;">
                    @endif
                    <span class="badge badge-primary position-absolute rounded-pill" style="top: 15px; right: 15px; font-size: 0.9rem; padding: 8px 16px;">
                        <i class="bi bi-building mr-1"></i>Hôtel
                    </span>
                </div>

                <div class="card-body p-4">
                    <h5 class="card-title text-dark font-weight-bold mb-3" style="font-size: 1.25rem;">{{ $hotel->nom }}</h5>
                    
                    <div class="mb-2">
                        <i class="bi bi-geo-alt-fill text-danger mr-2"></i>
                        <span class="text-muted">{{ $hotel->ville }}</span>
                    </div>
                    
                    <div class="mb-3">
                        <i class="bi bi-pin-map-fill text-info mr-2"></i>
                        <span class="text-muted">{{ $hotel->adresse }}</span>
                    </div>

                    @if(isset($hotel->prix))
                    <div class="mb-2">
                        <span class="text-primary font-weight-bold" style="font-size: 1.15rem;">À partir de {{ number_format($hotel->prix, 0, ',', ' ') }} XAF</span>
                        <small class="text-muted">/nuit</small>
                    </div>
                    @endif
                </div>

                <div class="card-footer bg-white border-0 p-3">
                    <a href="{{ route('superadmin.details', $hotel->id) }}" class="btn btn-primary btn-block btn-lg">
                        <i class="bi bi-eye mr-2"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-success text-center" role="alert">
                <i class="bi bi-info-circle mr-2"></i>Aucun hôtel disponible pour le moment.
            </div>
        </div>
        @endforelse
    </div>
</section>




@endsection