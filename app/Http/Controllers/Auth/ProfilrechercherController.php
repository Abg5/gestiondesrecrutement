<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profilrechercher;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class ProfilrechercherController extends Controller
{
    // ajout du profil
    public function create()
    {
        return view('departements.ajoutdescription');
    }
    public function store(Request $request): RedirectResponse
    {

        // dd($request);




           $profil = new Profilrechercher();
           $profil->description = $request->description;
           $profil->departements = $request->departements;

        // // Sauvegarder le profil
         $profil->save();


        //  // Connecter l'administrateur
         // Auth::login($request->profilrechercher());
        // Rediriger l'administrateur vers sa propre page
          return redirect()->route('ajoutdescription')->with('success', 'Description du profil enregistrée avec succès!');;
    }


    public function list()
    {
        $Profilrecherchers  = Profilrechercher::all();
        return view('drh.descriptionprofil', compact('Profilrecherchers'));
    }












}
