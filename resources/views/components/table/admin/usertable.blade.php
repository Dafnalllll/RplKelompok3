{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\table\admin\usertable.blade.php --}}

@php
    $users = [
        [
            'id' => 1,
            'name' => 'Andi Saputra',
            'email' => 'andi.saputra@email.com',
            'role' => 'admin',
            'status' => 'Aktif',
            'created_at' => '2024-01-12',
        ],
        [
            'id' => 2,
            'name' => 'Budi Santoso',
            'email' => 'budi.santoso@email.com',
            'role' => 'user',
            'status' => 'Aktif',
            'created_at' => '2024-02-05',
        ],
        [
            'id' => 3,
            'name' => 'Citra Dewi',
            'email' => 'citra.dewi@email.com',
            'role' => 'user',
            'status' => 'Nonaktif',
            'created_at' => '2024-03-18',
        ],
    ];
@endphp

<div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl p-8">
    <h3 class="text-2xl font-bold text-blue-800 mb-6 flex items-center gap-2">
        <i class="fas fa-users-cog text-blue-500"></i>
        Daftar User
    </h3>
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
                    <th class="py-4 px-4 text-left font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b hover:bg-blue-50 transition-colors">
                    <td class="py-3 px-4">{{ $user['id'] }}</td>
                    <td class="py-3 px-4 font-medium text-gray-900">{{ $user['name'] }}</td>
                    <td class="py-3 px-4 text-blue-700">{{ $user['email'] }}</td>
                    <td class="py-3 px-4 capitalize">
                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold
                            {{ $user['role'] === 'admin' ? 'bg-blue-100 text-blue-700' : 'bg-yellow-100 text-yellow-700' }}">
                            <i class="fas fa-user-{{ $user['role'] === 'admin' ? 'shield' : 'tag' }}"></i>
                            {{ ucfirst($user['role']) }}
                        </span>
                    </td>
                    <td class="py-3 px-4">
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                            {{ $user['status'] === 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $user['status'] }}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-gray-600">{{ \Carbon\Carbon::parse($user['created_at'])->format('d M Y') }}</td>
                    <td class="py-3 px-4">
                        <select class="border border-blue-400 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 text-gray-700 bg-white shadow transition-all cursor-pointer">
                            <option class="text-gray-700">Pilih Aksi</option>
                            <option class="text-blue-700">Jadikan Admin</option>
                            <option class="text-red-700">Delete</option>
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-end mt-6">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold shadow transition-colors">
            Perbarui
        </button>
    </div>
</div>
