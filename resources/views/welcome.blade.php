@extends('admin.layout.app')
@section('content')
<h3 class="text-center mt-5">Salut ✋🖐️, {{auth()->user()->nom_complet}}, Bienvenu sur votre espace de travail</h3>
<!-- <a href="#" class="btn btn-warning mx-3 text-white"> + Publier un blog</a> -->
<hr>
@include('admin.partials.stats')
@endsection