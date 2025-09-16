<!-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\navbar.blade.php -->
<nav class="w-full bg-white flex items-center justify-between px-12 py-4 shadow">
    <!-- Logo & Brand -->
    <div class="flex items-center gap-4">
        <img src="{{ asset('img/scooter-logo.png') }}" alt="Logo" class="w-14 h-14 rounded-full border-2 border-[#21408E]" />
        <span class="text-2xl font-bold text-[#21408E] font-[Montserrat]">Andalaswheels</span>
    </div>
    <!-- Menu -->
    <div class="flex items-center gap-12">
        <a href="{{ url('/') }}" class="text-xl font-medium text-black relative group">
            Home
            <span class="block h-1 w-8 bg-[#21408E] absolute left-1/2 -translate-x-1/2 bottom-[-8px] group-hover:w-10 transition-all duration-300"></span>
        </a>
        <a href="{{ url('/services') }}" class="text-xl font-medium text-black">Services</a>
        <a href="{{ url('/blog') }}" class="text-xl font-medium text-black">Blog</a>
        <a href="{{ url('/contact') }}" class="text-xl font-medium text-black">Contact Us</a>
    </div>
    <!-- Login / Logout -->
    <div class="flex items-center gap-2">
        <div class="bg-[#21408E] rounded p-2 flex items-center">
            <!-- User Icon -->
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