@section('title', 'Andalaswheel || Order Management')
@push('head')
    <title>Andalaswheel || Order Management</title>
    <link rel="icon" type="image/png" href="{{ asset('img/andalaswheels.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush

<x-app-layout>
    <div class="flex min-h-screen bg-gradient-to-br from-blue-100 via-yellow-50 to-blue-200">
        {{-- Sidebar --}}
        @include('components.admin.sidebar')

        {{-- Main Content --}}
        <div class="flex-1 h-screen overflow-y-auto">
            {{-- Header --}}
            <header class="sticky top-0 z-20 mb-8">
                <div class="backdrop-blur-md bg-white/40 border border-white/30 shadow-lg rounded-2xl px-8 py-6 flex items-center justify-between">
                    <h1 class="text-3xl font-bold text-blue-800 drop-shadow-lg">Order Management</h1>
                </div>
            </header>

            <main class="p-6 min-h-screen relative">
                <div
                    x-data="orderTable({{ Js::from($orders) }})"
                    x-init="$watch('keyword', () => { page = 1 }); $watch('statusFilter', () => { page = 1 }); $watch('metodeFilter', () => { page = 1 }); $watch('bulanFilter', () => { page = 1 })"
                >
                    {{-- Search and Add Button --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                        <div class="relative flex-1 max-w-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text"
                                placeholder="Cari Order ID atau Nama Pemesan"
                                x-model="keyword"
                                class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
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
                                <span class="text-blue-700 font-medium">Status:</span>
                                <select x-model="statusFilter"
                                    class="px-7 py-2 rounded-full border border-blue-200 bg-blue-50 text-blue-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition hover:bg-blue-100 hover:border-blue-400">
                                    <option value="">Semua</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Diterima">Diterima</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-blue-700 font-medium">Metode:</span>
                                <select x-model="metodeFilter"
                                    class="px-7 py-2 rounded-full border border-blue-200 bg-blue-50 text-blue-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition hover:bg-blue-100 hover:border-blue-400">
                                    <option value="">Semua</option>
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-blue-700 font-medium">Bulan:</span>
                                <select x-model="bulanFilter"
                                    class="px-7 py-2 rounded-full border border-blue-200 bg-blue-50 text-blue-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition hover:bg-blue-100 hover:border-blue-400">
                                    <option value="">Semua</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <button
                                type="button"
                                @click="keyword = ''; statusFilter = ''; metodeFilter = ''; bulanFilter = ''"
                                class="ml-auto px-6 py-2 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 text-white font-semibold shadow hover:scale-105 transition flex items-center gap-2"
                            >
                                <i class="fas fa-undo"></i>
                                Reset
                            </button>
                        </div>
                    </div>

                    {{-- Order Table --}}
                    @include('components.table.admin.ordertable')
                </div>
            </main>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

<script>
function orderTable(orders) {
    return {
        keyword: '',
        statusFilter: '',
        metodeFilter: '',
        bulanFilter: '',
        orders: orders,
        page: 1,
        perPage: 5,
        get filtered() {
            return this.orders.filter(o => {
                const keywordMatch =
                    (!this.keyword) ||
                    (o.order_code && o.order_code.toLowerCase().includes(this.keyword.toLowerCase())) ||
                    (o.user && o.user.name && o.user.name.toLowerCase().includes(this.keyword.toLowerCase()));
                const statusMatch =
                    (!this.statusFilter) || (o.status === this.statusFilter);
                const metodeMatch =
                    (!this.metodeFilter) || (o.metode_bayar === this.metodeFilter);
                const bulanMatch =
                    (!this.bulanFilter) || ((o.tanggal_order || '').slice(5,7) === this.bulanFilter);
                return keywordMatch && statusMatch && metodeMatch && bulanMatch;
            });
        },
        get totalPages() {
            return Math.ceil(this.filtered.length / this.perPage) || 1;
        },
        get paginated() {
            const start = (this.page - 1) * this.perPage;
            return this.filtered.slice(start, start + this.perPage);
        }
    }
}
</script>
