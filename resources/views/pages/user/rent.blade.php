{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\pages\user\detail.blade.php --}}
@section('title', 'Andalas Wheels || Rent')

@push('head')
    <link rel="icon" type="image/webp" href="{{ asset('img/andalaswheels.webp') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush
<x-app-layout>
    @include('components.user.navbar')
    {{-- Background Image --}}
    <div class="fixed inset-0 -z-10">
        <img src="{{ asset('img/order.webp') }}"
            alt="Motorcycle Background"
            class="w-full h-full object-cover object-center" />
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
    </div>

    <div data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000"
        class="w-[90%] mx-auto py-10 px-4 border border-gray-300 rounded-2xl bg-gradient-to-br from-blue-100 via-yellow-50 to-blue-200 mt-24">
        {{-- Breadcrumb --}}
        {{-- Breadcrumb Desktop --}}
        <nav class="hidden md:block text-sm text-gray-500 mb-6 ml-12">
            <ol class="list-reset flex">
                <li><a href="/dashboard" class="hover:underline">Beranda</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="/product" class="hover:underline">Motorcycle</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="font-semibold text-[#21408E]">{{ $product['name'] }}</li>
            </ol>
        </nav>
        {{-- DESKTOP --}}
        <div class="hidden md:block">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                {{-- Gambar utama --}}
                <div class="flex flex-col items-center">
                    <div class=" p-6 flex items-center justify-center w-full transition-all mt-28 ">
                        <img src="{{ asset('storage/' . $product['image']) }}"
                            alt="{{ $product['name'] }}"
                            class="w-full max-w-md h-full object-contain rounded-lg bg-transparent  transition-all duration-300 hover:shadow-xl hover:border-blue-400" />
                    </div>
                </div>
                {{-- Detail produk --}}
                <div class=" p-8 flex flex-col justify-center">
                    <h2 class="text-3xl font-bold text-[#21408E] mb-4">{{ $product['name'] }}</h2>
                    <div class="flex items-center gap-4 mb-3 text-gray-600">
                        @if($product['stock'] > 0)
                            <span class="text-green-600 font-semibold">In Stock</span>
                        @else
                            <span class="text-red-600 font-semibold">Out Stock</span>
                        @endif
                        {{-- Tambahan year dan category --}}
                        <span class="ml-4 px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                            {{ $product['year'] }}
                        </span>
                        <span class="ml-2 px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">
                            {{ $product['category']['name'] }}
                        </span>
                    </div>
                    <div class="text-2xl font-bold text-yellow-600 mb-4">
                        Rp {{ number_format($product['price'], 0, ',', '.') }}
                    </div>
                    <div class="flex items-center gap-4 mb-4">
                        <span class="ml-1 text-gray-500">Tersedia {{ $product['stock'] }} unit</span>
                    </div>
                    {{-- Fitur Perhari & Perbulan --}}
                    <div class="flex items-center gap-6 mb-4">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="rent_type" value="day" checked onchange="updatePriceAll()" class="accent-[#21408E]">
                            <span class="text-sm font-medium">Per Hari</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="rent_type" value="month" onchange="updatePriceAll()" class="accent-[#21408E]">
                            <span class="text-sm font-medium">Per Bulan</span>
                        </label>
                    </div>
                    <div class="flex items-center gap-8 mb-4">
                        {{-- Pilih jumlah hari --}}
                        <div class="flex flex-col items-start">
                            <label for="days" class="text-sm font-medium mb-1">Jumlah Hari</label>
                            <div class="flex items-center border rounded-lg px-4 py-2 w-32 justify-between bg-white shadow">
                                <button type="button" class="text-xl px-2 text-gray-500 hover:text-[#21408E]" onclick="changeDays(-1)">−</button>
                                <span id="days" class="font-semibold">1</span>
                                <button type="button" class="text-xl px-2 text-gray-500 hover:text-[#21408E]" onclick="changeDays(1)">+</button>
                            </div>
                        </div>
                        {{-- Pilih jumlah bulan --}}
                        <div class="flex flex-col items-start">
                            <label for="months" class="text-sm font-medium mb-1">Jumlah Bulan</label>
                            <div class="flex items-center border rounded-lg px-4 py-2 w-32 justify-between bg-white shadow">
                                <button type="button" class="text-xl px-2 text-gray-500 hover:text-[#21408E]" onclick="changeMonths(-1)">−</button>
                                <span id="months" class="font-semibold">1</span>
                                <button type="button" class="text-xl px-2 text-gray-500 hover:text-[#21408E]" onclick="changeMonths(1)">+</button>
                            </div>
                        </div>
                        {{-- Pilih jumlah unit --}}
                        <div class="flex flex-col items-start">
                            <label for="units" class="text-sm font-medium mb-1">Jumlah Unit</label>
                            <div class="flex items-center border rounded-lg px-4 py-2 w-32 justify-between bg-white shadow">
                                <button type="button" id="btn-units-minus" class="text-xl px-2 text-gray-500 hover:text-[#21408E]" onclick="changeUnits(-1)">−</button>
                                <span id="units" class="font-semibold">1</span>
                                <button type="button" id="btn-units-plus" class="text-xl px-2 text-gray-500 hover:text-[#21408E]" onclick="changeUnits(1)">+</button>
                            </div>
                            <span id="units-alert" class="text-xs text-red-500 mt-1" style="display:none;">Jumlah Unit Telah Melebihi stok!</span>
                        </div>
                    </div>
                    {{-- Pilih Jadwal Sewa --}}
                    <div class="flex flex-col items-start mb-4">
                        <label for="start_date" class="text-sm font-medium mb-1">Pilih Jadwal Sewa</label>
                        <div class="flex items-center gap-3">
                            <input type="date" id="start_date" name="start_date"
                                class="border rounded-lg px-4 py-2 w-52 bg-white shadow"
                                min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                onchange="updateReturnDateAll()">
                            <button type="button" id="resetBtn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-400 transition-all shadow text-sm">
                                Reset
                            </button>
                        </div>
                        <span id="schedule-alert" class="text-xs text-red-500 mt-2 hidden">Silakan pilih jadwal sewa terlebih dahulu!</span>
                    </div>
                    {{-- Tanggal Return --}}
                    <div class="flex flex-col items-start mb-4">
                        <label class="text-sm font-medium mb-1">Tanggal Return</label>
                        <div class="text-lg font-semibold text-blue-700" id="return_date">-</div>
                    </div>
                    {{-- Total Harga di bawah --}}
                    <div class="flex flex-col items-start mb-4">
                        <div class="flex items-center justify-between w-full">
                            <span class="text-sm text-gray-500">Total Harga:</span>
                            <span class="text-2xl font-bold text-yellow-600" id="totalPrice">Rp 0</span>
                        </div>
                    </div>
                    {{-- Tombol Sewa Sekarang --}}
                    <div class="flex gap-3 mb-4">
                        <form method="POST" action="{{ route('order.store') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                            <input type="hidden" name="qty" id="qty_input" value="1">
                            <input type="hidden" name="start_date" id="start_date_input">
                            <input type="hidden" name="end_date" id="end_date_input">
                            <input type="hidden" name="total_price" id="total_price_input">
                            <input type="hidden" name="status" value="pending">
                            <input type="hidden" name="payment" id="payment_input">
                            <input type="hidden" name="detail" value="{{ $product['name'] }}">
                            <button type="submit"
                                id="rentNowBtn"
                                class="bg-[#21408E] text-white px-8 py-3 w-full md:w-[580px] rounded-lg font-semibold hover:bg-yellow-400 hover:text-[#21408E] transition-all hover:scale-105 shadow-md text-center">
                                Rent Now
                            </button>
                        </form>
                    </div>
                    {{-- Pilih Metode Pembayaran --}}
                    <div class="flex flex-col items-start mb-4">
                        <label class="text-sm font-medium mb-2">Metode Pembayaran</label>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="payment_method" value="cash" checked class="accent-[#21408E]" onchange="toggleWaInfo()">
                                <span>Cash</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="payment_method" value="transfer" class="accent-[#21408E]" onchange="toggleWaInfo()">
                                <span>Transfer</span>
                            </label>
                        </div>
                        <div id="wa-info" class="mt-3 flex items-center gap-3 bg-green-50 border border-green-200 rounded-lg px-4 py-2" style="display:block;">
                    <i class="fab fa-whatsapp text-green-600 text-2xl"></i>
                    <span class="text-green-900 text-sm">
                        Untuk Konfirmasi Pembayaran, Silakan Hubungi Kami Di
                    <a href="https://wa.me/62816303595" target="_blank" class="underline font-semibold">0816-303-595</a>
                    </span>
                </div>
                        <div class="mt-3 flex items-center gap-3 bg-blue-50 border border-blue-200 rounded-lg px-4 py-2">
        <img src="{{ asset('img/payment/mandiri.webp') }}" alt="Bank Mandiri" class="w-10 h-10 object-contain" />
        <div>
            <div class="font-semibold text-blue-900">Bank Mandiri</div>
            <div class="text-sm text-gray-700">No. Rekening: <span class="font-mono">1100015022657</span></div>
            <div class="text-xs text-gray-500">a.n. RIZKI DAFA NALDI</div>
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MOBILE --}}
        @include('pages.user.rentmobile')
        {{-- Deskripsi Produk --}}
         <div class="bg-gray-50 rounded-xl shadow p-8 mt-10">
            <h3 class="text-2xl font-bold text-[#21408E] mb-4">Deskripsi & Spesifikasi</h3>
            <p class="mb-3 text-gray-700 text-lg">{{ $product['description'] }}</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
  AOS.init();
