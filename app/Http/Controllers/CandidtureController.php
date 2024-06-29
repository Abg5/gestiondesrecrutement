<?php

namespace App\Http\Controllers;

use App\Models\diplome;
use App\Models\enseignementuadb;
use App\Models\postuler;
use App\Models\Postuleruser;
use App\Models\profilrechercher;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CandidtureController extends Controller
{
    public function showCandidates($id)
    {


        $postuler=postuler::find($id);
        $candidats = Postuleruser::where('postuler_id', $id)->get();
        $posts = postuler::paginate(10);
        $posts=postuler::all();

        // Passer les données à la vue
        return view('drh.candidature', compact('posts','candidats'));
    }

//     public function search(Request $request)
// {
//     $query = $request->input('query');

//     $candidates = User::where('nom', 'LIKE', "%{$query}%")
//                            ->orWhere('prenom', 'LIKE', "%{$query}%")
//                            ->paginate(10); // Paginate with 10 candidates per page

//     return view('drh.candidature', compact('candidates'));
// }

public function showDiplomes($id)
{
    $postuler_id = request('postuler_id');

    // Récupérer les informations spécifiques de la table Postuleruser
    $diplomes = Postuleruser::where('user_id', $id)
        ->where('postuler_id', $postuler_id)->get();

    // Récupérer le candidat avec ses diplômes
    $candidat = User::with('diplomes')->findOrFail($id);

    // Retourner une vue avec les informations du candidat et ses diplômes
    return view('drh.voirplus', compact('diplomes', 'candidat','id'));
}

public function showDiplomespats($id)
{
    $postuler_id = request('postuler_id');

    // Récupérer les informations spécifiques de la table Postuleruser
    $diplomes = Postuleruser::where('user_id', $id)
        ->where('postuler_id', $postuler_id)->get();

    // Récupérer le candidat avec ses diplômes
    $candidat = User::with('diplomes')->findOrFail($id);
    // dd(request());

    // Retourner une vue avec les informations du candidat et ses diplômes
    return view('drh.voirpluspats', compact('diplomes', 'candidat'));
}

public function showDiplomesrecteurpats($id)
{
    $postuler_id = request('postuler_id');

    // Récupérer les informations spécifiques de la table Postuleruser
    $diplomes = Postuleruser::where('user_id', $id)
        ->where('postuler_id', $postuler_id)->get();

    // Récupérer le candidat avec ses diplômes
    $candidat = User::with('diplomes')->findOrFail($id);

    // Retourner une vue avec les informations du candidat et ses diplômes
    return view('rectorats.voirpluspatsrecteur', compact('diplomes', 'candidat'));
}




public function showDiplomes1($id)
{
    $postuler_id = request('postuler_id');
    // Récupérer le candidat avec ses diplômes
    // $candidat = User::with('diplomes')->findOrFail($id);
    $diplomes = Postuleruser::where('user_id', $id)
    ->where('postuler_id', $postuler_id)->get();


    // Retourner une vue avec les diplômes du candidat
    return view('president.voirpluspresident', compact('diplomes', 'id'));
}
//dossier pour le recteur
public function showDiplomes2($id)
{
    $postuler_id = request('postuler_id');
    // Récupérer le candidat avec ses diplômes
    // $candidat = User::with('diplomes')->findOrFail($id);
    $diplomes = Postuleruser::where('user_id', $id)
    ->where('postuler_id', $postuler_id)->get();


    // Retourner une vue avec les diplômes du candidat
    return view('rectorats.voirplusrecteur', compact('diplomes', 'id'));
}


public function index(Request $request)
{
    $posts = Postuler::paginate(10); // Paginate the posts, 10 posts per page
    return view('drh.candidature', compact('posts'));
}

// public function index1(Request $request)
// {
//     $posts = Postuler::paginate(10); // Paginate the posts, 10 posts per page
//     return view('rectorats.dossiercandidat', compact('posts'));
// }

//president commission

// public function index2(Request $request)
// {
//     $posts = Postuler::paginate(10); // Paginate the posts, 10 posts per page
//     return view('president.dossiercandidat', compact('posts'));
// }

// public function index()
// {
//     // Charger tous les candidats avec leurs relations de poste
//     $candidates = User::with('posts')->get();

//     // Grouper les candidats par le titre de poste
//     $groupedCandidates = $candidates->groupBy(function($candidate) {
//         return $candidate->posts->first()->intituler;
//     });

//     // Passer les candidats groupés à la vue
//     return view('drh.candidature', compact('groupedCandidates'));
// }
//pour le recteur
public function showCandidates1($id)
{
 $postuler=postuler::find($id);
        $candidats = Postuleruser::where('postuler_id', $id)->get();
        $posts = postuler::paginate(10);
        $posts=postuler::all();

    // Passer les données à la vue
    return view('rectorats.dossiercandidat1', compact('postuler','posts','candidats'));
}
//pour le president
public function showCandidates2()
{
$postuler=postuler::find(0);


    $posts=Postuler::all();

    // Passer les données à la vue
    return view('president.dossiercandidat', compact('posts'));
}

public function transmettreDossier($postuler_id, $id)
{
    $post = Postuler::find($postuler_id);
    $candidat = User::find($id);

    // Vérifier si le poste et le candidat existent
    if (!$post || !$candidat) {
        // Rediriger avec un message d'erreur si le poste ou le candidat n'existe pas
        return redirect()->back()->with('error', 'Le poste ou le candidat n\'existe pas.');
    }

    // Transmettre le dossier du candidat pour le poste spécifié
    // Votre logique de transmettre le dossier ici...

    // Rediriger avec un message de succès si la transmission réussit
    return redirect()->back()->with('success', 'Le dossier du candidat a été transmis avec succès.');
}

//edit pour points
// public function edit()
// {
//     $id=request('id');
//     $diplome = diplome::findOrFail($id);
//     return view('president.modifier', compact('diplome'));
// }
//mis ajour des points pour diplomes
public function update(Request $request)
{
    $diplome = Diplome::findOrFail($request->id);

    // Mettre à jour les données du diplôme
    $diplome->point = $request->point;
    // Ajoutez les autres champs à mettre à jour ici...

    $diplome->save();

    // Rediriger avec un message de succès vers la même page
    return redirect()->back()->with('success', 'Points mis à jour avec succès');
}
//edit pour enseignement uadb
// public function edit1()
// {
//     $id=request('id');
//     $enseignementuadb = enseignementuadb::findOrFail($id);
//     return view('president.modifier', compact('enseignementuadb'));
// }
// //mis a jour pour ensignement uadb

public function updateEnseignement(Request $request)
{
    $enseignementuadb = \App\Models\enseignementuadb::findOrFail($request->id);

    // Mettre à jour les données de l'enseignement UADB
    $enseignementuadb->point = $request->point;
    // Ajoutez les autres champs à mettre à jour ici...

    $enseignementuadb->save();

    // Rediriger avec un message de succès vers la même page
    return redirect()->back()->with('success', 'Points de l\'enseignement UADB mis à jour avec succès');
}

//experience professionelle
public function updateExperienceprofessionel(Request $request)
{
    $experienceprofessionel = \App\Models\experienceprofessionel::findOrFail($request->id);

    // Mettre à jour les données de l'experience professionnelle
    $experienceprofessionel->point = $request->point;
    // Ajoutez les autres champs à mettre à jour ici...

    $experienceprofessionel->save();

    // Rediriger avec un message de succès vers la même page
    return redirect()->back()->with('success', 'Points de l\'experience professionelle mis à jour avec succès');
}

//experience pedagogique
public function updateExperiencepedagogique(Request $request)
{
    $experiencepedagogique = \App\Models\experiencepedagogique::findOrFail($request->id);

    // Mettre à jour les données de l'experience pedagogique
    $experiencepedagogique->point = $request->point;
    // Ajoutez les autres champs à mettre à jour ici...

    $experiencepedagogique->save();

    // Rediriger avec un message de succès vers la même page
    return redirect()->back()->with('success', 'Points de l\'expereince pedagogique mis à jour avec succès');
}



//adequation
public function updateAdequation(Request $request)
{
    $adequation = \App\Models\adequation::findOrFail($request->id);

    // Mettre à jour les données de l'experience pedagogique
    $adequation->point = $request->point;
    // Ajoutez les autres champs à mettre à jour ici...

    $adequation->save();

    // Rediriger avec un message de succès vers la même page
    return redirect()->back()->with('success', 'Points d\'adequation mis à jour avec succès');
}
//grade
public function updateGrade(Request $request)
{
    $grade = \App\Models\grade::findOrFail($request->id);

    // Mettre à jour les données de l'experience pedagogique
    $grade->point = $request->point;
    // Ajoutez les autres champs à mettre à jour ici...

    $grade->save();

    // Rediriger avec un message de succès vers la même page
    return redirect()->back()->with('success', 'Points d\'grade mis à jour avec succès');
}
public function updatePublication(Request $request)
{
    $publication = \App\Models\publication::findOrFail($request->id);

    // Mettre à jour les données de l'experience pedagogique
    $publication->point = $request->point;
    // Ajoutez les autres champs à mettre à jour ici...

    $publication->save();

    // Rediriger avec un message de succès vers la même page
    return redirect()->back()->with('success', 'Points d\'publication mis à jour avec succès');
}
public function index1()
{
    $postes = postuler::all();
    return view('drh.inter', compact('postes'));
}

public function show(postuler $postuler)
{
    $candidats = $postuler->postulerusers()->with('user')->get();
    return view('drh.candidature', compact('postuler', 'candidats'));
}

public function indexpats()
{
    $postes = postuler::all();
    return view('president.pats', compact('postes'));
}

// public function showpats(Postuler $postuler)
// {
//     $candidats = $postuler->postulerusers()->with('user')->get();
//     return view('president.dossiercandidat', compact('postuler', 'candidats'));
// }
 // creation du commission de recrutement pour pats
 public function createpats()
 {
     return view('drh.ajoutpresipats')->with('success', 'President commission ajouter avec succès');
 }
 public function storepats(Request $request): RedirectResponse
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
     $commission->password = $request->password;


     // Sauvegarder l'utilisateur
     $commission->save();

      // Connecter l'administrateur
      Auth::login($request->user());
      // Rediriger l'administrateur vers sa propre page
      return redirect()->route('ajoutpresipats');
 }

 //pats
