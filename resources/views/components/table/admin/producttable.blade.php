<!-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\table\producttable.blade.php -->
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            {{-- Table Header --}}
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700 uppercase tracking-wider">FOTO</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700 uppercase tracking-wider">NAMA PRODUK</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700 uppercase tracking-wider">KATEGORI</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700 uppercase tracking-wider">HARGA</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700 uppercase tracking-wider">STOK</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700 uppercase tracking-wider">STATUS</th>
                    <th class="text-center py-4 px-6 font-semibold text-gray-700 uppercase tracking-wider">ACTION</th>
                </tr>
            </thead>
            {{-- Table Body --}}
            <tbody class="divide-y divide-gray-200">
                @php
                    $products = [
                        ['name' => 'Honda Scoopy', 'category' => 'Matic', 'status' => 'Active'],
                        ['name' => 'Honda Beat', 'category' => 'Matic', 'status' => 'Inactive'],
                        ['name' => 'Honda Vario', 'category' => 'Matic', 'status' => 'Active'],
                        ['name' => 'Honda PCX', 'category' => 'Matic', 'status' => 'Inactive'],
                        ['name' => 'Honda Revo', 'category' => 'Matic', 'status' => 'Active'],
                        ['name' => 'Honda CB150R', 'category' => 'Matic', 'status' => 'Active'],
                        ['name' => 'Honda ADV', 'category' => 'Matic', 'status' => 'Inactive'],
                        ['name' => 'Honda Genio', 'category' => 'Matic', 'status' => 'Active'],
                        ['name' => 'Honda CBR', 'category' => 'Manual', 'status' => 'Inactive'],
                        ['name' => 'Honda CRF', 'category' => 'Manual', 'status' => 'Inactive'],
                    ];
                @endphp

                @foreach($products as $index => $product)
                <tr class="hover:bg-gray-50 transition-colors">
                    {{-- Foto --}}
                    <td class="py-4 px-6">
                        <img src="{{ asset('img/motor.png') }}" alt="{{ $product['name'] }}" class="w-14 h-14 object-cover rounded-lg">
                    </td>
                    {{-- Nama Produk --}}
                    <td class="py-4 px-6">
                        <span class="font-medium text-gray-800">{{ $product['name'] }}</span>
                    </td>
                    {{-- Kategori --}}
                    <td class="py-4 px-6">
                        <span class="text-gray-600">{{ $product['category'] }}</span>
                    </td>
                    {{-- Harga --}}
                    <td class="py-4 px-6">
                        <span class="text-gray-800 font-medium">Rp. 4. 545. 000</span>
                    </td>
                    {{-- Stok --}}
                    <td class="py-4 px-6">
                        <span class="text-gray-600">102</span>
                    </td>
                    {{-- Status --}}
                    <td class="py-4 px-6">
                        @if($product['status'] == 'Active')
                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Active</span>
                        @else
                            <span class="px-3 py-1 bg-red-100 text-red-800 text-xs font-medium rounded-full">Inactive</span>
                        @endif
                    </td>
                    {{-- Action --}}
                    <td class="py-4 px-6 text-center">
                        <select class="text-sm border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Edit</option>
                            <option value="edit">Edit Product</option>
                            <option value="delete">Delete</option>
                            <option value="view">View Details</option>
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
