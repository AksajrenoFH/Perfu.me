<div class="min-h-screen bg-[#F8F9FA] p-6">
    <div class="max-w-3xl mx-auto space-y-5">

        <div class="bg-white rounded-3xl border border-gray-100 p-7">

            <div class="flex items-start justify-between gap-4 border-b border-gray-100 pb-5">

                <div>
                    <p class="text-[10px] font-black tracking-[.2em] text-[#D4AF37] uppercase">
                        Detail Ulasan
                    </p>

                    <h1 class="text-2xl font-black mt-3 text-gray-900">
                        <?php echo e($review->user_name); ?>

                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        <?php echo e($review->product?->name ?? 'Produk telah dihapus'); ?>

                    </p>
                </div>

                <div
                    class="px-3 py-2 rounded-xl bg-[#D4AF37]/10 border border-[#D4AF37]/20 text-xs font-black text-[#D4AF37] whitespace-nowrap">
                    <?php echo e($review->rating); ?>/5
                </div>

            </div>

            
            <div class="mt-5">
                <p class="text-[10px] font-black tracking-widest text-gray-400 uppercase mb-2">
                    Rating
                </p>

                <div class="text-[#D4AF37] text-2xl tracking-wider">
                    <?php echo e(str_repeat('★', $review->rating)); ?><?php echo e(str_repeat('☆', 5 - $review->rating)); ?>

                </div>
            </div>

            
            <div class="mt-6 pt-6 border-t border-gray-100">
                <p class="text-[10px] font-black tracking-widest text-gray-400 uppercase mb-3">
                    Komentar Pelanggan
                </p>

                <p class="text-sm text-gray-600 whitespace-pre-line leading-relaxed">
                    <?php echo e($review->comment); ?>

                </p>
            </div>

            
            <div class="mt-6 pt-5 border-t border-gray-100 flex flex-wrap gap-x-6 gap-y-2 text-[11px] text-gray-400">
                <span>
                    Dibuat:
                    <strong class="text-gray-600">
                        <?php echo e($review->created_at?->format('d M Y, H:i')); ?>

                    </strong>
                </span>

                <?php if($review->updated_at && !$review->updated_at->equalTo($review->created_at)): ?>
                    <span>
                        Diperbarui:
                        <strong class="text-gray-600">
                            <?php echo e($review->updated_at->format('d M Y, H:i')); ?>

                        </strong>
                    </span>
                <?php endif; ?>
            </div>

        </div>

        <div class="flex flex-col sm:flex-row gap-3">

            <a href="<?php echo e(route('reviews.edit', ['review' => $review, 'drawer' => request('drawer') ? 1 : null])); ?>"
                class="flex-1 bg-black hover:bg-[#D4AF37] text-white px-5 py-3.5 rounded-2xl text-xs font-bold text-center transition-all">
                Edit Ulasan
            </a>

            <a href="<?php echo e(route('reviews.index')); ?>" target="<?php echo e(request('drawer') ? '_parent' : '_self'); ?>"
                class="px-6 py-3.5 bg-white hover:bg-gray-100 border border-gray-200 text-gray-700 rounded-2xl text-xs font-bold text-center transition-all">
                Kembali
            </a>

        </div>

    </div>
</div>
<?php /**PATH C:\Users\Faiz\Perfu.me\resources\views\reviews\detail-content.blade.php ENDPATH**/ ?>