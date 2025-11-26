<!-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\admin\sidebar.blade.php -->
<div class="w-64 bg-gradient-to-b from-slate-800 to-slate-900 min-h-screen shadow-2xl flex flex-col">
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
                   class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white  {{ request()->routeIs('dashboardadmin') ? ' text-white' : '' }}">
                    <i class="fas fa-home text-lg"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>

            <!-- Product Management -->
            <li>
                <a href="{{ route('productmanage') }}"
                   class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white {{ request()->routeIs('productmanage') ? ' text-white' : '' }}">
                    <i class="fas fa-box text-lg"></i>
                    <span class="font-medium">Product Management</span>
                </a>
            </li>

            <!-- Order Management -->
            <li>
                <a href="{{ route('ordermanage') }}"
                   class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white {{ request()->routeIs('ordermanage') ? ' text-white' : '' }}">
                    <i class="fas fa-cube text-lg"></i>
                    <span class="font-medium">Order Management</span>
                </a>
            </li>

            <!-- User Management -->
            <li>
                <a href="{{ route('usermanage') }}"
                   class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white {{ request()->routeIs('usermanage') ? ' text-white' : '' }}">
                    <i class="fas fa-user-cog text-lg"></i>
                    <span class="font-medium">User Management</span>
                </a>
            </li>

            <!-- Analytics -->
            <li>
                <a href="{{ route('analytics') }}"
                   class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white {{ request()->routeIs('analytics') ? ' text-white' : '' }}">
                    <i class="fas fa-chart-line text-lg"></i>
                    <span class="font-medium">Analytics</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Logout Section -->
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
