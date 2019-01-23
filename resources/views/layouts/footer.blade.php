<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/.css') }}" rel="stylesheet">
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css%22%3E%22%3E">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <script src="script.js"></script>
    <link rel="stylesheet" href="font.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div id="app">
        
        <main class="py-4">
            @yield('content')
        </main>


        <footer id="mainFooter">
            <div class="footer-left">
                <a class="vertical-logo-container" href="https://ecole-ingenieurs.cesi.fr">
                    <img class="vertical-logo" src="{{ asset('images/oui.png') }}">
                </a>
            </div>
            <div class="footer-right">
                <ul class="social-nav">
                    <li>Follow Us</li>
                    <li class="icon-bubble"><a href="https://www.facebook.com/BdeExiaStrasbourg/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li class="icon-bubble"><a href="https://twitter.com/BdeExiaStrg" target="_blank"><i class="fa fa-twitter"></i></a></li>
                </ul>
                <ul class="legal-nav">
                    <li><a href="{{ url('/accueil') }}">Accueil</a></li>
                    <li><a href="{{ url('/event') }}" target="_blank">Event</a></li>
                    <li><a href="{{ url('/boiteaidees') }}" target="_blank">Boite à Idées</a></li>
                    <li><a href="{{ url('/ecom') }}" target="_blank">E-Commerce</a></li>
                    <li><a href="{{ url('/privicy') }}" target="_blank">Mention Legals</a></li>
                    <li class="legal-nav-tx">© 2019 Ivan, Thibaut, Dorian & Louis</li>
                </ul>
            </div>
        </footer> 
    </div>
</body>
</html>
