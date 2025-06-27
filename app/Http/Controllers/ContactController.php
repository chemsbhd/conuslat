<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Afficher le formulaire
    public function showForm()
    {
        return view('pages.contact');
    }

    // Traiter la soumission du formulaire
    public function submitForm(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sujet' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Envoi du message par email ou stockage dans la base de données
        // Exemple avec un email :
        Mail::to('contact@exemple.com')->send(new \App\Mail\ContactFormMail($validated));

        // Retourner une réponse (par exemple un message de succès)
        return redirect()->route('contact.form')->with('success', 'Votre message a été envoyé avec succès!');
    }
}
