<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenue</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                            class="block px-3 py-2 text-white bg-blue-700 rounded md:bg-transparent md:text-gray-900 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent"
                            aria-current="page">Accueil</a>
                    </li>
                    <li>
                        <a href="{{ route('presentation') }}"
                            class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            Présentation
                        </a>
                    </li>

                    @guest
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full px-3 py-2 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            Connexion
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path stroke="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-gray-700 text-md hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Se connecter
                            </a>
                        </div>
                    </li>
                    @endguest

                    @auth
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full px-3 py-2 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            {{ Auth::user()->name }}
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path stroke="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="py-1">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
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

    <!-- Container for demo purpose -->
    <div class="container mx-auto my-8 md:px-6" id="sectionCible">
        <!-- Section: Design Block -->
        <section class="mb-8">
            <div class="relative h-[300px] overflow-hidden bg-cover bg-[50%] bg-no-repeat bg-[url('../../public/assets/images/others/campus.png')]">
            </div>
            <div class="container px-6 md:px-12">
                <div
                    class="block rounded-lg bg-[hsla(0,0%,100%,0.8)] px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-[hsla(0,0%,5%,0.7)] dark:shadow-black/20 md:py-16 md:px-12 -mt-[100px] backdrop-blur-[30px]">
                    <div>
                        <h2
                            class="p-3 mb-12 text-4xl font-bold text-center text-white uppercase bg-gray-400 shadow-xl rounded-xl">
                            Contacter nous !</h2>
                    </div>
                    <div class="flex flex-wrap">
                        <div class="w-full mb-12 shrink-0 grow-0 basis-auto md:px-3 lg:mb-0 lg:w-5/12 lg:px-6">
                            <form method="POST" action="#">
                                @csrf
                                <div class="relative mb-6" data-te-input-wrapper-init>
                                    <input type="text" name="name" placeholder="Nom complet"
                                        class="w-full px-4 py-2 bg-gray-200 rounded">
                                </div>
                                <div class="relative mb-6" data-te-input-wrapper-init>
                                    <input type="email" name="email" placeholder="Adresse mail"
                                        class="w-full px-4 py-2 bg-gray-200 rounded">
                                </div>
                                <div class="relative mb-6" data-te-input-wrapper-init>
                                    <input type="text" name="phone" placeholder="Numéro de téléphone"
                                        class="w-full px-4 py-2 bg-gray-200 rounded">
                                </div>
                                <div class="relative mb-6" data-te-input-wrapper-init>
                                    <textarea name="message" rows="5" placeholder="Message"
                                        class="w-full px-4 py-2 bg-gray-200 rounded"></textarea>
                                </div>
                                <button type="submit"
                                    class="inline-block w-full px-7 py-3 text-sm font-medium leading-snug text-white uppercase transition duration-150 ease-in-out bg-gray-400 shadow-md rounded-xl hover:bg-gray-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg">
                                    Envoyer
                                </button>
                            </form>
                        </div>
                        <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
                            <div class="flex flex-wrap">
                                <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:px-3 lg:w-6/12 lg:px-6">
                                    <div class="flex items-start">
                                        <div class="shrink-0">
                                            <div
                                                class="inline-block p-4 text-white rounded-md shadow-md bg-primary-100">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                    class="w-5 h-5" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19 3h-1V1c0-.6-.4-1-1-1H7c-.6 0-1 .4-1 1v2H5C3.3 3 2 4.3 2 6v14c0 1.7 1.3 3 3 3h14c1.7 0 3-1.3 3-3V6c0-1.7-1.3-3-3-3zm-7 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8zm0-14c-3.3 0-6 2.7-6 6s2.7 6 6 6 6-2.7 6-6-2.7-6-6-6zm0 10c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm7-10h-2v-2h2v2z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-6 grow">
                                            <p class="mb-2 font-bold dark:text-white">Campus</p>
                                            <p class="text-neutral-500 dark:text-neutral-200">Bureau des admissions
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:px-3 lg:w-6/12 lg:px-6">
                                    <div class="flex items-start">
                                        <div class="shrink-0">
                                            <div
                                                class="inline-block p-4 text-white rounded-md shadow-md bg-primary-100">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                    class="w-5 h-5" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19 3h-1V1c0-.6-.4-1-1-1H7c-.6 0-1 .4-1 1v2H5C3.3 3 2 4.3 2 6v14c0 1.7 1.3 3 3 3h14c1.7 0 3-1.3 3-3V6c0-1.7-1.3-3-3-3zm-7 18c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8zm0-14c-3.3 0-6 2.7-6 6s2.7 6 6 6 6-2.7 6-6-2.7-6-6-6zm0 10c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm7-10h-2v-2h2v2z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-6 grow">
                                            <p class="mb-2 font-bold dark:text-white">Adresse</p>
                                            <p class="text-neutral-500 dark:text-neutral-200">Route de kinshasa n°22,
                                                Lubumbashi</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full shrink-0 grow-0 basis-auto md:px-3 lg:w-6/12 lg:px-6">
                                    <div class="flex align-start">
                                        <div class="shrink-0">
                                            <div
                                                class="inline-block p-4 text-white rounded-md shadow-md bg-primary-100">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                    class="w-5 h-5" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M21 10h-3V8c0-4.4-3.6-8-8-8S2 3.6 2 8v2H-1c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h22c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2zM4 8c0-3.3 2.7-6 6-6s6 2.7 6 6v2H4V8zm14 12H-1v-6h22v6zM5 18c0-.6.4-1 1-1s1 .4 1 1-.4 1-1 1-1-.4-1-1zm5 0c0-.6.4-1 1-1s1 .4 1 1-.4 1-1 1-1-.4-1-1zm5 0c0-.6.4-1 1-1s1 .4 1 1-.4 1-1 1-1-.4-1-1z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-6 grow">
                                            <p class="mb-2 font-bold dark:text-white">Email</p>
                                            <p class="text-neutral-500 dark:text-neutral-200">
                                                mail: admicom@univ.kivu</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:px-3 lg:w-6/12 lg:px-6">
                                    <div class="flex align-start">
                                        <div class="shrink-0">
                                            <div
                                                class="inline-block p-4 text-white rounded-md shadow-md bg-primary-100">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                    class="w-5 h-5" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M12 0C6.477 0 2 4.477 2 10s4.477 10 10 10 10-4.477 10-10S17.523 0 12 0zm0 2c4.411 0 8 3.589 8 8 0 2.362-1.036 4.471-2.691 5.957l-1.318-1.519A6.944 6.944 0 0019 10c0-3.86-3.14-7-7-7S5 6.14 5 10a6.944 6.944 0 001.009 3.438l-1.318 1.519A7.944 7.944 0 014 10c0-4.411 3.589-8 8-8zm0 10.7c-1.493 0-2.7-1.207-2.7-2.7S10.507 7.3 12 7.3s2.7 1.207 2.7 2.7-1.207 2.7-2.7 2.7zm0-8.7c-3.314 0-6 2.686-6 6 0 1.633.66 3.117 1.833 4.272l-1.318 1.519A7.944 7.944 0 014 10c0-4.411 3.589-8 8-8s8 3.589 8 8c0 2.165-.871 4.146-2.28 5.611l-1.318-1.519C17.34 13.118 18 11.634 18 10c0-3.314-2.686-6-6-6zM9 10.7c0-.994.806-1.8 1.8-1.8S12.6 9.706 12.6 10.7c0 .994-.806 1.8-1.8 1.8S9 11.694 9 10.7z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-6 grow">
                                            <p class="mb-2 font-bold dark:text-white">Téléphone</p>
                                            <p class="text-neutral-500 dark:text-neutral-200">+243 818 585 858</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>


    <!-- pied de page -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto">
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/3 lg:w-1/4 mb-8 md:mb-0">
                    <h3 class="font-semibold text-xl mb-4">Université de Kivu</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                </div>
                <div class="w-full md:w-1/3 lg:w-1/4 mb-8 md:mb-0">
                    <h4 class="font-semibold text-lg mb-4">Liens rapides</h4>
                    <ul>
                        <li><a href="#" class="hover:text-gray-400">Accueil</a></li>
                        <li><a href="#" class="hover:text-gray-400">À propos</a></li>
                        <li><a href="#" class="hover:text-gray-400">Admissions</a></li>
                        <li><a href="#" class="hover:text-gray-400">Programmes</a></li>
                        <li><a href="#" class="hover:text-gray-400">Contact</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/3 lg:w-1/4 mb-8 md:mb-0">
                    <h4 class="font-semibold text-lg mb-4">Contact</h4>
                    <p>Route de Kinshasa, Lubumbashi</p>
                    <p>Email: info@univkivu.ac.cd</p>
                    <p>Téléphone: +243 123 456 789</p>
                </div>
                <div class="w-full md:w-1/3 lg:w-1/4">
                    <h4 class="font-semibold text-lg mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
