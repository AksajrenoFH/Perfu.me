<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
    <?php if(request('drawer')): ?>
        <input type="hidden" name="drawer" value="1">
    <?php endif; ?>
    <div>
        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Pelanggan</label>
        <input type="text" name="customer_name" value="<?php echo e(old('customer_name', $order->customer_name ?? '')); ?>" placeholder="Contoh: Faiz Aksa" class="w-full rounded-xl border-gray-200 bg-gray-50/50 text-sm focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition p-3">
    </div>
    <div>
        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nomor WhatsApp / HP</label>
        <input type="text" name="customer_phone" value="<?php echo e(old('customer_phone', $order->customer_phone ?? '')); ?>" placeholder="Contoh: 08123456789" class="w-full rounded-xl border-gray-200 bg-gray-50/50 text-sm focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition p-3">
    </div>
    <div class="md:col-span-2">
        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Alamat Pengiriman</label>
        <textarea name="customer_address" rows="3" placeholder="Alamat lengkap tujuan pengiriman..." class="w-full rounded-xl border-gray-200 bg-gray-50/50 text-sm focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition p-3"><?php echo e(old('customer_address', $order->customer_address ?? '')); ?></textarea>
    </div>
    <div class="md:col-span-2">
        <div class="flex items-center justify-between mb-2">
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Item Pesanan <span class="text-red-500">*</span></label>
            <span class="text-[11px] text-gray-400">Format: <code>Nama Produk | Qty | Harga</code></span>
        </div>
        <textarea name="items_text" rows="4" required class="w-full rounded-xl border-gray-200 bg-gray-50/50 text-sm focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition p-3 font-mono" placeholder="Empire Extrait de Parfum 100ml | 1 | 499000"><?php echo e(old('items_text', isset($order) ? collect($order->items)->map(fn ($item) => $item['name'].' | '.$item['qty'].' | '.$item['price'])->join("\n") : '')); ?></textarea>
        <p class="text-[11px] text-gray-400 mt-1">Tulis satu item per baris. Contoh: <code>Baccarat Rouge 50ml | 2 | 250000</code></p>
    </div>
    <div>
        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Total Harga (Rp) <span class="text-red-500">*</span></label>
        <input type="number" min="0" name="total_price" required value="<?php echo e(old('total_price', $order->total_price ?? '')); ?>" placeholder="Contoh: 499000" class="w-full rounded-xl border-gray-200 bg-gray-50/50 text-sm focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition p-3 font-bold">
    </div>
    <div>
        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Status Pesanan <span class="text-red-500">*</span></label>
        <select name="status" class="w-full rounded-xl border-gray-200 bg-gray-50/50 text-sm focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition p-3 font-semibold">
            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($status); ?>" <?php if(old('status', $order->status ?? 'Menunggu konfirmasi') === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="md:col-span-2">
        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Catatan Tambahan</label>
        <textarea name="notes" rows="2" placeholder="Catatan pesanan, request packing, ongkir, dll..." class="w-full rounded-xl border-gray-200 bg-gray-50/50 text-sm focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition p-3"><?php echo e(old('notes', $order->notes ?? '')); ?></textarea>
    </div>
</div>
<?php if($errors->any()): ?>
    <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-xl text-xs font-bold text-red-600">
        <?php echo e($errors->first()); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\Users\Faiz\Perfu.me\resources\views/orders/_form.blade.php ENDPATH**/ ?>