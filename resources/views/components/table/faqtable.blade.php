{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\table\faqtable.blade.php --}}
@php
    $faqs = [
        [
            'question' => 'Bagaimana cara rental motor di Andalas Wheels?',
            'answer' => 'Pilih motor yang tersedia, isi data diri, lakukan pembayaran, dan motor akan diantar ke lokasi Anda.'
        ],
        [
            'question' => 'Apa saja syarat untuk rental motor?',
            'answer' => 'Anda hanya perlu KTP dan KTM aktif sebagai bukti mahasiswa.'
        ],
        [
            'question' => 'Apakah bisa sewa harian, mingguan, atau bulanan?',
            'answer' => 'Bisa! Kami menyediakan paket sewa harian, mingguan, dan bulanan sesuai kebutuhan Anda.'
        ],
        [
            'question' => 'Bagaimana jika terjadi kerusakan pada motor?',
            'answer' => 'Segera hubungi tim kami. Kerusakan akibat pemakaian normal akan kami tangani tanpa biaya tambahan.'
        ],
        [
            'question' => 'Apakah pembayaran bisa dilakukan secara online?',
            'answer' => 'Ya, pembayaran dapat dilakukan melalui transfer bank atau e-wallet.'
        ],
    ];
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-8 justify-center">
    @foreach($faqs as $faq)
    <table class="w-[600px] bg-white rounded-xl shadow-md overflow-hidden hover:scale-105 transition-all duration-300 cursor-pointer mx-auto">
        <thead class="bg-blue-50">
            <tr>
                <th class="py-3 px-4 text-left text-blue-900 font-bold text-base">
                    {{ $faq['question'] }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-4 px-6 text-gray-700 text-sm">
                    {{ $faq['answer'] }}
                </td>
            </tr>
        </tbody>
    </table>
    @endforeach
</div>
