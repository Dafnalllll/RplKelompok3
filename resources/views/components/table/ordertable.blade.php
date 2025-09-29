<div class="bg-gray-100 p-4 rounded">
    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-50 border-b">
                <th class="py-4 px-6 text-left font-semibold text-gray-700">ORDER ID</th>
                <th class="py-4 px-6 text-left font-semibold text-gray-700">NAMA</th>
                <th class="py-4 px-6 text-left font-semibold text-gray-700">TANGGAL</th>
                <th class="py-4 px-6 text-left font-semibold text-gray-700">TOTAL</th>
                <th class="py-4 px-6 text-left font-semibold text-gray-700">STATUS</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @php
                $orders = [
                    ['id' => '#348053', 'name' => 'Ryan', 'date' => '20/09/2025', 'total' => 'Rp545.000', 'status' => 'Delivered'],
                    ['id' => '#943946', 'name' => 'Dafa', 'date' => '21/09/2025', 'total' => 'Rp545.000', 'status' => 'Paid'],
                    ['id' => '#204769', 'name' => 'Alpintan', 'date' => '22/09/2025', 'total' => 'Rp545.000', 'status' => 'Packed'],
                    ['id' => '#391204', 'name' => 'Zavi', 'date' => '23/09/2025', 'total' => 'Rp545.000', 'status' => 'Pending'],
                    ['id' => '#230586', 'name' => 'Rahmi', 'date' => '24/09/2025', 'total' => 'Rp545.000', 'status' => 'Shipped'],
                ];
                $statusColor = [
                    'Delivered' => 'bg-green-100 text-green-700',
                    'Paid' => 'bg-blue-200 text-blue-700',
                    'Packed' => 'bg-blue-200 text-blue-700',
                    'Pending' => 'bg-orange-200 text-orange-700',
                    'Shipped' => 'bg-blue-200 text-blue-700',
                ];
            @endphp
            @foreach($orders as $order)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="py-6 px-6">{{ $order['id'] }}</td>
                <td class="py-6 px-6">{{ $order['name'] }}</td>
                <td class="py-6 px-6">{{ $order['date'] }}</td>
                <td class="py-6 px-6">{{ $order['total'] }}</td>
                <td class="py-6 px-6 flex items-center gap-4">
                    <span class="px-6 py-1 rounded-full font-medium {{ $statusColor[$order['status']] }}">
                        {{ $order['status'] }}
                    </span>
                    <a href="#" class="text-yellow-900 underline">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
