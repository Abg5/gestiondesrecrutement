<?php

namespace App\Http\Controllers;

use App\Models\etat;
use App\Models\postuler;
use App\Models\Postuleruser;
use App\Models\User;
use Illuminate\Http\Request;

class PresidentController extends Controller
{
    //pour le president de commission  du departement de tic
public function showCandidatestic()
{
$postuler=postuler::find(0);


    $posts=Postuler::all();

    // Passer les données à la vue
    return view('presidents.presidenttic', compact('posts'));
}

//pour visualiser les dossiers
public function showDiplomestic($id)
{
    $postuler_id = request('postuler_id');
    // Récupérer le candidat avec ses diplômes
    // $candidat = User::with('diplomes')->findOrFail($id);
    $diplomes = Postuleruser::where('user_id', $id)
    ->where('postuler_id', $postuler_id)->get();


    // Retourner une vue avec les diplômes du candidat
    return view('presidents.voirpluspresidenttic', compact('diplomes', 'id'));
}

   //pour le president de commission  du departement de mathematique
   public function showCandidatesmathematique()
   {
   $postuler=postuler::find(0);


       $posts=Postuler::all();

       // Passer les données à la vue
       return view('presidents.presidentmathematique', compact('posts'));
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
       return view('presidents.voirpluspresidentmathematique', compact('diplomes', 'id'));
   }

   //pour le president de commission  du departement de physique
   public function showCandidatesphysique()
   {
   $postuler=postuler::find(0);


       $posts=Postuler::all();

       // Passer les données à la vue
       return view('presidents.presidentphysique', compact('posts'));
   }
//la pre-selection des candidats physique
   public function preSelectionner($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 1 (true)
    $user->pre_selected = 1; // Utilisez 1 pour true

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Pré-sélection effectuée avec succès.');
}


public function deselectionner($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 0 (false)
    $user->pre_selected = 0; // Utilisez 0 pour false

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Désélection effectuée avec succès.');
}
//pre-selectin des candidats chimie
public function preSelectionnerchimie($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 1 (true)
    $user->pre_selected = 1; // Utilisez 1 pour true

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Pré-sélection effectuée avec succès.');
}


public function deselectionnerchimie($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 0 (false)
    $user->pre_selected = 0; // Utilisez 0 pour false

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Désélection effectuée avec succès.');
}
//pre-selectin des candidats mathematique
public function preSelectionnermathematique($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 1 (true)
    $user->pre_selected = 1; // Utilisez 1 pour true

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Pré-sélection effectuée avec succès.');
}

public function deselectionnermathematique($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 0 (false)
    $user->pre_selected = 0; // Utilisez 0 pour false

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Désélection effectuée avec succès.');
}
//pre-selection des candidats tic
public function preSelectionnertic($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 1 (true)
    $user->pre_selected = 1; // Utilisez 1 pour true

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Pré-sélection effectuée avec succès.');
}



public function deselectionnertic($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 0 (false)
    $user->pre_selected = 0; // Utilisez 0 pour false

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Désélection effectuée avec succès.');
}
//pre-selection des candidats ij
public function preSelectionnerij($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 1 (true)
    $user->pre_selected = 1; // Utilisez 1 pour true

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Pré-sélection effectuée avec succès.');
}



public function deselectionnerij($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 0 (false)
    $user->pre_selected = 0; // Utilisez 0 pour false

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Désélection effectuée avec succès.');
}

//pre-selection des candidats management
public function preSelectionnermanagement($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 1 (true)
    $user->pre_selected = 1; // Utilisez 1 pour true

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Pré-sélection effectuée avec succès.');
}



public function deselectionnermanagement($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 0 (false)
    $user->pre_selected = 0; // Utilisez 0 pour false

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Désélection effectuée avec succès.');
}
//pre-selection des candidats sante
public function preSelectionnersante($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 1 (true)
    $user->pre_selected = 1; // Utilisez 1 pour true

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Pré-sélection effectuée avec succès.');
}



public function deselectionnersante($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 0 (false)
    $user->pre_selected = 0; // Utilisez 0 pour false

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Désélection effectuée avec succès.');
}
//pre-selection des candidats dd
public function preSelectionnerdd($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 1 (true)
    $user->pre_selected = 1; // Utilisez 1 pour true

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Pré-sélection effectuée avec succès.');
}



public function deselectionnerdd($id)
{
    // Récupérer l'utilisateur par ID
    $user = User::findOrFail($id);

    // Mettre à jour la colonne pre_selected à 0 (false)
    $user->pre_selected = 0; // Utilisez 0 pour false

    // Enregistrer les modifications dans la base de données
    $user->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Désélection effectuée avec succès.');
}
   //pour visualiser les dossiers
   public function showDiplomesphysique($id)
   {
       $postuler_id = request('postuler_id');
       // Récupérer le candidat avec ses diplômes
       // $candidat = User::with('diplomes')->findOrFail($id);
       $diplomes = Postuleruser::where('user_id', $id)
       ->where('postuler_id', $postuler_id)->get();

// dd($diplomes);
       // Retourner une vue avec les diplômes du candidat
       return view('presidents.voirpluspresidentphysique', compact('diplomes', 'id'));
   }

