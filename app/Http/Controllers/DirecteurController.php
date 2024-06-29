<?php

namespace App\Http\Controllers;

use App\Models\postuler;
use App\Models\User;
use Illuminate\Http\Request;

class DirecteurController extends Controller
{
    public function showPreSelectedCandidates()
{
    $candidates = User::where('profil', 'candidat')
                      ->where('pre_selected', 1)
                      ->get();

    return view('direction.bordsatic', compact('candidates'));
}
public function indexsatic()
{
    $postes = postuler::all();
    return view('direction.satic', compact('postes'));
}
public function showPreSelectedCandidatesecomij()
{
    $candidates = User::where('profil', 'candidat')
                      ->where('pre_selected', 1)
                      ->get();

    return view('direction.bordecomij', compact('candidates'));
}
public function indexecomij()
{
    $postes = postuler::all();
    return view('direction.ecomij', compact('postes'));
}
public function showPreSelectedCandidatessdd()
{
    $candidates = User::where('profil', 'candidat')
                      ->where('pre_selected', 1)
                      ->get();

    return view('direction.bordsdd', compact('candidates'));
}
public function indexsdd()
{
    $postes = postuler::all();
    return view('direction.sdd', compact('postes'));
}
}
