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
</head>
<body class="font-sans antialiased flex flex-col items-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 h-20 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center px-4">
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

    <form action="{{ route('postulerper2') }}" method="POST" enctype="multipart/form-data">
            @csrf
@method('post')
<input type="hidden" name="postuler_id" value="{{ $idpost }}">
     <div class="flex-1 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 max-w-lg">
            <h1 class="text-2xl font-bold mb-4">Diplômes</h1>
            <div class="mb-16">
                <label for="nomdiplome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du diplôme</label>
                <select id="nomdiplome" name="nomdiplome" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">Sélectionner un diplôme</option>
                    <option value="Doctoratdetat">Doctorat d'état</option>
                    <option value="Doctoratunique">Doctorat Unique</option>
                    <option value="phd">PhD</option>
                    <option value="doctoratcycle3">Doctorat 3ème cycle</option>
                    <option value="masterII">Master II</option>
                </select>
            </div>
            <div class="mb-16">
                <label for="fichediplome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Attestation</label>
                <input type="file" name="fichediplome" id="fichediplome" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" accept="application/pdf" required>
            </div>


        </div>
         <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Postuler
    </button>
</form>

</body>
</html>
