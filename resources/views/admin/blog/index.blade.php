@extends('layout.app')
@section('content')
<div class="container my-5">

    {{-- Bouton Ajouter --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-center">Nos Blog</h2> 
        
        <a href="/ajouter_blog" class="btn btn-primary">

            <i class="bi bi-plus-circle"></i> Ajouter un blog
        </a>
        
    </div>
    <hr>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima dolorum delectus assumenda ab debitis ipsa libero in, 
        consectetur est, iusto, veniam numquam tenetur dolorem fuga aliquam adipisci eligendi eos porro?
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus repellendus, 
        vero explicabo neque amet est, nostrum soluta temporibus error aspernatur cumque
        animi distinctio vitae deleniti itaque iusto sequi? Officiis, consequuntur.</p>
         <hr>

    {{-- Grille des cartes --}}
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                {{-- Image de couverture --}}
                <img src="../images/h4.jpeg" class="card-img-top" alt="Image">

                <div class="card-body">
                    <!-- Titre -->
                    <h5 class="card-title">titre</h5>

                    <!-- Auteur et date -->
                    <p class="card-text text-muted" style="font-size: 0.85em;">
                        Publié par <strong>auteur</strong>
                        date
                    </p>

                    <!-- Extrait -->

                </div>

                <div class="card-footer bg-white border-top-0 d-flex justify-content-between">
                    <!-- Boutons -->
                    <a href="#" class="btn btn-warning btn-sm">Modifier</a>

                    <form action="#" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce blog ?')">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection