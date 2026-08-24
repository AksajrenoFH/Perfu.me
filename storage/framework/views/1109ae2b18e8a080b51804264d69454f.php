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
            }
        }" 
        @message.window="if($event.data === 'review-saved') { closeDrawer(); window.location.reload(); }"
        class="min-h-screen bg-[#F8F9FA] py-8">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <!-- Top Header & Action Banner -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-6 rounded-3xl shadow-xs border border-gray-100">
                <div>
                    <div class="flex items-center gap-2.5">
                        <span class="w-3 h-3 rounded-full bg-[#D4AF37]"></span>
                        <h1 class="text-2xl font-black text-gray-900 tracking-tight">Manajemen Ulasan Produk</h1>
                    </div>
                    <p class="text-xs text-gray-500 mt-1 ml-5">Kelola seluruh ulasan dan rating produk dari pelanggan setia Perfu.me.</p>
                </div>
                
                <!-- Tombol Tambah Produk -->
                <button type="button" @click="openDrawer('<?php echo e(route('reviews.create', ['drawer'=>1])); ?>', 'Tambah Ulasan Baru')"
                    class="group relative inline-flex items-center justify-center gap-2.5 bg-black hover:bg-[#D4AF37] text-white px-6 py-3 rounded-2xl font-bold text-xs uppercase tracking-wider overflow-hidden shadow-lg shadow-black/10 hover:shadow-[#D4AF37]/30 hover:-translate-y-0.5 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/15 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>
                    <svg class="w-4 h-4 text-[#D4AF37] group-hover:text-white transition-transform duration-500 group-hover:rotate-90 flex-shrink-0 relative"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4">
                        </path>
                    </svg>
                    <span class="relative">Tambah Ulasan Baru</span>
                </button>
            </div>

            <!-- Alert Success -->
            <?php if(session('success')): ?>
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" class="bg-emerald-50 border border-emerald-200 p-4 rounded-2xl flex items-center justify-between text-emerald-800 shadow-xs" role="alert">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center font-bold">✓</div>
                        <p class="text-xs font-bold"><?php echo e(session('success')); ?></p>
                    </div>
                    <button @click="show = false" class="text-emerald-600 hover:text-emerald-800 font-bold px-2">✕</button>
                </div>
            <?php endif; ?>

            <!-- Table Card Area -->
            <div class="bg-white rounded-3xl shadow-xs border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/70 border-b border-gray-100 text-[11px] font-black text-gray-400 uppercase tracking-wider">
                                <th class="py-4 px-6 text-center w-16">No</th>
                                <th class="py-4 px-6">Produk Terkait</th>
                                <th class="py-4 px-6">Nama Reviewer</th>
                                <th class="py-4 px-6">Skor Rating</th>
                                <th class="py-4 px-6">Komentar Ulasan</th>
                                <th class="py-4 px-6 text-right">Aksi Pilihan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 text-xs font-medium text-gray-600">
                            <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50/60 transition-colors group">
                                <!-- No -->
                                <td class="py-4 px-6 text-center font-bold text-gray-400 group-hover:text-black transition-colors">
                                    <?php echo e($reviews->firstItem() + $index); ?>

                                </td>
                                
                                <!-- Produk -->
                                <td class="py-4 px-6">
                                    <span class="font-bold text-gray-900 text-sm tracking-tight"><?php echo e($review->product->name ?? 'Produk Telah Dihapus'); ?></span>
                                </td>
                                
                                <!-- Nama Reviewer -->
                                <td class="py-4 px-6">
                                    <span class="font-semibold text-gray-800"><?php echo e($review->user_name); ?></span>
                                </td>

                                <!-- Rating -->
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <span class="inline-block px-3 py-1 rounded-xl text-xs font-black bg-[#D4AF37]/10 text-[#D4AF37] border border-[#D4AF37]/20">
                                        Rating <?php echo e($review->rating); ?> / 5
                                    </span>
                                </td>

                                <!-- Komentar -->
                                <td class="py-4 px-6 max-w-xs truncate text-gray-500">
                                    <?php echo e($review->comment); ?>

                                </td>
                                
                                <!-- Tombol Aksi -->
                                <td class="py-4 px-6 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button type="button" @click="openDrawer('<?php echo e(route('reviews.show', ['review'=>$review, 'drawer'=>1])); ?>', 'Detail Ulasan')" class="px-3 py-1.5 bg-gray-100 hover:bg-black hover:text-white text-gray-700 rounded-xl transition-all shadow-xs text-xs font-bold">Detail</button>
                                        <button type="button" @click="openDrawer('<?php echo e(route('reviews.edit', ['review'=>$review, 'drawer'=>1])); ?>', 'Edit Ulasan')" class="px-3 py-1.5 bg-[#D4AF37]/10 hover:bg-[#D4AF37] hover:text-white text-[#D4AF37] rounded-xl transition-all shadow-xs text-xs font-bold">Edit</button>
                                        <button @click="deleteModalOpen = true; deleteUrl = '<?php echo e(route('reviews.destroy', $review->id)); ?>'; reviewerName = '<?php echo e($review->user_name); ?>'" type="button" class="px-3 py-1.5 bg-red-50 hover:bg-red-600 hover:text-white text-red-600 rounded-xl transition-all shadow-xs text-xs font-bold">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="py-16 text-center text-gray-400">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <p class="text-sm font-bold text-gray-700">Belum ada data ulasan produk.</p>
                                        <p class="text-xs text-gray-400">Ulasan dari pelanggan akan muncul di halaman ini.</p>
                                    </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination Footer -->
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
            
            <!-- Panel Drawer -->
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
                    <!-- Loading Spinner (Tampil saat Iframe memuat) -->
                    <div x-show="iframeLoading" class="absolute inset-0 flex items-center justify-center z-20 bg-[#F8F9FA]">
                        <svg class="animate-spin h-8 w-8 text-[#D4AF37]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    
                    <!-- Iframe -->
                    <iframe :src="drawerUrl" @load="iframeLoading = false" class="h-full w-full border-0 absolute inset-0 z-10" title="Panel ulasan"></iframe>
                </div>
            </section>
        </div>

        <!-- MODAL POP-UP HAPUS -->
        <div x-show="deleteModalOpen" class="fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-xs flex items-center justify-center p-4" style="display: none;" x-transition.opacity>
            <div @click.away="deleteModalOpen = false" class="bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-gray-100 text-center space-y-4" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
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
<?php /**PATH C:\Users\USER\Perfu.me\resources\views/reviews/index.blade.php ENDPATH**/ ?>