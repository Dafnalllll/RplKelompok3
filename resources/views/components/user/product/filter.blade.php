{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\product\filter.blade.php --}}
<style>
    select {
        appearance: none !important;
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        background-image: none !important;
    }
</style>
<div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-2xl shadow-lg mb-8 border border-blue-200">
    <form method="GET" action="{{ url()->current() }}" class="flex flex-col md:flex-row gap-4 items-center">
        {{-- Filter Tahun --}}
        <div class="flex flex-col w-full md:w-1/4 relative">
            <label for="filter-year" class="mb-1 text-sm font-semibold text-blue-900 flex items-center gap-2">
                <i class="fa fa-calendar-alt"></i> Tahun
            </label>
            <div class="relative">
                <select name="year" id="filter-year" class="border border-blue-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 transition w-full appearance-none pr-10">
                    <option value="">Semua Tahun</option>
                    @foreach([2023,2022,2021,2020] as $th)
                        <option value="{{ $th }}" {{ request('year') == $th ? 'selected' : '' }}>{{ $th }}</option>
                    @endforeach
                </select>
                <span class="pointer-events-none absolute right-3 top-1/2 transform -translate-y-1/2 transition-transform duration-300" id="arrow-year">
                    <svg class="w-4 h-4 text-blue-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </div>
        </div>

        {{-- Filter Tipe --}}
        <div class="flex flex-col w-full md:w-1/4 relative">
            <label for="filter-category" class="mb-1 text-sm font-semibold text-blue-900 flex items-center gap-2">
                <i class="fa fa-motorcycle"></i> Tipe
            </label>
            <div class="relative">
                <select name="category" id="filter-category" class="border border-blue-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 transition w-full appearance-none pr-10">
                    <option value="">Semua Tipe</option>
                    @foreach(['Matic','Matic Premium','Sport Matic','Matic Hybrid','Bebek'] as $type)
                        <option value="{{ $type }}" {{ request('category') == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                <span class="pointer-events-none absolute right-3 top-1/2 transform -translate-y-1/2 transition-transform duration-300" id="arrow-category">
                    <svg class="w-4 h-4 text-blue-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </div>
        </div>

        {{-- Filter Harga --}}
        <div class="flex flex-col w-full md:w-1/4 relative">
            <label for="filter-price" class="mb-1 text-sm font-semibold text-blue-900 flex items-center gap-2">
                <i class="fa fa-money-bill-wave"></i> Harga
            </label>
            <div class="relative">
                <select name="price" id="filter-price" class="border border-blue-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 transition w-full appearance-none pr-10">
                    <option value="">Semua Harga</option>
                    <option value="1" {{ request('price') == '1' ? 'selected' : '' }}>Di bawah Rp 60.000</option>
                    <option value="2" {{ request('price') == '2' ? 'selected' : '' }}>Rp 60.000 - Rp 100.000</option>
                    <option value="3" {{ request('price') == '3' ? 'selected' : '' }}>Di atas Rp 100.000</option>
                </select>
                <span class="pointer-events-none absolute right-3 top-1/2 transform -translate-y-1/2 transition-transform duration-300" id="arrow-price">
                    <svg class="w-4 h-4 text-blue-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </div>
        </div>

        {{-- Tombol --}}
        <div class="flex gap-2 mt-4 md:mt-7">
            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg font-semibold shadow hover:bg-blue-700 transition flex items-center gap-2">
                <i class="fa fa-filter"></i> Filter
            </button>
            <button type="button" id="reset-filter" class="bg-red-600 text-white px-5 py-2 rounded-lg font-semibold shadow hover:bg-red-700 transition flex items-center gap-2">
                <i class="fa fa-undo"></i> Reset
            </button>
        </div>
    </form>
</div>

<script>
    // Panah select animasi
    function addArrowToggle(selectId, arrowId) {
        const select = document.getElementById(selectId);
        const arrow = document.getElementById(arrowId);
        if (select && arrow) {
            select.addEventListener('focus', () => {
                arrow.classList.add('rotate-180');
            });
            select.addEventListener('blur', () => {
                arrow.classList.remove('rotate-180');
            });
        }
    }
    addArrowToggle('filter-year', 'arrow-year');
    addArrowToggle('filter-category', 'arrow-category');
    addArrowToggle('filter-price', 'arrow-price');

    // Reset filter
    document.addEventListener('DOMContentLoaded', function() {
        const resetFilter = document.getElementById('reset-filter');
        if (resetFilter) {
            resetFilter.addEventListener('click', function() {
                document.getElementById('filter-year').value = '';
                document.getElementById('filter-category').value = '';
                document.getElementById('filter-price').value = '';
                this.closest('form').submit();
            });
        }
    });
</script>
