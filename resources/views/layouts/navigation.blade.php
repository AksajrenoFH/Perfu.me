<!-- Sidebar Navigation -->
<div x-data="{ 
        openDropdown: {{ request()->routeIs('products.*') ? 'true' : 'false' }},
        userMenuOpen: false
     }" class="contents">

    <!-- Mobile overlay -->
    <div x-show="mobileOpen" 
         @click="mobileOpen = false" 
         x-cloak
         x-transition:enter="transition-opacity ease-linear duration-300" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="transition-opacity ease-linear duration-300" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0" 
         class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm z-40 lg:hidden" 
         style="display: none;">
    </div>

    <!-- Navigation Menu Sidebar -->
    <nav :class="{
            'translate-x-0': mobileOpen, 
            '-translate-x-full': !mobileOpen,
            'w-72': !isCollapsed,
            'w-20': isCollapsed
         }" 
         class="fixed inset-y-0 left-0 z-50 bg-white border-r border-gray-100 shadow-[4px_0_24px_rgba(0,0,0,0.02)] lg:translate-x-0 lg:static lg:block lg:flex-shrink-0 transition-all duration-300 ease-in-out flex flex-col h-screen relative">
        
        <!-- Toggle Collapse Button (Desktop Only) -->
        <button @click="isCollapsed = !isCollapsed" 
                type="button"
                title="Sembunyikan / Tampilkan Sidebar"
                class="hidden lg:flex absolute -right-3.5 top-7 items-center justify-center w-7 h-7 bg-white border border-gray-200 rounded-full text-gray-400 hover:text-[#D4AF37] hover:border-[#D4AF37] shadow-sm transition-all duration-300 z-30 focus:outline-none cursor-pointer"
                :class="isCollapsed ? 'rotate-180' : ''">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
        </button>

        <!-- Logo Area -->
<div class="relative flex items-center justify-center h-16 sm:h-20 px-6 border-b border-gray-50 shrink-0 overflow-hidden">
    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 transition-transform duration-300 group">
        <!-- Logo Full -->
        <div x-show="!isCollapsed" class="flex items-center">
            <span class="text-2xl font-semibold tracking-tight text-gray-900">
                Perfu<span class="text-[#D4AF37]">.me</span>
            </span>
        </div>
        <!-- Logo Mini (Collapsed) -->
        <div x-show="isCollapsed" class="flex items-center justify-center w-full">
            <span class="text-2xl font-semibold tracking-tight text-black">
                P<span class="text-[#D4AF37]">.</span>
            </span>
        </div>
    </a>

    <!-- Close button on mobile -->
    <button @click="mobileOpen = false" class="lg:hidden absolute right-4 top-1/2 -translate-y-1/2 p-1.5 rounded-lg text-gray-400 hover:text-gray-900 hover:bg-gray-100 transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>