</script>
<script>
    const pricePerDay = {{ $product['price'] }};
    const pricePerMonth = {{ $product['price_month'] ?? $product['price'] * 5 }};
    let days = 1;
    let months = 1;
    let units = 1;

    function updatePriceAll() {
        // Desktop
        let rentType = document.querySelector('input[name="rent_type"]:checked');
        let total = 0;
        if (rentType && rentType.value === 'month') {
            total = pricePerMonth * months;
        } else {
            total = pricePerDay * days;
        }
        total *= units;
        let totalPriceEl = document.getElementById('totalPrice');
        if (totalPriceEl) totalPriceEl.innerText = total.toLocaleString('id-ID');

        // Mobile
        let rentTypeMobile = document.querySelector('input[name="rent_type_mobile"]:checked');
        let totalMobile = 0;
        if (rentTypeMobile && rentTypeMobile.value === 'month') {
            totalMobile = pricePerMonth * months;
        } else {
            totalMobile = pricePerDay * days;
        }
        totalMobile *= units;
        let totalPriceMobileEl = document.getElementById('totalPriceMobile');
        if (totalPriceMobileEl) totalPriceMobileEl.innerText = totalMobile.toLocaleString('id-ID');
    }

    function changeDays(val, isMobile = false) {
        days = Math.max(1, days + val);
        let daysEl = document.getElementById(isMobile ? 'daysMobile' : 'days');
        if (daysEl) daysEl.innerText = days;
        updatePriceAll();
        updateReturnDateAll();
    }

    function changeMonths(val, isMobile = false) {
        months = Math.max(1, months + val);
        let monthsEl = document.getElementById(isMobile ? 'monthsMobile' : 'months');
        if (monthsEl) monthsEl.innerText = months;
        updatePriceAll();
        updateReturnDateAll();
    }

    function changeUnits(val, isMobile = false) {
        const maxStock = {{ $product['stock'] }};
        let newUnits = units + val;
        if (newUnits < 1) newUnits = 1;
        let alertEl = document.getElementById(isMobile ? 'units-alert-mobile' : 'units-alert');
        if (newUnits > maxStock) {
            newUnits = maxStock;
            if (alertEl) alertEl.style.display = '';
        } else {
            if (alertEl) alertEl.style.display = 'none';
        }
        units = newUnits;
        let unitsEl = document.getElementById(isMobile ? 'unitsMobile' : 'units');
        if (unitsEl) unitsEl.innerText = units;
        updateUnitsButtonAll();
        updatePriceAll();
        updateQtyInputAll();
    }

    function updateUnitsButtonAll() {
        const maxStock = {{ $product['stock'] }};
        // Desktop
        let minusBtn = document.getElementById('btn-units-minus');
        let plusBtn = document.getElementById('btn-units-plus');
        if (minusBtn) minusBtn.disabled = units <= 1;
        if (plusBtn) plusBtn.disabled = units >= maxStock;
        if (plusBtn) plusBtn.classList.toggle('opacity-50', units >= maxStock);
        if (minusBtn) minusBtn.classList.toggle('opacity-50', units <= 1);
        // Mobile
        let minusBtnM = document.getElementById('btn-units-minus-mobile');
        let plusBtnM = document.getElementById('btn-units-plus-mobile');
        if (minusBtnM) minusBtnM.disabled = units <= 1;
        if (plusBtnM) plusBtnM.disabled = units >= maxStock;
        if (plusBtnM) plusBtnM.classList.toggle('opacity-50', units >= maxStock);
        if (minusBtnM) minusBtnM.classList.toggle('opacity-50', units <= 1);
    }

    function updateReturnDateAll() {
        // Desktop
        let startDateInput = document.getElementById('start_date');
        let startDate = startDateInput ? startDateInput.value : '';
        let returnDate = '-';
        let rentType = document.querySelector('input[name="rent_type"]:checked');
        if (startDate && rentType) {
            let daysToAdd = rentType.value === 'month' ? months * 30 : days;
            let dateObj = new Date(startDate);
            dateObj.setDate(dateObj.getDate() + daysToAdd);
            returnDate = dateObj.toLocaleDateString('id-ID', {
                year: 'numeric', month: 'long', day: 'numeric'
            });
        }
        let returnDateEl = document.getElementById('return_date');
        if (returnDateEl) returnDateEl.innerText = returnDate;

        // Mobile
        let startDateInputM = document.getElementById('start_date_mobile');
        let startDateM = startDateInputM ? startDateInputM.value : '';
        let returnDateM = '-';
        let rentTypeM = document.querySelector('input[name="rent_type_mobile"]:checked');
        if (startDateM && rentTypeM) {
            let daysToAddM = rentTypeM.value === 'month' ? months * 30 : days;
            let dateObjM = new Date(startDateM);
            dateObjM.setDate(dateObjM.getDate() + daysToAddM);
            returnDateM = dateObjM.toLocaleDateString('id-ID', {
                year: 'numeric', month: 'long', day: 'numeric'
            });
        }
        let returnDateElM = document.getElementById('return_date_mobile');
        if (returnDateElM) returnDateElM.innerText = returnDateM;
    }

    function updateQtyInputAll() {
        // Desktop
        let qtyInput = document.getElementById('qty_input');
        if (qtyInput) qtyInput.value = units;
        // Mobile
        let qtyInputMobile = document.getElementById('qty_input_mobile');
        if (qtyInputMobile) qtyInputMobile.value = units;
    }

    document.addEventListener('DOMContentLoaded', function() {
        updatePriceAll();
        updateUnitsButtonAll();
        updateReturnDateAll();
    });

    // Desktop
    document.getElementById('rentNowBtn').addEventListener('click', function(e) {
    @if(Auth::user() && Auth::user()->status === 'Nonaktif')
        showNonaktifNotif();
        e.preventDefault();
        return;
    @endif
    const startDate = document.getElementById('start_date').value;
    const alertEl = document.getElementById('schedule-alert');
    if (!startDate) {
        e.preventDefault();
        alertEl.classList.remove('hidden');
        setTimeout(() => alertEl.classList.add('hidden'), 4000);
        return;
    }
    // Ambil nilai dari UI
    const rentType = document.querySelector('input[name="rent_type"]:checked').value;
    const days = parseInt(document.getElementById('days').innerText);
    const months = parseInt(document.getElementById('months').innerText);
    const units = parseInt(document.getElementById('units').innerText);
    let endDate = startDate;
    if (startDate) {
        let dateObj = new Date(startDate);
        let daysToAdd = rentType === 'month' ? months * 30 : days;
        dateObj.setDate(dateObj.getDate() + daysToAdd);
        endDate = dateObj.toISOString().slice(0, 10);
    }
    const totalPrice = document.getElementById('totalPrice').innerText.replace(/\D/g, '');
    const payment = document.querySelector('input[name="payment_method"]:checked').value;

    // Isi input hidden
    document.getElementById('start_date_input').value = startDate;
    document.getElementById('end_date_input').value = endDate;
    document.getElementById('total_price_input').value = totalPrice;
    document.getElementById('payment_input').value = payment;
});
    // Mobile
    document.getElementById('rentNowBtnMobile').addEventListener('click', function(e) {
    @if(Auth::user() && Auth::user()->status === 'Nonaktif')
        showNonaktifNotif();
        e.preventDefault();
        return;
    @endif
    const startDate = document.getElementById('start_date_mobile').value;
    const alertEl = document.getElementById('schedule-alert-mobile');
    if (!startDate) {
        e.preventDefault(); // <-- Tambahkan ini agar form tidak submit/refresh
        alertEl.classList.remove('hidden');
        setTimeout(() => alertEl.classList.add('hidden'), 5000);
        return;
    } else {
        alertEl.classList.add('hidden');
        Swal.fire({
            title: 'Berhasil!',
            text: 'Perentalan Berhasil!',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            iconHtml: `
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#21408E" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" fill="#21408E"/>
                    <path d="M9 12l2 2l4 -4" stroke="#fff" stroke-width="2.5" fill="none"/>
                </svg>
            `,
            customClass: {
                icon: 'no-border'
            }
        });
    }
});

    document.getElementById('resetBtn').addEventListener('click', function() {
    days = 1;
    months = 1;
    units = 1;
    document.getElementById('days').innerText = days;
    document.getElementById('months').innerText = months;
    document.getElementById('units').innerText = units;
    document.getElementById('start_date').value = '';
    document.getElementById('return_date').innerText = '-';
    document.getElementById('totalPrice').innerText = pricePerDay.toLocaleString('id-ID');
    document.querySelector('input[name="rent_type"][value="day"]').checked = true;
    document.querySelector('input[name="payment_method"][value="cash"]').checked = true;
    updateUnitsButtonAll();
});

document.getElementById('resetBtnMobile').addEventListener('click', function() {
    days = 1;
    months = 1;
    units = 1;
    document.getElementById('daysMobile').innerText = days;
    document.getElementById('monthsMobile').innerText = months;
    document.getElementById('unitsMobile').innerText = units;
    document.getElementById('start_date_mobile').value = '';
    document.getElementById('return_date_mobile').innerText = '-';
    document.getElementById('totalPriceMobile').innerText = pricePerDay.toLocaleString('id-ID');
    document.querySelector('input[name="rent_type_mobile"][value="day"]').checked = true;
    document.querySelector('input[name="payment_method_mobile"][value="cash"]').checked = true;
    updateUnitsButtonAll();
});
</script>
<script>
function showNonaktifNotif() {
    // Temukan elemen notif dari notifaccount.blade.php
    const notifBtn = document.querySelector('[data-nonaktif-notif-btn]');
    if (notifBtn) {
        notifBtn.click(); // Trigger tombol untuk membuka notif
    }
}
</script>
</x-app-layout>
