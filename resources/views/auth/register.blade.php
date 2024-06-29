<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #ffffff;
            border-bottom: 1px solid #eaeaea;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            height: 60px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        nav img {
            height: 40px;
        }
        nav a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 4px;
        }
        nav a:hover {
            background-color: #eaeaea;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 120px auto 20px;
        }

        .form-title {
            text-align: center;
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #333;
        }

        .form-field {
            margin-bottom: 16px;
        }

        .form-field label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-field input {
            width: calc(100% - 16px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
            color: #333;
        }

        .form-field input:focus {
            border-color: #4A90E2;
            box-shadow: 0 0 4px rgba(74, 144, 226, 0.3);
        }

        .link-container {
            text-align: center;
            margin-top: 20px;
        }

        .login-link {
            color: #4A90E2;
            text-decoration: underline;
            font-weight: bold;
        }

        .login-link:hover {
            color: #357ABD;
        }

        .btn-primary {
            background-color: #4A90E2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
            text-align: center;
        }

        .btn-primary:hover {
            background-color: #357ABD;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        @media (min-width: 768px) {
            .grid {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>
<nav>
    <a href="#">
        <img src="/img/logo.png" alt="Logo UADB">
    </a>
    <a href="/">Accueil</a>
</nav>
<div class="form-container">
    <div class="form-title">Inscription</div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="grid">
            <!-- Prénom -->
            <div class="form-field">
                <label for="prenom">Prénom</label>
                <input id="prenom" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" />
                <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
            </div>

            <!-- Nom -->
            <div class="form-field">
                <label for="nom">Nom</label>
                <input id="nom" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="nom" />
                <x-input-error :messages="$errors->get('nom')" class="mt-2" />
            </div>

            <!-- Numéro de téléphone -->
            <div class="form-field">
                <label for="phone">Téléphone</label>
                <input id="phone" type="number" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Adresse -->
            <div class="form-field">
                <label for="adresse">Adresse</label>
                <input id="adresse" type="text" name="adresse" :value="old('adresse')" required autofocus autocomplete="adresse" />
                <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
            </div>


                <!-- Adresse Email -->
                <div class="form-field">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Date de naissance -->
                <div class="form-field">
                    <label for="ddn">{{ __('Date de naissance') }}</label>
                    <input id="ddn" type="date" name="ddn" :value="old('ddn')" required autocomplete="ddn" />
                    <x-input-error :messages="$errors->get('ddn')" class="mt-2" />
                     <x-input-error :messages="$errors->get('ddn')" class="mt-2" />
                    <span id="dateError" class="text-red-500"></span>
                </div>

                <!-- Pays de naissance -->
                <div class="form-field">
                    <label for="paysDeNaissance">{{ __('Pays de naissance') }}</label>
                    <input id="paysDeNaissance" type="text" name="paysDeNaissance" :value="old('paysDeNaissance')" required autocomplete="paysDeNaissance" />
                    <x-input-error :messages="$errors->get('paysDeNaissance')" class="mt-2" />
                </div>

                <!-- Lieu de naissance -->
                <div class="form-field">
                    <label for="lieuDeNaissance">{{ __('Lieu de naissance') }}</label>
                    <input id="lieuDeNaissance" type="text" name="lieuDeNaissance" :value="old('lieuDeNaissance')" required autocomplete="lieuDeNaissance" />
                    <x-input-error :messages="$errors->get('lieuDeNaissance')" class="mt-2" />
                </div>

                <!-- Mot de passe -->
                <div class="form-field">
                    <label for="password">{{ __('Mot de passe') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirmation du mot de passe -->
                <div class="form-field">
                    <label for="password_confirmation">{{ __('Confirmer le mot de passe') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn-primary">
                    {{ __('Envoyer') }}
                </button>
            </div>
        </form>


        <div class="link-container">
            <a class="login-link" href="{{ route('login') }}">


                {{ __('Vous avez déjà un compte ? Connectez-vous ici') }}
            </a>
        </div>
    </div>

    </div>
   <script>
function validateDate() {
    var dateInput = document.getElementById('ddn');
    var dateError = document.getElementById('dateError');
    var selectedDate = new Date(dateInput.value);
    var cutoffDate = new Date();
    cutoffDate.setFullYear(cutoffDate.getFullYear() - 18);

    if (selectedDate >= cutoffDate) {
        dateError.textContent = 'Vous devez avoir au moins 18 ans.';
        return false;
    }

    dateError.textContent = '';
    return true;
}
</script>
</body>
</html>

