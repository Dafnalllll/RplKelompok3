{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\product\filter.blade.php --}}

<style>
.select-wrapper {
    position: relative;
    display: inline-block;
}
.custom-select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    padding-right: 2.5rem !important;
    background: none;
}
.select-arrow {
    pointer-events: none;
    position: absolute;
    right: 1.2rem;
    top: 50%;
    transform: translateY(-50%) rotate(0deg);
    transition: transform 0.3s cubic-bezier(.4,2,.6,1);
    width: 1.2em;
    height: 1.2em;
    color: #21408E;
}
.select-wrapper.open .select-arrow {
    transform: translateY(-50%) rotate(180deg);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.select-wrapper').forEach(function(wrapper) {
        const select = wrapper.querySelector('.custom-select');
        select.addEventListener('mousedown', function(e) {
            wrapper.classList.toggle('open');
        });
        select.addEventListener('blur', function() {
            wrapper.classList.remove('open');
        });
        // Tambahkan event change agar arrow kembali turun setelah memilih
        select.addEventListener('change', function() {
            wrapper.classList.remove('open');
        });
    });
    document.addEventListener('mousedown', function(e) {
        document.querySelectorAll('.select-wrapper.open').forEach(function(wrapper) {
            if (!wrapper.contains(e.target)) {
                wrapper.classList.remove('open');
            }
        });
    });
});
</script>

<form action="{{ url('/product') }}" method="GET" class="max-w-4xl mx-auto mb-10">
    <div class="flex flex-wrap gap-4 justify-center items-center bg-white rounded-2xl shadow-lg px-6 py-5 border border-gray-100">
        {{-- Kategori --}}
        <div class="select-wrapper">
            <select name="category" class="custom-select rounded-full px-5 py-2 border border-gray-200 bg-gray-50 text-gray-700 shadow focus:ring-2 focus:ring-yellow-400 focus:outline-none transition-all duration-200 cursor-pointer">
                <option value="">Semua Kategori</option>
                <option value="Matic" {{ request('category') == 'Matic' ? 'selected' : '' }}>Matic</option>
                <option value="Matic Premium" {{ request('category') == 'Matic Premium' ? 'selected' : '' }}>Matic Premium</option>
                <option value="Bebek" {{ request('category') == 'Bebek' ? 'selected' : '' }}>Bebek</option>
                <option value="Sport" {{ request('category') == 'Sport' ? 'selected' : '' }}>Sport</option>
                <option value="Hybrid" {{ request('category') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
            </select>
            <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
        </div>
        {{-- Tahun --}}
        <div class="select-wrapper">
            <select name="year" class="custom-select rounded-full px-5 py-2 border border-gray-200 bg-gray-50 text-gray-700 shadow focus:ring-2 focus:ring-yellow-400 focus:outline-none transition-all duration-200 cursor-pointer">
                <option value="">Semua Tahun</option>
                @for($y = date('Y'); $y >= 2018; $y--)
                    <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
            </select>
            <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
        </div>
        {{-- Harga --}}
        <div class="select-wrapper">
            <select name="price" class="custom-select rounded-full px-5 py-2 border border-gray-200 bg-gray-50 text-gray-700 shadow focus:ring-2 focus:ring-yellow-400 focus:outline-none transition-all duration-200 cursor-pointer">
                <option value="">Semua Harga</option>
                <option value="1" {{ request('price') == '1' ? 'selected' : '' }}>Di bawah Rp 60.000</option>
                <option value="2" {{ request('price') == '2' ? 'selected' : '' }}>Rp 60.000 - Rp 100.000</option>
                <option value="3" {{ request('price') == '3' ? 'selected' : '' }}>Di atas Rp 100.000</option>
            </select>
            <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
        </div>
        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-[#21408E] font-bold px-6 py-2 rounded-full shadow transition-all duration-200 flex items-center gap-2 hover:scale-105">
            <i class="fa fa-filter"></i>
            <span>Filter</span>
        </button>
        @if(request('category') || request('year') || request('price'))
            <a href="{{ url('/product') }}"
               class="bg-gray-200 hover:bg-red-400 text-gray-600 hover:text-white font-bold px-5 py-2 rounded-full transition-all duration-200 flex items-center gap-2 shadow hover:shadow-lg hover:scale-105"
               title="Reset Filter">
                <i class="fa fa-times"></i>
                <span class="hidden sm:inline">Reset</span>
            </a>
        @endif
    </div>
    @if(request('category') || request('year') || request('price'))
        <div class="text-center mt-3 text-gray-500 text-sm italic">
            Filter aktif:
            @if(request('category')) <span class="font-semibold text-[#21408E]">Kategori: {{ request('category') }}</span> @endif
            @if(request('year')) <span class="font-semibold text-[#21408E]">Tahun: {{ request('year') }}</span> @endif
            @if(request('price')) <span class="font-semibold text-[#21408E]">
                Harga:
                @if(request('price') == '1') Di bawah Rp 60.000
                @elseif(request('price') == '2') Rp 60.000 - Rp 100.000
                @else Di atas Rp 100.000
                @endif
            </span> @endif
        </div>
    @endif
</form>

@if(isset($products) && count($products) === 0)
    <div class="flex flex-col items-center justify-center py-16">
        <img src="{{ asset('img/empty-box.svg') }}" alt="Tidak ada produk" class="w-32 h-32 mb-4 opacity-70">
        <p class="text-lg text-gray-400 font-semibold">Tidak ada produk yang ditemukan.</p>
    </div>
@endif
