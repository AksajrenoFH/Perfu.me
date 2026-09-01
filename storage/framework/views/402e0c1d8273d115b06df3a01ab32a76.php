<?php if(!request('drawer')): ?>
<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-extrabold text-black tracking-tight">
                        Tambah <span class="text-[#D4AF37]">Pesanan Baru</span>
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">Input data transaksi pesanan manual ke sistem toko.</p>
                </div>
                <a href="<?php echo e(route('orders.index')); ?>" class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:text-black transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali
                </a>
            </div>

            <form method="POST" action="<?php echo e(route('orders.store')); ?>" class="bg-white border border-gray-100 rounded-3xl p-6 sm:p-8 shadow-xs space-y-6">
                <?php echo csrf_field(); ?>
                <?php echo $__env->make('orders._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                    <a href="<?php echo e(route('orders.index')); ?>" class="px-5 py-2.5 rounded-xl border border-gray-200 text-xs font-bold text-gray-700 hover:bg-gray-100 transition">Batal</a>
                    <button type="submit" class="px-6 py-2.5 bg-black hover:bg-[#D4AF37] text-white rounded-xl text-xs font-bold transition shadow-md">Simpan Pesanan</button>
                </div>
            </form>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php else: ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-[#F8F9FA] p-6 antialiased">
    <form method="POST" action="<?php echo e(route('orders.store', ['drawer' => 1])); ?>" class="bg-white border border-gray-100 rounded-3xl p-6 shadow-xs space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('orders._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
            <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-black hover:bg-[#D4AF37] text-white rounded-xl text-xs font-bold transition shadow-md flex items-center justify-center gap-2">
                <svg class="w-4 h-4 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Pesanan
            </button>
        </div>
    </form>
</body>
</html>
<?php endif; ?>
<?php /**PATH C:\Users\Faiz\Perfu.me\resources\views\orders\create.blade.php ENDPATH**/ ?>