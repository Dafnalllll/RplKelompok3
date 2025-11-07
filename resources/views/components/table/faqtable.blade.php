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

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 justify-center px-2 sm:px-4">
    @foreach($faqs as $i => $faq)
    <div
        data-aos="fade-up"
        data-aos-duration="800"
        data-aos-delay="{{ $i * 100 }}"
        data-aos-once="false"
        class="w-full flex"
    >
        <table
            class="w-full max-w-[600px] bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 cursor-pointer mx-auto hover:scale-100 sm:hover:scale-105"
        >
            <thead class="bg-blue-50">
                <tr>
                    <th class="py-3 px-4 text-left text-blue-900 font-bold text-base">
                        {{ $faq['question'] }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-4 px-4 sm:px-6 text-gray-700 text-sm">
                        {{ $faq['answer'] }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach
</div>
