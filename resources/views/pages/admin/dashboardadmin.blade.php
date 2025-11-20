@section('title', 'Andalaswheel | Dashboard Admin')
@push('head')
    <title>Andalaswheel | Dashboard Admin</title>
    <link rel="icon" type="image/webp" href="{{ asset('img/andalaswheels.webp') }}">
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

            {{-- Dashboard Content --}}
            <main class="p-6">
                {{-- Page Title --}}
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-blue-800">Dashboard</h1>
                </div>

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

                    {{-- Row 1: User Registration & Product Stock --}}
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                        {{-- User Registration --}}
                        @include('components.admin.tableactivity.useractivity')

                        {{-- Stok Produk Tersisa --}}
                        @include('components.admin.tableactivity.productactivity')
                    </div>

                    {{-- Row 2: Order Section (Full Width) --}}
                    <div class="w-full">
                        @include('components.admin.tableactivity.orderactivity')
                    </div>
                </section>
            </main>
        </div>
    </div>
</x-app-layout>
