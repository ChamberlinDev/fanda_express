@extends('admin.layout.app')
@section('content')
<div class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            Informations de l'établissement :
            <span class="text-primary">{{ $appart->nom }}</span>

        </h2>
    </div>
    <h2>
    </h2>

  
    <hr>

    <p><strong>Adresse :</strong> {{ $appart->adresse ?? 'Non renseignée' }}</p>
    <p><strong>Ville :</strong> {{ $appart->ville ?? 'Non renseignée' }}</p>

    <p><strong>Description :</strong> {{ $appart->description ?? 'Aucune description disponible.' }}</p>

      {{-- Image --}}
    <div class="container-fluid my-5">
        <a href="{{ $appart->images ? asset('storage/'.$appart->image) : asset('default.jpg') }}" target="_blank">
            <img src="{{ $appart->image ? asset('storage/'.$appart->image) : asset('default.jpg') }}"
                class="img-fluid rounded shadow-sm d-block mx-auto"
                style="max-height:500px; object-fit:fixed; width:50%; max-width:50%; cursor:pointer;"
                alt="image etablissement">
        </a>


    </div>
    <a href="/etablissement" class="btn btn-primary">Retour</a>
<a href="#" class="btn btn-warning">Modifier</a>

    <hr>

</div>
<hr>

</div>
@endsection