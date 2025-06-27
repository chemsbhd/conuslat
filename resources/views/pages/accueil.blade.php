@extends('layouts.app')

@section('content')
     

<!-- top-area End -->
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

<!--welcome-hero start -->

<section id="welcome-hero" class="welcome-hero">
    <video id="background-video" autoplay muted loop class="background-video">
        <source src="{{ asset('videos/flag.mp4') }}" type="video/mp4">
        Votre navigateur ne supporte pas les vidéos HTML5.
    </video>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="header-text">
                    <h2></span>Consulat du Maroc<span>.</span></h2>
                    <div class="welcome-scroll">
                        <span id="welcome-text" class="welcome-text"></span>
                    </div>
                </div><!--/.header-text-->
            </div><!--/.col-->
        </div><!-- /.row-->
    </div><!-- /.container-->
</section><!--/.welcome-hero-->
<!--welcome-hero end -->


<!--news start -->
<section id="about" class="about">
    <div class="section-heading text-center">
        <h2>Actualités</h2>
        <br>
        <!-- Section Actualités -->
        <section id="actualites" class="actualites-section">
            <div class="actualites-container">
                <div class="actualites-carousel">
                            <!-- Conteneur des actualités -->
                            <div class="actualites-items">
                                <div class="actualite-item">
                                    <a href="/actu1">
                                        <img src="{{ asset('img/cdm.jpeg') }}" alt="Actualité 1" class="actualite-image">
                                        <h3 class="actualite-title">Le Maroc vainqueur de la Coupe du Monde !</h3>
                                    </a>
                                </div>
                                <div class="actualite-item">
                                    <a href="/actu2">
                                        <img src="{{ asset('img/couscous.jpeg') }}" alt="Actualité 2" class="actualite-image">
                                        <h3 class="actualite-title">Mettre des merguez dans un couscous est maintenant passible de prison.</h3>
                                    </a>
                                </div>
                                <div class="actualite-item">
                                    <a href="/actu3">
                                        <img src="{{ asset('img/avion.jpg') }}" alt="Actualité 3" class="actualite-image">
                                        <h3 class="actualite-title">Voyage au royaume gratuit pour les RME.</h3>
                                    </a>
                                </div>
                                <div class="actualite-item">
                                    <a href="/actu4">
                                        <img src="{{ asset('img/sleep.png') }}" alt="Actualité 4" class="actualite-image">
                                        <h3 class="actualite-title">Il s'endort au volant, il se retrouve en Algérie !</h3>
                                    </a>
                                </div>
                                <div class="actualite-item">
                                    <a href="/actu5">
                                        <img src="{{ asset('img/taxi.jpeg') }}" alt="Actualité 5" class="actualite-image">
                                        <h3 class="actualite-title">RECORD: Ce taxi marocain fais Tanger-Marrakech en 1h pile !</h3>
                                    </a>
                                </div>
                                <div class="actualite-item">
                                    <a href="/actu6">
                                        <img src="{{ asset('img/deniz.jpg') }}" alt="Actualité 6" class="actualite-image">
                                        <h3 class="actualite-title">Un dangereux criminel est en liberté sur le territoire.</h3>
                                    </a>
                                </div>
                                <div class="actualite-item">
                                    <a href="/actu7">
                                        <img src="{{ asset('img/hakim.jpeg') }}" alt="Actualité 7" class="actualite-image">
                                        <h3 class="actualite-title">Hakim Ziyech : Prochain Ballon d'Or africain ?</h3>
                                    </a>
                                </div>
                                <!-- Ajoutez d'autres actualités ici -->
                            </div>
                        </div>
                    </div>
                </section>
    </div>
</section><!--/.about-->
<!--about end -->



