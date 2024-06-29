<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
        <style>
            /* .antialiased{
                background-color: beige;
            } */
            .block{
            margin:1% 2%;
            transition: background-color 0.3s;
        }

        .block:hover{
        background-color:#ccd4d4;
        }
        .menu li{
            display:none;
        }
        .img-fluid{
            display: inline;
        }
        /* Style du bouton */
        .btn.back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 50%;
            padding: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn.back-to-top:hover {
            background-color: #0056b3;
        }

        /* Style de l'icône */
        .icon.feather.icon-arrow-up {
            margin-right: 5px;
        }

        /* Style du texte */
        .btn.back-to-top span {
            display: none;
        }

        /* Pour afficher le texte lorsqu'il est survolé */
        .btn.back-to-top:hover span {
            display: inline-block;
        }
        .grade {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
}

.elementskit-infobox {
    flex-basis: calc(33.33% - 20px);
    padding: 20px;
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease; /* Ajout d'une transition pour un effet de survol */
}

.elementskit-infobox:hover {
    transform: translateY(-5px);
}

.elementskit-box-header {
    padding-bottom: 15px;
    border-bottom: 1px solid #e0e0e0;
}

.elementskit-info-box-icon img {
    width: 50px;
    height: auto;
    display: inline;
}

.elementskit-info-box-title {
    margin-top: 20px;
    font-size: 25px;
    font-weight: bold;
    color: #333333;
}

.elementskit-infobox p {
    font-size: 20px;
    color: #666666;
}
</style>
    </head>
    <body class="antialiased">
        <header class="bg-gray-200 rounded-xl m-6 p-4 ">
            <nav class="mx-auto flex max-w-7xl items-center justify-between p-3 lg:px-9" aria-label="Global">
              <div class="flex lg:flex-1">
                <div href="#" class="-m-1.5 p-1.5">
                  <img class="h-12 w-auto" src="img/logo.png" alt="">
                </div>
              </div>
             @guest
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="{{ route('login') }}" class="bg-yellow-800 rounded-xl px-4 py-1 text-lg font-semibold hover:text-gray-300 leading-6 text-white" >Se Connecter</a>&emsp;
                <a href="{{ route('register') }}" class="bg-blue-500 rounded-xl px-4 py-1 text-lg font-semibold hover:text-gray-300 leading-6 text-white">S'inscrire</a>
              </div>
              @endguest
              @auth
              <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                  <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Deconnexion') }}
                    </x-responsive-nav-link>
                </form>
              </div>
              @endauth
            </nav>
          </header>
          <!-- Jumbotron -->
        <div
        class="relative h-[400px] overflow-hidden rounded-lg bg-[url('../../public/img/RECTORA.jpg')] bg-cover bg-no-repeat p-12 text-center text-white mx-6">
        <div
        class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-black/60 bg-fixed">
        <div class="flex h-full items-center justify-center opacity-0.7">
            <div class="text-white font-[1000] text-4xl ">
                <br>
                <br>
                <br>
                CALENDRIER D'ACTIVITE DE RECRUTEMENT<br>
                UNIVERSITE ALIOUNE DIOP DE BAMBEY <br>
                L'EXCELLENCE EST MA CONSTANCE ,<br>L'ETHIQUE MA VERTU
            </div>
        </div>
        </div>
        </div>
<!-- Jumbotron -->
          <div
        class=" grid grid-cols-1 gap-4 block mx-10 border shadow-xl rounded-1g bg-white text-center text-surface shadow-secondary-4 dark:bg-surface-dark dark:text-white">
        <div
            class="border-b-2 bg-gray-200 border-neutral-100 px-6 dark:border-white/10">
            <h1 class="card-title text-3xl">BIENVENUE SUR LA PLATEFORME DE DÉPÔT DES CANDIDATURES</h1>
        </div>
        <div>
            <h2 class=" bg-yellow-800 mx-15 my-30 mb-2 text-3xl font-medium leading-tight text-white">
                APPEL À CANDIDATURES
            </h2>
           </div>
        <div class="grid grid-cols-1 gap-4 p-8 block  mx-6  border shadow-xl rounded-1g bg-white text-center text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
            <p class="mb-4 text-base ">
                <img class="img-fluid " src="https://qet.nyc3.digitaloceanspaces.com/work-icon.svg" alt="" >
                <h3>RECRUTEMENT DE PERSONNEL ENSEIGNANT (PER)</h3>
            </p>
            <a href="{{route('accueil')}}"
            class="inline-block rounded bg-blue-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
            data-twe-ripple-init
            data-twe-ripple-color="light">
            Veuillez cliquer ici pour consulter les postes en compétition
        </a>
        </div>
        <div class="grid grid-cols-1 gap-4 p-8 block  mx-6 border shadow-xl rounded-lg bg-white text-center text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
            <p class="mb-4 text-base ">
                <img class="img-fluid " src="https://qet.nyc3.digitaloceanspaces.com/work-icon.svg" alt="" >
                <h3>RECRUTEMENT DE PERSONNEL ADMINISTRATIF ET DE SERVICE (PATS)</h3>
            </p>
            <a href="#"
            class="inline-block rounded bg-blue-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
            data-twe-ripple-init
            data-twe-ripple-color="light">
            Veuillez cliquer ici pour consulter les postes en compétition
        </a>
        </div>
        </div>
        <div class="grade">

            <div class="elementskit-infobox text-center text-icon-top-align elementor-animation">
                <div class="elementskit-box-header elementor-animation">
                    <div class="elementskit-info-box-icon">
                        <img src="img/grade.png" >
                    </div>
                </div>
                <div class="box-body">
                    <h3 style="color:peru" class="elementskit-info-box-title">1153</h3>
                    <p>INGENIEUR DE CONCEPTION</p>
                </div>
            </div>
            <div class="elementskit-infobox text-center text-icon-top-align elementor-animation">
                <div class="elementskit-box-header elementor-animation">
                    <div class="elementskit-info-box-icon">
                        <img src="img/grade.PNG" >
                    </div>
                </div>
                <div class="box-body">
                    <h3 style="color:peru" class="elementskit-info-box-title">1153</h3>
                    <p>INGENIEUR DE CONCEPTION</p>
                </div>
            </div>
            <div class="elementskit-infobox text-center text-icon-top-align elementor-animation">
                <div class="elementskit-box-header elementor-animation">
                    <div class="elementskit-info-box-icon">
                        <img src="img/grade.PNG" >
                    </div>
                </div>
                <div class="box-body">
                    <h3 style="color:peru"class="elementskit-info-box-title">1153</h3>
                    <p> Enseignant-chercheur en Science de données et Système Décisionnel</p>
                </div>
            </div>
            <div class="elementskit-infobox text-center text-icon-top-align elementor-animation">
                <div class="elementskit-box-header elementor-animation">
                    <div class="elementskit-info-box-icon">
                        <img src="img/grade.PNG" >
                    </div>
                </div>
                <div class="box-body">
                    <h3 style="color:peru"class="elementskit-info-box-title">1153</h3>
                    <p>INGENIEUR DE CONCEPTION</p>
                </div>
            </div>
            <div class="elementskit-infobox text-center text-icon-top-align elementor-animation">
                <div class="elementskit-box-header elementor-animation">
                    <div class="elementskit-info-box-icon">
                        <img src="img/grade.PNG" >
                    </div>
                </div>
                <div class="box-body">
                    <h3 style="color:peru"class="elementskit-info-box-title">1153</h3>
                    <p>INGENIEUR DE CONCEPTION</p>
                </div>
            </div>
            <div class="elementskit-infobox text-center text-icon-top-align elementor-animation">
                <div class="elementskit-box-header elementor-animation">
                    <div class="elementskit-info-box-icon">
                        <img src="img/grade.PNG" >
                    </div>
                </div>
                <div class="box-body">
                    <h3 style="color:peru"class="elementskit-info-box-title">1153</h3>
                    <p>INGENIEUR DE CONCEPTION</p>
                </div>
            </div>

        </div>


        <button class="btn back-to-top" id="back-to-top">
            <i class="icon feather icon-arrow-up"></i>
            <span>Retour en haut</span>
        </button>

        <script>
            // Fonction pour remonter en haut de la page
            function scrollToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth' // Pour une animation fluide lors du défilement
                });
            }

            // Écouteur d'événement pour le clic sur le bouton "Retour en haut"
            document.getElementById('back-to-top').addEventListener('click', scrollToTop);
        </script>