</div>
        <!-- Scrollable Navigation Links -->
        <div class="flex-1 py-6 space-y-1.5 overflow-y-auto overflow-x-hidden custom-scrollbar" :class="isCollapsed ? 'px-2' : 'px-4'">
            
            <!-- Section: Menu Utama -->
            <div x-show="!isCollapsed" class="px-3 pt-2 pb-1 text-[10px] font-medium tracking-[0.15em] text-gray-400 uppercase">
                Menu Utama
            </div>

            <!-- Dashboard Link -->
            <a href="{{ route('dashboard') }}" 
               title="Dashboard"
               class="group relative flex items-center py-3 text-sm font-medium rounded-2xl transition-all duration-200
               {{ request()->routeIs('dashboard') 
                  ? 'bg-black text-white shadow-md shadow-black/10' 
                  : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
               :class="isCollapsed ? 'justify-center px-0' : 'px-3.5'">
                
                @if(request()->routeIs('dashboard'))
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 h-6 w-1 bg-[#D4AF37] rounded-r-full shadow-[0_0_8px_rgba(212,175,55,0.6)]"></div>
                @endif

                <svg class="w-5 h-5 flex-shrink-0 transition-colors {{ request()->routeIs('dashboard') ? 'text-[#D4AF37]' : 'text-gray-400 group-hover:text-[#D4AF37]' }}" :class="isCollapsed ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                
                <span x-show="!isCollapsed" class="whitespace-nowrap truncate">
                    {{ __('Dashboard') }}
                </span>
            </a>

            <!-- Orders Link -->
            <a href="{{ route('orders.index') }}" 
               title="Manajemen Pesanan"
               class="group relative flex items-center py-3 text-sm font-medium rounded-2xl transition-all duration-200
               {{ request()->routeIs('orders.*') 
                  ? 'bg-black text-white shadow-md shadow-black/10' 
                  : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
               :class="isCollapsed ? 'justify-center px-0' : 'px-3.5'">
                
                @if(request()->routeIs('orders.*'))
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 h-6 w-1 bg-[#D4AF37] rounded-r-full shadow-[0_0_8px_rgba(212,175,55,0.6)]"></div>
                @endif

                <svg class="w-5 h-5 flex-shrink-0 transition-colors {{ request()->routeIs('orders.*') ? 'text-[#D4AF37]' : 'text-gray-400 group-hover:text-[#D4AF37]' }}" :class="isCollapsed ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 00-2-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5a3 3 0 016 0m-6 9l2 2 4-4"/>
                </svg>
                
                <span x-show="!isCollapsed" class="whitespace-nowrap truncate">
                    Manajemen Pesanan
                </span>
            </a>

            <!-- Section: Katalog & Inventaris -->
            <div x-show="!isCollapsed" class="px-3 pt-4 pb-1 text-[10px] font-medium tracking-[0.15em] text-gray-400 uppercase">
                Katalog & Stok
            </div>

            <!-- Products Menu with Dropdown -->
            <div class="space-y-1">
                <div class="group relative flex items-center justify-between py-3 text-sm font-medium rounded-2xl transition-all duration-200
                    {{ request()->routeIs('products.*') 
                       ? 'bg-black text-white shadow-md shadow-black/10' 
                       : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                    :class="isCollapsed ? 'justify-center px-0' : 'px-3.5'">
                    
                    @if(request()->routeIs('products.*'))
                        <div class="absolute left-0 top-1/2 -translate-y-1/2 h-6 w-1 bg-[#D4AF37] rounded-r-full shadow-[0_0_8px_rgba(212,175,55,0.6)]"></div>
                    @endif

                    <a href="{{ route('products.index') }}" title="Katalog Produk" class="flex items-center flex-1 min-w-0" :class="isCollapsed ? 'justify-center' : ''">
                        <svg class="w-5 h-5 flex-shrink-0 transition-colors {{ request()->routeIs('products.*') ? 'text-[#D4AF37]' : 'text-gray-400 group-hover:text-[#D4AF37]' }}" :class="isCollapsed ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <span x-show="!isCollapsed" class="whitespace-nowrap truncate">
                            {{ __('Katalog Produk') }}
                        </span>
                    </a>

                    <button x-show="!isCollapsed" @click.prevent="openDropdown = !openDropdown" type="button" class="flex items-center justify-center w-6 h-6 ml-2 rounded-lg hover:bg-white/20 transition-colors flex-shrink-0 focus:outline-none cursor-pointer" aria-label="Toggle Submenu">
                        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="openDropdown ? 'rotate-180 text-[#D4AF37]' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>

                <!-- Submenu Produk -->
                <div x-show="openDropdown && !isCollapsed" x-transition.origin.top.duration.200ms class="pl-9 pr-1 space-y-1 pt-1" style="display: none;">
                    <a href="{{ route('products.index') }}" class="block px-3 py-1.5 text-xs rounded-xl transition-colors {{ !request('type') && request()->routeIs('products.index') ? 'text-[#D4AF37] bg-gray-100 font-medium' : 'text-gray-500 hover:text-black hover:bg-gray-50' }}">
                        Semua Produk
                    </a>
                    <a href="{{ route('products.index', ['type' => 'Original']) }}" class="block px-3 py-1.5 text-xs rounded-xl transition-colors {{ request('type') == 'Original' ? 'text-[#D4AF37] bg-gray-100 font-medium' : 'text-gray-500 hover:text-black hover:bg-gray-50' }}">
                        Produk Original
                    </a>
                    <a href="{{ route('products.index', ['type' => 'Refill']) }}" class="block px-3 py-1.5 text-xs rounded-xl transition-colors {{ request('type') == 'Refill' ? 'text-[#D4AF37] bg-gray-100 font-medium' : 'text-gray-500 hover:text-black hover:bg-gray-50' }}">
                        Parfum Refill
                    </a>
                </div>
            </div>

            <!-- Brands Link -->
            <a href="{{ route('brands.index') }}" 
               title="Manajemen Brand"
               class="group relative flex items-center py-3 text-sm font-medium rounded-2xl transition-all duration-200
               {{ request()->routeIs('brands.*') 
                  ? 'bg-black text-white shadow-md shadow-black/10' 
                  : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
               :class="isCollapsed ? 'justify-center px-0' : 'px-3.5'">
                
                @if(request()->routeIs('brands.*'))
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 h-6 w-1 bg-[#D4AF37] rounded-r-full shadow-[0_0_8px_rgba(212,175,55,0.6)]"></div>
                @endif

                <svg class="w-5 h-5 flex-shrink-0 transition-colors {{ request()->routeIs('brands.*') ? 'text-[#D4AF37]' : 'text-gray-400 group-hover:text-[#D4AF37]' }}" :class="isCollapsed ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
                
                <span x-show="!isCollapsed" class="whitespace-nowrap truncate">
                    {{ __('Manajemen Brand') }}
                </span>
            </a>

            <!-- Section: Pelanggan -->
            <div x-show="!isCollapsed" class="px-3 pt-4 pb-1 text-[10px] font-medium tracking-[0.15em] text-gray-400 uppercase">
                Testimoni
            </div>

            <!-- Reviews Link -->
            <a href="{{ route('reviews.index') }}" 
               title="Ulasan Produk"
               class="group relative flex items-center py-3 text-sm font-medium rounded-2xl transition-all duration-200
               {{ request()->routeIs('reviews.*') 
                  ? 'bg-black text-white shadow-md shadow-black/10' 
                  : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
               :class="isCollapsed ? 'justify-center px-0' : 'px-3.5'">
                
                @if(request()->routeIs('reviews.*'))
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 h-6 w-1 bg-[#D4AF37] rounded-r-full shadow-[0_0_8px_rgba(212,175,55,0.6)]"></div>
                @endif

                <svg class="w-5 h-5 flex-shrink-0 transition-colors {{ request()->routeIs('reviews.*') ? 'text-[#D4AF37]' : 'text-gray-400 group-hover:text-[#D4AF37]' }}" :class="isCollapsed ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                </svg>
                
                <span x-show="!isCollapsed" class="whitespace-nowrap truncate">
                    {{ __('Ulasan Produk') }}
                </span>
            </a>
            
        </div>

        <!-- User Profile (Bottom Area) with upward Popup -->
        <div class="p-3 border-t border-gray-100 shrink-0 bg-white relative">
            <div class="relative">
                <!-- Trigger Button -->
                <button @click="userMenuOpen = !userMenuOpen" 
                        type="button"
                        class="group flex items-center w-full p-2 text-sm text-left text-gray-700 bg-white rounded-2xl hover:bg-gray-50 border border-gray-100 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-[#D4AF37]/30 cursor-pointer"
                        :class="isCollapsed ? 'justify-center' : ''">
                    
                    <div class="relative flex items-center justify-center w-9 h-9 text-white bg-black rounded-xl shadow-xs font-medium text-xs flex-shrink-0 group-hover:bg-[#D4AF37] transition-colors">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        <span class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 bg-emerald-500 border-2 border-white rounded-full"></span>
                    </div>
                    
                    <div x-show="!isCollapsed" class="flex-1 min-w-0 ml-3 truncate">
                        <div class="font-medium text-xs text-gray-900 truncate">{{ Auth::user()->name }}</div>
                        <div class="text-[11px] text-gray-400 truncate">Administrator</div>
                    </div>
                    
                    <svg x-show="!isCollapsed" class="w-4 h-4 ml-2 text-gray-400 transition-transform duration-200" :class="userMenuOpen ? 'rotate-180 text-[#D4AF37]' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                    </svg>
                </button>

                <!-- Upward Popup Menu -->
                <div x-show="userMenuOpen" 
                     @click.outside="userMenuOpen = false"
                     x-cloak
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                     x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                     class="absolute bottom-full mb-3 left-0 w-60 bg-white rounded-3xl shadow-2xl border border-gray-100 p-2 z-50 divide-y divide-gray-100"
                     style="display: none;">
                    
                    <div class="px-3 py-2.5">
                        <p class="text-xs font-medium text-gray-900">{{ Auth::user()->name }}</p>
                        <p class="text-[11px] text-gray-400 truncate">{{ Auth::user()->email }}</p>
                    </div>

                    <div class="py-1 space-y-0.5">
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-3 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-black rounded-xl transition">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>Pengaturan Profil</span>
                        </a>
                        <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 px-3 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-black rounded-xl transition">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            <span>Buka Toko Depan</span>
                        </a>
                    </div>

                    <div class="pt-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 text-xs text-red-600 hover:bg-red-50 rounded-xl transition cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                <span>Keluar Akun</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
