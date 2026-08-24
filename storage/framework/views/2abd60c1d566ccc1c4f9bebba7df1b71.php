<!-- Main Sidebar Container -->
<div x-data="{ mobileOpen: false, isCollapsed: false, openDropdown: <?php echo e(request()->routeIs('products.*') ? 'true' : 'false'); ?>, brandDropdown: <?php echo e(request()->routeIs('brands.*') ? 'true' : 'false'); ?> }">

    <!-- Mobile overlay -->
    <div x-show="mobileOpen" @click="mobileOpen = false" 
         x-transition:enter="transition-opacity ease-linear duration-300" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="transition-opacity ease-linear duration-300" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0" 
         class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm z-40 lg:hidden" style="display: none;"></div>

    <!-- Sidebar / Navigation Menu -->
    <nav :class="{
            'translate-x-0': mobileOpen, 
            '-translate-x-full': !mobileOpen,
            'w-72': !isCollapsed,
            'w-24': isCollapsed
         }" 
         class="fixed inset-y-0 left-0 z-50 bg-white border-r border-gray-100 shadow-[4px_0_24px_rgba(0,0,0,0.02)] lg:translate-x-0 lg:static lg:block lg:flex-shrink-0 transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] flex flex-col h-screen relative">
        
        <!-- Toggle Collapse Button (Desktop Only) -->
        <button @click="isCollapsed = !isCollapsed" 
                class="hidden lg:flex absolute -right-3.5 top-8 items-center justify-center w-7 h-7 bg-white border border-gray-200 rounded-full text-gray-400 hover:text-[#D4AF37] hover:border-[#D4AF37] shadow-sm transition-all duration-300 z-50 focus:outline-none"
                :class="isCollapsed ? 'rotate-180' : ''">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>

        <!-- Logo Area -->
        <div class="flex items-center justify-center h-20 border-b border-gray-50 shrink-0 group overflow-hidden">
            <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center transition-transform duration-300 ease-in-out group-hover:scale-105">
                <!-- Logo Full -->
                <span x-show="!isCollapsed" x-transition.opacity.duration.300ms class="text-2xl font-extrabold tracking-tight text-black whitespace-nowrap">
                    Perfu<span class="text-[#D4AF37] transition-colors duration-300 group-hover:text-black">.me</span>
                </span>
                <!-- Logo Mini -->
                <span x-show="isCollapsed" x-transition.opacity.duration.300ms style="display: none;" class="text-3xl font-extrabold tracking-tight text-black">
                    P<span class="text-[#D4AF37] transition-colors duration-300 group-hover:text-black">.</span>
                </span>
            </a>

        </div>

        <!-- Scrollable Navigation Links -->
        <div class="flex-1 py-8 space-y-3 overflow-y-auto overflow-x-hidden" :class="isCollapsed ? 'px-3' : 'px-4'">
            
            <!-- Dashboard Link -->
            <a href="<?php echo e(route('dashboard')); ?>" 
               class="group relative flex items-center py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 ease-in-out
               <?php echo e(request()->routeIs('dashboard') 
                  ? 'bg-gradient-to-r from-gray-900 to-black text-white shadow-md shadow-gray-900/20' 
                  : 'text-gray-500 hover:bg-gray-50 hover:text-black'); ?>"
               :class="isCollapsed ? 'justify-center px-0' : 'px-4'">
                
                <?php if(request()->routeIs('dashboard')): ?>
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#D4AF37] rounded-r-full shadow-[0_0_10px_rgba(212,175,55,0.5)]"></div>
                <?php endif; ?>

                <svg class="w-5 h-5 transition-all duration-300 ease-out group-hover:scale-110 flex-shrink-0 <?php echo e(request()->routeIs('dashboard') ? 'text-[#D4AF37]' : 'text-gray-400 group-hover:text-[#D4AF37]'); ?>" :class="isCollapsed ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                
                <span x-show="!isCollapsed" class="whitespace-nowrap transition-transform duration-300 ease-out group-hover:translate-x-1" x-transition.opacity.duration.300ms>
                    <?php echo e(__('Dashboard')); ?>

                </span>
            </a>

            <!-- ORDERS LINK -->
            <a href="<?php echo e(route('orders.index')); ?>" class="group relative flex items-center py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 ease-in-out <?php echo e(request()->routeIs('orders.*') ? 'bg-gradient-to-r from-gray-900 to-black text-white shadow-md shadow-gray-900/20' : 'text-gray-500 hover:bg-gray-50 hover:text-black'); ?>" :class="isCollapsed ? 'justify-center px-0' : 'px-4'">
                <svg class="w-5 h-5 flex-shrink-0 <?php echo e(request()->routeIs('orders.*') ? 'text-[#D4AF37]' : 'text-gray-400'); ?>" :class="isCollapsed ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 00-2-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5a3 3 0 016 0m-6 9l2 2 4-4"/></svg>
                <span x-show="!isCollapsed" class="whitespace-nowrap">Manajemen Pesanan</span>
            </a>

            <!-- ========================================== -->
            <!-- PRODUCTS MENU WITH DROPDOWN CATEGORY       -->
            <!-- ========================================== -->
            <div class="space-y-1">
                <div class="group relative flex items-center justify-between py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 ease-in-out
                    <?php echo e(request()->routeIs('products.*') 
                       ? 'bg-gradient-to-r from-gray-900 to-black text-white shadow-md shadow-gray-900/20' 
                       : 'text-gray-500 hover:bg-gray-50 hover:text-black'); ?>"
                    :class="isCollapsed ? 'justify-center px-0' : 'px-4'">
                    
                    <?php if(request()->routeIs('products.*')): ?>
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#D4AF37] rounded-r-full shadow-[0_0_10px_rgba(212,175,55,0.5)]"></div>
                    <?php endif; ?>

                    <a href="<?php echo e(route('products.index')); ?>" class="flex items-center flex-1 min-w-0 pr-2">
                        <svg class="w-5 h-5 transition-all duration-300 ease-out group-hover:scale-110 flex-shrink-0 <?php echo e(request()->routeIs('products.*') ? 'text-[#D4AF37]' : 'text-gray-400 group-hover:text-[#D4AF37]'); ?>" :class="isCollapsed ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <span x-show="!isCollapsed" class="whitespace-nowrap transition-transform duration-300 ease-out group-hover:translate-x-1 truncate" x-transition.opacity.duration.300ms>
                            <?php echo e(__('Katalog Produk')); ?>

                        </span>
                    </a>

                    <button x-show="!isCollapsed" @click.prevent="openDropdown = !openDropdown" type="button" class="flex items-center justify-center w-6 h-6 ml-auto rounded-lg hover:bg-white/10 transition-colors flex-shrink-0 focus:outline-none">
                        <svg class="w-4 h-4 transition-transform duration-300" :class="openDropdown ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                </div>

                <div x-show="openDropdown && !isCollapsed" x-transition.origin.top.duration.300ms class="pl-11 pr-2 space-y-1.5 pt-1" style="display: none;">
                    <a href="<?php echo e(route('products.index', ['type' => 'Original'])); ?>" class="block px-3 py-2 text-xs font-semibold rounded-lg transition-colors <?php echo e(request('type') == 'Original' ? 'text-[#D4AF37] bg-gray-100 font-bold' : 'text-gray-500 hover:text-black hover:bg-gray-50'); ?>">
                        • Produk Original
                    </a>
                    <a href="<?php echo e(route('products.index', ['type' => 'Refill'])); ?>" class="block px-3 py-2 text-xs font-semibold rounded-lg transition-colors <?php echo e(request('type') == 'Refill' ? 'text-[#D4AF37] bg-gray-100 font-bold' : 'text-gray-500 hover:text-black hover:bg-gray-50'); ?>">
                        • Parfum Refill
                    </a>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- BRANDS MENU (BARU)                         -->
            <!-- ========================================== -->
            <a href="<?php echo e(route('brands.index')); ?>" 
               class="group relative flex items-center py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 ease-in-out
               <?php echo e(request()->routeIs('brands.*') 
                  ? 'bg-gradient-to-r from-gray-900 to-black text-white shadow-md shadow-gray-900/20' 
                  : 'text-gray-500 hover:bg-gray-50 hover:text-black'); ?>"
               :class="isCollapsed ? 'justify-center px-0' : 'px-4'">
                
                <?php if(request()->routeIs('brands.*')): ?>
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#D4AF37] rounded-r-full shadow-[0_0_10px_rgba(212,175,55,0.5)]"></div>
                <?php endif; ?>

                <svg class="w-5 h-5 transition-all duration-300 ease-out group-hover:scale-110 flex-shrink-0 <?php echo e(request()->routeIs('brands.*') ? 'text-[#D4AF37]' : 'text-gray-400 group-hover:text-[#D4AF37]'); ?>" :class="isCollapsed ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                
                <span x-show="!isCollapsed" class="whitespace-nowrap transition-transform duration-300 ease-out group-hover:translate-x-1" x-transition.opacity.duration.300ms>
                    <?php echo e(__('Manajemen Brand')); ?>

                </span>
            </a>

            <!-- ========================================== -->
            <!-- REVIEWS MENU (BARU)                        -->
            <!-- ========================================== -->
            <a href="<?php echo e(route('reviews.index')); ?>" 
               class="group relative flex items-center py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 ease-in-out
               <?php echo e(request()->routeIs('reviews.*') 
                  ? 'bg-gradient-to-r from-gray-900 to-black text-white shadow-md shadow-gray-900/20' 
                  : 'text-gray-500 hover:bg-gray-50 hover:text-black'); ?>"
               :class="isCollapsed ? 'justify-center px-0' : 'px-4'">
                
                <?php if(request()->routeIs('reviews.*')): ?>
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#D4AF37] rounded-r-full shadow-[0_0_10px_rgba(212,175,55,0.5)]"></div>
                <?php endif; ?>

                <svg class="w-5 h-5 transition-all duration-300 ease-out group-hover:scale-110 flex-shrink-0 <?php echo e(request()->routeIs('reviews.*') ? 'text-[#D4AF37]' : 'text-gray-400 group-hover:text-[#D4AF37]'); ?>" :class="isCollapsed ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                
                <span x-show="!isCollapsed" class="whitespace-nowrap transition-transform duration-300 ease-out group-hover:translate-x-1" x-transition.opacity.duration.300ms>
                    <?php echo e(__('Ulasan Produk')); ?>

                </span>
            </a>
            
        </div>

        <!-- User Profile (Bottom Area) -->
        <div class="p-4 border-t border-gray-100 shrink-0 bg-white" :class="isCollapsed ? 'px-2' : 'px-4'">
            <?php if (isset($component)) { $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => ['align' => 'top','width' => '48']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'top','width' => '48']); ?>
                 <?php $__env->slot('trigger', null, []); ?> 
                    <button class="group flex items-center w-full py-3 text-sm font-medium text-left text-gray-700 bg-white rounded-xl hover:bg-gray-50 border border-transparent transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-[#D4AF37]/50"
                            :class="isCollapsed ? 'justify-center px-0' : 'px-3'">
                        
                        <div class="relative flex items-center justify-center w-9 h-9 text-white bg-black rounded-full shadow-sm font-bold transition-transform duration-300 group-hover:scale-105 group-hover:ring-2 group-hover:ring-[#D4AF37] group-hover:ring-offset-2 flex-shrink-0">
                            <?php echo e(substr(Auth::user()->name, 0, 1)); ?>

                            <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 border-2 border-white rounded-full"></span>
                        </div>
                        
                        <div x-show="!isCollapsed" x-transition.opacity.duration.300ms class="flex-1 truncate ml-3" style="display: none;">
                            <div class="font-bold text-gray-900 group-hover:text-black transition-colors"><?php echo e(Auth::user()->name); ?></div>
                            <div class="text-xs text-gray-500 truncate transition-colors group-hover:text-gray-600"><?php echo e(Auth::user()->email); ?></div>
                        </div>
                        
                        <svg x-show="!isCollapsed" class="w-4 h-4 ml-2 text-gray-400 transition-transform duration-300 group-hover:translate-y-px group-hover:text-[#D4AF37]" style="display: none;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                    </button>
                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('content', null, []); ?> 
                    <div class="py-1">
                        <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('profile.edit'),'class' => 'transition-colors hover:text-[#D4AF37] hover:bg-gray-50/50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit')),'class' => 'transition-colors hover:text-[#D4AF37] hover:bg-gray-50/50']); ?>
                            <?php echo e(__('Pengaturan Profil')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                        <div class="border-t border-gray-100 my-1"></div>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault(); this.closest(\'form\').submit();','class' => 'text-red-600 hover:text-red-700 hover:bg-red-50 transition-colors']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault(); this.closest(\'form\').submit();','class' => 'text-red-600 hover:text-red-700 hover:bg-red-50 transition-colors']); ?>
                                <?php echo e(__('Keluar Akun')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                        </form>
                    </div>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $attributes = $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $component = $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
        </div>
    </nav>

    <!-- Mobile Top Header -->
    <div class="lg:hidden fixed top-0 w-full flex items-center justify-between h-16 px-4 bg-white/80 backdrop-blur-md border-b border-gray-100 z-30 shadow-sm transition-all duration-300">
        <a href="<?php echo e(route('dashboard')); ?>" class="text-xl font-extrabold text-black">
            Perfu<span class="text-[#D4AF37]">.me</span>
        </a>
        <button @click="mobileOpen = true" class="p-2 text-gray-500 rounded-lg hover:text-black hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#D4AF37]/50 transition-all duration-200 active:scale-95">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
    </div>
</div>
<?php /**PATH C:\Users\USER\Perfu.me\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>