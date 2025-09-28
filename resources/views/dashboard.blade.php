@section('title', 'Andalas Wheels || Home')
@push('head')
    <title>Home | Andalas Wheels</title>
    <link rel="icon" type="image/png" href="{{ asset('img/andalaswheels.png') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush

<x-app-layout>
    {{-- Import Navbar --}}
    @include('components.navbar')

    {{-- Hero Section --}}
    <section class="min-h-screen bg-gradient-to-br from-gray-600 to-gray-800 flex items-center relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- Text Content --}}
            <div class="space-y-8" data-aos="fade-right" data-aos-duration="1000">
                <h1 class="text-4xl lg:text-6xl font-extrabold text-white leading-tight">
                    Solusi Transportasi Hemat
                    <span class="block">& Mudah Untuk Mahasiswa</span>
                </h1>

                <p class="text-xl text-gray-300 leading-relaxed max-w-lg">
                    Nikmati layanan rental motor cepat, aman, dan terjangkau khusus mahasiswa
                </p>

                <div>
                    <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-4 px-8 rounded-lg text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        Order
                    </button>
                </div>
            </div>

            {{-- Motorcycle Image --}}
            <div class="relative" data-aos="fade-left" data-aos-duration="1000">
                <div class="relative z-10">
                    <img src="{{ asset('img/motor.png') }}"
                         alt="Andalas Wheels Motorcycle"
                         class="w-full h-auto rounded-2xl shadow-2xl">
                </div>

                {{-- Decorative elements --}}
                <div class="absolute -top-4 -right-4 w-72 h-72 bg-yellow-400 rounded-full opacity-20 blur-3xl"></div>
                <div class="absolute -bottom-4 -left-4 w-64 h-64 bg-blue-500 rounded-full opacity-20 blur-3xl"></div>
            </div>
        </div>

        {{-- Background decorative elements --}}
        <div class="absolute top-1/4 left-10 w-2 h-2 bg-yellow-400 rounded-full opacity-60"></div>
        <div class="absolute top-1/3 right-20 w-3 h-3 bg-blue-400 rounded-full opacity-40"></div>
        <div class="absolute bottom-1/4 left-1/4 w-1 h-1 bg-white rounded-full opacity-80"></div>
    </section>

    @push('scripts')
        <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 1000,
                once: true,
                easing: 'ease-out-cubic'
            });
        </script>
    @endpush
</x-app-layout>
