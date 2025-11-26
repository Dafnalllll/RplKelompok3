@section('title', 'Andalas Wheels || How To Payment')
@push('head')
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush

<div class="fixed inset-0 -z-10">
    <img src="{{ asset('img/howtopayment.webp') }}"
         alt="Andalas Wheels Motorcycle Background"
         class="w-full h-full object-cover object-center" />
    <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
</div>

<x-app-layout>
    @include('components.user.navbar')

    <section class="min-h-screen relative flex items-center  overflow-hidden">
        {{-- Decorative Dot --}}
        <div class="absolute top-24 left-10 w-3 h-3 bg-yellow-400 rounded-full opacity-80 z-10"></div>
        {{-- Content --}}
        <div class="relative z-20 w-full max-w-2xl px-8 py-16 md:py-32 ml-8 md:ml-16"
             data-aos="fade-up"
             data-aos-duration="1200">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-8 mt-4 md:mt-0"
                data-aos="fade-up"
                data-aos-delay="200">
                How To Payment
            </h1>
            <p class="text-xl text-gray-100 mb-10 leading-relaxed"
               data-aos="fade-right"
               data-aos-delay="400">
                Berikut adalah langkah-langkah untuk melakukan pembayaran sewa motor di Andalas Wheels. Ikuti petunjuk ini agar transaksi kamu berjalan lancar dan tanpa kendala.
            </p>
            {{-- Wrapper untuk AOS --}}
            <div data-aos="zoom-in" data-aos-delay="600">
                <a href="#tutorial-section" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg mt-2 transform hover:scale-105 cursor-pointer">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    {{-- Tutorial--}}
    @include("components.user.howtopaymentsection.tutorial")

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

                // Smooth scroll for Learn More
                document.querySelectorAll('a[href^="#tutorial-section"]').forEach(anchor => {
                    anchor.addEventListener('click', function(e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            target.scrollIntoView({ behavior: 'smooth' });
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
