{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\form\user\termsrent.blade.php --}}
<div x-data="{ open: false }">
    <!-- Trigger Button -->
    <button
        @click="open = true"
        class="bg-yellow-500 text-white px-6 py-2 rounded-lg font-semibold shadow hover:bg-yellow-600 transition flex items-center gap-2"
        type="button"
    >
        <i class="fa fa-file-contract"></i>
        Lihat S&K Penyewaan
    </button>

    <!-- Modal -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
        style="display: none;"
    >
        <div class="bg-white rounded-2xl shadow-2xl max-w-xl w-full p-8 relative animate-bounce-in">
            <button
                @click="open = false"
                class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-xl focus:outline-none"
                type="button"
                aria-label="Tutup"
            >
                <i class="fa fa-times-circle"></i>
            </button>
            <h2 class="text-2xl font-bold text-yellow-600 mb-4 flex items-center gap-2">
                <i class="fa fa-file-contract"></i>
                Syarat & Ketentuan Penyewaan
            </h2>
            <form>
                <div class="space-y-5 text-gray-700 text-base">
                    <div>
                        <span class="font-semibold text-yellow-600">A. Persyaratan Penyewa</span>
                        <ul class="list-disc pl-6 mt-1">
                            <li>Penyewa harus mahasiswa aktif Universitas Andalas.</li>
                            <li>Penyewa wajib memiliki SIM C yang masih berlaku.</li>
                            <li>Penyewa wajib memberikan data kontak yang dapat dihubungi selama masa sewa.</li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-yellow-600">B. Ketentuan Penggunaan Motor</span>
                        <ul class="list-disc pl-6 mt-1">
                            <li>Motor digunakan hanya untuk keperluan pribadi dan non-komersial.</li>
                            <li>Dilarang membawa motor keluar area kota Padang tanpa izin.</li>
                            <li>Penyewa wajib menjaga kondisi motor selama masa sewa.</li>
                            <li>Semua pelanggaran lalu lintas menjadi tanggung jawab penyewa.</li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-yellow-600">C. Biaya, Pembayaran, dan Keterlambatan</span>
                        <ul class="list-disc pl-6 mt-1">
                            <li>Penyewa wajib membayar biaya sewa sesuai tarif yang ditetapkan.</li>
                            <li>Keterlambatan pengembalian dikenakan denda per jam atau per hari.</li>
                            <li>Kerugian akibat keterlambatan yang menyebabkan bentrokan jadwal penyewa lain menjadi tanggung jawab penyewa.</li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-yellow-600">D. Kerusakan dan Kehilangan</span>
                        <ul class="list-disc pl-6 mt-1">
                            <li>Jika motor mengalami kerusakan akibat kelalaian penyewa, maka biaya perbaikan sepenuhnya ditanggung penyewa.</li>
                            <li>Jika motor hilang, penyewa wajib bertanggung jawab sesuai peraturan yang berlaku.</li>
                            <li>Kehilangan helm, STNK, atau perlengkapan lain akan dikenakan biaya penggantian.</li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-yellow-600">E. Bahan Bakar dan Kebersihan</span>
                        <ul class="list-disc pl-6 mt-1">
                            <li>Motor harus dikembalikan dengan tingkat bahan bakar minimal setara saat pengambilan.</li>
                            <li>Motor harus dikembalikan dalam kondisi bersih dan layak pakai.</li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-yellow-600">F. Larangan Penggunaan</span>
                        <ul class="list-disc pl-6 mt-1">
                            <li>Menggunakan motor untuk balapan, ugal-ugalan, atau kegiatan berbahaya.</li>
                            <li>Mengizinkan orang lain mengendarai motor tanpa konfirmasi.</li>
                            <li>Modifikasi sementara atau permanen terhadap motor.</li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-yellow-600">G. Keadaan Darurat</span>
                        <ul class="list-disc pl-6 mt-1">
                            <li>Jika motor mengalami kerusakan selama penggunaan, penyewa wajib segera menghubungi pihak Andalas Wheels.</li>
                            <li>Pengguna tidak diperbolehkan melakukan perbaikan sendiri tanpa izin.</li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-yellow-600">H. Penolakan atau Pembatalan Sewa</span>
                        <ul class="list-disc pl-6 mt-1">
                            <li>Andalas Wheels berhak membatalkan penyewaan jika:
                                <ul class="list-disc pl-6 mt-1">
                                    <li>penyewa tidak memenuhi syarat (misal tidak punya SIM C),</li>
                                    <li>pengguna memberikan informasi yang tidak valid,</li>
                                    <li>ditemukan risiko penyalahgunaan.</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-yellow-600">I. Tanggung Jawab</span>
                        <ul class="list-disc pl-6 mt-1">
                            <li>Andalas Wheels tidak bertanggung jawab atas kecelakaan atau kerugian pribadi akibat penggunaan motor.</li>
                            <li>Seluruh risiko berkendara menjadi tanggung jawab penyewa.</li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-yellow-600">J. Perubahan Ketentuan</span>
                        <ul class="list-disc pl-6 mt-1">
                            <li>Ketentuan penyewaan dapat diperbarui kapan saja dan berlaku pada pemesanan berikutnya.</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-8 flex justify-end">
                    <button
                        @click="open = false"
                        type="button"
                        class="bg-yellow-500 text-white px-6 py-2 rounded-lg font-semibold shadow hover:bg-yellow-600 transition flex items-center gap-2"
                    >
                        <i class="fa fa-check-circle"></i>
                        Saya Mengerti
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
