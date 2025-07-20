
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

<div class="container d-flex justify-content-center mt-5">
    <form class="w-50" action="/login" method="POST">
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
            <input type="email" name="email" class="form-control" placeholder="veuillez saisir l'adresse email">
        </div>
        
        <div class="form-group mb-4">
            <label class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" placeholder="veuillez le mot de passe">
        </div>
        
<button type="submit" class="btn btn-primary w-80 d-flex justify-content-center align-items-center">
    Connexion
</button>
        <a href="/inscription">S'inscrire</a>

    </form>
</div>
