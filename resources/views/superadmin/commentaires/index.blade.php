@extends('superadmin.layout.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Commentaires</h1>

        @if ($commentaires->isEmpty())
            <p>Aucun commentaire trouvé.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Commentaire</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commentaires as $commentaire)
                        <tr>
                            <td>{{ $commentaire->id }}</td>
                            <td>{{ $commentaire->avis }}</td>
                            <td>{{ $commentaire->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endif

        <h6 class="badge bg-info">Voici les commentaires concernant les appartements et hotels</h6>
    </div>
@endsection