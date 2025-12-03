{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\admin\analyticssection\graphproduct.blade.php --}}

@php
    $labels = array_map(fn($p) => $p['name'], $products);
    $stocks = array_map(fn($p) => $p['stock'], $products);
    $colors = ['#21408E', '#fbbf24', '#22c55e', '#ef4444', '#3b82f6', '#a855f7', '#fb7185', '#10b981'];
@endphp

<div class="p-8 max-w-5xl w-full mx-auto transition-all duration-300 hover:shadow-blue-200">
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
        <canvas id="productPieChart" style="max-width: 480px; max-height: 400px;"></canvas>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('productPieChart').getContext('2d');
        @if(count($labels) > 0)
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        data: {!! json_encode($stocks) !!},
                        backgroundColor: {!! json_encode($colors) !!},
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
        @else
            // Jika tidak ada data produk
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Tidak Ada Data'],
                    datasets: [{
                        data: [1],
                        backgroundColor: ['#d1d5db'], // abu-abu netral
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'right',
                            labels: {
                                color: '#6b7280',
                                font: { size: 14, weight: 'bold' }
                            }
                        },
                        tooltip: {
                            enabled: false
                        }
                    },
                    animation: {
                        animateScale: true,
                        duration: 1200,
                        easing: 'easeOutBounce'
                    }
                }
            });
        @endif
    });
</script>
@endpush
