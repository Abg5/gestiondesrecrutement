<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\VicerecteurController;
use App\Http\Controllers\Auth\DepartementController;
use App\Http\Controllers\Auth\ProfilrechercherController;
use App\Http\Controllers\Auth\AppelcandidatController;
use App\Http\Controllers\Auth\RectoratController;
use App\Http\Controllers\Auth\DesignationController;
use App\Http\Controllers\Auth\PostesperController;
use App\Http\Controllers\Auth\PostulerController;
use App\Http\Controllers\Auth\PostulerperController;
use App\Http\Controllers\Auth\PostulerpatsController;
use App\Http\Controllers\Auth\PublicationController;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\CandidtureController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DescriptionchimieController;
use App\Http\Controllers\DescriptionddController;
use App\Http\Controllers\DescriptionijController;
use App\Http\Controllers\DescriptionmanagementController;
use App\Http\Controllers\DescriptionmathematiqueController;
use App\Http\Controllers\DescriptionphysiqueController;
use App\Http\Controllers\DescriptionsanteController;
use App\Http\Controllers\DescriptionticController;
use App\Http\Controllers\DirecteurController;
use App\Http\Controllers\MembreticController;
use App\Http\Controllers\PostulersController ;
use App\Http\Controllers\PresidentController;
use App\Http\Controllers\PvController;
use App\Http\Controllers\UserController;
use App\Mail\NewCandidat;
use App\Mail\Teste;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

Route::get('/bordsatic', function () {
    return view('direction.bordsatic');
})->name('bordsatic');

Route::get('/', function () {
    // $user= User::first();
    // Mail::send(new NewCandidat($user,'test passe'));
// dd($user);
    return view('welcome');
})->name('welcome');
Route::get('/presentation', function () {
    return view('presentation');
})->name('presentation');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/bord', function () {
    return view('drh.bord');
})->name('bord');
Route::get('/borddepartement', function () {
    return view('departements.borddepartement');
})->name('borddepartement');
Route::get('/bordrectorat', function () {
    return view('rectorats.bordrectorat');
})->name('bordrectorat');
Route::get('/bordrapporteur', function () {
    return view('rapporteurs.bordrapporteur');
})->name('bordrapporteur');


Route::get('/postper', function () {
    return view('postper');
})->middleware([])->name('postper');
//voir poste personnel
Route::get('/postper', function () {
    return view('postper');
})->middleware([])->name('postper');
//administrateur
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//page departement physique

Route::get('/departementphysique', function () {
    return view('departements.departementphysique');
})->middleware(['auth', 'verified'])->name('departementphysique');

//page departement chimie

Route::get('/departementchimie', function () {
    return view('departements.departementchimie');
})->middleware(['auth', 'verified'])->name('departementchimie');

//page departement mathematique

Route::get('/departementmathematique', function () {
    return view('departements.departementmathematique');
})->middleware(['auth', 'verified'])->name('departementmathematique');


//page departement TIC

Route::get('/departementtic', function () {
    return view('departements.departementtic');
})->middleware(['auth', 'verified'])->name('departementtic');

//page departement IJ

Route::get('/departementij', function () {
    return view('departements.departementij');
})->middleware(['auth', 'verified'])->name('departementij');

//page departement MANAGEMENT

Route::get('/departementMANAGEMENT', function () {
    return view('departements.departementMANAGEMENT');
})->middleware(['auth', 'verified'])->name('departementMANAGEMENT');

//page departement SANTE

Route::get('/departementSANTE', function () {
    return view('departements.departementSANTE');
})->middleware(['auth', 'verified'])->name('departementSANTE');

//page departement DD

Route::get('/departementDD', function () {
    return view('departements.departementDD');
})->middleware(['auth', 'verified'])->name('departementDD');


// Route::get('/bord', function () {
//     return view('drh.bord');
// })->middleware([''])->name('bord');




// voir la description envoyer ar les departements
Route::get('/drh', function () {
    return view('drh.drh');
})->middleware([])->name('drh');




//candidat
Route::middleware('guest')->group(function () {
Route::get('/candidat', function () {
    return view('candidat');
})->middleware(['auth', 'verified'])->name('candidat');
});
//recteur
Route::get('/rectorat', function () {
    return view('rectorats.rectorat');
})->middleware(['auth', 'verified'])->name('rectorat');

//vice recteur
Route::get('/vicerecteur', function () {
    return view('vicerecteur');
})->middleware(['auth', 'verified'])->name('vicerecteur');

