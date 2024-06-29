<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\postuler;
use App\Models\User;
use App\Notifications\NouvelUtilisateurNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class DepartementController extends Controller
{
    // creation du dapartement
    public function create()
    {
        return view('ajoutdepartement');
    }
    public function store(Request $request): RedirectResponse
    {

       // dd($request->all());


        $candidat = new User();


        $candidat->prenom = $request->prenom;
        $candidat->nom = $request->nom;
        $candidat->phone = $request->phone;
        $candidat->adresse = $request->adresse;
        $candidat->email = $request->email;
        $candidat->ddn = $request->ddn;
        $candidat->paysDeNaissance = $request->paysDeNaissance;
        $candidat->lieuDeNaissance = $request ->lieuDeNaissance;
        $candidat->profil = $request->profil;
        $candidat->departement = $request->departement;
        $candidat->ufr = $request->ufr;
        $candidat->password = $request->password;


        // Sauvegarder l'utilisateur
        $candidat->save();

        $candidat->notify(new NouvelUtilisateurNotification($candidat));
         // Connecter l'administrateur
         Auth::login($request->user());
         // Rediriger l'administrateur vers sa propre page
         return redirect()->route('liste_comptes');
    }

    public function list()
    {
        $users = User::all();
        return view('liste_comptes', compact('users'));
    }



    public function edit()
{
    $id = request('id');
    $user = User::findOrFail($id);
    return view('modifier', compact('user'));
}

public function update(Request $request)
{
    $user = User::findOrFail($request->id);

    // Mettre à jour les données du compte
    $user->prenom = $request->prenom;
    $user->nom = $request->nom;
    $user->email = $request->email;
    // Ajoutez les autres champs à mettre à jour ici...

    $user->save();

    // Rediriger avec un message de succès ou vers une autre page
    return redirect()->route('liste_comptes')->with('success', 'Compte mis à jour avec succès');
}


    public function destroy()
{
    // Trouver l'utilisateur à supprimer
    $id=request('id');
    $user = user::findOrFail($id);

    // Supprimer l'utilisateur
    $user->delete();

    // Rediriger avec un message de confirmation
    return redirect()->route('liste_comptes')->with('success', 'Utilisateur supprimé avec succès');
}

public function listpste()
{
     $idpost=request('id');
    $postuler = postuler::all();
     return view('drh.postes', compact('postuler','idpost'));
}



}
