<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création de 100 utilisateurs avec des données aléatoires pour les noms, prénoms, et emails
        \App\Models\User::factory(99)->create();

        // Optionnel: Création d'un utilisateur spécifique avec des données générées aléatoirement
        \App\Models\User::factory()->create([
            'nom' => fake()->lastName(),      // Nom aléatoire
            'prenom' => fake()->firstName(),  // Prénom aléatoire
            'email' => fake()->unique()->safeEmail(),  // Email unique aléatoire
            'nationalite' => fake()->country(),        // Nationalité aléatoire
            'numero_passeport' => strtoupper(\Str::random(8)),  // Numéro de passeport aléatoire
            'date_validite' => fake()->dateTimeBetween('now', '+10 years')->format('Y-m-d'),  // Date de validité du passeport
            'password' => \Hash::make('password123'),  // Mot de passe chiffré
            'remember_token' => \Str::random(10),      // Token de rappel aléatoire
            'role' => 'user',  // Attribue le rôle "user" à cet utilisateur
        ]);
    }
}