//drh
// Route::get('/drh', function () {
//     return view('drh');
// })->middleware(['auth', 'verified'])->name('drh');

//president commission
Route::get('/prcomission', function () {
    return view('president.prcomission');
})->middleware(['auth', 'verified'])->name('prcomission');

//direction ufr
Route::get('/directionufr', function () {
    return view('direction.directionufr');
})->middleware(['auth', 'verified'])->name('directionufr');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('connexion', function () {
    return view('connexion');
})->name('connexion');
// ma base
Route::get('base', function () {
    return view('base');
})->name('base');

Route::get('register', function () {
    return view('register');
})->name('register');

//postuler
Route::get('/postulerper', function () {
    return view('postulerper');
})->middleware([])->name('postulerper');




//appel a candidature
// Route::get('appelcandidat', function () {
//     return view('drh.appelcandidat');
// })->name('appelcandidat');
//dossiers des candidats
// Route::get('dossiercandidat', function () {
//     return view('dossiercandidat');
// })->name('dossiercandidat');

Route::get('intermediare', function () {
    return view('rectorats.intermediare');
})->name('intermediare');
Route::get('inter', function () {
    return view('drh.inter');
})->name('inter');

//profil rechercher
Route::get('profil', function () {
    return view('profil');
})->name('profil');

//directeurs ufr
Route::get('/bordsatic', [DirecteurController::class, 'indexsatic'])->name('bordsatic');
Route::get('/satic', [DirecteurController::class, 'showPreSelectedCandidates'])->name('satic');

Route::get('/bordecomij', [DirecteurController::class, 'indexecomij'])->name('bordecomij');
Route::get('/ecomij', [DirecteurController::class, 'showPreSelectedCandidatesecomij'])->name('ecomij');

Route::get('/bordsdd', [DirecteurController::class, 'indexsdd'])->name('bordsdd');
Route::get('/sdd', [DirecteurController::class, 'showPreSelectedCandidatessdd'])->name('sdd');

Route::get('/modifier', [DepartementController::class, 'edit'])->name('modifier');
Route::post('/update', [DepartementController::class, 'update'])->name('update');
Route::get('/supprimer', [DepartementController::class, 'destroy'])->name('supprimer');

//ajouter une description
// Route::get('/appel', [RectoratController::class, 'list'])->name('appel');

Route::get('/appel', [AppelcandidatController::class, 'list'])->name('appel');


Route::get('/ajoutdescription', [ProfilrechercherController::class, 'create'])->name('ajoutdescription');
Route::post('/ajoutdescription', [ProfilrechercherController::class, 'store'])->name('ajoutdescription');
// description physique
Route::get('/ajoutdescriptionphysique', [DescriptionphysiqueController::class, 'create'])->name('ajoutdescriptionphysique');
Route::post('/ajoutdescriptionphysique', [DescriptionphysiqueController::class, 'store'])->name('ajoutdescriptionphysique');
// description chimie
Route::get('/ajoutdescriptionchimie', [DescriptionchimieController::class, 'create'])->name('ajoutdescriptionchimie');
Route::post('/ajoutdescriptionchimie', [DescriptionchimieController::class, 'store'])->name('ajoutdescriptionchimie');
// description mathematique
Route::get('/ajoutdescriptionmathematique', [DescriptionmathematiqueController::class, 'create'])->name('ajoutdescriptionmathematique');
Route::post('/ajoutdescriptionmathematique', [DescriptionmathematiqueController::class, 'store'])->name('ajoutdescriptionmathematique');
// description tic
Route::get('/ajoutdescriptiontic', [DescriptionticController::class, 'create'])->name('ajoutdescriptiontic');
Route::post('/ajoutdescriptiontic', [DescriptionticController::class, 'store'])->name('ajoutdescriptiontic');
// description ij
Route::get('/ajoutdescriptionij', [DescriptionijController::class, 'create'])->name('ajoutdescriptionij');
Route::post('/ajoutdescriptionij', [DescriptionijController::class, 'store'])->name('ajoutdescriptionij');
// description management
Route::get('/ajoutdescriptionmanagement', [DescriptionmanagementController::class, 'create'])->name('ajoutdescriptionmanagement');
Route::post('/ajoutdescriptionmanagement', [DescriptionmanagementController::class, 'store'])->name('ajoutdescriptionmanagement');
// description dd
Route::get('/ajoutdescriptiondd', [DescriptionddController::class, 'create'])->name('ajoutdescriptiondd');
Route::post('/ajoutdescriptiondd', [DescriptionddController::class, 'store'])->name('ajoutdescriptiondd');
// description sante
Route::get('/ajoutdescriptionsante', [DescriptionsanteController::class, 'create'])->name('ajoutdescriptionsante');
Route::post('/ajoutdescriptionsante', [DescriptionsanteController::class, 'store'])->name('ajoutdescriptionsante');
//afficher la description
Route::get('/descriptionprofil', [ProfilrechercherController::class, 'list'])->name('descriptionprofil');
// Route::get('/descriptionprofil', [ProfilrechercherController::class, 'list'])->name('descriptionprofil');
Route::get('/poste', [DepartementController::class, 'listpste'])->name('poste');


