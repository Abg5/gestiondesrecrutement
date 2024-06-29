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

 <div class="fixed z-50 text-center top-1/2 left-1/2" id="chargement">
        <div role="status">
            <svg aria-hidden="true" class="inline w-12 h-12 text-gray-200 animate-spin fill-blue-600"
                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="currentColor" />
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
        aria-controls="sidebar-multi-level-sidebar" type="button"
        class="inline-flex items-center p-2 mt-2 text-sm text-gray-500 rounded-lg ms-3 sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="z-40 w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
        <img src="assets/images/logo/logoUadb.png" alt="logo">
    </button>

   <aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
            <ul class="space-y-4 font-medium">
                <li>
                    <a href="#">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                        </svg>
                        <span class="ms-3">Tableau de bord</span>
                    </a>
                </li>
                  <li>
                    <a href="{{ route('interchimie') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                        </svg>
                        <span class="ms-3">Dossiers des candidatures</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

            <div class="p-4 sm:ml-64">

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
            $diplome = \App\Models\diplome::find($diplome->diplome_id);
        @endphp
        <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
            <h2 class="text-lg font-semibold mb-4">Diplôme</h2>
                <p>Nom du diplôme: {{$diplome ->nomdiplome ?? 'Pas de diplôme' }}</p>
            <form method="POST" action="{{ route('update', ['id' => $diplome && $diplome->id]) }}">
                @csrf
                <p>Nombre de points:  {{$diplome->point}}
                    <input type="number" name="point" value="{{$diplome->point }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
               $totalPoints +=$diplome->point
               @endphp
            </p>
        </div>
    @endforeach
@endif




<!-- Section Enseignement UADB -->
 @if($diplomes->isEmpty())
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">Diplôme</h2>
        <p>Aucun diplôme trouvé</p>
    </div>
@else
    @foreach ($diplomes as $enseignementuadb)
        @php
            // Récupérer le nom de l'utilisateur associé à l'emprunt
            $enseignementuadb = \App\Models\enseignementuadb::find($enseignementuadb->id);
        @endphp
        <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
            <h2 class="text-lg font-semibold mb-4">Enseignement a l'UADB </h2>
                <p>Nombre annee enseigne a l'uadb: {{$enseignementuadb ->nombreanneeuadb ?? 'non specifie' }}</p>
            <form method="POST" action="{{ route('updateEnseignement', ['id' => $enseignementuadb && $enseignementuadb->enseignement_id]) }}">
                @csrf
                <p>Nombre de points:  {{ $enseignementuadb->point}}
                    <input type="number" name="point" value="{{$enseignementuadb->point }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 ml-2">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
</svg>

                    </button>
                </p>
            </form>
           <p>Attestation :
                                @if($enseignementuadb && $enseignementuadb->attestationuadb)
                                    <a href="{{ asset('storage/' . $enseignementuadb->attestationuadb) }}" class="hover:text-blue-700">voir le fichier</a>
                                @else
                                    Pas de fiche disponible
                                @endif
                @php
               $totalPoints +=$enseignementuadb->point
               @endphp
            </p>
        </div>
    @endforeach
@endif

</div>



        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

    <!-- Section Expérience Professionnelle -->
    @if($diplomes->isEmpty())
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">Diplôme</h2>
        <p>Aucun diplôme trouvé</p>
    </div>
@else
    @foreach ($diplomes as $experienceprofessionel)
        @php
            // Récupérer le nom de l'utilisateur associé à l'emprunt
            $experienceprofessionel = \App\Models\experienceprofessionel::find($experienceprofessionel->experienceprofessionnel_id);
        @endphp
        <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
            <h2 class="text-lg font-semibold mb-4">Diplôme</h2>
                <p>Nombre annee d'experience: {{$experienceprofessionel ->nombreanneeprofessionnel ?? 'Pas de diplôme' }}</p>
            <form method="POST" action="{{ route('updateExperienceprofessionel', ['id' => $experienceprofessionel && $experienceprofessionel->id]) }}">
                @csrf
                <p>Nombre de points:  {{$experienceprofessionel->point}}
                    <input type="number" name="point" value="{{$experienceprofessionel->point }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 ml-2">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
</svg>

                    </button>
                </p>
            </form>
           <p>Fiche du diplôme:
                                @if($experienceprofessionel->attestationprofessionnel)
                                    <a href="{{ asset('storage/' . $experienceprofessionel->attestationprofessionnel) }}" class="hover:text-blue-700">voir le fichier</a>
                                @else
                                    Pas de fiche disponible
                                @endif
                @php
               $totalPoints +=$experienceprofessionel->point
               @endphp
            </p>
        </div>
    @endforeach
