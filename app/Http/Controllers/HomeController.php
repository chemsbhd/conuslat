<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.accueil');
    }

    public function actu1()
    {
        return view('pages.actu1');
    }
    public function actu2()
    {
        return view('pages.actu2');
    }
    public function actu3()
    {
        return view('pages.actu3');
    }
    public function actu4()
    {
        return view('pages.actu4');
    }
    public function actu5()
    {
        return view('pages.actu5');
    }
    public function actu6()
    {
        return view('pages.actu6');
    }
    public function actu7()
    {
        return view('pages.actu7');
    }
    public function event1()
    {
        return view('pages.event1');
    }
    public function event2()
    {
        return view('pages.event2');
    }
    public function event3()
    {
        return view('pages.event3');
    }
    public function FAQ()
    {
        return view('pages.FAQ');
    }

    // Soumission du formulaire de contact sur la page d'accueil
    public function submitContactForm(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sujet' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Envoi de l'email avec les données validées
        Mail::to('contact@exemple.com')->send(new ContactFormMail($validated));

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès!');
    }


}
