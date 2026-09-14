<!doctype html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($item['name']); ?> · Perfu.me</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,400;1,600&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #ffffff;
            color: #111827;
        }

        .font-serif-luxury {
            font-family: 'Playfair Display', Georgia, serif;
        }

        .marquee-track {
            display: flex;
            width: max-content;
            animation: scrollLeft 45s linear infinite;
        }

        .marquee-track:hover {
            animation-play-state: paused;
        }

        @keyframes scrollLeft {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        .nav-underline {
            position: relative;
        }

        .nav-underline::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: -6px;
            height: 2px;
            background: #000000;
            border-radius: 2px;
        }

        .card-hover {
            transition: transform .3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow .3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 30px -8px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>

<body class="text-neutral-900 antialiased bg-white selection:bg-neutral-900 selection:text-white">

    
    <?php
        $announcementList = [
            'DYNAMYST (Bold Woody & Fresh)',
            'VANESSENCE (Citrus Warm Earthy)',
            'Dior Sauvage Extrait',
            'Baccarat Rouge 540',
            'Aigner Blue Emotion',
            'Channel Coco Mademoiselle',
            'VS Scandalous',
            '100% Extrait de Parfum Murni',
            'Konsultasi Aroma Gratis via WhatsApp',
        ];
    ?>
    <div id="marquee-bar"
        class="bg-neutral-950 text-neutral-300 text-[11px] font-medium tracking-wider uppercase border-b border-neutral-800 overflow-hidden py-2">
        <div class="marquee-track">
            <div class="flex items-center shrink-0">
                <?php $__currentLoopData = $announcementList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcementItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="px-6 flex items-center gap-2">
                        <span class="text-neutral-500 text-[10px]">✦</span> <?php echo e($announcementItem); ?>

                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="flex items-center shrink-0" aria-hidden="true">
                <?php $__currentLoopData = $announcementList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcementItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="px-6 flex items-center gap-2">
                        <span class="text-neutral-500 text-[10px]">✦</span> <?php echo e($announcementItem); ?>

                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    
    <header id="site-header" class="bg-white/95 backdrop-blur-md border-b border-neutral-100 sticky top-0 z-50">
        <div class="max-w-[1240px] mx-auto flex items-center justify-between px-8 sm:px-10 h-[70px]">
            <div class="flex items-center gap-12">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 group">
                    <span
                        class="w-9 h-9 rounded-full bg-neutral-900 text-white flex items-center justify-center text-sm font-bold font-serif-luxury tracking-tighter shadow-sm">P.</span>
                    <div class="flex flex-col">
                        <span
                            class="text-xl font-extrabold tracking-tight text-neutral-950 leading-none">Perfu.me</span>
                        <span class="text-[9px] tracking-[0.22em] text-neutral-400 font-semibold uppercase mt-0.5">Haute
                            Parfumerie</span>
                    </div>
                </a>

                <nav class="hidden md:flex items-center gap-8 text-sm text-black/60">
                    <a href="<?php echo e(route('home')); ?>" class="hover:text-black">Home</a>
                    <a href="<?php echo e(route('refill')); ?>" class="nav-underline text-black font-medium">Products</a>
                </nav>
            </div>

            <div class="flex items-center gap-3">
                
                <a href="<?php echo e(route('home')); ?>"
                    class="inline-flex items-center gap-1.5 text-[12px] font-semibold text-neutral-600 hover:text-neutral-950 border border-neutral-200 hover:border-neutral-900 rounded-full px-3.5 py-2.5 transition">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali</span>
                </a>

                
                <a href="<?php echo e(route('home')); ?>?tour=1"
                    class="hidden sm:inline-flex items-center gap-1.5 text-[12px] font-semibold text-neutral-600 hover:text-neutral-950 border border-neutral-200 hover:border-neutral-900 rounded-full px-3.5 py-2.5 transition cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <circle cx="12" cy="12" r="10" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.5 9a2.5 2.5 0 115 .5c0 1.5-2 1.5-2 3.5" />
                        <circle cx="12" cy="17" r="0.6" fill="currentColor" stroke="none" />
                    </svg>
                    <span>Panduan</span>
                </a>

                
                <a href="<?php echo e(route('refill')); ?>"
                    class="bg-neutral-950 text-white text-[13px] font-semibold rounded-full px-5 py-2.5 hover:bg-neutral-800 transition tracking-wide shadow-sm">
                    Shop Now
                </a>
            </div>
        </div>
    </header>

    
    <section class="max-w-[1240px] mx-auto px-6 sm:px-10 py-12 lg:py-16 grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-center">

        
        <div class="relative aspect-[3/4] max-w-[480px] mx-auto w-full overflow-hidden rounded-2xl bg-[#f8f8f8] border border-neutral-200 shadow-sm card-hover">
            <?php if($item['is_sold_out']): ?>
                <span
                    class="absolute top-4 left-4 bg-neutral-800 text-white text-[11px] font-semibold px-3 py-1 rounded-md shadow-sm z-10 tracking-wide uppercase">
                    Sold out
                </span>
            <?php endif; ?>
            <img src="<?php echo e(asset($item['image'])); ?>" alt="<?php echo e($item['name']); ?>"
                class="absolute inset-0 w-full h-full object-cover">
        </div>

        
        <div class="flex flex-col justify-center space-y-6">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-neutral-100 border border-neutral-200 text-[10px] font-bold text-neutral-600 tracking-widest uppercase mb-3">
                    <span>HAUTE PARFUMERIE · EXTRAIT DE PARFUM</span>
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold leading-tight text-neutral-950 mb-2">
                    <?php echo e($item['name']); ?>

                </h1>
                <p class="text-2xl font-extrabold text-neutral-950">
                    <?php echo e($item['price']); ?>

                </p>
            </div>

            <div class="border-t border-b border-neutral-100 py-4">
                <p class="text-sm text-neutral-600 leading-relaxed">
                    <?php echo e($item['description'] ?? 'Deskripsi produk belum tersedia.'); ?>

                </p>
            </div>

            <div class="flex items-center gap-4 pt-2">
                <?php if($item['is_sold_out']): ?>
                    <span
                        class="inline-block bg-neutral-200 text-neutral-500 text-sm font-semibold rounded-full px-7 py-3.5 cursor-not-allowed">
                        Stok Habis
                    </span>
                <?php else: ?>
                    <?php
                        $waMessage = 'Halo Perfu.me, saya ingin membeli ' . $item['name'] . ' (' . $item['price'] . '). Apakah masih tersedia?';
                        $waUrl = 'https://wa.me/6281234567890?text=' . rawurlencode($waMessage);
                    ?>
                    <a href="<?php echo e($waUrl); ?>" target="_blank"
                        class="inline-flex items-center justify-center gap-2 bg-neutral-950 text-white text-sm font-semibold rounded-full px-7 py-3.5 hover:bg-neutral-800 transition shadow-sm">
                        <span>Beli Sekarang via WhatsApp</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                <?php endif; ?>
                <a href="<?php echo e(route('refill')); ?>"
                    class="inline-flex items-center justify-center border border-neutral-200 text-neutral-700 hover:border-neutral-900 hover:text-neutral-950 text-sm font-semibold rounded-full px-6 py-3.5 transition">
                    Lihat Koleksi Lainnya
                </a>
            </div>
        </div>
    </section>

</body>

</html><?php /**PATH C:\Users\Faiz\Perfu.me\resources\views\Product_customer\product-detail.blade.php ENDPATH**/ ?>