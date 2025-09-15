<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
@extends('clients.layout.app')
@section('content')
@include('clients.partials.recherche')
<hr>
<!-- hotels -->
<section class="container-fluid my-5">
    <div class="row g-4">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm border-5">
                <a href="#" target="_blank">
              
                </a>

                <div class="card-body">
                    <h6 class="text-primary mb-1"></h6>
                
                </div>
                <div class="card-footer bg-white border-0">
                </div>
            </div>
        </div>
    </div>
</section>

<hr>
@include('clients.partials.blog') 
<hr>
@include('clients.partials.apropos')
@endsection