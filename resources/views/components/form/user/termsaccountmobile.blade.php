<div x-data="{ open: false }" id="modal-terms-mobile" @open-terms-mobile.window="open = true"
    x-show="open"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 md:hidden"
>
    <div class="bg-white w-[90vw] h-[75vh] max-w-xs m-0 rounded-xl shadow-2xl p-2 relative flex flex-col overflow-y-auto">
        <button
            type="button"
            class="absolute top-2 right-2 text-gray-400 hover:text-red-500 text-lg focus:outline-none"
            @click="open = false"
            aria-label="Tutup"
        >
            <i class="fa fa-times-circle"></i>
        </button>

        <h2 class="text-base font-bold text-blue-700 mb-2 flex items-center gap-2">
            <i class="fa fa-file-contract"></i>
            Syarat & Ketentuan Akun
        </h2>

        <div class="space-y-2 text-gray-700 text-[11px] overflow-y-auto flex-1 pr-1">
            <div>
                <span class="font-semibold text-blue-700">A. Keabsahan Data</span>
                <ul class="list-disc pl-4 mt-1">
                    <li>Pengguna wajib mengisi data diri dengan benar dan dapat dipertanggungjawabkan.</li>
                    <li>Data seperti nama, NIM, nomor HP, dan email harus sesuai identitas asli mahasiswa Universitas Andalas.</li>
                    <li>Andalas Wheels berhak melakukan verifikasi melalui email kampus atau metode lain.</li>
                </ul>
            </div>
            <div>
                <span class="font-semibold text-blue-700">B. Penggunaan Akun</span>
                <ul class="list-disc pl-4 mt-1">
                    <li>Akun hanya boleh digunakan oleh pemilik akun yang sah.</li>
                    <li>Dilarang meminjamkan, membagi, atau memperjualbelikan akun kepada pihak lain.</li>
                    <li>Segala aktivitas yang terjadi dalam akun menjadi tanggung jawab penuh pengguna.</li>
                </ul>
            </div>
            <div>
                <span class="font-semibold text-blue-700">C. Keamanan Akun</span>
                <ul class="list-disc pl-4 mt-1">
                    <li>Pengguna bertanggung jawab atas kerahasiaan password.</li>
                    <li>Andalas Wheels tidak meminta password secara langsung.</li>
                    <li>Kerugian akibat kelalaian pengguna dalam menjaga akun bukan tanggung jawab platform.</li>
                </ul>
            </div>
            <div>
                <span class="font-semibold text-blue-700">D. Larangan</span>
                <ul class="list-disc pl-4 mt-1">
                    <li>Menggunakan identitas palsu.</li>
                    <li>Membuat lebih dari satu akun tanpa alasan yang valid.</li>
                    <li>Menyalahgunakan fitur untuk spam, eksploitasi, atau tindakan di luar ketentuan kampus.</li>
                </ul>
            </div>
            <div>
                <span class="font-semibold text-blue-700">E. Pembatasan dan Penonaktifan Akun</span>
                <ul class="list-disc pl-4 mt-1">
                    <li>Andalas Wheels berhak menangguhkan, membatasi, atau menghapus akun yang:
                        <ul class="list-disc pl-4 mt-1">
                            <li>berisi data palsu,</li>
                            <li>terlibat penyalahgunaan,</li>
                            <li>menyebabkan kerugian bagi platform atau pengguna lain.</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div>
                <span class="font-semibold text-blue-700">F. Persetujuan Komunikasi</span>
                <ul class="list-disc pl-4 mt-1">
                    <li>Pengguna menyetujui bahwa sistem dapat mengirim notifikasi terkait verifikasi akun, pembaruan fitur, dan operasional layanan.</li>
                </ul>
            </div>
            <div>
                <span class="font-semibold text-blue-700">G. Perubahan Ketentuan</span>
                <ul class="list-disc pl-4 mt-1">
                    <li>Andalas Wheels berhak memperbarui S&K registrasi kapan saja, dan perubahan akan diinformasikan melalui platform.</li>
                </ul>
            </div>
        </div>

        <div class="mt-3 flex justify-end">
            <button
                id="ok-terms-mobile"
                type="button"
                class="bg-blue-700 text-white px-2 py-1 rounded font-semibold shadow hover:bg-blue-800 transition flex items-center gap-1 text-xs"
                @click="$dispatch('agreed-terms-mobile'); open = false"
            >
                <i class="fa fa-check-circle"></i>
                Saya Mengerti
            </button>
        </div>
    </div>
</div>
