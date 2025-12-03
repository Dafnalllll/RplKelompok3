{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\auth\register.blade.php --}}
@section('title', 'Andalas Wheels || Register')
@push('head')
    <title>Register | Andalas Wheels</title>
    <link rel="icon" type="image/png" href="{{ asset('img/andalaswheels.png') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush
<x-guest-layout>
    <!-- DESKTOP/TABLET: Layout asli -->
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
        <div class="w-1/2 flex items-center justify-center min-h-screen">
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
                        <x-input-label for="name" :value="__('Name')" class="mb-2 font-[Carena]" />
                        <x-text-input id="name" class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-10" data-aos="fade-up" data-aos-duration="1200">
                        <x-input-label for="email" :value="__('Email')" class="mb-2 font-[Carena]" />
                        <x-text-input id="email" class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-10 relative" data-aos="fade-up" data-aos-duration="1300">
                        <x-input-label for="password" :value="__('Password')" class="mb-2 font-[Carena]" />
                        <x-text-input id="password"
                            class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2 pr-12"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password" />
                        <button type="button" onclick="togglePassword('password', 'eyePassword')" class="absolute right-4 top-9 group">
                            <span id="eyePassword" class="transition-colors duration-200 group-hover:text-blue-500">
                                <!-- Lucide Eye Icon (default) -->
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
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="mb-2 font-[Carena]" />
                        <x-text-input id="password_confirmation"
                            class="block w-full rounded-full bg-gray-200 border-none focus:ring-2 focus:ring-blue-400 px-4 py-2 pr-12"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password" />
                        <button type="button" onclick="togglePassword('password_confirmation', 'eyePasswordConfirmation')" class="absolute right-4 top-9 group">
                            <span id="eyePasswordConfirmation" class="transition-colors duration-200 group-hover:text-blue-500">
                                <!-- Lucide Eye Icon (default) -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M1.5 12s3.5-7 10.5-7 10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="12" cy="12" r="3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </button>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-6" data-aos="fade-up" data-aos-duration="1500">
                        <x-primary-button class="w-full rounded-full font-[] bg-black text-white py-2 text-lg font-semibold hover:bg-gray-800 transition-all hover:scale-105 justify-center">
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
            </div>
        </div>
    </div>

    <!-- MOBILE ONLY: Card Register Saja -->
    <div class="flex md:hidden items-center justify-center min-h-screen w-full bg-gradient-to-tr from-white via-blue-100 to-blue-300">
        <div class="bg-[#21408E] rounded-2xl shadow-lg w-full max-w-xs p-6 relative"
            data-aos="fade-up"
            data-aos-duration="1000">
            <div class="w-full flex items-center justify-center gap-3 text-2xl font-bold text-white text-center mb-8 font-[Carena]"
                data-aos="zoom-in"
                data-aos-duration="900">
                <img src="{{ asset('img/andalaswheels.webp') }}" alt="Logo" class="w-12 h-12 " />
                Register
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div class="mb-6"
                    data-aos="fade-right"
                    data-aos-duration="900">
                    <x-input-label for="name" :value="__('Name')" class="mb-2 font-[Carena] text-white" />
                    <x-text-input id="name" class="block w-full rounded-full bg-blue-50 border border-blue-200 focus:ring-2 focus:ring-blue-400 px-4 py-2 text-[#21408E]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!-- Email Address -->
                <div class="mb-6"
                    data-aos="fade-left"
                    data-aos-duration="900">
                    <x-input-label for="email" :value="__('Email')" class="mb-2 font-[Carena] text-white" />
                    <x-text-input id="email" class="block w-full rounded-full bg-blue-50 border border-blue-200 focus:ring-2 focus:ring-blue-400 px-4 py-2 text-[#21408E]" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password -->
                <div class="mb-6 relative"
                    data-aos="fade-right"
                    data-aos-duration="900">
                    <x-input-label for="password_mobile" :value="__('Password')" class="mb-2 font-[Carena] text-white" />
                    <x-text-input id="password_mobile" class="block w-full rounded-full bg-blue-50 border border-blue-200 focus:ring-2 focus:ring-blue-400 px-4 py-2 text-[#21408E]" type="password" name="password" required autocomplete="new-password" />
                    <button type="button" onclick="togglePassword('password_mobile', 'eyePasswordMobile')" class="absolute right-4 top-9 group">
                        <span id="eyePasswordMobile" class="transition-colors duration-200 group-hover:text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M1.5 12s3.5-7 10.5-7 10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </button>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Confirm Password -->
                <div class="mb-6 relative"
                    data-aos="fade-left"
                    data-aos-duration="900">
                    <x-input-label for="password_confirmation_mobile" :value="__('Confirm Password')" class="mb-2 font-[Carena] text-white" />
                    <x-text-input id="password_confirmation_mobile" class="block w-full rounded-full bg-blue-50 border border-blue-200 focus:ring-2 focus:ring-blue-400 px-4 py-2 text-[#21408E]" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <button type="button" onclick="togglePassword('password_confirmation_mobile', 'eyePasswordConfirmationMobile')" class="absolute right-4 top-9 group">
                        <span id="eyePasswordConfirmationMobile" class="transition-colors duration-200 group-hover:text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M1.5 12s3.5-7 10.5-7 10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </button>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div data-aos="zoom-in" data-aos-duration="900">
                    <x-primary-button class="block w-full rounded-full bg-white text-[#21408E] px-4 py-2 text-base font-bold hover:bg-blue-100 transition-all hover:scale-105 justify-center shadow">
                        Register
                    </x-primary-button>
                </div>
            </form>
            <div class="mt-6 text-center" data-aos="fade-up" data-aos-duration="900">
                <span class="text-xs text-white font-[Poppins]">Sudah punya akun?</span>
                <a href="{{ route('login') }}" class="text-xs text-blue-200 hover:underline font-semibold font-[Poppins] ml-1">Login disini</a>
            </div>
        </div>
    </div>
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
            // Lucide Eye Off Icon
            eyeSpan.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M17.94 17.94C16.11 19.13 14.13 19.75 12 19.75C5.5 19.75 2 12 2 12C2.72 10.59 3.64 9.32 4.72 8.22M9.53 9.53C9.19 9.89 9 10.41 9 11C9 12.1 9.9 13 11 13C11.59 13 12.11 12.81 12.47 12.47M14.47 14.47C14.81 14.11 15 13.59 15 13C15 11.9 14.1 11 13 11C12.41 11 11.89 11.19 11.53 11.53M19.78 19.78C20.68 18.68 21.28 17.41 22 16C22 16 18.5 8.25 12 8.25C10.13 8.25 8.16 8.87 6.33 10.06" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <line x1="3" y1="3" x2="21" y2="21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            `;
        } else {
            input.type = "password";
            // Lucide Eye Icon
            eyeSpan.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M1.5 12s3.5-7 10.5-7 10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="12" cy="12" r="3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            `;
        }
    }

    @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '<span style="color:#21408E;font-weight:bold;">Berhasil!</span>',
                    html: `<div style="font-size:1.1rem;color:#333;">
                            {{ session('status') }}
                        </div>`,
                    background: 'linear-gradient(135deg, #e0e7ff 0%, #fffbe6 100%)',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    iconHtml: `
                        <div style="display:flex;align-items:center;justify-content:center;">
                            <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="#21408E" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" fill="#21408E"/>
                                <path d="M9 12l2 2l4 -4" stroke="#FFD600" stroke-width="2.5" fill="none"/>
                            </svg>
                        </div>
                    `,
                    customClass: {
                        popup: 'shadow-xl rounded-2xl px-6 py-8',
                        icon: 'no-border',
                        title: 'text-2xl font-extrabold',
                        htmlContainer: 'mt-2 mb-2'
                    },
                    didOpen: () => {
                        const popup = Swal.getPopup();
                        if (popup) {
                            popup.style.border = '2px solid #21408E';
                            popup.style.boxShadow = '0 8px 32px 0 rgba(33,64,142,0.15)';
                        }
                    }
                });
            });
        </script>
    @endif
    </script>
</x-guest-layout>
