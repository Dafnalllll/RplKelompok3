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
            <h1 class="text-3xl font-extrabold text-white mb-8 text-center mt-20">Semua Produk Motor</h1>

            {{-- Search Bar --}}
            @include('components.user.product.search')

            {{-- Filter Bar --}}
            @include('components.user.product.filter')

            @php
                $products = [
                    [
                        'name' => 'Honda Beat',
                        'image' => 'img/motor/hondabeat.webp',
                        'type' => 'Matic',
                        'year' => 2022,
                        'price' => 60000,
                        'desc' => 'Irit, ringan, cocok untuk harian dan mahasiswa.',
                        'stock' => 8,
                    ],
                    [
                        'name' => 'Yamaha Mio',
                        'image' => 'img/motor/yamahamio.webp',
                        'type' => 'Matic',
                        'year' => 2021,
                        'price' => 55000,
                        'desc' => 'Desain stylish, nyaman untuk perjalanan jauh.',
                        'stock' => 5,
                    ],
                    [
                        'name' => 'Honda Vario 125',
                        'image' => 'img/motor/hondavario125.webp',
                        'type' => 'Matic',
                        'year' => 2023,
                        'price' => 70000,
                        'desc' => 'Performa tinggi, bagasi luas, cocok untuk keluarga.',
                        'stock' => 3,
                    ],
                    [
                        'name' => 'Yamaha NMAX',
                        'image' => 'img/motor/yamahanmax.webp',
                        'type' => 'Matic',
                        'year' => 2022,
                        'price' => 120000,
                        'desc' => 'Matic premium, nyaman dan bertenaga.',
                        'stock' => 2,
                    ],
                    [
                        'name' => 'Honda Supra X 125',
                        'image' => 'img/motor/hondasuprax125.webp',
                        'type' => 'Bebek',
                        'year' => 2020,
                        'price' => 50000,
                        'desc' => 'Motor bebek legendaris, irit dan bandel.',
                        'stock' => 6,
                    ],
                    [
                        'name' => 'Honda PCX',
                        'image' => 'img/motor/hondapcx.webp',
                        'type' => 'Matic Premium',
                        'year' => 2023,
                        'price' => 130000,
                        'desc' => 'Skuter matic premium, nyaman dan elegan untuk perjalanan jauh.',
                        'stock' => 4,
                    ],
                    [
                        'name' => 'Yamaha Aerox',
                        'image' => 'img/motor/yamahaaerox.webp',
                        'type' => 'Sport Matic',
                        'year' => 2022,
                        'price' => 110000,
                        'desc' => 'Sporty, cocok untuk anak muda yang suka kecepatan.',
                        'stock' => 5,
                    ],
                    [
                        'name' => 'Suzuki Address',
                        'image' => 'img/motor/suzukiaddress.webp',
                        'type' => 'Matic',
                        'year' => 2021,
                        'price' => 58000,
                        'desc' => 'Matic irit, nyaman untuk harian.',
                        'stock' => 7,
                    ],
                    [
                        'name' => 'Yamaha XMAX',
                        'image' => 'img/motor/yamahaxmax.webp',
                        'type' => 'Matic Premium',
                        'year' => 2023,
                        'price' => 150000,
                        'desc' => 'Matic besar, nyaman untuk perjalanan jauh.',
                        'stock' => 2,
                    ],
                    [
                        'name' => 'Honda Scoopy',
                        'image' => 'img/motor/hondascoopy.webp',
                        'type' => 'Matic',
                        'year' => 2022,
                        'price' => 65000,
                        'desc' => 'Desain retro, cocok untuk anak muda.',
                        'stock' => 6,
                    ],
                    [
                        'name' => 'Yamaha Fazzio',
                        'image' => 'img/motor/yamahafazzio.webp',
                        'type' => 'Matic Hybrid',
                        'year' => 2023,
                        'price' => 75000,
                        'desc' => 'Matic hybrid, ramah lingkungan dan stylish.',
                        'stock' => 4,
                    ],
                    [
                        'name' => 'Honda Revo',
                        'image' => 'img/motor/hondarevo.webp',
                        'type' => 'Bebek',
                        'year' => 2021,
                        'price' => 48000,
                        'desc' => 'Motor bebek irit, cocok untuk kerja.',
                        'stock' => 8,
                    ],
                ];

                // Ambil parameter filter dari request
                $search = request('search');
                $category = request('category');
                $year = request('year');
                $price = request('price');

                // Filter produk sesuai search dan filter
                $products = collect($products)->filter(function($item) use ($search, $category, $year, $price) {
                    // Filter search (nama motor saja)
                    if ($search && !str_contains(strtolower($item['name']), strtolower($search))) {
                        return false;
                    }
                    // Filter kategori
                    if ($category && strtolower($item['type']) !== strtolower($category)) {
                        return false;
                    }
                    // Filter tahun
                    if ($year && $item['year'] != $year) {
                        return false;
                    }
                    // Filter harga
                    if ($price == '1' && $item['price'] >= 60000) {
                        return false;
                    }
                    if ($price == '2' && ($item['price'] < 60000 || $item['price'] > 100000)) {
                        return false;
                    }
                    if ($price == '3' && $item['price'] <= 100000) {
                        return false;
                    }
                    return true;
                })->values()->all();
            @endphp

            @if(count($products) === 0)
                <div class="text-center py-20 text-gray-400 text-xl font-semibold">
                    <i class="fa fa-motorcycle text-5xl mb-4"></i>
                    <div>Motor tidak ditemukan.</div>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="product-list">
                    @foreach($products as $product)
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 flex flex-col items-center p-7 relative group overflow-hidden product-item"
                         data-name="{{ strtolower($product['name']) }}"
                         data-type="{{ strtolower($product['type']) }}"
                         data-desc="{{ strtolower($product['desc']) }}"
                         data-year="{{ $product['year'] }}">
                        <div class="absolute -top-10 -left-10 w-32 h-32 bg-gradient-to-br from-yellow-200 via-yellow-100 to-white rounded-full opacity-40 z-0"></div>
                        <div class="w-full flex justify-center mb-4 z-10">
                            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="w-36 h-28 object-contain group-hover:scale-110 transition-transform duration-300 bg-white/80 p-2">
                        </div>
                        <div class="w-full text-center z-10">
                            <h3 class="font-extrabold text-2xl text-[#21408E] mb-1 tracking-tight">{{ $product['name'] }}</h3>
                            <div class="flex justify-center gap-2 text-xs text-gray-500 mb-2">
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-semibold shadow-sm">{{ $product['type'] }}</span>
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full font-semibold shadow-sm">{{ $product['year'] }}</span>
                            </div>
                            <div class="text-yellow-600 font-extrabold text-xl mb-2 drop-shadow">Rp {{ number_format($product['price'], 0, ',', '.') }} <span class="font-normal text-sm">/ hari</span></div>
                            <div class="text-gray-500 text-sm mb-2">Stok: <span class="font-semibold">{{ $product['stock'] }}</span></div>
                            <p class="text-gray-600 text-sm mb-5">{{ $product['desc'] }}</p>
                            @php $user = Auth::user(); @endphp

                            @if($user && $user->status === 'nonaktif')
                                <button class="bg-gray-400 text-white px-6 py-2 rounded-lg cursor-not-allowed font-bold opacity-70" disabled>
                                    <i class="fa-solid fa-ban mr-2"></i> Order Now
                                </button>
                            @else
                                <a href="{{ url('/order') }}" class="bg-yellow-400 hover:bg-yellow-500 text-[#21408E] font-bold px-7 py-2 rounded-full shadow-lg transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-yellow-300 inline-block">
                                    <i class="fa-solid fa-cart-plus mr-2"></i> Order Now
                                </a>
                            @endif
                        </div>
                        <div class="absolute bottom-4 right-4 z-0">
                            <i class="fa-solid fa-motorcycle text-blue-100 text-4xl opacity-20"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
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
            notFound.innerHTML = `<i class="fa fa-motorcycle text-5xl mb-4"></i><div>Produk tidak ditemukan.</div>`;
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
                // Filter by category
                if (cat && type !== cat) show = false;
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
            resetSearch.classList.toggle('hidden', !val);
        }

        input.addEventListener('input', filterProducts);
        filterCategory.addEventListener('change', filterProducts);
        filterYear.addEventListener('change', filterProducts);
        filterPrice.addEventListener('change', filterProducts);

        resetSearch.addEventListener('click', function() {
            input.value = '';
            filterProducts();
        });
        resetFilter.addEventListener('click', function() {
            document.getElementById('filter-year').value = '';
            document.getElementById('filter-category').value = '';
            document.getElementById('filter-price').value = '';
            this.closest('form').submit();
        });

        // Inisialisasi awal
        filterProducts();
    });
    </script>
</x-app-layout>
