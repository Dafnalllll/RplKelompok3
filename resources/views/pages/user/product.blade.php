{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\pages\user\product.blade.php --}}

@section('title', 'Andalas Wheels || Product')

@push('head')
    <link rel="icon" type="image/webp" href="{{ asset('img/andalaswheels.webp') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush

{{-- Background Image --}}
<div class="fixed inset-0 -z-10">
    <img src="{{ asset('img/order.webp') }}"
         alt="Motorcycle Background"
         class="w-full h-full object-cover object-center" />
    <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
</div>

<x-app-layout>
    @include('components.user.navbar')
    <div class="min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- Search Bar --}}
            @include('components.user.product.search')

            {{-- Filter Bar --}}
            @include('components.user.product.filter')

            {{-- Product List --}}
            @php
                $showAll = request()->has('show_all');
                $maxShow = 6;
                $totalProducts = count($products);
                $displayProducts = $showAll ? $products : $products->take($maxShow);
            @endphp

            @if($totalProducts === 0)
                <div class="text-center py-20 text-gray-400 text-xl font-semibold">
                    <i class="fa fa-motorcycle text-5xl mb-4"></i>
                    <div>Motor tidak ditemukan.</div>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="product-list">
                    @foreach($displayProducts as $product)
                    <div data-aos="zoom-in" data-aos-delay="200" data-aos-duration="700">
                        <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 flex flex-col items-center p-7 relative group overflow-hidden product-item"
                            data-name="{{ strtolower($product->name) }}"
                            data-type="{{ strtolower($product->category->name ?? '-') }}"
                            data-year="{{ $product->year }}"
                            data-price="{{ $product->price }}">
                            <div class="absolute -top-10 -left-10 w-32 h-32 bg-gradient-to-br from-yellow-200 via-yellow-100 to-white rounded-full opacity-40 z-0"></div>
                            <div class="w-full flex justify-center mb-4 z-10">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-36 h-28 object-contain group-hover:scale-110 transition-transform duration-300 bg-white/80 p-2">
                            </div>
                            <div class="w-full text-center z-10">
                                <h3 class="font-extrabold text-2xl text-[#21408E] mb-1 tracking-tight">{{ $product->name }}</h3>
                                <div class="flex justify-center gap-2 text-xs text-gray-500 mb-2">
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-semibold shadow-sm">{{ $product->category->name ?? '-' }}</span>
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full font-semibold shadow-sm">{{ $product->year }}</span>
                                </div>
                                <div class="text-yellow-600 font-extrabold text-xl mb-2 drop-shadow">Rp {{ number_format($product->price, 0, ',', '.') }} <span class="font-normal text-sm">/ hari</span></div>
                                <div class="text-gray-500 text-sm mb-2">Stok: <span class="font-semibold">{{ $product->stock }}</span></div>
                                @php $user = Auth::user(); @endphp

                                @if($user && $user->status === 'nonaktif')
                                    <button class="bg-gray-400 text-white px-6 py-2 rounded-lg cursor-not-allowed font-bold opacity-70" disabled>
                                        <i class="fa-solid fa-ban mr-2"></i> Rent Now
                                    </button>
                                @else
                                    <form action="{{ url('/product/rent/' . $product->id) }}" method="get">
                                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-[#21408E] font-bold px-7 py-2 rounded-full shadow-lg transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-yellow-300 inline-block">
                                            <i class="fa-solid fa-cart-plus mr-2"></i> Rent Now
                                        </button>
                                    </form>
                                @endif
                            </div>
                            <div class="absolute bottom-4 right-4 z-0">
                                <i class="fa-solid fa-motorcycle text-blue-100 text-4xl opacity-20"></i>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @if(!$showAll && $totalProducts > $maxShow)
                    <div class="flex justify-center mt-8">
                        <a href="{{ request()->fullUrlWithQuery(['show_all' => 1]) }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-2 rounded-full shadow transition-all duration-300">
                            Lihat Semua
                        </a>
                    </div>
                @endif
            @endif
        </div>
    </div>
     {{-- Footer --}}
    @include('components.footer')
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('live-search');
    const resetSearch = document.getElementById('reset-search');
    const filterCategory = document.getElementById('filter-category');
    const filterYear = document.getElementById('filter-year');
    const filterPrice = document.getElementById('filter-price');
    const resetFilter = document.getElementById('reset-filter');
    const items = document.querySelectorAll('.product-item');
    const grid = document.getElementById('product-list');
    const notFoundId = 'not-found-msg';
    let notFound = document.getElementById(notFoundId);
    if (!notFound) {
        notFound = document.createElement('div');
        notFound.id = notFoundId;
        notFound.className = "text-center py-20 text-gray-400 text-xl font-semibold";
        notFound.innerHTML = `<i class="fa fa-motorcycle text-5xl mb-4"></i><div>Motor Tidak Ditemukan.</div>`;
    }

    function filterProducts() {
        let val = input.value.trim().toLowerCase();
        let cat = filterCategory.value;
        let year = filterYear.value;
        let price = filterPrice.value;
        let found = 0;
        items.forEach(item => {
            let name = item.dataset.name;
            let type = item.dataset.type;
            let itemYear = item.dataset.year;
            let itemPrice = parseInt(item.dataset.price);

            let show = true;
            // Search by name
            if (val && !name.includes(val)) show = false;
            // Filter by category (case-insensitive)
            if (cat && type !== cat.trim().toLowerCase()) show = false;
            // Filter by year
            if (year && itemYear !== year) show = false;
            // Filter by price
            if (price === '1' && itemPrice >= 60000) show = false;
            if (price === '2' && (itemPrice < 60000 || itemPrice > 100000)) show = false;
            if (price === '3' && itemPrice <= 100000) show = false;

            item.style.display = show ? '' : 'none';
            if (show) found++;
        });
        // Show/hide not found message
        if (found === 0) {
            if (!document.getElementById(notFoundId)) {
                grid.parentNode.insertBefore(notFound, grid.nextSibling);
            }
        } else {
            let nf = document.getElementById(notFoundId);
            if (nf) nf.remove();
        }
        // Show/hide reset search button
        if (resetSearch) resetSearch.classList.toggle('hidden', !val);
    }

    if (input) input.addEventListener('input', filterProducts);
    if (filterCategory) filterCategory.addEventListener('change', filterProducts);
    if (filterYear) filterYear.addEventListener('change', filterProducts);
    if (filterPrice) filterPrice.addEventListener('change', filterProducts);

    if (resetSearch) {
        resetSearch.addEventListener('click', function() {
            input.value = '';
            filterProducts();
        });
    }

    if (resetFilter) {
        resetFilter.addEventListener('click', function(e) {
            e.preventDefault();
            filterYear.value = '';
            filterCategory.value = '';
            filterPrice.value = '';
            filterProducts();
        });
    }

    // Inisialisasi awal
    filterProducts();
});
</script>
</x-app-layout>
