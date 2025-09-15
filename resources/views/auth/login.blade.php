@section('title', 'Andalas Wheels || Login')
@push('head')
    <title>Login | Andalas Wheels</title>
    <link rel="icon" type="image/png" href="{{ asset('img/andalaswheels.png') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
@endpush
<x-guest-layout>
    <div class="fixed inset-0 min-h-screen w-full flex items-center justify-center bg-gradient-to-tr from-white via-blue-100 to-blue-300">
        <!-- Kiri: background gradient -->
        <div class="w-1/2 flex flex-col items-center justify-center">
            <div class="mb-10"
                data-aos="zoom-in"
                data-aos-duration="1000">
                <img src="{{ asset('img/andalaswheels.png') }}" alt="Logo" class="w-28 h-28" />
            </div>
            <div class="text-3xl font-bold font-[Carena] text-[#21408E] mb-4"
            data-aos="fade-down"
            data-aos-duration="1000">
                AndalasWheels
            </div>
            <div class="text-lg font-bold font-[Sans] text-[#21408E]"
            data-aos="fade-up"
            data-aos-duration="1100">
                Dari Kampus ke Mana Aja, Tinggal Tancap!
            </div>
        </div>
                <!-- Kanan: card login -->
        <div class="w-1/2 flex items-center justify-center min-h-screen">
            <div class="bg-[#21408E] rounded-tl-[200px] rounded-bl-[200px] shadow-lg w-[950px] h-[865px] p-20 relative"
                    data-aos="fade-left"
                    data-aos-duration="1000">
                <div class="absolute top-[140px] left-0 w-full text-3xl font-bold text-white text-start ml-[5rem] font-[Carena] z-10"
                data-aos="fade-down"
                data-aos-duration="1000">
                    Log In
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="pt-32">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-14"
                    data-aos="fade-up"
                    data-aos-duration="1200">
                        <x-input-label for="email" :value="__('Email')" class="mb-2 font-[Carena]" />
                        <x-text-input id="email" class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-14"
                    data-aos="fade-up"
                    data-aos-duration="1300">
                        <x-input-label for="password" :value="__('Password')" class="mb-2 font-[Carena]" />
                        <x-text-input id="password" class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        @if (Route::has('password.request'))
                            <div class="mt-2 text-right">
                                <a class="text-sm text-black font-semibold font-[Poppins] hover:underline" href="{{ route('password.request') }}">
                                    Lupa Password ?
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center mb-10"
                    data-aos="fade-up"
                    data-aos-duration="1400">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 cursor-pointer" name="remember">
                        <label for="remember_me" class="ml-2 text-sm text-black font-semibold font-[Poppins]">Ingat saya</label>
                    </div>

                    <div data-aos="fade-up"
                    data-aos-duration="1500">
                        <x-primary-button class="w-full rounded-full font-[] bg-black text-white py-2 text-lg font-semibold hover:bg-gray-800 transition-all hover:scale-105 justify-center">
                            Login
                        </x-primary-button>
                    </div>
                </form>
                <div class="mt-10 text-center"
                data-aos="fade-up"
                data-aos-duration="1600">
                    <span class="text-sm text-black font-[Poppins]">Tidak punya Akun ?</span>
                    <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:underline font-semibold font-[Poppins]">Daftar disini</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init();
    });
    </script>
</x-guest-layout>
