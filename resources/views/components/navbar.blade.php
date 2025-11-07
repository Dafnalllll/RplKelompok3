<!-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\navbar.blade.php -->
<nav class="w-full bg-gray-900 flex items-center justify-between px-4 sm:px-12 py-4 shadow relative z-50">
    <!-- Logo & Brand -->
    <div class="flex items-center gap-4">
        <img src="{{ asset('img/andalaswheels.png') }}" alt="Logo" class="w-10 h-10 sm:w-14 sm:h-14 border-[#21408E]" />
        <span class="text-lg sm:text-2xl font-bold text-[#21408E] font-[Montserrat]">Andalas Wheels</span>
    </div>
    <!-- Hamburger (mobile) -->
    <button class="sm:hidden block text-white focus:outline-none z-50" id="nav-toggle">
        <i id="nav-icon" class="fas fa-bars text-2xl"></i>
    </button>
    <!-- Menu -->
    <div id="nav-menu" class="fixed top-0 left-0 w-full h-full bg-gray-900/80 backdrop-blur-md flex flex-col items-center justify-center gap-6 text-white transition-all duration-300 ease-in-out scale-0 opacity-0 sm:static sm:scale-100 sm:opacity-100 sm:flex-row sm:bg-transparent sm:backdrop-blur-0 sm:h-auto sm:w-auto sm:justify-end sm:items-center sm:gap-12 z-40 rounded-b-3xl sm:rounded-none">
        <a href="{{ url('/dashboard') }}" class="group text-2xl sm:text-xl font-semibold relative nav-link {{ Request::is('dashboard') ? 'active' : '' }} hover:text-yellow-400 transition" data-menu="home">
            Home
            <span class="hidden sm:block absolute left-0 -bottom-1 h-1 bg-yellow-400 rounded-full transition-all duration-300
                {{ Request::is('dashboard') ? 'w-full' : 'w-0 group-hover:w-full' }}">
            </span>
        </a>
        <a href="{{ url('/about') }}" class="group text-2xl sm:text-xl font-semibold relative nav-link {{ Request::is('about') ? 'active' : '' }} hover:text-yellow-400 transition" data-menu="about">
            About Us
            <span class="hidden sm:block absolute left-0 -bottom-1 h-1 bg-yellow-400 rounded-full transition-all duration-300
                {{ Request::is('about') ? 'w-full' : 'w-0 group-hover:w-full' }}">
            </span>
        </a>
        <a href="{{ url('/faq') }}" class="group text-2xl sm:text-xl font-semibold relative nav-link {{ Request::is('faq') ? 'active' : '' }} hover:text-yellow-400 transition" data-menu="faq">
            FAQ
            <span class="hidden sm:block absolute left-0 -bottom-1 h-1 bg-yellow-400 rounded-full transition-all duration-300
                {{ Request::is('faq') ? 'w-full' : 'w-0 group-hover:w-full' }}">
            </span>
        </a>
        <a href="{{ url('/contact') }}" class="group text-2xl sm:text-xl font-semibold relative nav-link {{ Request::is('contact') ? 'active' : '' }} hover:text-yellow-400 transition" data-menu="contact">
            Contact Us
            <span class="hidden sm:block absolute left-0 -bottom-1 h-1 bg-yellow-400 rounded-full transition-all duration-300
                {{ Request::is('contact') ? 'w-full' : 'w-0 group-hover:w-full' }}">
            </span>
        </a>
        <a href="{{ url('/howtopayment') }}" class="group text-2xl sm:text-xl font-semibold relative nav-link {{ Request::is('howtopayment') ? 'active' : '' }} hover:text-yellow-400 transition" data-menu="payment">
            Payment
            <span class="hidden sm:block absolute left-0 -bottom-1 h-1 bg-yellow-400 rounded-full transition-all duration-300
                {{ Request::is('howtopayment') ? 'w-full' : 'w-0 group-hover:w-full' }}">
            </span>
        </a>
        <!-- Login / Logout (mobile) -->
        <div class="flex flex-col items-center gap-3 mt-6 sm:hidden">
            <div class="bg-[#21408E] rounded p-2 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <circle cx="12" cy="8" r="4" stroke="white" stroke-width="2" fill="white"/>
                    <path d="M4 20c0-4 8-4 8-4s8 0 8 4" stroke="white" stroke-width="2" fill="none"/>
                </svg>
            </div>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-xl font-medium text-black bg-yellow-400 px-4 py-2 rounded hover:bg-yellow-500 transition">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-xl font-medium text-black bg-yellow-400 px-4 py-2 rounded hover:bg-yellow-500 transition">Log In</a>
            @endauth
        </div>
    </div>
    <!-- Login / Logout (desktop) -->
    <div class="hidden sm:flex items-center gap-2">
        <div class="bg-[#21408E] rounded p-2 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <circle cx="12" cy="8" r="4" stroke="white" stroke-width="2" fill="white"/>
                <path d="M4 20c0-4 8-4 8-4s8 0 8 4" stroke="white" stroke-width="2" fill="none"/>
            </svg>
        </div>
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-xl font-medium text-black hover:text-[#21408E] transition">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-xl font-medium text-black">Log In</a>
        @endauth
    </div>
</nav>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.getElementById('nav-toggle');
    const navMenu = document.getElementById('nav-menu');
    const navIcon = document.getElementById('nav-icon');

    navToggle.addEventListener('click', function() {
        if (navMenu.classList.contains('scale-0')) {
            navMenu.classList.remove('scale-0', 'opacity-0');
            navMenu.classList.add('scale-100', 'opacity-100');
            navIcon.classList.remove('fa-bars');
            navIcon.classList.add('fa-times');
            document.body.style.overflow = 'hidden'; // Prevent scroll
        } else {
            navMenu.classList.add('scale-0', 'opacity-0');
            navMenu.classList.remove('scale-100', 'opacity-100');
            navIcon.classList.add('fa-bars');
            navIcon.classList.remove('fa-times');
            document.body.style.overflow = '';
        }
    });

    // Close menu on link click (mobile)
    document.querySelectorAll('#nav-menu a').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth < 640) {
                navMenu.classList.add('scale-0', 'opacity-0');
                navMenu.classList.remove('scale-100', 'opacity-100');
                navIcon.classList.add('fa-bars');
                navIcon.classList.remove('fa-times');
                document.body.style.overflow = '';
            }
        });
    });
});
</script>
