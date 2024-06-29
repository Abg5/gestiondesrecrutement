<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $credentials = $request->validated();

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

             //Récupérer l'utilisateur authentifié
             $user = Auth::user();

             // Vérifier l'état du compte
        if ($user->etat === 'inactif') {
            Auth::logout();
            return redirect()->route('login')->withErrors(['email' => 'Compte désactivé']);
        }

        $request->session()->regenerate();


              //Vérifier le contenu de "profil"
              if($user->profil === 'chefdepartement'){
                if($user->departement === 'PHYSIQUE'){

                    return redirect()->intended(route('departementphysique', absolute:false));
                }
                elseif($user->departement === 'CHIMIE'){
                    return redirect()->intended(route('departementchimie', absolute:false));
                }
                elseif($user->departement === 'MATHEMATIQUE'){
                    return redirect()->intended(route('departementmathematique', absolute:false));
                }
                elseif($user->departement === 'TIC'){
                    return redirect()->intended(route('departementtic', absolute:false));
                }
                elseif($user->departement ==='IJ'){
                    return redirect()->intended(route('departementtij', absolute:false));
                }
                elseif($user->departement ==='MANAGEMENT'){
                    return redirect()->intended(route('departementMANAGEMENT', absolute:false));
                }
                elseif($user->departement ==='SANTE'){
                    return redirect()->intended(route('departementSANTE', absolute:false));
                }
                elseif($user->departement ==='DD'){
                    return redirect()->intended(route('departementDD', absolute:false));
                }
            }
            //   redirection des directeurs
            if($user->profil === 'directionufr'){
                if($user->ufr === 'SATIC'){

                    return redirect()->intended(route('bordsatic', absolute:false));
                }
                elseif($user->ufr === 'ECOMIJ'){
                    return redirect()->intended(route('bordecomij', absolute:false));
                }
                elseif($user->ufr === 'SDD'){
                    return redirect()->intended(route('bordsdd', absolute:false));
                }

            }

            //Redirection du candidat

            if($user->profil === 'candidat'){
                return redirect()->intended(route('candidat', absolute:false));

            }
            //redirection des presidents de commission
            if($user->profil === 'presidentcomissionphysique'){
                return redirect()->intended(route('interphysique', absolute:false));

            }
            if($user->profil === 'presidentcomissionmathematique'){
                return redirect()->intended(route('intermathematique', absolute:false));

            }
            if($user->profil === 'presidentcomissionchimie'){
                return redirect()->intended(route('interchimie', absolute:false));

            }
            if($user->profil === 'presidentcomissiontic'){
                return redirect()->intended(route('intertic', absolute:false));

            }
            if($user->profil === 'presidentcomissionij'){
                return redirect()->intended(route('interij', absolute:false));

            }
            if($user->profil === 'presidentcomissionmanagement'){
                return redirect()->intended(route('intermanagement', absolute:false));

            }
            if($user->profil === 'presidentcomissionsante'){
                return redirect()->intended(route('intersante', absolute:false));

            }
            if($user->profil === 'presidentcomissiondd'){
                return redirect()->intended(route('interdd', absolute:false));

            }
            if($user->profil === 'presidentcommissionpats'){
                return redirect()->intended(route('prcomission', absolute:false));

            }

            if($user->profil === 'membrepats'){
                return redirect()->intended(route('interpats', absolute:false));

            }

            //redirection de l'administrateur
            if($user->profil === 'administrateur'){
                return redirect()->intended(route('dashboard', absolute:false));

            }
            if($user->profil === 'chefdrh'){
                return redirect()->intended(route('drh', absolute:false));

            }

            // if($user->profil === 'directionufr'){
            //     return redirect()->intended(route('directionufr', absolute:false));

            // }
            if($user->profil === 'presidentcomissiontic'){
                return redirect()->intended(route('presidenttic', absolute:false));

            }
            if($user->profil === 'presidentcomissionmathematique'){
                return redirect()->intended(route('presidentmathematique', absolute:false));

            }
            if($user->profil === 'presidentcomissionphysique'){
                return redirect()->intended(route('presidentphysique', absolute:false));

            }
            if($user->profil === 'presidentcomissionchimie'){
                return redirect()->intended(route('presidentchimie', absolute:false));

            }
            if($user->profil === 'presidentcomissionij'){
                return redirect()->intended(route('presidentpresidentcomissionij', absolute:false));

            }
            if($user->profil === 'presidentcomissionmanagement'){
                return redirect()->intended(route('presidentmanagement', absolute:false));

            }
            if($user->profil === 'presidentcomissionsante'){
                return redirect()->intended(route('presidentsante', absolute:false));

            }
            if($user->profil === 'presidentcomissiondd'){
                return redirect()->intended(route('presidentdd', absolute:false));

            }
            if($user->profil === 'membretic'){
                return redirect()->intended(route('membre', absolute:false));

            }
            if($user->profil === 'membrephysique'){
                return redirect()->intended(route('intermembrephysique', absolute:false));

            }
            if($user->profil === 'membreij'){
                return redirect()->intended(route('membreij', absolute:false));

            }
            if($user->profil === 'membremathematique'){
                return redirect()->intended(route('membremathematique', absolute:false));

            }
            if($user->profil === 'membrephysique'){
                return redirect()->intended(route('membrephysique', absolute:false));

            }
            if($user->profil === 'membremanagement'){
                return redirect()->intended(route('membremanagement', absolute:false));

            }
            if($user->profil === 'membresante'){
                return redirect()->intended(route('membresante', absolute:false));

            }
            if($user->profil === 'membredd'){
                return redirect()->intended(route('membredd', absolute:false));

            }
            if($user->profil === 'membrechimie'){
                return redirect()->intended(route('membrechimie', absolute:false));

            }
            if($user->profil === 'rapporteur'){
                return redirect()->intended(route('rapporteur', absolute:false));

            }

            if($user->profil === 'dgrectorat'){
                return redirect()->intended(route('rectorat', absolute:false));

            }



        $request->authenticate();


        }
        //return redirect()->intended(route('dashboard', absolute: false));
        return redirect()->route('login')->withErrors(['email'=>'Email ou Mot de passe oublié ']);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
