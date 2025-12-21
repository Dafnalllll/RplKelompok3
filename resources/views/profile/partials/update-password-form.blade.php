<section>
    <form method="post" action="{{ route('password.update') }}"
        class="mt-8 space-y-8 bg-white dark:bg-gray-800 sm:rounded-lg backdrop-blur rounded-2xl shadow-2xl p-10 border border-blue-100">
        @csrf
        @method('put')

        <div class="mb-6">
            <div class="flex items-center gap-3 mb-1">
                <i class="fas fa-key text-blue-500 text-3xl"></i>
                <h2 class="text-2xl font-extrabold text-blue-100 drop-shadow">
                    {{ __('Update Password') }}
                </h2>
            </div>
            <p class="text-base text-white">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </div>

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full rounded-lg border-blue-200 focus:ring-blue-400 focus:border-blue-400 shadow" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full rounded-lg border-blue-200 focus:ring-blue-400 focus:border-blue-400 shadow" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-lg border-blue-200 focus:ring-blue-400 focus:border-blue-400 shadow" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 mt-8">
            <x-primary-button
                class="w-auto px-6 py-2 rounded-full bg-gradient-to-r from-blue-600 via-blue-500 to-blue-700 text-white font-bold text-base shadow-lg hover:from-blue-700 hover:to-blue-800 hover:scale-105 transition-all duration-200 flex items-center gap-2"
            >
                <i class="fas fa-save"></i>
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-semibold"
                >
                    <i class="fas fa-check-circle mr-1"></i>{{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
