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
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="font-sans antialiased text-gray-900 bg-gray-50">

    <!-- Wrapper Utama Flexbox -->
    <div class="flex h-screen overflow-hidden bg-gray-50">

        <!-- Sidebar Navigation -->
        <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- Area Konten Utama (Sebelah Kanan Sidebar) -->
        <div class="flex flex-col flex-1 w-0 overflow-hidden">

            <!-- TOP NAVBAR (Biar gak kosong di atas) -->
            <header
                class="flex items-center justify-between h-20 px-8 bg-white border-b border-gray-100 z-10 shadow-sm">
                <div class="flex items-center gap-3">
                    <!-- Judul Halaman dinamis atau Sapaan -->
                    <span class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Admin Panel</span>
                    <span class="text-gray-300">/</span>
                    <span class="text-sm font-bold text-black">Dashboard & Katalog</span>
                </div>

                <!-- Bagian Kanan Navbar (Info User / Status) -->
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-3 bg-gray-50 px-3.5 py-2 rounded-xl border border-gray-100">
                        <div class="w-2.5 h-2.5 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-xs font-semibold text-gray-700">Online as <span
                                class="text-black font-bold"><?php echo e(Auth::user()->name); ?></span></span>
                    </div>
                </div>
            </header>

            <!-- Page Content (Area tabel produk dll) -->
            <main class="relative flex-1 overflow-y-auto focus:outline-none bg-gray-50/50">
                <?php echo e($slot); ?>

            </main>

        </div>
    </div>

</body>

</html><?php /**PATH C:\Users\Faiz\Perfu.me\resources\views\layouts\app.blade.php ENDPATH**/ ?>