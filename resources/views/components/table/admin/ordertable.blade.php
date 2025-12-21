{{-- filepath: resources/views/components/table/admin/ordertable.blade.php --}}
<div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl p-8 mt-8">
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
                        <th class="py-4 px-4 text-left font-semibold">UNIT</th>
                        <th class="py-4 px-4 text-left font-semibold">TANGGAL</th>
                        <th class="py-4 px-4 text-left font-semibold">TOTAL</th>
                        <th class="py-4 px-4 text-left font-semibold">METODE</th>
                        <th class="py-4 px-4 text-left font-semibold">STATUS</th>
                        <th class="py-4 px-4 text-left font-semibold">DETAIL</th>
                        <th class="py-4 px-4 text-left font-semibold">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $bulanIndo = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
                    @endphp
                    @forelse($orders as $order)
                        <template x-if="paginated.some(o => o.id === {{ $order->id }})">
                            <tr>
                                <td class="py-3 px-4">{{ $order->order_code }}</td>
                                <td class="py-3 px-4">{{ $order->user->name ?? '-' }}</td>
                                <td class="py-3 px-4">{{ $order->qty ?? '-' }}</td>
                                <td class="py-3 px-4">
                                    @php
                                        $tgl = $order->tanggal_order;
                                        if (preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $tgl, $m)) {
                                            echo $m[3] . ' ' . $bulanIndo[(int)$m[2]-1] . ' ' . $m[1];
                                        } else {
                                            echo $tgl;
                                        }
                                    @endphp
                                </td>
                                <td class="py-3 px-4 text-blue-700 font-semibold">Rp {{ number_format($order->total_harga,0,',','.') }}</td>
                                <td class="py-3 px-4">{{ $order->metode_bayar }}</td>
                                <td>
                                    @if($order->status === 'Pending')
                                        <span class="inline-block px-4 py-1 rounded-full text-xs font-semibold bg-orange-100 text-orange-700">Pending</span>
                                    @elseif($order->status === 'Diterima')
                                        <span class="inline-block px-4 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">Diterima</span>
                                    @else
                                        <span class="inline-block px-4 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">Ditolak</span>
                                    @endif
                                </td>
                                <!-- DETAIL -->
                                <td class="py-3 px-4">
                                    @include('components.form.admin.orderdetail', ['order' => $order])
                                </td>
                                <!-- AKSI -->
                                <td class="py-3 px-4">
                                    <select name="actions[{{ $order->id }}]" class="border border-blue-400 rounded-lg px-8 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 text-gray-700 bg-white shadow transition-all cursor-pointer">
                                        <option value="Pending" @if($order->status == 'Pending') selected @endif>Pending</option>
                                        <option value="Diterima" @if($order->status == 'Diterima') selected @endif>Diterima</option>
                                        <option value="Ditolak" @if($order->status == 'Ditolak') selected @endif>Ditolak</option>
                                    </select>
                                </td>
                            </tr>
                        </template>
                    @empty

                    @endforelse
                    <template x-if="paginated.length === 0">
                        <tr>
                            <td colspan="9" class="text-center py-8 text-gray-400 text-lg font-semibold">
                                <i class="fas fa-box text-2xl mb-2 block"></i>
                                Order Not Found
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        {{-- Pagination Controls --}}
        <div class="flex justify-center items-center gap-2 mt-6">
            <button type="button"
                class="px-3 py-1 rounded bg-blue-100 text-blue-700 font-semibold hover:bg-blue-200 transition"
                @click="if(page > 1) page--"
                :disabled="page === 1"
            >
                <i class="fas fa-chevron-left"></i>
            </button>
            <template x-for="i in totalPages" :key="i">
                <button type="button"
                    class="px-3 py-1 rounded-full font-semibold"
                    :class="page === i ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-blue-100'"
                    @click="page = i"
                    x-text="i"
                ></button>
            </template>
            <button type="button"
                class="px-3 py-1 rounded bg-blue-100 text-blue-700 font-semibold hover:bg-blue-200 transition"
                @click="if(page < totalPages) page++"
                :disabled="page === totalPages"
            >
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <div class="flex justify-end mt-6 gap-3">
            {{-- Export CSV Button --}}
            <button
                type="button"
                onclick="exportOrderTableToCSV()"
                :disabled="paginated.length === 0"
                :class="paginated.length === 0 ? 'cursor-not-allowed' : ''"
                class="bg-gradient-to-r from-green-200 to-green-400 text-green-900 px-7 py-2.5 rounded-xl font-semibold shadow-lg flex items-center gap-3 transition-all duration-200 hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-400"
            >
                <i class="fas fa-file-csv"></i>
                Export CSV
            </button>
            {{-- Perbarui Button --}}
            <button type="submit"
                class="bg-gradient-to-r from-blue-100 to-yellow-50 text-gray-700 px-7 py-2.5 rounded-xl font-semibold shadow-lg flex items-center gap-3 transition-all duration-200 hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-sync-alt"></i>
                Perbarui
            </button>
        </div>
    </form>
