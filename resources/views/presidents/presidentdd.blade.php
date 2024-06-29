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
                    <a href="{{ route('interdd') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
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
            <h1 class="text-2xl font-semibold mb-6">Liste des candidats</h1>
                <div class="flex flex-col items-center mb-3 mt-32 mx-5">
                    <div class="relative overflow-auto shadow-md sm:rounded-lg mb-8 mt-4 w-full">
                        @foreach($posts as $post)
                            @if ($post->postes =='per'  )
                                @if ( $post->departements =='dd')
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
                                                                        <a href="{{ route('voirpluspresidentdd', ['postuler_id' => $post->id , 'id' => $candidat->id]) }}" class="text-blue-600 dark:text-blue-500 hover:underline transition duration-300 ease-in-out">Voir plus</a>
                                                                    </td>
                                                                         <td>
                                                                            @if (!$candidat->pre_selected)
                                                                                <a href="{{ route('preSelectionnerdd', ['id' => $candidat->id]) }}" onclick="event.preventDefault(); document.getElementById('preSelectionnerdd-form-{{ $candidat->id }}').submit();" class="text-green-600 dark:text-green-500 hover:underline transition duration-300 ease-in-out ml-2">Pré-sélectionner</a>
                                                                                <form id="preSelectionnerdd-form-{{ $candidat->id }}" action="{{ route('preSelectionnerdd', ['id' => $candidat->id]) }}" method="POST" style="display: none;">
                                                                                    @csrf
                                                                                </form>
                                                                            @else
                                                                                <a href="{{ route('deselectionnerdd', ['id' => $candidat->id]) }}" onclick="event.preventDefault(); document.getElementById('deselectionnerdd-form-{{ $candidat->id }}').submit();" class="text-blue-600 dark:text-blue-500 hover:underline transition duration-300 ease-in-out ml-2">Désélectionner</a>
                                                                                <form id="deselectionnerdd-form-{{ $candidat->id }}" action="{{ route('deselectionnerdd', ['id' => $candidat->id]) }}" method="POST" style="display: none;">
                                                                                    @csrf
                                                                                </form>
                                                                            @endif
                                                                        </td>
                                                                </tr>
                                                        @endif
                                                @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
        </div>
    </body>
</html>
