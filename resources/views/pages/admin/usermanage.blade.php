@section('title', 'Andalaswheel || User Management')
@push('head')
    <title>Andalaswheel || User Management</title>
    <link rel="icon" type="image/png" href="{{ asset('img/andalaswheels.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endpush

<x-app-layout>
    <div class="flex min-h-screen bg-gradient-to-br from-blue-100 via-yellow-50 to-blue-200">
        {{-- Sidebar --}}
        @include('components.admin.sidebar')

        {{-- Main Content --}}
        <div class="flex-1 h-screen overflow-y-auto">
            {{-- Header with Glassdrop --}}
            <header class="sticky top-0 z-20 mb-8">
                <div class="backdrop-blur-md bg-white/40 border border-white/30 shadow-lg rounded-2xl px-8 py-6 flex items-center justify-between">
                    <h1 class="text-3xl font-bold text-blue-800 drop-shadow-lg">User Management</h1>
                </div>
            </header>

            <main class="p-6 min-h-screen relative">
                <div
                    x-data="{
                        keyword: '',
                        status: '',
                        role: '',
                        users: @js($users),
                        page: 1,
                        perPage: 5,
                        get filtered() {
                            return this.users.filter(u => {
                                const matchName = !this.keyword || (u.name && u.name.toLowerCase().includes(this.keyword.toLowerCase()));
                                const matchStatus =
                                    this.status === ''
                                        ? true
                                        : u.status === this.status;
                                const matchRole = !this.role || u.role === this.role;
                                return matchName && matchStatus && matchRole;
                            });
                        },
                        get totalPages() {
                            return Math.ceil(this.filtered.length / this.perPage) || 1;
                        },
                        get paginated() {
                            const start = (this.page - 1) * this.perPage;
                            return this.filtered.slice(start, start + this.perPage);
                        }
                    }"
                    x-init="$watch('keyword', () => { page = 1 }); $watch('status', () => { page = 1 }); $watch('role', () => { page = 1 })"
                >
                    {{-- Search Bar --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-2">
                        <div class="relative flex-1 max-w-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text"
                                placeholder="Cari User"
                                x-model="keyword"
                                class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow">
                            <button
                                type="button"
                                x-show="keyword"
                                @click="keyword = ''"
                                class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-red-500"
                            >
                                <i class="fas fa-times-circle"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Filter Bar --}}
                    <div class="w-full flex flex-col md:flex-row items-center justify-start gap-4 mb-6">
                        <div class="w-full flex gap-4 bg-white/90 backdrop-blur-md rounded-xl shadow-lg px-6 py-4 border border-blue-200 items-center">
                            <div class="flex items-center gap-2 mr-2">
                                <i class="fas fa-filter text-blue-600 text-lg"></i>
                                <span class="font-semibold text-blue-800 text-base">Filter</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <label class="text-blue-700 font-medium" for="status-filter">
                                    <i class="fas fa-user-check mr-1"></i>Status:
                                </label>
                                <select id="status-filter" x-model="status"
                                    class="px-8 py-2 rounded-full border border-blue-200 bg-blue-50 text-blue-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition hover:bg-blue-100 hover:border-blue-400">
                                    <option value="">Semua</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Nonaktif">Nonaktif</option>
                                </select>
                            </div>
                            <div class="flex items-center gap-2">
                                <label class="text-blue-700 font-medium" for="role-filter">
                                    <i class="fas fa-user-tag mr-1"></i>Role:
                                </label>
                                <select id="role-filter" x-model="role"
                                    class="px-8 py-2 rounded-full border border-blue-200 bg-blue-50 text-blue-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition hover:bg-blue-100 hover:border-blue-400">
                                    <option value="">Semua</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <button
                                type="button"
                                @click="keyword = ''; status = ''; role = ''"
                                class="ml-auto px-6 py-2 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 text-white font-semibold shadow hover:scale-105 transition flex items-center gap-2"
                            >
                                <i class="fas fa-undo"></i>
                                Reset
                            </button>
                        </div>
                    </div>

                    {{-- User Table --}}
                    @include('components.table.admin.usertable')
                </div>
            </main>
        </div>
    </div>

    @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    text: '{{ session('status') }}',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2200,
                    timerProgressBar: true,
                    toast: true,
                    position: 'top',
                    background: '#f0f6ff',
                    color: '#21408E',
                    customClass: {
                        popup: 'shadow-2xl rounded-xl animate__animated animate__fadeInDown',
                        title: 'font-bold text-lg',
                        htmlContainer: 'text-base',
                    },
                    iconHtml: `
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#21408E" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" fill="#21408E"/>
                            <path d="M9 12l2 2l4 -4" stroke="#fff" stroke-width="2.5" fill="none"/>
                        </svg>
                    `,
                });
            });
        </script>
    @endif

</x-app-layout>
