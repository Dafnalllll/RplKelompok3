{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\user\product\filter.blade.php --}}
<style>
    select {
        appearance: none !important;
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        background-image: none !important;
    }
</style>
<div data-aos="fade-down" data-aos-delay="300" data-aos-duration="800" class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-2xl shadow-lg mb-8 border border-blue-200">
    <form method="GET" action="{{ url()->current() }}" class="flex flex-col md:flex-row gap-4 items-center md:justify-center">
        {{-- Filter Tahun --}}
        <div class="flex flex-col w-full md:w-1/4 relative">
            <label for="filter-year" class="mb-1 text-sm font-semibold text-blue-900 flex items-center gap-2">
                <i class="fa fa-calendar-alt"></i> Tahun
            </label>
            <div class="relative">
                <select name="year" id="filter-year" class="border border-blue-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 transition w-full appearance-none pr-10">
                    <option value="">Semua Tahun</option>
                    @foreach([2024,2023,2022] as $th)
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
                <i class="fa fa-motorcycle"></i> Kategori
            </label>
            <div class="relative">
                <select name="category" id="filter-category" class="border border-blue-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 transition w-full appearance-none pr-10">
                    <option value="">Semua Kategori</option>
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
            <button type="button" id="reset-filter" class="bg-red-600 text-white px-5 py-2 rounded-lg font-semibold shadow hover:bg-red-700 transition flex items-center gap-2 hover:scale-105">
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

    // Filter produk real-time
    document.addEventListener('DOMContentLoaded', function() {
        const resetFilter = document.getElementById('reset-filter');
        const yearSelect = document.getElementById('filter-year');
        const categorySelect = document.getElementById('filter-category');
        const priceSelect = document.getElementById('filter-price');

        function filterProducts() {
            let year = yearSelect.value;
            let category = categorySelect.value;
            let price = priceSelect.value;
            let found = false;

            document.querySelectorAll('.product-card').forEach(function(card) {
                let show = true;
                let cardYear = card.getAttribute('data-year');
                let cardCategory = card.getAttribute('data-category');
                let cardPrice = parseInt(card.getAttribute('data-price'));

                // Tahun (harus sama persis)
                if (year && cardYear !== year) show = false;

                // Kategori (case-insensitive)
                if (category && cardCategory && cardCategory.toLowerCase() !== category.toLowerCase()) show = false;

                // Harga
                if (price) {
                    if (price === '1' && cardPrice >= 60000) show = false;
                    if (price === '2' && (cardPrice < 60000 || cardPrice > 100000)) show = false;
                    if (price === '3' && cardPrice <= 100000) show = false;
                }

                card.style.display = show ? '' : 'none';
                if (show) found = true;
            });

            const notFound = document.getElementById('not-found');
            if (notFound) notFound.style.display = found ? 'none' : '';
        }

        // Reset filter tanpa refresh
        if (resetFilter) {
            resetFilter.addEventListener('click', function(e) {
                e.preventDefault();
                yearSelect.value = '';
                categorySelect.value = '';
                priceSelect.value = '';
                filterProducts();
            });
        }

        // Jalankan filter saat filter berubah
        [yearSelect, categorySelect, priceSelect].forEach(function(select) {
            select.addEventListener('change', filterProducts);
        });

        // Jalankan filter pertama kali
        filterProducts();
    });
</script>
