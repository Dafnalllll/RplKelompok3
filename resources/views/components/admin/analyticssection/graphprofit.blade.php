{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\admin\analyticssection\graphprofit.blade.php --}}

@php
    // Data dummy pendapatan per bulan (dalam juta)
    $monthlyIncome = [
        'Jan' => 12,
        'Feb' => 15,
        'Mar' => 18,
        'Apr' => 17,
        'Mei' => 21,
        'Jun' => 16,
        'Jul' => 20,
        'Agu' => 22,
        'Sep' => 19.5,
        'Okt' => 23,
        'Nov' => 21,
        'Des' => 25,
    ];
    $labels = array_keys($monthlyIncome);
    $values = array_values($monthlyIncome);
    $total = array_sum($values);
    $percents = array_map(fn($v) => round($v / $total * 100, 1), $values);
    $colors = [
        '#22c55e','#fbbf24','#ef4444','#3b82f6','#a855f7','#fb7185',
        '#10b981','#f472b6','#f59e42','#6366f1','#eab308','#14b8a6'
    ];
@endphp

<div class="p-8 max-w-5xl w-full mx-auto transition-all duration-300 hover:shadow-blue-200">
    <div class="flex items-center mb-8">
        <div class="bg-blue-100 rounded-full p-4 mr-6">
            <img src="{{ asset('img/analytics/profit.webp') }}" alt="Profit Icon" class="w-10 h-10 object-contain" />
        </div>
        <div>
            <h2 class="text-3xl font-bold text-blue-800 tracking-wide">Pendapatan per Bulan</h2>
            <p class="text-gray-500 text-base">Proporsi pendapatan tiap bulan (juta rupiah)</p>
        </div>
    </div>
    <div class="relative flex justify-center">
        <canvas id="profitPieChart" style="max-width: 480px; max-height: 400px;"></canvas>
    </div>
    <div class="flex justify-center mt-8">
        <div class="bg-white/60 rounded-xl px-8 py-4 shadow text-center">
            <span class="block text-lg text-gray-700 font-semibold mb-1">Total Pendapatan</span>
            <span class="text-2xl font-bold text-green-600">
                Rp {{ number_format($total * 1000000, 0, ',', '.') }}
            </span>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('profitPieChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    data: {!! json_encode($percents) !!},
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
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const percent = context.parsed;
                                const amount = {!! json_encode($values) !!}[context.dataIndex];
                                return `${label}: ${percent}% (Rp ${(amount * 1000000).toLocaleString('id-ID')})`;
                            }
                        },
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
