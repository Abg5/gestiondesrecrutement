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
        body {
            font-family: 'Figtree', sans-serif;
        }
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .antialiased {
            background-image: url('img/adm.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .table-container {
            width: 90%;
            margin-top: 100px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
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
        a {
            color: #3490dc;
            text-decoration: none;
            transition: color 0.3s;
        }
        a:hover {
            color: #1d72b8;
        }
        .btn {
            background-color: #3490dc;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #1d72b8;
        }
    </style>
</head>

<body class="antialiased bg-gray-200 font-body">
            <header class="bg-gray-100 rounded-xl m-6 p-4">

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
                    {{-- <span class="flex-1 ms-3 whitespace-nowrap">{{ Auth::user()->nom }}</span> --}}
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

    @php
        // Récupérer le nom de l'utilisateur qui a postuler
        $user = \App\Models\User::where('id', $id)->first();
    @endphp
    @php
        $totalPoints = 0;
    @endphp
    <h1 class="text-2xl font-semibold mb-6">Dossier de

             {{ $user->prenom }}   {{ $user->nom }}


    </h1>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">


    <!-- Section Diplôme -->
 @if($diplomes->isEmpty())
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">Diplôme</h2>
        <p>Aucun diplôme trouvé</p>
    </div>
@else
    @foreach ($diplomes as $diplome)
        @php
            // Récupérer le nom de l'utilisateur associé à l'emprunt
            $diplome = \App\Models\diplome::where('id', $diplome->id)->first();
        @endphp
        <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
            <h2 class="text-lg font-semibold mb-4">Diplôme</h2>
            <p>Nom du diplôme: {{ $diplome->nomdiplome ?? 'Pas de diplôme' }}</p>
            <form method="POST" action="{{ route('update', ['id' => $diplome->id]) }}">
                @csrf
                <p>Nombre de points:  {{ $diplome->point}}
                    <input type="number" name="point" value="{{ $diplome->point }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 ml-2">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
</svg>

                    </button>
                </p>
            </form>
            <p>Fiche du diplôme:
                @if($diplome->fichediplome)
                    <a href="{{ asset('storage/' . $diplome->fichediplome) }}" class="hover:text-blue-700">voir le fichier</a>
                @else
                    Pas de fiche disponible
                @endif
                @php
               $totalPoints += $diplome->point
               @endphp
            </p>
        </div>
    @endforeach
@endif


<!-- Section Enseignement UADB -->

 @foreach ($diplomes as $enseignementuadb)
    @php
        // Récupérer le nom de l'utilisateur associé à l'emprunt
        $enseignementuadb = \App\Models\enseignementuadb::where('id', $enseignementuadb->id)->first();
    @endphp
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">Enseignement UADB</h2>
        <p>Nombre d'années d'expérience: {{ $enseignementuadb->nombreanneeuadb ?? 'Non spécifié' }}</p>
         <form method="POST" action="{{ route('updateEnseignement', ['id' => $enseignementuadb->id]) }}">
                @csrf
                <p>Nombre de points:
                    <input type="number" name="point" value="{{ $enseignementuadb->point }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 ml-2">
                       <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
</svg>

                    </button>
                </p>
            </form>
        <p>Attestation d'enseignement à l'UADB:
            @if($enseignementuadb->attestationuadb)
                <a href="{{ asset('storage/' . $enseignementuadb->attestationuadb) }}" class="hover:text-blue-700">voir le fichier</a>
            @else
                Pas d'attestation disponible
            @endif
            @php
               $totalPoints += $enseignementuadb->point
               @endphp
        </p>
    </div>
@endforeach
</div>



        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

    <!-- Section Expérience Professionnelle -->
    @foreach ($diplomes as $experienceprofessionel)
    @php
        // Récupérer le nom de l'utilisateur associé à l'emprunt
        $experienceprofessionel = \App\Models\experienceprofessionel::where('id', $experienceprofessionel->id)->first();
    @endphp
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">Experience Professionel</h2>
        <p>Nombre d'années d'expérience professionnel:{{ $experienceprofessionel->nombreanneeprofessionnel  ?? 'Non spécifié' }}</p>
       <p>Nombre de points:{{ $experienceprofessionel->point }}</p>
        <form method="POST" action="{{ route('updateExperienceprofessionel', ['id' => $experienceprofessionel->id]) }}">
                @csrf
                <p>Nombre de points:  {{ $experienceprofessionel->point}}
                    <input type="number" name="point" value="{{ $experienceprofessionel->point }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 ml-2">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
</svg>

                    </button>
                </p>
            </form>
        <p>Attestation d'experience professionnel:
 @if($experienceprofessionel->attestationprofessionnel)
                <a href="{{ asset('storage/' . $experienceprofessionel->attestationprofessionnel) }}" class="hover:text-blue-700">voir le fichier</a>
            @else
                Pas d'attestation disponible
            @endif
            @php
               $totalPoints += $experienceprofessionel->point
               @endphp
      </p>
    </div>
      @endforeach


       {{-- <!-- Section Expérience Pedagogique --> --}}
      @foreach ($diplomes as $experiencepedagogique)
    @php
        // Récupérer le nom de l'utilisateur associé à l'emprunt
        $experiencepedagogique = \App\Models\experiencepedagogique::where('id', $experiencepedagogique->id)->first();
    @endphp
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">Experience Pedagogique</h2>
        <p>Nombre d'années d'expérience professionnel:{{ $experiencepedagogique->nombreanneepedagogiques  ?? 'Non spécifié' }}</p>
       <p>Nombre de points:{{ $experiencepedagogique->point }}</p>
        <form method="POST" action="{{ route('updateExperiencepedagogique', ['id' => $experiencepedagogique->id]) }}">
                @csrf
                <p>Nombre de points:  {{ $experiencepedagogique->point}}
                    <input type="number" name="point" value="{{ $experiencepedagogique->point }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 ml-2">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
</svg>

                    </button>
                </p>
            </form>
        <p>Attestation d'experience professionnel:
 @if($experiencepedagogique->attestationpedagogique)
                <a href="{{ asset('storage/' . $experiencepedagogique->attestationpedagogique) }}" class="hover:text-blue-700">voir le fichier</a>
            @else
                Pas d'attestation disponible
            @endif
            @php
               $totalPoints += $experiencepedagogique->point
               @endphp
                   </p>
    </div>
      @endforeach
      </div>
              <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

       <!-- Section adequations -->
     @foreach ($diplomes as $adequation)
    @php
        // Récupérer le nom du candidat qui a postuler
        $adequation = \App\Models\adequation::where('id', $adequation->id)->first();
    @endphp
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">Adequation</h2>
        <p>le degre d'adequation:{{ $adequation->degreadequation  ?? 'Non spécifié' }}</p>
       <p>Nombre de points:{{ $adequation->point }}</p>
        <form method="POST" action="{{ route('updateAdequation', ['id' => $adequation->id]) }}">
                @csrf
                <p>Nombre de points:  {{ $adequation->point}}
                    <input type="number" name="point" value="{{ $adequation->point }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 ml-2">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
</svg>

                    </button>
                </p>
            </form>
        <p>Acte de recherche:
 @if($adequation->actederecherche)
                <a href="{{ asset('storage/' . $adequation->actederecherche) }}" class="hover:text-blue-700">voir le fichier</a>
            @else
                Pas d'attestation disponible
            @endif
            @php
               $totalPoints += $adequation->point
               @endphp
             </p>
    </div>
      @endforeach
       <!-- Section grades -->
     @foreach ($diplomes as $grade)
    @php
        // Récupérer le nom du candidat qui a postuler
        $grade = \App\Models\grade::where('id', $grade->id)->first();
    @endphp
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">grade</h2>
        <p>le degre d'grade:{{ $grade->typegrade  ?? 'Non spécifié' }}</p>

        <form method="POST" action="{{ route('updateGrade', ['id' => $grade->id]) }}">
                @csrf
                <p>Nombre de points:  {{ $grade->point}}
                    <input type="number" name="point" value="{{ $grade->point }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 ml-2">
                      <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
</svg>

                    </button>
                </p>
            </form>
        <p>Attestation:
 @if($grade->attestationgrade)
                <a href="{{ asset('storage/' . $grade->attestationgrade) }}" class="hover:text-blue-700">voir le fichier</a>
            @else
                Pas d'attestation disponible
            @endif
             @php
               $totalPoints += $grade->point
            @endphp
             </p>
    </div>
      @endforeach
      </div>
              <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

       <!-- Section publications -->
     @foreach ($diplomes as $publication)
    @php
        // Récupérer le nom du candidat qui a postuler
        $publication = \App\Models\publication::where('id', $publication->id)->first();
    @endphp
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">publication</h2>
        <p>le degre d'publication:{{ $publication->typepublication  ?? 'Non spécifié' }}</p>
       <p>le nombre d'article publiee:{{ $publication->nombrearticleabstract ?? 'Non spécifié' }}</p>

        <form method="POST" action="{{ route('updatePublication', ['id' => $publication->id]) }}">
                @csrf
                <p>Nombre de points:  {{ $publication->point}}
                    <input type="number" name="point" value="{{ $publication->point }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 ml-2">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
</svg>
</button>
                </p>
            </form>
        <p>Attestation:
 @if($publication->actedepublication)
                <a href="{{ asset('storage/' . $publication->actedepublication) }}" class="hover:text-blue-700">voir le fichier</a>
            @else
                Pas d'attestation disponible
            @endif
            @php
               $totalPoints += $publication->point
            @endphp
            </p>
    </div>
      @endforeach


      <!-- Section total des points -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">Total des Points</h2>
        <p>Le nombre total des points obtenus : {{ $totalPoints }}</p>
    </div>
     </div>

    <!-- Ajoutez d'autres sections pour d'autres éléments du dossier du candidat ici -->
</div>

</body>
</html>


