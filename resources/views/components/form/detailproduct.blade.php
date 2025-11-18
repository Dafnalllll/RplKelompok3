{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\form\detailproduct.blade.php --}}
@php
// Contoh data dummy produk
$product = [
    'name' => 'Yamaha NMAX 2023',
    'image' => asset('img/nmax2023.jpg'),
    'price' => 32000000,
    'category' => 'Matic Premium',
    'year' => 2023,
    'stock' => 12,
    'description' => 'Yamaha NMAX 2023 hadir dengan desain modern, mesin Blue Core 155cc, fitur VVA, dan bagasi luas. Cocok untuk harian maupun touring.',
    'features' => [
        'Mesin Blue Core 155cc',
        'Fitur VVA (Variable Valve Actuation)',
        'Bagasi 23 liter',
        'Smart Key System',
        'ABS Dual Channel',
    ],
];
@endphp

<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8 flex flex-col md:flex-row gap-8 mt-8">
    {{-- Gambar Produk --}}
    <div class="flex-1 flex items-center justify-center">
        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="rounded-xl w-full max-w-xs object-cover shadow-md border">
    </div>
    {{-- Detail Produk --}}
    <div class="flex-1 flex flex-col justify-between">
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-blue-900 mb-2">{{ $product['name'] }}</h2>
            <div class="flex items-center gap-3 mb-4">
                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                    {{ $product['category'] }}
                </span>
                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-semibold">
                    Tahun {{ $product['year'] }}
                </span>
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                    Stok: {{ $product['stock'] }}
                </span>
            </div>
            <div class="text-2xl font-bold text-red-600 mb-4">
                Rp {{ number_format($product['price'], 0, ',', '.') }}
            </div>
            <p class="text-gray-700 mb-4">{{ $product['description'] }}</p>
            <ul class="mb-6">
                @foreach($product['features'] as $feature)
                    <li class="flex items-center gap-2 text-gray-600 mb-1">
                        <i class="fa fa-check-circle text-blue-500"></i> {{ $feature }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="flex gap-3 mt-4">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold shadow transition flex items-center gap-2">
                <i class="fa fa-shopping-cart"></i> Beli Sekarang
            </button>
            <button class="bg-gray-200 hover:bg-gray-300 text-blue-700 px-6 py-2 rounded-lg font-semibold rounded-lg shadow transition flex items-center gap-2">
                <i class="fa fa-heart"></i> Wishlist
            </button>
        </div>
    </div>
</div>
