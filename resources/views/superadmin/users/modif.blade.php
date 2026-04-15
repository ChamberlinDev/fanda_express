@extends('superadmin.layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Modifier l'utilisateur</h2>

            <form action="{{ route('superadmin.users.update', $user->id) }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control @error('nom_complet') is-invalid @enderror"
                        id="name" name="nom_complet" value="{{ old('nom_complet', $user->nom_complet) }}" required>
                    @error('nom_complet')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password">Mot de passe (laisser vide pour garder l'actuel)</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" name="password">
                    @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('superadmin.users') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection