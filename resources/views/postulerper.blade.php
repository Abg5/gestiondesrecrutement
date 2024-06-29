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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

     {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("chargement").style.display = "none";
        });

        function closeAlert() {
            document.getElementById("success-alert").style.display = "none";
        }

        function addDiplome() {
            const diplomeContainer = document.getElementById('diplome-container');
            const diplomeIndex = diplomeContainer.children.length;

            const newDiplome = document.createElement('div');
            newDiplome.classList.add('mb-16');
            newDiplome.innerHTML = `
                <div class="mb-6">
                    <label for="nomdiplome_${diplomeIndex}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du diplôme</label>
                    <select id="nomdiplome_${diplomeIndex}" name="nomdiplome[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="">Sélectionner un diplôme</option>
                        <option value="Doctoratdetat">Doctorat d'état</option>
                        <option value="Doctoratunique">Doctorat Unique</option>
                        <option value="phd">PhD</option>
                        <option value="doctoratcycle3">Doctorat 3ème cycle</option>
                        <option value="masterII">Master II</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="fichediplome_${diplomeIndex}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Attestation</label>
                    <input type="file" name="fichediplome[]" id="fichediplome_${diplomeIndex}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" accept="application/pdf" required>
                </div>
            `;
            diplomeContainer.appendChild(newDiplome);
        }
    </script> --}}
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

    <div class="flex flex-col items-center w-full mt-24 px-2 space-y-8">

        <form id="multiStepForm" action="{{ route('postulerper2') }}" method="POST" enctype="multipart/form-data">
            @csrf
@method('post')

    <input type="hidden" name="postuler_id" value="{{ $idpost }}">

    {{-- <div class="flex flex-col items-center w-full mt-24 px-2 space-y-8">
        <div class="w-full max-w-7xl">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                    <div class="mb-6">
                        <label for="intituler" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">intituler</label>
                        <select id="intituler" name="intituler" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($postuler as $postuler)
                                <option value="{{ $postuler->intituler }}" name="{{ $postuler->intituler }}">{{ $postuler->intituler }}</option>
                            @endforeach
                        </select>
                    </div>

            </div>
        </div> --}}
                 {{-- Enseignement a l'uadb --}}

    <div id="step1" class="form-step hidden">
            <h1 class="text-2xl font-bold mb-4">Enseignement à l'UADB</h1>
                <div class="mb-6">
                    <label for="nombreanneeuadb" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre d'années</label>
                    <input type="number" id="nombreanneeuadb" name="nombreanneeuadb" value="nombreanneeuadb" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre d'années enseigne a l'uadb" >
                </div>
                <div class="mb-6">
                    <label for="attestationuadb" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Attestation</label>
                    <input type="file" name="attestationuadb" id="attestationuadb" value="attestationuadb" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" accept="application/pdf" >
                </div>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="nextStep()">Suivant</button>


    </div>
                        {{-- Experience pedgogique --}}
        <div id="step2" class="form-step hidden">
            <h1 class="text-2xl font-bold mb-4">Experiences Pédagogique</h1>

                <div class="mb-6">
                    <label for="nombreanneepedagogiques" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre d'années</label>
                    <input type="number" id="nombreanneepedagogiques" name="nombreanneepedagogiques" value="nombreanneepedagogiques" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre d'années l'experience pedagogique" >
                </div>
                <div class="mb-6">
                    <label for="attestationpedagogique" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">attestationpedagogique</label>
                    <input type="file" name="attestationpedagogique" id="attestationpedagogique" value="attestationpedagogique" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" accept="application/pdf" >
                </div>
                  <button type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" onclick="prevStep()">Précédent</button>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="nextStep()">Suivant</button>

        </div>
                       {{-- Experience proffessionnel --}}
        <div id="step3" class="form-step hidden">
            <h1 class="text-2xl font-bold mb-4">Expériences Professionnelles</h1>

                <div class="mb-6">
                    <label for="nombreanneeprofessionnel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre d'années</label>
                    <input type="number" id="nombreanneeprofessionnel" name="nombreanneeprofessionnel" value="nombreanneeprofessionnel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre d'années experience professionnel">
                </div>
                <div class="mb-6">
                    <label for="attestationprofessionnel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">attestationprofessionnel</label>
                    <input type="file" name="attestationprofessionnel" id="attestationprofessionnel" value="attestationprofessionnel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" accept="application/pdf">
                </div>
  <button type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" onclick="prevStep()">Précédent</button>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="nextStep()">Suivant</button>
        </div>

                        {{-- Grade --}}
        <div id="step4" class="form-step hidden">
            <h1 class="text-2xl font-bold mb-4">GRADE</h1>

                <div class="mb-16">
                   <label for="typegrade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">grade</label>
                        <select id="typegrade" name="typegrade" value="typegrade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option value="">Selectionner votre grade</option>
                                <option value="professeurtitulaire">Professeur titulaire</option>
                                <option value="Maitredeconference">Maitre de conference</option>
                                <option value="MaitreAssistant">Maitre Assistant</option>
                                <option value="Assistant">Assistant</option>
                                <option value="Debutant">Debutant</option>
                        </select>
                </div>

                <div class="mb-16">
                    <label for="attestationgrade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">attestation</label>
                    <input type="file" name="attestationgrade" id="attestationgrade" value="attestationgrade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" accept="application/pdf">
                </div>
            <button type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" onclick="prevStep()">Précédent</button>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="nextStep()">Suivant</button>
        </div>

                          {{-- adequation --}}
        <div id="step5" class="form-step hidden">
            <h1 class="text-2xl font-bold mb-4">Adequation</h1>

                <div class="mb-16">
                   <label for="degreadequation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adequation</label>
                        <select id="degreadequation" name="degreadequation" name="degreadequation" value="degreadequation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option value="">Selectionner la degre dadequation adequation</option>
                                <option value="enseignement">Enseignement</option>
                                <option value="recherche">Recherche</option>
                                <option value="lesdeux">Enseignement et Recherche</option>
                        </select>
                </div>
                <div class="mb-16">
                    <label for="actederecherche" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Attestation</label>
                    <input type="file" name="actederecherche" id="actederecherche" value="actederecherche" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" accept="application/pdf">
                </div>
          <button type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" onclick="prevStep()">Précédent</button>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="nextStep()">Suivant</button>
         </div>

  {{-- Publications --}}
        <div id="step6" class="form-step hidden">

            <h1 class="text-2xl font-bold mb-4">Publications</h1>

                <div class="mb-6">
                   <label for="typepublication" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">publication</label>
                        <select id="typepublication" name="typepublication" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option value="">Type de publication</option>
                                <option value="abstract">Dans des revues indexes</option>
                                <option value="comitedelecture">Dans des revues avec committes de lecture</option>
                                <option value="conferenceinternational">Conference International</option>
                                <option value="conferencenational">Conference National</option>
                        </select>
                </div>
                <div class="mb-6">
                    <label for="nombrearticleabstract" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre d'articles</label>
                    <input type="number" id="nombrearticleabstract" name="nombrearticleabstract" value="nombrearticleabstract" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre d'articles" >
                </div>
                <div class="mb-3">
                    <label for="actedepublication" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Attestation</label>
                    <input type="file" name="actedepublication" id="actedepublication" value="actedepublication" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" accept="application/pdf" >
                </div>
            <button type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" onclick="prevStep()">Précédent</button>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="nextStep()">Suivant</button>
        </div>


         {{-- diplome --}}

        <!-- Section Diplômes -->
      <div id="step7" class="form-step hidden">
             <h1 class="text-2xl font-bold mb-4">Diplômes</h1>
            <div class="mb-16">
                <label for="nomdiplome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du diplôme</label>
                <select id="nomdiplome" name="nomdiplome" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                <input type="file" name="fichediplome" id="fichediplome" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" accept="application/pdf" >
            </div>
  <button type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" onclick="prevStep()">Précédent</button>
              <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="nextStep()">Suivant</button>

        </div>

      @if (session('success'))
                    <div id="success-alert" class="bg-white-100 border border-white-400 text-black-700 px-8 py-7 rounded relative text-center" role="alert">
                        <strong class="font-bold">Succès!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                        <button class="alert-button" onclick="closeAlert()">OK</button>
                    </div>
                @endif

    {{-- <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Postuler
    </button> --}}
{{-- </form> --}}
<!-- Étape finale: Soumission -->
            <div id="step8" class="form-step hidden">
    <h1 class="text-2xl font-bold mb-4">Résumé et Soumission</h1>
    <p>Vérifiez vos informations avant de soumettre le formulaire.</p>
    <div id="summary"></div>
    <button type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" onclick="prevStep()">Précédent</button>
</div>


  <button type="submit" class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    Postuler
</button>


        </form>
    </div>
<script>
    let currentStep = 1;

    function getDataFromStep(step) {
        let formData = {};
        const inputs = document.querySelectorAll(`#step${step} input[type="number"], #step${step} input[type="file"], #step${step} select`);

        inputs.forEach(input => {
            formData[input.name] = input.value;
        });

        return formData;
    }

    function updateFinalStep() {
        const summaryDiv = document.getElementById('summary');
        const formData = {};

        for (let step = 1; step <= 7; step++) {
            Object.assign(formData, getDataFromStep(step));
        }

        let summaryHtml = '<h1 class="text-2xl font-bold mb-4">Résumé des informations saisies</h1><ul>';
        for (const key in formData) {
            summaryHtml += `<li><strong>${key}:</strong> ${formData[key]}</li>`;
        }
        summaryHtml += '</ul>';

        summaryDiv.innerHTML = summaryHtml;
    }

    function showStep(step) {
        document.querySelectorAll('.form-step').forEach((element, index) => {
            if (index === step - 1) {
                element.classList.remove('hidden');
            } else {
                element.classList.add('hidden');
            }
        });
    }

    function nextStep() {
        if (currentStep < document.querySelectorAll('.form-step').length) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }

    //function submitForm() {
       // Vous pouvez ajouter ici la logique pour soumettre le formulaire via AJAX ou simplement en laissant le formulaire HTML gérer la soumission normale
        // Par exemple:
        //const form = document.querySelector('form');
         //form.submit();
    //}

    // Initial display
    showStep(currentStep);
</script>
</body>
</html>
