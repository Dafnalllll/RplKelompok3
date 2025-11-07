<nav class="fixed inset-0 z-50 flex flex-col bg-gradient-to-b from-gray-900 via-[#1e2a4a] to-[#21408E] text-white px-8 py-8">
    <!-- Header & Close Button -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-3">
            <img src="{{ asset('img/andalaswheels.png') }}" alt="Logo" class="w-10 h-10" />
            <span class="text-xl font-bold text-[#21408E] font-[Montserrat]">Andalas Wheels</span>
        </div>
        <button id="mobile-navbar-close" class="text-3xl text-white focus:outline-none">&times;</button>
    </div>
    <!-- Menu Links -->
    <div class="flex flex-col gap-6 items-start mt-4">
        <a href="{{ url('/dashboard') }}" class="text-lg font-semibold flex items-center gap-3 hover:text-[#21408E] transition">
            <i class="fas fa-home"></i> Home
        </a>
        <a href="{{ url('/about') }}" class="text-lg font-semibold flex items-center gap-3 hover:text-[#21408E] transition">
            <i class="fas fa-users"></i> About Us
        </a>
        <a href="{{ url('/faq') }}" class="text-lg font-semibold flex items-center gap-3 hover:text-[#21408E] transition">
            <i class="fas fa-question-circle"></i> FAQ
        </a>
        <a href="{{ url('/contact') }}" class="text-lg font-semibold flex items-center gap-3 hover:text-[#21408E] transition">
            <i class="fas fa-envelope"></i> Contact Us
        </a>
        <a href="{{ url('/howtopayment') }}" class="text-lg font-semibold flex items-center gap-3 hover:text-[#21408E] transition">
            <i class="fas fa-credit-card"></i> Payment
        </a>
    </div>
    <!-- Login / Logout -->
    <div class="mt-auto flex flex-col items-center gap-3 pt-8">
        <div class="bg-[#21408E] rounded-full p-4 flex items-center justify-center mb-2 shadow-lg">
            <!-- User Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <circle cx="12" cy="8" r="4" stroke="white" stroke-width="2" fill="white"/>
                <path d="M4 20c0-4 8-4 8-4s8 0 8 4" stroke="white" stroke-width="2" fill="none"/>
            </svg>
        </div>
        @auth
            <form method="POST" action="{{ route('logout') }}" class="w-full flex justify-center">
                @csrf
                <button type="submit" class="text-lg font-semibold text-white bg-[#21408E] px-6 py-2 rounded-xl shadow hover:bg-[#1e2a4a] transition-all duration-200">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-lg font-semibold text-white bg-[#21408E] px-6 py-2 rounded-xl shadow hover:bg-[#1e2a4a] transition-all duration-200">Log In</a>
        @endauth
    </div>
</nav>

<!-- Font Awesome CDN for icons (optional, remove if sudah ada di layout) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const closeBtn = document.getElementById('mobile-navbar-close');
    if(closeBtn){
        closeBtn.addEventListener('click', function() {
            // Sembunyikan navbarmobile, sesuaikan dengan cara pemanggilan komponen di layout utama
            document.querySelector('nav.fixed.inset-0.z-50').classList.add('hidden');
        });
    }
});
</script>
