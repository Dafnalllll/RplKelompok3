{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\profile\partials\delete-user-form.blade.php --}}
@php
    $isSeederUser = in_array(auth()->user()->email, [
        'dafnal12@gmail.com',
        'zavi23@gmail.com',
        'andalaswheels@gmail.com'
    ]);
@endphp

<style>
@keyframes bounce-in {
    0% { transform: scale(0.8) translateY(-30px); opacity: 0; }
    60% { transform: scale(1.05) translateY(10px); opacity: 1; }
    100% { transform: scale(1) translateY(0); }
}
.animate-bounce-in {
    animation: bounce-in 0.5s;
}
</style>

<section class="mt-8 space-y-8 bg-white dark:bg-gray-800 sm:rounded-lg backdrop-blur rounded-2xl shadow-2xl p-10 border border-red-200">
    <header>
        <div class="flex items-center gap-3 mb-2">
            <i class="fas fa-user-slash text-red-500 text-4xl"></i>
            <h2 class="text-3xl font-extrabold text-red-700 drop-shadow">
                {{ __('Hapus Akun') }}
            </h2>
        </div>
        <p class="text-base text-white">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </p>
    </header>

    <div class="mt-8">
        @if($isSeederUser)
            <button
                type="button"
                class="bg-gradient-to-r from-red-600 to-red-400 text-white px-8 py-2.5 rounded-xl font-bold shadow-lg flex items-center gap-2 opacity-60 cursor-not-allowed text-lg"
                disabled
            >
                <i class="fas fa-trash-alt"></i>
                {{ __('Hapus Akun') }}
            </button>
            <div class="text-xs text-red-500 mt-2">Akun ini tidak dapat dihapus.</div>
        @else
            <x-danger-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                class="bg-gradient-to-r from-red-600 to-red-400 hover:from-red-700 hover:to-red-500 text-white px-8 py-2.5 rounded-xl font-bold shadow-lg flex items-center gap-2 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-400 text-lg hover:scale-105"
            >
                <i class="fas fa-trash-alt"></i>
                {{ __('Hapus Akun') }}
            </x-danger-button>
        @endif
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 space-y-6">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-bold text-red-700 mb-2">
                {{ __('Apakah Anda yakin ingin menghapus akun Anda?') }}
            </h2>
            <p class="text-base text-white mb-4">
                {{ __('Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Harap masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.') }}
            </p>

            <div>
                <x-input-label for="password" value="{{ __('Password') }}" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full rounded-lg border-red-200 focus:ring-red-400 focus:border-red-400 shadow"
                    placeholder="{{ __('Password') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center gap-4 mt-8">
                <x-secondary-button x-on:click="$dispatch('close')" class="px-8 py-2.5 rounded-xl font-bold shadow-lg">
                    <i class="fas fa-times-circle"></i>
                    {{ __('Batalkan') }}
                </x-secondary-button>
                <x-danger-button class="ms-3 bg-gradient-to-r from-red-600 to-red-400 hover:from-red-700 hover:to-red-500 text-white px-8 py-2.5 rounded-xl font-bold shadow-lg flex items-center gap-2 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-400 text-lg hover:scale-105">
                    <i class="fas fa-trash-alt"></i>
                    {{ __('Hapus Akun') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('status'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('status') }}',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        iconHtml: `
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#21408E" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" fill="#21408E"/>
                <path d="M9 12l2 2l4 -4" stroke="#fff" stroke-width="2.5" fill="none"/>
            </svg>
        `,
        customClass: {
            icon: 'no-border'
        }
    });
});
</script>
@endif
