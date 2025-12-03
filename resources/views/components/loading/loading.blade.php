{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\loading\loading.blade.php --}}

<div class="loading-overlay fixed inset-0 z-50 flex items-center justify-center bg-white/70 backdrop-blur-sm" style="display:none;">
    <div class="flex flex-col items-center">
        <svg class="animate-spin h-14 w-14 text-blue-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
        </svg>
        <span class="text-lg font-semibold text-blue-700">Loading...</span>
    </div>
</div>
