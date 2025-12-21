<div class="flex items-center justify-center min-h-screen w-full bg-gradient-to-tr from-white via-blue-100 to-blue-300 md:hidden"
    x-data="{ agreedMobile: false }"
    @agreed-terms-mobile.window="agreedMobile = true"
>
    <div class="bg-[#21408E] rounded-2xl shadow-lg w-full max-w-xs p-6 relative">
        <div class="w-full flex items-center justify-center gap-3 text-2xl font-bold text-white text-center mb-8 font-[Carena]">
            <img src="{{ asset('img/andalaswheels.webp') }}" alt="Logo" class="w-12 h-12 " />
            Register
        </div>
        <form id="register-form-mobile" method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div class="mb-6">
                <x-input-label for="name_mobile" :value="__('Name')" class="mb-2 font-[Carena] text-white" />
                <x-text-input id="name_mobile" class="block w-full rounded-full bg-blue-50 border border-blue-200 focus:ring-2 focus:ring-blue-400 px-4 py-2 text-[#21408E]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- Email Address -->
            <div class="mb-6">
                <x-input-label for="email_mobile" :value="__('Email')" class="mb-2 font-[Carena] text-white" />
                <x-text-input id="email_mobile" class="block w-full rounded-full bg-blue-50 border border-blue-200 focus:ring-2 focus:ring-blue-400 px-4 py-2 text-[#21408E]" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="mb-6 relative">
                <x-input-label for="password_mobile" :value="__('Password')" class="mb-2 font-[Carena] text-white" />
                <x-text-input id="password_mobile" class="block w-full rounded-full bg-blue-50 border border-blue-200 focus:ring-2 focus:ring-blue-400 px-4 py-2 text-[#21408E]" type="password" name="password" required autocomplete="new-password" />
                <button type="button" onclick="togglePassword('password_mobile', 'eyePasswordMobile')" class="absolute right-4 top-9 group">
                    <span id="eyePasswordMobile" class="transition-colors duration-200 group-hover:text-blue-500">
                        <!-- Lucide Eye Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M1.5 12s3.5-7 10.5-7 10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="12" cy="12" r="3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </button>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- Confirm Password -->
            <div class="mb-6 relative">
                <x-input-label for="password_confirmation_mobile" :value="__('Confirm Password')" class="mb-2 font-[Carena] text-white" />
                <x-text-input id="password_confirmation_mobile" class="block w-full rounded-full bg-blue-50 border border-blue-200 focus:ring-2 focus:ring-blue-400 px-4 py-2 text-[#21408E]" type="password" name="password_confirmation" required autocomplete="new-password" />
                <button type="button" onclick="togglePassword('password_confirmation_mobile', 'eyePasswordConfirmationMobile')" class="absolute right-4 top-9 group">
                    <span id="eyePasswordConfirmationMobile" class="transition-colors duration-200 group-hover:text-blue-500">
                        <!-- Lucide Eye Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M1.5 12s3.5-7 10.5-7 10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="12" cy="12" r="3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </button>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div>
                <button
                    type="submit"
                    class="block w-full rounded-full bg-white text-[#21408E] px-4 py-2 text-base font-bold hover:bg-blue-100 transition-all hover:scale-105 justify-center shadow"
                    :disabled="!agreedMobile"
                    :class="!agreedMobile ? 'opacity-50 cursor-not-allowed' : ''"
                >
                    Register
                </button>
            </div>

            <!-- Checkbox dan label -->
            <div class="mb-4 flex items-center gap-2 mt-4">
                <input
                    type="checkbox"
                    id="agree_terms_mobile"
                    name="agree_terms"
                    class="w-5 h-5 accent-blue-700 cursor-pointer disabled:cursor-not-allowed"
                    :checked="agreedMobile"
                    disabled
                    required
                />
                <label
                    for="agree_terms_mobile"
                    class="text-xs text-white font-semibold flex items-center gap-1 cursor-pointer"
                >
                    Saya telah membaca dan menyetujui
                    <button
                        type="button"
                        class="text-blue-200 underline font-semibold ml-1"
                        @click.prevent="window.dispatchEvent(new CustomEvent('open-terms-mobile'))"
                    >
                        Syarat dan Ketentuan
                    </button>
                </label>
            </div>
        </form>
        <div class="mt-6 text-center">
            <span class="text-xs text-white font-[Poppins]">Sudah punya akun?</span>
            <a href="{{ route('login') }}" class="text-xs text-blue-200 hover:underline font-semibold font-[Poppins] ml-1">Login disini</a>
        </div>
    </div>
</div>
