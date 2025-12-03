{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\pages\user\history.blade.php --}}
<x-app-layout>
    @php
    $orders = collect([
        (object)[
            'id' => 1,
            'start_date' => now()->subDays(10),
            'end_date' => now()->subDays(7),
            'status' => 'completed',
            'product' => (object)[
                'name' => 'Yamaha NMAX',
                'image' => 'img/products/nmax.jpg',
                'price' => 150000,
                'category' => (object)[ 'name' => 'Matic Premium' ]
            ]
        ],
        (object)[
            'id' => 2,
            'start_date' => now()->subDays(5),
            'end_date' => now()->subDays(2),
            'status' => 'pending',
            'product' => (object)[
                'name' => 'Honda Beat',
                'image' => null,
                'price' => 90000,
                'category' => (object)[ 'name' => 'Matic' ]
            ]
        ],
    ]);
    @endphp

    <div class="max-w-5xl mx-auto p-6 sm:p-10">
        <h2 class="text-2xl sm:text-3xl font-bold text-[#21408E] mb-8 flex items-center gap-2">
            <i class="fas fa-history text-yellow-400"></i>
            Riwayat Sewa Produk
        </h2>
        @if($orders->isEmpty())
            <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 p-6 rounded-lg shadow text-center">
                <i class="fas fa-info-circle mr-2"></i>
                Belum ada riwayat sewa produk.
            </div>
        @else
            <div class="space-y-8">
                @foreach($orders as $order)
                    <div class="bg-gradient-to-r from-blue-50 via-white to-yellow-50 rounded-2xl shadow-lg p-6 flex flex-col sm:flex-row items-center gap-8 border border-gray-100 hover:shadow-xl transition-all duration-300">
                        <div>
                            @if($order->product->image)
                                <img src="{{ asset($order->product->image) }}" alt="{{ $order->product->name }}" class="w-32 h-32 object-cover rounded-xl border-4 border-blue-200 shadow-lg">
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
                                        @if($order->status === 'completed')
                                            <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold shadow">Selesai</span>
                                        @elseif($order->status === 'pending')
                                            <span class="inline-block px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold shadow">Menunggu</span>
                                        @elseif($order->status === 'cancelled')
                                            <span class="inline-block px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold shadow">Dibatalkan</span>
                                        @else
                                            <span class="inline-block px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-semibold shadow">{{ ucfirst($order->status) }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-4 sm:mt-0">
                                    <a href="#"
                                       class="inline-flex items-center gap-2 px-6 py-2 rounded-xl bg-blue-500 hover:bg-blue-700 text-white font-semibold shadow-lg transition-all duration-200">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>

<!-- Tambahkan di <head> layout utama -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
