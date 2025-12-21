{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\auth\register.blade.php --}}
@section('title', 'Andalas Wheels || Register')
@push('head')
    <title>Register | Andalas Wheels</title>
    <link rel="icon" type="image/png" href="{{ asset('img/andalaswheels.png') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
<x-guest-layout>
    <!-- DESKTOP/TABLET -->
    <div class="hidden md:flex fixed inset-0 min-h-screen w-full items-center justify-center bg-gradient-to-tr from-white via-blue-100 to-blue-300">
        <!-- Kiri: logo dan teks -->
        <div class="w-1/2 flex flex-col items-center justify-center">
            <div class="mb-10" data-aos="zoom-in" data-aos-duration="1000">
                <img src="{{ asset('img/andalaswheels.webp') }}" alt="Logo" class="w-28 h-28" />
            </div>
            <div class="text-3xl font-bold font-[Carena] text-[#21408E] mb-4" data-aos="fade-down" data-aos-duration="1000">
                AndalasWheels
            </div>
            <div class="text-lg font-[Sans] text-[#21408E]" data-aos="fade-up" data-aos-duration="1100">
                Dari Kampus ke Mana Aja, Tinggal Tancap!
            </div>
        </div>
        <!-- Kanan: card register -->
        <div class="w-1/2 flex items-center justify-center min-h-screen mb-14"
            x-data="{ agreed: false }"
            @agreed-terms.window="agreed = true"
        >
            <div class="bg-[#21408E] rounded-tl-[200px] rounded-bl-[200px] shadow-lg w-[950px] h-[865px] p-20 relative"
                data-aos="fade-left"
                data-aos-duration="1000">
                <div class="absolute top-[140px] left-0 w-full text-3xl font-bold text-white text-start ml-[5rem] font-[Carena] z-10"
                data-aos="fade-down"
                data-aos-duration="1000">Register</div>

                <form method="POST" action="{{ route('register') }}" class="pt-[7rem]">
                    @csrf

                    <!-- Name -->
                    <div class="mb-10" data-aos="fade-up" data-aos-duration="1100">
                        <x-input-label for="name_desktop" :value="__('Name')" class="mb-2 font-[Carena]" />
                        <x-text-input id="name_desktop" class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-10" data-aos="fade-up" data-aos-duration="1200">
                        <x-input-label for="email_desktop" :value="__('Email')" class="mb-2 font-[Carena]" />
                        <x-text-input id="email_desktop" class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-10 relative" data-aos="fade-up" data-aos-duration="1300">
                        <x-input-label for="password_desktop" :value="__('Password')" class="mb-2 font-[Carena]" />
                        <x-text-input id="password_desktop"
                            class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2 pr-12"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password" />
                        <button type="button" onclick="togglePassword('password_desktop', 'eyePasswordDesktop')" class="absolute right-4 top-9 group">
                            <span id="eyePasswordDesktop" class="transition-colors duration-200 group-hover:text-blue-500">
                                <!-- Lucide Eye Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M1.5 12s3.5-7 10.5-7 10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="12" cy="12" r="3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </button>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-10 relative" data-aos="fade-up" data-aos-duration="1400">
                        <x-input-label for="password_confirmation_desktop" :value="__('Confirm Password')" class="mb-2 font-[Carena]" />
                        <x-text-input id="password_confirmation_desktop"
                            class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2 pr-12"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password" />
                        <button type="button" onclick="togglePassword('password_confirmation_desktop', 'eyePasswordConfirmationDesktop')" class="absolute right-4 top-9 group">
                            <span id="eyePasswordConfirmationDesktop" class="transition-colors duration-200 group-hover:text-blue-500">
                                <!-- Lucide Eye Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M1.5 12s3.5-7 10.5-7 10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="12" cy="12" r="3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </button>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mb-6 flex items-center gap-2">
                        <div class="relative group">
                            <input
                                type="checkbox"
                                id="agree_terms_desktop"
                                name="agree_terms"
                                class="w-5 h-5 accent-blue-700 cursor-pointer disabled:cursor-not-allowed"
                                :checked="agreed"
                                :disabled="!agreed"
                                required
                            >

                        </div>
                        <label
                            for="agree_terms_desktop"
                            class="text-sm text-white font-semibold flex items-center gap-1 cursor-pointer"
                            :class="!agreed ? 'cursor-not-allowed' : 'cursor-pointer'"
                        >
                            Saya telah membaca dan menyetujui
                            <button
                                type="button"
                                class="text-blue-700 underline font-bold focus:outline-none"
                                x-data
                                @click="$dispatch('open-terms')"
                            >
                                Syarat dan Ketentuan
                            </button>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-6" data-aos="fade-up" data-aos-duration="1500">
                        <x-primary-button
                            class="w-full rounded-full  bg-black text-white py-2 text-lg font-semibold hover:bg-gray-800 transition-all hover:scale-105 justify-center cursor-pointer"
                            x-bind:disabled="!agreed"
                        >
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>

                    <div class="mt-6 text-center"
                        data-aos="fade-up"
                        data-aos-duration="1600">
                        <span class="text-sm text-white font-[Poppins]">Sudah punya akun?</span>
                        <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline font-semibold font-[Poppins]">Login disini</a>
                    </div>
                </form>
                @include('components.form.user.termsaccount')
            </div>
        </div>
    </div>

    {{-- MOBILE --}}
    @include('auth.registermobile')
    @include('components.form.user.termsaccountmobile')

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init();
    });

    function togglePassword(inputId, eyeId) {
        const input = document.getElementById(inputId);
        const eyeSpan = document.getElementById(eyeId);

        if (input.type === "password") {
            input.type = "text";
            eyeSpan.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M17.94 17.94C16.11 19.13 14.13 19.75 12 19.75C5.5 19.75 2 12 2 12C2.72 10.59 3.64 9.32 4.72 8.22M9.53 9.53C9.19 9.89 9 10.41 9 11C9 12.1 9.9 13 11 13C11.59 13 12.11 12.81 12.47 12.47M14.47 14.47C14.81 14.11 15 13.59 15 13C15 11.9 14.1 11 13 11C12.41 11 11.89 11.19 11.53 11.53M19.78 19.78C20.68 18.68 21.28 17.41 22 16C22 16 18.5 8.25 12 8.25C10.13 8.25 8.16 8.87 6.33 10.06" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            `;
        } else {
            input.type = "password";
            eyeSpan.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M1.5 12s3.5-7 10.5-7 10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="12" cy="12" r="3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            `;
        }
    }

    </script>
</x-guest-layout>
