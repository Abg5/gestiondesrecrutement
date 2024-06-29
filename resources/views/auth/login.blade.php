<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: 60px;
        }
        .login-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            width: 400px;
        }
        .login-form h2 {
            margin-bottom: 20px;
        }
        .login-form label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        .login-form input[type="email"], .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 4px;
            font-size: 16px;
        }
        .login-form button:hover {
            background-color: #0056b3;
        }
        .login-form .forgot-password {
            display: block;
            margin-top: 12px;
            text-align: right;
        }
    </style>
</head>
<body>

<nav>
    {{-- <a href="#"> --}}
        <img src="/img/logo.png" alt="Logo UADB">
    {{-- </a> --}}
    <a href="/">Accueil</a>
</nav>

<div class="container">
    <div class="login-form">
        <h2>Connexion</h2>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <label for="email">E-mail</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div>
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <!-- Remember Me -->
            <div>
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="forgot-password" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                @endif

                <button type="submit">
                    {{ __('Connecter') }}
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
