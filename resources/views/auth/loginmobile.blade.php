{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\auth\loginmobile.blade.php --}}
<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen w-full bg-gradient-to-tr from-white via-blue-100 to-blue-300">
        <div class="bg-[#21408E] rounded-2xl shadow-lg w-full max-w-sm p-6 relative"
            data-aos="fade-up"
            data-aos-duration="1000">
            <div class="w-full flex items-center justify-center gap-3 text-2xl font-bold text-white text-center mb-8 font-[Carena]"
                data-aos="zoom-in"
                data-aos-duration="900">
                <img src="{{ asset('img/andalaswheels.webp') }}" alt="Logo" class="w-12 h-12 " />
                Login
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div class="mb-8"
                    data-aos="fade-right"
                    data-aos-duration="900">
                    <x-input-label for="email" :value="__('Email')" class="mb-2 font-[Carena]" />
                    <x-text-input id="email_mobile" class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password -->
                <div class="mb-8 relative"
                    data-aos="fade-left"
                    data-aos-duration="900">
                    <x-input-label for="password" :value="__('Password')" class="mb-2 font-[Carena]" />
                    <x-text-input id="password_mobile" class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2" type="password" name="password" required autocomplete="current-password" />
                    <button type="button" onclick="togglePassword('password_mobile', 'eyePasswordMobile')" class="absolute right-4 top-9 group">
                        <span id="eyePasswordMobile" class="transition-colors duration-200 group-hover:text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M1.5 12s3.5-7 10.5-7 10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </button>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    @if (Route::has('password.request'))
                        <div class="mt-2 text-right">
                            <a class="text-sm text-white font-semibold font-[Poppins] hover:underline" href="{{ route('password.request') }}">
                                Lupa Password ?
                            </a>
                        </div>
                    @endif
                </div>
                <!-- Remember Me -->
                <div class="flex items-center mb-8"
                    data-aos="fade-right"
                    data-aos-duration="900">
                    <input id="remember_me_mobile" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 cursor-pointer" name="remember">
                    <label for="remember_me_mobile" class="ml-2 text-sm text-white font-semibold font-[Poppins]">Ingat saya</label>
                </div>
                <div data-aos="zoom-in" data-aos-duration="900">
                    <x-primary-button class="block w-full rounded-full bg-black text-white px-4 py-2 text-lg font-semibold hover:bg-gray-800 transition-all hover:scale-105 justify-center">
                        Login
                    </x-primary-button>
                </div>
            </form>
            <div class="mt-8 text-center"
                data-aos="fade-up"
                data-aos-duration="900">
                <span class="text-sm text-white font-[Poppins]">Tidak punya Akun ?</span>
                <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:underline font-semibold font-[Poppins]">Daftar disini</a>
            </div>
        </div>
    </div>
    <script>
    function togglePassword(inputId, eyeId) {
        const input = document.getElementById(inputId);
        const eyeSpan = document.getElementById(eyeId);

        if (input.type === "password") {
            input.type = "text";
            eyeSpan.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M17.94 17.94C16.11 19.13 14.13 19.75 12 19.75C5.5 19.75 2 12 2 12C2.72 10.59 3.64 9.32 4.72 8.22M9.53 9.53C9.19 9.89 9 10.41 9 11C9 12.1 9.9 13 11 13C11.59 13 12.11 12.81 12.47 12.47M14.47 14.47C14.81 14.11 15 13.59 15 13C15 11.9 14.1 11 13 11C12.41 11 11.89 11.19 11.53 11.53M19.78 19.78C20.68 18.68 21.28 17.41 22 16C22 16 18.5 8.25 12 8.25C10.13 8.25 8.16 8.87 6.33 10.06" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <line x1="3" y1="3" x2="21" y2="21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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
