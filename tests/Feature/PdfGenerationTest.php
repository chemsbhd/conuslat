<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\VisaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PdfGenerationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_it_can_create_a_visa_request_and_generate_pdf()
{
    // Créer un utilisateur
    $user = User::factory()->create();

    // Créer une demande de visa avec une image générée
    $visaRequest = VisaRequest::factory()->create([
        'user_id' => $user->id,
        'passport_image' => 'passport_images/test.png',  // Utilisez une image spécifique ou générée
    ]);

    // Faire une requête GET pour générer le PDF
    $response = $this->get(route('admin.visa.pdf', ['id' => $visaRequest->id]));

    // Vérifier si la réponse est réussie
    $response->assertStatus(200); // Vérifie que la réponse est correcte (200 OK)

    // Vérifier si le fichier PDF existe dans le répertoire de stockage
    $pdfPath = storage_path('app/public/visa/visa_request_' . $visaRequest->id . '.pdf');
    $this->assertFileExists($pdfPath); // Vérifie si le PDF a bien été généré
}
}