<footer
class="bg-white text-center text-surface/75 dark:bg-neutral-700 dark:text-white/75 lg:text-left my-25">
<div
  class="flex items-center justify-center border-b-2 border-neutral-200 p-6 dark:border-white/10 lg:justify-between">
  <div class="me-12 hidden lg:block">
    <span>Connectez-vous avec nous sur les réseaux sociaux:</span>
  </div>
  <!-- Social network icons container -->
  <div class="flex justify-center">
    <a href="https://www.facebook.com/www.uadb.edu.sn/?_rdc=1&_rdr" class="me-6 [&>svg]:h-4 [&>svg]:w-4">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 320 512">
        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
        <path
          d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
      </svg>
    </a>
    <a href="https://uadb.edu.sn/" class="me-6 [&>svg]:h-4 [&>svg]:w-4">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 488 512">
        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
        <path
          d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
      </svg>
    </a>
    <a href="#!" class="me-6 [&>svg]:h-4 [&>svg]:w-4">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 448 512">
        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
        <path
          d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
      </svg>
      <a href="https://www.youtube.com/channel/UCsvzgLKaYblSpREyVrc6tLA/videos" class="[&>svg]:h-4 [&>svg]:w-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path d="M23.84 7.61c-.24-1.81-.96-3.22-2.09-4.3C19.34 2.1 12 2 12 2S4.65 2.1 3.25 3.31c-1.13 1.08-1.85 2.49-2.09 4.3C1 9.68 1 12 1 12s0 2.32.16 4.39c.24 1.81.96 3.22 2.09 4.3C4.65 21.9 12 22 12 22s7.35-.1 8.75-1.31c1.13-1.08 1.85-2.49 2.09-4.3.15-2.07.15-4.39.15-4.39s0-2.32-.15-4.39zM9.5 15.5V8.94l6.75 3.29-6.75 3.27z" />
        </svg>
    </a>
  </div>
</div>

<!-- Main container div: holds the entire content of the footer, including four sections (TW Elements, Products, Useful links, and Contact), with responsive styling and appropriate padding/margins. -->
<div class="mx-6 py-10 text-center md:text-left">
  <div class="grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
    <!-- TW Elements section -->
    <div class="">
      <h6
        class="mb-4 flex items-center justify-center font-semibold uppercase md:justify-start">
        <span class="me-3 [&>svg]:h-4 [&>svg]:w-4">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor">
            <path
              d="M12.378 1.602a.75.75 0 00-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03zM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 00.372-.648V7.93zM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 00.372.648l8.628 5.033z" />
          </svg>
        </span>
        UADB
      </h6>
      <p>
        Votre source de recrutement en ligne
      </p>
    </div>
    <!-- Products section -->
    <div>
      <h6
        class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
        Produits
      </h6>
      <p class="mb-4">
        <a href="#!">Laravel</a>
      </p>
      <p class="mb-4">
        <a href="#!">nodejs</a>
      </p>
      <p class="mb-4">
        <a href="#!"></a>
      </p>
      <p>
        <a href="#!">html, css, js</a>
      </p>
    </div>
    <div>
      <h6
        class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
        Liens utiles
      </h6>
      <p class="mb-4">
        <a href="#!">Accueil</a>
      </p>
      <p class="mb-4">
        <a href="#!">offres d'emploi</a>
      </p>
      <p class="mb-4">
        <a href="#!">A Propos</a>
      </p>
      <p>
        <a href="#!">Contact</a>
      </p>
    </div>
    <!-- Contact section -->
    <div>
      <h6
        class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
        Contact
      </h6>
      <p class="mb-4 flex items-center justify-center md:justify-start">
        <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor">
            <path
              d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
            <path
              d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
          </svg>
        </span>
        Dakar, villa N° 03, sénégal
      </p>
      <p class="mb-4 flex items-center justify-center md:justify-start">
        <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor">
            <path
              d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
            <path
              d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
          </svg>
        </span>
         drh@uadb.edu.sn
      </p>
      <p class="mb-4 flex items-center justify-center md:justify-start">
        <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor">
            <path
              fill-rule="evenodd"
              d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
              clip-rule="evenodd" />
          </svg>
        </span>
        33 973 34 27
      </p>
      <p class="flex items-center justify-center md:justify-start">
        <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor">
            <path
              fill-rule="evenodd"
              d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 003 3h.27l-.155 1.705A1.875 1.875 0 007.232 22.5h9.536a1.875 1.875 0 001.867-2.045l-.155-1.705h.27a3 3 0 003-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0018 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM16.5 6.205v-2.83A.375.375 0 0016.125 3h-8.25a.375.375 0 00-.375.375v2.83a49.353 49.353 0 019 0zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 01-.374.409H7.232a.375.375 0 01-.374-.409l.526-5.784a.373.373 0 01.333-.337 41.741 41.741 0 018.566 0zm.967-3.97a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H18a.75.75 0 01-.75-.75V10.5zM15 9.75a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V10.5a.75.75 0 00-.75-.75H15z"
              clip-rule="evenodd" />
          </svg>
        </span>
        33 860 64 67
      </p>
    </div>
  </div>
</div>
<div class="bg-gray-300 p-6 text-center">
  <span>© 2023 Copyright:</span>
  <a class="font-semibold" href="https://tw-elements.com/"
    >UADB</a
  >
</div>
</footer>
    </body>
 </html>

