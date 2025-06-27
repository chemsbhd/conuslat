<?php

namespace Tests\Feature;

use App\Models\VisaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateValidationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Teste la mise à jour de la validation avec un statut valide
     *
     * @return void
     */
    public function test_update_validation_with_valid_status()
    {
        // Créer une demande de visa avec la factory
        $visaRequest = VisaRequest::factory()->create();


        // Exécuter la requête pour mettre à jour la validation
        $response = $this->post(route('admin.visa.update', ['id' => $visaRequest->id, 'status' => 'oui']));

        // Vérifier que la validation a été mise à jour à 'oui' et que le statut est 'finalisée'
        $visaRequest->refresh();
        $this->assertEquals('oui', $visaRequest->validation);
        $this->assertEquals('finalisée', $visaRequest->status);

        // Vérifier la redirection avec le message de succès
        $response->assertRedirect(route('admin.visa'));
        $response->assertSessionHas('success', 'Demande mise à jour.');
    }

    /**
     * Teste la mise à jour de la validation avec un statut invalide
     *
     * @return void
     */
    public function test_update_validation_with_invalid_status()
    {
        // Créer une demande de visa
        $visaRequest = VisaRequest::factory()->create([
            'validation' => null,
            'status' => 'encours',
        ]);

        // Exécuter la requête avec un statut invalide
        $response = $this->post(route('admin.visa.update', ['id' => $visaRequest->id, 'status' => 'invalide']));

        // Vérifier que la validation n'a pas été modifiée
        $visaRequest->refresh();
        $this->assertNull($visaRequest->validation);
        $this->assertEquals('encours', $visaRequest->status);

        // Vérifier la redirection avec le message d'erreur
        $response->assertRedirect(route('admin.visa'));
        $response->assertSessionHas('error', 'Statut invalide.');
    }
}

