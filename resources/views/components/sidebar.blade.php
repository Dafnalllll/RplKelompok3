<!-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\sidebar.blade.php -->
<div class="w-64 bg-gradient-to-b from-slate-800 to-slate-900 min-h-screen shadow-2xl flex flex-col">
    <!-- Header -->
    <div class="p-6 border-b border-slate-700">
        <h1 class="text-white text-xl font-bold">Andalaswheel</h1>
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

            <!-- Analytics -->
            <li>
                <a href="{{ route('analytics') }}"
                   class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white {{ request()->routeIs('analytics') ? ' text-white' : '' }}">
                    <i class="fas fa-chart-line text-lg"></i>
                    <span class="font-medium">Analytics</span>
                </a>
            </li>

            <!-- Category Management -->
            <li>
                <a href="{{ route('categorymanage') }}"
                   class="flex items-center gap-3 px-4 py-3 text-slate-300 rounded-lg transition-all hover:scale-105 duration-300 hover:bg-slate-700 hover:text-white {{ request()->routeIs('categorymanage') ? ' text-white' : '' }}">
                    <i class="fas fa-th-large text-lg"></i>
                    <span class="font-medium">Category Management</span>
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