</div>

<script>
function exportOrderTableToCSV() {
    let csv = 'Order Code,Nama,Unit,Tanggal,Total,Metode,Status\n';
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];

    // Fungsi format singkat Indonesia
    function formatRupiahShort(num) {
        num = parseInt(num, 10) || 0;
        if (num >= 1_000_000_000_000) return (num / 1_000_000_000_000).toFixed((num % 1_000_000_000_000 === 0) ? 0 : 1).replace('.', ',') + 'T';
        if (num >= 1_000_000_000) return (num / 1_000_000_000).toFixed((num % 1_000_000_000 === 0) ? 0 : 1).replace('.', ',') + 'M';
        if (num >= 1_000_000) return (num / 1_000_000).toFixed((num % 1_000_000 === 0) ? 0 : 1).replace('.', ',') + 'Jt';
        if (num >= 1_000) return (num / 1_000).toFixed((num % 1_000 === 0) ? 0 : 1).replace('.', ',') + 'Rb';
        return num.toString();
    }

    document.querySelectorAll('tbody tr').forEach(row => {
        const tds = row.querySelectorAll('td');
        if (tds.length < 9) return;
        let orderCode = tds[0]?.innerText.trim().replace(/\s+/g, ' ') || '';
        let nama = tds[1]?.innerText.trim().replace(/\s+/g, ' ') || '';
        let unit = tds[2]?.innerText.trim().replace(/\s+/g, ' ') || '';
        let tanggalRaw = tds[3]?.innerText.trim().replace(/\s+/g, ' ') || '';
        let tanggal = tanggalRaw;
        let match = tanggalRaw.match(/^(\d{4})-(\d{2})-(\d{2})$/);
        if (match) {
            let day = match[3];
            let month = monthNames[parseInt(match[2], 10) - 1];
            let year = match[1];
            tanggal = `${day} ${month} ${year}`;
        }
        // Ambil angka dari kolom total (misal: "Rp 90.000" -> 90000)
        let totalText = tds[4]?.innerText.trim().replace(/\s+/g, ' ') || '';
        let totalNum = parseInt(totalText.replace(/[^\d]/g, ''), 10) || 0;
        let total = formatRupiahShort(totalNum);

        let metode = tds[5]?.innerText.trim().replace(/\s+/g, ' ') || '';
        let status = tds[6]?.innerText.trim().replace(/\s+/g, ' ') || '';
        let data = [orderCode, nama, unit, tanggal, total, metode, status].map(v => /,/.test(v) ? `"${v}"` : v);
        csv += data.join(',') + '\n';
    });

    // Download CSV
    let blob = new Blob([csv], { type: 'text/csv' });
    let url = window.URL.createObjectURL(blob);
    let a = document.createElement('a');
    a.href = url;
    a.download = 'Data Order.csv';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    window.URL.revokeObjectURL(url);
}
</script>
