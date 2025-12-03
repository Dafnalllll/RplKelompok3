{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\form\admin\deleteproduct.blade.php --}}

<div x-data>
    <!-- Modal Overlay -->
    <div x-show="{{ $open }}" class="fixed inset-0  z-50 flex items-center justify-center" x-cloak>
        <!-- Modal Content -->
        <div @click.away="{{ $open }} = false" class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md relative">
            <button @click="{{ $open }} = false" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-xl">
                <i class="fas fa-times"></i>
            </button>
            <div class="flex flex-col items-center">
                <div class="bg-red-100 rounded-full p-4 mb-4">
                    <i class="fas fa-exclamation-triangle text-red-600 text-3xl"></i>
                </div>
                <h2 class="text-xl font-bold text-red-700 mb-2">Hapus Produk?</h2>
                <p class="text-gray-600 mb-6 text-center">
                    Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.
                </p>
                <form method="POST" action="{{ route('productmanage.delete', $product['id']) }}">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-center gap-3">
                        <button type="button" @click="{{ $open }} = false"
                            class="px-5 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 font-semibold">
                            Batal
                        </button>
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold shadow transition">
                            Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Alpine.js CDN (jika belum ada di layout) -->
