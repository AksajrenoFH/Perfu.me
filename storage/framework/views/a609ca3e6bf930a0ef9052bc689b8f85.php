<?php if(!request('drawer')): ?><?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php endif; ?>
<div class="min-h-screen bg-[#F8F9FA] p-6"><div class="max-w-3xl mx-auto space-y-5"><div class="bg-white rounded-3xl border border-gray-100 p-7"><p class="text-[10px] font-black tracking-[.2em] text-[#D4AF37]">DETAIL BRAND</p><div class="flex gap-5 mt-5 items-center"><?php if($brand->logo): ?><img src="<?php echo e(asset('storage/'.$brand->logo)); ?>" class="w-20 h-20 rounded-2xl object-cover"><?php endif; ?><div><h1 class="text-2xl font-black"><?php echo e($brand->name); ?></h1><p class="text-xs text-gray-400 mt-1">/<?php echo e($brand->slug); ?></p></div></div><div class="mt-7 border-t pt-5 text-sm text-gray-600 whitespace-pre-line"><?php echo e($brand->description ?: 'Belum ada deskripsi brand.'); ?></div></div><a href="<?php echo e(route('brands.edit', ['brand'=>$brand, 'drawer'=>request('drawer')])); ?>" class="inline-block bg-black text-white px-5 py-3 rounded-xl text-xs font-bold">Edit Brand</a></div></div>
<?php if(!request('drawer')): ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php endif; ?>
<?php /**PATH C:\Users\Faiz\Perfu.me\resources\views\brands\show.blade.php ENDPATH**/ ?>