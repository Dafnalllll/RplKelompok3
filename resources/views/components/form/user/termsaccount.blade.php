{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\form\user\termsaccount.blade.php --}}
<div x-data="{ open: false }" id="terms-modal" @open-terms.window="open = true">
    <!-- Modal -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 rounded-tl-[200px] rounded-bl-[200px]"
        style="display: none;"
    >
        <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6 relative">
            <button
                @click="open = false"
                class="absolute top-3 right-3 text-gray-400 hover:text-red-500 text-xl focus:outline-none"
                type="button"
                aria-label="Tutup"
            >
                <i class="fa fa-times-circle"></i>
            </button>
            <h2 class="text-xl font-bold text-blue-700 mb-3 flex items-center gap-2">
                <i class="fa fa-file-contract"></i>
                Syarat & Ketentuan Akun
            </h2>
            <form>
                <div class="space-y-4 text-gray-700 text-sm max-h-[400px] overflow-y-auto pr-2">
                    <div>
                        <span class="font-semibold text-blue-700">A. Keabsahan Data</span>
                        <ul class="list-disc pl-5 mt-1">
                            <li>Pengguna wajib mengisi data diri dengan benar dan dapat dipertanggungjawabkan.</li>
                            <li>Data seperti nama, NIM, nomor HP, dan email harus sesuai identitas asli mahasiswa Universitas Andalas.</li>
                            <li>Andalas Wheels berhak melakukan verifikasi melalui email kampus atau metode lain.</li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-blue-700">B. Penggunaan Akun</span>
                        <ul class="list-disc pl-5 mt-1">
                            <li>Akun hanya boleh digunakan oleh pemilik akun yang sah.</li>
                            <li>Dilarang meminjamkan, membagi, atau memperjualbelikan akun kepada pihak lain.</li>
                            <li>Segala aktivitas yang terjadi dalam akun menjadi tanggung jawab penuh pengguna.</li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-blue-700">C. Keamanan Akun</span>
                        <ul class="list-disc pl-5 mt-1">
                            <li>Pengguna bertanggung jawab atas kerahasiaan password.</li>
                            <li>Andalas Wheels tidak meminta password secara langsung.</li>
                            <li>Kerugian akibat kelalaian pengguna dalam menjaga akun bukan tanggung jawab platform.</li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-blue-700">D. Larangan</span>
                        <ul class="list-disc pl-5 mt-1">
                            <li>Menggunakan identitas palsu.</li>
                            <li>Membuat lebih dari satu akun tanpa alasan yang valid.</li>
                            <li>Menyalahgunakan fitur untuk spam, eksploitasi, atau tindakan di luar ketentuan kampus.</li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-blue-700">E. Pembatasan dan Penonaktifan Akun</span>
                        <ul class="list-disc pl-5 mt-1">
                            <li>Andalas Wheels berhak menangguhkan, membatasi, atau menghapus akun yang:
                                <ul class="list-disc pl-5 mt-1">
                                    <li>berisi data palsu,</li>
                                    <li>terlibat penyalahgunaan,</li>
                                    <li>menyebabkan kerugian bagi platform atau pengguna lain.</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-blue-700">F. Persetujuan Komunikasi</span>
                        <ul class="list-disc pl-5 mt-1">
                            <li>Pengguna menyetujui bahwa sistem dapat mengirim notifikasi terkait verifikasi akun, pembaruan fitur, dan operasional layanan.</li>
                        </ul>
                    </div>
                    <div>
                        <span class="font-semibold text-blue-700">G. Perubahan Ketentuan</span>
                        <ul class="list-disc pl-5 mt-1">
                            <li>Andalas Wheels berhak memperbarui S&K registrasi kapan saja, dan perubahan akan diinformasikan melalui platform.</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button
                        type="button"
                        class="mt-4 px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800"
                        @click="$dispatch('agreed-terms'); open = false"
                    >
                        Saya Mengerti
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
