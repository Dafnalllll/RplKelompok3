@php
    $steps = [
        [
            'img' => [
                'img/payment/motorcycle.webp',
                'img/payment/personaldata.webp'
            ],
            'title' => 'Pilih Motor & Isi Data',
            'desc' => 'Pilih motor yang ingin kamu sewa, lalu lengkapi data diri dan tanggal peminjaman pada form pemesanan.',
            'delay' => 100
        ],
        [
            'img' => 'img/payment/checkpayment.webp',
            'title' => 'Cek Total Pembayaran',
            'desc' => 'Pastikan detail pesanan dan total biaya sudah benar sebelum melanjutkan ke pembayaran.',
            'delay' => 200
        ],
        [
            'img' => 'img/payment/moneytransfer.webp',
            'title' => 'Transfer ke Rekening',
            'desc' => 'Lakukan pembayaran ke rekening berikut:<br><span class="inline-block bg-yellow-100 text-[#21408E] font-bold px-3 py-1 rounded-lg mt-2 mb-1">BNI 1234567890 a.n. Andalas Wheels</span>',
            'delay' => 300
        ],
        [
            'img' => 'img/payment/uploadpayment.webp',
            'title' => 'Upload Bukti Pembayaran',
            'desc' => 'Setelah transfer, upload bukti pembayaran pada halaman konfirmasi atau kirim ke WhatsApp admin.',
            'delay' => 400
        ],
        [
            'img' => 'img/payment/verificationpayment.webp',
            'title' => 'Verifikasi & Selesai',
            'desc' => 'Tim kami akan memverifikasi pembayaranmu. Jika sudah valid, motor siap diambil sesuai jadwal!',
            'delay' => 500
        ],
    ];
@endphp
<section id="tutorial-section">
    <div class="max-w-5xl mx-auto bg-transparent p-4 sm:p-8 mt-10 mb-16"
         data-aos="fade-up"
         data-aos-duration="1200"
         data-aos-delay="200">
        <h2 class="text-2xl sm:text-3xl font-bold text-[#21408E] mb-8 sm:mb-10 flex items-center gap-2 justify-center">
            <i class="fa-solid fa-money-check-dollar text-yellow-400 text-xl sm:text-2xl"></i>
            Langkah-langkah Pembayaran
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
            @foreach($steps as $step)
            <div data-aos="fade-up" data-aos-delay="{{ $step['delay'] }}" class="flex">
                <div class="bg-yellow-50 rounded-xl shadow p-4 sm:p-6 flex flex-col items-center text-center w-full h-full transition-transform duration-500 hover:scale-100 sm:hover:scale-110 cursor-pointer">
                    @if(is_array($step['img']))
                        <div class="flex gap-2 mb-4">
                            @foreach($step['img'] as $img)
                                <img src="{{ asset($img) }}" alt="{{ $step['title'] }}" class="w-10 h-10 sm:w-14 sm:h-14 object-contain">
                            @endforeach
                        </div>
                    @else
                        <img src="{{ asset($step['img']) }}" alt="{{ $step['title'] }}" class="w-10 h-10 sm:w-14 sm:h-14 object-contain mb-4">
                    @endif
                    <h3 class="font-bold text-[#21408E] text-base sm:text-lg mb-2">{{ $step['title'] }}</h3>
                    <p class="text-gray-700 text-sm sm:text-base">{!! $step['desc'] !!}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-10 sm:mt-12 flex items-center gap-3 text-[#21408E] justify-center">
            <i class="fa-brands fa-whatsapp text-green-500 text-xl sm:text-2xl"></i>
            <span class="font-semibold text-sm sm:text-base">Butuh bantuan? Hubungi admin di <a href="https://wa.me/6281234567890" target="_blank" class="underline hover:text-yellow-500">0812-3456-7890</a></span>
        </div>
    </div>
</section>
