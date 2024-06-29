<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class DesignationController extends Controller
{
    // creation des membres des membres du departement tic
    public function create()
    {
        return view('departements.designationtic')->with('success', 'President commission ajouter avec succès');
    }
    public function store(Request $request): RedirectResponse
    {

    //    dd($request->all());


        $commission = new User();


        $commission->prenom = $request->prenom;
        $commission->nom = $request->nom;
        $commission->phone = $request->phone;
        $commission->adresse = $request->adresse;
        $commission->email = $request->email;
        // $commission->ddn = $request->ddn;
        // $commission->paysDeNaissance = $request->paysDeNaissance;
        // $commission->lieuDeNaissance = $request ->lieuDeNaissance;
        $commission->profil = $request->profil;
        $commission->departement = $request->departement;
        $commission->password = $request->password;


        // Sauvegarder l'utilisateur
        $commission->save();

         // Connecter l'administrateur
         Auth::login($request->user());
         // Rediriger l'administrateur vers sa propre page
         return redirect()->route('designationtic');
    }


    // creation des membres des membres du departement mathematique
    public function createmathematique()
    {
        return view('departements.designationmathematique')->with('success', 'President commission ajouter avec succès');
    }
    public function storemathematique(Request $request): RedirectResponse
    {

    //    dd($request->all());


        $commission = new User();


        $commission->prenom = $request->prenom;
        $commission->nom = $request->nom;
        $commission->phone = $request->phone;
        $commission->adresse = $request->adresse;
        $commission->email = $request->email;
        // $commission->ddn = $request->ddn;
        // $commission->paysDeNaissance = $request->paysDeNaissance;
        // $commission->lieuDeNaissance = $request ->lieuDeNaissance;
        $commission->profil = $request->profil;
        $commission->departement = $request->departement;
        $commission->password = $request->password;


        // Sauvegarder l'utilisateur
        $commission->save();

         // Connecter l'administrateur
         Auth::login($request->user());
         // Rediriger l'administrateur vers sa propre page
         return redirect()->route('designationmathematique');
    }


    // creation des membres des membres du departement physique
    public function createphysique()
    {
        return view('departements.designationphysique')->with('success', 'President commission ajouter avec succès');
    }
    public function storephysique(Request $request): RedirectResponse
    {

    //    dd($request->all());


        $commission = new User();


        $commission->prenom = $request->prenom;
        $commission->nom = $request->nom;
        $commission->phone = $request->phone;
        $commission->adresse = $request->adresse;
        $commission->email = $request->email;
        // $commission->ddn = $request->ddn;
        // $commission->paysDeNaissance = $request->paysDeNaissance;
        // $commission->lieuDeNaissance = $request ->lieuDeNaissance;
        $commission->profil = $request->profil;
        $commission->departement = $request->departement;
        $commission->password = $request->password;


        // Sauvegarder l'utilisateur
        $commission->save();

         // Connecter l'administrateur
         Auth::login($request->user());
         // Rediriger l'administrateur vers sa propre page
         return redirect()->route('designationphysique');
    }



    // creation des membres des membres du departement chimie
    public function createchimie()
    {
        return view('departements.designationchimie')->with('success', 'President commission ajouter avec succès');
    }
    public function storechimie(Request $request): RedirectResponse
    {

    //    dd($request->all());


        $commission = new User();


        $commission->prenom = $request->prenom;
        $commission->nom = $request->nom;
        $commission->phone = $request->phone;
        $commission->adresse = $request->adresse;
        $commission->email = $request->email;
        // $commission->ddn = $request->ddn;
        // $commission->paysDeNaissance = $request->paysDeNaissance;
        // $commission->lieuDeNaissance = $request ->lieuDeNaissance;
        $commission->profil = $request->profil;
        $commission->departement = $request->departement;
        $commission->password = $request->password;


        // Sauvegarder l'utilisateur
        $commission->save();

         // Connecter l'administrateur
         Auth::login($request->user());
         // Rediriger l'administrateur vers sa propre page
         return redirect()->route('designationchimie');
    }



    // creation des membres des membres du departement ij
    public function createij()
    {
        return view('departements.designationij')->with('success', 'President commission ajouter avec succès');
    }
    public function storeij(Request $request): RedirectResponse
    {

    //    dd($request->all());


        $commission = new User();


        $commission->prenom = $request->prenom;
        $commission->nom = $request->nom;
        $commission->phone = $request->phone;
        $commission->adresse = $request->adresse;
        $commission->email = $request->email;
        // $commission->ddn = $request->ddn;
        // $commission->paysDeNaissance = $request->paysDeNaissance;
        // $commission->lieuDeNaissance = $request ->lieuDeNaissance;
        $commission->profil = $request->profil;
        $commission->departement = $request->departement;
        $commission->password = $request->password;


        // Sauvegarder l'utilisateur
        $commission->save();

         // Connecter l'administrateur
         Auth::login($request->user());
         // Rediriger l'administrateur vers sa propre page
         return redirect()->route('designationij');
    }



    // creation des membres des membres du departement management
    public function createmanagement()
    {
        return view('departements.designationmanagement')->with('success', 'President commission ajouter avec succès');
    }
    public function storemanagement(Request $request): RedirectResponse
    {

    //    dd($request->all());


        $commission = new User();


        $commission->prenom = $request->prenom;
        $commission->nom = $request->nom;
        $commission->phone = $request->phone;
        $commission->adresse = $request->adresse;
        $commission->email = $request->email;
        // $commission->ddn = $request->ddn;
        // $commission->paysDeNaissance = $request->paysDeNaissance;
        // $commission->lieuDeNaissance = $request ->lieuDeNaissance;
        $commission->profil = $request->profil;
        $commission->departement = $request->departement;
        $commission->password = $request->password;


        // Sauvegarder l'utilisateur
        $commission->save();

         // Connecter l'administrateur
         Auth::login($request->user());
         // Rediriger l'administrateur vers sa propre page
         return redirect()->route('designationmanagement');
    }



    // creation des membres des membres du departement sante
    public function createsante()
    {
        return view('departements.designationsante')->with('success', 'President commission ajouter avec succès');
    }
    public function storesante(Request $request): RedirectResponse
    {

    //    dd($request->all());


        $commission = new User();


        $commission->prenom = $request->prenom;
        $commission->nom = $request->nom;
        $commission->phone = $request->phone;
        $commission->adresse = $request->adresse;
        $commission->email = $request->email;
        // $commission->ddn = $request->ddn;
        // $commission->paysDeNaissance = $request->paysDeNaissance;
        // $commission->lieuDeNaissance = $request ->lieuDeNaissance;
        $commission->profil = $request->profil;
        $commission->departement = $request->departement;
        $commission->password = $request->password;


        // Sauvegarder l'utilisateur
        $commission->save();

         // Connecter l'administrateur
         Auth::login($request->user());
         // Rediriger l'administrateur vers sa propre page
         return redirect()->route('designationsante');
    }



    // creation des membres des membres du departement dd
    public function createdd()
    {
        return view('departements.designationdd')->with('success', 'President commission ajouter avec succès');
    }
    public function storedd(Request $request): RedirectResponse
    {

    //    dd($request->all());


        $commission = new User();


        $commission->prenom = $request->prenom;
        $commission->nom = $request->nom;
        $commission->phone = $request->phone;
        $commission->adresse = $request->adresse;
        $commission->email = $request->email;
        // $commission->ddn = $request->ddn;
        // $commission->paysDeNaissance = $request->paysDeNaissance;
        // $commission->lieuDeNaissance = $request ->lieuDeNaissance;
        $commission->profil = $request->profil;
        $commission->departement = $request->departement;
        $commission->password = $request->password;


        // Sauvegarder l'utilisateur
        $commission->save();

         // Connecter l'administrateur
         Auth::login($request->user());
         // Rediriger l'administrateur vers sa propre page
         return redirect()->route('designationdd');
    }


    public function list()
    {
        // Récupérer les utilisateurs dont le profil est "presidentcomission"
        $users = User::where('profil', 'presidentcomission','rapporteur')->get();

        // Retourner la vue avec les utilisateurs filtrés
        return view('direction.membre', compact('users'));
    }




//     public function edit()
//     {
//         $id=request('id');
//         $user = User::findOrFail($id);
//         return view('modifier', compact('user'));
//     }
//     public function update(Request $request)
//     {

//         $user = User::findOrFail($request->id);

//         // Mettre à jour les données du compte
//         $user->prenom = $request->prenom;
//         // Ajoutez les autres champs à mettre à jour ici...

//         $user->update();

//         // Rediriger avec un message de succès ou vers une autre page
//         return redirect()->route('liste_comptes')->with('success', 'Compte mis à jour avec succès');
//     }

//     public function destroy()
// {
//     // Trouver l'utilisateur à supprimer
//     $id=request('id');
//     $user = user::findOrFail($id);

//     // Supprimer l'utilisateur
//     $user->delete();

//     // Rediriger avec un message de confirmation
//     return redirect()->route('liste_comptes')->with('success', 'Utilisateur supprimé avec succès');
// }




}
