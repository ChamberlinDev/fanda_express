<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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

<section class="container-fluid my-5">
    <div class="row g-4">
        @forelse($apparts as $appart)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm border-2 p-3">
                <a href="{{ asset('storage/' . $appart->image) }}" target="_blank">
                    @if($appart->image)
                    <img src="{{ asset('storage/' . $appart->image) }}" class="card-img-top" alt="{{ $appart->nom }}" style="height:200px; object-fit:cover;">
                    @else
                    <img src="https://via.placeholder.com/400x200?text=Pas+d'image" class="card-img-top" alt="{{ $appart->nom }}" style="height:200px; object-fit:cover;">
                    @endif
                </a>

                <div class="card-body">
                    <h4 class="card-title text-primary">{{ $appart->nom }}</h4>
                    <p class="card-text mb-1"><strong>Ville :</strong> {{ $appart->ville }}</p>
                    <p class="card-text mb-1"><strong>Adresse :</strong> {{ $appart->adresse }}</p>
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
        {{ $apparts->links() }}
    </div>
</section>


<hr>
@include('clients.partials.blog')
<hr>
@include('clients.partials.apropos')


    <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 300px;" src="https://maps.google.com/maps?width=720&height=600&hl=fr&q=pointe-noire%20congo+(fanda-express)&t=&z=14&ie=UTF8&iwloc=B&output=embed" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <hr>
    <div>
        <h2 class="text-center"><span>contactez-nous </span></h2>
        <hr>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          
                <form action="" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Votre nom" required="">
                        </div>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Votre email" required="">
                        </div>
                        
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Sujet" required="">
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                        </div>

                        <div class="col-md-12 text-center">

                            <a href="#" class="btn btn-primary col-8" type="submit">Envoyer</a>
                        </div>

                    </div>
                </form>
            </div></div>

    </div>
@endsection