{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\form\admin\editproduct.blade.php --}}

<div>
    <div x-show="{{ $open }}" class="fixed inset-0  z-40 flex items-center justify-center" x-cloak>
        <div @click.away="{{ $open }} = false"
            class="bg-white rounded-2xl shadow-2xl p-10 w-full max-w-3xl relative transition-all duration-300"
            style="min-width:600px;">
            <button @click="{{ $open }} = false" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-xl">
                <i class="fas fa-times"></i>
            </button>
            <h2 class="text-2xl font-bold text-blue-800 mb-6 flex items-center gap-2">
                <i class="fas fa-edit text-blue-500"></i>
                Edit Product
            </h2>
            <form method="POST" action="{{ route('productmanage.update', $product['id']) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Nama Produk</label>
                            <input type="text" name="name" value="{{ $product['name'] }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400" placeholder="Nama Produk">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Kategori</label>
                            <select name="category_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($product['category_id'] == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Harga</label>
                            <input type="number" name="price" value="{{ $product['price'] }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400" placeholder="Harga">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Stok</label>
                            <input type="number" name="stock" value="{{ $product['stock'] }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400" placeholder="Stok">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Tahun Keluaran</label>
                            <input type="number" name="year" value="{{ $product['year'] ?? '' }}" min="1900" max="{{ date('Y') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                                placeholder="Contoh: 2022">
                        </div>
                    </div>
                    <div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                            <textarea name="description" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400" placeholder="Deskripsi">{{ $product['description'] }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-semibold mb-2">Gambar Produk</label>
                            <div class="flex flex-col items-center gap-3">
                                @if(!empty($product['image']))
                                    <img src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] }}" class="w-32 h-32 object-cover rounded-lg shadow border border-blue-200">
                                @else
                                    <div class="w-32 h-32 flex items-center justify-center bg-blue-50 rounded-lg border border-blue-100 text-blue-300 text-4xl">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                                <label class="cursor-pointer bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-semibold shadow transition-all duration-200">
                                    <i class="fas fa-upload mr-2"></i> Ganti Gambar
                                    <input type="file" name="image" class="hidden" accept="image/*">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" @click="{{ $open }} = false"
                        class="px-5 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 font-semibold">
                        Batal
                    </button>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold shadow transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Alpine.js CDN (jika belum ada di layout) -->
<script src="//unpkg.com/alpinejs" defer></script>
