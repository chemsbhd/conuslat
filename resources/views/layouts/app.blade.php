<!DOCTYPE html>
<!-- top-area Start -->
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;subset=devanagari,latin-ext" rel="stylesheet">

        <!-- title of site -->
        <title>Consulat du Maroc</title>

        <!--CSS-->
                @vite('resources/css/app.css')
                @vite('resources/css/animate.css')
                @vite('resources/css/bootsnav.css')
                @vite('resources/css/bootstrap.min.css')
                @vite('resources/css/flaticon.css')
                @vite('resources/css/font-awesome.min.css')
                @vite('resources/css/owl.carousel.min.css')
                @vite('resources/css/owl.theme.default.min.css')
                @vite('resources/css/responsive.css')
                @vite('resources/css/style.css')   

                
        <!-- Ajouter FontAwesome CDN -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>


    <body>


    <!-- Écran de chargement -->
        <div id="loader">
            <div class="spinner"></div>
        </div>


        <header class="custom-navbar sticky-shadow-navbar">
            <div class="custom-container-header">
                <!-- Logo et titre -->
                <div class="custom-logo-title">
                    <a href="/" class="custom-logo-link"><img src="{{ asset('img/symbol.png') }}" alt="Logo Consulat" class="custom-logo"></a>
                    <a href="/"><h1 class="custom-site-title">Consulat du Maroc</h1></a>
                    
                </div>
        
                <!-- Menu de navigation -->
                <nav class="custom-navbar-menu">
                    <ul class="custom-navbar-list">
                        <li><a href="/" class="custom-nav-link">Accueil</a></li>
                        <li><a href="/contact" class="custom-nav-link">Contact</a></li>
        
                        <!-- Vérification si l'utilisateur est connecté pour afficher le profil -->
                        @auth
                        <li><a href="/profil" class="custom-nav-link">Profil</a></li>
                        <!-- Lien de déconnexion -->
                        <li class="custom-smooth-menu">
                            <a href="#" class="custom-nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @else
                        <!-- Lien de connexion -->
                        <li><a href="{{ route('login') }}" class="custom-nav-link">Se connecter</a></li>
                        @endauth
                    </ul>
        
                    <!-- Menu Hamburger -->
                    <div class="custom-hamburger" onclick="toggleMenu()">
                        <span class="custom-hamburger-bar"></span>
                        <span class="custom-hamburger-bar"></span>
                        <span class="custom-hamburger-bar"></span>
                    </div>
                </nav>
            </div>
        </header>
        


        <div id="app">
            
            
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>



    <footer style="background-color: #2a2a2a; color: white; padding: 20px 0;">
        <div class="container">
            <div class="row">
                <!-- Section gauche -->
                <div class="col-md-4 col-sm-12 mb-4 text-center text-md-left">
                    <h4>Consulat du Maroc</h4>
                    <p>Adresse : 14 Rue de l'Exposition, 75007 Paris</p>
                    <p>Téléphone : +33 1 23 45 67 89</p>
                    <p>Email : contact@consulat-maroc.fr</p>
                </div>

                <!-- Section centrale -->
                <div class="col-md-4 col-sm-12 mb-4 text-center">
                    <h4>Liens Utiles</h4>
                    <ul style="list-style-type: none; padding: 0; margin: 0;">
                        <li><a href="{{ url('contact') }}" style="color: white; text-decoration: none;">Contact</a></li>
                        <li><a href="/FAQ" style="color: white; text-decoration: none;">FAQ</a></li>
                    </ul>
                </div>

                <!-- Section droite -->
                <div class="col-md-4 col-sm-12 mb-4 text-center text-md-right">
                    <h4>Suivez-nous</h4>
                    <ul style="list-style-type: none; padding: 0; margin: 0;">
                        <li><a href="https://www.facebook.com/consulatmaroc" style="color: white; text-decoration: none; margin-right: 10px;">Facebook</a></li>
                        <li><a href="https://www.twitter.com/consulatmaroc" style="color: white; text-decoration: none; margin-right: 10px;">Twitter</a></li>
                        <li><a href="https://www.instagram.com/consulatmaroc" style="color: white; text-decoration: none;">Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
<!--JS-->
<!-- jQuery -->
@vite('resources/js/jquery.js')
@vite('resources/js/jquery.appear.js')
@vite('resources/js/jquery.sticky.js')
@vite('resources/js/owl.carousel.min.js')
@vite('resources/js/bootstrap.min.js') <!-- Charger Bootstrap après jQuery -->
@vite('resources/js/bootsnav.js')
@vite('resources/js/custom.js')
@vite('resources/js/script.js')
@vite('resources/js/progressbar.js')

<script>
    function toggleMenu() {
        const navbarMenu = document.querySelector('.custom-navbar-menu');
        navbarMenu.classList.toggle('active'); // Ajoute ou enlève la classe 'active' pour afficher/cacher le menu
    }
</script>



<!--API Google Maps-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDc4hBFa8JhExauGvArS4WYWamaMI-ZlA&callback=initMap&v=1.0" async defer></script>

<!--Loader-->
<script>
   document.addEventListener('DOMContentLoaded', function() {
       setTimeout(function() {
           document.getElementById('loader').style.display = 'none';
       }, 500);
   });
</script>
