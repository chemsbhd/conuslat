<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\VisaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use Tests\TestCase;

class VisaRequestControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_visa_request_with_generated_image()
{
    // Créer un utilisateur
    $user = User::factory()->create();

    // Créer une demande de visa avec une image générée
    $response = $this->actingAs($user)->post(route('visa.request.store'), [
        'name' => 'John',
        'surname' => 'Doe',
        'birthdate' => '1990-01-01',
        'nationality' => 'USA',
        'passport_number' => '123456789',
        'passport_expiry' => '2030-01-01',
        'passport_image' => UploadedFile::fake()->image('passport_image.png'),  // Fake image
        'card_number' => '4111111111111111',
        'card_expiry' => '12/26',
        'card_cvc' => '123',
    ]);

    // Vérifier que la réponse a une redirection vers le profil
    $response->assertStatus(302);  // Redirection après succès
    $response->assertRedirect(route('profil.show'));

    // Vérifier que la demande de visa a été enregistrée dans la base de données
    $this->assertDatabaseHas('visa_requests', [
        'name' => 'John',
        'surname' => 'Doe',
        'user_id' => $user->id, // Vérifier que la demande est associée à l'utilisateur
    ]);

    // Vérifier que l'image est dans le bon répertoire (on ne se soucie pas du nom exact ici)
    $visaRequest = VisaRequest::where('user_id', $user->id)->first();
    $this->assertStringStartsWith('passport_images/', $visaRequest->passport_image);  // Vérifie que le chemin commence par "passport_images/"
}

}