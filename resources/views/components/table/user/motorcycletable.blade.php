{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\table\user\motorcycletable.blade.php --}}

@php
    // Ambil 6 produk terbaru dari database
    $products = \App\Models\Product::orderBy('created_at', 'desc')->take(3)->get();
@endphp

@if($products->isEmpty())
    <div class="text-center text-gray-400 text-xl font-semibold py-16">
        <i class="fa fa-motorcycle text-5xl mb-4"></i>
        <div>Belum Ada Motor</div>
    </div>
@else
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($products as $product)
    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 flex flex-col items-center p-7 relative group overflow-hidden">
        {{-- Decorative gradient circle --}}
        <div class="absolute -top-10 -left-10 w-32 h-32 bg-gradient-to-br from-yellow-200 via-yellow-100 to-white rounded-full opacity-40 z-0"></div>
        <div class="w-full flex justify-center mb-4 z-10">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-36 h-28 object-contain group-hover:scale-110 transition-transform duration-300 bg-white/80 p-2">
        </div>
        <div class="w-full text-center z-10">
            <h3 class="font-extrabold text-2xl text-[#21408E] mb-1 tracking-tight">{{ $product->name }}</h3>
            <div class="flex justify-center gap-2 text-xs text-gray-500 mb-2">
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold shadow-sm">{{ $product->category->name ?? '-' }}</span>
                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full font-semibold shadow-sm">{{ $product->year }}</span>
            </div>
            <div class="text-yellow-600 font-extrabold text-xl mb-2 drop-shadow">Rp {{ number_format($product->price, 0, ',', '.') }} <span class="font-normal text-sm">/ hari</span></div>
            <div class="text-gray-500 text-sm mb-2">Stok: <span class="font-semibold">{{ $product->stock }}</span></div>
            <div class="flex flex-col gap-2">
                <a href="{{ url('/product/rent/' . $product->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-[#21408E] font-bold px-7 py-2 rounded-full shadow-lg transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                    <i class="fa-solid fa-cart-plus mr-2"></i> Rent Now
                </a>
            </div>
        </div>
        <div class="absolute bottom-4 right-4 z-0">
            <i class="fa-solid fa-motorcycle text-blue-100 text-4xl opacity-20"></i>
        </div>
    </div>
    @endforeach
</div>

<div class="flex justify-center mt-10">
    <a href="{{ url('/product') }}"
       class="inline-flex items-center gap-2 bg-[#21408E] hover:bg-yellow-400 text-white hover:text-[#21408E] font-bold px-8 py-3 rounded-full shadow-lg transition-all duration-300 text-lg group">
        Lihat Selengkapnya
        <i class="fa-solid fa-arrow-right-long group-hover:translate-x-1 transition-transform"></i>
    </a>
</div>
@endif


