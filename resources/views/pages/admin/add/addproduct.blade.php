{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\pages\admin\add\addproduct.blade.php --}}
@section('title', 'Andalaswheel || Add Product')
@push('head')
    <title>Andalaswheel || Add Product</title>
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
                    <h1 class="text-3xl font-bold text-blue-800 drop-shadow-lg">Add Product</h1>
                </div>
            </header>

            <main class="p-6 min-h-screen relative">
                <div class="max-w-4xl w-full mx-auto bg-white rounded-2xl shadow-xl p-8">
                    {{-- Tombol Kembali --}}
                    <div class="mb-6 flex justify-center sm:justify-start">
                        <a href="{{ route('productmanage') }}"
                           class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-blue-500 to-blue-700 text-white font-semibold shadow-md hover:scale-105 hover:shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                    <h2 class="text-2xl font-bold text-blue-700 mb-6 flex items-center gap-2">
                        <i class="fas fa-box"></i>Form Product
                    </h2>
                    <form action="{{ route('productmanage.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block font-semibold mb-1 text-blue-900">Nama Produk</label>
                            <input type="text" name="name" required class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label class="block font-semibold mb-1 text-blue-900">Kategori</label>
                            <select name="category_id" required class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block font-semibold mb-1 text-blue-900">Deskripsi</label>
                            <textarea name="description" rows="4" required class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 resize-y"></textarea>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="flex-1">
                                <label class="block font-semibold mb-1 text-blue-900">Harga</label>
                                <input type="number" name="price" min="0" required class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400">
                            </div>
                            <div class="flex-1">
                                <label class="block font-semibold mb-1 text-blue-900">Stok</label>
                                <input type="number" name="stock" min="0" required class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400">
                            </div>
                        </div>
                        <div>
                            <label class="block font-semibold mb-1 text-blue-900">Foto Produk</label>
                            <div x-data="{
                                    fileName: '',
                                    previewUrl: '',
                                    handleFileChange(e) {
                                        const file = e.target.files[0];
                                        if (file) {
                                            this.fileName = file.name;
                                            const reader = new FileReader();
                                            reader.onload = ev => this.previewUrl = ev.target.result;
                                            reader.readAsDataURL(file);
                                        } else {
                                            this.fileName = '';
                                            this.previewUrl = '';
                                        }
                                    },
                                    handleDrop(e) {
                                        e.preventDefault();
                                        const file = e.dataTransfer.files[0];
                                        if (file) {
                                            this.$refs.input.files = e.dataTransfer.files;
                                            this.handleFileChange({ target: { files: e.dataTransfer.files } });
                                        }
                                    },
                                    clearFile() {
                                        this.fileName = '';
                                        this.previewUrl = '';
                                        this.$refs.input.value = '';
                                    }
                                }"
                                class="flex flex-col sm:flex-row items-center gap-6"
                            >
                                <!-- Preview -->
                                <div class="relative">
                                    <template x-if="previewUrl">
                                        <img :src="previewUrl" alt="Preview"
                                            class="w-28 h-28 rounded-full object-cover border-4 border-blue-200 shadow bg-white mx-auto sm:mx-0 transition-all duration-200 hover:scale-105">
                                    </template>
                                    <template x-if="!previewUrl">
                                        <div class="w-28 h-28 rounded-full bg-blue-100 flex items-center justify-center text-blue-400 text-4xl border-4 border-blue-50 shadow mx-auto sm:mx-0">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    </template>
                                    <!-- Tombol X -->
                                    <button type="button" x-show="previewUrl"
                                        @click="clearFile"
                                        class="absolute -top-2 -right-2 bg-white border border-red-200 text-red-500 hover:bg-red-500 hover:text-white rounded-full w-7 h-7 flex items-center justify-center shadow transition-all"
                                        title="Hapus Foto">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- Upload Button & Drag Area -->
                                <div class="flex-1 w-full">
                                    <label @dragover.prevent @drop="handleDrop"
                                        class="block cursor-pointer px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-400 hover:from-blue-600 hover:to-blue-500 text-white rounded-lg font-semibold shadow transition-all duration-200 ring-1 ring-blue-300 hover:ring-2 hover:scale-105 border-2 border-dashed border-blue-300 text-center"
                                    >
                                        <i class="fas fa-upload mr-2"></i>
                                        <span x-text="fileName ? fileName : 'Pilih atau Drag & Drop Foto Produk'"></span>
                                        <input type="file" name="image" accept="image/*" required class="hidden"
                                            x-ref="input"
                                            @change="handleFileChange">
                                    </label>
                                    <p class="text-xs text-gray-500 mt-2">Format: jpg, jpeg, png, webp. Maksimal 5 MB.</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('productmanage') }}" class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition hover:scale-105">Batal</a>
                            <button type="submit"
                                class="px-6 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition hover:scale-105">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    
</x-app-layout>
