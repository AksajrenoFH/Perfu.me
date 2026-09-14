

<div class="min-h-screen w-full bg-white relative">
    
    <div
        class="absolute inset-0 z-0"
        style="
            background-image:
                linear-gradient(to right, #f0f0f0 1px, transparent 1px),
                linear-gradient(to bottom, #f0f0f0 1px, transparent 1px),
                radial-gradient(circle 800px at 100% 200px, #d5c5ff, transparent);
            background-size: 96px 64px, 96px 64px, 100% 100%;
        "
    ></div>

    
    <div class="relative z-10">
        <?php echo e($slot ?? ''); ?>

    </div>
</div>
<?php /**PATH C:\Users\Faiz\Perfu.me\resources\views\components\ui\gradient-blur-bg.blade.php ENDPATH**/ ?>