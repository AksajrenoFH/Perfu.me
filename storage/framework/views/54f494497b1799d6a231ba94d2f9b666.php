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
    <div x-data="{ 
            deleteModalOpen: false, 
            deleteUrl: '', 
            productName: '', 
            drawerOpen: false, 
            drawerUrl: '', 
            drawerTitle: '',
            iframeLoading: false,
            openDrawer(url, title) { 
                this.iframeLoading = true;
                this.drawerUrl = url; 
                this.drawerTitle = title; 
                this.drawerOpen = true; 
            },
            closeDrawer() {
                this.drawerOpen = false;
                setTimeout(() => { this.drawerUrl = ''; }, 300);
                this.iframeLoading = false;
            }
        }" 
        @message.window="if($event.data === 'product-saved') { closeDrawer(); window.location.reload(); }"
        class="min-h-screen bg-[#F8F9FA] py-8">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-100 shadow-xs">
                <div class="flex items-center gap-4">
                    <div class="h-12 w-12 rounded-2xl bg-black flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#D4AF37]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-gray-900 tracking-tight">Manajemen Katalog Produk</h1>
                        <p class="text-xs text-gray-500 mt-1">Kelola seluruh stok, harga, dan varian aroma parfum Perfu.me dengan mudah.</p>
                    </div>
                </div>

                <button type="button" @click="openDrawer('<?php echo e(route('products.create', ['drawer' => 1])); ?>', 'Tambah Produk Baru')"
                    class="inline-flex items-center justify-center gap-2 bg-black hover:bg-gray-800 transition-colors text-white px-5 py-3 rounded-2xl text-xs font-bold shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#D4AF37]" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Produk Baru
                </button>
            </div>

            
            <div class="bg-white p-4 rounded-3xl shadow-xs border border-gray-100">
                <form action="<?php echo e(route('products.index')); ?>" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <div class="md:col-span-4">
                        <label for="product-type" class="block mb-2 text-[11px] font-black uppercase tracking-wider text-gray-400">Kategori Produk</label>
                        <select id="product-type" name="type" class="w-full rounded-2xl border-gray-200 bg-gray-50/80 py-2.5 text-xs font-semibold focus:border-[#D4AF37] focus:ring-[#D4AF37]/20">
                            <option value="">Semua Produk</option>
                            <option value="Original" <?php if(request('type') === 'Original'): echo 'selected'; endif; ?>>Produk Original</option>
                            <option value="Refill" <?php if(request('type') === 'Refill'): echo 'selected'; endif; ?>>Parfum Refill</option>
                        </select>
                    </div>
                    <div class="md:col-span-5">
                        <label for="product-search" class="block mb-2 text-[11px] font-black uppercase tracking-wider text-gray-400">Cari Produk</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                            <input id="product-search" type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari nama parfum..."
                                class="w-full pl-10 rounded-2xl border-gray-200 bg-gray-50/80 py-2.5 text-xs font-medium focus:border-[#D4AF37] focus:ring-[#D4AF37]/20">
                        </div>
                    </div>
                    <div class="md:col-span-3 flex gap-2">
                        <button type="submit" class="flex-1 bg-black py-2.5 rounded-2xl text-xs font-bold text-white hover:bg-[#D4AF37] transition">Terapkan</button>
                        <?php if(request('type') || request('search')): ?>
                            <a href="<?php echo e(route('products.index')); ?>" class="px-4 py-2.5 rounded-2xl bg-gray-100 text-xs font-bold text-gray-600 hover:bg-gray-200 transition text-center flex items-center justify-center">Reset</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            
            <?php if(session('success')): ?>
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                    class="flex items-center justify-between gap-3 bg-emerald-50 text-emerald-800 border border-emerald-200 p-4 rounded-2xl text-sm shadow-xs" role="alert">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center font-bold">✓</div>
                        <p class="text-xs font-bold"><?php echo e(session('success')); ?></p>
                    </div>
                    <button @click="show = false" class="text-emerald-600 hover:text-emerald-800 font-bold px-2">✕</button>
                </div>
            <?php endif; ?>

            
            <div class="bg-white rounded-3xl border border-gray-100 shadow-xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50/80 text-[11px] uppercase tracking-wider text-gray-400 font-extrabold border-b border-gray-100">
                            <tr>
                                <th class="py-4 px-6 text-center w-14">No</th>
                                <th class="py-4 px-6">Informasi Produk</th>
                                <th class="py-4 px-6">Tipe & Varian</th>
                                <th class="py-4 px-6">Harga Jual</th>
                                <th class="py-4 px-6 text-center">Stok</th>
                                <th class="py-4 px-6 text-center">Status</th>
                                <th class="py-4 px-6 text-right">Aksi Pilihan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700">
                            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gray-50/70 transition-colors">
                                    <td class="py-4 px-6 text-center font-bold text-gray-400"><?php echo e($products->firstItem() + $index); ?></td>

                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-3">
                                            <div class="h-12 w-12 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200/60 flex-shrink-0">
                                                <?php if($product->image): ?>
                                                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-full object-cover">
                                                <?php else: ?>
                                                    <div class="w-full h-full flex items-center justify-center text-[10px] text-gray-400 font-bold">No Pic</div>
                                                <?php endif; ?>
                                            </div>
                                            <div>
                                                <div class="font-bold text-gray-900 text-sm"><?php echo e($product->name); ?></div>
                                                <div class="text-xs text-gray-400 mt-0.5">Gender: <span class="text-gray-600 font-medium"><?php echo e($product->gender ?: 'Universal'); ?></span></div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="py-4 px-6 text-xs">
                                        <div class="flex flex-col items-start gap-1.5">
                                            <?php if($product->category == 'Original'): ?>
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#b58d17]/10 text-[#b58d17] border border-[#b58d17]/20">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                                    Original Signature
                                                </span>
                                            <?php elseif($product->category == 'Refill'): ?>
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-gray-900 text-white">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                                    Parfum Refill
                                                </span>
                                            <?php else: ?>
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600"><?php echo e($product->category ?: '-'); ?></span>
                                            <?php endif; ?>
                                            <span class="text-gray-400 font-medium"><?php echo e($product->variant ?: '-'); ?></span>
                                        </div>
                                    </td>

                                    <td class="py-4 px-6 font-black text-gray-900 text-sm whitespace-nowrap">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></td>

                                    <td class="py-4 px-6 text-center">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold <?php echo e($product->stock < 10 ? 'bg-red-50 text-red-700 border border-red-200' : 'bg-emerald-50 text-emerald-700 border border-emerald-200'); ?>">
                                            <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                            <?php echo e($product->stock); ?> pcs
                                        </span>
                                    </td>

                                    <td class="py-4 px-6 text-center">
                                        <?php if($product->is_best_seller): ?>
                                            <span class="inline-block bg-black text-[#D4AF37] text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-wider shadow-xs">Best Seller</span>
                                        <?php else: ?>
                                            <span class="text-gray-400 text-xs font-medium">Standard</span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="py-4 px-6 text-right">
                                        <div class="flex justify-end items-center gap-3">
                                            <button type="button" @click="openDrawer('<?php echo e(route('products.show', ['product' => $product->id, 'drawer' => 1])); ?>', 'Detail Produk')"
                                                title="Detail" class="text-gray-400 hover:text-gray-700 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </button>
                                            <button type="button" @click="openDrawer('<?php echo e(route('products.edit', ['product' => $product->id, 'drawer' => 1])); ?>', 'Edit Produk')"
                                                title="Edit" class="text-[#b58d17] hover:text-[#8f6e12] transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                                                </svg>
                                            </button>
                                            <button type="button" @click="deleteModalOpen = true; deleteUrl = '<?php echo e(route('products.destroy', $product->id)); ?>'; productName = '<?php echo e($product->name); ?>'"
                                                title="Hapus" class="text-red-500 hover:text-red-700 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397M5.878 5.79c.34-.059.68-.114 1.022-.166m6.892 0a48.667 48.667 0 0 0-6.892 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="py-16 text-center text-gray-400">
                                        <div class="flex flex-col items-center justify-center space-y-2">
                                            <svg class="w-10 h-10 text-gray-300 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                            <p class="text-sm font-bold text-gray-700">Belum ada data produk tersedia.</p>
                                            <p class="text-xs text-gray-400">Silakan tambahkan produk baru melalui tombol di atas.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if($products->hasPages()): ?>
                    <div class="p-4 bg-gray-50/50 border-t border-gray-100">
                        <?php echo e($products->links()); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- SIDE DRAWER: tambah, detail, dan edit produk -->
        <div x-show="drawerOpen" x-cloak class="fixed inset-0 z-50" style="display: none;">
            <!-- Backdrop -->
            <div @click="closeDrawer()" class="absolute inset-0 bg-black/40 backdrop-blur-sm" 
                 x-transition:enter="transition-opacity ease-out duration-300" 
                 x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
                 x-transition:leave="transition-opacity ease-in duration-200" 
                 x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            </div>
            
            <!-- Panel -->
            <section class="absolute inset-y-0 right-0 flex w-full max-w-xl flex-col bg-[#F8F9FA] shadow-[-20px_0_60px_rgba(0,0,0,0.2)]" 
                     x-transition:enter="transition ease-out duration-500" 
                     x-transition:enter-start="translate-x-full" 
                     x-transition:enter-end="translate-x-0" 
                     x-transition:leave="transition ease-in duration-300" 
                     x-transition:leave-start="translate-x-0" 
                     x-transition:leave-end="translate-x-full">
                
                <!-- Header Drawer -->
                <header class="flex items-center justify-between border-b border-gray-100 bg-white px-6 py-4 shrink-0 shadow-xs z-10 relative">
                    <div>
                        <p class="text-[10px] font-black tracking-[0.2em] text-[#D4AF37]">MANAJEMEN KATALOG</p>
                        <h2 class="mt-1 text-lg font-black text-gray-900" x-text="drawerTitle"></h2>
                    </div>
                    <button type="button" @click="closeDrawer()" class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-50 text-gray-500 hover:rotate-90 hover:bg-black hover:text-white transition duration-300" aria-label="Tutup panel">✕</button>
                </header>
                
                <!-- Area Iframe Content -->
                <div class="relative flex-1 bg-[#F8F9FA]">
                    <div x-show="iframeLoading" class="absolute inset-0 flex items-center justify-center z-20 bg-[#F8F9FA]">
                        <svg class="animate-spin h-8 w-8 text-[#D4AF37]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    
                    <iframe :src="drawerUrl" @load="iframeLoading = false" class="h-full w-full border-0 absolute inset-0 z-10" title="Panel produk"></iframe>
                </div>
            </section>
        </div>

        <!-- MODAL POP-UP HAPUS -->
        <div x-show="deleteModalOpen" class="fixed inset-0 z-[60] overflow-y-auto bg-black/60 backdrop-blur-sm flex items-center justify-center p-4" style="display: none;" x-transition.opacity>
            <div @click.away="deleteModalOpen = false" class="bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-gray-100 text-center space-y-4" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                <div class="w-14 h-14 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center mx-auto border border-red-100">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                </div>
                <div>
                    <h3 class="text-base font-black text-gray-900">Konfirmasi Hapus Produk</h3>
                    <p class="text-xs text-gray-500 mt-1">Yakin ingin menghapus <span class="font-bold text-gray-800" x-text="productName"></span>? Data yang dihapus tidak bisa dikembalikan.</p>
                </div>
                <div class="flex items-center gap-2 pt-2">
                    <button @click="deleteModalOpen = false" type="button" class="flex-1 py-2.5 rounded-xl border border-gray-200 text-xs font-bold text-gray-700 hover:bg-gray-100 transition">Batal</button>
                    <form :action="deleteUrl" method="POST" class="flex-1">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="w-full py-2.5 rounded-xl bg-red-600 text-white text-xs font-bold hover:bg-red-700 transition shadow-md shadow-red-600/20">Ya, Hapus</button>
                    </form>
                </div>
            </div>
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
<?php endif; ?><?php /**PATH C:\Users\Faiz\Perfu.me\resources\views\products\index.blade.php ENDPATH**/ ?>