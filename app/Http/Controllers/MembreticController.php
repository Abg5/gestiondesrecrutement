<?php

namespace App\Http\Controllers;

use App\Models\postuler;
use App\Models\Postuleruser;
use Illuminate\Http\Request;

class MembreticController extends Controller
{
    //pour les membres du departement de tic
public function showCandidates()
{
$postuler=postuler::find(0);


    $posts=Postuler::all();

    // Passer les données à la vue
    return view('membres.membre', compact('posts'));
}

//pour visualiser les dossiers
public function showDiplomes($id)
{
    $postuler_id = request('postuler_id');
    // Récupérer le candidat avec ses diplômes
    // $candidat = User::with('diplomes')->findOrFail($id);
    $diplomes = Postuleruser::where('user_id', $id)
    ->where('postuler_id', $postuler_id)->get();


    // Retourner une vue avec les diplômes du candidat
    return view('membres.voirplustic', compact('diplomes', 'id'));
}

//pour les membres du departement de physique
public function showCandidatesphysique()
{
$postuler=postuler::find(0);


    $posts=Postuler::all();

    // Passer les données à la vue
    return view('membres.membrephysique', compact('posts'));
}

//pour visualiser les dossiers
public function showDiplomesphysique($id)
{
    $postuler_id = request('postuler_id');
    // Récupérer le candidat avec ses diplômes
    // $candidat = User::with('diplomes')->findOrFail($id);
    $diplomes = Postuleruser::where('user_id', $id)
    ->where('postuler_id', $postuler_id)->get();


    // Retourner une vue avec les diplômes du candidat
    return view('membres.voirplusphysique', compact('diplomes', 'id'));
}
//pour les membres du departement mathematique

public function showCandidatesmathematique()
{
$postuler=postuler::find(0);


    $posts=Postuler::all();

    // Passer les données à la vue
    return view('membres.membremathematique', compact('posts'));
}

//pour visualiser les dossiers
public function showDiplomesmathematique($id)
{
    $postuler_id = request('postuler_id');
    // Récupérer le candidat avec ses diplômes
    // $candidat = User::with('diplomes')->findOrFail($id);
    $diplomes = Postuleruser::where('user_id', $id)
    ->where('postuler_id', $postuler_id)->get();


    // Retourner une vue avec les diplômes du candidat
    return view('membres.voirplusmathematique', compact('diplomes', 'id'));
}
//pour les membres du departement management

public function showCandidatesmanagement()
{
$postuler=postuler::find(0);


    $posts=Postuler::all();

    // Passer les données à la vue
    return view('membres.membremanagement', compact('posts'));
}

//pour visualiser les dossiers
public function showDiplomesmanagement($id)
{
    $postuler_id = request('postuler_id');
    // Récupérer le candidat avec ses diplômes
    // $candidat = User::with('diplomes')->findOrFail($id);
    $diplomes = Postuleruser::where('user_id', $id)
    ->where('postuler_id', $postuler_id)->get();


    // Retourner une vue avec les diplômes du candidat
    return view('membres.voirplusmanagement', compact('diplomes', 'id'));
}

//pour les membres du departement ij

public function showCandidatesij()
{
$postuler=postuler::find(0);


    $posts=Postuler::all();

    // Passer les données à la vue
    return view('membres.membreij', compact('posts'));
}

//pour visualiser les dossiers
public function showDiplomesij($id)
{
    $postuler_id = request('postuler_id');
    // Récupérer le candidat avec ses diplômes
    // $candidat = User::with('diplomes')->findOrFail($id);
    $diplomes = Postuleruser::where('user_id', $id)
    ->where('postuler_id', $postuler_id)->get();


    // Retourner une vue avec les diplômes du candidat
    return view('membres.voirplusij', compact('diplomes', 'id'));
}

//pour les membres du departement sante
public function showCandidatessante()
{
$postuler=postuler::find(0);


    $posts=Postuler::all();

    // Passer les données à la vue
    return view('membres.membresante', compact('posts'));
}

//pour visualiser les dossiers
public function showDiplomessante($id)
{
    $postuler_id = request('postuler_id');
    // Récupérer le candidat avec ses diplômes
    // $candidat = User::with('diplomes')->findOrFail($id);
    $diplomes = Postuleruser::where('user_id', $id)
    ->where('postuler_id', $postuler_id)->get();


    // Retourner une vue avec les diplômes du candidat
    return view('membres.voirplussante', compact('diplomes', 'id'));
}
//pour les membres du departement chimie
public function showCandidateschimie()
{
$postuler=postuler::find(0);


    $posts=Postuler::all();

    // Passer les données à la vue
    return view('membres.membrechimie', compact('posts'));
}

//pour visualiser les dossiers
public function showDiplomeschimie($id)
{
    $postuler_id = request('postuler_id');
    // Récupérer le candidat avec ses diplômes
    // $candidat = User::with('diplomes')->findOrFail($id);
    $diplomes = Postuleruser::where('user_id', $id)
    ->where('postuler_id', $postuler_id)->get();


    // Retourner une vue avec les diplômes du candidat
    return view('membres.voirpluschimie', compact('diplomes', 'id'));
}
//pour les membres du departement dd
public function showCandidatesdd()
{
$postuler=postuler::find(0);


    $posts=Postuler::all();

    // Passer les données à la vue
    return view('membres.membredd', compact('posts'));
}

//pour visualiser les dossiers
public function showDiplomesdd($id)
{
    $postuler_id = request('postuler_id');
    // Récupérer le candidat avec ses diplômes
    // $candidat = User::with('diplomes')->findOrFail($id);
    $diplomes = Postuleruser::where('user_id', $id)
    ->where('postuler_id', $postuler_id)->get();


    // Retourner une vue avec les diplômes du candidat
    return view('membres.voirplusdd', compact('diplomes', 'id'));
}
public function indexphysique()
{
    $postes = postuler::all();
    return view('membres.intermembrephysique', compact('postes'));
}
public function indextic()
{
    $postes = postuler::all();
    return view('membres.intermembretic', compact('postes'));
}
public function indexchimie()
{
    $postes = postuler::all();
    return view('membres.intermembrechimie', compact('postes'));
}
public function indexmathematique()
{
    $postes = postuler::all();
    return view('membres.intermembremathematique', compact('postes'));
}
public function indexij()
{
    $postes = postuler::all();
    return view('membres.intermembreij', compact('postes'));
}
public function indexmanagement()
{
    $postes = postuler::all();
    return view('membres.intermembremanagement', compact('postes'));
}
public function indexsante()
{
    $postes = postuler::all();
    return view('membres.intermembresante', compact('postes'));
}
public function indexdd()
{
    $postes = postuler::all();
    return view('membres.intermembredd', compact('postes'));
}
}
