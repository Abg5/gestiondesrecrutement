<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\adequation;
use App\Models\postuler;
use App\Models\appelcandidature;
use App\Models\diplome;
use App\Models\enseignementuadb;
use App\Models\experiencepedagogique;
use App\Models\experienceprofessionel;
use App\Models\grade;
use App\Models\Postulerpats;
use App\Models\Postuleruser;
use App\Models\publication;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class PostulerpatsController extends Controller
{
    // ajout du profil
    public function create()
    {
        return view('postulerpats1');
    }
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            //    experience pedagogique
            'maitriseoutilanalyse' =>'nullable|string|in:non,assezproche,tresproche',
            'maitrisedeslogiciels' =>'nullable|string|in:non,assezproche,tresproche',
            'qualitedepresentation' =>'nullable|string|in:non,assezproche,tresproche',
            'attestationpedagogique'=>'nullable|file|mimes:pdf|max:2048',
            // experience professionnel
            'pertinanceformation' =>'nullable|string|in:non,assezproche,tresproche',
            'pertinanceexperience' =>'nullable|string|in:non,assezproche,tresproche',
            'maitriselangue' =>'nullable|string|in:non,assezproche,tresproche',
            'maitriseas'=>'nullable|string|in:non,assezproche,tresproche',
            'attestationprofessionnel'=>'nullable|file|mimes:pdf|max:2048',

        ]);
        $user= Auth::user();
//  // Récupérer l'ID du postuler à partir de la requête
//  $postuler_id= $request->query('id');

//  // Vérifiez si l'ID du postuler est valide
//  $postuler = postuler::find($postuler_id);

// Calculer les points pour l'expérience pédagogique
$experiencePedagogiquePoints = 0;
if ($request->hasFile('attestationpedagogique')) {
    $experiencePedagogiquePoints += $this->calculatePoints($request->maitriseoutilanalyse);
    $experiencePedagogiquePoints += $this->calculatePoints($request->maitrisedeslogiciels);
    $experiencePedagogiquePoints += $this->calculatePoints($request->qualitedepresentation);
}
// Enregistrer l'expérience pédagogique

        $experiencepedagogique = new experiencepedagogique();
        $experiencepedagogique->maitriseoutilanalyse= $request->maitriseoutilanalyse;
        $experiencepedagogique->maitrisedeslogiciels= $request->maitrisedeslogiciels;
        $experiencepedagogique->qualitedepresentation= $request->qualitedepresentation;
        $experiencepedagogique->point = $experiencePedagogiquePoints; // Enregistrer les points
        $experiencepedagogique->iduser=$user->id;

    if ($request->hasFile('attestationpedagogique')) {
        // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
        $fichierPath = $request->file('attestationpedagogique')->store('pdfs', 'public');
        // Enregistrer le chemin du fichier dans la base de données
        $experiencepedagogique->attestationpedagogique = $fichierPath;
    }


    $experiencepedagogique->save();

     // experience professionnel

     // Calculer les points pour l'expérience professionnelle
     $experienceProfessionelPoints = 0;
     if ($request->hasFile('attestationpedagogique')) {
        $experiencePedagogiquePoints += $this->calculatePoints($request->maitriseoutilanalyse);
        $experiencePedagogiquePoints += $this->calculatePoints($request->maitrisedeslogiciels);
        $experiencePedagogiquePoints += $this->calculatePoints($request->qualitedepresentation);
    }
     $experienceprofessionel = new experienceprofessionel();
     $experienceprofessionel->pertinanceformation= $request->pertinanceformation;
     $experienceprofessionel->pertinanceexperience= $request->pertinanceexperience;
     $experienceprofessionel->maitriselangue= $request->maitriselangue;
     $experienceprofessionel->maitriseas= $request->maitriseas;
     $experienceprofessionel->point = $experienceProfessionelPoints; // Enregistrer les points
     $experienceprofessionel->iduser=$user->id;
 if ($request->hasFile('attestationprofessionnel')) {
     // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
     $fichierPath = $request->file('attestationprofessionnel')->store('pdfs', 'public');
     // Enregistrer le chemin du fichier dans la base de données
     $experienceprofessionel->attestationprofessionnel = $fichierPath;
 }
 //dd($experienceprofessionel);
    $experienceprofessionel->save();

    $experiencepedagogique = experiencepedagogique::latest()->first();
    $experienceprofessionel = experienceprofessionel::latest()->first();

     // Récupérer l'id du postuler après l'avoir sauvegardé

    //  $postuleruser = new Postuleruser();
    //  $postuleruser->user_id=$user->id;
    //  $postuleruser->postuler_id= $postuler->id;
    //  $postuleruser->experiencepedagogique_id=$experiencepedagogique->id;
    //  $postuleruser->experienceprofessionnel_id=$experienceprofessionel->id;
    // //   dd($postuleruser);
    //  $postuleruser->save();

      // Récupérer l'id du postuler après l'avoir sauvegardé

   $postuleruser = new Postuleruser();
   $postuleruser->user_id=$user->id;
   $postuleruser->postuler_id=$request->postuler_id;
   $postuleruser->experiencepedagogique_id=$experiencepedagogique->id;
   $postuleruser->experienceprofessionnel_id=$experienceprofessionel->id;
    // dd( $postuleruser);

   $postuleruser->save();

    return redirect()->route('postulerpats')->with('success', 'Enregistrement validé!');


    }

    // Méthode pour calculer les points en fonction de la valeur
    private function calculatePoints($value)
    {
        switch ($value) {
            case 'non':
                return 0;
            case 'assezproche':
                return 1;
            case 'tresproche':
                return 2;
            default:
                return 0;
        }
    }
}
