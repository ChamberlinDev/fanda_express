@extends('clients.layout.app')
@section('content')
	@include('hotels.liste')
    <!-- hotels -->
    <hr>
    @include('clients.partials.blog')
    <hr>
        @include('clients.partials.apropos')


@endsection