{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\pages\user\about.blade.php --}}
@section('title', 'Andalas Wheels || About Us')
@push('head')
    <link rel="icon" type="image/png" href="{{ asset('img/andalaswheels.png') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush
<x-app-layout>
    @include('components.navbar')
    <section class="min-h-screen relative flex items-center bg-gray-900 overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('img/about.webp') }}"
                 alt="Andalas Wheels Background"
                 class="w-full h-full object-cover object-center" />
            <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        </div>
        {{-- Decorative Dot --}}
        <div class="absolute top-24 left-10 w-3 h-3 bg-yellow-400 rounded-full opacity-80 z-10"></div>
        {{-- Content --}}
        <div class="relative z-20 w-full max-w-2xl px-8 py-16 md:py-32 ml-8 md:ml-16"
             data-aos="fade-up"
             data-aos-duration="1200">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-8 mt-4 md:mt-0"
                data-aos="fade-up"
                data-aos-delay="200">
                About Us
            </h1>
            <p class="text-xl text-gray-100 mb-10 leading-relaxed"
               data-aos="fade-right"
               data-aos-delay="400">
                Andalas Wheels adalah solusi rental motor hemat dan mudah untuk mahasiswa. Mobilitas kampus jadi lebih praktis dan terjangkau!
            </p>
            {{-- Wrapper untuk AOS --}}
            <div data-aos="zoom-in" data-aos-delay="600">
                <a href="#about-section" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg mt-2 transform hover:scale-105 cursor-pointer">
                    Find More
                </a>
            </div>
        </div>
    </section>

    {{-- About Section Description --}}
    <div id="about-section">
            @include('components.aboutsection.desc')
    </div>

   {{-- Our Team Section --}}
   <div id="ourteam-section">
       @include('components.aboutsection.ourteam')
   </div>

    {{-- Footer --}}
    @include('components.footer')

    @push('scripts')
        <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                AOS.init({
                duration: 1000,
                once: false,
                easing: 'ease-out-cubic'
            });

                // Smooth scroll for Get To Know Us button
                const btn = document.querySelector('a[href="#about-section"]');
                if (btn) {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const target = document.getElementById('about-section');
                        if (target) {
                            target.scrollIntoView({ behavior: 'smooth' });
                        }
                    });
                }
            });
        </script>
    @endpush
</x-app-layout>
