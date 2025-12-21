{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\admin\tableactivity\orderactivity.blade.php --}}
<div class="bg-gradient-to-r from-blue-100 to-yellow-50 rounded-lg shadow-md p-6 flex flex-col min-h-[400px]">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Order</h3>

    <div class="overflow-x-auto flex-1">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-100 border-b border-gray-300">
                    <th class="text-left py-3 px-4 font-semibold text-gray-800 uppercase">ORDER ID</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-800 uppercase">NAMA</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-800 uppercase">TANGGAL</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-800 uppercase">TOTAL</th>
                    <th class="text-left py-3 px-4 font-semibold text-gray-800 uppercase">STATUS</th>
                </tr>
            </thead>
            <tbody class="border-gray-800">
                @forelse($orders as $order)
                    <tr class="border-b border-gray-300 hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 text-gray-800">{{ $order->order_code }}</td>
                        <td class="py-4 px-4 text-gray-800">{{ $order->user->name ?? '-' }}</td>
                        <td class="py-4 px-4 text-gray-800">{{ \Carbon\Carbon::parse($order->tanggal_order)->format('d/m/Y') }}</td>
                        <td class="py-4 px-4 text-gray-800">Rp{{ number_format($order->total_harga, 0, ',', '.') }}</td>
                        <td class="py-4 px-4">
                            @php
                                $statusColor = [
                                    'Pending' => 'bg-orange-100 text-orange-800',
                                    'Paid' => 'bg-blue-100 text-blue-800',
                                    'Shipped' => 'bg-blue-100 text-blue-800',
                                    'Delivered' => 'bg-green-100 text-green-800',
                                    'Packed' => 'bg-blue-100 text-blue-800',
                                    'Diterima' => 'bg-green-100 text-green-800',
                                    'Ditolak' => 'bg-red-100 text-red-800',
                                ];
                                $color = $statusColor[$order->status] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <span class="px-3 py-1 {{ $color }} text-xs font-medium rounded-full">
                                {{ $order->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-12">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-gradient-to-br from-blue-100 to-yellow-50 shadow">
                                    <i class="fas fa-box-open text-3xl text-blue-300"></i>
                                </div>
                                <div class="text-base text-gray-400 font-semibold">There Are No Order Yet</div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-right">
        <a href="{{ route('ordermanage') }}" class="inline-flex items-center border border-blue-500 rounded-full px-5 py-2 text-blue-700 hover:bg-blue-50 hover:text-blue-900 font-medium text-sm transition-colors">
            Manage Order
            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</div>