@endif




       {{-- <!-- Section Expérience Pedagogique --> --}}
 @if($diplomes->isEmpty())
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">Diplôme</h2>
        <p>Aucun diplôme trouvé</p>
    </div>
@else
    @foreach ($diplomes as $experiencepedagogique)
        @php
            // Récupérer le nom de l'utilisateur associé à l'emprunt
            $experiencepedagogique = \App\Models\experiencepedagogique::find($experiencepedagogique->experiencepedagogique_id);
        @endphp
        <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
            <h2 class="text-lg font-semibold mb-4">Diplôme</h2>
                <p>Nombre annee d'experience: {{$experiencepedagogique ->nombreanneepedagogiques ?? 'Aucune experience' }}</p>
            <form method="POST" action="{{ route('updateExperiencepedagogique', ['id' => $experiencepedagogique && $experiencepedagogique->id]) }}">
                @csrf
                <p>Nombre de points:  {{$experiencepedagogique->point}}
                    <input type="number" name="point" value="{{$experiencepedagogique->point }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 ml-2">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
</svg>

                    </button>
                </p>
            </form>
           <p>Fiche du diplôme:
                                @if($experiencepedagogique->attestationpedagogique)
                                    <a href="{{ asset('storage/' . $experiencepedagogique->attestationpedagogique) }}" class="hover:text-blue-700">voir le fichier</a>
                                @else
                                    Pas de fiche disponible
                                @endif
                @php
               $totalPoints +=$experiencepedagogique->point
               @endphp
            </p>
        </div>
    @endforeach
@endif
</div>
              <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

       <!-- Section adequations -->
       @if($diplomes->isEmpty())
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">Diplôme</h2>
        <p>Aucun diplôme trouvé</p>
    </div>
    @else
     @foreach ($diplomes as $adequation)
    @php
        // Récupérer le nom du candidat qui a postuler
        $adequation = \App\Models\adequation::where('id', $adequation->id)->first();
    @endphp
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">Adequation</h2>
        <p>le degre d'adequation:{{ $adequation->degreadequation  ?? 'Non spécifié' }}</p>
       <p>Nombre de points:{{$adequation->point }}</p>
        <form method="POST" action="{{ route('updateAdequation', ['id' =>$adequation->id]) }}">
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
      @endif
       <!-- Section grades -->
       @if($diplomes->isEmpty())
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">Diplôme</h2>
        <p>Aucun diplôme trouvé</p>
    </div>
        @else

     @foreach ($diplomes as $grade)
    @php
        // Récupérer le nom du candidat qui a postuler
        $grade = \App\Models\grade::where('id', $grade->id)->first();
    @endphp
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">grade</h2>
        <p>le degre d'grade:{{ $grade->typegrade  ?? 'Non spécifié' }}</p>

        <form method="POST" action="{{ route('updateGrade', ['id' =>$grade->id]) }}">
                @csrf
                <p>Nombre de points:  {{$grade->point}}
                    <input type="number" name="point" value="{{$grade->point }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
               $totalPoints +=$grade->point
            @endphp
             </p>
    </div>
      @endforeach
      @endif
      </div>
<div class="grid grid-cols-1 gap-4 md:grid-cols-2">

       <!-- Section publications -->
       @if($diplomes->isEmpty())
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">Diplôme</h2>
        <p>Aucun diplôme trouvé</p>
    </div>
        @else

     @foreach ($diplomes as $publication)
    @php
        // Récupérer le nom du candidat qui a postuler
        $publication = \App\Models\publication::where('id', $publication->id)->first();
    @endphp
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <h2 class="text-lg font-semibold mb-4">publication</h2>
        <p>le degre d'publication:{{ $publication->typepublication  ?? 'Non spécifié' }}</p>
       <p>le nombre d'article publiee:{{ $publication->nombrearticleabstract ?? 'Non spécifié' }}</p>

        <form method="POST" action="{{ route('updatePublication', ['id' =>$publication->id]) }}">
                @csrf
        <p>Nombre de points:  {{$publication->point}}
        <input type="number" name="point" value="{{$publication->point }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
               $totalPoints +=$publication->point
            @endphp
        </p>
    </div>
      @endforeach
      @endif



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