<!--Évenements start -->
<section>
    <div class="section-heading text-center">
        <!-- Événements start -->
        <section id="evenements" class="evenements">
            <div class="section-heading text-center">
                <h2>Événements</h2>
                <br>
                <div class="evenements-container">
                    <div class="evenement-item">
                        <a href="/event1">
                            <img src="{{ asset('img/passeport-maroc.png') }}" alt="Événement 1" class="evenement-image">
                            <h3 class="evenement-title">Lotterie de la citoyenneté ouverte</h3>
                        </a>
                    </div>
                    <div class="evenement-item">
                        <a href="/event2">
                            <img src="{{ asset('img/art.png') }}" alt="Événement 2" class="evenement-image">
                            <h3 class="evenement-title">Exposition d'Art marocain</h3>
                        </a>
                    </div>
                    <div class="evenement-item">
                        <a href="/event3">
                            <img src="{{ asset('img/etudiants.jpg') }}" alt="Événement 3" class="evenement-image">
                            <h3 class="evenement-title">Forum des Étudiants Marocains en France</h3>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Événements end -->
    </div>
    <div class="container">
        
    </div>

</section><!--/.Évenements-->
<!--Évenements end -->

<!--localisation start -->
<section id="consulat-localisation" class="consulat-localisation">
    <div class="consulat-details">
        <div class="section-heading text-center">
            <h2>Localisation</h2>
            <br>
            <div class="consulat-container">
                <div class="row">
                    <!-- Informations à gauche -->
                    <div class="col-md-6">
                        <div class="consulat-info">
                            <h3>Informations :</h3>
                            <ul>
                                <li><strong>Adresse :</strong> 14 Rue de l'Exposition, 75007 Paris</li>
                                <li><strong>Téléphone :</strong> +33 1 42 44 30 00</li>
                            </ul>

                            <h4>Horaires :</h4>
                            <ul>
                                <li><strong>Lundi :</strong> 9h00 - 12h00 ; 13h00 - 17h00</li>
                                <li><strong>Mardi :</strong> 10h00 - 13h00 ; 14h00 - 18h00</li>
                                <li><strong>Mercredi :</strong> 11h00 - 14h00 ; 15h00 - 19h00</li>
                                <li><strong>Jeudi :</strong> 9h00 - 12h00 ; 13h00 - 17h00</li>
                                <li><strong>Vendredi :</strong> 14h00 - 18h00</li>
                                <li><strong>Samedi :</strong> Fermé</li>
                                <li><strong>Dimanche :</strong> Fermé</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Carte à droite -->
                    <div class="col-md-6">
                        <div id="consulat-map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--localisation end -->

<!--Contact start -->
<section id="clients" class="clients">
    <div class="section-heading text-center">
        <h2>Contact</h2>
    </div>

    <section id="formulaire-contact" style="padding: 40px 0; background-color: #f0f0f0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <p id="sous-titre-formulaire">Nous sommes à votre écoute. Veuillez remplir le formulaire ci-dessous pour nous envoyer votre message.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('home.contact.submit') }}" method="POST">
                        @csrf
                        <div class="form-group" id="nom-groupe">
                            <label for="nom-utilisateur" id="label-nom">Nom :</label>
                            <input type="text" class="form-control" id="nom-utilisateur" name="nom" required>
                        </div>
                        <div class="form-group" id="email-groupe">
                            <label for="email-utilisateur" id="label-email">Email :</label>
                            <input type="email" class="form-control" id="email-utilisateur" name="email" required>
                        </div>
                        <div class="form-group" id="sujet-groupe">
                            <label for="sujet-utilisateur" id="label-sujet">Sujet :</label>
                            <input type="text" class="form-control" id="sujet-utilisateur" name="sujet" required>
                        </div>
                        <div class="form-group" id="message-groupe">
                            <label for="message-utilisateur" id="label-message">Message :</label>
                            <textarea class="form-control" id="message-utilisateur" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" id="btn-envoi">Envoyer</button>
                    </form>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                </div>
            </div>
        </div>
    </section>

<script>
function initMap() {
    const consulatLocation = { lat: 48.857721, lng: 2.302793 }; // Coordonnées approximatives du Consulat du Maroc à Paris

    const map = new google.maps.Map(document.getElementById("consulat-map"), {
        center: consulatLocation,
        zoom: 14,
    });

    const marker = new google.maps.Marker({
        position: consulatLocation,
        map: map,
        title: "Consulat du Maroc à Paris",
    });
}
</script>

</section><!--/.Contact-->
<!--Contact end -->
@endsection