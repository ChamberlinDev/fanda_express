<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container vh-100">
    <div class="row h-100 justify-content-center align-items-center">

        <!-- Colonne image -->
        <div class="col-md-5 d-none d-md-block">
            <img src="../images/undraw_access-account_aydp.png"
                alt="Image connexion"
                class="img-fluid rounded shadow">
        </div>

        <!-- Colonne formulaire -->
        <div class="col-md-5">
            <form class="p-4 border rounded shadow bg-white" action="/login" method="POST">
                @csrf
                <h3 class="text-center mb-4">CONNEXION</h3>

                @if(session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="form-group mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Veuillez saisir l'adresse email">
                </div>

                <div class="form-group mb-4">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" placeholder="Veuillez saisir le mot de passe">
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">
                    Connexion
                </button>
                <div class="text-center">
                    <a href="/inscription">S'inscrire</a>
                </div>
            </form>
        </div>

    </div>
</div>