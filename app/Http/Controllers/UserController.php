<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function activer($id)
    {


        $user = User::findOrFail($id);
        $user->etat = 'actif';
        $user->update();

        return redirect()->back()->with('success', 'Compte activé avec succès.');
    }

    public function desactiver($id)
    {
        $user = User::findOrFail($id);
        $user->etat = 'inactif';
        $user->update();

        return redirect()->back()->with('success', 'Compte désactivé avec succès.');
    }
}
