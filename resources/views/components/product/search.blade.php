{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\product\search.blade.php --}}

<form action="{{ url('/product') }}" method="GET" class="max-w-2xl mx-auto mb-10">
    <div class="flex items-center bg-white rounded-full shadow-xl px-6 py-3 focus-within:ring-2 focus-within:ring-yellow-400 transition-all duration-200 border-0">
        <input
            id="live-search"
            type="text"
            name="search"
            class="flex-1 bg-transparent outline-none px-3 py-2 text-gray-700 placeholder-gray-400 text-base border-0 focus:ring-0"
            placeholder="🔍 Cari motor..."
            value="{{ request('search') }}"
            autocomplete="off"
        >
        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-[#21408E] font-bold px-6 py-2 rounded-full ml-2 transition-all duration-200 flex items-center gap-2 shadow hover:shadow-lg hover:scale-105">
            <i class="fa fa-search"></i>
            <span class="hidden sm:inline">Cari</span>
        </button>
        @if(request('search'))
            <a href="{{ url('/product') }}"
               class="ml-2 bg-gray-200 hover:bg-red-400 text-gray-600 hover:text-white font-bold px-5 py-2 rounded-full transition-all duration-200 flex items-center gap-2 shadow hover:shadow-lg hover:scale-105"
               title="Reset">
                <i class="fa fa-times"></i>
                <span class="hidden sm:inline">Reset</span>
            </a>
        @endif
    </div>
    @if(request('search'))
        <div class="text-center mt-3 text-gray-500 text-sm italic">
            Hasil pencarian untuk: <span class="font-semibold text-[#21408E]">"{{ request('search') }}"</span>
        </div>
    @endif
</form>

@if(isset($products) && count($products) === 0)
    <div class="flex flex-col items-center justify-center py-16">
        <img src="{{ asset('img/empty-box.svg') }}" alt="Tidak ada produk" class="w-32 h-32 mb-4 opacity-70">
        <p class="text-lg text-gray-400 font-semibold">Tidak ada produk yang ditemukan.</p>
    </div>
@endif
