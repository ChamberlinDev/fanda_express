@extends('layout.app')
@section('content')

<h1 class="text-center">Listes des reservations</h1>
<p>Cette partie permet de visualiser les demandes de reservations,
    vous aurez le choix d'accepter ou de refuser une demande de reservation.
    Une fois que vous enverrez votre reponse le client recevra un email comportant votre repons!</p>
<hr>
<div class="container">
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