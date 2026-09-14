<div x-data="{
    deleteModalOpen: false,
    imageModalOpen: false,
    activeTab: 'description',

    mainImage: '<?php echo e($product->image ? asset('storage/' . $product->image) : ''); ?>',
    hoverImage: '<?php echo e($product->image_hover ? asset('storage/' . $product->image_hover) : ''); ?>',
    activeImage: '<?php echo e($product->image ? asset('storage/' . $product->image) : ($product->image_hover ? asset('storage/' . $product->image_hover) : '')); ?>',

    setImage(type) {
        if (type === 'main' && this.mainImage) {
            this.activeImage = this.mainImage;
        }

        if (type === 'hover' && this.hoverImage) {
            this.activeImage = this.hoverImage;
        }
    }
}" class="min-h-screen bg-[#F8F9FA] py-8">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- BREADCRUMB -->
        <div
            class="flex items-center justify-between bg-white px-6 py-3 rounded-2xl shadow-xs border border-gray-100 text-xs">
            <div class="flex items-center gap-2 text-gray-500 font-medium">
                <a href="<?php echo e(route('products.index')); ?>" class="hover:text-black transition"
                    <?php if(request('drawer')): ?> target="_parent" <?php endif; ?>>
                    Daftar Produk
                </a>
                <span>/</span>
                <span class="text-gray-900 font-bold uppercase tracking-wider">
                    <?php echo e($product->category ?? 'Katalog'); ?>

                </span>
                <span>/</span>
                <span class="text-gray-400 truncate max-w-xs">
                    <?php echo e($product->name); ?>

                </span>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-xs border border-gray-100 overflow-hidden">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-0 lg:divide-x divide-gray-100">

                <!-- FOTO -->
                <div class="lg:col-span-5 p-6 lg:p-8 space-y-4 lg:sticky lg:top-8 lg:self-start">

                    <div class="space-y-3">

                        <div class="w-full h-[380px] sm:h-[420px] rounded-2xl overflow-hidden bg-gray-50 border border-gray-100 relative group cursor-pointer shadow-inner"
                            @click="imageModalOpen = true">

                            <?php if($product->image || $product->image_hover): ?>

                                <img :src="activeImage" alt="<?php echo e($product->name); ?>"
                                    class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105">

                                <?php if($product->is_best_seller): ?>
                                    <div class="absolute top-4 left-4 z-10">
                                        <span
                                            class="bg-[#D4AF37] text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-lg shadow-md flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                            </svg>
                                            Best Seller
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <div
                                    class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                                    <span
                                        class="bg-white/90 backdrop-blur-xs text-black px-4 py-2 rounded-xl text-xs font-bold shadow-lg">
                                        Perbesar Foto
                                    </span>
                                </div>
                            <?php else: ?>
                                <div
                                    class="w-full h-full flex flex-col items-center justify-center text-gray-400 p-6 text-center">
                                    <svg class="w-12 h-12 mb-2 text-gray-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>

                                    <span class="text-xs font-bold tracking-wider">
                                        TIDAK ADA FOTO PRODUK
                                    </span>
                                </div>

                            <?php endif; ?>
                        </div>

                        <!-- LIGHTBOX -->
                        <?php if($product->image || $product->image_hover): ?>

                            <div x-show="imageModalOpen"
                                class="fixed inset-0 z-[9999] bg-black/90 backdrop-blur-sm flex items-center justify-center p-4"
                                style="display: none;" x-transition.opacity>

                                <div @click.away="imageModalOpen = false"
                                    class="relative max-w-5xl w-full max-h-[90vh] flex flex-col items-center">

                                    <button @click="imageModalOpen = false"
                                        class="absolute -top-12 right-0 z-[10000] text-white hover:text-amber-400 text-xs font-bold uppercase tracking-widest px-4 py-2 bg-white/10 hover:bg-white/20 rounded-xl transition">
                                        Tutup [X]
                                    </button>

                                    <div class="w-full flex justify-center">
                                        <img :src="activeImage"
                                            class="max-h-[70vh] w-auto max-w-full rounded-2xl shadow-2xl object-contain border border-white/10"
                                            alt="<?php echo e($product->name); ?>">
                                    </div>

                                    <p class="text-white text-xs font-bold tracking-wider mt-4 uppercase">
                                        <?php echo e($product->name); ?>

                                    </p>

                                    <div class="flex items-center gap-3 mt-5">

                                        <?php if($product->image): ?>
                                            <button @click="setImage('main')"
                                                class="px-5 py-2.5 rounded-xl text-xs font-bold transition-all border"
                                                :class="activeImage === mainImage ?
                                                    'bg-white text-black border-white shadow-lg' :
                                                    'bg-white/10 text-white border-white/20 hover:bg-white/20'">
                                                Gambar Utama
                                            </button>
                                        <?php endif; ?>

                                        <?php if($product->image_hover): ?>
                                            <button @click="setImage('hover')"
                                                class="px-5 py-2.5 rounded-xl text-xs font-bold transition-all border"
                                                :class="activeImage === hoverImage ?
                                                    'bg-white text-black border-white shadow-lg' :
                                                    'bg-white/10 text-white border-white/20 hover:bg-white/20'">
                                                Gambar Hover
                                            </button>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>
                    </div>

                    <!-- SHARE -->
                    <div
                        class="p-4 rounded-2xl bg-gray-50 border border-gray-100 flex items-center justify-between text-xs text-gray-500">
                        <span class="font-medium">
                            Bagikan produk ini ke kolega?
                        </span>

                        <button
                            onclick="navigator.clipboard.writeText(window.location.href); alert('Link produk disalin!');"
                            class="p-2 bg-white rounded-xl border border-gray-200 hover:bg-gray-100 transition font-bold text-gray-700 flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                            </svg>
                            Salin Link
                        </button>
                    </div>

                    <!-- ACTION -->
                    <div class="flex items-center gap-3 pt-2">

                        <a href="<?php echo e(route('products.edit', ['product' => $product->id, 'drawer' => request('drawer')])); ?>"
                            class="flex-1 py-3 bg-black hover:bg-gray-800 text-white text-center rounded-xl text-xs font-bold tracking-wider uppercase transition-all shadow-sm flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Produk
                        </a>

                        <button @click="deleteModalOpen = true" type="button"
                            class="py-3 px-4 bg-red-50 hover:bg-red-600 hover:text-white text-red-600 rounded-xl text-xs font-bold tracking-wider uppercase transition-all flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>

                    </div>
                </div>

                <!-- DETAIL -->
                <div class="lg:col-span-7 p-6 lg:p-8 space-y-6">

                    <!-- HEADER -->
                    <div class="space-y-2">

                        <div class="flex flex-wrap items-center gap-2">

                            <?php if($product->category): ?>
                                <span
                                    class="px-3 py-1 rounded-md text-[10px] font-black bg-emerald-50 text-emerald-700 border border-emerald-200 uppercase tracking-widest">
                                    <?php echo e($product->category); ?>

                                </span>
                            <?php endif; ?>

                            <?php if($product->variant): ?>
                                <span
                                    class="px-3 py-1 rounded-md text-[10px] font-black bg-blue-50 text-blue-700 border border-blue-200 uppercase tracking-widest">
                                    <?php echo e($product->variant); ?>

                                </span>
                            <?php endif; ?>

                            <?php if($product->gender): ?>
                                <span
                                    class="px-3 py-1 rounded-md text-[10px] font-black bg-purple-50 text-purple-700 border border-purple-200 uppercase tracking-widest">
                                    <?php echo e($product->gender); ?>

                                </span>
                            <?php endif; ?>

                            <?php if($product->volume): ?>
                                <span
                                    class="px-3 py-1 rounded-md text-[10px] font-black bg-amber-50 text-amber-700 border border-amber-200 uppercase tracking-widest">
                                    <?php echo e($product->volume); ?> ml
                                </span>
                            <?php endif; ?>

                        </div>

                        <h1 class="text-2xl sm:text-3xl font-black text-gray-900 tracking-tight">
                            <?php echo e($product->name); ?>

                        </h1>

                    </div>

                    <!-- PRICE -->
                    <div class="p-5 rounded-2xl bg-[#FAFAFA] border border-gray-100 space-y-2">
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">
                            Harga Katalog Toko
                        </span>

                        <div class="flex items-baseline gap-3">
                            <span class="text-3xl sm:text-4xl font-black text-emerald-600 tracking-tight">
                                Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?>

                            </span>

                            <span class="text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded font-bold">
                                Harga Resmi Sistem
                            </span>
                        </div>
                    </div>

                    <!-- STOCK + VOLUME + PACKAGING -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div class="p-4 rounded-xl border border-gray-100 bg-white space-y-1 shadow-2xs">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                Stok Gudang
                            </span>

                            <div class="flex items-center gap-2">
                                <span
                                    class="w-2.5 h-2.5 rounded-full <?php echo e($product->stock < 10 ? 'bg-red-500 animate-pulse' : 'bg-emerald-500'); ?>"></span>

                                <span
                                    class="font-extrabold text-sm <?php echo e($product->stock < 10 ? 'text-red-600' : 'text-gray-900'); ?>">
                                    <?php echo e($product->stock ?? 0); ?> Unit Tersedia
                                </span>
                            </div>
                        </div>

                        <div class="p-4 rounded-xl border border-gray-100 bg-white space-y-1 shadow-2xs">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                Volume
                            </span>

                            <span class="font-extrabold text-sm text-gray-900 block">
                                <?php echo e($product->volume ? $product->volume . ' ml' : '-'); ?>

                            </span>
                        </div>

                        <div class="sm:col-span-2 p-4 rounded-xl border border-gray-100 bg-white space-y-1 shadow-2xs">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                Packaging
                            </span>

                            <p class="font-semibold text-sm text-gray-900 whitespace-pre-line">
                                <?php echo e($product->packaging ?? '-'); ?>

                            </p>
                        </div>

                    </div>

                    <hr class="border-gray-100">

                    <!-- TABS -->
                    <div class="space-y-5">

                        <div class="flex items-center gap-6 border-b border-gray-100 overflow-x-auto">

                            <button @click="activeTab = 'description'"
                                :class="activeTab === 'description'
                                    ?
                                    'border-black text-black font-black' :
                                    'border-transparent text-gray-400 font-semibold'"
                                class="pb-3 text-xs uppercase tracking-wider border-b-2 transition-all whitespace-nowrap">
                                Detail & Deskripsi
                            </button>

                            <button @click="activeTab = 'notes'"
                                :class="activeTab === 'notes'
                                    ?
                                    'border-black text-black font-black' :
                                    'border-transparent text-gray-400 font-semibold'"
                                class="pb-3 text-xs uppercase tracking-wider border-b-2 transition-all whitespace-nowrap">
                                Notes Aroma
                            </button>

                            <button @click="activeTab = 'specs'"
                                :class="activeTab === 'specs'
                                    ?
                                    'border-black text-black font-black' :
                                    'border-transparent text-gray-400 font-semibold'"
                                class="pb-3 text-xs uppercase tracking-wider border-b-2 transition-all whitespace-nowrap">
                                Spesifikasi Sistem
                            </button>

                        </div>

                        <!-- DESCRIPTION -->
                        <div x-show="activeTab === 'description'"
                            class="text-xs text-gray-600 leading-relaxed space-y-5 min-h-[180px]">

                            <div>
                                <h4 class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">
                                    Deskripsi Produk
                                </h4>

                                <p class="whitespace-pre-line">
                                    <?php echo e($product->description ?? 'Belum ada deskripsi produk.'); ?>

                                </p>
                            </div>

                            <div>
                                <h4 class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">
                                    Komposisi
                                </h4>

                                <p class="whitespace-pre-line">
                                    <?php echo e($product->composition ?? 'Belum ada informasi komposisi.'); ?>

                                </p>
                            </div>

                        </div>

                        <!-- NOTES -->
                        <div x-show="activeTab === 'notes'" class="space-y-4 min-h-[180px]">

                            <div class="p-4 rounded-2xl bg-blue-50/60 border border-blue-100">
                                <div class="flex items-center gap-3 mb-2">
                                    <span
                                        class="w-8 h-8 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-black text-xs">
                                        01
                                    </span>

                                    <div>
                                        <span class="text-[10px] font-black uppercase tracking-widest text-blue-500">
                                            Top Note
                                        </span>

                                        <p class="text-[10px] text-blue-400">
                                            Aroma pembuka
                                        </p>
                                    </div>
                                </div>

                                <p class="text-xs text-gray-700 whitespace-pre-line pl-11">
                                    <?php echo e($product->top_note ?? 'Belum ada informasi top note.'); ?>

                                </p>
                            </div>

                            <div class="p-4 rounded-2xl bg-purple-50/60 border border-purple-100">
                                <div class="flex items-center gap-3 mb-2">
                                    <span
                                        class="w-8 h-8 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center font-black text-xs">
                                        02
                                    </span>

                                    <div>
                                        <span class="text-[10px] font-black uppercase tracking-widest text-purple-500">
                                            Middle Note
                                        </span>

                                        <p class="text-[10px] text-purple-400">
                                            Aroma inti
                                        </p>
                                    </div>
                                </div>

                                <p class="text-xs text-gray-700 whitespace-pre-line pl-11">
                                    <?php echo e($product->middle_note ?? 'Belum ada informasi middle note.'); ?>

                                </p>
                            </div>

                            <div class="p-4 rounded-2xl bg-amber-50/60 border border-amber-100">
                                <div class="flex items-center gap-3 mb-2">
                                    <span
                                        class="w-8 h-8 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center font-black text-xs">
                                        03
                                    </span>

                                    <div>
                                        <span class="text-[10px] font-black uppercase tracking-widest text-amber-600">
                                            Bottom / Base Note
                                        </span>

                                        <p class="text-[10px] text-amber-500">
                                            Aroma akhir
                                        </p>
                                    </div>
                                </div>

                                <p class="text-xs text-gray-700 whitespace-pre-line pl-11">
                                    <?php echo e($product->base_note ?? 'Belum ada informasi base note.'); ?>

                                </p>
                            </div>

                        </div>

                        <!-- SPECS -->
                        <div x-show="activeTab === 'specs'" class="text-xs text-gray-600 space-y-2.5 min-h-[180px]">

                            <div class="flex justify-between gap-4 py-2 border-b border-gray-100">
                                <span class="text-gray-400">ID Produk</span>
                                <span class="font-bold text-gray-900">
                                    #<?php echo e($product->id); ?>

                                </span>
                            </div>

                            <div class="flex justify-between gap-4 py-2 border-b border-gray-100">
                                <span class="text-gray-400">Nama Produk</span>
                                <span class="font-bold text-gray-900 text-right">
                                    <?php echo e($product->name); ?>

                                </span>
                            </div>

                            <div class="flex justify-between gap-4 py-2 border-b border-gray-100">
                                <span class="text-gray-400">Kategori</span>
                                <span class="font-bold text-gray-900">
                                    <?php echo e($product->category ?? '-'); ?>

                                </span>
                            </div>

                            <div class="flex justify-between gap-4 py-2 border-b border-gray-100">
                                <span class="text-gray-400">Varian / Konsentrasi</span>
                                <span class="font-bold text-gray-900">
                                    <?php echo e($product->variant ?? '-'); ?>

                                </span>
                            </div>

                            <div class="flex justify-between gap-4 py-2 border-b border-gray-100">
                                <span class="text-gray-400">Gender</span>
                                <span class="font-bold text-gray-900">
                                    <?php echo e($product->gender ?? '-'); ?>

                                </span>
                            </div>

                            <div class="flex justify-between gap-4 py-2 border-b border-gray-100">
                                <span class="text-gray-400">Volume</span>
                                <span class="font-bold text-gray-900">
                                    <?php echo e($product->volume ? $product->volume . ' ml' : '-'); ?>

                                </span>
                            </div>

                            <div class="flex justify-between gap-4 py-2 border-b border-gray-100">
                                <span class="text-gray-400">Packaging</span>
                                <span class="font-bold text-gray-900 text-right max-w-[60%] whitespace-pre-line">
                                    <?php echo e($product->packaging ?? '-'); ?>

                                </span>
                            </div>

                            <div class="flex justify-between gap-4 py-2 border-b border-gray-100">
                                <span class="text-gray-400">Komposisi</span>
                                <span class="font-bold text-gray-900 text-right max-w-[60%] whitespace-pre-line">
                                    <?php echo e($product->composition ?? '-'); ?>

                                </span>
                            </div>

                            <div class="flex justify-between gap-4 py-2 border-b border-gray-100">
                                <span class="text-gray-400">Best Seller</span>

                                <span
                                    class="font-bold <?php echo e($product->is_best_seller ? 'text-[#D4AF37]' : 'text-gray-400'); ?>">
                                    <?php echo e($product->is_best_seller ? 'Ya' : 'Tidak'); ?>

                                </span>
                            </div>

                            <div class="flex justify-between gap-4 py-2 border-b border-gray-100">
                                <span class="text-gray-400">Terakhir Diperbarui</span>
                                <span class="font-bold text-gray-900">
                                    <?php echo e($product->updated_at->diffForHumans()); ?>

                                </span>
                            </div>

                            <div class="flex justify-between gap-4 py-2">
                                <span class="text-gray-400">Waktu Ditambahkan</span>
                                <span class="font-bold text-gray-900">
                                    <?php echo e($product->created_at->format('d M Y, H:i')); ?>

                                </span>
                            </div>

                        </div>

                    </div>

                    <!-- GUARANTEE -->
                    <div class="p-4 rounded-2xl bg-blue-50/50 border border-blue-100/60 flex items-start gap-3">
                        <span class="text-lg">🛡️</span>

                        <div class="text-xs space-y-0.5">
                            <strong class="text-blue-900 font-bold block">
                                Jaminan Produk Berkualitas
                            </strong>

                            <p class="text-blue-700/80">
                                Semua data produk di dalam database sistem telah diverifikasi
                                dan siap untuk dipublikasikan ke etalase publik.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- DELETE MODAL -->
    <div x-show="deleteModalOpen"
        class="fixed inset-0 z-[9999] overflow-y-auto bg-black/60 backdrop-blur-2xs flex items-center justify-center p-4"
        style="display: none;" x-transition.opacity>

        <div @click.away="deleteModalOpen = false"
            class="bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-gray-100 text-center space-y-4"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100">

            <div
                class="w-14 h-14 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center mx-auto border border-red-100 font-black text-xl">
                !
            </div>

            <div>
                <h3 class="text-base font-black text-gray-900">
                    Konfirmasi Hapus Produk
                </h3>

                <p class="text-xs text-gray-500 mt-1">
                    Yakin ingin menghapus
                    <span class="font-bold text-gray-800">
                        <?php echo e($product->name); ?>

                    </span>
                    dari sistem database?
                </p>
            </div>

            <div class="flex items-center gap-2 pt-2">

                <button @click="deleteModalOpen = false" type="button"
                    class="flex-1 py-2.5 rounded-xl border border-gray-200 text-xs font-bold text-gray-700 hover:bg-gray-100 transition">
                    Batal
                </button>

                <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" class="flex-1"
                    <?php if(request('drawer')): ?> target="_parent" <?php endif; ?>>

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit"
                        class="w-full py-2.5 rounded-xl bg-red-600 text-white text-xs font-bold hover:bg-red-700 transition shadow-md shadow-red-600/20">
                        Ya, Hapus
                    </button>

                </form>

            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\Users\USER\Perfu.me\resources\views/products/detail-content.blade.php ENDPATH**/ ?>