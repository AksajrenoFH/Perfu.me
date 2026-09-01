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
            reviewerName: '', 
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
        @message.window="if($event.data === 'review-saved') { closeDrawer(); window.location.reload(); }"
        class="min-h-screen bg-[#F8F9FA] py-8">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-100 shadow-xs">
                <div class="flex items-center gap-4">
                    <div class="h-12 w-12 rounded-2xl bg-black flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#D4AF37]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-gray-900 tracking-tight">Manajemen Ulasan Produk</h1>
                        <p class="text-xs text-gray-500 mt-1">Kelola seluruh ulasan dan rating produk dari pelanggan setia Perfu.me.</p>
                    </div>
                </div>
                
                <button type="button" @click="openDrawer('<?php echo e(route('reviews.create', ['drawer' => 1])); ?>', 'Tambah Ulasan Baru')"
                    class="inline-flex items-center justify-center gap-2 bg-black hover:bg-gray-800 transition-colors text-white px-5 py-3 rounded-2xl text-xs font-bold shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#D4AF37]" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Ulasan Baru
                </button>
            </div>

            
            <div class="bg-white p-4 rounded-3xl shadow-xs border border-gray-100">
                <form action="<?php echo e(route('reviews.index')); ?>" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <div class="md:col-span-4">
                        <label for="review-rating" class="block mb-2 text-[11px] font-black uppercase tracking-wider text-gray-400">Filter Rating</label>
                        <select id="review-rating" name="rating" class="w-full rounded-2xl border-gray-200 bg-gray-50/80 py-2.5 text-xs font-semibold focus:border-[#D4AF37] focus:ring-[#D4AF37]/20">
                            <option value="">Semua Rating</option>
                            <option value="5" <?php if(request('rating') === '5'): echo 'selected'; endif; ?>>⭐⭐⭐⭐⭐ (5 Bintang)</option>
                            <option value="4" <?php if(request('rating') === '4'): echo 'selected'; endif; ?>>⭐⭐⭐⭐ (4 Bintang)</option>
                            <option value="3" <?php if(request('rating') === '3'): echo 'selected'; endif; ?>>⭐⭐⭐ (3 Bintang)</option>
                            <option value="2" <?php if(request('rating') === '2'): echo 'selected'; endif; ?>>⭐⭐ (2 Bintang)</option>
                            <option value="1" <?php if(request('rating') === '1'): echo 'selected'; endif; ?>>⭐ (1 Bintang)</option>
                        </select>
                    </div>
                    <div class="md:col-span-5">
                        <label for="review-search" class="block mb-2 text-[11px] font-black uppercase tracking-wider text-gray-400">Cari Ulasan</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                            <input id="review-search" type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari nama reviewer, komentar, atau produk..."
                                class="w-full pl-10 rounded-2xl border-gray-200 bg-gray-50/80 py-2.5 text-xs font-medium focus:border-[#D4AF37] focus:ring-[#D4AF37]/20">
                        </div>
                    </div>
                    <div class="md:col-span-3 flex gap-2">
                        <button type="submit" class="flex-1 bg-black py-2.5 rounded-2xl text-xs font-bold text-white hover:bg-[#D4AF37] transition">Terapkan</button>
                        <?php if(request('rating') || request('search')): ?>
                            <a href="<?php echo e(route('reviews.index')); ?>" class="px-4 py-2.5 rounded-2xl bg-gray-100 text-xs font-bold text-gray-600 hover:bg-gray-200 transition text-center flex items-center justify-center">Reset</a>
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
                                <th class="py-4 px-6 text-center w-16">No</th>
                                <th class="py-4 px-6">Produk Terkait</th>
                                <th class="py-4 px-6">Nama Reviewer</th>
                                <th class="py-4 px-6 text-center">Skor Rating</th>
                                <th class="py-4 px-6">Komentar Ulasan</th>
                                <th class="py-4 px-6 text-right">Aksi Pilihan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700">
                            <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gray-50/70 transition-colors">
                                    <td class="py-4 px-6 text-center font-bold text-gray-400"><?php echo e($reviews->firstItem() + $index); ?></td>
                                    
                                    <td class="py-4 px-6">
                                        <div class="font-bold text-gray-900 text-sm tracking-tight"><?php echo e($review->product->name ?? 'Produk Telah Dihapus'); ?></div>
                                        <?php if(isset($review->product) && $review->product->category): ?>
                                            <div class="text-[11px] text-gray-400"><?php echo e($review->product->category); ?></div>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <td class="py-4 px-6">
                                        <div class="font-bold text-gray-900 text-sm"><?php echo e($review->user_name); ?></div>
                                    </td>

                                    <td class="py-4 px-6 text-center whitespace-nowrap">
                                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-black bg-[#D4AF37]/10 text-[#D4AF37] border border-[#D4AF37]/20">
                                            ★ <?php echo e($review->rating); ?> / 5
                                        </span>
                                    </td>

                                    <td class="py-4 px-6 max-w-xs text-xs text-gray-600">
                                        <div class="truncate" title="<?php echo e($review->comment); ?>"><?php echo e($review->comment); ?></div>
                                    </td>
                                    
                                    <td class="py-4 px-6 text-right">
                                        <div class="flex justify-end items-center gap-3">
                                            <button type="button" @click="openDrawer('<?php echo e(route('reviews.show', ['review' => $review, 'drawer' => 1])); ?>', 'Detail Ulasan')"
                                                title="Detail" class="text-gray-400 hover:text-gray-700 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </button>
                                            <button type="button" @click="openDrawer('<?php echo e(route('reviews.edit', ['review' => $review, 'drawer' => 1])); ?>', 'Edit Ulasan')"
                                                title="Edit" class="text-[#b58d17] hover:text-[#8f6e12] transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                                                </svg>
                                            </button>
                                            <button type="button" @click="deleteModalOpen = true; deleteUrl = '<?php echo e(route('reviews.destroy', $review->id)); ?>'; reviewerName = '<?php echo e($review->user_name); ?>'"
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
                                    <td colspan="6" class="py-16 text-center text-gray-400">
                                        <div class="flex flex-col items-center justify-center space-y-2">
                                            <svg class="w-10 h-10 text-gray-300 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                                            <p class="text-sm font-bold text-gray-700">Belum ada data ulasan produk tersedia.</p>
                                            <p class="text-xs text-gray-400">Ulasan dari pelanggan akan muncul di halaman ini.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
                <?php if($reviews->hasPages()): ?>
                    <div class="p-4 bg-gray-50/50 border-t border-gray-100">
                        <?php echo e($reviews->links()); ?> 
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- SIDE DRAWER: tambah, detail, dan edit ulasan -->
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
                        <p class="text-[10px] font-black tracking-[0.2em] text-[#D4AF37]">MANAJEMEN ULASAN</p>
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
                    
                    <iframe :src="drawerUrl" @load="iframeLoading = false" class="h-full w-full border-0 absolute inset-0 z-10" title="Panel ulasan"></iframe>
                </div>
            </section>
        </div>

        <!-- MODAL POP-UP HAPUS ULASAN -->
        <div x-show="deleteModalOpen" class="fixed inset-0 z-[60] overflow-y-auto bg-black/60 backdrop-blur-sm flex items-center justify-center p-4" style="display: none;" x-transition.opacity>
            <div @click.away="deleteModalOpen = false" class="bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-gray-100 text-center space-y-4" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                <div class="w-14 h-14 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center mx-auto border border-red-100">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                </div>
                <div>
                    <h3 class="text-base font-black text-gray-900">Konfirmasi Hapus Ulasan</h3>
                    <p class="text-xs text-gray-500 mt-1">Yakin ingin menghapus ulasan dari <span class="font-bold text-gray-800" x-text="reviewerName"></span>? Data yang dihapus tidak bisa dikembalikan.</p>
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
<?php endif; ?>
<?php /**PATH C:\Users\Faiz\Perfu.me\resources\views\reviews\index.blade.php ENDPATH**/ ?>