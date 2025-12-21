{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\form\admin\productdetail.blade.php --}}
<div x-data="{ open: false }">
    <!-- Tombol untuk membuka modal detail -->
    <button @click="open = true"
        class="inline-flex items-center gap-2 px-5 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white font-semibold hover:scale-105 transition-all">
        <i class="fas fa-eye"></i> Detail
    </button>

    <!-- Modal Detail Produk -->
    <div x-show="open" x-cloak>
        <!-- Overlay -->
        <div class="fixed inset-0 z-40"></div>
        <!-- Modal -->
        <div class="fixed inset-0 z-50 flex items-center justify-center">
            <div @click.away="open = false"
                class="bg-white rounded-2xl shadow-2xl p-8 relative overflow-y-auto"
                style="width:100%;max-width:700px;min-width:350px;position:fixed;left:50%;top:50%;transform:translate(-50%,-50%);">
                <!-- Tombol close -->
                <button @click="open = false"
                    class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-2xl font-bold focus:outline-none">&times;</button>
                <div class="flex flex-col sm:flex-row gap-8 items-center">
                    <!-- Foto Produk -->
                    <div>
                        @if(!empty($product['image']))
                            <img src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] }}"
                                class="w-40 h-40 object-cover rounded-xl bg-white">
                        @else
                            <div class="w-40 h-40 rounded-xl bg-blue-100 flex items-center justify-center text-blue-400 text-6xl border-4 border-blue-50 shadow">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                    </div>
                    <!-- Info Produk -->
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-blue-800 mb-2 flex items-center gap-2">
                            <i class="fas fa-motorcycle"></i> {{ $product['name'] }}
                        </h2>
                        <div class="mb-2">
                            <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
                                {{ $product['category']['name'] ?? '-' }}
                            </span>
                            @if(!empty($product['year']))
                                <span class="inline-block px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold ml-2">
                                    {{ $product['year'] }}
                                </span>
                            @endif
                        </div>
                        <div class="mb-2 text-gray-700">
                            <span class="font-semibold">Harga:</span>
                            <span class="text-blue-700 font-bold">Rp{{ number_format($product['price'], 0, ',', '.') }}</span>
                        </div>
                        <div class="mb-2 text-gray-700">
                            <span class="font-semibold">Stok:</span>
                            <span class="text-green-700 font-bold">{{ $product['stock'] }}</span>
                        </div>
                        <div class="mb-2 text-gray-700">
                            <span class="font-semibold">Status:</span>
                            @if($product['stock'] > 0)
                                <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">In Stock</span>
                            @else
                                <span class="inline-block px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">Out of Stock</span>
                            @endif
                        </div>
                        <div class="mb-2 text-gray-700">
                            <span class="font-semibold">Deskripsi:</span>
                            <div class="mt-1 text-gray-600 break-words">
                                {{ $product['description'] ?: 'Deskripsi belum tersedia.' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
