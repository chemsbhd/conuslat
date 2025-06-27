<?php

namespace App\Http\Controllers;

use App\Models\VisaRequest;
use Illuminate\Http\Request;
use FPDF;

class AdminVisaController extends Controller
{
    // Afficher la liste des demandes de visa
    public function index()
    {
        // Récupérer toutes les demandes de visa
        $visaRequests = VisaRequest::all(); // Vous pouvez aussi filtrer par "validation" == null si nécessaire

        return view('pages.visaAdmin', compact('visaRequests'));
    }

    // Accepter ou refuser une demande de visa
    public function updateValidation($id, $status)
    {
        // Trouver la demande de visa par son ID
        $visaRequest = VisaRequest::findOrFail($id);

        // Vérifier si le statut est valide
        if (in_array($status, ['oui', 'non'])) {
            $visaRequest->validation = $status;
            $visaRequest->status = 'finalisée'; // Mettre à jour le statut à 'finalisee'
            $visaRequest->save();

            // Rediriger avec un message de succès
            return redirect()->route('admin.visa')->with('success', 'Demande mise à jour.');
        }

        // Si le statut n'est pas valide
        return redirect()->route('admin.visa')->with('error', 'Statut invalide.');
    }

    // Générer le PDF pour une demande spécifique
    public function generatePdf($id)
    {
        $visaRequest = VisaRequest::findOrFail($id);
    
        // Chemin de l'image du passeport
        $passportImagePath = storage_path('app/public/' . $visaRequest->passport_image);
    
        // Création du PDF avec FPDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
    
        // Titre du PDF
        $pdf->Cell(40, 10, utf8_decode('Récapitulatif de la Demande de Visa')); // Utilisation de utf8_decode pour les accents
        $pdf->Ln(10);
    
        // Contenu du PDF
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 10, utf8_decode('Nom: ' . $visaRequest->name));
        $pdf->Ln(10);
        $pdf->Cell(40, 10, utf8_decode('Prénom: ' . $visaRequest->surname));
        $pdf->Ln(10);
        $pdf->Cell(40, 10, utf8_decode('Date de naissance: ' . $visaRequest->birthdate));
        $pdf->Ln(10);
        $pdf->Cell(40, 10, utf8_decode('Nationalité: ' . $visaRequest->nationality));
        $pdf->Ln(10);
        $pdf->Cell(40, 10, utf8_decode('Numéro de passeport: ' . $visaRequest->passport_number));
        $pdf->Ln(10);
        $pdf->Cell(40, 10, utf8_decode('Validité du passeport: ' . $visaRequest->passport_expiry));
        $pdf->Ln(10);
    
        // Ajouter l'image du passeport dans le PDF
        if (file_exists($passportImagePath)) {
            // L'image doit être dans le répertoire accessible et de taille adaptée
            $pdf->Image($passportImagePath, 30, 100, 40); // Position (30,100) et taille (40mm)
            $pdf->Ln(50); // Ajout d'un espace après l'image
        } else {
            $pdf->Cell(40, 10, utf8_decode('Image du passeport non disponible'));
            $pdf->Ln(10);
        }
    
        // Définir le chemin du fichier PDF sur le disque
        $filePath = storage_path('app/public/visa/visa_request_' . $visaRequest->id . '.pdf');
    
        // Générer le fichier PDF et le sauvegarder dans un fichier
        $pdf->Output('F', $filePath); // 'F' pour sauvegarder le PDF dans un fichier
    
        // Retourner le PDF au format de téléchargement
        return response()->download($filePath); // Utilise 'download' pour permettre à l'utilisateur de télécharger le fichier généré
    }
    

    public function generateAcceptedPdf($id)
    {
        // Récupère la demande de visa par son ID
        $visaRequest = VisaRequest::findOrFail($id);

        // Vérifier que la demande est acceptée
        if ($visaRequest->validation !== 'oui') {
            return redirect()->route('admin.visa')->with('error', 'Visa non accepté.');
        }

        // Chemin de l'image du passeport
        $passportImagePath = storage_path('app/public/' . $visaRequest->passport_image);

        // Création du PDF avec FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Définir la police (en utilisant une police TrueType ou standard)
        $pdf->SetFont('Arial', 'B', 16);

        // Titre du PDF
        $pdf->Cell(40, 10, utf8_decode('Visa Accepté'));
        $pdf->Ln(10);

        // Contenu du PDF
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 10, utf8_decode('Nom: ' . $visaRequest->name));
        $pdf->Ln(10);
        $pdf->Cell(40, 10, utf8_decode('Prénom: ' . $visaRequest->surname));
        $pdf->Ln(10);
        $pdf->Cell(40, 10, utf8_decode('Date de naissance: ' . $visaRequest->birthdate));
        $pdf->Ln(10);
        $pdf->Cell(40, 10, utf8_decode('Nationalité: ' . $visaRequest->nationality));
        $pdf->Ln(10);
        $pdf->Cell(40, 10, utf8_decode('Numéro de passeport: ' . $visaRequest->passport_number));
        $pdf->Ln(10);
        $pdf->Cell(40, 10, utf8_decode('Validité du passeport: ' . $visaRequest->passport_expiry));
        $pdf->Ln(10);

        // Ajouter l'image du passeport dans le PDF
        if (file_exists($passportImagePath)) {
            // L'image doit être dans le répertoire accessible et de taille adaptée
            $pdf->Image($passportImagePath, 30, 100, 40); // Position (30,100) et taille (40mm)
            $pdf->Ln(50); // Ajout d'un espace après l'image
        } else {
            $pdf->Cell(40, 10, utf8_decode('Image du passeport non disponible'));
            $pdf->Ln(10);
        }

        // Chemin pour sauvegarder le PDF dans le dossier "visaaccept"
        $filePath = storage_path('app/public/visaaccept/visa_request_' . $visaRequest->id . '_accepted.pdf');

        // Générer le fichier PDF et le sauvegarder
        $pdf->Output('F', $filePath); // 'F' pour sauvegarder le PDF dans un fichier

        // Retourner le PDF pour téléchargement
        return response()->download($filePath); // Télécharger le PDF
    }

}