Route::get('/appelcandidat', [AppelcandidatController::class, 'create'])->name('appelcandidat');
Route::post('/appelcandidat', [AppelcandidatController::class, 'store'])->name('appelcandidat');
// afflicher l'appel


Route::get('/avis', [RectoratController::class, 'create'])->name('avis');
Route::post('/avis', [RectoratController::class, 'store'])->name('avis');

//Raporteur
Route::get('/rapporteur', [PvController::class, 'create'])->name('rapporteur');
Route::post('/rapporteur', [PvController::class, 'store'])->name('rapporteur');


Route::get('/postuler/pats', [PostesperController::class, 'postulerPATS'])->name('postulerpats3');

//postuler pour les candidats per's
Route::get('/postper', [PostesperController::class, 'list'])->name('postper');
Route::get('/postulerper', [PostesperController::class, 'list3'])->name('postulerper');
Route::get('/postulerper1', [PostulerperController::class, 'create'])->name('postulerper1');
Route::post('/postulerper2', [PostulerperController::class, 'store'])->name('postulerper2');
//postuler pour les candidats pats
Route::get('/postpats', [PostesperController::class, 'list1'])->name('postpats');
Route::get('/postulerpats', [PostesperController::class, 'list4'])->name('postulerpats');
Route::get('/postulerpats1', [PostulerpatsController::class, 'create'])->name('postulerpats1');
Route::post('/postulerpats2', [PostulerpatsController::class, 'store'])->name('postulerpats2');
//drh affichage des postes
Route::get('/postes', [CandidtureController::class, 'list'])->name('postes');
Route::get('/destroy', [CandidtureController::class, 'destroy'])->name('destroy');
Route::get('/destroyprofil', [CandidtureController::class, 'destroyprofil'])->name('destroyprofil');


//affichage pour les candidats pats
//affichage pour les candidats pats
Route::get('/candidat', [PostesperController::class, 'list2'])->name('candidat');
Route::get('/candidat', [PostesperController::class, 'index'])->name('candidat');
   //publication
   Route::get('/publication', [PublicationController::class, 'create'])->name('publication');
   Route::post('/publication', [PublicationController::class, 'store'])->name('publication');
   Route::get('/fiche', [RectoratController::class, 'list1'])->name('fiche');

//affichage du pv
Route::get('/pv', [PvController::class, 'list'])->name('pv');
   //Activer et desactiver
 Route::get('/activer-utilisateur/{id}', [UserController::class, 'activer'])->name('activer');
Route::get('/desactiver-utilisateur/{id}', [UserController::class, 'desactiver'])->name('desactiver');

// Liste des utilisateurs
Route::get('/liste-comptes', [DepartementController::class, 'list'])->name('liste_comptes');

//ajout du departement
Route::get('/ajoutdepartement', [DepartementController::class, 'create'])->name('ajoutdepartement');
Route::post('/ajoutdepartement', [DepartementController::class, 'store'])->name('ajoutdepartement');
//ajout des membre de commission du departement tic
Route::get('/designationtic', [DesignationController::class, 'create'])->name('designationtic');
Route::post('/designationtic', [DesignationController::class, 'store'])->name('designationtic');
//ajout des membre de commission du departement mathematique
Route::get('/designationmathematique', [DesignationController::class, 'createmathematique'])->name('designationticmathematique');
Route::post('/designationmathematique', [DesignationController::class, 'storemathematique'])->name('designationmathematique');
//ajout des membre de commission du departement physique
Route::get('/designationphysique', [DesignationController::class, 'createphysique'])->name('designationphysique');
Route::post('/designationphysique', [DesignationController::class, 'storephysique'])->name('designationphysique');
//ajout des membre de commission du departement chimie
Route::get('/designationchimie', [DesignationController::class, 'createchimie'])->name('designationchimie');
Route::post('/designationchimie', [DesignationController::class, 'storechimie'])->name('designationchimie');
//ajout des membre de commission du departement ij
Route::get('/designationij', [DesignationController::class, 'createij'])->name('designationij');
Route::post('/designationij', [DesignationController::class, 'storeij'])->name('designationij');
//ajout des membre de commission du departement management
Route::get('/designationmanagement', [DesignationController::class, 'createmanagement'])->name('designationmanagement');
Route::post('/designationmanagement', [DesignationController::class, 'storemanagement'])->name('designationmanagement');
//ajout des membre de commission du departement sante
Route::get('/designationsante', [DesignationController::class, 'createsante'])->name('designationsante');
Route::post('/designationsante', [DesignationController::class, 'storesante'])->name('designationsante');
//ajout des membre de commission du departement dd
Route::get('/designationdd', [DesignationController::class, 'createdd'])->name('designationdd');
Route::post('/designationdd', [DesignationController::class, 'storedd'])->name('designationdd');

