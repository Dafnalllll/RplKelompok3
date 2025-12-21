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

<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data"
        class="mt-8 space-y-8 bg-white dark:bg-gray-800  sm:rounded-lg backdrop-blur rounded-2xl shadow-2xl p-10 border border-blue-100">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 ">
            {{-- Header di dalam grid --}}
            <div class="md:col-span-2 mb-2">
                <div class="flex items-center text-center gap-3 mb-1">
                    <i class="fas fa-user-circle text-blue-500 text-4xl"></i>
                    <h2 class="text-3xl font-extrabold text-blue-100 drop-shadow">
                        {{ __('Profile Information') }}
                    </h2>
                </div>
                <p class="text-base text-white">
                    {{ __("Update your account's profile information.") }}
                </p>
            </div>

            <div>
                <x-input-label for="name" :value="__('Nama')" />
                <x-text-input id="name" name="name" type="text"
                    class="mt-1 block w-full rounded-lg border-gray-200 bg-gray-100 text-gray-500 cursor-not-allowed shadow-inner"
                    :value="old('name', $user->name)"
                    readonly
                    tabindex="-1"
                />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email"
                    class="mt-1 block w-full rounded-lg border-gray-200 bg-gray-100 text-gray-500 cursor-not-allowed shadow-inner"
                    :value="old('email', $user->email)"
                    readonly
                    tabindex="-1"
                />
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-white">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification"
                                class="underline text-sm text-blue-600 hover:text-blue-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div>
                <x-input-label for="nim" :value="__('NIM')" />
                <x-text-input id="nim" name="nim" type="text" inputmode="numeric" pattern="\d*"
                    class="mt-1 block w-full rounded-lg border-blue-200 focus:ring-blue-400 focus:border-blue-400 shadow"
                    :value="old('nim', $user->profile->nim ?? '')" autocomplete="nim" />
                <x-input-error class="mt-2" :messages="$errors->get('nim')" />
            </div>

            <div>
                <x-input-label for="phone" :value="__('Nomor Telepon')" />
                <x-text-input id="phone" name="phone" type="text" inputmode="numeric" pattern="\d*"
                    class="mt-1 block w-full rounded-lg border-blue-200 focus:ring-blue-400 focus:border-blue-400 shadow"
                    :value="old('phone', $user->profile->phone ?? '')" autocomplete="phone" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>

            <div>
                <x-input-label for="alamat" :value="__('Alamat')" />
                <x-text-input id="alamat" name="alamat" type="text"
                    class="mt-1 block w-full rounded-lg border-blue-200 focus:ring-blue-400 focus:border-blue-400 shadow"
                    :value="old('alamat', $user->profile->alamat ?? '')" autocomplete="alamat" />
                <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
            </div>

            <div class="md:col-span-2">
                <x-input-label for="ktm" :value="__('File KTM')" />
                <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-2 mt-1">
                    <label for="ktm" id="ktm-drop-area"
                        class="w-full sm:w-fit flex items-center gap-3 cursor-pointer bg-gradient-to-r from-blue-500 to-blue-400 hover:from-blue-600 hover:to-blue-500 text-white px-6 py-2 rounded-lg font-semibold shadow transition-all duration-200 ring-1 ring-blue-300 hover:ring-2 hover:scale-105 border-2 border-dashed border-blue-300"
                        ondragover="event.preventDefault(); this.classList.add('bg-blue-100');"
                        ondragleave="this.classList.remove('bg-blue-100');"
                    >
                        <i class="fas fa-upload"></i>
                        <span id="ktm-label-text">Pilih File KTM / Drag & Drop</span>
                        <input id="ktm" name="ktm" type="file" class="hidden"
                            onchange="document.getElementById('ktm-label-text').innerText = this.files[0]?.name || 'Pilih File KTM / Drag & Drop'; document.getElementById('ktm-cancel-btn').classList.toggle('hidden', !this.files.length);" />
                    </label>
                    <button type="button" id="ktm-cancel-btn" onclick="
                        const input = document.getElementById('ktm');
                        input.value = '';
                        document.getElementById('ktm-label-text').innerText = 'Pilih File KTM / Drag & Drop';
                        this.classList.add('hidden');
                    " class="hidden ml-2 text-red-500 hover:text-red-700 bg-white rounded-full border border-red-200 w-8 h-8  items-center justify-center shadow transition-all" title="Batalkan Pilihan">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                @if(!empty($user->profile) && !empty($user->profile->ktm))
                    <a href="{{ asset('storage/' . $user->profile->ktm) }}" target="_blank"
                        class="text-blue-700 hover:underline text-sm mt-2 inline-block font-semibold">
                        <i class="fas fa-id-card mr-1"></i>Lihat KTM Saat Ini
                    </a>
                @endif
                <x-input-error class="mt-2" :messages="$errors->get('ktm')" />
            </div>

            <div class="mb-4 md:col-span-2">
                <label for="avatar" class="block font-semibold mb-2 text-white">Foto Profil (Avatar)</label>
                <div class="flex flex-col sm:flex-row items-center gap-4 sm:gap-6">
                    {{-- Preview Avatar --}}
                    <div>
                        @if(!empty($user->profile) && !empty($user->profile->avatar))
                            <img id="avatar-preview"
                                src="{{ asset('storage/' . $user->profile->avatar) }}"
                                alt="Avatar"
                                class="mx-auto w-24 h-24 rounded-full object-cover border-4 border-blue-200 shadow-lg transition-all duration-200 hover:scale-105 bg-white">
                        @else
                            <div id="avatar-preview" class="mx-auto w-24 h-24 rounded-full bg-blue-100 flex items-center justify-center text-blue-400 text-4xl border-4 border-blue-50 shadow-lg">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                    </div>
                    {{-- Upload Button --}}
                    <div class="w-full sm:w-fit">
                        <label for="avatar" id="avatar-drop-area"
                            class="w-full sm:w-fit cursor-pointer inline-flex items-center gap-2 px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-400 hover:from-blue-600 hover:to-blue-500 text-white rounded-lg font-semibold shadow transition-all duration-200 ring-1 ring-blue-300 hover:ring-2 hover:scale-105 border-2 border-dashed border-blue-300"
                            ondragover="event.preventDefault(); this.classList.add('bg-blue-100');"
                            ondragleave="this.classList.remove('bg-blue-100');"
                        >
                            <i class="fas fa-upload"></i>
                            <span id="avatar-label-text">Pilih Foto Profil / Drag & Drop</span>
                            <input type="file" name="avatar" id="avatar" accept="image/*" class="hidden"
                                onchange="handleAvatarChange(this)" />
                        </label>
                        <button type="button" id="avatar-cancel-btn" onclick="
                            const input = document.getElementById('avatar');
                            input.value = '';
                            document.getElementById('avatar-label-text').innerText = 'Pilih Foto Profil / Drag & Drop';
                            document.getElementById('avatar-preview').src = '{{ !empty($user->profile) && !empty($user->profile->avatar) ? asset('storage/' . $user->profile->avatar) : '' }}';
                            this.classList.add('hidden');
                        " class="hidden ml-2 text-red-500 hover:text-red-700 bg-white rounded-full border border-red-200 w-8 h-8 items-center justify-center shadow transition-all" title="Batalkan Pilihan">
                            <i class="fas fa-times"></i>
                        </button>
                        <p class="text-xs text-gray-500 mt-2">Format: jpg, jpeg, png, gif, webp. Maksimal 5 MB.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4 mt-8">
            <button type="submit"
                class="bg-gradient-to-r from-blue-600 to-blue-400 hover:from-blue-700 hover:to-blue-500 text-white px-8 py-2.5 rounded-xl font-bold shadow-lg flex items-center gap-2 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 text-lg hover:scale-105">
                <i class="fas fa-save"></i>
                Simpan Perubahan
            </button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-semibold">
                    <i class="fas fa-check-circle mr-1"></i>Tersimpan.
                </p>
            @endif
        </div>
    </form>
