<?php

namespace Database\Factories;

use App\Models\VisaRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisaRequestFactory extends Factory
{
    protected $model = VisaRequest::class;

    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'birthdate' => $this->faker->date(),
            'nationality' => $this->faker->country(),
            'passport_number' => $this->faker->unique()->numerify('#########'),
            'passport_expiry' => $this->faker->date(),
            'passport_image' => 'passport_images/test.png',
            'card_number' => $this->faker->creditCardNumber(),
            'card_expiry' => $this->faker->creditCardExpirationDate(),
            'card_cvc' => $this->faker->numerify('###'), // Génère un nombre à 3 chiffres
            'validation' => null, // Statut initial de la validation
            'status' => VisaRequest::STATUS_ENCOURS,  // Utilisation de la constante définie dans le modèle
            'user_id' => \App\Models\User::factory(),  // Assurez-vous d'avoir un factory pour les utilisateurs
        ];
    }
}