Route::get('/membre', [DesignationController::class, 'list'])->name('membre');



// Afficher le formulaire de création d'utilisateur
// Route::get('/users/create', [comissionrecrutementController::class, 'create'])->name('users.create');

// // Enregistrer un nouvel utilisateur
// Route::post('/users', [UserController::class, 'store'])->name('users.store');

// // Afficher le formulaire de modification d'utilisateur
// Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// // Mettre à jour les informations de l'utilisateur
// Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// // Supprimer un utilisateur
// Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
//ajout du commission de recutement
//ajout du departement
Route::get('/ajoutpresipats', [CandidtureController::class, 'createpats'])->name('ajoutpresipats');
Route::post('/ajoutpresipats', [CandidtureController::class, 'storepats'])->name('ajoutpresipats');

Route::get('/candidature/{id}', [CandidtureController::class, 'showCandidates'])->name('candidature');
Route::get('/candidature', [CandidtureController::class, 'index'])->name('candidature');
Route::get('/dossiercandidat1/{id}', [CandidtureController::class, 'showCandidates1'])->name('dossiercandidat1');
Route::get('/dossiercandidat', [CandidtureController::class, 'showCandidates2'])->name('dossiercandidat');
//president
// Route::get('/dossiercandidat', [CandidtureController::class, 'index2'])->name('dossiercandidat');
//president

//affichage et modifacation des points pour le president commission
Route::get('/voirpluspresident/{id}', [CandidtureController::class, 'showDiplomes1'])->name('voirpluspresident');
// Route::get('/modifier', [CandidtureController::class, 'edit'])->name('modifier');
Route::post('/update', [CandidtureController::class, 'update'])->name('update');
Route::post('/update-enseignement', [CandidtureController::class, 'updateEnseignement'])->name('updateEnseignement');
Route::post('/update-Experienceprofessionel', [CandidtureController::class, 'updateExperienceprofessionel'])->name('updateExperienceprofessionel');
Route::post('/update-Experiencepedagogique', [CandidtureController::class, 'updateExperiencepedagogique'])->name('updateExperiencepedagogique');

Route::post('/update-Adequation', [CandidtureController::class, 'updateAdequation'])->name('updateAdequation');
Route::post('/update-Grade', [CandidtureController::class, 'updateGrade'])->name('updateGrade');
Route::post('/update-Publication', [CandidtureController::class, 'updatePublication'])->name('updatePublication');

//le recteur pour visualiser les dossiers
Route::get('/voirplusrecteur/{id}', [CandidtureController::class, 'showDiplomes2'])->name('voirplusrecteur');
Route::get('/voirpluspatsrecteur/{id}', [CandidtureController::class, 'showDiplomesrecteurpats'])->name('voirpluspatsrecteur');

//pour les membres du departement tic
Route::get('/membre', [MembreticController::class, 'showCandidates'])->name('membre');
Route::get('/voirplustic/{id}', [MembreticController::class, 'showDiplomes'])->name('voirplustic');
//pour les departements physique
Route::get('/membrephysique', [MembreticController::class, 'showCandidatesphysique'])->name('membrephysique');
Route::get('/voirplusphysique/{id}', [MembreticController::class, 'showDiplomesphysique'])->name('voirplusphysique');
Route::get('/intermembrephysique', [MembreticController::class, 'indexphysique'])->name('intermembrephysique')->middleware('auth');

