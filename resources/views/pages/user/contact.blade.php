@section('title', 'Andalas Wheels || Contact Us')
@push('head')
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush

<div class="fixed inset-0 -z-10">
    <img src="{{ asset('img/contact.webp') }}"
         alt="Andalas Wheels Motorcycle Background"
         class="w-full h-full object-cover object-center" />
    <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
</div>

<x-app-layout>
    @include('components.user.navbar')

    <section class="min-h-screen relative flex items-center overflow-hidden">
        {{-- Decorative Dot --}}
        <div class="absolute top-24 left-10 w-3 h-3 bg-yellow-400 rounded-full opacity-80 z-10"></div>
        {{-- Content --}}
        <div class="relative z-20 w-full max-w-2xl px-8 py-16 md:py-32 ml-8 md:ml-16"
             data-aos="fade-up"
             data-aos-duration="1200">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-8 mt-4 md:mt-0"
                data-aos="fade-up"
                data-aos-delay="200">
                Contact Us
            </h1>
            <p class="text-xl text-gray-100 mb-10 leading-relaxed"
               data-aos="fade-right"
               data-aos-delay="400">
                Ingin booking motor, konsultasi layanan, atau ada kendala saat menggunakan Andalas Wheels? Silakan hubungi kami—tim kami siap membantu Anda secara langsung dan cepat!
            </p>
            {{-- Wrapper untuk AOS --}}
            <div data-aos="zoom-in" data-aos-delay="600">
                <a href="#ask-section" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg mt-2 transform hover:scale-105 cursor-pointer">
                  Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    {{-- Ask Section --}}
    <section id="ask-section" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8"
        data-aos="fade-up"
        data-aos-duration="1200">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Have Questions?</h2>
            @include('components.user.contactsection.ask')
        </div>
    </section>

    {{-- Map Section --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8"
        data-aos="fade-up"
        data-aos-duration="1200">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Find Us Here</h2>
            @include('components.user.contactsection.map')
        </div>
    </section>

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

                // Smooth scroll untuk tombol Get in Touch
                const btn = document.querySelector('a[href="#ask-section"]');
                if (btn) {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const target = document.getElementById('ask-section');
                        if (target) {
                            target.scrollIntoView({ behavior: 'smooth' });
                        }
                    });
                }
            });
        </script>
    @endpush
</x-app-layout>
