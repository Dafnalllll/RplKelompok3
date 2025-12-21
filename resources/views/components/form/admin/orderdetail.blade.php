{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\form\admin\orderdetail.blade.php --}}
<div x-data="{ open: false }">
    <!-- Tombol untuk membuka modal detail -->
    <button @click="open = true"
        type="button"
        class="inline-flex items-center gap-2 px-5 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white font-semibold hover:scale-105 transition-all">
        <i class="fas fa-eye"></i> Detail
    </button>
    <!-- Modal Detail Order -->
    <div x-show="open" x-cloak>
        <!-- Overlay -->
        <div class="fixed inset-0 z-40 "></div>
        <!-- Modal -->
        <div class="fixed inset-0 z-50 flex items-center justify-center">
            <div @click.away="open = false"
                class="bg-white rounded-2xl shadow-2xl p-8 relative overflow-y-auto"
                style="width:100%;max-width:700px;min-width:350px;position:fixed;left:50%;top:50%;transform:translate(-50%,-50%);">
                <!-- Tombol close -->
                <button type="button" @click="open = false"
                    class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-2xl font-bold focus:outline-none">&times;</button>
                <div class="flex flex-col sm:flex-row gap-8 items-center">
                    <!-- Foto Produk -->
                    <div>
                        @if(!empty($order->product->image))
                            <img src="{{ asset('storage/' . $order->product->image) }}" alt="{{ $order->product->name }}"
                                class="w-40 h-40 object-cover rounded-xl bg-white">
                        @else
                            <div class="w-40 h-40 rounded-xl bg-blue-100 flex items-center justify-center text-blue-400 text-6xl border-4 border-blue-50 shadow">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                    </div>
                    <!-- Info Order -->
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-blue-800 mb-2 flex items-center gap-2">
                            <i class="fas fa-box"></i> {{ $order->product->name ?? '-' }}
                        </h2>
                        <div class="mb-2">
                            <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
                                {{ $order->product->category->name ?? '-' }}
                            </span>
                        </div>
                        <div class="mb-2 text-gray-700">
                            <span class="font-semibold">Stok yang diorder:</span>
                            <span class="text-blue-700 font-bold">{{ $order->qty ?? '-' }}</span>
                        </div>
                        <div class="mb-2 text-gray-700">
                            <span class="font-semibold">Nomor Telepon Pemesan:</span>
                            <span class="text-blue-700 font-bold">{{ $order->user->phone ?? '-' }}</span>
                        </div>
                        <div class="mb-2 text-gray-700">
                            <span class="font-semibold">Harga Total:</span>
                            <span class="text-green-700 font-bold">Rp {{ number_format($order->total_harga,0,',','.') }}</span>
                        </div>
                        <div class="mb-2 text-gray-700">
                            <span class="font-semibold">Status Order:</span>
                            @if($order->status === 'Pending')
                                <span class="inline-block px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-xs font-semibold">
                                    Pending
                                </span>
                            @elseif($order->status === 'Diterima')
                                <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                                    Diterima
                                </span>
                            @elseif($order->status === 'Ditolak')
                                <span class="inline-block px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">
                                    Ditolak
                                </span>
                            @else
                                <span class="inline-block px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-semibold">
                                    {{ $order->status ?? '-' }}
                                </span>
                            @endif
                        </div>
                        <div class="mb-2 text-gray-700">
                            <span class="font-semibold">Tanggal Order:</span>
                            <span class="text-gray-800">{{ $order->tanggal_order ?? '-' }}</span>
                        </div>
                        <div class="mb-2 text-gray-700">
                            <span class="font-semibold">Tanggal Return:</span>
                            <span class="text-gray-800" id="end-date-{{ $order->id }}">
                                {{ $order->userOrders->first()->end_date ?? '-' }}
                            </span>
                        </div>
                        @if($order->status === 'Diterima')
                            <div class="mb-2 text-gray-700" x-data x-init="startCountdown('{{ \Carbon\Carbon::parse(optional($order->userOrders->first())->end_date)->setTimezone('Asia/Jakarta')->toIso8601String() }}', {{ $order->id }})">
                                <span class="font-semibold">Deadline:</span>
                                <span class="text-red-600 font-bold" id="countdown-{{ $order->id }}">-</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function startCountdown(endDate, orderId) {
    if (!endDate) return;
    const countdownId = 'countdown-' + orderId;
    const end = new Date(endDate).getTime(); // Hapus .replace(/-/g, '/')

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
}
</script>
