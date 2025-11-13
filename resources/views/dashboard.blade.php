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
    <section class="min-h-screen bg-gray-900 relative overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0 ">
            <img src="{{ asset('img/motor.webp') }}"
                 alt="Andalas Wheels Motorcycle Background"
                 class="w-full h-full object-cover object-center" /> {{-- Tambah object-cover --}}
            <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        </div>

        {{-- Content --}}
        <div class="relative z-10 flex items-center min-h-screen">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center"> {{-- px-4 untuk mobile --}}
                {{-- Text Content --}}
                <div class="space-y-6 md:space-y-8 mb-10 text-center lg:text-left"> {{-- text-center di mobile --}}
                    <h1 class="text-3xl sm:text-4xl lg:text-6xl font-extrabold text-white leading-tight"
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-delay="100">
                        Solusi Transportasi Hemat
                        <span class="block">& Mudah Untuk Mahasiswa</span>
                    </h1>

                    <p class="text-base sm:text-xl text-gray-300 leading-relaxed max-w-lg mx-auto lg:mx-0"
                       data-aos="fade-right"
                       data-aos-duration="1000"
                       data-aos-delay="300">
                        Nikmati layanan rental motor cepat, aman, dan terjangkau khusus mahasiswa
                    </p>

                    <div>
                        <div data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">
                            <a href="{{ url('/order') }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-6 sm:py-4 sm:px-8 rounded-lg text-base sm:text-lg transition-all duration-300 hover:scale-105 hover:shadow-xl inline-block">
                                Order Now
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Right Side - Empty or Additional Content --}}
                <div class="relative hidden lg:block" data-aos="fade-left" data-aos-duration="1000"> {{-- Sembunyikan di mobile --}}
                    {{-- Decorative elements --}}
                    <div class="absolute -top-4 -right-4 w-72 h-72 bg-yellow-400 rounded-full opacity-20 blur-3xl"></div>
                    <div class="absolute -bottom-4 -left-4 w-64 h-64 bg-blue-500 rounded-full opacity-20 blur-3xl"></div>
                </div>
            </div>
        </div>

        {{-- Background decorative elements --}}
        <div class="absolute top-1/4 left-10 w-2 h-2 bg-yellow-400 rounded-full opacity-60 z-20 hidden sm:block"></div>
        <div class="absolute top-1/3 right-20 w-3 h-3 bg-blue-400 rounded-full opacity-40 z-20 hidden sm:block"></div>
        <div class="absolute bottom-1/4 left-1/4 w-1 h-1 bg-white rounded-full opacity-80 z-20 hidden sm:block"></div>
    </section>

    {{-- Features Section --}}
    <section class="py-12 sm:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3 md:gap-8">
                {{-- Feature 1 --}}
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <div class="text-center space-y-4 cursor-pointer hover:scale-105 transition-transform duration-300">
                        <div class="flex justify-center">
                            <div class="w-14 h-14 sm:w-16 sm:h-16 bg-blue-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-white text-xl sm:text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900">Sewa hingga 30 Hari</h3>
                        <p class="text-gray-600 text-sm sm:text-base">Berkendara tanpa repot!</p>
                    </div>
                </div>
                {{-- Feature 2 --}}
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <div class="text-center space-y-4 cursor-pointer hover:scale-105 transition-transform duration-300">
                        <div class="flex justify-center">
                            <div class="w-14 h-14 sm:w-16 sm:h-16 bg-blue-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-shield-alt text-white text-xl sm:text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900">Transaksi Aman</h3>
                        <p class="text-gray-600 text-sm sm:text-base">Pembayaran 100% cepat dan aman</p>
                    </div>
                </div>
                {{-- Feature 3 --}}
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                    <div class="text-center space-y-4 cursor-pointer hover:scale-105 transition-transform duration-300">
                        <div class="flex justify-center">
                            <div class="w-14 h-14 sm:w-16 sm:h-16 bg-blue-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-headset text-white text-xl sm:text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900">Dukungan 24/7</h3>
                        <p class="text-gray-600 text-sm sm:text-base">Kebutuhan darurat? kami tersedia 24/7 untukmu</p>
                    </div>
                </div>
            </div>
        </div>
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
