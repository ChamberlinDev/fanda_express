<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        
        <!-- Colonne image -->
        <div class="col-md-5 d-none d-md-block">
            <img src="../images/undraw_add-user_rbko.png" 
                 alt="Image Hôtel"
                 class="img-fluid rounded shadow">
        </div>

        <!-- Colonne formulaire -->
        <div class="col-md-7">
            <form class="w-100" action="/register" method="POST">
                @csrf

                <h3 class="text-center mb-4 text-primary">INSCRIPTION</h3>

                {{-- Alertes globales --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Veuillez corriger les erreurs suivantes :</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Champs --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nom de l'hôtel</label>
                        <input type="text" class="form-control @error('nom_hotel') is-invalid @enderror" name="nom_hotel" value="{{ old('nom_hotel') }}" placeholder="Veuillez saisir le nom de l'hôtel">
                        @error('nom_hotel')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Code d'enregistrement</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" placeholder="Veuillez saisir le code de l'établissement">
                        @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Adresse</label>
                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" placeholder="Veuillez saisir l'adresse">
                        @error('adresse')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Entrez les détails de l'établissement">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Veuillez saisir l'adresse email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Téléphone</label>
                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" placeholder="Veuillez saisir le numéro de téléphone">
                        @error('telephone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Veuillez saisir le mot de passe">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Veuillez confirmer le mot de passe">
                    </div>
                </div>

                <div class="row align-items-center mb-2">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                    </div>
                    <div class="col-auto">
                        <a href="/">Se connecter</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
