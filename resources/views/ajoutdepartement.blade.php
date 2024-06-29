

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
    </script>
<style>
    .antialiased{
         background-image: url('img/adm.jpg');
         background-size: cover;
         background-repeat: no-repeat;
         background-position: center;
         background-attachment: fixed;

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
    <div class="fixed z-20 text-center top-1/2 left-1/2" id="chargement">
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
        <svg class="z-20 w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
        <img src="assets/images/logo/logoUadb.png" alt="logo">
    </button>

    <aside id="sidebar-multi-level-sidebar"
        class="fixed top-0 left-0 z-20 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 ">
            <ul class="space-y-4 font-medium">
                <li><a href="#">
                 <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /></li>
                 </a>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Tableau de bord</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('liste_comptes') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5.024 3.783A1 1 0 0 1 6 3h12a1 1 0 0 1 .976.783L20.802 12h-4.244a1.99 1.99 0 0 0-1.824 1.205 2.978 2.978 0 0 1-5.468 0A1.991 1.991 0 0 0 7.442 12H3.198l1.826-8.217ZM3 14v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5h-4.43a4.978 4.978 0 0 1-9.14 0H3Zm5-7a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm0 2a1 1 0 0 0 0 2h8a1 1 0 1 0 0-2H8Z"
                                clip-rule="evenodd" />
                        </svg>


                        <span class="ms-3">gerer les comptes </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('ajoutdepartement') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                         <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
</svg>
   <span class="ms-3">Ajouter un compte</span>
                    </a>
                </li>


            </ul>


        </div>
    </aside>
<div class="p-4 sm:ml-64">

    <body>
    <!-- Vue Blade -->
    <div class="container mx-auto px-10 mt-10">

        <h1 class="text-6xl font-bold text-center mb-8">AJOUTER UN UTILISATEUR</h1>
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6">
                <form method="POST" action="{{ route('ajoutdepartement') }}">
                     @csrf
                    <div class=" grid gap-6 mb-6 grid-cols-1 sm:grid-cols-1 md:grid-cols-3">
                             {{-- prenom  --}}
                        <div>
                            <label for="prenom"
                                class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Prenom</label>
                            <input type="text" id="prenom" name="prenom" :value="old('prenom')"
                                class="bg-white-50 border border-white-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <!-- Nom -->
                        <div>
                            <label for="nom"
                                class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Nom</label>
                            <input type="text" id="nom" name="nom" :value="old('nom')"
                                class="bg-white-50 border border-white-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                        <label for="phone"
                                class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Téléphone</label>
                            <input type="tel" id="phone" name="phone" :value="old('phone')"
                                class="bg-white-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />

                        </div>
                        <div>
                            <label for="adresse"
                                class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Adresse</label>
                            <input type="text" id="adresse" name="adresse" :value="old('adresse')"
                                class="bg-white-50 border border-white-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>



                        <div>
                            <label for="profil" name="profil" value="profil"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Profil</label>
                            <select id="profil" name="profil" required
                                class="mt-1 small-input block w-full pl-3 pr-10 py-2 text-base border-white-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="">Sélectionnez un profil</option>
                                <option value="chefdepartement">Chef département</option>
                                <option value="chefdrh">DRH</option>
                                <option value="dgrectorat">Recteur</option>
                                <option value="presidentcomission">Président commission</option>
                                <option value="directionufr">Directeur UFR</option>
                                <option value="vicerecteur">Vice-recteur</option>
                            </select>
                            <span id="profilError" class="hidden text-red-500 text-xl">Veuillez sélectionner un
                                profil.</span>
                        </div>
                        <div>
                            <label for="departement" name="departement" value="departement"
                                class="block mb-2 text-sm font-medium text-black-900 dark:text-black">departement</label>

                            <select id="departement" name="departement"  value="departement"
                                class="mt-1 small-input block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="">Sélectionnez un département</option>
                                <option value="PHYSIQUE">PHYSIQUE</option>
                                <option value="CHIMIE">CHIMIE</option>
                                <option value="MATHEMATIQUE">MATHEMATIQUE</option>
                                <option value="TIC">TIC</option>
                                <option value="MANAGEMENT">MANAGEMENT</option>
                                <option value="MANAGEMENT">Management</option>
                                <option value="SANTE">SANTE</option>
                                <option value="DD">DD</option>
                            </select>
                            <span id="departementError" class="hidden text-red-500 text-xl">Veuillez sélectionner un
                                département</span>
                        </div>

                     <!-- Email Address -->
                        <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Votre
                            adresse E-mail</label>
                        <input type="email" id="email" name="email" :value="old('email')"
                            class="bg-white-50 border border-white-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                    </div>

                    <div>
                            <label for="ufr" name="ufr" value="ufr"
                                class="block mb-2 text-sm font-medium text-black-900 dark:text-black">UFR</label>

                            <select id="ufr" name="ufr"  value="ufr"
                                class="mt-1 small-input block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="">Sélectionnez un ufr</option>
                                <option value="SATIC">SATIC</option>
                                <option value="ECOMIJ">ECOMIJ</option>
                                <option value="SDD">SDD</option>
                            </select>
                            <span id="ufrError" class="hidden text-red-500 text-xl">Veuillez sélectionner un
                                ufr</span>
                        </div>

                  {{-- <div class="flex-col md:gap-4 md:grid-cols-2"> --}}
    <div>
        <label for="password" name="password" value="password" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Mot de passe</label>
        <input type="password" id="password" class="bg-white-50 border border-white-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>
    <div>
        <label for="confirm_password" class="block mb-2 text-sm font-medium text-black-900 dark:text-black">Confirmez votre mot de passe</label>
        <input type="password" id="confirm_password" name="password" class="bg-white-50 border border-white-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>
    <div class="flex items-center justify-center mt-6 col-span-2">
        <button type="submit" class="inline-flex items-center px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Enregistrer
        </button>
    </div>
{{-- </div> --}}

                    </form>
            </div>
        </div>


        <!-- Message d'alerte stylisé -->
        <div id="alertMessage"
            class="hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <p class="text-lg text-red-600 font-semibold mb-4" id="alertText"></p>
                <button onclick="hideAlertMessage()"
                    class="text-gray-600 hover:text-red-600 focus:outline-none">Fermer</button>
            </div>
        </div>

        <!-- Message de confirmation stylisé -->
        <div id="confirmMessage"
            class="hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <p class="text-lg text-green-600 font-semibold mb-4">Vous avez ajouté un utilisateur.</p>
            </div>
        </div>


        <script>
            function validateForm() {
                var nom = document.getElementById("Nom").value;
                var prenom = document.getElementById("prenom").value;
                var adresse = document.getElementById("Adresse").value;
                var phone = document.getElementById("phone").value;
                var profil = document.getElementById("profil").value;
                var departement = document.getElementById("departement").value;
                var email = document.getElementById("email").value;
                var password = document.getElementById("password").value;
                var confirm_password = document.getElementById("confirm_password").value;

                var missingFields = [];

                if (nom === "") {
                    missingFields.push("Nom");
                }
                if (prenom === "") {
                    missingFields.push("Prénom");
                }
                if (adresse === "") {
                    missingFields.push("Adresse");
                }
                if (phone === "") {
                    missingFields.push("Téléphone");
                }
                if (profil === "") {
                    missingFields.push("Profil");
                }
                if (departement === "") {
                    missingFields.push("Département");
                }
                if (email === "") {
                    missingFields.push("Adresse E-mail");
                }
                if (password === "") {
                    missingFields.push("Mot de passe");
                }
                if (confirm_password === "") {
                    missingFields.push("Confirmation du mot de passe");
                }

                if (missingFields.length === 0) {
                    // Afficher un message de confirmation stylisé
                    var confirmMessage = document.getElementById("confirmMessage");
                    confirmMessage.classList.remove("hidden");
                    setTimeout(function() {
                        confirmMessage.classList.add("hidden");
                        // Rediriger vers la page liste_comptes
                        window.location.href = "{{ route('liste_comptes') }}";
                    }, 2000);
                } else {
                    // Afficher un message d'alerte stylisé
                    var alertMessage = document.getElementById("alertMessage");
                    var alertText = document.getElementById("alertText");
                    alertText.innerHTML = "Veuillez remplir tous les champs:<br>" + missingFields.join("<br>");
                    alertMessage.classList.remove("hidden");
                }
            }

            function hideAlertMessage() {
                var alertMessage = document.getElementById("alertMessage");
                alertMessage.classList.add("hidden");

                // Réinitialiser le texte de l'alerte
                var alertText = document.getElementById("alertText");
                alertText.innerHTML = "";
            }

    document.addEventListener("DOMContentLoaded", function() {
        // Récupérer les éléments de profil, UFR et département
        var profil = document.getElementById("profil");
        var ufrField = document.getElementById("ufr");
        var departementField = document.getElementById("departement");

        // Fonction pour afficher ou cacher les champs UFR et département
        function toggleUfrAndDepartementFields() {
            if (profil.value === "chefdepartement") {
                // Si le profil sélectionné est "Chef département", afficher les champs UFR et département
                ufrField.style.display = "block";
                departementField.style.display = "block";
            }
             else if (profil.value === "directionufr") {
                // Si le profil sélectionné est "directeur ufr", afficher les champs UFR et département
                ufrField.style.display = "block";

            }

            else {
                // Sinon, cacher les champs UFR et département
                ufrField.style.display = "none";
                departementField.style.display = "none";
            }
        }

        // Exécuter la fonction au chargement de la page pour gérer l'état initial
        toggleUfrAndDepartementFields();

        // Écouter les changements dans le champ Profil
        profil.addEventListener("change", toggleUfrAndDepartementFields);
    });



</script>



    </body>

</html>
