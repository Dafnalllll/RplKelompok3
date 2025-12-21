{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\user\detailhistory.blade.php --}}
@section('title', 'Andalas Wheels || Detail History')

@push('head')
    <link rel="icon" type="image/webp" href="{{ asset('img/andalaswheels.webp') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush

<x-app-layout>
    @include('components.user.navbar')
    <div class="fixed inset-0 -z-10">
        <img src="{{ asset('img/order.webp') }}"
             alt="Motorcycle Background"
             class="w-full h-full object-cover object-center" />
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
    </div>

    <div data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000" class="max-w-4xl mx-auto py-10 px-4 border border-gray-300 rounded-2xl bg-gradient-to-br from-blue-100 via-yellow-50 to-blue-200 mt-24">
        {{-- Breadcrumb --}}
        <nav class="text-sm text-gray-500 mb-6 ml-6">
            <ol class="list-reset flex">
                <li><a href="/dashboard" class="hover:underline">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="/history" class="hover:underline">History</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="font-semibold text-[#21408E]">Detail History</li>
            </ol>
        </nav>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            {{-- Gambar produk --}}
            <div class="flex flex-col items-center">
                <div class="p-6 flex items-center justify-center w-full mt-12">
                    <img src="{{ asset('storage/dummy/motor.jpg') }}"
                        alt="Yamaha Aerox 155"
                        class="w-full max-w-md h-full object-contain rounded-lg bg-transparent border border-gray-300 transition-all duration-300 hover:shadow-xl hover:border-blue-400" />
                </div>
            </div>
            {{-- Detail history --}}
            <div class="p-8 flex flex-col justify-center">
                <h2 class="text-3xl font-bold text-[#21408E] mb-4">Yamaha Aerox 155</h2>
                <div class="flex items-center gap-4 mb-3 text-gray-600">
                    <span class="text-green-600 font-semibold">Selesai</span>
                    <span class="ml-4 px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">2022</span>
                    <span class="ml-2 px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">Motorcycle</span>
                </div>
                <div class="text-lg font-bold text-yellow-600 mb-2">
                    Rp 95.000 / hari
                </div>
                <div class="mb-2 text-gray-700">
                    <span class="font-semibold">Jumlah Unit:</span> 2
                </div>
                <div class="mb-2 text-gray-700">
                    <span class="font-semibold">Metode Pembayaran:</span> Transfer
                </div>
                <div class="mb-2 text-gray-700">
                    <span class="font-semibold">Jadwal Sewa:</span> 05 Desember 2025
                </div>
                <div class="mb-2 text-gray-700">
                    <span class="font-semibold">Tanggal Return:</span> 10 Desember 2025
                </div>
                <div class="mb-2 text-gray-700">
                    <span class="font-semibold">Total Harga:</span>
                    <span class="text-xl font-bold text-yellow-600">Rp 950.000</span>
                </div>
            </div>
        </div>
        {{-- Deskripsi Produk --}}
        <div class="bg-gray-50 rounded-xl shadow p-8 mt-10">
            <h3 class="text-2xl font-bold text-[#21408E] mb-4">Deskripsi & Spesifikasi</h3>
            <p class="mb-3 text-gray-700 text-lg">Motor matic sporty, cocok untuk harian dan touring. Mesin 155cc, VVA, bagasi luas, desain modern.</p>
        </div>
    </div>
    <script>
      AOS.init();
    </script>
</x-app-layout>
