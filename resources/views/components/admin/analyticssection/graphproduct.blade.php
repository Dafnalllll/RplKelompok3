{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\admin\analyticssection\graph.blade.php --}}

@php
    $products = [
        ['name' => 'Honda Beat', 'stock' => 8],
        ['name' => 'Yamaha Mio', 'stock' => 5],
        ['name' => 'Honda Vario 125', 'stock' => 3],
        ['name' => 'Yamaha NMAX', 'stock' => 2],
        ['name' => 'Honda Supra X 125', 'stock' => 6],
        ['name' => 'Honda PCX', 'stock' => 4],
        ['name' => 'Yamaha Aerox', 'stock' => 5],
        ['name' => 'Suzuki Address', 'stock' => 7],
    ];
    $labels = collect($products)->pluck('name');
    $stocks = collect($products)->pluck('stock');
@endphp

<div class=" p-8 max-w-5xl w-full mx-auto transition-all duration-300 hover:shadow-blue-200">
    <div class="flex items-center mb-8">
        <div class="bg-blue-100 rounded-full p-4 mr-6">
            <img src="{{ asset('img/payment/motorcycle.webp') }}" alt="Motor Icon" class="w-10 h-10 object-contain" />
        </div>
        <div>
            <h2 class="text-3xl font-bold text-blue-800 tracking-wide">Stok Motor</h2>
            <p class="text-gray-500 text-base">Proporsi stok motor</p>
        </div>
    </div>
    <div class="relative flex justify-center">
        <canvas id="pieChart" style="max-width: 480px; max-height: 400px;"></canvas>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('pieChart').getContext('2d');
        const pieColors = [
            '#21408E', '#fbbf24', '#22c55e', '#ef4444',
            '#3b82f6', '#a855f7', '#fb7185', '#10b981'
        ];

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    data: {!! json_encode($stocks) !!},
                    backgroundColor: pieColors,
                    borderColor: '#fff',
                    borderWidth: 2,
                    hoverOffset: 16
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'right',
                        labels: {
                            color: '#21408E',
                            font: { size: 14, weight: 'bold' }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#21408E',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#fbbf24',
                        borderWidth: 1
                    }
                },
                animation: {
                    animateScale: true,
                    duration: 1200,
                    easing: 'easeOutBounce'
                }
            }
        });
    });
</script>
@endpush
