@extends('layout.app')
@section('content')
<h3 class="text-center mt-5">Salut ✋🖐️, {{auth()->user()->nom_complet}} bienvenu sur l'espace Admin</h3>
<!-- <a href="#" class="btn btn-warning mx-3 text-white"> + Publier un blog</a> -->
<hr>
@include('partials.stats')
@endsection