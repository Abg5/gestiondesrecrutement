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
        /* CSS */
/* Style général des sections */
.section {
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Style spécifique pour chaque section */
.section h2 {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.section p {
    margin-bottom: 8px;
}

    </style>
</head>

<body class="antialiased bg-gray-200 font-body">
       <nav class="bg-white-900 dark:bg-white-900 fixed w-full z-20 top-0 start-0 h-20 border-b border-white-900 dark:border-white-900 flex justify-between items-center px-4">
        <a class="flex items-center space-x-3 rtl:space-x-reverse ">
            <img src="#" alt="Logo UADB" width="300" height="auto">
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

    <aside id="sidebar-multi-level-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 ">
            <ul class="space-y-4 font-medium">
                <li><a href="#">
                 <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /></li>
                 </a>
                <li>
                    <a href="{{ route('bord') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-5 h-5 text-gray-800 transition duration-75 group-hover:text-gray-400 "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Tableau de bord du drh</span>
                    </a>
                </li>
                <li>

                    <a href="{{ route('descriptionprofil') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                       <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
</svg>



                        <span class="ms-3">Voir les descriptions</span>
                    </a>
                </li>

                 <li>

                  <li>
                 <a href="{{ route('appelcandidat') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                   <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
     xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black"
     viewBox="0 0 24 24">
    <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
    <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
</svg>


                        <span class="ms-3">lancement de l'avis </span>
                    </a>
                </li>
                <li>
            <a href="{{ route('fiche') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                   <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" viewBox="0 0 24 24">
                 <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M9 8v3a1 1 0 0 1-1 1H5m11 4h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-7a1 1 0 0 0-1 1v1m4 3v10a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-7.13a1 1 0 0 1 .24-.65L7.7 8.35A1 1 0 0 1 8.46 8H13a1 1 0 0 1 1 1Z"/>
                 </svg>


                        <span class="ms-3">voir le fiche de recrutement</span>
                    </a>
                </li>
                  <li>
                <a href="{{ route('publication') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                      <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16V8a2 2 0 012-2h3.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V16a2 2 0 01-2 2H6a2 2 0 01-2-2z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16v-6a2 2 0 012-2h3.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V16a2 2 0 01-2 2H10a2 2 0 01-2-2z" />
    </svg>
                        <span class="ms-3">Publication de l'avis</span>
                    </a>
                </li>
                                <li>
                    <a href="{{ route('ajoutpresipats') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16V8a2 2 0 012-2h3.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V16a2 2 0 01-2 2H6a2 2 0 01-2-2z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16v-6a2 2 0 012-2h3.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V16a2 2 0 01-2 2H10a2 2 0 01-2-2z" />
                            </svg>
                                <span class="ms-3">Desgnation du commission de recrutement pats</span>
                    </a>
                </li>


                     <li>
                    <a href="{{ route('inter') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
</svg>

                        <span class="ms-3">Gérer les candidatures</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('postes') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
</svg>

                        <span class="ms-3">voir les postes</span>
                    </a>
                </li>


            </ul>


        </div>
    </aside>
    <!-- HTML -->
<div class="p-4 sm:ml-64">
<div class="container mx-auto px-10 mt-10">

        <h1 class="text-6xl font-bold text-center mb-8">Designation des membres du commission de recrutement pour PATS</h1>
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6">
                <form method="POST" action="{{ route('ajoutpresipats') }}">
                     @csrf
          <div class="grid gap-6 mb-6 grid-cols-1 sm:grid-cols-1 md:grid-cols-3">
              <div>
                  <label for="prenom"  class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Prenom</label>
                  <input type="text" name="prenom" id="prenom"  class="bg-white-50 border border-white-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Prenom" required="">
              </div>
             <div>
                  <label for="nom"  class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Nom</label>
                  <input type="text" name="nom" id="nom"  class="bg-white-50 border border-white-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nom" required="">
              </div>
              <div>
                  <label for="phone"  class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Telephone</label>
                  <input type="number" name="phone" id="phone"  class="bg-white-50 border border-white-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Numero de telephone" required="">
              </div>
              <div >
                  <label for="adresse" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Adresse</label>
                  <input type="text" name="adresse" id="adresse"  class="bg-white-50 border border-white-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Son adresse" required="">
              </div>
               <div class="sm:col-span-2">
                  <label for="email" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Adresse email</label>
                  <input type="email" name="email" id="email"  class="bg-white-50 border border-white-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Son adresse email" required="">
              </div>
              <div>
                  <label for="profil" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">profil</label>
                  <select id="profil"  name="profil"  class="bg-white-50 border border-white-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option value="presidentcommissionpats">presidentcomission</option>
                      <option value="membrepats">membre  </option>
                  </select>
              </div>
              <div>
                  <x-input-label class="block mb-2 text-sm font-medium text-black-900 dark:text-black" for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                class="bg-white-50 border border-white-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"                            type="password"
                            name="password"
                            placeholder="Son mot de passe"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>
          <div>
            <x-input-label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation"
            class="bg-white-50 border border-white-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"

                            type="password"
                            name="password_confirmation"
                             placeholder="confirmation du mot de passe"
                           required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />              </div>
          </div>
          <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Ajouter
          </button>
        </div>

                    </form>
            </div>
        </div>

</div>
</body>
</html>
