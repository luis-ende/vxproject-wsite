<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-site-verification" content="6QsnGBcAK6LsMQClZfUH-hjvgSsH-dUqvCOx8YvDywc">

        <title>Ingeniería estructural para torres de telecomunicación VX Project - @yield('page_title')</title>
        <link rel="shortcut icon" href="{{ asset('images/VXCIRCULO.png') }}">

        <!-- Fonts -->
        @googlefonts
        @googlefonts('montserrat')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {!! SEO::generate(true) !!}
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
                document.getElementsByTagName('body')[0].classList.add('complete');
                document.getElementById('page-loader').style.display = "none";
            });
        </script>
    </body>
</html>
