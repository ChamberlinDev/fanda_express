@extends('superadmin.layout.app ')
@section('content')


<section class="container my-5">
    <div class="mb-4">
        <h2 class="font-weight-bold text-center">
            Affichage de tous les appartements 
        </h2>
    </div>

    <div class="row">
        @forelse($apparts as $appart)
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow border-0 rounded-lg">
                <div class="position-relative">
                    @php
                    $hotelImages = json_decode($appart->images, true);
                    $firstImage = (!empty($hotelImages) && is_array($hotelImages)) ? $hotelImages[0] : null;
                    @endphp
                    
                    @if($firstImage)
                    <img src="{{ asset('storage/' . $firstImage) }}" 
                            class="card-img-top rounded-top" 
                            alt="{{ $appart->nom }}" 
                            style="height:280px; object-fit:cover;">
                    @else
                    <img src="https://via.placeholder.com/400x280?text=Pas+d'image" 
                            class="card-img-top rounded-top" 
                            alt="{{ $appart->nom }}" 
                            style="height:280px; object-fit:cover;">
                    @endif
                    <span class="badge badge-success position-absolute rounded-pill" style="top: 15px; right: 15px; font-size: 0.9rem; padding: 8px 16px;">
                        <i class="bi bi-building mr-1"></i>Appartement
                    </span>
                </div>


                <div class="card-body p-4">
                    <h5 class="card-title text-dark font-weight-bold mb-3" style="font-size: 1.25rem;">{{ $appart->nom }}</h5>
                    
                    <div class="mb-2">
                        <i class="bi bi-geo-alt-fill text-danger mr-2"></i>
                        <span class="text-muted">{{ $appart->ville }}</span>
                    </div>
                    
                    <div class="mb-3">
                        <i class="bi bi-pin-map-fill text-info mr-2"></i>
                        <span class="text-muted">{{ $appart->adresse }}</span>
                    </div>

                    @if(isset($appart->prix))
                    <div class="mb-2">
                        <span class="text-success font-weight-bold" style="font-size: 1.15rem;">{{ number_format($appart->prix, 0, ',', ' ') }} XAF</span>
                        <small class="text-muted">/nuit</small>
                    </div>
                    @endif

                    @if(isset($appart->capacite))
                    <div class="mb-2">
                        <i class="bi bi-people-fill text-primary mr-2"></i>
                        <span class="text-muted">{{ $appart->capacite }} personnes</span>
                    </div>
                    @endif
                </div>

                <div class="card-footer bg-white border-0 p-3">
                    <a href="/details/{{$appart->id}}" class="btn btn-success btn-block btn-lg">
                        <i class="bi bi-eye mr-2"></i>Voir les détails
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-danger text-center" role="alert">
                <i class="bi bi-info-circle mr-2"></i>Aucun appartement disponible pour le moment.
            </div>
        </div>
        @endforelse
    </div>
</section>



@endsection