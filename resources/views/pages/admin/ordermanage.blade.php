@section('title', 'Andalaswheel || Order Management')
@push('head')
    <title>Andalaswheel | Order Management</title>
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
                    <h1 class="text-3xl font-bold text-blue-800 drop-shadow-lg">Order Management</h1>
                    {{-- Tambahkan tombol/info lain di kanan header jika perlu --}}
                </div>
            </header>

            <main class="p-6 min-h-screen">
                {{-- Search and Add Button --}}
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                    {{-- Search Bar --}}
                    <div class="relative flex-1 max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text"
                               placeholder="Cari Order ID atau Nama Pemesan"
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    {{-- Add Order Button --}}
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors flex items-center gap-2">
                        <i class="fas fa-plus"></i>
                        Tambah Order
                    </button>
                </div>

                {{-- Filter Component --}}
                <x-filterorder />
                {{-- Order Table --}}
                @include('components.table.admin.ordertable')
            </main>
        </div>
    </div>
</x-app-layout>