</section>

<div id="form-alert" class="fixed top-8 left-1/2 transform -translate-x-1/2 z-50 hidden">
    <div class="bg-red-100 border border-red-300 text-red-800 px-6 py-4 rounded-xl shadow-lg flex items-center gap-3 animate-bounce-in">
        <i class="fas fa-exclamation-circle text-2xl"></i>
        <span id="form-alert-message" class="font-semibold"></span>
        <button onclick="document.getElementById('form-alert').classList.add('hidden')" class="ml-4 text-red-500 hover:text-red-700 text-xl font-bold focus:outline-none">&times;</button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // NIM
    const nimInput = document.getElementById('nim');
    const nimError = document.createElement('div');
    nimError.className = 'mt-2 text-sm text-red-600 font-semibold';
    nimInput.parentNode.appendChild(nimError);

    nimInput.addEventListener('input', function () {
        if (this.value && !/^\d+$/.test(this.value)) {
            this.classList.add('border-red-500', 'ring-2', 'ring-red-300');
            nimError.textContent = 'NIM hanya boleh angka';
        } else {
            this.classList.remove('border-red-500', 'ring-2', 'ring-red-300');
            nimError.textContent = '';
        }
    });

    // Nomor Telepon
    const phoneInput = document.getElementById('phone');
    const phoneError = document.createElement('div');
    phoneError.className = 'mt-2 text-sm text-red-600 font-semibold';
    phoneInput.parentNode.appendChild(phoneError);

    phoneInput.addEventListener('input', function () {
        if (this.value && !/^\d+$/.test(this.value)) {
            this.classList.add('border-red-500', 'ring-2', 'ring-red-300');
            phoneError.textContent = 'Nomor Telepon hanya boleh angka';
        } else {
            this.classList.remove('border-red-500', 'ring-2', 'ring-red-300');
            phoneError.textContent = '';
        }
    });

    // Drag & Drop KTM
    const ktmDrop = document.getElementById('ktm-drop-area');
    if (ktmDrop) {
        ktmDrop.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('bg-blue-100');
            const input = document.getElementById('ktm');
            input.files = e.dataTransfer.files;
            document.getElementById('ktm-label-text').innerText = input.files[0]?.name || 'Pilih File KTM / Drag & Drop';
            document.getElementById('ktm-cancel-btn').classList.toggle('hidden', !input.files.length);
        });
    }

    // Drag & Drop Avatar
    const avatarDrop = document.getElementById('avatar-drop-area');
    if (avatarDrop) {
        avatarDrop.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('bg-blue-100');
            const input = document.getElementById('avatar');
            input.files = e.dataTransfer.files;
            handleAvatarChange(input);
        });
    }

    // Validasi sebelum submit
    const form = document.querySelector('form[action="{{ route('profile.update') }}"]');
    form.addEventListener('submit', function (e) {
        const nim = nimInput.value.trim();
        const phone = phoneInput.value.trim();
        const ktm = document.getElementById('ktm');
        const avatar = document.getElementById('avatar');
        const hasKtm = {{ !empty($user->profile) && !empty($user->profile->ktm) ? 'true' : 'false' }};
        const hasAvatar = {{ !empty($user->profile) && !empty($user->profile->avatar) ? 'true' : 'false' }};

        let valid = true;
        let pesan = '';

        if (!nim || !phone || (!ktm.value && !hasKtm) || (!avatar.value && !hasAvatar)) {
            valid = false;
            pesan = "Isi Semua Data";
        } else if (!/^\d+$/.test(nim)) {
            valid = false;
            pesan = "NIM hanya boleh angka";
        } else if (!/^\d+$/.test(phone)) {
            valid = false;
            pesan = "Nomor Telepon hanya boleh angka";
        }

        if (!valid) {
            e.preventDefault();
            const alertBox = document.getElementById('form-alert');
            const alertMsg = document.getElementById('form-alert-message');
            alertMsg.innerHTML = pesan;
            alertBox.classList.remove('hidden');
            setTimeout(() => alertBox.classList.add('hidden'), 4000);
        }
    });
});
</script>

