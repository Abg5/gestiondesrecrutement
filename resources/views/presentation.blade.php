<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenue</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #e0eafc, #cfdef3);
        }

        nav {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        nav a {
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #1D4ED8;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            margin-top: 8px;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .presentation-section {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 32px;
            margin: 24px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .presentation-section h1 {
            color: #1F2937;
            font-weight: 700;
        }

        .presentation-section p {
            color: #4B5563;
        }

        .typewriter {
            font-size: 1.25rem;
            line-height: 1.75rem;
            margin-top: 16px;
            color: #6B7280;
        }
    </style>
</head>

<body class="p-5 bg-gray-50 font-body">

    <nav class="z-40 bg-white border-gray-200 shadow-xl rounded-xl dark:bg-gray-900 dark:border-gray-700">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href="{{ route('welcome') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
            </a>
            <button data-collapse-toggle="navbar-multi-level" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-multi-level" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
                <ul
                    class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ route('welcome') }}"
                            class="block px-3 py-2 text-gray-900 bg-blue-700 rounded md:bg-transparent md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent"
                            aria-current="page">Accueil</a>
                    </li>
                    @guest
                    <li class="dropdown relative">
                        <button id="dropdownNavbarLink"
                            class="flex items-center justify-between w-full px-3 py-2 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            Connexion
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        <div class="dropdown-menu">
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-gray-700 text-md hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Se
                                connecter</a>
                        </div>
                    </li>
                    @endguest
                    @auth
                    <li class="dropdown relative">
                        <button id="dropdownNavbarLink"
                            class="flex items-center justify-between w-full px-3 py-2 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            {{ Auth::user()->name }}
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        <div class="dropdown-menu">
                            <div class="py-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </div>
                        </div>
                    </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    {{-- CODE DE LA PARTIE PRESENTATION --}}

    <div id="sectionCible2">
        <section class="presentation-section">
            <div class="relative z-10 w-full px-4 py-8 mx-auto lg:py-16">
                <h1 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-yellow-800 md:text-5xl lg:text-6xl dark:text-white">
                    Présentation de l'application</h1>

                {{-- ANIMATION DU TEXTE DE LA PRESENTATION --}}
                <div class="flex items-center justify-center w-full h-full">
                    <p id="typewriter" class="typewriter"></p>
                </div>

                <script>
                    const words = [
                        "Bienvenue sur notre plateforme dédiée à la gestion du recrutement des PER (Personnel Enseignant et de Recherche) et des PATS (Personnel Administratif, Technique et de Service) de l'Université Alioune Diop de Bambey. Notre site vous offre une solution complète et efficace pour gérer facilement vos candidatures. Que vous soyez un enseignant, un chercheur, ou un membre du personnel administratif, nous mettons à votre disposition les outils nécessaires pour simplifier et optimiser votre processus de candidature. Grâce à notre interface conviviale, vous pouvez consulter les offres d'emploi disponibles et postuler en quelques clics. Dites adieu aux tracas administratifs et aux pertes de temps ! Où que vous soyez, notre plateforme vous permet de gérer vos candidatures en toute simplicité. Nous sommes déterminés à vous offrir une expérience fluide et sans souci. Notre équipe est à votre disposition pour répondre à vos questions, résoudre vos problèmes et vous accompagner à chaque étape du processus de recrutement. Rejoignez-nous dès aujourd'hui et découvrez comment notre plateforme peut simplifier votre recherche d'emploi et contribuer au développement de l'Université Alioune Diop de Bambey. Avec nous, optimisez votre temps, votre énergie et vos ressources, et concentrez-vous sur ce qui compte vraiment : la réussite de votre carrière et votre contribution à l'excellence de notre université. Bienvenue sur notre site, votre partenaire de confiance pour une gestion efficace du recrutement des PER et PATS !"
                    ];
                    let i = 0;
                    let j = 0;
                    let currentWord = "";
                    let isDeleting = false;

                    function type() {
                        currentWord = words[i];
                        if (isDeleting) {
                            document.getElementById("typewriter").textContent = currentWord.substring(0, j - 1);
                            j--;
                            if (j == 0) {
                                isDeleting = false;
                                i++;
                                if (i == words.length) {
                                    i = 0;
                                }
                            }
                        } else {
                            document.getElementById("typewriter").textContent = currentWord.substring(0, j + 1);
                            j++;
                            // if (j == currentWord.length) {
                            //     isDeleting = true;
                            // }
                        }
                        setTimeout(type, 10);
                    }

                    type();
                </script>
            </div>
        </section>
    </div>
    {{-- FIN CODE DE LA PARTIE PRESENTATION --}}

</body>

</html>
