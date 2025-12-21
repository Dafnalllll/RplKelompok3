{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\admin\analyticssection\graphprofit.blade.php --}}

@php
    use App\Models\Order;
    // Ambil data pendapatan per bulan dari order yang diterima
    $orders = Order::where('status', 'Diterima')
        ->selectRaw('MONTH(tanggal_order) as bulan, SUM(total_harga) as total')
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

    // Buat array label bulan dan nilai pendapatan
    $bulanList = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    $labels = $bulanList;
    $values = array_fill(0, 12, 0);

    foreach ($orders as $order) {
        $idx = $order->bulan - 1;
        $values[$idx] = $order->total / 1000000; // juta rupiah
    }
    $total = array_sum($values);
@endphp

<div class="p-8 w-full max-w-7xl mx-auto transition-all duration-300 hover:shadow-blue-200 ">
    <div class="flex items-center mb-8">
        <div class="bg-blue-100 rounded-full p-4 mr-6 ">
            {{-- Ganti src sesuai ikon profit yang kamu punya --}}
            <img src="{{ asset('img/analytics/profit.webp') }}" alt="Profit Icon" class="w-10 h-10 object-contain" />
        </div>
        <div>
            <h2 class="text-3xl font-bold text-blue-800 tracking-wide">Pendapatan (juta rupiah)</h2>
            <p class="text-gray-500 text-base">Grafik pendapatan per bulan</p>
        </div>
    </div>
    <div class="relative flex justify-center">
        <canvas id="profitLineChart" width="1200" height="400" style="width:100%;max-width:1200px;max-height:400px;"></canvas>
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
        const ctx = document.getElementById('profitLineChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Pendapatan (juta rupiah)',
                    data: {!! json_encode($values) !!},
                    fill: false,
                    borderColor: '#21408E',
                    backgroundColor: '#fbbf24',
                    tension: 0.3,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#21408E',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const value = context.parsed.y;
                                return `Rp ${(value * 1000000).toLocaleString('id-ID')}`;
                            }
                        },
                        backgroundColor: '#21408E',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#fbbf24',
                        borderWidth: 1
                    }
                },
                scales: {
                    y: {
                        title: {
                            display: true,
                            text: 'Pendapatan (juta rupiah)',
                            color: '#21408E',
                            font: { size: 14, weight: 'bold' }
                        },
                        ticks: {
                            color: '#21408E',
                            callback: function(value) {
                                return value + ' jt';
                            }
                        },
                        beginAtZero: true
                    },
                    x: {
                        ticks: {
                            color: '#21408E'
                        }
                    }
                },
            }
        });
    });
</script>
@endpush
