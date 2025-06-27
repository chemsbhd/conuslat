<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan; // Pour exécuter la commande Artisan
use App\Models\User;  // Ajoute cette ligne pour importer la classe User


class AdminController extends Controller
{
    // Méthode pour créer 100 utilisateurs
    public function createUsers()
    {
        // Exécute le seeder pour créer 100 utilisateurs
        Artisan::call('db:seed', ['--class' => 'UserSeeder']);

        // Retourne une réponse, redirige ou affiche un message
        return redirect()->route('profil.admin')->with('success', '100 utilisateurs ont été créés avec succès.');
    }

     // Méthode pour la loterie
     public function lottery()
     {
         // Sélectionne un utilisateur au hasard qui n'a pas la nationalité marocaine
         $user = User::where('nationalite', '!=', 'Moroccan')->inRandomOrder()->first();
 
         // Si un utilisateur est trouvé, on lui attribue la nationalité marocaine
         if ($user) {
             $user->nationalite = 'Moroccan';
             $user->save(); // Sauvegarde la modification dans la base de données
 
             // Retourner un message avec le nom et prénom de la personne qui a gagné
             return redirect()->route('profil.admin')->with('success', 'Félicitations à ' . $user->nom . ' ' . $user->prenom . ', qui a gagné la loterie et a maintenant la nationalité marocaine.');
         }
 
         // Si aucun utilisateur n'est trouvé (tous les utilisateurs sont déjà marocains)
         return redirect()->route('profil.admin')->with('error', 'Aucun utilisateur éligible trouvé.');
     }
}
