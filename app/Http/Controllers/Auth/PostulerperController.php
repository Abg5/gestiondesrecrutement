<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\adequation;
use App\Models\diplome;
use App\Models\enseignementuadb;
use App\Models\etat;
use App\Models\experiencepedagogique;
use App\Models\experienceprofessionel;
use App\Models\grade;
use App\Models\publication;
use App\Models\Postuleruser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class PostulerperController extends Controller
{
    // ajout du profil
    public function create()
    {
        return view('postulerper1');
    }

    public function store(Request $request): RedirectResponse
{

    $request->validate([
        // enseignement uadb
        'nombreanneeuadb' => 'nullable|integer',
        'attestationuadb'=>'nullable|file|mimes:pdf|max:2048',
        // enseignement pedagogique
        'nombreanneepedagogiques' => 'nullable|integer',
        'attestationpedagogique'=>'nullable|file|mimes:pdf|max:2048',
        // enseignement professionnel
        'nombreanneeprofessionnel' => 'nullable|integer',
        'attestationprofessionnel'=>'nullable|file|mimes:pdf|max:2048',
         // grade
         'typegrade' =>'nullable|string|in:professeurtitulaire,Maitredeconference,MaitreAssistant,Assistant,Debutant',
         'attestationgrade'=>'nullable|file|mimes:pdf|max:2048',
          // adequation
         'degreadequation' => 'nullable|string|in:enseignement,recherche','lesdeux',
         'actederecherche' => 'nullable|file|mimes:pdf|max:2048',
         // publication
        'typepublication'=>'nullable|string|in:abstract,comitedelecture,conferenceinternational,conferencenational',
        'nombrearticleabstract'=>'nullable|integer',
        'actedepublication'=>'nullable|file|mimes:pdf|max:2048',
        // diplome
         'nomdiplome' => 'nullable|string|in:Doctoratdetat,Doctoratunique,phd,doctoratcycle3,masterII',
         'fichediplome'=>'nullable|file|mimes:pdf|max:2048',
         // état
         'pre_selected' => 'request|boolean',



    ]);
    //  dd($request);
   $user= Auth::user();




//    $post = new Post();
//    $post->intituler = $postuler->intituler;
//    $post->iduser = $user->id;
//    $post->save();
 // enseignement uadb
    $enseignementuadb=new enseignementuadb();
    $enseignementuadb->nombreanneeuadb =$request->nombreanneeuadb;
    $enseignementuadb->iduser=$user->id;

    if ($request->hasFile('attestationuadb')) {
        // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
        $fichierPath = $request->file('attestationuadb')->store('pdfs', 'public');
        // Enregistrer le chemin du fichier dans la base de données
        $enseignementuadb->attestationuadb = $fichierPath;
    }
// Calcul des points
if ($request->nombreanneeuadb && $request->hasFile('attestationuadb')) {
    // 1 point par an, maximum 5 points
    $enseignementuadb->point = min($request->nombreanneeuadb, 5);
} else {
    $enseignementuadb->point = 0;
}
//sauvegarde
    $enseignementuadb->save();

    // enseignement pedagogique
    $experiencepedagogique = new experiencepedagogique();
    $experiencepedagogique->nombreanneepedagogiques= $request->nombreanneepedagogiques;
    $experiencepedagogique->iduser=$user->id;

    if ($request->hasFile('attestationpedagogique')) {
        // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
        $fichierPath = $request->file('attestationpedagogique')->store('pdfs', 'public');
        // Enregistrer le chemin du fichier dans la base de données
        $enseignementuadb->attestationpedagogique = $fichierPath;
    }

 // Calcul des points
 if ($request->nombreanneepedagogiques && $request->hasFile('attestationpedagogique')) {
    // 10 points par an, maximum 30 points
    $experiencepedagogique->point = min($request->nombreanneepedagogiques * 10, 30);
} else {
    $experiencepedagogique->point = 0;
}
//sauvegarde

    $experiencepedagogique->save();

     // experiences professionnel
     $experienceprofessionel=new experienceprofessionel();
     $experienceprofessionel->nombreanneeprofessionnel= $request->nombreanneeprofessionnel;
     $experienceprofessionel->iduser=$user->id;
     if ($request->hasFile('attestationprofessionnel')) {
         // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
         $fichierPath = $request->file('attestationprofessionnel')->store('pdfs', 'public');
         // Enregistrer le chemin du fichier dans la base de données
         $experienceprofessionel->attestationprofessionnel = $fichierPath;
     }

     // Calcul des points
 if ($request->nombreanneeprofessionnel && $request->hasFile('attestationprofessionnel')) {
    // 10 points par an, maximum 30 points
    $experienceprofessionel->point = min($request->nombreanneeprofessionnel * 5, 20);
} else {
    $experienceprofessionel->point = 0;
}

// sauvegarde

           $experienceprofessionel->save();
           // grade
     $grade=new grade();
     $grade->typegrade= $request->typegrade;
     $grade->iduser=$user->id;

     if ($request->hasFile('attestationgrade')) {
         // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
         $fichierPath = $request->file('attestationgrade')->store('pdfs', 'public');
         // Enregistrer le chemin du fichier dans la base de données
         $grade->attestationgrade = $fichierPath;
     }
// Calcul des points
$pointsMap = [
    'professeurtitulaire' => 25,
    'Maitredeconference' => 20,
    'MaitreAssistant' => 15,
    'Assistant' => 10,
    'Debutant' => 5,
];

if ($request->typegrade && $request->hasFile('attestationgrade')) {
    $grade->point = $pointsMap[$request->typegrade] ?? 0;
} else {
    $grade->point = 0;
}
//sauvegarde
     $grade->save();

         // adequation
     $adequation=new adequation();
     $adequation->degreadequation= $request->degreadequation;
     $adequation->iduser=$user->id;


      if ($request->hasFile('actederecherche')) {
          // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
          $fichierPath = $request->file('actederecherche')->store('pdfs', 'public');
          // Enregistrer le chemin du fichier dans la base de données
          $adequation->actederecherche = $fichierPath;
      }
// Calcul des points
$pointMap = [
    'enseignement' => 15,
    'recherche' => 15,
    'lesdeux' => 30,
];

if ($request->degreadequation && $request->hasFile('actederecherche')) {
    $adequation->point = $pointMap[$request->degreadequation] ?? 0;
}
 else
  {
    $adequation->point = 0;
  }
//sauvegarde
      $adequation->save();


         // publication
     $publication=new publication();
     $publication->typepublication= $request->typepublication;
     $publication->nombrearticleabstract= $request->nombrearticleabstract;
     $publication->iduser=$user->id;


      if ($request->hasFile('actedepublication')) {
          // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
          $fichierPath = $request->file('actedepublication')->store('pdfs', 'public');
          // Enregistrer le chemin du fichier dans la base de données
          $publication->actedepublication = $fichierPath;
      }

     // Calcul des points
     $pointsMap = [
        'abstract' => ['points_per_article' => 10, 'max_points' => 60],
        'comitedelecture' => ['points_per_article' => 5, 'max_points' => 20],
        'conferenceinternational' => ['points_per_article' => 1, 'max_points' => 10],
        'conferencenational' => ['points_per_article' => 0.5, 'max_points' => 5],
    ];

    if ($request->typepublication && $request->hasFile('actedepublication')) {
        $config = $pointsMap[$request->typepublication] ?? ['points_per_article' => 0, 'max_points' => 0];
        $totalPoints = $request->nombrearticleabstract * $config['points_per_article'];
        $publication->point = min($totalPoints, $config['max_points']);
    } else {
        $publication->point = 0;
    }
//  dd($publication);
    $publication->save();



    // //  diplome
     $diplome=new diplome();
     $diplome->nomdiplome= $request->nomdiplome;
     $diplome->iduser=$user->id;

     if ($request->hasFile('fichediplome')) {
    //     // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
         $fichierPath = $request->file('fichediplome')->store('pdfs', 'public');
    //     // Enregistrer le chemin du fichier dans la base de données
         $diplome->fichediplome = $fichierPath;
     }
     // Calcul des points
     $pointsMap = [
        'Doctoratdetat' => 60,
        'Doctoratunique' => 50,
        'phd' => 40,
        'doctoratcycle3' => 30,
        'masterII' => 20,
    ];

    if ($request->nomdiplome && $request->hasFile('fichediplome')) {
        $diplome->point = $pointsMap[$request->nomdiplome] ?? 0;
    } else {
        $diplome->point = 0;
    }

    $diplome->save();
 // état
 $etat = new etat();
 $etat->pre_selected = $request->filled('pre_selected') ? $request->pre_selected : 0;
 //  $etat->iduser = $user->id;
 $etat->save();

    $enseignementuadb = enseignementuadb::latest()->first();
    $experiencepedagogique = experiencepedagogique::latest()->first();
    $experienceprofessionel = experienceprofessionel::latest()->first();
    $grade = grade::latest()->first();
    $adequation = adequation::latest()->first();
    $publication = publication::latest()->first();
    $diplome = diplome::latest()->first();
    // Récupérer l'id du postuler après l'avoir sauvegardé

   $postuleruser = new Postuleruser();
   $postuleruser->user_id=$user->id;
   $postuleruser->postuler_id=$request->postuler_id;
   $postuleruser->enseignement_id=$enseignementuadb->id;
   $postuleruser->experiencepedagogique_id=$experiencepedagogique->id;
   $postuleruser->experienceprofessionnel_id=$experienceprofessionel->id;
   $postuleruser->grade_id=$grade->id;
   $postuleruser->adequation_id=$adequation->id;
   $postuleruser->publication_id=$publication->id;
   $postuleruser->diplome_id=$diplome->id;
   $postuleruser->etat_id = $etat->id;
//   dd($postuleruser);
$postuleruser->save();
    // $postuler=new Postuler();
    // $postuler->iduser=$user->id;
    // $postuler->save();


    // Rediriger le candidat sur son page
    return back()->with('success', 'Enregistrement validé!');
}



    // public function list()
    // {
    //     $avis = Avis::where('postes', 'per')->get();
    //      return view('postper', compact('avis'));
    // }
    // public function list1()
    // {
    //     $avis = Avis::where('postes', 'pats')->get();
    //      return view('postpats', compact('avis'));
    // }

    // public function list2()
    // {
    //     $avis = Avis::all();
    //      return view('candidat', compact('avis'));
    // }
    // public function list3()
    // {
    //     $avis = Avis::where('postes', 'per')->get();
    //      return view('postulerper', compact('avis'));
    // }
    public function editPoints(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'enseignement_points' => 'nullable|integer|min:0|max:5',
            'pedagogique_points' => 'nullable|integer|min:0|max:30',
            'professionnel_points' => 'nullable|integer|min:0|max:20',
            'grade_points' => 'nullable|integer|min:0|max:25',
            'adequation_points' => 'nullable|integer|min:0|max:30',
            'publication_points' => 'nullable|integer|min:0|max:60',
            'diplome_points' => 'nullable|integer|min:0|max:60',
        ]);

        $postuleruser = Postuleruser::findOrFail($id);

        $postuleruser->enseignement->point = $request->enseignement_points ?? $postuleruser->enseignement->point;
        $postuleruser->experiencepedagogique->point = $request->pedagogique_points ?? $postuleruser->experiencepedagogique->point;
        $postuleruser->experienceprofessionnel->point = $request->professionnel_points ?? $postuleruser->experienceprofessionnel->point;
        $postuleruser->grade->point = $request->grade_points ?? $postuleruser->grade->point;
        $postuleruser->adequation->point = $request->adequation_points ?? $postuleruser->adequation->point;
        $postuleruser->publication->point = $request->publication_points ?? $postuleruser->publication->point;
        $postuleruser->diplome->point = $request->diplome_points ?? $postuleruser->diplome->point;

        $postuleruser->enseignement->save();
        $postuleruser->experiencepedagogique->save();
        $postuleruser->experienceprofessionnel->save();
        $postuleruser->grade->save();
        $postuleruser->adequation->save();
        $postuleruser->publication->save();
        $postuleruser->diplome->save();

        return redirect()->route('postulerper')->with('success', 'Points modifiés avec succès !');
    }


}
