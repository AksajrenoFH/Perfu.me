

<div class="min-h-screen w-full bg-[#f8fafc] relative">
    
    <div
        class="absolute inset-0 z-0"
        style="
            background-image:
                linear-gradient(to right, #e2e8f0 1px, transparent 1px),
                linear-gradient(to bottom, #e2e8f0 1px, transparent 1px);
            background-size: 20px 30px;
            -webkit-mask-image: radial-gradient(ellipse 70% 60% at 50% 0%, #000 60%, transparent 100%);
            mask-image: radial-gradient(ellipse 70% 60% at 50% 0%, #000 60%, transparent 100%);
        "
    ></div>

    
    <div class="relative z-10">
        <?php echo e($slot ?? ''); ?>

    </div>
</div>
<?php /**PATH C:\Users\Faiz\Perfu.me\resources\views\components\ui\demo-grid-bg.blade.php ENDPATH**/ ?>