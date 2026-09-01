<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Perfu.me Admin')); ?></title>

    <!-- Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="font-sans antialiased text-gray-900 bg-[#F8F9FA]">

    <!-- Wrapper Utama Flexbox with Alpine State -->
    <div x-data="{ mobileOpen: false, isCollapsed: false }" class="flex h-screen overflow-hidden bg-[#F8F9FA]">

        <!-- Sidebar Navigation -->
        <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- Area Konten Utama (Sebelah Kanan Sidebar) -->
        <div class="flex flex-col flex-1 w-0 min-w-0 overflow-hidden">

            <!-- TOP NAVBAR -->
            <header class="flex items-center justify-between h-16 sm:h-20 px-4 sm:px-8 bg-white border-b border-gray-100 shrink-0 z-20 shadow-xs">
                <div class="flex items-center gap-3">
                    <!-- Mobile Hamburger Button -->
                    <button @click="mobileOpen = true" type="button" class="lg:hidden p-2 rounded-xl text-gray-600 hover:bg-gray-100 hover:text-black focus:outline-none transition cursor-pointer" aria-label="Buka Menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>

                    <!-- Breadcrumbs / Page Title -->
                    <div class="flex items-center gap-2 text-xs sm:text-sm font-semibold">
                        <span class="text-gray-400 uppercase tracking-wider text-[11px] font-black">Perfu.me</span>
                        <span class="text-gray-300">/</span>
                        <span class="text-gray-900 font-bold">
                            <?php if(request()->routeIs('dashboard')): ?>
                                Dashboard
                            <?php elseif(request()->routeIs('orders.*')): ?>
                                Manajemen Pesanan
                            <?php elseif(request()->routeIs('products.*')): ?>
                                Katalog Produk
                            <?php elseif(request()->routeIs('brands.*')): ?>
                                Manajemen Brand
                            <?php elseif(request()->routeIs('reviews.*')): ?>
                                Ulasan Produk
                            <?php elseif(request()->routeIs('profile.*')): ?>
                                Pengaturan Profil
                            <?php else: ?>
                                Admin Panel
                            <?php endif; ?>
                        </span>
                    </div>
                </div>

                <!-- Bagian Kanan Navbar -->
                <div class="flex items-center gap-3">
                    <a href="<?php echo e(route('home')); ?>" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-gray-50 hover:bg-black hover:text-white text-gray-700 text-xs font-bold border border-gray-100 transition shadow-xs">
                        <span>Lihat Toko</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                    <div class="flex items-center gap-2.5 bg-gray-50 px-3.5 py-1.5 sm:py-2 rounded-xl border border-gray-100">
                        <div class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-pulse"></div>
                        <span class="text-xs font-semibold text-gray-700">Online: <strong class="text-black"><?php echo e(Auth::user()->name); ?></strong></span>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="relative flex-1 overflow-y-auto focus:outline-none bg-[#F8F9FA]">
                <?php echo e($slot); ?>

            </main>

        </div>
    </div>

</body>
</html><?php /**PATH C:\Users\Faiz\Perfu.me\resources\views/layouts/app.blade.php ENDPATH**/ ?>