@section('title', 'Andalaswheel | Analytics')
@push('head')
    <title>Andalaswheel | Analytics</title>
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

            {{-- Analytics Content --}}
            <main class="p-6">
                {{-- Page Title --}}
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-blue-800">Analytics</h1>
                </div>

                {{-- Grafik Stok Motor --}}
                @include('components.admin.analyticssection.graph')

            </main>
        </div>
    </div>
</x-app-layout>
