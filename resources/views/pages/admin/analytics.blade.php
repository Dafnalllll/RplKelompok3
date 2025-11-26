@section('title', 'Andalaswheel | Analytics')
@push('head')
    <title>Andalaswheel || Analytics</title>
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
                    <h1 class="text-3xl font-bold text-blue-800 drop-shadow-lg">Analytics</h1>
                    {{-- Tambahkan tombol/info lain di kanan header jika perlu --}}
                </div>
            </header>

            <main class="p-6 min-h-screen">
                {{-- Grafik Stok Motor & Grafik Order (sebaris) --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    @include('components.admin.analyticssection.graphproduct')
                    @include('components.admin.analyticssection.graphorder')
                    @include('components.admin.analyticssection.graphprofit')
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