//pour les departements mathematique
Route::get('/membremathematique', [MembreticController::class, 'showCandidatesmathematique'])->name('membremathematique');
Route::get('/voirplusmathematique/{id}', [MembreticController::class, 'showDiplomesmathematique'])->name('voirplusmathematique');
//pour les departements management
Route::get('/membremanagement', [MembreticController::class, 'showCandidatesmanagement'])->name('membremanagement');
Route::get('/voirplusmanagement/{id}', [MembreticController::class, 'showDiplomesmanagement'])->name('voirplusmanagement');
//pour les departements ij
Route::get('/membreij', [MembreticController::class, 'showCandidatesij'])->name('membreij');
Route::get('/voirplusij/{id}', [MembreticController::class, 'showDiplomesij'])->name('voirplusij');
//pour les departements sante
Route::get('/membresante', [MembreticController::class, 'showCandidatessante'])->name('membresante');
Route::get('/voirplussante/{id}', [MembreticController::class, 'showDiplomessante'])->name('voirplussante');
//pour les departements chimie
Route::get('/membrechimie', [MembreticController::class, 'showCandidateschimie'])->name('membrechimie');
Route::get('/voirpluschimie/{id}', [MembreticController::class, 'showDiplomeschimie'])->name('voirpluschimie');
//pour les departements dd
Route::get('/membredd', [MembreticController::class, 'showCandidatesdd'])->name('membredd');
Route::get('/voirplusdd/{id}', [MembreticController::class, 'showDiplomesdd'])->name('voirplusdd');

//pour les presidents commission
Route::get('/presidenttic', [PresidentController::class, 'showCandidatestic'])->name('presidenttic')->middleware('auth');
Route::get('/voirpluspresidenttic/{id}', [PresidentController::class, 'showDiplomestic'])->name('voirpluspresidenttic')->middleware('auth');
Route::get('/intertic', [PresidentController::class, 'indextic'])->name('intertic')->middleware('auth');
Route::post('/presidenttic/pre-selectionnertic/{id}', [PresidentController::class, 'preSelectionnertic'])->name('preSelectionnertic');
Route::post('/presidenttic/deselectionnertic/{id}', [PresidentController::class, 'deselectionnertic'])->name('deselectionnertic');

Route::get('/presidentmathematique', [PresidentController::class, 'showCandidatesmathematique'])->name('presidentmathematique')->middleware('auth');
Route::get('/voirpluspresidentmathematique/{id}', [PresidentController::class, 'showDiplomesmathematique'])->name('voirpluspresidentmathematique')->middleware('auth');
Route::get('/intermathematique', [PresidentController::class, 'indexmathematique'])->name('intermathematique')->middleware('auth');
Route::post('/presidentmathematique/pre-selectionnermathematique/{id}', [PresidentController::class, 'preSelectionnermathematique'])->name('preSelectionnermathematique');
Route::post('/presidentmathematique/deselectionnermathematique/{id}', [PresidentController::class, 'deselectionnermathematique'])->name('deselectionnermathematique');

Route::get('/presidentphysique', [PresidentController::class, 'showCandidatesphysique'])->name('presidentphysique')->middleware('auth');
Route::get('/voirpluspresidentphysique/{id}', [PresidentController::class, 'showDiplomesphysique'])->name('voirpluspresidentphysique')->middleware('auth');
Route::get('/interphysique', [PresidentController::class, 'indexphysique'])->name('interphysique')->middleware('auth');
Route::post('/presidentphysique/pre-selectionner/{id}', [PresidentController::class, 'preSelectionner'])->name('preSelectionner');
Route::post('/presidentphysique/deselectionner/{id}', [PresidentController::class, 'deselectionner'])->name('deselectionner');


Route::get('/presidentchimie', [PresidentController::class, 'showCandidateschimie'])->name('presidentchimie')->middleware('auth');
Route::get('/voirpluspresidentchimie/{id}', [PresidentController::class, 'showDiplomeschimie'])->name('voirpluspresidentchimie')->middleware('auth');
Route::get('/interchimie', [PresidentController::class, 'indexchimie'])->name('interchimie')->middleware('auth');
Route::post('/presidentchimie/pre-selectionnerchimie/{id}', [PresidentController::class, 'preSelectionnerchimie'])->name('preSelectionnerchimie');
Route::post('/presidentchimie/deselectionnerchimie/{id}', [PresidentController::class, 'deselectionnerchimie'])->name('deselectionnerchimie');

