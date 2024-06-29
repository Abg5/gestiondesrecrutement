<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'prenom' => ['required', 'string', 'max:255'],
        //     'nom' => ['required', 'string', 'max:255'],
        //     'phone' => ['required', 'integer', 'max:255'],
        //     'adresse' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'],
        //     'ddn' => ['required', 'date', 'max:255'],
        //     'paysDeNaissance' => ['required', 'string', 'max:255'],
        //     'lieuDeNaissance' => ['required', 'string', 'max:255'],
        //     'profil' => ['required', Rule::in(['PERs','PATS'])],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);


        // dd($request);

        $candidat = new User();


        $candidat->prenom = $request->prenom;
        $candidat->nom = $request->nom;
        $candidat->phone = $request->phone;
        $candidat->adresse = $request->adresse;
        $candidat->email = $request->email;
        $candidat->ddn = $request->ddn;
        $candidat->paysDeNaissance = $request->paysDeNaissance;
        $candidat->lieuDeNaissance = $request ->lieuDeNaissance;
        $candidat->profil = 'candidat';
        $candidat->password = $request->password;
        $candidat->save();

        event(new Registered($candidat));

        Auth::login($candidat);

        return redirect(route('candidat', absolute: false));
    }
}
