<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Appelcandidat;
use App\Models\appelcandidature;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class AppelcandidatController extends Controller
{
    // ajout du profil
    public function create()
    {
        return view('drh.appelcandidat');
    }
    public function store(Request $request): RedirectResponse
    {

        // dd($request);

        // if ($request->hasFile('fichier')) {
        //     $pdfPath = $request->file('fichier')->store('pdfs', 'public');
        // }


           $appel = new appelcandidature();
           $appel->intituler = $request->intituler;
           $appel->departements = $request->departements;
           $appel->ufr = $request->ufr;
           $appel->datelimite = $request->datelimite;
           $appel->heurelimite = $request->heurelimite;
           $appel->contrat = $request->contrat;
           $appel->postes = $request->postes;
        //    $appel->pdf_path = $pdfPath ?? null;


        // // Sauvegarder l'appel de candidature
         $appel->save();


        //  // Connecter l'administrateur
         // Auth::login($request->profilrechercher());
        // Rediriger l'administrateur vers sa propre page
          return redirect()->route('appelcandidat')->with('success', 'enrigistrement validee!');;
    }


    public function list()
    {
        $appelcandidatures  = appelcandidature::all();
        return view('rectorats.appel', compact('appelcandidatures'));
    }












}
