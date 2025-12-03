{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\table\admin\ordertable.blade.php --}}

<div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl p-8">
    <h3 class="text-2xl font-bold text-blue-800 mb-6 flex items-center gap-2">
        <i class="fas fa-clipboard-list text-blue-500"></i>
        Order List
    </h3>
    <form method="POST" action="{{ route('ordermanage.bulkAction') }}">
        @csrf
        <div class="overflow-x-auto rounded-xl border border-gray-200 shadow">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-100 to-yellow-50 text-gray-700">
                        <th class="py-4 px-4 text-left font-semibold">ORDER CODE</th>
                        <th class="py-4 px-4 text-left font-semibold">NAMA</th>
                        <th class="py-4 px-4 text-left font-semibold">TANGGAL</th>
                        <th class="py-4 px-4 text-left font-semibold">TOTAL</th>
                        <th class="py-4 px-4 text-left font-semibold">METODE</th>
                        <th class="py-4 px-4 text-left font-semibold">STATUS</th>
                        <th class="py-4 px-4 text-left font-semibold">DETAIL</th>
                        <th class="py-4 px-4 text-left font-semibold">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr x-data="{ open: false, status: '{{ $order->status }}' }" class="border-b hover:bg-blue-50 transition-colors">
                        <td class="py-3 px-4">{{ $order->order_code }}</td>
                        <td class="py-3 px-4 font-medium text-gray-900">{{ $order->user->name ?? '-' }}</td>
                        <td class="py-3 px-4 text-gray-700">{{ $order->tanggal_order }}</td>
                        <td class="py-3 px-4 text-blue-700">{{ number_format($order->total_harga, 0, ',', '.') }}</td>
                        <td class="py-3 px-4">{{ $order->metode_bayar }}</td>
                        <td class="py-3 px-4">
                            <template x-if="status === 'Pending'">
                                <span class="inline-block px-4 py-1 rounded-full text-xs font-semibold bg-orange-100 text-orange-700">Pending</span>
                            </template>
                            <template x-if="status === 'Diterima'">
                                <span class="inline-block px-4 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">Diterima</span>
                            </template>
                            <template x-if="status === 'Ditolak'">
                                <span class="inline-block px-4 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">Ditolak</span>
                            </template>
                        </td>
                        <td class="py-3 px-4">
                            <button @click="open = !open" type="button" class="border border-blue-400 text-blue-700 px-4 py-1.5 rounded-lg font-semibold shadow transition-colors hover:bg-blue-50 flex items-center gap-2 justify-center w-max mx-auto focus:outline-none">
                                <i class="fas fa-eye"></i>
                                Detail
                            </button>
                        </td>
                        <td class="py-3 px-4">
                            <select name="actions[{{ $order->id }}]" x-model="status" class="border border-blue-400 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 text-gray-700 bg-white shadow transition-all cursor-pointer">
                                <option value="Pending">Pending</option>
                                <option value="Diterima">Diterima</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                        </td>
                    </tr>
                    <tr x-show="open" x-transition style="display: none;">
                        <td colspan="8" class="bg-blue-50 px-6 py-4">
                            <div class="rounded-xl border border-blue-200 shadow-inner p-4">
                                <div class="font-semibold text-blue-800 mb-2 flex items-center gap-2">
                                    <i class="fas fa-info-circle"></i> Detail Order
                                </div>
                                <table class="w-full text-xs mb-2">
                                    <thead>
                                        <tr class="bg-blue-100 text-blue-900">
                                            <th class="py-2 px-2 text-left font-semibold">PRODUK</th>
                                            <th class="py-2 px-2 text-left font-semibold">QTY</th>
                                            <th class="py-2 px-2 text-left font-semibold">HARGA SATUAN</th>
                                            <th class="py-2 px-2 text-left font-semibold">SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($order->details && count($order->details))
                                            @foreach($order->details as $detail)
                                            <tr>
                                                <td class="py-2 px-2">{{ $detail->produk }}</td>
                                                <td class="py-2 px-2">{{ $detail->qty }}</td>
                                                <td class="py-2 px-2">{{ number_format($detail->harga, 0, ',', '.') }}</td>
                                                <td class="py-2 px-2">{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" class="text-center text-gray-400 py-2">Tidak ada detail order.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if(count($orders) === 0)
                        <tr>
                            <td colspan="8" class="text-center py-12 text-gray-400 text-lg font-semibold">
                                <i class="fas fa-box-open text-2xl mb-2 block"></i>
                                Order Not Found
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mt-6">
            <button type="submit"
                class="bg-gradient-to-r from-blue-100 to-yellow-50 text-gray-700 px-7 py-2.5 rounded-xl font-semibold shadow-lg flex items-center gap-3 transition-all duration-200 hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-sync-alt"></i>
                Perbarui
            </button>
        </div>
    </form>
</div>
