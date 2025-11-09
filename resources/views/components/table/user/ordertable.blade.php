{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\table\user\ordertable.blade.php --}}
@php
    $products = [
        [
            'name' => 'Honda Beat',
            'image' => 'img/motor/hondabeat.webp',
            'type' => 'Matic',
            'year' => 2022,
            'price' => 60000,
            'desc' => 'Irit, ringan, cocok untuk harian dan mahasiswa.',
        ],
        [
            'name' => 'Yamaha Mio',
            'image' => 'img/motor/yamahamio.webp',
            'type' => 'Matic',
            'year' => 2021,
            'price' => 55000,
            'desc' => 'Desain stylish, nyaman untuk perjalanan jauh.',
        ],
        [
            'name' => 'Honda Vario 125',
            'image' => 'img/motor/hondavario125.webp',
            'type' => 'Matic',
            'year' => 2023,
            'price' => 70000,
            'desc' => 'Performa tinggi, bagasi luas, cocok untuk keluarga.',
        ],
        [
            'name' => 'Yamaha NMAX',
            'image' => 'img/motor/yamahanmax.webp',
            'type' => 'Matic',
            'year' => 2022,
            'price' => 120000,
            'desc' => 'Matic premium, nyaman dan bertenaga.',
        ],
        [
            'name' => 'Honda Supra X 125',
            'image' => 'img/motor/hondasuprax125.webp',
            'type' => 'Bebek',
            'year' => 2020,
            'price' => 50000,
            'desc' => 'Motor bebek legendaris, irit dan bandel.',
        ],
    ];
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($products as $product)
    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 flex flex-col items-center p-7 relative group overflow-hidden">
        {{-- Decorative gradient circle --}}
        <div class="absolute -top-10 -left-10 w-32 h-32 bg-gradient-to-br from-yellow-200 via-yellow-100 to-white rounded-full opacity-40 z-0"></div>
        <div class="w-full flex justify-center mb-4 z-10">
            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="w-36 h-28 object-contain  group-hover:scale-110 transition-transform duration-300 bg-white/80 p-2">
        </div>
        <div class="w-full text-center z-10">
            <h3 class="font-extrabold text-2xl text-[#21408E] mb-1 tracking-tight">{{ $product['name'] }}</h3>
            <div class="flex justify-center gap-2 text-xs text-gray-500 mb-2">
                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-semibold shadow-sm">{{ $product['type'] }}</span>
                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full font-semibold shadow-sm">{{ $product['year'] }}</span>
            </div>
            <div class="text-yellow-600 font-extrabold text-xl mb-2 drop-shadow">Rp {{ number_format($product['price'], 0, ',', '.') }} <span class="font-normal text-sm">/ hari</span></div>
            <p class="text-gray-600 text-sm mb-5">{{ $product['desc'] }}</p>
            <button class="bg-yellow-400 hover:bg-yellow-500 text-[#21408E] font-bold px-7 py-2 rounded-full shadow-lg transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                <i class="fa-solid fa-cart-plus mr-2"></i> Pilih Motor
            </button>
        </div>
        <div class="absolute bottom-4 right-4 z-0">
            <i class="fa-solid fa-motorcycle text-blue-100 text-4xl opacity-20"></i>
        </div>
    </div>
    @endforeach
</div>

{{-- Lihat Selengkapnya --}}
<div class="flex justify-center mt-10">
    <a href="{{ url('/produk') }}"
       class="inline-flex items-center gap-2 bg-[#21408E] hover:bg-yellow-400 text-white hover:text-[#21408E] font-bold px-8 py-3 rounded-full shadow-lg transition-all duration-300 text-lg group">
        Lihat Selengkapnya
        <i class="fa-solid fa-arrow-right-long group-hover:translate-x-1 transition-transform"></i>
    </a>
</div>
