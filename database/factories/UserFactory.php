<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->lastName(),  // Ajout du nom
            'prenom' => fake()->firstName(),  // Ajout du prénom
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'nationalite' => fake()->country(),  // Ajout de la nationalité
            'numero_passeport' => strtoupper(Str::random(8)),  // Numéro de passeport aléatoire
            'date_validite' => fake()->dateTimeBetween('now', '+10 years')->format('Y-m-d'),  // Date de validité du passeport
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
