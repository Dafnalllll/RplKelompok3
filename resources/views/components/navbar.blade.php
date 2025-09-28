<!-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\navbar.blade.php -->
<nav class="w-full bg-transparent flex items-center justify-between px-12 py-4 shadow">
    <!-- Logo & Brand -->
    <div class="flex items-center gap-4">
        <img src="{{ asset('img/andalaswheels.png') }}" alt="Logo" class="w-14 h-14  border-[#21408E]" />
        <span class="text-2xl font-bold text-[#21408E] font-[Montserrat]">Andalas Wheels</span>
    </div>
    <!-- Menu -->
    <div class="flex items-center gap-12 text-white relative">
        <!-- Moving underline -->
        <span id="movingUnderline" class="absolute h-1 bg-[#21408E] bottom-[-8px] transition-all duration-300 ease-out"></span>

        <a href="{{ url('/dashboard') }}" class="text-xl font-medium relative nav-link {{ Request::is('/') ? 'active' : '' }}" data-menu="home">
            Home
        </a>
        <a href="{{ url('/about') }}" class="text-xl font-medium relative nav-link {{ Request::is('about') ? 'active' : '' }}" data-menu="about">
            About Us
        </a>
        <a href="{{ url('/blog') }}" class="text-xl font-medium relative nav-link {{ Request::is('blog') ? 'active' : '' }}" data-menu="blog">
            Blog
        </a>
        <a href="{{ url('/contact') }}" class="text-xl font-medium relative nav-link {{ Request::is('contact') ? 'active' : '' }}" data-menu="contact">
            Contact Us
        </a>
        <a href="{{ url('/ourteam') }}" class="text-xl font-medium relative nav-link {{ Request::is('ourteam') ? 'active' : '' }}" data-menu="ourteam">
            Our Team
        </a>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    const movingUnderline = document.getElementById('movingUnderline');

    function updateUnderline(activeLink) {
        const linkRect = activeLink.getBoundingClientRect();
        const navRect = activeLink.closest('.flex').getBoundingClientRect();

        const leftPosition = linkRect.left - navRect.left;
        const width = linkRect.width;

        movingUnderline.style.left = leftPosition + 'px';
        movingUnderline.style.width = width + 'px';
    }

    // Set initial position
    const activeLink = document.querySelector('.nav-link.active');
    if (activeLink) {
        updateUnderline(activeLink);
    }

    // Add click listeners
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Remove active class from all links
            navLinks.forEach(l => l.classList.remove('active'));
            // Add active class to clicked link
            this.classList.add('active');
            // Update underline position
            updateUnderline(this);
        });

        // Hover effect
        link.addEventListener('mouseenter', function() {
            updateUnderline(this);
        });
    });

    // Return to active link when mouse leaves nav
    document.querySelector('.flex.items-center.gap-12').addEventListener('mouseleave', function() {
        const activeLink = document.querySelector('.nav-link.active');
        if (activeLink) {
            updateUnderline(activeLink);
        }
    });
});
</script>
