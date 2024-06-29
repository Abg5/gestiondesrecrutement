<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Appelcandidat;
use App\Models\postuler;
use App\Models\publication;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class PublicationController extends Controller
{
    // ajout du profil
    public function create()
    {
        return view('drh.publication');
    }
    public function store(Request $request): RedirectResponse
    {

         //dd($request);

        $request->validate([
            'intituler' => 'required|string|max:255',
            'departements' => 'required|string|in:physique,chimie,mathematique,tic,ij,management,sante,dd',
            'ufr' => 'required|string|in:SATIC,ECOMIJ,SDD',
            'datelimite' => 'required|date',
            'heurelimite' => 'required|date_format:H:i',
            'contrat' => 'required|string|in:cdd,cdi',
            'postes' => 'required|string|in:per,pats',
            'fichier' => 'nullable|file|mimes:pdf|max:2048',
        ]);

    //    $user= Auth::user();

        $postuler = new postuler();
        $postuler->intituler = $request->intituler;
        $postuler->departements = $request->departements;
        $postuler->ufr = $request->ufr;
        $postuler->datelimite = $request->datelimite;
        $postuler->heurelimite = $request->heurelimite;
        $postuler->contrat = $request->contrat;
        $postuler->postes = $request->postes;
        // $postuler->iduser=$user->id;


        if ($request->hasFile('fichier')) {
            // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
            $fichierPath = $request->file('fichier')->store('pdfs', 'public');
            // Enregistrer le chemin du fichier dans la base de données
            $postuler->fichier = $fichierPath;
        }

        // Sauvegarder l'appel de candidature
        $postuler->save();
        //  // Connecter l'administrateur
         // Auth::login($request->profilrechercher());
        // Rediriger l'administrateur vers sa propre page
          return redirect()->route('publication')->with('success', 'appel publié avec succes!');;
    }


    public function list()
    {
        $appelcandidatures  = publication::all();
        return view('candidat', compact('publication'));
    }












}
