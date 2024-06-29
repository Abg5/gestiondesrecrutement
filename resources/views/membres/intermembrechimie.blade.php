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
    <div class="p-4 sm:ml-64 mt-20">
         <h1 class="text-3xl font-bold text-center mb-8">Liste des Postes Disponibles</h1>
        <div class="flex justify-center">
            <div class="w-full">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                   <table>
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Intituler</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type de poste</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departement</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($postes as $postuler)
                                    @if ($postuler->postes === 'per')
                                        @if($postuler->departements==='chimie')
                                            <tr>
                                                <td>{{ $postuler->intituler }}</td>
                                                <td>Personnel Enseignent (per)</td>
                                                <td>{{ $postuler->departements }}</td>
                                                <td>
                                                <a href="{{ route('membrechimie', $postuler->id) }}" class="text-indigo-600 hover:text-indigo-900">Voir les candidats</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>

