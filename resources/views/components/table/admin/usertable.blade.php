{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\table\admin\usertable.blade.php --}}
<div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl p-8"
>
    <h3 class="text-2xl font-bold text-blue-800 mb-6 flex items-center gap-2">
        <i class="fas fa-users-cog text-blue-500"></i>
        User List
    </h3>
    <form method="POST" action="{{ route('usermanage.bulkAction') }}">
        @csrf
        <div class="overflow-x-auto rounded-xl border border-gray-200 shadow">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-100 to-yellow-50 text-gray-700">
                        <th class="py-4 px-4 text-left font-semibold">ID</th>
                        <th class="py-4 px-4 text-left font-semibold">Nama</th>
                        <th class="py-4 px-4 text-left font-semibold">Email</th>
                        <th class="py-4 px-4 text-left font-semibold">Role</th>
                        <th class="py-4 px-4 text-left font-semibold">Status</th>
                        <th class="py-4 px-4 text-left font-semibold">Tanggal Daftar</th>
                        <th class="py-4 px-4 text-left font-semibold">Detail</th>
                        <th class="py-4 px-4 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <template x-if="paginated.some(u => u.id === {{ $user->id }})">
                            <tr class="border-b hover:bg-blue-50 transition-colors">
                                <td class="py-3 px-4">{{ $user->id }}</td>
                                <td class="py-3 px-4 font-medium text-gray-900">{{ $user->name }}</td>
                                <td class="py-3 px-4 text-blue-700">{{ $user->email }}</td>
                                <td class="py-3 px-4 capitalize">
                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold
                                        {{ $user->role === 'admin' ? 'bg-blue-100 text-blue-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        <i class="fas fa-user-{{ $user->role === 'admin' ? 'shield' : 'tag' }}"></i>
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                        {{ trim(strtolower($user->status)) === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $user->status ?? 'Aktif' }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-gray-600">{{ $user->created_at->format('d M Y') }}</td>
                                <td class="py-3 px-4">
                                    @if($user->email !== 'andalaswheels@gmail.com' && $user->email !== 'dafnal12@gmail.com' && $user->email !== 'zavi23@gmail.com')
                                        <x-form.admin.userdetail :user="$user" />
                                    @else
                                        <span class="text-gray-400 italic">-</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4">
                                    @if($user->email !== 'andalaswheels@gmail.com' && $user->email !== 'dafnal12@gmail.com' && $user->email !== 'zavi23@gmail.com')
                                        <select name="actions[{{ $user->id }}]" class="border border-blue-400 rounded-lg px-7 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 text-gray-700 bg-white shadow transition-all cursor-pointer">
                                            <option value="">Pilih</option>
                                            @if(trim(strtolower($user->status)) === 'nonaktif')
                                                <option value="aktif" class="text-green-700">Aktifkan</option>
                                            @else
                                                <option value="nonaktif" class="text-red-700">Nonaktifkan</option>
                                                @if($user->role !== 'admin')
                                                    <option value="admin" class="text-green-700">Jadikan Admin</option>
                                                @endif
                                                @if($user->role !== 'user')
                                                    <option value="user" class="text-yellow-700">Jadikan User</option>
                                                @endif
                                            @endif
                                            <option value="delete" class="text-red-700">Delete</option>
                                        </select>
                                    @else
                                        <span class="text-gray-400 italic">-</span>
                                    @endif
                                </td>
                            </tr>
                        </template>
                    @endforeach

                    <template x-if="paginated.length === 0">
                        <tr>
                            <td colspan="8" class="text-center py-8 text-gray-400 text-lg font-semibold">
                                <i class="fas fa-user-slash text-2xl mb-2 block"></i>
                                User Not Found
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        {{-- Pagination Controls --}}
        <div class="flex justify-center items-center gap-2 mt-6">
            <button type="button"
                class="px-3 py-1 rounded bg-blue-100 text-blue-700 font-semibold hover:bg-blue-200 transition"
                @click="if(page > 1) page--"
                :disabled="page === 1"
            >
                <i class="fas fa-chevron-left"></i>
            </button>
            <template x-for="i in totalPages" :key="i">
                <button type="button"
                    class="px-3 py-1 rounded-full font-semibold"
                    :class="page === i ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-blue-100'"
                    @click="page = i"
                    x-text="i"
                ></button>
            </template>
            <button type="button"
                class="px-3 py-1 rounded bg-blue-100 text-blue-700 font-semibold hover:bg-blue-200 transition"
                @click="if(page < totalPages) page++"
                :disabled="page === totalPages"
            >
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <div class="flex justify-end mt-6 gap-3">
            {{-- Export CSV Button --}}
            <button
                type="button"
                onclick="exportUserTableToCSV()"
                class="bg-gradient-to-r from-green-200 to-green-400 text-green-900 px-7 py-2.5 rounded-xl font-semibold shadow-lg flex items-center gap-3 transition-all duration-200 hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-400"
            >
                <i class="fas fa-file-csv"></i>
                Export CSV
            </button>
            {{-- Perbarui Button --}}
            <button type="submit"
                class="bg-gradient-to-r from-blue-100 to-yellow-50 text-gray-700 px-7 py-2.5 rounded-xl font-semibold shadow-lg flex items-center gap-3 transition-all duration-200 hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-sync-alt"></i>
                Perbarui
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('userTable', () => ({
        page: 1,
        perPage: 5,
        get totalPages() {
            return Math.ceil(this.filtered.length / this.perPage) || 1;
        },
        get paginated() {
            const start = (this.page - 1) * this.perPage;
            return this.filtered.slice(start, start + this.perPage);
        }
    }));
});

function exportUserTableToCSV() {
    let csv = 'ID,Nama,Email,Role,Status,Tanggal Daftar\n';
    document.querySelectorAll('tbody tr').forEach(row => {
        // Skip "User Not Found" row
        const tds = row.querySelectorAll('td');
        if (tds.length < 6) return;
        // Ambil hanya kolom data utama
        let data = [
            tds[0]?.innerText.trim(), // ID
            tds[1]?.innerText.trim(), // Nama
            tds[2]?.innerText.trim(), // Email
            tds[3]?.innerText.trim(), // Role
            tds[4]?.innerText.trim(), // Status
            tds[5]?.innerText.trim(), // Tanggal Daftar
        ].map(v => {
            // Hapus tanda kutip ganda, spasi berlebih, dan hanya beri kutip jika ada koma
            let clean = v.replace(/"/g, '').replace(/\s+/g, ' ').trim();
            return /,/.test(clean) ? `"${clean}"` : clean;
        });
        csv += data.join(',') + '\n';
    });

    // Download CSV
    let blob = new Blob([csv], { type: 'text/csv' });
    let url = window.URL.createObjectURL(blob);
    let a = document.createElement('a');
    a.href = url;
    a.download = 'Data User.csv';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    window.URL.revokeObjectURL(url);
}
</script>
