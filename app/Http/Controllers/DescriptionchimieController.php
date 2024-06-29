<?php

namespace App\Http\Controllers;

use App\Models\profilrechercher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DescriptionchimieController extends Controller
{


    public function create()
    {
        return view('departements.ajoutdescriptionchimie');
    }
    public function store(Request $request): RedirectResponse
    {

        // dd($request);




           $profil = new profilrechercher();
           $profil->description = $request->description;
           $profil->departements = $request->departements;

        // // Sauvegarder le profil
         $profil->save();


        //  // Connecter l'administrateur
         // Auth::login($request->profilrechercher());
        // Rediriger l'administrateur vers sa propre page
          return redirect()->route('    ajoutdescriptionchimie')->with('success', 'Description du profil enregistrée avec succès!');;
    }


    // public function list()
    // {
    //     $Profilrecherchers  = Profilrechercher::all();
    //     return view('drh.descriptionprofil', compact('Profilrecherchers'));
    // }


}