   //pour le president de commission  du departement de chimie
   public function showCandidateschimie()
   {
   $postuler=postuler::find(0);


       $posts=Postuler::all();

       // Passer les données à la vue
       return view('presidents.presidentchimie', compact('posts'));
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
       return view('presidents.voirpluspresidentchimie', compact('diplomes', 'id'));
   }

   //pour le president de commission  du departement de ij
   public function showCandidatesij()
   {
   $postuler=postuler::find(0);


       $posts=Postuler::all();

       // Passer les données à la vue
       return view('presidents.presidentij', compact('posts'));
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
       return view('presidents.voirpluspresidentij', compact('diplomes', 'id'));
   }


   //pour le president de commission  du departement de management
   public function showCandidatesmanagement()
   {
   $postuler=postuler::find(0);


       $posts=Postuler::all();

       // Passer les données à la vue
       return view('presidents.presidentmanagement', compact('posts'));
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
       return view('presidents.voirpluspresidentmanagement', compact('diplomes', 'id'));
   }

   //pour le president de commission  du departement de sante
   public function showCandidatessante()
   {
   $postuler=postuler::find(0);


       $posts=Postuler::all();

       // Passer les données à la vue
       return view('presidents.presidentsante', compact('posts'));
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
       return view('presidents.voirpluspresidentsante', compact('diplomes', 'id'));
   }

   //pour le president de commission  du departement de dd
   public function showCandidatesdd()
   {
   $postuler=postuler::find(0);


       $posts=Postuler::all();

       // Passer les données à la vue
       return view('presidents.presidentdd', compact('posts'));
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
       return view('presidents.voirpluspresidentdd', compact('diplomes', 'id'));
   }
   public function indexphysique()
{
    $postes = postuler::all();
    return view('presidents.interphysique', compact('postes'));
}
public function indexchimie()
{
    $postes = postuler::all();
    return view('presidents.interchimie', compact('postes'));
}
public function indexij()
{
    $postes = postuler::all();
    return view('presidents.interij', compact('postes'));
}
public function indexdd()
{
    $postes = postuler::all();
    return view('presidents.interdd', compact('postes'));
}
public function indexmanagement()
{
    $postes = postuler::all();
    return view('presidents.intermanagement', compact('postes'));
}
public function indexmathematique()
{
    $postes = postuler::all();
    return view('presidents.intermathematique', compact('postes'));
}
public function indexsante()
{
    $postes = postuler::all();
    return view('presidents.intersante', compact('postes'));
}
public function indextic()
{
    $postes = postuler::all();
    return view('presidents.intertic', compact('postes'));
}
    // Méthode pour mettre à jour l'état de présélection
    public function updatePreselection(Request $request, $id)
{
    $postulerUser = Postuleruser::find($id);

    // Mettre à jour l'état de présélection
    $etat = etat::find($postulerUser->etat_id);
    if ($etat) {
        $etat->pre_selected = $request->input('pre_selected');
        $etat->save();
    }

    return redirect()->back()->with('success', 'L\'état de présélection a été mis à jour.');
}


}
