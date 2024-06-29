<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Postper;
use App\Models\appelcandidature;
use App\Models\postuler;
use App\Models\Avis;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class PostesperController extends Controller
{
    // ajout du profil
    public function create()
    {
        return view('postper');
    }
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'intituler' => 'required|string|max:255',
    //         'departements' => 'required|string|in:physique,chimie,mathematique,tic,ij,management,sante,dd',
    //         'datelimite' => 'required|date',
    //         'heurelimite' => 'required|date_format:H:i',
    //         'contrat' => 'required|string|in:cdd,cdi',
    //         'fichier' => 'nullable|file|mimes:pdf|max:2048',
    //     ]);

    //     // dd($request);

    //     if ($request->hasFile('fichier')) {
    //         $fichier = $request->file('fichier')->store('pdfs', 'public');
    //     }



    //     // Récupérer le chemin de stockage des images depuis la configuration
    //     $chemin = config('app.fichier_storage_path', 'assets/fichiers/uploaded');

    //     // Récupérer le fichier photo depuis la requête
    //     $fichier = $request->file('fichier');

    //     // Générer un nom de fichier unique
    //     $nomFichier = hash('sha1', time()) . '.' . $fichier->getClientOriginalExtension();

    //     // Déplacer le fichier fichier vers le répertoire de stockage
    //     $fichier->move($chemin, $nomFichier);


    //        $avis = new avis();
    //        $avis->intituler = $request->intituler;
    //        $avis->departements = $request->departements;
    //        $avis->datelimite = $request->datelimite;
    //        $avis->heurelimite = $request->heurelimite;
    //        $avis->contrat = $request->contrat;
    //        $avis->fichier = $chemin . '/' . $nomFichier;

    //     // // Sauvegarder l'appel de candidature
    //      $avis->save();


    //     //  // Connecter l'administrateur
    //      // Auth::login($request->profilrechercher());
    //     // Rediriger l'administrateur vers sa propre page
    //       return redirect()->route('avis')->with('success', 'enrigistrement validee!');;
    // }

    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'intituler' => 'required|string|max:255',
        'departements' => 'required|string|in:physique,chimie,mathematique,tic,ij,management,sante,dd',
        'datelimite' => 'required|date',
        'heurelimite' => 'required|date_format:H:i',
        'contrat' => 'required|string|in:cdd,cdi',
        'postes' => 'required|string|in:per,pats',
        'fichier' => 'nullable|file|mimes:pdf|max:2048',
    ]);

    $postuler = new postuler();
    $postuler->intituler = $request->intituler;
    $postuler->departements = $request->departements;
    $postuler->datelimite = $request->datelimite;
    $postuler->heurelimite = $request->heurelimite;
    $postuler->contrat = $request->contrat;
    $postuler->postes = $request->postes;


    if ($request->hasFile('fichier')) {
        // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
        $fichierPath = $request->file('fichier')->store('pdfs', 'public');
        // Enregistrer le chemin du fichier dans la base de données
        $postuler->fichier = $fichierPath;
    }

    // Sauvegarder l'appel de candidature
    $postuler->save();

    // Rediriger l'administrateur vers sa propre page avec un message de succès
    return redirect()->route('postper')->with('success', 'Enregistrement validé!');
}



    public function list()
    {
        $postuler = postuler::where('postes', 'per')->get();
         return view('postper', compact('postuler'));
    }

    public function postulerPATS()
    {
        $avis = Avis::all();
         return view('postulerpats', compact('avis'));
    }

    public function list1()
    {
        $postuler = postuler::where('postes', 'pats')->get();
         return view('postpats', compact('postuler'));
    }

    public function list2()
    {
        $postuler = postuler::all();
         return view('candidat', compact('postuler'));
    }

    public function index()
{
    $currentDateTime = Carbon::now();
    $postuler = Postuler::where(function($query) use ($currentDateTime) {
        $query->where('datelimite', '>', $currentDateTime->toDateString())
              ->orWhere(function($query) use ($currentDateTime) {
                  $query->where('datelimite', '=', $currentDateTime->toDateString())
                        ->where('heurelimite', '>', $currentDateTime->toTimeString());
              });
    })->get();

    return view('candidat', compact('postuler'));
}


    public function list3()
    {

        $idpost=request('id');
        $postuler = postuler::where('postes', 'per')->get();
         return view('postulerper', compact('postuler','idpost'));
    }

    public function list4()
    {
         $idpost=request('id');
        $postuler = postuler::where('postes', 'pats')->get();
         return view('postulerpats', compact('postuler','idpost'));
    }

}
