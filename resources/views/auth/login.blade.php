@section('title', 'Andalas Wheels || Login')
@push('head')
    <title>Login | Andalas Wheels</title>
    <link rel="icon" type="image/png" href="{{ asset('img/andalaswheels.png') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
@endpush
<x-guest-layout>
    <div class="fixed inset-0 min-h-screen w-full flex items-center justify-center bg-gradient-to-tr from-white via-blue-100 to-blue-300">
        <div class="bg-white rounded-tl-[100px] rounded-bl-[100px] rounded-br-[40px] rounded-tr-[40px] shadow-lg w-full max-w-md p-8 mx-auto"
            data-aos="fade-up"
            data-aos-duration="1000">
            <h2 class="text-3xl font-bold mb-8 text-center">Log In</h2>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email')" class="mb-2" />
                    <x-text-input id="email" class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-2">
                        <x-input-label for="password" :value="__('Password')" />
                        @if (Route::has('password.request'))
                            <a class="text-sm text-white font-semibold hover:underline" href="{{ route('password.request') }}">
                                Lupa Password ?
                            </a>
                        @endif
                    </div>
                    <x-text-input id="password" class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-6">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 cursor-pointer" name="remember">
                    <label for="remember_me" class="ml-2 text-sm text-black font-semibold">Ingat saya</label>
                </div>

                <div>
                    <x-primary-button class="w-full rounded-full  text-white py-2 text-lg font-semibold hover:bg-gray-800 transition-all hover:scale-105 justify-center">
                        Login
                    </x-primary-button>
                </div>
            </form>
            <div class="mt-4 text-center">
                <span class="text-sm text-black">Tidak punya Akun ?</span>
                <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:underline font-semibold">Daftar disini</a>
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
