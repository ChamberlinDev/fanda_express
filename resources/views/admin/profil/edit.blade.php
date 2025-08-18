@extends('layout.app')
@section('content')

<hr>
<h2 class="text-center">Modifier vos informations</h2>

<div class="container mt-5">
    <form action="{{route('profil_save')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="">Nom de l'hotel</label>
                    <input type="text" name="nom_hotel" class="form-control" value="{{$hotels->nom_complet}}">
                </div>
                <div class="col-6">
                    <label for="">Adresse</label>
                    <input type="text" name="adresse" class="form-control" value="{{$hotels->adresse}}">
                </div>
               
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                 <div class="col-6">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="{{$hotels->email}}">
                </div>
                
                <div class="col-6">
                    <label for="">Telephone</label>
                    <input type="text" name="telephone" class="form-control" value="{{$hotels->telephone}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" class="form-control" placeholder="Laisser vide si inchangé">
                </div>
            </div>
        </div>
        <a href="/home" class="btn btn-secondary">Retour</a>
        <button type="submit" class="btn btn-warning">Modifier</button>


    </form>

</div>
@endsection