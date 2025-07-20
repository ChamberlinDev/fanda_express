@extends('layout.app')
@section('content')
<h3 class="text-center mt-5">Salut ✋🖐️, {{auth()->user()->nom_hotel}} bienvenu sur l'espace Admin</h3>
<hr>
@include('partials.stats')
@endsection