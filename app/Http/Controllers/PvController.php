<?php

namespace App\Http\Controllers;

use App\Models\pv;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PvController extends Controller
{
    public function create()
    {
        return view('rapporteurs.rapporteur');
    }


    public function store(Request $request):RedirectResponse
    {
    $request->validate([
        'procesverbal' => 'nullable|file|mimes:pdf|max:2048',
    ]);
    $user= Auth::user();
    $pv = new pv();
    if ($request->hasFile('procesverbal')) {
        // Stocker le fichier dans le répertoire 'public/pdfs' et obtenir le chemin
        $fichierPath = $request->file('procesverbal')->store('pdfs', 'public');
        // Enregistrer le chemin du fichier dans la base de données
        $pv->procesverbal = $fichierPath;
    }

    // Sauvegarder l'appel de candidature
    $pv->save();

    // Rediriger l'administrateur vers sa propre page avec un message de succès
    return redirect()->route('rapporteurs.bordrapporteur')->with('success', 'enregistrement validé!');
    }
    public function list()
    {

        $pv  = pv::all();
        return view('rectorats.pv', compact('pv'));
    }

}
