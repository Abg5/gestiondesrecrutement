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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("chargement").style.display = "none";
        });
        function closeAlert() {
            document.getElementById("success-alert").style.display = "none";
        }
    </script>
    <style>
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
        }
        .antialiased {
            background-image: url('img/adm.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .section-title {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 1.25rem;
        }
    </style>
</head>
    <body class="antialiased bg-gray-200 font-body">

    <nav class="bg-white-900 dark:bg-white-900 fixed w-full z-20 top-0 start-0 h-20 border-b border-white-900 dark:border-white-900 flex justify-between items-center px-4">
        <a class="flex items-center space-x-3 rtl:space-x-reverse ">
<img class="h-12 w-auto" src="{{ asset('img/logo.png') }}">
        </a>
        <ul class="flex items-center h-20 space-x-3">

            <li class="relative group">
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">{{ Auth::user()->nom }}</span>
                </a>
                <!-- Dropdown menu -->
                <div class="absolute right-0 hidden w-48 py-2 mt-2 bg-white rounded-lg shadow-xl group-hover:block">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Modifier Profil</a>
                    <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                        @csrf
                        <button type="submit">Déconnecter</button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    {{-- <div class="mb-4"> --}}
    {{-- <form action="{{ route('candidats') }}" method="GET">
        <input type="text" name="query" placeholder="Rechercher un candidat..." class="px-4 py-2 border rounded-md">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Rechercher</button>
    </form> --}}
{{-- </div> --}}

        <div class="flex flex-col items-center mb-3 mt-32 mx-5">
    <div class="relative overflow-auto shadow-md sm:rounded-lg mb-8 mt-4 w-full">
          <h1 class="text-2xl font-semibold mb-6">Liste des candidats</h1>

         {{--  <h2>{{ $postuler->intituler }}</h2> --}}
       {{-- @dd($candidates[0]->postuler) --}}
      @foreach($posts as $post)

      @if ($post->postes =='per'  )
             @if ( $post->departements =='chimie')


    <table class="w-full text-base text-left text-gray-500 dark:text-gray-400 p-3">
        <thead class="text-sm text-black-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-black-400">
            <tr>
                <th colspan="9">{{ $post->intituler }}</th>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Nom</th>
                <th scope="col" class="px-6 py-3">Prénom</th>
                <th scope="col" class="px-6 py-3">Date de Naissance</th>
                <th scope="col" class="px-6 py-3">Lieu de Naissance</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Téléphone</th>
                <th scope="col" class="px-6 py-3">Adresse</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $candidats = \App\Models\Postuleruser::where('postuler_id', $post->id)->get();
                $displayedCandidates = [];
                $counter = 0;
            @endphp
            @foreach ($candidats as $allcandidats)
                @php
                    $candidat = \App\Models\User::find($allcandidats->user_id);
                @endphp
                @if(!isset($displayedCandidates[$candidat->id]))
                    @php
                        $displayedCandidates[$candidat->id] = true;
                    @endphp
                    <tr class="odd:bg-white odd:dark:bg-white-900 even:bg-gray-50 even:dark:bg-white-800 border-b dark:border-gray-700">
                        <td class="font-medium text-gray-900 dark:text-black">{{ ++$counter }}</td>
                        <td class="px-6 py-4">{{ $candidat->nom }}</td>
                        <td class="px-6 py-4">{{ $candidat->prenom }}</td>
                        <td class="px-6 py-4">{{ $candidat->ddn }}</td>
                        <td class="px-6 py-4">{{ $candidat->lieuDeNaissance }}</td>
                        <td class="px-6 py-4">{{ $candidat->email }}</td>
                        <td class="px-6 py-4">{{ $candidat->phone }}</td>
                        <td class="px-6 py-4">{{ $candidat->adresse }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('voirpluschimie', ['postuler_id' => $post->id , 'id' => $candidat->id]) }}" class="text-blue-600 dark:text-blue-500 hover:underline transition duration-300 ease-in-out">Voir plus</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
          @endif
    @endif
@endforeach
{{-- {{ $posts->links() }} --}}



    </div>
</html>
