<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><div class="py-10 max-w-4xl mx-auto px-4"><div class="flex justify-between items-center mb-6"><h1 class="text-2xl font-black">Edit Pesanan #<?php echo e($order->id); ?></h1><a href="<?php echo e(route('orders.index')); ?>">Kembali</a></div><form method="POST" action="<?php echo e(route('orders.update', $order)); ?>" class="bg-white border border-gray-100 rounded-2xl p-6 space-y-6"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?> <?php echo $__env->make('orders._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><button class="bg-black text-white px-6 py-3 rounded-xl font-bold text-sm">Simpan Perubahan</button></form></div> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\USER\Perfu.me\resources\views/orders/edit.blade.php ENDPATH**/ ?>