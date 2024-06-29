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
    <body class="font-sans antialiased">
        <!-- Navbar -->
        <nav class="mx-auto flex  items-center justify-between p-3 mx-5 " aria-label="Global">
            <div class="flex lg:flex-1">

                    <img class="h-12 w-auto" src="img/logo.png" alt="Logo">

            </div>
            <div></div>
            @guest
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="{{ route('login') }}" class="bg-yellow-800 rounded-xl px-4 py-1 text-lg font-semibold hover:text-gray-300 leading-6 text-white">Se Connecter</a>&emsp;
                    <a href="{{ route('register') }}" class="bg-blue-500 rounded-xl px-4 py-1 text-lg font-semibold hover:text-gray-300 leading-6 text-white">S'inscrire</a>
                </div>
            @endguest
            @auth
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Deconnexion') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endauth
        </nav>

        <!-- Content -->
        <div class="text-center">
        <h1 ><strong>Recrutement des personnels Enseignants (per)</strong></h1>
        </div>
        <div class="flex flex-col items-center justify-center mb-3 mt-3 mx-5">
            <div class="relative overflow-auto shadow-md sm:rounded-lg mb-2 mt-3 w-full ">

                <table class="w-full text-base text-left text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-black-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-black-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Intituler</th>
                            <th scope="col" class="px-6 py-3">Departement</th>
                            <th scope="col" class="px-6 py-3">Date limite</th>
                            <th scope="col" class="px-6 py-3">Heure limite</th>
                            <th scope="col" class="px-6 py-3">Type de contrat</th>
                            <th scope="col" class="px-6 py-3">postuler de recrutement</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($postuler as $postuler)
                    <tr class="odd:bg-white odd:dark:bg-white-900 even:bg-gray-50 even:dark:bg-white-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-black">{{ $postuler->intituler }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $postuler->departements }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $postuler->datelimite }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $postuler->heurelimite }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $postuler->contrat }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            <a href="{{ asset('storage/' . $postuler->fichier) }}" class="hover:text-blue-700">Télécharger le fichier</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </body>
</html>
