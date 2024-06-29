<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
    .background-image {
        background-image: url('img/compt2.jpg');
        background-repeat: no-repeat;
        background-size:cover;
        background-position:center;
        background-attachment: fixed;
        }
        .container{
            text-align: left;
        }
        .container {
    text-align: left;
    margin-top: 20px;
  }
  /* Style pour le lien */
  .container a {
    color: #fff;
    text-decoration: none;
    font-size: 20px;
    background-color: rgb(10, 10, 179);
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s; /
  }
  /* Effet de survol */
  .container a:hover {
    background-color:rgb(40, 40, 99); /* Changement de couleur de fond au survol */
  }

    </style>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 background-image">
            <!-- Votre contenu ici -->
            <div class="container">
                <a href="{{route('welcome')}}">Accueil</a>
              </div>
            <div>
                <div>
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </div>
            </div>
            <div class="w-full sm:max-w-md max-w-xl mt-6 px-6 py-4 bg-gradient-to-br from-brown-200 to-brown-800 shadow-lg rounded-lg text-white border-2 border-brown-900 hover:shadow-xl transition duration-300 ease-in-out">
                {{ $slot }}
            </div>
        </div>
    </div>
    </body>
</html>
