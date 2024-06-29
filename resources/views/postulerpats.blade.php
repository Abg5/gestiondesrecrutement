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
<body class="font-sans antialiased flex flex-col items-center">
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 h-20 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center px-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/nouveau-logo-uadb.png') }}" alt="Logo UADB" width="300" height="auto">
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

     <form action="{{ route('postulerpats2') }}" method="POST" enctype="multipart/form-data">
            @csrf
@method('post')
 <input type="hidden" name="postuler_id" value="{{ $idpost }}">

    <div class="flex flex-col items-center w-full mt-24 px-2 space-y-8">
        {{-- <div class="w-full max-w-7xl">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                    <div class="mb-6">
                        <label for="poste" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poste</label>
                        <select id="poste" name="poste" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($avis as $avis)
                                <option value="{{ $avis->id }}">{{ $avis->intituler }}</option>
                            @endforeach
                        </select>
                    </div>

            </div>
        </div> --}}


                       {{-- Experience Pedagogique --}}

                <div class="flex flex-wrap justify-between items-start w-full max-w-7xl mt-24 px-2 space-x-4">
                    <div class="flex-1 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 max-w-lg">
                        <h1 class="text-2xl font-bold mb-4">Experiences Pedagogique</h1>
                            <div class="mb-6">
                                <label for="maitriseoutilanalyse" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Experiences pedagogique</label>
                                <select id="maitriseoutilanalyse" name="maitriseoutilanalyse" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Selectionner votre niveau d'experience</option>
                                    <option value="non">Non</option>
                                    <option value="assezproche">Assez proche</option>
                                    <option value="tresproche">Tres proche</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="maitrisedeslogiciels" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maitrise des logiciels</label>
                                <select id="maitrisedeslogiciels" name="maitrisedeslogiciels" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Selectionner votre niveau d'experience</option>
                                    <option value="non">Non</option>
                                    <option value="assezproche">Assez proche</option>
                                    <option value="tresproche">Tres proche</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="qualitedepresentation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualite de presentation</label>
                                <select id="qualitedepresentation" name="qualitedepresentation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Selectionner votre niveau d'experience</option>
                                    <option value="non">Non</option>
                                    <option value="assezproche">Assez proche</option>
                                    <option value="tresproche">Tres proche</option>
                                </select>
                            </div>
                            <div class="mb-80">
                                <label for="attestationpedagogique" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Attestation Pedagogique</label>
                                <input type="file" name="attestationpedagogique" id="attestationpedagogique" value="attestationpedagogique" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" accept="application/pdf">
                            </div>
                    </div>


      {{-- Experience professionnel --}}

                <div class="flex-1 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 max-w-lg">
                    <h1 class="text-2xl font-bold mb-4">Experiences Professionnel</h1>
                        <div class="mb-6">
                            <label for="pertinanceformation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Experiences professionnel</label>
                                <select id="pertinanceformation" name="pertinanceformation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Selectionner votre niveau d'experience</option>
                                    <option value="non">Non</option>
                                    <option value="assezproche">Assez proche</option>
                                    <option value="tresproche">Tres proche</option>
                                </select>
                        </div>
                        <div class="mb-6">
                            <label for="pertinanceexperience" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maitrise des logiciels</label>
                                <select id="pertinanceexperience" name="pertinanceexperience" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Selectionner votre niveau d'experience</option>
                                    <option value="non">Non</option>
                                    <option value="assezproche">Assez proche</option>
                                    <option value="tresproche">Tres proche</option>
                                </select>
                        </div>
                        <div class="mb-6">
                            <label for="maitriselangue" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualite de presentation</label>
                                <select id="maitriselangue" name="maitriselangue" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Selectionner votre niveau d'experience</option>
                                    <option value="non">Non</option>
                                    <option value="assezproche">Assez proche</option>
                                    <option value="tresproche">Tres proche</option>
                                </select>
                        </div>
                        <div class="mb-6">
                           <label for="maitriseas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualite de presentation</label>
                                <select id="maitriseas" name="maitriseas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Selectionner votre niveau d'experience</option>
                                    <option value="non">Non</option>
                                    <option value="assezproche">Assez proche</option>
                                    <option value="tresproche">Tres proche</option>
                                </select>
                        </div>
                        <div class="mb-6">
                            <label for="maitriselangue" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualite de presentation</label>
                                <select id="maitriselangue" name="maitriselangue" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Selectionner votre niveau d'experience</option>
                                    <option value="non">Non</option>
                                    <option value="assezproche">Assez proche</option>
                                    <option value="tresproche">Tres proche</option>
                                </select>
                        </div>
                       <div class="mb-6">
                            <label for="maitriseas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualite de presentation</label>
                                <select id="maitriseas" name="maitriseas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">Selectionner votre niveau d'experience</option>
                                    <option value="non">Non</option>
                                    <option value="assezproche">Assez proche</option>
                                    <option value="tresproche">Tres proche</option>
                                </select>
                        </div>

                        <div class="mb-10">
                            <label for="attestationprofessionnel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Attestation professionnel</label>
                            <input type="file" name="attestationprofessionnel" id="attestationprofessionnel" value="attestationprofessionnel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" accept="application/pdf">
                        </div>
                </div>
         </div>
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Postuler</button>


</form>


</body>
</html>
