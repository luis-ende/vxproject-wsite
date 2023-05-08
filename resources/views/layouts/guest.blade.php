<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>VX Project / Ingeniería estructural para torres de telecomunicación - @yield('page_title')</title>

        <!-- Fonts -->
        @googlefonts
        @googlefonts('montserrat')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-white antialiased">
        <x-page-loader />

        <header>
            @include('layouts.navigation-guest')
            @yield('page_header')
        </header>

        <main>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Page Content -->
                @include('layouts.alert-notification')
                {{ $slot }}
            </div>
        </main>

        <footer>
            @include('layouts.site-footer')
        </footer>

        <script>
            window.addEventListener("load", (event) => {
                document.getElementById('page-loader').style.display = "none";
            });
        </script>
    </body>
</html>
