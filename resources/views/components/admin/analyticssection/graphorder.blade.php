{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\admin\analyticssection\graphorder.blade.php --}}

@php
    // Ambil status dan jumlah order dari database
    $orderStatus = \App\Models\Order::selectRaw('status, COUNT(*) as total')
        ->groupBy('status')
        ->pluck('total', 'status')
        ->toArray();

    // Pastikan urutan dan label tetap: Pending, Diterima, Ditolak
    $labels = ['Pending', 'Diterima', 'Ditolak'];
    $values = [
        $orderStatus['Pending'] ?? 0,
        $orderStatus['Diterima'] ?? 0,
        $orderStatus['Ditolak'] ?? 0,
    ];
    $colors = ['#fbbf24', '#22c55e', '#ef4444'];
@endphp

<div class="p-8 max-w-5xl w-full mx-auto transition-all duration-300 hover:shadow-blue-200">
    <div class="flex items-center mb-8">
        <div class="bg-blue-100 rounded-full p-4 mr-6">
            <img src="{{ asset('img/analytics/status.webp') }}" alt="Status Icon" class="w-10 h-10 object-contain" />
        </div>
        <div>
            <h2 class="text-3xl font-bold text-blue-800 tracking-wide">Status Pesanan</h2>
            <p class="text-gray-500 text-base">Proporsi status pesanan</p>
        </div>
    </div>
    <div class="relative flex justify-center">
        <canvas id="orderPieChart" style="max-width: 480px; max-height: 400px;"></canvas>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('orderPieChart').getContext('2d');
        @if(array_sum($values) > 0)
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        data: {!! json_encode($values) !!},
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
            // Jika tidak ada data order
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Tidak Ada Data'],
                    datasets: [{
                        data: [1],
                        backgroundColor: ['#d1d5db'],
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