Route::get('/presidentij', [PresidentController::class, 'showCandidatesij'])->name('presidentij')->middleware('auth');
Route::get('/voirpluspresidentij/{id}', [PresidentController::class, 'showDiplomesij'])->name('voirpluspresidentij')->middleware('auth');
Route::get('/interij', [PresidentController::class, 'indexij'])->name('interij')->middleware('auth');
Route::post('/presidentij/pre-selectionnerij/{id}', [PresidentController::class, 'preSelectionnerij'])->name('preSelectionnerij');
Route::post('/presidentij/deselectionnerij/{id}', [PresidentController::class, 'deselectionnerij'])->name('deselectionnerij');

Route::get('/presidentmanagement', [PresidentController::class, 'showCandidatesmanagement'])->name('presidentmanagement')->middleware('auth');
Route::get('/voirpluspresidentmanagement/{id}', [PresidentController::class, 'showDiplomesmanagement'])->name('voirpluspresidentmanagement')->middleware('auth');
Route::get('/intermanagement', [PresidentController::class, 'indexmanagement'])->name('intermanagement')->middleware('auth');
Route::post('/presidentmanagement/pre-selectionnermanagement/{id}', [PresidentController::class, 'preSelectionnermanagement'])->name('preSelectionnermanagement');
Route::post('/presidentmanagement/deselectionnermanagement/{id}', [PresidentController::class, 'deselectionnermanagement'])->name('deselectionnermanagement');

Route::get('/presidentsante', [PresidentController::class, 'showCandidatessante'])->name('presidentsante')->middleware('auth');
Route::get('/voirpluspresidentsante/{id}', [PresidentController::class, 'showDiplomessante'])->name('voirpluspresidentsante')->middleware('auth');
Route::get('/intersante', [PresidentController::class, 'indexsante'])->name('intersante')->middleware('auth');
Route::post('/presidentsante/pre-selectionnersante/{id}', [PresidentController::class, 'preSelectionnersante'])->name('preSelectionnersante');
Route::post('/presidentsante/deselectionnersante/{id}', [PresidentController::class, 'deselectionnersante'])->name('deselectionnersante');

Route::get('/presidentdd', [PresidentController::class, 'showCandidatesdd'])->name('presidentdd')->middleware('auth');
Route::get('/voirpluspresidentdd/{id}', [PresidentController::class, 'showDiplomesdd'])->name('voirpluspresidentdd')->middleware('auth');
Route::get('/interdd', [PresidentController::class, 'indexdd'])->name('interdd')->middleware('auth');
Route::post('/presidentdd/pre-selectionnerdd/{id}', [PresidentController::class, 'preSelectionnerdd'])->name('preSelectionnerdd');
Route::post('/presidentdd/deselectionnerdd/{id}', [PresidentController::class, 'deselectionnerdd'])->name('deselectionnerdd');

Route::get('/candidats', [CandidtureController::class, 'search'])->name('candidats');

Route::get('/voirplus/{id}', [CandidtureController::class, 'showDiplomes'])->name('voirplus');
Route::get('/voirpluspats/{id}', [CandidtureController::class, 'showDiplomespats'])->name('voirpluspats');

// Route pour transmettre le dossier
Route::get('/dossiersdescandidats/{postuler_id}/{id}', [CandidtureController::class, 'transmettreDossier'])->name('dossiersdescandidats');


Route::get('/intermediare', [RectoratController::class, 'index'])->name('intermediare');
Route::get('/postes/{postuler}', [RectoratController::class, 'show'])->name('postes.show');


Route::get('/inter', [CandidtureController::class, 'index1'])->name('inter');
Route::get('/poste/{postuler}', [CandidtureController::class, 'show'])->name('candidature');

Route::get('/pats', [CandidtureController::class, 'indexpats'])->name('pats');
// Route::get('/poste/{postuler}', [CandidtureController::class, 'showpats'])->name('dossiercandidat');

//membrepats
//pour les departements physique
Route::get('/membrepats', [CandidtureController::class, 'showCandidatespats'])->name('membrepats');
Route::get('/voirplusmembre/{id}', [CandidtureController::class, 'showDiplomesmembrepats'])->name('voirplusmembre');
Route::get('/interpats', [CandidtureController::class, 'indexmembrepats'])->name('interpats')->middleware('auth');


Route::get('/testMail',function(){
    $details='gghgghghhhh';
    Mail::send(new Teste($details));
    return view('testeMail');
});

//la pre-selection
Route::put('/updatePreselection/{id}', [PresidentController::class, 'updatePreselection'])->name('updatePreselection');

// });





require __DIR__.'/auth.php';
