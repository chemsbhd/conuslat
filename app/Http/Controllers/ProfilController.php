<?php

namespace App\Http\Controllers;

use App\Models\VisaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use FPDF;

class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        // Récupère toutes les demandes de visa de l'utilisateur connecté
        $visaRequests = VisaRequest::where('user_id', $user->id)->get();

        // Vérifie si l'utilisateur est un administrateur
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('profil.admin');
        }

        // Passe les demandes de visa à la vue
        return view('pages.profil', ['user' => $user, 'visaRequests' => $visaRequests]);
    }

    public function admin()
    {
        $user = Auth::user();

        // Assure-toi que l'utilisateur est connecté et qu'il est admin
        if ($user && $user->role === 'admin') {
            return view('pages.admin', compact('user'));
        }

        return redirect()->route('profil.show')->with('error', 'Accès non autorisé.');
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

        // Générer le fichier PDF en sortie mémoire
        $pdfOutput = $pdf->Output('S', 'visa_request_' . $visaRequest->id . '.pdf'); // 'S' pour générer un PDF en mémoire

        // Retourner le PDF en réponse
        return response($pdfOutput)
            ->header('Content-Type', 'application/pdf') // Spécifie le type de contenu PDF
            ->header('Content-Disposition', 'inline; filename="visa_request_' . $visaRequest->id . '.pdf"'); // Afficher dans le navigateur
    }

    public function generateAcceptedVisaPdf($id)
{
    // Récupère la demande de visa par l'ID
    $visaRequest = VisaRequest::findOrFail($id);

    // Vérifier que la demande est acceptée
    if ($visaRequest->validation !== 'oui') {
        return redirect()->route('profile')->with('error', 'Votre visa n\'a pas été accepté.');
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

    // Retourner le PDF
    return response()->download($filePath); // Télécharger le PDF
}



}
