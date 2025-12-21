{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\pages\user\history.blade.php --}}
@section('title', 'Andalas Wheels || History')

@push('head')
    <link rel="icon" type="image/webp" href="{{ asset('img/andalaswheels.webp') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush

<div class="fixed inset-0 -z-10">
    <img src="{{ asset('img/order.webp') }}"
        alt="Motorcycle Background"
        class="w-full h-full object-cover object-center" />
    <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
</div>

<x-app-layout>
    @include('components.user.navbar')

    <div class="w-full max-w-screen-xl mx-auto p-6 sm:p-10 mt-16">

    <div class="w-full max-w-screen-xl mx-auto p-6 sm:p-10 mt-16">
        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-8 flex items-center gap-2">
            <i class="fas fa-history text-yellow-400"></i>
            Riwayat Sewa Produk
        </h2>
        <div class="bg-gradient-to-r from-blue-50 via-white to-yellow-50 border-2 border-blue-200 rounded-2xl shadow-xl p-8">
            @if($orders->isEmpty())
                <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 p-6 rounded-lg shadow text-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    Belum Ada Motor yang Dirental.
                </div>
            @else
                <div class="space-y-8">
                    @foreach($orders as $order)
                        <div class="rounded-xl p-6 flex flex-col sm:flex-row items-center gap-8 border border-gray-100 hover:shadow-lg transition-all duration-300">
                            <div>
                                @if($order->product->image)
                                    <img src="{{ Storage::url($order->product->image) }}" alt="{{ $order->product->name }}" class="w-32 h-32 object-cover">
                                @else
                                    <div class="w-32 h-32 flex items-center justify-center bg-blue-50 rounded-xl border-4 border-blue-100 text-blue-300 text-5xl">
                                        <i class="fas fa-motorcycle"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 w-full">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                    <div>
                                        <h3 class="text-xl font-bold text-[#21408E] flex items-center gap-2 mb-2">
                                            <i class="fas fa-motorcycle"></i> {{ $order->product->name }}
                                        </h3>
                                        <div class="mb-2">
                                            <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
                                                {{ $order->product->category->name ?? '-' }}
                                            </span>
                                        </div>
                                        <div class="text-sm text-gray-600 mb-1">
                                            <i class="fas fa-calendar-alt mr-1 text-blue-400"></i>
                                            <span class="font-semibold">{{ \Carbon\Carbon::parse($order->start_date)->format('d M Y') }}</span>
                                            &ndash;
                                            <span class="font-semibold">{{ \Carbon\Carbon::parse($order->end_date)->format('d M Y') }}</span>
                                        </div>
                                        <div class="text-sm text-gray-600 mb-1">
                                            <i class="fas fa-money-bill-wave mr-1 text-yellow-400"></i>
                                            Harga: <span class="font-semibold text-blue-700">Rp{{ number_format($order->product->price, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="text-sm text-gray-600 mb-1">
                                            <i class="fas fa-info-circle mr-1 text-gray-400"></i>
                                            Status:
                                            @if($order->status === 'Pending')
                                                <span class="inline-block px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold shadow">Pending</span>
                                            @elseif($order->status === 'Diterima')
                                                <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold shadow">Accepted</span>
                                            @elseif($order->status === 'Ditolak')
                                                <span class="inline-block px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold shadow">Rejected</span>
                                            @else
                                                <span class="inline-block px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-semibold shadow">{{ ucfirst($order->status) }}</span>
                                            @endif
                                        </div>
                                        <div class="text-sm text-gray-600 mb-1">

                                            <i class="fas fa-credit-card mr-1 text-blue-400"></i>
                                            Metode Pembayaran:
                                            <span class="font-semibold text-blue-700">{{ ucfirst($order->payment) }}</span>
                                        </div>
                                        <div class="text-sm text-gray-600 mb-1">
                                            <i class="fas fa-hourglass-half mr-1 text-red-400"></i>
                                            @if($order->status === 'Pending')
                                                <span class="font-semibold">Deadline Pembayaran:</span>
                                                @if(strtolower($order->payment) === 'transfer')
                                                    <span class="text-xs text-gray-500 ml-2">(Segera upload bukti pembayaran sebelum waktu habis)</span>
                                                @endif
                                            @elseif($order->status === 'Diterima')
                                                <span class="font-semibold">Deadline Perentalan:</span>
                                            @else
                                                <span class="font-semibold">Deadline:</span>
                                            @endif
                                            <span class="font-semibold text-red-600" id="countdown-{{ $order->id }}">-</span>
                                        </div>
                                    </div>

                                    {{-- Tambahkan di dalam <div class="rounded-xl ..."> setelah info motor dan detail --}}
                                    <div class="flex flex-col items-end justify-between h-full ml-auto">
                                        @if($order->status === 'Pending' && strtolower($order->payment) === 'transfer')
                                            <button type="button"
                                                onclick="openModal('{{ $order->id }}')"
                                                class="px-4 py-2 rounded-lg bg-green-600 text-white hover:bg-green-700 transition flex items-center gap-2 mb-2">
                                                <i class="fas fa-upload"></i>
                                                Upload Bukti Pembayaran
                                            </button>
                                            @include('components.form.user.proof', ['order' => $order])
                                        @endif
                                        <div id="proofStatus-{{ $order->id }}" class="mt-2">
                                            @if($order->payment_proof)
                                                <a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank" class="text-blue-600 underline">Lihat Bukti</a>
                                            @else
                                                <span class="text-gray-400 text-xs">Belum ada bukti</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

<!-- Tambahkan di <head> layout utama -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('status'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                text: '{{ session('status') }}',
                icon: 'success',
                showConfirmButton: false,
                timer: 2200,
                timerProgressBar: true,
                toast: true,
                position: 'top',
                background: '#f0f6ff',
                color: '#21408E',
                customClass: {
                    popup: 'shadow-2xl rounded-xl animate__animated animate__fadeInDown',
                    title: 'font-bold text-lg',
                    htmlContainer: 'text-base',
                },
                iconHtml: `
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#21408E" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" fill="#21408E"/>
                        <path d="M9 12l2 2l4 -4" stroke="#fff" stroke-width="2.5" fill="none"/>
                    </svg>
                `,
            });
        });
    </script>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    @foreach($orders as $order)
        @if($order->status === 'Pending')
            (function() {
                const countdownId = 'countdown-{{ $order->id }}';
                // Deadline 3 jam dari waktu order dibuat
                const orderTime = new Date('{{ \Carbon\Carbon::parse($order->created_at)->timezone("Asia/Jakarta")->format("Y-m-d H:i:s") }}').getTime();
                const deadline = orderTime + 3 * 60 * 60 * 1000; // 3 jam dalam ms

                function updateCountdown() {
                    const el = document.getElementById(countdownId);
                    if (!el) return; // Jika elemen tidak ditemukan, keluar
                    const now = new Date().getTime();
                    const distance = deadline - now;
                    if (distance < 0) {
                        el.innerText = 'Waktu Pembayaran Telah Habis';
                        return;
                    }
                    const hours = Math.floor((distance) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    el.innerText =
                        String(hours).padStart(2, '0') + ':' +
                        String(minutes).padStart(2, '0') + ':' +
                        String(seconds).padStart(2, '0');
                }
                updateCountdown();
                setInterval(updateCountdown, 1000);
            })();
        @elseif($order->status === 'Diterima' && $order->end_date)
            (function() {
                const countdownId = 'countdown-{{ $order->id }}';
                const end = new Date('{{ \Carbon\Carbon::parse($order->end_date)->toIso8601String() }}').getTime();
                function updateCountdown() {
                    const now = new Date().getTime();
                    const distance = end - now;
                    if (distance < 0) {
                        document.getElementById(countdownId).innerText = 'Waktu Habis';
                        return;
                    }
                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    document.getElementById(countdownId).innerText =
                        (days > 0 ? days + ' hari ' : '') +
                        String(hours).padStart(2, '0') + ':' +
                        String(minutes).padStart(2, '0') + ':' +
                        String(seconds).padStart(2, '0');
                }
                updateCountdown();
                setInterval(updateCountdown, 1000);
            })();
        @endif
    @endforeach
});
</script>

<script>
function openModal(orderId) {
    document.getElementById('uploadProofModal-' + orderId).classList.remove('hidden');
    document.getElementById('uploadProofModal-' + orderId).classList.add('flex');
}
function closeModal(orderId) {
    document.getElementById('uploadProofModal-' + orderId).classList.add('hidden');
    document.getElementById('uploadProofModal-' + orderId).classList.remove('flex');
}
</script>




