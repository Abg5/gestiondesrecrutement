@extends("direction.directionufr")

@section('content')


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
 <style>

    </style>
     <div class="p-4 sm:ml-64">
        <div class="p-1 rounded-lg ">
            <div class="flex justify-center py-6 rounded-xl">

    <body class="bg-white">

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-black-700 uppercase bg-white-50 dark:bg-gray-700 dark:text-black-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Prenom
                    </th>
                    <th scope="col" class="px-6 py-3">
                        nom
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Telephone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                     <th scope="col" class="px-6 py-3">
                        Adresse
                    </th>
                    <th scope="col" class="px-6 py-3">
                        profil
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="odd:bg-white odd:dark:bg-white-900 even:bg-gray-50 even:dark:bg-white-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                        {{ $user->prenom }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                        {{ $user->nom }}
                    </td>
                     <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                        {{ $user->phone }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->adresse }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                        {{ $user->profil }}
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>


    </body>











            </div>
        </div>
    </div>
    </html>
    @endsection

