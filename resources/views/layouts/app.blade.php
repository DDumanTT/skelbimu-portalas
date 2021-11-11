<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 shadow flex flex-col">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Page Footer -->
        <footer class="bg-gray-500 h-50 w-full">
            <div class="py-6 px-4 sm:px-6 lg:px-8">
                <p class="block w-auto font-black text-sm text-gray-600 text-center">SKELBIMŲ PORTALAS</p>
                <br>
                <p class="block w-auto font-black text-xs text-gray-600 text-center">Domantas Stakionis</p>
                <p class="block w-auto font-black text-xs text-gray-600 text-center">Kompiuterių tinklai ir internetinės technologijos</p>
                <p class="block w-auto font-black text-xs text-gray-600 text-center">(T120B145)</p>
            </div>
        </footer>
    </div>
</body>

</html>
