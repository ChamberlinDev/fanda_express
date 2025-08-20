@extends('layout.app')
@section('content')
<div class="container my-5">

    {{-- Bouton Ajouter --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Nos établissements</h2>
        <a href="/ajouter_eta" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Ajouter un établissement
        </a>
    </div>
    <hr>

    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus repellendus,
        vero explicabo neque amet est, nostrum soluta temporibus error aspernatur cumque
        animi distinctio vitae deleniti itaque iusto sequi? Officiis, consequuntur.
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus repellendus,
        vero explicabo neque amet est, nostrum soluta temporibus error aspernatur cumque
        animi distinctio vitae deleniti itaque iusto sequi? Officiis, consequuntur.</p>
    <hr>
    {{-- Grille des cartes --}}
    <div class="row g-4">
        @forelse($etablissements as $etab)
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                {{-- Image --}}
                <img src="{{ $etab->images ? asset('storage/' . $etab->images) : asset('default.jpg') }}"
                    class="card-img-top img-fluid"
                    alt="image"
                    style="height:200px; object-fit:cover;">

                {{-- Corps de la carte --}}
                <div class="card-body">
                    <h5 class="card-title">{{ $etab->nom }}</h5>
                    <p class="card-text">
                        <strong>Type :</strong> {{ $etab->type }} <br>
                        <strong>Ville :</strong> {{ $etab->ville }}
                    </p>
                    @if($etab->classement)
                    <p class="mb-2">
                        Classement :
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <=$etab->classement)
                            <i class="bi bi-star-fill text-warning"></i>
                            @else
                            <i class="bi bi-star text-warning"></i>
                            @endif
                            @endfor
                    </p>
                    @endif
                    <p class="text-muted">{{ $etab->description }}</p>
                </div>

                {{-- Footer avec boutons --}}
                <div class="card-footer bg-white border-top-0 d-flex justify-content-between">
                    <a href="#" class="btn btn-info btn-sm">Voir</a>
                    <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="#" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet établissement ?')">
                            Supprimer
                        </button>
                    </form>
                </div>

            </div>
        </div>
        @empty
        <p>Aucun établissement trouvé.</p>
        @endforelse
    </div>

</div>
@endsection