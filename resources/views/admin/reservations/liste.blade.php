@extends('admin.layout.app')
@section('content')

<h1 class="text-center">Listes des reservations</h1>
<p class="text-center">Cette partie permet de visualiser les demandes de reservations,
    vous aurez le choix d'accepter ou de refuser une demande de reservation.
    Une fois que vous enverrez votre reponse le client recevra un email comportant votre reponse! Si le client n'a pas pu faire une reservation vous pouvez le faire a sa place </p>
<hr>
<div class="container">
    <a href="#" class="btn btn-primary">+ Faire une reservation</a>
    <a href="/fichier.pdf" class="btn btn-secondary">
        <i class="bi bi-download"></i> Télécharger
    </a>

    <table class="table">

        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom du client</th>
                <th scope="col">Email</th>
                <th scope="col">Numero de telephone</th>
                <th scope="col">Date de reservation</th>
                <th scope="col">nombre de chambre</th>
                <th scope="col">Nombre de nuits</th>

            </tr>
        </thead>
        <tbody>
            <tr>

            </tr>

    </table>

</div>
@endsection