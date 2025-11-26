@section('title', 'Andalaswheel | Dashboard Admin')
@push('head')
    <title>Andalaswheel || Dashboard Admin</title>
    <link rel="icon" type="image/webp" href="{{ asset('img/andalaswheels.webp') }}">
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
                    <h1 class="text-3xl font-bold text-blue-800 drop-shadow-lg">Dashboard</h1>
                    {{-- Tambahkan tombol/info lain di kanan header jika perlu --}}
                </div>
            </header>

            <main class="p-6 min-h-screen">
                {{-- Stats Cards --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    {{-- Total Order --}}
                    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500 hover:scale-105 duration-300 transition-all cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-medium mb-1">Total Order</p>
                                <p class="text-3xl font-bold text-gray-800">50</p>
                                <div class="flex items-center mt-2">
                                    <i class="fas fa-arrow-down text-red-500 text-xs mr-1"></i>
                                    <span class="text-red-500 text-sm">1.02%</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clipboard-list text-purple-500 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Total Produk --}}
                    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-orange-500 hover:scale-105 duration-300 transition-all cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-medium mb-1">Total Produk</p>
                                <p class="text-3xl font-bold text-gray-800">70</p>
                                <div class="flex items-center mt-2">
                                    <i class="fas fa-arrow-down text-red-500 text-xs mr-1"></i>
                                    <span class="text-red-500 text-sm">3.20%</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-box text-orange-500 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Total User --}}
                    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500 hover:scale-105 duration-300 transition-all cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-medium mb-1">Total User</p>
                                <p class="text-3xl font-bold text-gray-800">150</p>
                                <div class="flex items-center mt-2">
                                    <i class="fas fa-arrow-up text-green-500 text-xs mr-1"></i>
                                    <span class="text-green-500 text-sm">2.45%</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-blue-500 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Total Revenue --}}
                    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500 hover:scale-105 duration-300 transition-all cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-medium mb-1">Total Revenue</p>
                                <p class="text-3xl font-bold text-gray-800">130</p>
                                <div class="flex items-center mt-2">
                                    <i class="fas fa-arrow-up text-green-500 text-xs mr-1"></i>
                                    <span class="text-green-500 text-sm">2.45%</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chart-line text-green-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Aktivitas Terkini Section --}}
                <section class="mb-8">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Aktivitas Terkini</h2>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                        {{-- User Registration --}}
                        @include('components.admin.tableactivity.useractivity')

                        {{-- Stok Produk Tersisa --}}
                        @include('components.admin.tableactivity.productactivity')
                    </div>
                    <div class="w-full">
                        @include('components.admin.tableactivity.orderactivity')
                    </div>
                </section>
            </main>
        </div>
    </div>
</x-app-layout>
