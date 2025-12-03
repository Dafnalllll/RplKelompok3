{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\table\admin\producttable.blade.php --}}

<div
    x-data="{
        page: 1,
        perPage: 5,
        get totalPages() {
            return Math.ceil(filtered.length / this.perPage) || 1;
        },
        get paginated() {
            const start = (this.page - 1) * this.perPage;
            return filtered.slice(start, start + this.perPage);
        }
    }"
    class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl p-8"
>
    <h3 class="text-2xl font-bold text-blue-800 mb-6 flex items-center gap-2">
        <i class="fas fa-motorcycle text-blue-500"></i>
        Produk List
    </h3>

    <div class="overflow-x-auto rounded-xl border border-gray-200 shadow">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gradient-to-r from-blue-100 to-yellow-50 text-gray-700">
                    <th class="py-4 px-4 text-left font-semibold">FOTO</th>
                    <th class="py-4 px-4 text-left font-semibold">NAMA PRODUK</th>
                    <th class="py-4 px-4 text-left font-semibold">KATEGORI</th>
                    <th class="py-4 px-4 text-left font-semibold">HARGA</th>
                    <th class="py-4 px-4 text-left font-semibold">STOK</th>
                    <th class="py-4 px-4 text-left font-semibold">STATUS</th>
                    <th class="py-4 px-4 text-left font-semibold">DETAIL</th>
                    <th class="py-4 px-4 text-left font-semibold">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <template x-if="paginated.some(p => p.id === {{ $product->id }})">
                        <tr class="border-b hover:bg-blue-50 transition-colors">
                            {{-- Foto --}}
                            <td class="py-3 px-4">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-14 h-14 object-cover rounded-lg">
                                @else
                                    <div class="w-14 h-14 rounded-lg bg-blue-100 flex items-center justify-center text-blue-400 text-2xl">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </td>
                            {{-- Nama Produk --}}
                            <td class="py-3 px-4 font-medium text-gray-900">{{ $product->name }}</td>
                            {{-- Kategori --}}
                            <td class="py-3 px-4 text-gray-700">{{ $product->category->name ?? '-' }}</td>
                            {{-- Harga --}}
                            <td class="py-3 px-4 text-blue-700 font-semibold">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            {{-- Stok --}}
                            <td class="py-3 px-4 text-gray-600">{{ $product->stock }}</td>
                            {{-- Status --}}
                            <td class="py-3 px-4">
                                @if($product->stock > 0)
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">In Stock</span>
                                @else
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">Out Stock</span>
                                @endif
                            </td>
                            {{-- Detail --}}
                            <td class="py-3 px-4">
                                @include('components.form.admin.productdetail', ['product' => $product])
                            </td>
                            {{-- Action --}}
                            <td class="py-3 px-4">
                                <div x-data="{ openDelete: false, openEdit: false }">
                                    <select name="actions[{{ $product->id }}]" x-ref="aksiSelect"
                                        class="border border-blue-400 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 text-gray-700 bg-white shadow transition-all cursor-pointer"
                                        @change="
                                            if($event.target.value === 'edit'){ openEdit = true; }
                                            if($event.target.value === 'delete'){ openDelete = true; }
                                        "
                                    >
                                        <option value="">Pilih Aksi</option>
                                        <option value="edit">Edit</option>
                                        <option value="delete">Delete</option>
                                    </select>
                                    {{-- Import modal delete --}}
                                    @include('components.form.admin.deleteproduct', [
                                        'product' => $product,
                                        'open' => 'openDelete',
                                        'deleteRef' => '$refs.deleteCheckbox'
                                    ])
                                    {{-- Import modal edit --}}
                                    @include('components.form.admin.editproduct', [
                                        'product' => $product,
                                        'categories' => $categories,
                                        'open' => 'openEdit'
                                    ])
                                </div>
                            </td>
                        </tr>
                    </template>
                @endforeach

                <template x-if="paginated.length === 0">
                        <tr>
                            <td colspan="8" class="text-center py-8 text-gray-400 text-lg font-semibold">
                                <i class="fas fa-motorcycle text-2xl mb-2 block"></i>
                                Product Not Found
                            </td>
                        </tr>
                </template>
            </tbody>
        </table>
    </div>

    {{-- Pagination Controls --}}
    <div class="flex justify-center items-center gap-2 mt-6">
        <button type="button"
            class="px-3 py-1 rounded bg-blue-100 text-blue-700 font-semibold hover:bg-blue-200 transition"
            @click="if(page > 1) page--"
            :disabled="page === 1"
        >
            <i class="fas fa-chevron-left"></i>
        </button>
        <template x-for="i in totalPages" :key="i">
            <button type="button"
                class="px-3 py-1 rounded-full font-semibold"
                :class="page === i ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-blue-100'"
                @click="page = i"
                x-text="i"
            ></button>
        </template>
        <button type="button"
            class="px-3 py-1 rounded bg-blue-100 text-blue-700 font-semibold hover:bg-blue-200 transition"
            @click="if(page < totalPages) page++"
            :disabled="page === totalPages"
        >
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</div>
