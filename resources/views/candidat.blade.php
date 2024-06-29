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
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 flex flex-col items-center">
    <nav class="bg-white dark:bg-white-900 fixed w-full z-20 top-0 start-0 h-20 border-b border-white-900 dark:border-white-900 flex justify-between items-center px-4">
        <a class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/nouveau-logo-uadb.png') }}" alt="Logo UADB" width="300" height="auto">
        </a>
        <ul class="flex items-center h-20 space-x-3">
            <li class="relative group">
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg :bg-gray-100 group">
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">{{ Auth::user()->nom }}</span>
                </a>
                <!-- Menu déroulant -->
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

    <div class="mt-24 text-center">
        <h1 class="text-2xl uppercase"><strong>Recrutement des personnels Enseignants</strong></h1>
    </div>

    <div class="flex flex-col items-center justify-center mb-3 p-5 shadow-xl mt-3 mx-5">
        @if ($postuler->isEmpty())
            <div class="text-center text-gray-500">
                <p>Aucun poste disponible pour le moment.</p>
            </div>
        @else
            <div class="relative overflow-auto shadow-md sm:rounded-lg mb-8 mt-4 w-full p-3">
                <table class="w-full text-base text-left text-gray-500 dark:text-gray-400 p-3">
                    <thead class="text-sm text-black-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-black-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">#</th>
                            <th scope="col" class="px-6 py-3">Intitulé</th>
                            <th scope="col" class="px-6 py-3">Département</th>
                            <th scope="col" class="px-6 py-3">Date limite</th>
                            <th scope="col" class="px-6 py-3">Heure limite</th>
                            <th scope="col" class="px-6 py-3">Type de contrat</th>
                            <th scope="col" class="px-6 py-3">Postes</th>
                            <th scope="col" class="px-6 py-3">Postuler de recrutement</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($postuler as $poste)
                        <tr class="odd:bg-white odd:dark:bg-white-900 even:bg-gray-50 even:dark:bg-white-800 border-b dark:border-gray-700">
                            <td class="font-medium text-gray-900 dark:text-black">{{ $loop->index + 1 }}</td>
                            <td class="font-medium text-gray-900 px-3 dark:text-black">{{ $poste->intituler }}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $poste->departements }}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $poste->datelimite }}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $poste->heurelimite }}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $poste->contrat }}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $poste->postes }}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">
                                <a href="{{ asset('storage/' . $poste->fichier) }}" class="hover:text-blue-700">Lire le fichier</a>
                            </td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">
                                @if ($poste->postes == 'per')
                                    <a href="{{ route('postulerper') }}?id={{ $poste->id }}"
                                       class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                       <span class="">Postuler</span>
                                    </a>
                                @endif
                                @if ($poste->postes == 'pats')
                                    <a href="{{ route('postulerpats') }}?id={{ $poste->id }}"
                                       class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                       <span class="">Postuler</span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
