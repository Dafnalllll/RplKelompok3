{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\user\product\search.blade.php --}}
<form action="#" class="max-w-2xl mx-auto mt-16" data-aos="fade-down" data-aos-delay="200" data-aos-duration="700">
    <div class="flex items-center bg-blue-50 rounded-full px-6 py-3 focus-within:ring-2 focus-within:ring-yellow-400 transition-all duration-200 relative">
        <input
            id="live-search"
            type="text"
            class="flex-1 bg-transparent px-3 py-2 text-gray-700 text-base focus:outline-none focus:ring-0 border-0"
            placeholder="🔍 Cari motor..."
            autocomplete="on"
            spellcheck="false"
        />
        <button type="button" id="reset-search"
            class="absolute right-4 text-gray-400 hover:text-red-500 transition hidden"
            style="outline:none;"
            tabindex="-1"
            aria-label="Reset">
            <i class="fa fa-times-circle text-xl"></i>
        </button>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('live-search');
    const resetBtn = document.getElementById('reset-search');
    function filterSearch() {
        const keyword = searchInput.value.toLowerCase();
        let found = false;
        document.querySelectorAll('.product-item').forEach(function(item) {
            const name = item.dataset.name || '';
            const desc = item.dataset.desc || '';
            if (name.includes(keyword) || desc.includes(keyword)) {
                item.style.display = '';
                found = true;
            } else {
                item.style.display = 'none';
            }
        });
        // Tampilkan tombol reset jika ada input
        resetBtn.classList.toggle('hidden', !searchInput.value);
        // Tampilkan/hilangkan pesan tidak ditemukan jika ada
        const notFound = document.getElementById('not-found-msg');
        if (notFound) notFound.style.display = found ? 'none' : '';
    }
    searchInput.addEventListener('input', filterSearch);
    resetBtn.addEventListener('click', function() {
        searchInput.value = '';
        filterSearch();
        searchInput.focus();
    });
    // Inisialisasi awal
    filterSearch();
});
</script>


