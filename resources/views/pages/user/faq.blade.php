@section('title', 'Andalas Wheels || FAQ')
@push('head')
    <title>FAQ | Andalas Wheels</title>
    <link rel="icon" type="image/webp" href="{{ asset('img/andalaswheels.webp') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush

<div class="fixed inset-0 -z-10">
    <img src="{{ asset('img/faq.webp') }}"
         alt="Andalas Wheels Motorcycle Background"
         class="w-full h-full object-cover object-center" />
    <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
</div>

<x-app-layout>
    @include('components.navbar')
    <section class="min-h-screen relative overflow-hidden flex items-center">
        {{-- Content --}}
        <div class="relative z-10 w-full">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                {{-- Text Content --}}
                <div class="space-y-8 mb-24">
                    <h1 class="text-4xl lg:text-6xl font-extrabold text-white leading-tight mb-8"
                        data-aos="fade-up"
                        data-aos-duration="1200"
                        data-aos-delay="100">
                        FAQ
                    </h1>
                    <p class="text-xl text-gray-300 leading-relaxed max-w-lg"
                       data-aos="fade-right"
                       data-aos-duration="1000"
                       data-aos-delay="300">
                        Temukan jawaban atas pertanyaan umum seputar layanan rental motor Andalas Wheels.<br>
                        Kami siap membantu mahasiswa mendapatkan transportasi yang aman, mudah, dan terjangkau!
                    </p>
                    <div>
                        <div data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">
                            <button
                                onclick="document.getElementById('faq-table-section').scrollIntoView({ behavior: 'smooth' });"
                                class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-4 px-8 rounded-lg text-lg transition-all duration-300 hover:scale-105 hover:shadow-xl"
                            >
                                Ask Us
                            </button>
                        </div>
                    </div>
                </div>
                {{-- Right Side - Decorative --}}
                <div class="relative" data-aos="fade-left" data-aos-duration="1000">
                    <div class="absolute -top-4 -right-4 w-72 h-72 bg-yellow-400 rounded-full opacity-20 blur-3xl"></div>
                    <div class="absolute -bottom-4 -left-4 w-64 h-64 bg-blue-500 rounded-full opacity-20 blur-3xl"></div>
                </div>
            </div>
        </div>

        {{-- Background decorative elements --}}
        <div class="absolute top-1/4 left-10 w-2 h-2 bg-yellow-400 rounded-full opacity-60 z-20"></div>
        <div class="absolute top-1/3 right-20 w-3 h-3 bg-blue-400 rounded-full opacity-40 z-20"></div>
        <div class="absolute bottom-1/4 left-1/4 w-1 h-1 bg-white rounded-full opacity-80 z-20"></div>
    </section>

    {{-- FAQ Table Section --}}
    <section id="faq-table-section" class="relative z-10 py-20 bg-gradient-to-br from-blue-50 via-white to-blue-100">
        @include('components.table.user.faqtable')
    </section>

    {{-- footer Section --}}
    @include('components.footer')

    @push('scripts')
        <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 1000,
                once: false,
                easing: 'ease-out-cubic'
            });
        </script>
    @endpush
</x-app-layout>
</body>
</html>

