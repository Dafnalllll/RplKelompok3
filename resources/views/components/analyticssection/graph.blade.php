{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\analyticssection\graph.blade.php --}}
@php
    // Data dummy produk
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

<div class="bg-gradient-to-br from-blue-50 to-yellow-50 rounded-2xl shadow-2xl p-8 max-w-5xl w-full mx-auto transition-all duration-300 hover:shadow-blue-200">
    <div class="flex items-center mb-8">
        <div class="bg-blue-100 rounded-full p-4 mr-6">
            <img src="{{ asset('img/payment/motorcycle.webp') }}" alt="Motor Icon" class="w-10 h-10 object-contain" />
        </div>
        <div>
            <h2 class="text-3xl font-bold text-blue-800 tracking-wide">Stok Motor</h2>
            <p class="text-gray-500 text-base">Data stok motor terbaru</p>
        </div>
    </div>
    <div class="relative">
        <canvas id="myChart"></canvas>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myChart').getContext('2d');
        const barColors = [
            'rgba(33, 64, 142, 0.9)',   // Honda Beat
            'rgba(251, 191, 36, 0.8)',  // Yamaha Mio
            'rgba(34, 197, 94, 0.8)',   // Honda Vario 125
            'rgba(239, 68, 68, 0.8)',   // Yamaha NMAX
            'rgba(59, 130, 246, 0.8)',  // Honda Supra X 125
            'rgba(168, 85, 247, 0.8)',  // Honda PCX
            'rgba(251, 113, 133, 0.8)', // Yamaha Aerox
            'rgba(16, 185, 129, 0.8)'   // Suzuki Address
        ];

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Stok Motor',
                    data: {!! json_encode($stocks) !!},
                    backgroundColor: barColors,
                    borderColor: barColors.map(color => color.replace('0.8', '1')),
                    borderWidth: 2,
                    borderRadius: 8,
                    hoverBackgroundColor: barColors.map(color => color.replace('0.8', '1')),
                    hoverBorderColor: '#fbbf24'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 1200,
                    easing: 'easeOutBounce'
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#21408E',
                            font: { size: 16, weight: 'bold' }
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
                scales: {
                    x: {
                        ticks: {
                            color: '#21408E',
                            font: { size: 14, weight: 'bold' }
                        },
                        grid: { display: false }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#21408E',
                            font: { size: 14, weight: 'bold' }
                        },
                        grid: {
                            color: '#e0e7ef',
                            borderDash: [4, 4]
                        }
                    }
                }
            }
        });

        // Atur tinggi container agar grafik tetap proporsional
        document.getElementById('myChart').parentElement.style.height = '400px';
    });
</script>
@endpush
