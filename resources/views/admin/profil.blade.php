@extends('layout.app')
@section('content')

<hr>
<h2 class="text-center">Informations personnelles</h2>
<p class="text-center"> Cette page vous permet de voir, modifier ou supprimer
    vos informations personnelles en quelque sorte gérer votre profil! </p>
<hr>
<div class="container mt-5">
    <form action="">
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control" value="{{$hotels->nom_hotel}}"readonly>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" value="{{$hotels->code}}"readonly>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control" value="{{$hotels->adresse}}" readonly>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" value="{{$hotels->telephone}}"readonly>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control" value="{{$hotels->email}}"readonly>
                </div>
                <div class="col-6">
                    <input type="password" class="form-control" value="{{$hotels->password}}"readonly>
                </div>
            </div>
        </div>
        <a href="/home" class="btn btn-secondary">Retour</a>
        <a href="/profil_edit" class="btn btn-warning">Modifier</a>
        <a href="" class="btn btn-danger">Suprimer</a>
        

    </form>

</div>
@endsection