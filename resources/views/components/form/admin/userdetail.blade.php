{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\form\admin\userdetail.blade.php --}}
<div x-data="{ open: false }"
     x-init="window.addEventListener('open-user-detail-{{ $user->id }}', () => { open = true })"
     class="inline">
    <!-- Tombol Detail -->
    <button type="button" @click="open = true"
        class="bg-gradient-to-r from-blue-500 to-blue-400 hover:from-blue-600 hover:to-blue-500 text-white px-4 py-2 rounded-xl shadow font-semibold flex items-center gap-2 text-sm transition-all hover:scale-105"
        title="Detail User">
        <i class="fas fa-eye"></i>
        Detail
    </button>

    <!-- Modal Detail User (ukuran lebih besar dan lebar) -->
    <div x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center -mt-12"
        x-cloak>
        <div @click.away="open = false"
            class="bg-white/95 rounded-2xl shadow-xl w-full max-w-4xl p-6 md:p-8 relative border border-blue-100 transition-all duration-200">
            <!-- Tombol close -->
            <button type="button" @click="open = false"
                class="absolute top-7 right-7 text-gray-400 hover:text-red-500 text-4xl transition">
                <i class="fas fa-times-circle"></i>
            </button>
            <div class="flex items-center gap-6 mb-12">
                <div class="bg-blue-100 rounded-full p-1">
                    @if(!empty($user->profile) && !empty($user->profile->avatar))
                        <img src="{{ asset('storage/' . $user->profile->avatar) }}"
                             alt="Avatar"
                             class="w-28 h-28 rounded-full object-cover border-4 border-blue-200 shadow-lg bg-white">
                    @else
                        <i class="fas fa-user-circle text-blue-500 text-7xl"></i>
                    @endif
                </div>
                <div>
                    <h2 class="text-4xl font-extrabold text-blue-900 mb-2">Detail User</h2>
                    <p class="text-gray-600 text-lg">Informasi lengkap pengguna</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kolom 1 -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-lg">Nama</label>
                    <div class="bg-gray-100 rounded-lg px-6 py-3 text-gray-800 text-lg">{{ $user->name ?? '-' }}</div>
                </div>
                <!-- Kolom 2 -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-lg">Email</label>
                    <div class="bg-gray-100 rounded-lg px-6 py-3 text-gray-800 text-lg">{{ $user->email ?? '-' }}</div>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-lg">NIM</label>
                    <div class="bg-gray-100 rounded-lg px-6 py-3 text-gray-800 text-lg">{{ $user->profile->nim ?? '-' }}</div>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-lg">Nomor Telepon</label>
                    <div class="bg-gray-100 rounded-lg px-6 py-3 text-gray-800 text-lg">{{ $user->profile->phone ?? '-' }}</div>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-gray-700 font-semibold mb-2 text-lg">File KTM</label>
                    @if(!empty($user->profile->ktm))
                        <a href="{{ asset('storage/' . $user->profile->ktm) }}" target="_blank"
                            class="inline-flex items-center gap-2 text-blue-700 hover:underline font-semibold bg-blue-50 px-6 py-3 rounded-lg shadow transition text-lg">
                            <i class="fas fa-id-card"></i> Lihat KTM
                        </a>
                    @else
                        <div class="bg-gray-100 rounded-lg px-6 py-3 text-gray-800 text-lg">Belum diupload</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
