<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Consulat – Application de gestion administrative

Ce projet est une application web développée avec [Laravel](https://laravel.com), permettant la gestion de données administratives, incluant l’insertion massive d’utilisateurs et une fonctionnalité de loterie pour modifier la nationalité d’un utilisateur.

## Fonctionnalités

- Insertion de 100 utilisateurs fictifs dans la base de données via l’interface d’administration.
- Fonction « Loterie » : sélection aléatoire d’une personne non marocaine et changement de sa nationalité.
- Gestion des demandes de visa avec génération de PDF.
- Interface d’administration avec messages de succès et d’erreur.
- Authentification et gestion des utilisateurs.
- Interface responsive avec [Tailwind CSS](https://tailwindcss.com).

## Installation

1. Clone le dépôt :
   ```sh
   git clone <url-du-repo>
   cd consulat

2. Installe les dépendances PHP et JS :
    composer install
    npm install

3. Copie le fichier d’environnement et configure-le :
   ```sh
   cp .env.example .env
    # Modifie les variables selon ta configuration (DB, mail, etc.)

4. Génère la clé d’application :
   ```sh
    php artisan key:generate

5. Lance les migrations et (optionnel) les seeders :
   ```sh
    php artisan migrate

6. Compile les assets :
    ```sh
    npm run dev

7. Démarre le serveur de développement :
    ```sh
    php artisan serve

Utilisation
Accède à /admin pour utiliser les fonctionnalités d’insertion et de loterie.
Les messages de succès ou d’erreur s’affichent après chaque action.
Les utilisateurs peuvent soumettre des demandes de visa via leur profil.


Licence
Ce projet est sous licence MIT. ```
