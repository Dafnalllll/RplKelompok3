{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\admin\sidebar.blade.php --}}

<div class="hidden md:flex flex-col w-64 bg-gradient-to-b from-slate-800 to-slate-900 min-h-screen shadow-2xl">
    <!-- Header -->
    <div class="p-6 border-b border-slate-700 flex flex-col items-center">
        <a href="{{ route('dashboard') }}" class="transition-transform duration-300 hover:scale-110 block mb-2">
            <div class="w-24 h-24 flex items-center justify-center transition-all duration-300">
                <img src="{{ asset('img/andalaswheels.webp') }}" alt="Andalas Wheels" class="w-20 h-20 object-contain" />
            </div>
        </a>
        <span class="text-xl font-bold text-white tracking-wide drop-shadow-lg">Andalas Wheels</span>
    </div>

    <!-- Navigation Menu -->
    <nav class="mt-6 flex-1">
        <ul class="space-y-2 px-4">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboardadmin') }}"
                    class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white
                    {{ request()->routeIs('dashboardadmin') ? 'bg-slate-700 text-white font-bold shadow' : '' }}">
                    <i class="fas fa-home text-lg"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>

            <!-- Product Management -->
            <li>
                <a href="{{ route('productmanage') }}"
                    class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white
                    {{ request()->routeIs('productmanage') ? 'bg-slate-700 text-white font-bold shadow' : '' }}">
                    <i class="fas fa-box text-lg"></i>
                    <span class="font-medium">Product Management</span>
                </a>
            </li>

            <!-- Order Management -->
            <li>
                <a href="{{ route('ordermanage') }}"
                    class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white
                    {{ request()->routeIs('ordermanage') ? 'bg-slate-700 text-white font-bold shadow' : '' }}">
                    <i class="fas fa-cube text-lg"></i>
                    <span class="font-medium">Order Management</span>
                </a>
            </li>

            <!-- User Management -->
            <li>
                <a href="{{ route('usermanage') }}"
                    class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white
                    {{ request()->routeIs('usermanage') ? 'bg-slate-700 text-white font-bold shadow' : '' }}">
                    <i class="fas fa-user-cog text-lg relative">
                        @if(isset($nonaktifCount) && $nonaktifCount > 0)
                            <span class="absolute -top-2 -right-3 flex items-center justify-center bg-blue-700 text-white text-xs font-semibold rounded-full w-5 h-5 border-2 border-slate-900 shadow-sm select-none">
                                {{ $nonaktifCount }}
                            </span>
                        @endif
                    </i>
                    <span class="font-medium">User Management</span>
                </a>
            </li>

            <!-- Analytics -->
            <li>
                <a href="{{ route('analytics') }}"
                    class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white
                    {{ request()->routeIs('analytics') ? 'bg-slate-700 text-white font-bold shadow' : '' }}">
                    <i class="fas fa-chart-line text-lg"></i>
                    <span class="font-medium">Analytics</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Logout Section Desktop -->
    <div class="p-4 border-t border-slate-700 mt-[215px]">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all duration-300 hover:bg-red-600 hover:text-white hover:scale-105 group">
                <i class="fas fa-sign-out-alt text-lg group-hover:text-white"></i>
                <span class="font-medium">Logout</span>
            </button>
        </form>
    </div>
</div>

{{-- Sidebar Mobile --}}
<div x-data="{ open: false }" class="md:hidden">
    <!-- Hamburger Button -->
    <button @click="open = true" class="fixed top-4 right-4 z-50 bg-slate-800 text-white p-2 rounded-lg shadow-lg focus:outline-none">
        <i class="fas fa-bars text-2xl"></i>
    </button>
    <!-- Overlay -->
    <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black/40 z-40" @click="open = false"></div>
    <!-- Drawer Sidebar -->
    <div x-show="open" x-transition:enter="transition transform duration-300"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition transform duration-300"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="fixed top-0 left-0 w-64 h-full bg-gradient-to-b from-slate-800 to-slate-900 shadow-2xl flex flex-col z-50">
        <!-- Close Button -->
        <button @click="open = false" class="absolute top-4 right-4 text-white text-2xl focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
        <!-- Header -->
        <div class="p-6 border-b border-slate-700 flex flex-col items-center">
            <a href="{{ route('dashboard') }}" class="transition-transform duration-300 hover:scale-110 block mb-2">
                <div class="w-24 h-24 flex items-center justify-center transition-all duration-300">
                    <img src="{{ asset('img/andalaswheels.webp') }}" alt="Andalas Wheels" class="w-20 h-20 object-contain" />
                </div>
            </a>
            <span class="text-xl font-bold text-white tracking-wide drop-shadow-lg">Andalas Wheels</span>
        </div>
        <nav class="mt-6 flex-1">
            <ul class="space-y-2 px-4">
                <!-- Dashboard -->
                <li>
                    <a href="{{ route('dashboardadmin') }}"
                        class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white
                        {{ request()->routeIs('dashboardadmin') ? 'bg-slate-700 text-white font-bold shadow' : '' }}">
                        <i class="fas fa-home text-lg"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>
                <!-- Product Management -->
                <li>
                    <a href="{{ route('productmanage') }}"
                        class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white
                        {{ request()->routeIs('productmanage') ? 'bg-slate-700 text-white font-bold shadow' : '' }}">
                        <i class="fas fa-box text-lg"></i>
                        <span class="font-medium">Product Management</span>
                    </a>
                </li>
                <!-- Order Management -->
                <li>
                    <a href="{{ route('ordermanage') }}"
                        class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white
                        {{ request()->routeIs('ordermanage') ? 'bg-slate-700 text-white font-bold shadow' : '' }}">
                        <i class="fas fa-cube text-lg"></i>
                        <span class="font-medium">Order Management</span>
                    </a>
                </li>
                <!-- User Management -->
                <li>
                    <a href="{{ route('usermanage') }}"
                        class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white
                        {{ request()->routeIs('usermanage') ? 'bg-slate-700 text-white font-bold shadow' : '' }}">
                        <i class="fas fa-user-cog text-lg relative">
                            @if(isset($nonaktifCount) && $nonaktifCount > 0)
                                <span class="absolute -top-2 -right-3 flex items-center justify-center bg-blue-700 text-white text-xs font-semibold rounded-full w-5 h-5 border-2 border-slate-900 shadow-sm select-none">
                                    {{ $nonaktifCount }}
                                </span>
                            @endif
                        </i>
                        <span class="font-medium">User Management</span>
                    </a>
                </li>
                <!-- Analytics -->
                <li>
                    <a href="{{ route('analytics') }}"
                        class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white
                        {{ request()->routeIs('analytics') ? 'bg-slate-700 text-white font-bold shadow' : '' }}">
                        <i class="fas fa-chart-line text-lg"></i>
                        <span class="font-medium">Analytics</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Logout Section Mobile -->
        <div class="p-4 border-t border-slate-700 mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all duration-300 hover:bg-red-600 hover:text-white hover:scale-105 group">
                    <i class="fas fa-sign-out-alt text-lg group-hover:text-white"></i>
                    <span class="font-medium">Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>
