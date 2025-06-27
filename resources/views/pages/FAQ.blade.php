@extends('layouts.app')

@section('content')

<style>
     .container1{ font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f9; }
     .container1{ max-width: 800px; margin: 30px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    h1 { color: #333; }
    .faq-section { margin-bottom: 20px; }
    .question { font-weight: bold; cursor: pointer; background: #f0f0f0; padding: 10px; border-radius: 5px; }
    .answer { display: none; padding: 10px; border-left: 4px solid #007BFF; margin-top: 5px; }
    h1 {
            color: #333;
            text-align: center;
            margin: 0 auto;
        }

</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.question').forEach(q => {
            q.addEventListener('click', () => {
                const answer = q.nextElementSibling;
                answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
            });
        });
    });
</script>
     
<div>
    <br><br><br><br><br><br><br><br><br>
</div>
    <div class="container1">
        <h1>FAQ - Consulat du Maroc</h1>

        <!-- Section Généralités -->
        <h2>Généralités</h2>
        <div class="faq-section">
            <div class="question">Quels sont les horaires d'ouverture du consulat ?</div>
            <div class="answer">Le consulat est ouvert aux horaires suivantes :
                <ul>
                    <li><strong>Lundi :</strong> 9h00 - 12h00 ; 13h00 - 17h00</li>
                    <li><strong>Mardi :</strong> 10h00 - 13h00 ; 14h00 - 18h00</li>
                    <li><strong>Mercredi :</strong> 11h00 - 14h00 ; 15h00 - 19h00</li>
                    <li><strong>Jeudi :</strong> 9h00 - 12h00 ; 13h00 - 17h00</li>
                    <li><strong>Vendredi :</strong> 14h00 - 18h00</li>
                    <li><strong>Samedi :</strong> Fermé</li>
                    <li><strong>Dimanche :</strong> Fermé</li>
                </ul>
                 Il est fermé les jours fériés marocains et français.</div>
        </div>

        <div class="faq-section">
            <div class="question">Comment puis-je contacter le consulat ?</div>
            <div class="answer">Vous pouvez nous contacter par téléphone au +33 1 23 45 67 89 ou par email à contact@consulat-maroc.fr. Vous pouvez également utiliser notre formulaire de contact en ligne.</div>
        </div>

        <div class="faq-section">
            <div class="question">Puis-je venir sans rendez-vous ?</div>
            <div class="answer">Les visites sans rendez-vous sont possibles uniquement pour certaines démarches simples. Pour les demandes de visa et de nationalité, un rendez-vous est nécessaire.</div>
        </div>

        <!-- Section Demandes de Visa -->
        <h2>Demandes de Visa</h2>
        <div class="faq-section">
            <div class="question">Quels sont les documents requis pour obtenir un visa ?</div>
            <div class="answer">Pour obtenir un visa, vous avez besoin d'un passeport valide et d'une carte bancaire, vous devez vous connecter au site et aller sur votre profil. Toute la demande se fait en ligne, mais vous devrez venir sur place pour récupérer votre visa.</div>
        </div>

        <div class="faq-section">
            <div class="question">Quel est le délai de traitement pour un visa ?</div>
            <div class="answer">Le délai de traitement peut prendre jusqu'à 14 jours ouvrables.</div>
        </div>

        <!-- Section Demandes de Nationalité -->
        <h2>Demandes de Nationalité</h2>
        <div class="faq-section">
            <div class="question">Comment puis-je faire une demande de citoyenneté marocaine ?</div>
            <div class="answer">Les demandes de citoyenneté se font par le biais d'une loterie. Veuillez consulter les annonces officielles pour connaître les périodes d'inscription.</div>
        </div>

        <!-- Section Informations Supplémentaires -->
        <h2>Informations Supplémentaires</h2>
        <div class="faq-section">
            <div class="question">Le consulat est-il fermé pendant les jours fériés ?</div>
            <div class="answer">
                Oui, le consulat est fermé pendant les jours fériés marocains et les principaux jours fériés français. Voici la liste des jours fériés :
                <br><br>
                <strong>Jours fériés marocains :</strong>
                <ul>
                    <li>Aïd al-Fitr (variable selon le calendrier lunaire)</li>
                    <li>Aïd al-Adha (variable selon le calendrier lunaire)</li>
                    <li>14 août : Fête de l’Oued Ed-Dahab</li>
                    <li>20 août : Révolution du Roi et du Peuple</li>
                    <li>21 août : Fête de la Jeunesse</li>
                    <li>6 novembre : Marche Verte</li>
                    <li>18 novembre : Fête de l'Indépendance</li>
                </ul>
                <strong>Jours fériés français :</strong>
                <ul>
                    <li>1er janvier : Jour de l'An</li>
                    <li>Pâques (lundi suivant, variable)</li>
                    <li>1er mai : Fête du Travail</li>
                    <li>8 mai : Victoire 1945</li>
                    <li>Ascension (jeudi, variable)</li>
                    <li>Lundi de Pentecôte (variable)</li>
                    <li>14 juillet : Fête Nationale</li>
                    <li>15 août : Assomption</li>
                    <li>1er novembre : Toussaint</li>
                    <li>11 novembre : Armistice</li>
                    <li>25 décembre : Noël</li>
                </ul>
            </div>
        </div>
        

        <div class="faq-section">
            <div class="question">Quelles sont les langues parlées au consulat ?</div>
            <div class="answer">Le personnel du consulat parle couramment l'arabe, le français, et certains agents parlent l'anglais pour faciliter les échanges avec les étrangers.</div>
        </div>

        <div class="faq-section">
            <div class="question">Quels services sont disponibles pour les citoyens marocains à l'étranger ?</div>
            <div class="answer">Les citoyens marocains à l'étranger peuvent demander des actes de naissance, des cartes consulaires et d'autres documents d'état civil.
                 Des services de soutien pour les Marocains en difficulté à l'étranger sont également disponibles. Cependant, ces services ne sont disponibles que sur place et non en ligne.</div>
        </div>
    </div>

    <div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
<@endsection
