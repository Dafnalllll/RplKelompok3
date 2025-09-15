@section('title', 'Andalas Wheels || Register')
@push('head')
    <title>Register | Andalas Wheels</title>
    <link rel="icon" type="image/png" href="{{ asset('img/andalaswheels.png') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
@endpush
<x-guest-layout>
    <div class="fixed inset-0 min-h-screen w-full flex items-center justify-center bg-gradient-to-tr from-white via-blue-100 to-blue-300">
        <!-- Kiri: logo dan teks -->
        <div class="w-1/2 flex flex-col items-center justify-center">
            <div class="mb-10" data-aos="zoom-in" data-aos-duration="1000">
                <img src="{{ asset('img/andalaswheels.png') }}" alt="Logo" class="w-28 h-28" />
            </div>
            <div class="text-3xl font-bold font-[Carena] text-[#21408E] mb-4" data-aos="fade-down" data-aos-duration="1000">
                AndalasWheels
            </div>
            <div class="text-lg font-[Carena] text-[#21408E]" data-aos="fade-up" data-aos-duration="1100">
                Dari Kampus ke Mana Aja, Tinggal Tancap!
            </div>
        </div>
        <!-- Kanan: card register -->
        <div class="w-1/2 flex items-center justify-center min-h-screen">
            <div class="bg-[#21408E] rounded-tl-[200px] rounded-bl-[200px] shadow-lg w-[950px] h-[865px] p-20 relative"
                data-aos="fade-left"
                data-aos-duration="1000">
                <div class="absolute top-[140px] left-0 w-full text-3xl font-bold text-white text-start ml-[5rem] font-[Carena] z-10">Register</div>
                
                
                <form method="POST" action="{{ route('register') }}" class="pt-[7rem]">
                    @csrf

                    <!-- Name -->
                    <div class="mb-14">
                        <x-input-label for="name" :value="__('Name')" class="mb-2" />
                        <x-text-input id="name" class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-14">
                        <x-input-label for="email" :value="__('Email')" class="mb-2" />
                        <x-text-input id="email" class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-14">
                        <x-input-label for="password" :value="__('Password')" class="mb-2" />
                        <x-text-input id="password" class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-14">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="mb-2" />
                        <x-text-input id="password_confirmation" class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 font-semibold rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Sudah punya akun?') }}
                        </a>
                        <x-primary-button class="ms-4 rounded-full bg-black text-white py-2 text-lg font-semibold hover:bg-gray-800 transition">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
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
