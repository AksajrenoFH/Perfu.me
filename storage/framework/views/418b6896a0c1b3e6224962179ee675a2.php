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
    <div class="min-h-screen bg-[#F8F9FA] py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-100">
                <div><h1 class="text-2xl font-black text-gray-900">Manajemen Pesanan</h1><p class="text-xs text-gray-500 mt-1">Pesanan dari checkout WhatsApp akan muncul otomatis di sini.</p></div>
                <a href="<?php echo e(route('orders.create')); ?>" class="bg-black text-white px-5 py-3 rounded-2xl text-xs font-bold">Tambah Pesanan</a>
            </div>
            <?php if(session('success')): ?> <div class="bg-emerald-50 text-emerald-800 border border-emerald-200 p-4 rounded-2xl text-sm"><?php echo e(session('success')); ?></div> <?php endif; ?>
            <form class="flex flex-col sm:flex-row gap-3 bg-white p-4 rounded-2xl border border-gray-100">
                <input name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari nomor, nama, atau telepon" class="flex-1 rounded-xl border-gray-200 text-sm">
                <select name="status" class="rounded-xl border-gray-200 text-sm"><option value="">Semua status</option><?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($status); ?>" <?php if(request('status') === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
                <button class="bg-gray-900 text-white px-5 py-2 rounded-xl text-sm">Filter</button>
            </form>
            <div class="bg-white rounded-3xl border border-gray-100 overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm"><thead class="bg-gray-50 text-xs text-gray-500"><tr><th class="p-4">Pesanan</th><th class="p-4">Pelanggan</th><th class="p-4">Item</th><th class="p-4">Total</th><th class="p-4">Status</th><th class="p-4 text-right">Aksi</th></tr></thead><tbody class="divide-y divide-gray-100"><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><td class="p-4 font-bold">#<?php echo e($order->id); ?><div class="font-normal text-xs text-gray-400 mt-1"><?php echo e($order->created_at->format('d M Y H:i')); ?></div></td><td class="p-4"><?php echo e($order->customer_name ?: 'Belum diisi'); ?><div class="text-xs text-gray-400"><?php echo e($order->customer_phone); ?></div></td><td class="p-4 text-xs"><?php echo e(collect($order->items)->sum('qty')); ?> pcs · <?php echo e(collect($order->items)->pluck('name')->join(', ')); ?></td><td class="p-4 font-bold">Rp <?php echo e(number_format($order->total_price, 0, ',', '.')); ?></td><td class="p-4"><span class="px-3 py-1 rounded-full bg-gray-100 text-xs"><?php echo e($order->status); ?></span></td><td class="p-4"><div class="flex justify-end gap-2"><a href="<?php echo e(route('orders.show', $order)); ?>" class="text-gray-700">Detail</a><a href="<?php echo e(route('orders.edit', $order)); ?>" class="text-[#b58d17]">Edit</a><form action="<?php echo e(route('orders.destroy', $order)); ?>" method="POST" onsubmit="return confirm('Hapus pesanan ini?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="text-red-600">Hapus</button></form></div></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="6" class="p-12 text-center text-gray-400">Belum ada pesanan.</td></tr><?php endif; ?></tbody></table></div><div class="p-4"><?php echo e($orders->links()); ?></div></div>
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
<?php /**PATH C:\Users\USER\Perfu.me\resources\views/orders/index.blade.php ENDPATH**/ ?>