public function showCandidatespats()
{
$postuler=postuler::find(0);


    $posts=Postuler::all();

    // Passer les données à la vue
    return view('president.membrepats', compact('posts'));
}

//pour visualiser les dossiers
public function showDiplomesmembrepats($id)
{
    $postuler_id = request('postuler_id');
    // Récupérer le candidat avec ses diplômes
    // $candidat = User::with('diplomes')->findOrFail($id);
    $diplomes = Postuleruser::where('user_id', $id)
    ->where('postuler_id', $postuler_id)->get();


    // Retourner une vue avec les diplômes du candidat
    return view('president.voirplusmembre', compact('diplomes', 'id'));
}
public function indexmembrepats()
{
    $postes = postuler::all();
    return view('president.interpats', compact('postes'));
}

public function list()
{
     $idpost=request('id');
    $postuler = postuler::all();
     return view('drh.postes', compact('postuler','idpost'));
}
public function destroy()
{
    // Trouver l'utilisateur à supprimer
    $id=request('id');
    $postuler = postuler::findOrFail($id);

    // Supprimer l'utilisateur
    $postuler->delete();

    // Rediriger avec un message de confirmation
    return redirect()->back()->with('success', 'Utilisateur supprimé avec succès');
}
public function destroyprofil()
{
    // Trouver l'utilisateur à supprimer
    $id=request('id');
    $poste = profilrechercher::findOrFail($id);

    // Supprimer l'utilisateur
    $poste->delete();

    // Rediriger avec un message de confirmation
    return redirect()->back()->with('success', 'Utilisateur supprimé avec succès');
}
}
