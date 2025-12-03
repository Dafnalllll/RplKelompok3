<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Favicon -->
        <link rel="icon" type="image/webp" href="{{ asset('img/andalaswheels.webp') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Titan+One&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('head')
    </head>
    <body class="font-sans antialiased">
        {{-- Notifikasi akun nonaktif --}}
        @include('components.notif.notifaccount')

        {{ $slot ?? '' }}

        @include('components.loading.loading')

        <script>
            window.skipLoading = false;
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.quick-scroll-link').forEach(link => {
                    link.addEventListener('click', function(e) {
                        // Bandingkan path tanpa trailing slash
                        const current = window.location.pathname.replace(/\/$/, '');
                        const target = new URL(this.href).pathname.replace(/\/$/, '');
                        if (current === target) {
                            e.preventDefault();
                            window.skipLoading = true;
                            // Pastikan overlay loading disembunyikan jika ada
                            const loading = document.querySelector('.loading-overlay');
                            if (loading) loading.style.display = 'none';
                            // Scroll ke atas dengan smooth (paling kompatibel)
                            setTimeout(function() {
                                window.scrollTo({top:0,behavior:'smooth'});
                            }, 10);
                        }
                    });
                });
            });
            window.addEventListener('beforeunload', function (e) {
                if (window.skipLoading) {
                    window.skipLoading = false;
                    return;
                }
                const loading = document.querySelector('.loading-overlay');
                if (loading) loading.style.display = 'flex';
            });
        </script>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('userDetail', {
                    open: false,
                    user: {},
                    show(user) {
                        this.user = user;
                        this.open = true;
                    },
                    close() {
                        this.open = false;
                        this.user = {};
                    }
                });
            });
        </script>

        @stack('scripts')
    </body>
</html>

