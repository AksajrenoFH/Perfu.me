<div class="<?php echo e(request('drawer') ? 'py-6' : 'py-10'); ?> bg-[#F4F5F7] min-h-screen">
    <div class="<?php echo e(request('drawer') ? 'max-w-full' : 'max-w-3xl'); ?> mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        
        <div class="flex items-center justify-between bg-white px-6 py-4 rounded-2xl shadow-xs border border-gray-100">
            <div class="flex items-center gap-3">
                <span class="w-3 h-3 rounded-full bg-[#D4AF37] ring-4 ring-[#D4AF37]/10"></span>

                <div>
                    <span class="text-xs font-black uppercase tracking-widest text-gray-400">
                        Ubah Data Ulasan
                    </span>

                    <p class="text-[11px] text-gray-400 mt-0.5">
                        Perbarui informasi ulasan pelanggan.
                    </p>
                </div>
            </div>

            <a
                href="<?php echo e(route('reviews.index')); ?>"
                target="<?php echo e(request('drawer') ? '_parent' : '_self'); ?>"
                class="px-4 py-2 bg-gray-50 hover:bg-black hover:text-white text-gray-700 rounded-xl text-xs font-bold transition-all border border-gray-200"
            >
                Kembali
            </a>
        </div>

        
        <div class="bg-white rounded-3xl shadow-xs border border-gray-100 p-6 sm:p-8">

            <form
                action="<?php echo e(route('reviews.update', $review)); ?>"
                method="POST"
                class="space-y-6"
            >
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <?php if(request('drawer')): ?>
                    <input type="hidden" name="drawer" value="1">
                <?php endif; ?>

                
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-wider text-gray-700">
                        Pilih Produk
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="product_id"
                        required
                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:border-black focus:ring-0 text-xs font-bold bg-[#F9FAFB]"
                    >
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                value="<?php echo e($product->id); ?>"
                                <?php if(old('product_id', $review->product_id) == $product->id): echo 'selected'; endif; ?>
                            >
                                <?php echo e($product->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <?php $__errorArgs = ['product_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-[11px] font-bold">
                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-wider text-gray-700">
                        Nama Pemberi Ulasan
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="user_name"
                        value="<?php echo e(old('user_name', $review->user_name)); ?>"
                        required
                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:border-black focus:ring-0 text-xs font-bold bg-[#F9FAFB]"
                    >

                    <?php $__errorArgs = ['user_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-[11px] font-bold">
                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-wider text-gray-700">
                        Rating Bintang
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="rating"
                        required
                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:border-black focus:ring-0 text-xs font-bold bg-[#F9FAFB]"
                    >
                        <?php $__currentLoopData = [
                            5 => '★★★★★ (5/5 - Sangat Memuaskan)',
                            4 => '★★★★☆ (4/5 - Bagus)',
                            3 => '★★★☆☆ (3/5 - Cukup)',
                            2 => '★★☆☆☆ (2/5 - Kurang)',
                            1 => '★☆☆☆☆ (1/5 - Buruk)',
                        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                value="<?php echo e($value); ?>"
                                <?php if(old('rating', $review->rating) == $value): echo 'selected'; endif; ?>
                            >
                                <?php echo e($label); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-[11px] font-bold">
                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-wider text-gray-700">
                        Isi Komentar / Ulasan
                        <span class="text-red-500">*</span>
                    </label>

                    <textarea
                        name="comment"
                        rows="5"
                        required
                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:border-black focus:ring-0 text-xs font-medium bg-[#F9FAFB] resize-none"
                    ><?php echo e(old('comment', $review->comment)); ?></textarea>

                    <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-[11px] font-bold">
                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="flex flex-col sm:flex-row items-stretch gap-3 pt-5 border-t border-gray-100">

                    <button
                        type="submit"
                        class="flex-1 py-3.5 bg-black hover:bg-[#D4AF37] text-white rounded-2xl text-xs font-bold tracking-wider uppercase transition-all shadow-md"
                    >
                        Perbarui Ulasan
                    </button>

                    <a
                        href="<?php echo e(route('reviews.index')); ?>"
                        target="<?php echo e(request('drawer') ? '_parent' : '_self'); ?>"
                        class="px-6 py-3.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold tracking-wider uppercase transition-all text-center"
                    >
                        Batal
                    </a>

                </div>
            </form>

        </div>
    </div>
</div><?php /**PATH C:\Users\Faiz\Perfu.me\resources\views\reviews\form-edit.blade.php ENDPATH**/ ?>