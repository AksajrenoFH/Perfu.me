<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($item['name']); ?> · Parfume.me</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
        }
    </style>
</head>

<body class="text-[#14161a] antialiased bg-white">

    
    <header class="bg-white/80 backdrop-blur border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-[1400px] mx-auto flex items-center justify-between px-8 h-[76px]">
            <a href="<?php echo e(route('home')); ?>" class="text-xl font-extrabold tracking-tight">Parfume.me</a>
            <a href="<?php echo e(route('home')); ?>" class="text-sm text-black/60 hover:text-black">&larr; Kembali ke Home</a>
        </div>
    </header>

    
    <section class="max-w-[1400px] mx-auto px-8 py-16 grid grid-cols-1 lg:grid-cols-2 gap-14">

        
        <div class="relative aspect-[3/4] w-full overflow-hidden rounded-2xl bg-[#f8f8f8] border border-gray-100">
            <?php if($item['is_sold_out']): ?>
                <span
                    class="absolute top-4 left-4 bg-[#8a8a8a] text-white text-[11px] font-semibold px-3 py-1 rounded-md shadow-sm z-10 tracking-wide">
                    Sold out
                </span>
            <?php endif; ?>
            <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['name']); ?>"
                class="absolute inset-0 w-full h-full object-cover">
        </div>

        
        <div>
            <p class="text-xs tracking-[0.2em] text-gray-400 font-semibold mb-3">PARFUME COLLECTION</p>
            <h1 class="text-3xl md:text-4xl font-extrabold leading-tight mb-4 text-gray-900">
                <?php echo e($item['name']); ?>

            </h1>
            <p class="text-2xl font-bold text-gray-900 mb-8">
                <?php echo e($item['price']); ?>

            </p>

            <p class="text-gray-500 leading-relaxed mb-8">
                <?php echo e($item['description'] ?? 'Deskripsi produk belum tersedia.'); ?>

            </p>

            <?php if($item['is_sold_out']): ?>
                <span
                    class="inline-block bg-gray-200 text-gray-500 text-sm font-semibold rounded-full px-6 py-3.5 cursor-not-allowed">
                    Stok Habis
                </span>
            <?php else: ?>
                <a href="#"
                    class="inline-block bg-black text-white text-sm font-semibold rounded-full px-6 py-3.5 hover:bg-gray-800 transition">
                    Beli Sekarang
                </a>
            <?php endif; ?>
        </div>
    </section>

</body>

</html><?php /**PATH C:\Users\USER\Perfu.me\resources\views/Product_customer/product-detail.blade.php ENDPATH**/ ?>