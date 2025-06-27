<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\VisaRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VisaRequestController extends Controller
{
    public function create()
    {
        $nationalities = [
            'Afghanistan' => 'Afghane',
            'Albanie' => 'Albanaise',
            'Algérie' => 'Algérienne',
            'Andorre' => 'Andorrane',
            'Angola' => 'Angolaise',
            'Antigua-et-Barbuda' => 'Antiguayenne',
            'Argentine' => 'Argentine',
            'Arménie' => 'Arménienne',
            'Australie' => 'Australienne',
            'Autriche' => 'Autrichienne',
            'Azerbaïdjan' => 'Azerbaïdjanaise',
            'Bahamas' => 'Bahamienne',
            'Bahreïn' => 'Bahreïnienne',
            'Bangladesh' => 'Bangladaise',
            'Barbade' => 'Barbadienne',
            'Biélorussie' => 'Biélorusse',
            'Belgique' => 'Belge',
            'Bélize' => 'Bélizienne',
            'Bénin' => 'Béninoise',
            'Bhoutan' => 'Bhoutanaise',
            'Bolivie' => 'Bolivienne',
            'Bosnie-Herzégovine' => 'Bosnienne',
            'Botswana' => 'Botswanaise',
            'Brésil' => 'Brésilienne',
            'Brunéi' => 'Brunéienne',
            'Bulgarie' => 'Bulgare',
            'Burkina Faso' => 'Burkinabée',
            'Burundi' => 'Burundaise',
            'Cambodge' => 'Cambodgienne',
            'Cameroun' => 'Camerounaise',
            'Canada' => 'Canadienne',
            'Cap-Vert' => 'Cap-verdienne',
            'République centrafricaine' => 'Centrafricaine',
            'Tchad' => 'Tchadienne',
            'Chili' => 'Chilienne',
            'Chine' => 'Chinoise',
            'Colombie' => 'Colombienne',
            'Comores' => 'Comorienne',
            'Congo' => 'Congolaise (Congo-Brazzaville)',
            'République Démocratique du Congo' => 'Congolaise (Congo-Kinshasa)',
            'Costa Rica' => 'Costaricienne',
            'Côte d\'Ivoire' => 'Ivoirienne',
            'Croatie' => 'Croate',
            'Cuba' => 'Cubaine',
            'Chypre' => 'Chypriote',
            'République tchèque' => 'Tchèque',
            'Danemark' => 'Danoise',
            'Djibouti' => 'Djiboutienne',
            'Dominique' => 'Dominicaine',
            'République dominicaine' => 'Dominicaine (République)',
            'Équateur' => 'Équatorienne',
            'Égypte' => 'Égyptienne',
            'El Salvador' => 'Salvadorienne',
            'Guinée équatoriale' => 'Guinéenne Équatoriale',
            'Érythrée' => 'Érythréenne',
            'Estonie' => 'Estonienne',
            'Éthiopie' => 'Éthiopienne',
            'Fidji' => 'Fidjienne',
            'Finlande' => 'Finlandaise',
            'France' => 'Française',
            'Gabon' => 'Gabonaise',
            'Gambie' => 'Gambienne',
            'Géorgie' => 'Géorgienne',
            'Allemagne' => 'Allemande',
            'Ghana' => 'Ghanéenne',
            'Grèce' => 'Grecque',
            'Grenade' => 'Grenadienne',
            'Guatemala' => 'Guatémaltèque',
            'Guinée' => 'Guinéenne',
            'Guinée-Bissau' => 'Bissau-Guinéenne',
            'Guyane' => 'Guyanaise',
            'Haïti' => 'Haïtienne',
            'Honduras' => 'Hondurienne',
            'Hongrie' => 'Hongroise',
            'Islande' => 'Islandaise',
            'Inde' => 'Indienne',
            'Indonésie' => 'Indonésienne',
            'Iran' => 'Iranienne',
            'Irak' => 'Irakienne',
            'Irlande' => 'Irlandaise',
            'Israël' => 'Israélienne',
            'Italie' => 'Italienne',
            'Jamaïque' => 'Jamaïcaine',
            'Japon' => 'Japonaise',
            'Jordanie' => 'Jordanienne',
            'Kazakhstan' => 'Kazakh',
            'Kenya' => 'Kényane',
            'Kiribati' => 'Kiribatienne',
            'Corée du Nord' => 'Nord-Coréenne',
            'Corée du Sud' => 'Sud-Coréenne',
            'Koweït' => 'Koweïtienne',
            'Kirghizistan' => 'Kirghize',
            'Laos' => 'Laotienne',
            'Lettonie' => 'Lettone',
            'Liban' => 'Libanaise',
            'Lesotho' => 'Lesothane',
            'Liberia' => 'Libérienne',
            'Libye' => 'Libyenne',
            'Liechtenstein' => 'Liechtensteinoise',
            'Lituanie' => 'Lituanienne',
            'Luxembourg' => 'Luxembourgeoise',
            'Madagascar' => 'Malgache',
            'Malawi' => 'Malawienne',
            'Malaisie' => 'Malaisienne',
            'Maldives' => 'Maldivienne',
            'Mali' => 'Malienne',
            'Malte' => 'Maltaise',
            'Îles Marshall' => 'Marshallaise',
            'Mauritanie' => 'Mauritanienne',
            'Maurice' => 'Mauricienne',
            'Mexique' => 'Mexicaine',
            'Micronésie' => 'Micronésienne',
            'Moldavie' => 'Moldave',
            'Monaco' => 'Monégasque',
            'Mongolie' => 'Mongole',
            'Monténégro' => 'Monténégrine',
            'Mozambique' => 'Mozambicaine',
            'Birmanie' => 'Birmane',
            'Namibie' => 'Namibienne',
            'Nauru' => 'Nauruane',
            'Népal' => 'Népalaise',
            'Pays-Bas' => 'Néerlandaise',
            'Nouvelle-Zélande' => 'Néo-Zélandaise',
            'Nicaragua' => 'Nicaraguayenne',
            'Niger' => 'Nigérienne',
            'Nigeria' => 'Nigériane',
            'Norvège' => 'Norvégienne',
            'Oman' => 'Omanaise',
            'Pakistan' => 'Pakistanaise',
            'Palaos' => 'Palaosienne',
            'Panama' => 'Panaméenne',
            'Papouasie-Nouvelle-Guinée' => 'Papouane',
            'Paraguay' => 'Paraguayenne',
            'Pérou' => 'Péruvienne',
            'Philippines' => 'Philippine',
            'Pologne' => 'Polonaise',
            'Portugal' => 'Portugaise',
            'Qatar' => 'Qatarienne',
            'Roumanie' => 'Roumaine',
            'Russie' => 'Russe',
            'Rwanda' => 'Rwandaise',
            'Saint-Christophe-et-Niévès' => 'Saint-Kittsienne',
            'Sainte-Lucie' => 'Saint-Lucienne',
            'Saint-Vincent-et-les-Grenadines' => 'Saint-Vincentaise',
            'Samoa' => 'Samoane',
            'Saint-Marin' => 'Saint-Marinaise',
            'Sao Tomé-et-Principe' => 'Santoméenne',
            'Arabie Saoudite' => 'Saoudienne',
            'Sénégal' => 'Sénégalaise',
            'Serbie' => 'Serbe',
            'Seychelles' => 'Seychelloise',
            'Sierra Leone' => 'Sierra-Léonaise',
            'Singapour' => 'Singapourienne',
            'Slovaquie' => 'Slovaque',
            'Slovénie' => 'Slovène',
            'Îles Salomon' => 'Salomonaise',
            'Somalie' => 'Somalienne',
            'Afrique du Sud' => 'Sud-Africaine',
            'Espagne' => 'Espagnole',
            'Sri Lanka' => 'Sri-Lankaise',
            'Soudan' => 'Soudanaise',
            'Suriname' => 'Surinamaise',
            'Suède' => 'Suédoise',
            'Suisse' => 'Suisse',
            'Syrie' => 'Syrienne',
            'Taïwan' => 'Taiwanaise',
            'Tadjikistan' => 'Tadjike',
            'Tanzanie' => 'Tanzanienne',
            'Thaïlande' => 'Thaïlandaise',
            'Timor oriental' => 'Timoraise',
            'Togo' => 'Togolaise',
            'Tonga' => 'Tonguienne',
            'Trinité-et-Tobago' => 'Trinidadienne',
            'Tunisie' => 'Tunisienne',
            'Turquie' => 'Turque',
            'Turkménistan' => 'Turkmène',
            'Tuvalu' => 'Tuvaluane',
            'Ouganda' => 'Ougandaise',
            'Ukraine' => 'Ukrainienne',
            'Émirats arabes unis' => 'Émiratie',
            'Royaume-Uni' => 'Britannique',
            'États-Unis' => 'Américaine',
            'Uruguay' => 'Uruguayenne',
            'Ouzbékistan' => 'Ouzbèke',
            'Vanuatu' => 'Vanuatuane',
            'Venezuela' => 'Vénézuélienne',
            'Vietnam' => 'Vietnamienne',
            'Yémen' => 'Yéménite',
            'Zambie' => 'Zambienne',
            'Zimbabwe' => 'Zimbabwéenne',
        ];
        

        //recuperer l'utilisateur co et son champ validation
        // Récupérer l'utilisateur connecté
    $user = Auth::user();

    // Récupérer la requête de visa associée à cet utilisateur
    $visaRequest = $user->visaRequest;

    // Vérifier le statut si la requête de visa existe
    $status = $visaRequest ? $visaRequest->status : null;

    /// Récupérer toutes les demandes de visa de l'utilisateur connecté
    $visaRequests = VisaRequest::where('user_id', Auth::user()->id)->get();

    // Vérifier si l'une des demandes a un champ 'validation' nul
    foreach ($visaRequests as $visaRequest) {
        if (is_null($visaRequest->validation)) {
            // Si une demande en attente est trouvée, rediriger avec un message d'erreur
            return back()->withErrors(['visa_request' => 'Vous avez déjà une demande en attente de validation.']);
        }
    }

    return view('pages.visa-request', compact('nationalities', 'status'));
}

    public function store(Request $request)
    {

        // Validation des champs
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birthdate' => [
                'required',
                'date',
                'before_or_equal:' . \Carbon\Carbon::now()->subYears(18)->toDateString(), // Vérifie que la personne a au moins 18 ans
            ],
            'nationality' => 'required|string',
            'passport_number' => 'required|string|max:20',
            'passport_expiry' =>[
                'required',
                'date',
                'before_or_equal:' . \Carbon\Carbon::now()->subYears()->toDateString(),
            ],
            'passport_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'card_number' => 'required|string|regex:/^\d{16}$/', // 16 chiffres,
            'card_expiry' => 'required|string|max:5',
            'card_cvc' => 'required|string|max:3',
            'card_cvc' => 'required|string|regex:/^\d{3}$/', // 3 chiffres
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Vérification de la date d'expiration de la carte
        list($month, $year) = explode('/', $request->input('card_expiry'));
        $currentYear = (int)date('y');
        $currentMonth = (int)date('m');

        if ($month < 1 || $month > 12) {
            return back()->withErrors(['card_expiry' => 'Le mois doit être entre 01 et 12.'])->withInput();
        }

        if ($year < $currentYear || ($year == $currentYear && $month < $currentMonth)) {
            return back()->withErrors(['card_expiry' => 'La date d\'expiration de la carte est déjà passée.'])->withInput();
        }

        // Stockage de l'image du passeport
        $passportImagePath = $request->file('passport_image')->store('passport_images', 'public');
        
        $user1=Auth::user()->id;
        // Insertion dans la base de données
        VisaRequest::create([
            'user_id' => Auth::user()->id, // Liaison à l'utilisateur connecté
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'birthdate' => $request->input('birthdate'),
            'nationality' => $request->input('nationality'),
            'passport_number' => $request->input('passport_number'),
            'passport_expiry' => $request->input('passport_expiry'),
            'passport_image' => $passportImagePath,
            'card_number' => $request->input('card_number'),
            'card_expiry' => $request->input('card_expiry'),
            'card_cvc' => $request->input('card_cvc'),
            'validation' => null, // Validation à définir par un admin
        ]);

        return redirect('/profil')->with('success', 'Votre demande de visa a été soumise avec succès. Vous serez informé(e) de la décision dès qu\'elle sera disponible.');
    }
}


