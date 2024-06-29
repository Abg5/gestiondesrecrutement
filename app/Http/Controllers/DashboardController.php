<?php

namespace App\Http\Controllers;

use App\Models\postuler;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $chefdepartement = User::where('profil', 'chefdepartement')->count();
        $chefdrh = User::where('profil', 'chefdrh')->count();
        $dgrectorat = User::where('profil', 'dgrectorat')->count();
        $presidentcomission = User::where('profil', 'presidentcomission')->count();
        $vicerecteur = User::where('profil', 'vicerecteur')->count();
        $departement = User::where('departement')->count();
        $postulerper = postuler::where('postes','per')->count();
        $postulerpats = postuler::where('postes','pats')->count();

        // $candidates = User::where('role', 'candidate')->count();

        return view('dashboard', compact('totalUsers', 'chefdepartement', 'chefdrh' ,'dgrectorat' ,'presidentcomission' ,'vicerecteur','departement','postulerper','postulerpats'));
    }

}
