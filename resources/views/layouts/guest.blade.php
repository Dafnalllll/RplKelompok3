<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        @stack('head')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
        /* Desktop: tampilkan layout asli, sembunyikan card mobile */
        @media (min-width: 769px) {
            .login-mobile-card { display: none !important; }
        }
        /* Mobile: tampilkan card login saja, sembunyikan layout asli */
        @media (max-width: 768px) {
            .fixed.inset-0 { display: none !important; }
            .login-mobile-card { display: flex !important; }
        }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </body>
</html>
