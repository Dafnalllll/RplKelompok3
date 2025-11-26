{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\dropdown\dropdownnavbarmenu.blade.php --}}
<div class="absolute right-0 mt-2 w-64 bg-white rounded-2xl shadow-2xl py-2 z-50 border border-blue-100 animate-fade-in">
    <div class="px-5 py-4 border-b border-blue-50 flex items-center gap-4">
        <div class="bg-blue-100 rounded-full p-3 flex items-center justify-center shadow">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <circle cx="12" cy="8" r="4" stroke="#21408E" stroke-width="2" fill="#e0e7ff"/>
                <path d="M4 20c0-4 8-4 8-4s8 0 8 4" stroke="#21408E" stroke-width="2" fill="none"/>
            </svg>
        </div>
        <div>
            <div class="font-bold text-blue-900 text-base capitalize">{{ Auth::user()->name }}</div>
            <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
        </div>
    </div>
    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-5 py-3 text-blue-900 hover:bg-blue-50 transition font-medium text-base">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="#21408E"/>
        </svg>
        <span>Profil</span>
    </a>
    <div class="border-t border-blue-50 my-1"></div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="flex items-center gap-3 w-full text-left px-5 py-3 text-red-600 hover:bg-red-50 transition font-medium text-base">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M16 17l-1.41-1.41L17.17 13H7v-2h10.17l-2.58-2.59L16 7l5 5-5 5z" fill="#e3342f"/>
                <path d="M19 12H5" stroke="#e3342f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Logout</span>
        </button>
    </form>
</div>

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(-10px);}
    to { opacity: 1; transform: translateY(0);}
}
.animate-fade-in {
    animation: fade-in 0.25s;
}
</style>
