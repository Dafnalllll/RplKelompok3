{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\notif\notifaccount.blade.php --}}
@if(Auth::user() && Auth::user()->status === 'Nonaktif')
    <div x-data="{ open: false }" class="fixed z-50 flex justify-end w-full" style="top:100px; right:0;">
        <!-- Trigger: ikon warning setengah lingkaran -->
        <button @click="open = !open"
            data-nonaktif-notif-btn
            class="bg-red-600/90 text-white w-20 h-20 flex items-center justify-center rounded-l-full rounded-r-none shadow-lg border border-red-700 focus:outline-none transition hover:bg-red-700"
            style="pointer-events:auto; border-right: none;">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="white" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="12" fill="#dc2626"/>
                <path d="M12 7v4m0 4h.01" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <polygon points="12,16 12,17 12,17" fill="#fff"/>
                <polygon points="12,7 12,11 12,11" fill="#fff"/>
                <polygon points="12,13 12,13 12,13" fill="#fff"/>
                <polygon points="12,15 12,15 12,15" fill="#fff"/>
                <polygon points="12,17 12,17 12,17" fill="#fff"/>
                <polygon points="12,19 12,19 12,19" fill="#fff"/>
                <polygon points="12,21 12,21 12,21" fill="#fff"/>
                <polygon points="12,23 12,23 12,23" fill="#fff"/>
                <polygon points="12,25 12,25 12,25" fill="#fff"/>
                <polygon points="12,27 12,27 12,27" fill="#fff"/>
                <polygon points="12,29 12,29 12,29" fill="#fff"/>
                <polygon points="12,31 12,31 12,31" fill="#fff"/>
                <polygon points="12,33 12,33 12,33" fill="#fff"/>
                <polygon points="12,35 12,35 12,35" fill="#fff"/>
                <polygon points="12,37 12,37 12,37" fill="#fff"/>
                <polygon points="12,39 12,39 12,39" fill="#fff"/>
                <polygon points="12,41 12,41 12,41" fill="#fff"/>
                <polygon points="12,43 12,43 12,43" fill="#fff"/>
                <polygon points="12,45 12,45 12,45" fill="#fff"/>
                <polygon points="12,47 12,47 12,47" fill="#fff"/>
                <polygon points="12,49 12,49 12,49" fill="#fff"/>
                <polygon points="12,51 12,51 12,51" fill="#fff"/>
                <polygon points="12,53 12,53 12,53" fill="#fff"/>
                <polygon points="12,55 12,55 12,55" fill="#fff"/>
                <polygon points="12,57 12,57 12,57" fill="#fff"/>
                <polygon points="12,59 12,59 12,59" fill="#fff"/>
                <polygon points="12,61 12,61 12,61" fill="#fff"/>
                <polygon points="12,63 12,63 12,63" fill="#fff"/>
                <polygon points="12,65 12,65 12,65" fill="#fff"/>
                <polygon points="12,67 12,67 12,67" fill="#fff"/>
                <polygon points="12,69 12,69 12,69" fill="#fff"/>
                <polygon points="12,71 12,71 12,71" fill="#fff"/>
                <polygon points="12,73 12,73 12,73" fill="#fff"/>
                <polygon points="12,75 12,75 12,75" fill="#fff"/>
                <polygon points="12,77 12,77 12,77" fill="#fff"/>
                <polygon points="12,79 12,79 12,79" fill="#fff"/>
                <polygon points="12,81 12,81 12,81" fill="#fff"/>
                <polygon points="12,83 12,83 12,83" fill="#fff"/>
                <polygon points="12,85 12,85 12,85" fill="#fff"/>
                <polygon points="12,87 12,87 12,87" fill="#fff"/>
                <polygon points="12,89 12,89 12,89" fill="#fff"/>
                <polygon points="12,91 12,91 12,91" fill="#fff"/>
                <polygon points="12,93 12,93 12,93" fill="#fff"/>
                <polygon points="12,95 12,95 12,95" fill="#fff"/>
                <polygon points="12,97 12,97 12,97" fill="#fff"/>
                <polygon points="12,99 12,99 12,99" fill="#fff"/>
            </svg>
        </button>
        <!-- Dropdown Content: animasi slide-in dari kanan, rounded setengah kiri -->
        <div x-show="open"
             x-transition:enter="transition transform ease-out duration-400"
             x-transition:enter-start="translate-x-full opacity-0"
             x-transition:enter-end="translate-x-0 opacity-100"
             x-transition:leave="transition transform ease-in duration-300"
             x-transition:leave-start="translate-x-0 opacity-100"
             x-transition:leave-end="translate-x-full opacity-0"
             class="absolute right-0 mt-2 bg-red-600/95 text-white px-8 py-4 rounded-l-full rounded-r-none shadow-lg flex items-center gap-3 text-lg font-semibold border border-red-700"
             style="pointer-events:auto;">
            <i class="fas fa-exclamation-triangle text-2xl"></i>
            <span>
                Akun Anda <b>belum aktif, isi terlebih dahulu data anda</b>.
            </span>
        </div>
    </div>
@endif
