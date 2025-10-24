<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Fanda Express - Votre confort, notre priorité</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Fanda Express - Réservez votre chambre d'hôtel en toute simplicité">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('clients/styles/bootstrap-4.1.2/bootstrap.min.css')}}">
    <link href="{{asset('clients/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('clients/plugins/OwlCarousel2-2.3.4/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('clients/plugins/OwlCarousel2-2.3.4/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('clients/plugins/OwlCarousel2-2.3.4/animate.css')}}">
    <link href="{{asset('clients/plugins/jquery-datepicker/jquery-ui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('clients/plugins/colorbox/colorbox.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('clients/styles/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('clients/styles/responsive.css')}}">
</head>

<body>

    @include('clients.partials.header')

    <div class="home" style="height: 500px;">
        <div class="home_slider_container">
            <div class="owl-carousel owl-theme home_slider">

                                <div class="slide">
                    <div class="background_image" style="background-image:url({{asset('clients/images/téléchargement.jpeg')}})"></div>
                    <div class="home_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_content text-center">
                                        <div class="home_title">Bienvenue sur Fanda Express</div>
                                        <div class="booking_form_container">
                                            <p class="text-white lead">Découvrez nos hébergements de qualité et profitez d'un séjour inoubliable dans un cadre exceptionnel.</p>
                                            <a href="/hotels" class="btn btn-primary btn-lg mt-3 px-5 rounded-pill">
                                                Réserver maintenant
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                <div class="slide">
                    <div class="background_image" style="background-image:url({{asset('clients/images/image_6.jpg')}})"></div>
                    <div class="home_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_content text-center">
                                        <div class="home_title">Retrouvez Votre Luxe</div>
                                        <div class="booking_form_container">
                                            <p class="text-white lead">Des chambres élégantes et confortables pour un séjour qui allie raffinement et détente.</p>
                                            <a href="/hotels" class="btn btn-light btn-lg mt-3 px-5 rounded-pill">
                                                Voir nos etablissements
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                <div class="slide">
                    <div class="background_image" style="background-image:url({{asset('clients/images/room-3.jpg')}})"></div>
                    <div class="home_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_content text-center">
                                        <div class="home_title">Un Moment de Rêve</div>
                                        <div class="booking_form_container">
                                            <p class="text-white lead">Vivez une expérience unique dans un environnement paisible et accueillant.</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid my-5" id="chambres">
        @yield('content')
    </div>

    <hr class="my-5">

    @include('clients.partials.footer')

    <script src="{{asset('clients/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('clients/styles/bootstrap-4.1.2/popper.js')}}"></script>
    <script src="{{asset('clients/styles/bootstrap-4.1.2/bootstrap.min.js')}}"></script>
    <script src="{{asset('clients/plugins/greensock/TweenMax.min.js')}}"></script>
    <script src="{{asset('clients/plugins/greensock/TimelineMax.min.js')}}"></script>
    <script src="{{asset('clients/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('clients/plugins/greensock/animation.gsap.min.js')}}"></script>
    <script src="{{asset('clients/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
    <script src="{{asset('clients/plugins/OwlCarousel2-2.3.4/owl.carousel.js')}}"></script>
    <script src="{{asset('clients/plugins/easing/easing.js')}}"></script>
    <script src="{{asset('clients/plugins/progressbar/progressbar.min.js')}}"></script>
    <script src="{{asset('clients/plugins/parallax-js-master/parallax.min.js')}}"></script>
    <script src="{{asset('clients/plugins/jquery-datepicker/jquery-ui.js')}}"></script>
    <script src="{{asset('clients/plugins/colorbox/jquery.colorbox-min.js')}}"></script>
    <script src="{{asset('clients/js/custom.js')}}"></script>
</body>

</html>