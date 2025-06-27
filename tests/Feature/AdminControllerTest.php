<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase; // Permet de réinitialiser la base de données avant chaque test

    /**
     * Teste la méthode createUsers() pour vérifier la création des utilisateurs
     *
     * @return void
     */
    public function test_create_users()
    {
        // Exécution du seeder pour créer 100 utilisateurs
        Artisan::call('db:seed', ['--class' => 'UserSeeder']);
        
        // Vérifie qu'il y a bien 100 utilisateurs dans la base de données
        $this->assertEquals(101, User::count());

        // Simule une redirection vers la route de l'admin avec un message de succès
        $response = $this->get(route('profil.admin'));
        
    }

    /**
     * Teste la méthode lottery() pour vérifier le comportement de la loterie
     *
     * @return void
     */
    public function test_lottery()
    {
        // Crée un utilisateur avec une nationalité différente de "Moroccan"
        $user = User::factory()->create([
            'nationalite' => 'American',
        ]);

        // Exécute la méthode de la loterie
        $response = $this->post(route('admin.lottery'));

        // Vérifie que l'utilisateur a gagné la loterie et sa nationalité a été mise à jour
        $user->refresh();
        $this->assertEquals('Moroccan', $user->nationalite);

        // Vérifie que la redirection contient le message de succès avec le nom et prénom de l'utilisateur
        $response->assertRedirect(route('profil.admin'));
        $response->assertSessionHas('success', 'Félicitations à ' . $user->nom . ' ' . $user->prenom . ', qui a gagné la loterie et a maintenant la nationalité marocaine.');
    }

    /**
     * Teste la méthode lottery() lorsqu'il n'y a pas d'utilisateur éligible
     *
     * @return void
     */
    public function test_lottery_no_eligible_users()
    {
        // Crée un utilisateur avec la nationalité "Moroccan"
        $user = User::factory()->create([
            'nationalite' => 'Moroccan',
        ]);

        // Exécute la méthode de la loterie
        $response = $this->post(route('admin.lottery'));

        // Vérifie que la redirection contient un message d'erreur
        $response->assertRedirect(route('profil.admin'));
        $response->assertSessionHas('error', 'Aucun utilisateur éligible trouvé.');
    }
}
