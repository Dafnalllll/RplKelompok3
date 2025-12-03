@section('title', 'Andalaswheel || Product Management')
@push('head')
    <title>Andalaswheel || Product Management</title>
    <link rel="icon" type="image/png" href="{{ asset('img/andalaswheels.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
                    <h1 class="text-3xl font-bold text-blue-800 drop-shadow-lg">Produk Management</h1>
                    {{-- Tambahkan tombol atau info lain di kanan header jika perlu --}}
                </div>
            </header>

            <main class="p-6 min-h-screen relative">
                <div
                    x-data="{
                        keyword: '',
                        products: @js($products),
                        page: 1,
                        perPage: 5,
                        get filtered() {
                            if (!this.keyword) return this.products;
                            return this.products.filter(p =>
                                (p.name && p.name.toLowerCase().includes(this.keyword.toLowerCase())) ||
                                (p.category?.name && p.category.name.toLowerCase().includes(this.keyword.toLowerCase()))
                            );
                        },
                        get totalPages() {
                            return Math.ceil(this.filtered.length / this.perPage) || 1;
                        },
                        get paginated() {
                            const start = (this.page - 1) * this.perPage;
                            return this.filtered.slice(start, start + this.perPage);
                        }
                    }"
                    x-init="$watch('keyword', () => { page = 1 })"
                >
                {{-- Search and Add Button --}}
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                    {{-- Search Bar --}}
                    <div class="relative flex-1 max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text"
                                placeholder="Cari Produk"
                                x-model="keyword"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    {{-- Add Product Button --}}
                    <a href="{{ route('productmanage.add') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium flex items-center gap-2 hover:scale-105 transition-all duration-200 shadow-lg">
                        <i class="fas fa-plus"></i>
                        Add Product
                    </a>
                </div>

                {{-- Product Table --}}
                @include('components.table.admin.producttable', ['categories' => $categories])


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

    @if (session('updated'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    text: '{{ session('updated') }}',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2200,
                    timerProgressBar: true,
                    toast: true,
                    position: 'top',
                    background: '#e6f9f0',
                    color: '#1a7f37',
                    customClass: {
                        popup: 'shadow-2xl rounded-xl animate__animated animate__fadeInDown',
                        title: 'font-bold text-lg',
                        htmlContainer: 'text-base',
                    },
                    iconHtml: `
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#1a7f37" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" fill="#1a7f37"/>
                            <path d="M9 12l2 2l4 -4" stroke="#fff" stroke-width="2.5" fill="none"/>
                        </svg>
                    `,
                });
            });
        </script>
    @endif

    @if (session('deleted'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    text: '{{ session('deleted') }}',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2200,
                    timerProgressBar: true,
                    toast: true,
                    position: 'top',
                    background: '#fff0f0',
                    color: '#d32f2f',
                    customClass: {
                        popup: 'shadow-2xl rounded-xl animate__animated animate__fadeInDown',
                        title: 'font-bold text-lg',
                        htmlContainer: 'text-base',
                    },
                    iconHtml: `
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d32f2f" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" fill="#d32f2f"/>
                            <path d="M9 12l2 2l4 -4" stroke="#fff" stroke-width="2.5" fill="none"/>
                        </svg>
                    `,
                });
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    text: '{{ session('success') }}',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1800,
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
