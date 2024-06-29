<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VicerecteurController extends Controller
{
    // Afficher la liste des utilisateurs
    public function index()
    {
        $users = User::all();
        // dd($users);
        return view('vicerecteur', compact('users'));
    }

    // Afficher le formulaire de création d'utilisateur
    public function create()
    {
        return view('users.create');
    }

    // Enregistrer un nouvel utilisateur dans la base de données
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'id'=>'required',
            'prenom' => 'required',
            'nom' => 'required',
            'phone' => 'required',
            'adresse' => 'required',
            'email' => 'required|email|unique:users',
            'ddn' => 'required',
            'paysDeNaissance' => 'required',
            'lieuDeNaissance' => 'required',
            'profil' => 'required',
            'password' => 'required|min:8',
        ]);

        // Création de l'utilisateur
        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    // Afficher le formulaire de modification de l'utilisateur
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Mettre à jour les informations de l'utilisateur dans la base de données
    public function update(Request $request, User $user)
    {
        // Validation des données
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:6',
        ]);

        // Mise à jour de l'utilisateur
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    // Supprimer un utilisateur de la base de données
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
