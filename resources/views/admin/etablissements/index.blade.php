@extends('layout.app')
@section('content')
<div class="container my-5">

    {{-- Bouton Ajouter --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Nos établissements</h2>
        <a href="/ajouter_eta" class="btn btn-primary">+Ajouter un établissement</a>
    </div>

    {{-- Grille des cartes --}}
    <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    {{-- Image de couverture --}}
                 

                    <div class="card-body">
                        <!-- {{-- Nom --}} -->
                       
                          <i class="fa fa-home"></i><h5 class="card-title">hilary hotel</h5>

                        <!-- {{-- Type et ville --}} -->
                        <p class="card-text">
                            <strong>Type :</strong>  hotel <br>
                            <strong>Ville :</strong> dakar
                        </p>

                        <!-- {{-- Description courte --}} -->
                        <p class="text-muted" style="font-size: 0.9em;">
                          description
                        </p>
                    </div>

                    <div class="card-footer bg-white border-top-0">
                        <!-- {{-- Boutons --}} -->
                        <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="#" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet établissement ?')">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        
    </div>
</div>
@endsection
