<!-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\tableactivity\orderactivity.blade.php -->
<div class="bg-white rounded-lg shadow-md p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Order</h3>

    <div class="overflow-x-auto">
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
            <tbody>
                <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-4 text-gray-800">#348053</td>
                    <td class="py-4 px-4 text-gray-800">Ryan</td>
                    <td class="py-4 px-4 text-gray-800">20/09/2025</td>
                    <td class="py-4 px-4 text-gray-800">Rp545.000</td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Paid</span>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-4 text-gray-800">#943946</td>
                    <td class="py-4 px-4 text-gray-800">Dafa</td>
                    <td class="py-4 px-4 text-gray-800">21/09/2025</td>
                    <td class="py-4 px-4 text-gray-800">Rp545.000</td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 bg-orange-100 text-orange-800 text-xs font-medium rounded-full">Pending</span>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-4 text-gray-800">#204769</td>
                    <td class="py-4 px-4 text-gray-800">Alpintan</td>
                    <td class="py-4 px-4 text-gray-800">22/09/2025</td>
                    <td class="py-4 px-4 text-gray-800">Rp545.000</td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Shipped</span>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-4 text-gray-800">#391204</td>
                    <td class="py-4 px-4 text-gray-800">Zavi</td>
                    <td class="py-4 px-4 text-gray-800">23/09/2025</td>
                    <td class="py-4 px-4 text-gray-800">Rp545.000</td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Delivered</span>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-4 text-gray-800">#230586</td>
                    <td class="py-4 px-4 text-gray-800">Rahmi</td>
                    <td class="py-4 px-4 text-gray-800">24/09/2025</td>
                    <td class="py-4 px-4 text-gray-800">Rp545.000</td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Packed</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-right">
        <a href="#" class="inline-flex items-center border border-blue-500 rounded-full px-5 py-2 text-blue-700 hover:bg-blue-50 hover:text-blue-900 font-medium text-sm transition-colors">
            Lihat semua order
            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</div>
