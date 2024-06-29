<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Rectorat;
use App\Models\appelcandidature;
use App\Models\avis;
use App\Models\diplome;
use App\Models\postuler;
use App\Models\Postuleruser;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RectoratController extends Controller
{
    // ajout du profil
    public function create()
    {
        return view('rectorats.avis');
    }


    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'fichier' => 'nullable|file|mimes:pdf|max:2048',
    ]);
    $user= Auth::user();
    $avis = new Avis();
    if ($request->hasFile('fichier')) {
        // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
        $fichierPath = $request->file('fichier')->store('pdfs', 'public');
        // Enregistrer le chemin du fichier dans la base de données
        $avis->fichier = $fichierPath;
    }

    // Sauvegarder l'appel de candidature
    $avis->save();

    // Rediriger l'administrateur vers sa propre page avec un message de succès
    return redirect()->route('avis')->with('success', 'enregistrement validé!');
}
    public function list()
    {

        $avis  = avis::all();
        return view('rectorats.appel', compact('avis'));
    }
    public function list1()
    {

        $avis  = avis::all();
        return view('drh.fiche', compact('avis'));
    }

    public function index()
    {
        $postes = postuler::all();
        return view('rectorats.intermediare', compact('postes'));
    }

    public function show(Postuler $postuler)
    {
        $candidats = $postuler->postulerusers()->with('user')->get();
        return view('rectorats.dossiercandidat', compact('postuler', 'candidats'));
    }




}
