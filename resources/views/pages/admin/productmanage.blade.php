@section('title', 'Andalaswheel | Product Management')
@push('head')
    <title>Andalaswheel | Product Management</title>
    <link rel="icon" type="image/png" href="{{ asset('img/andalaswheels.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush

<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        {{-- Sidebar --}}
        @include('components.sidebar')

        {{-- Main Content --}}
        <div class="flex-1">
            {{-- Header --}}
            <header class="bg-yellow-400 px-6 py-4 shadow-sm">
                <div class="flex justify-end items-center">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Andalaswheel</h3>
                            <p class="text-sm text-gray-600">Admin Andalaswheel</p>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Product Management Content --}}
            <main class="p-6">
                {{-- Page Title --}}
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-blue-800">Produk Management</h1>
                </div>

                {{-- Search and Add Button --}}
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                    {{-- Search Bar --}}
                    <div class="relative flex-1 max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text"
                               placeholder="Cari Produk"
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    {{-- Add Product Button --}}
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors flex items-center gap-2">
                        <i class="fas fa-plus"></i>
                        Tambah Produk
                    </button>
                </div>

                {{-- Product Table --}}
                @include('components.table.admin.producttable')

                {{-- Pagination --}}
                <div class="flex items-center justify-center mt-8 space-x-2">
                    {{-- Previous Button --}}
                    <button class="w-10 h-10 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-50 transition-colors">
                        <i class="fas fa-chevron-left text-gray-400 text-sm"></i>
                    </button>

                    {{-- Page Numbers --}}
                    @for($page = 1; $page <= 7; $page++)
                        @if($page == 1)
                            <button class="w-10 h-10 bg-blue-600 text-white rounded-lg font-medium">{{ $page }}</button>
                        @elseif($page <= 5)
                            <button class="w-10 h-10 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-gray-600">{{ $page }}</button>
                        @elseif($page == 6)
                            <span class="w-10 h-10 flex items-center justify-center text-gray-400">...</span>
                        @else
                            <button class="w-10 h-10 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-gray-600">></button>
                        @endif
                    @endfor
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
