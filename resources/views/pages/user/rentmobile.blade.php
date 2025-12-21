<div class="block md:hidden">
    {{-- Breadcrumb Mobile --}}
    <nav class="text-xs text-gray-500 mb-4 ml-2">
        <ol class="list-reset flex flex-wrap">
            <li><a href="/dashboard" class="hover:underline">Beranda</a></li>
            <li><span class="mx-1">/</span></li>
            <li><a href="/product" class="hover:underline">Motorcycle</a></li>
            <li><span class="mx-1">/</span></li>
            <li class="font-semibold text-[#21408E]">{{ $product['name'] }}</li>
        </ol>
    </nav>
    <div class="flex flex-col gap-6 ">
        {{-- Gambar utama --}}
        <div class="flex flex-col items-center">
            <div class="p-2 flex items-center justify-center w-full mt-24">
                <img src="{{ asset('storage/' . $product['image']) }}"
                    alt="{{ $product['name'] }}"
                    class="w-52 h-52 object-contain rounded-lg bg-transparent transition-all duration-300 hover:shadow-xl hover:border-blue-400" />
            </div>
        </div>
        {{-- Detail produk --}}
        <div class="p-2 flex flex-col justify-center">
            <h2 class="text-xl font-bold text-[#21408E] mb-2">{{ $product ['name'] }}</h2>
            <div class="flex flex-wrap items-center gap-2 mb-2 text-gray-600 text-sm">
                @if($product['stock'] > 0)
                    <span class="text-green-600 font-semibold">In Stock</span>
                @else
                    <span class="text-red-600 font-semibold">Out Stock</span>
                @endif
                <span class="px-2 py-0.5 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                    {{ $product ['year'] }}
                </span>
                <span class="px-2 py-0.5 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">
                    {{ $product['category']['name'] }}
                </span>
            </div>
            <div class="text-lg font-bold text-yellow-600 mb-2">
                Rp {{ number_format($product['price'], 0, ',', '.') }}
            </div>
            <div class="mb-2 text-gray-500 text-sm">
                Tersedia {{ $product['stock'] }} unit
            </div>
            {{-- Fitur Perhari & Perbulan --}}
            <div class="flex items-center gap-3 mb-2">
                <label class="flex items-center gap-1">
                    <input type="radio" name="rent_type_mobile" value="day" checked onchange="updatePriceAll()" class="accent-[#21408E]">
                    <span class="text-xs font-medium">Per Hari</span>
                </label>
                <label class="flex items-center gap-1">
                    <input type="radio" name="rent_type_mobile" value="month" onchange="updatePriceAll()" class="accent-[#21408E]">
                    <span class="text-xs font-medium">Per Bulan</span>
                </label>
            </div>
            <div class="flex flex-wrap gap-3 mb-2">
                {{-- Jumlah Hari --}}
                <div class="flex flex-col items-start">
                    <label class="text-xs font-medium mb-1">Jumlah Hari</label>
                    <div class="flex items-center border rounded-lg px-2 py-1 w-24 justify-between bg-white shadow">
                        <button type="button" class="text-lg px-1 text-gray-500 hover:text-[#21408E]" onclick="changeDays(-1, true)">−</button>
                        <span id="daysMobile" class="font-semibold">1</span>
                        <button type="button" class="text-lg px-1 text-gray-500 hover:text-[#21408E]" onclick="changeDays(1, true)">+</button>
                    </div>
                </div>
                {{-- Jumlah Bulan --}}
                <div class="flex flex-col items-start">
                    <label class="text-xs font-medium mb-1">Jumlah Bulan</label>
                    <div class="flex items-center border rounded-lg px-2 py-1 w-24 justify-between bg-white shadow">
                        <button type="button" class="text-lg px-1 text-gray-500 hover:text-[#21408E]" onclick="changeMonths(-1, true)">−</button>
                        <span id="monthsMobile" class="font-semibold">1</span>
                        <button type="button" class="text-lg px-1 text-gray-500 hover:text-[#21408E]" onclick="changeMonths(1, true)">+</button>
                    </div>
                </div>
                {{-- Jumlah Unit --}}
                <div class="flex flex-col items-start">
                    <label class="text-xs font-medium mb-1">Jumlah Unit</label>
                    <div class="flex items-center border rounded-lg px-2 py-1 w-24 justify-between bg-white shadow">
                        <button type="button" id="btn-units-minus-mobile" class="text-lg px-1 text-gray-500 hover:text-[#21408E]" onclick="changeUnits(-1, true)">−</button>
                        <span id="unitsMobile" class="font-semibold">1</span>
                        <button type="button" id="btn-units-plus-mobile" class="text-lg px-1 text-gray-500 hover:text-[#21408E]" onclick="changeUnits(1, true)">+</button>
                    </div>
                    <span id="units-alert-mobile" class="text-xs text-red-500 mt-1" style="display:none;">Jumlah Unit Telah Melebihi stok!</span>
                </div>
            </div>
            {{-- Jadwal Sewa --}}
            <div class="flex flex-col items-start mb-2">
                <label for="start_date_mobile" class="text-xs font-medium mb-1">Pilih Jadwal Sewa</label>
                <div class="flex items-center gap-2">
                    <input type="date" id="start_date_mobile" name="start_date_mobile"
                        class="border rounded-lg px-2 py-1 w-36 bg-white shadow"
                        min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                        onchange="updateReturnDateAll()">
                    <button type="button" id="resetBtnMobile" class="bg-gray-300 text-gray-700 px-2 py-1 rounded-lg font-semibold hover:bg-gray-400 transition-all shadow text-xs">
                        Reset
                    </button>
                </div>
                <span id="schedule-alert-mobile" class="text-xs text-red-500 mt-2 hidden">Silakan pilih jadwal sewa terlebih dahulu!</span>
            </div>
            {{-- Tanggal Return --}}
            <div class="flex flex-col items-start mb-2">
                <label class="text-xs font-medium mb-1">Tanggal Return</label>
                <div class="text-base font-semibold text-blue-700" id="return_date_mobile">-</div>
            </div>
            {{-- Total Harga --}}
            <div class="flex flex-col items-start mb-2">
                <div class="flex items-center justify-between w-full">
                    <span class="text-xs text-gray-500">Total Harga:</span>
                    <span class="text-lg font-bold text-yellow-600" id="totalPriceMobile">Rp 0</span>
                </div>
            </div>
            {{-- Tombol Sewa Sekarang --}}
            <div class="flex gap-2 mb-2">
                <form method="POST" action="{{ route('order.store') }}" class="w-full">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <input type="hidden" name="qty" id="qty_input_mobile" value="1">
                    <input type="hidden" name="start_date" id="start_date_input">
                    <input type="hidden" name="end_date" id="end_date_input">
                    <input type="hidden" name="total_price" id="total_price_input">
                    <input type="hidden" name="status" value="pending">
                    <input type="hidden" name="payment" id="payment_input">
                    <input type="hidden" name="detail" value="{{ $product['name'] }}">
                    <button type="submit"
                        id="rentNowBtnMobile"
                        class="bg-[#21408E] text-white px-4 py-2 w-full rounded-lg font-semibold hover:bg-yellow-400 hover:text-[#21408E] transition-all hover:scale-105 shadow-md text-center text-sm">
                        Rent Now
                    </button>
                </form>
            </div>
            {{-- Metode Pembayaran --}}
            <div class="flex flex-col items-start mb-2">
                <label class="text-xs font-medium mb-1">Metode Pembayaran</label>
                <div class="flex gap-3">
                    <label class="flex items-center gap-1">
                        <input type="radio" name="payment_method_mobile" value="cash" checked class="accent-[#21408E]" onchange="toggleWaInfoMobile()">
                        <span>Cash</span>
                    </label>
                    <label class="flex items-center gap-1">
                        <input type="radio" name="payment_method_mobile" value="transfer" class="accent-[#21408E]" onchange="toggleWaInfoMobile()">
                        <span>Transfer</span>
                    </label>
                </div>
                <div id="wa-info-mobile" class="mt-3 flex items-center gap-2 bg-green-50 border border-green-200 rounded-lg px-3 py-2" style="display:flex;">
                    <i class="fab fa-whatsapp text-green-600 text-xl"></i>
                    <span class="text-green-900 text-xs">
                        Untuk Konfirmasi Pembayaran, Hubungi Kami Di
                        <a href="https://wa.me/6281234567890" target="_blank" class="underline font-semibold">0812-3456-7890</a>
                    </span>
                </div>
                <div class="mt-3 flex items-center gap-2 bg-blue-50 border border-blue-200 rounded-lg px-3 py-2">
                    <img src="{{ asset('img/bank-mandiri.png') }}" alt="Bank Mandiri" class="w-8 h-8 object-contain" />
                    <div>
                        <div class="font-semibold text-blue-900 text-xs">Bank Mandiri</div>
                        <div class="text-xs text-gray-700">No. Rekening: <span class="font-mono">1234567890</span></div>
                        <div class="text-[10px] text-gray-500">a.n. PT Andalas Wheels</div>
                    </div>
                </div>
            </div>
            <script>
            function toggleWaInfoMobile() {
                const cash = document.querySelector('input[name="payment_method_mobile"][value="cash"]').checked;
                document.getElementById('wa-info-mobile').style.display = cash ? 'flex' : 'none';
            }
            document.addEventListener('DOMContentLoaded', toggleWaInfoMobile);
            </script>
        </div>
    </div>
</div>
