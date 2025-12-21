{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\user\aboutsection\mission.blade.php --}}
<div class="max-w-5xl mx-auto my-16 px-4">
    <div
        class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center overflow-hidden"
        data-aos="fade-up"
        data-aos-delay="300"
        data-aos-duration="1000"
    >
        <!-- Misi di Kiri -->
        <div class="flex flex-col justify-center p-8" data-aos="fade-left" data-aos-delay="500">
            <h2 class="text-3xl font-bold text-yellow-400 mb-4 drop-shadow">Misi</h2>
            <ul class="list-disc pl-6 text-lg text-white leading-relaxed drop-shadow space-y-2">
                <li>Menyediakan layanan rental motor yang cepat dan mudah diakses oleh mahasiswa Unand.</li>
                <li>Menyediakan armada motor yang terawat dan layak pakai, sehingga mahasiswa dapat beraktivitas dengan aman dan nyaman.</li>
                <li>Menerapkan proses penyewaan yang transparan melalui sistem deposit dan kontrak digital.</li>
                <li>Mendukung mobilitas mahasiswa dalam aktivitas akademik maupun non-akademik.</li>
            </ul>
        </div>
        <!-- Foto Misi di Kanan -->
        <div class="flex items-center justify-center h-full p-8 " data-aos="fade-right" data-aos-delay="400">
            <img src="{{ asset('img/mission.webp') }}" alt="Misi Andalas Wheels" class="w-full h-72 object-cover rounded-xl shadow-md hover:scale-105 transition-transform duration-300 cursor-pointer">
        </div>
    </div>
</div>