<script>
function handleAvatarChange(input) {
    const label = document.getElementById('avatar-label-text');
    const preview = document.getElementById('avatar-preview');
    const cancelBtn = document.getElementById('avatar-cancel-btn');
    if (input.files && input.files[0]) {
        label.innerText = input.files[0].name;
        cancelBtn.classList.remove('hidden');
        // Preview gambar
        const reader = new FileReader();
        reader.onload = function(e) {
            if(preview.tagName === 'IMG') {
                preview.src = e.target.result;
            } else {
                // Jika sebelumnya belum ada gambar, ganti div jadi img
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'mx-auto w-24 h-24 rounded-full object-cover border-4 border-blue-200 shadow-lg transition-all duration-200 hover:scale-105 bg-white';
                img.id = 'avatar-preview';
                preview.replaceWith(img);
            }
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        label.innerText = 'Pilih Foto Profil / Drag & Drop';
        cancelBtn.classList.add('hidden');
    }
}
function handleKtmChange(input) {
    const label = document.getElementById('ktm-label-text');
    const cancelBtn = document.getElementById('ktm-cancel-btn');
    if (input.files && input.files[0]) {
        label.innerText = input.files[0].name;
        cancelBtn.classList.remove('hidden');
    } else {
        label.innerText = 'Pilih File KTM / Drag & Drop';
        cancelBtn.classList.add('hidden');
    }
}
document.getElementById('avatar').addEventListener('change', function() {
    handleAvatarChange(this);
});
document.getElementById('ktm').addEventListener('change', function() {
    handleKtmChange(this);
});
</script>
