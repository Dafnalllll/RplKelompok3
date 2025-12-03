{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\admin\tableactivity\productactivity.blade.php --}}
<div class="bg-gradient-to-r from-blue-100 to-yellow-50 rounded-lg shadow-md p-6 flex flex-col min-h-[300px] justify-between">
    <div>
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Stok Produk Tersisa</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-800">
                        <th class="text-left py-3 px-4 font-semibold text-gray-800 uppercase">PRODUK</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-800 uppercase">STOK</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr class="border-b border-gray-300 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4 text-gray-800">{{ $product->name }}</td>
                            <td class="py-4 px-4">
                                <span class="text-red-500 font-medium">{{ $product->stock }} tersisa</span>
                            </td>
                        </tr>
                    @empty
                       <tr>
                        <td colspan="5" class="py-12">
                            <div class="flex flex-col items-center justify-center gap-2 h-[350px]">
                                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-gradient-to-br from-blue-100 to-yellow-50 shadow">
                                    <i class="fas fa-motorcycle text-3xl text-blue-300"></i>
                                </div>
                                <div class="text-base text-gray-400 font-semibold">There Are No Product Yet</div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-auto text-right">
        <a href="{{ route('productmanage') }}" class="inline-flex items-center border border-blue-500 rounded-full px-5 py-2 text-blue-700 hover:bg-blue-50 hover:text-blue-900 font-medium text-sm transition-colors">
            Manage Product
            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</div>
