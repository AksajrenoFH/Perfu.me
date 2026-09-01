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
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-black text-2xl text-gray-900 tracking-tight flex items-center gap-2.5">
                    <?php echo e(__('Executive Dashboard')); ?>

                    <span class="text-xs font-bold px-2.5 py-1 rounded-full bg-black text-[#D4AF37] tracking-normal">Perfu.me Admin</span>
                </h2>
                <p class="text-xs text-gray-500 mt-1">Pencatatan keuangan, monitoring pesanan real-time, dan status transaksi toko.</p>
            </div>
            <div class="flex items-center gap-2.5">
                <button type="button" @click="openDrawer('<?php echo e(route('orders.create', ['drawer' => 1])); ?>', 'Tambah Pesanan Baru')"
                    class="px-4 py-2.5 bg-black hover:bg-[#D4AF37] text-white rounded-xl text-xs font-bold transition-all shadow-sm flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4 text-[#D4AF37] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah Pesanan
                </button>
                <button onclick="window.location.reload();" class="px-3.5 py-2.5 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 rounded-xl text-xs font-bold transition-all shadow-sm flex items-center gap-1.5 cursor-pointer">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    Segarkan
                </button>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <div x-data="{ 
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
         @message.window="if ($event.data === 'order-saved' || $event.data === 'product-saved' || $event.data === 'brand-saved') { closeDrawer(); window.location.reload(); }"
         class="py-8 bg-[#F4F5F7] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- ========================================== -->
            <!-- 1. KARTU STATISTIK UTAMA (METRIK BISNIS)    -->
            <!-- ========================================== -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                
                <!-- Card 1: Pendapatan Selesai (Realized Revenue) -->
                <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex items-center justify-between group hover:border-emerald-500 transition-all">
                    <div class="space-y-1.5">
                        <span class="text-[10px] font-black uppercase tracking-widest text-gray-400">Pendapatan Selesai</span>
                        <h3 class="text-2xl sm:text-3xl font-black text-emerald-600 tracking-tight">
                            Rp <?php echo e(number_format($settledRevenue, 0, ',', '.')); ?>

                        </h3>
                        <div class="text-[11px] font-semibold text-gray-500 flex items-center gap-1">
                            <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            <span><?php echo e($completedOrdersCount); ?> pesanan lunas</span>
                        </div>
                    </div>
                    <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-100 group-hover:scale-105 transition-transform flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>

                <!-- Card 2: Pendapatan Sementara (Pending / Dalam Proses) -->
                <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex items-center justify-between group hover:border-[#D4AF37] transition-all">
                    <div class="space-y-1.5">
                        <span class="text-[10px] font-black uppercase tracking-widest text-gray-400">Pendapatan Sementara</span>
                        <h3 class="text-2xl sm:text-3xl font-black text-gray-900 tracking-tight">
                            Rp <?php echo e(number_format($pendingRevenue, 0, ',', '.')); ?>

                        </h3>
                        <div class="text-[11px] font-semibold text-amber-600 flex items-center gap-1">
                            <span class="inline-block w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                            <span><?php echo e($pendingOrdersCount + $processingOrdersCount); ?> pesanan berjalan</span>
                        </div>
                    </div>
                    <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-amber-50 text-[#D4AF37] flex items-center justify-center border border-amber-100 group-hover:scale-105 transition-transform flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>

                <!-- Card 3: Total Pesanan & Status -->
                <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex items-center justify-between group hover:border-black transition-all">
                    <div class="space-y-1.5">
                        <span class="text-[10px] font-black uppercase tracking-widest text-gray-400">Total Pesanan Masuk</span>
                        <h3 class="text-2xl sm:text-3xl font-black text-gray-900 tracking-tight">
                            <?php echo e($totalOrders); ?> <span class="text-sm font-bold text-gray-400">Order</span>
                        </h3>
                        <div>
                            <?php if($pendingOrdersCount > 0): ?>
                                <span class="inline-flex items-center gap-1 text-[10px] font-black px-2 py-0.5 rounded-md bg-amber-100 text-amber-800">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-600 animate-ping"></span>
                                    <?php echo e($pendingOrdersCount); ?> Butuh Konfirmasi
                                </span>
                            <?php else: ?>
                                <span class="text-[11px] font-bold text-emerald-600 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Semua Terproses
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-black text-[#D4AF37] flex items-center justify-center shadow-md group-hover:scale-105 transition-transform flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    </div>
                </div>

                <!-- Card 4: Katalog & Stok Gudang -->
                <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex items-center justify-between group hover:border-purple-500 transition-all">
                    <div class="space-y-1.5">
                        <span class="text-[10px] font-black uppercase tracking-widest text-gray-400">Katalog & Stok Gudang</span>
                        <h3 class="text-2xl sm:text-3xl font-black text-gray-900 tracking-tight">
                            <?php echo e($totalProducts); ?> <span class="text-sm font-bold text-gray-400">Produk</span>
                        </h3>
                        <span class="text-[11px] font-bold text-purple-600 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                            <?php echo e($totalStock); ?> Pcs total stok
                        </span>
                    </div>
                    <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center border border-purple-100 group-hover:scale-105 transition-transform flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                </div>

            </div>

            <!-- ========================================== -->
            <!-- 2. ANALISIS KEUANGAN & GRAFIK TREN OMSET    -->
            <!-- ========================================== -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                
                <!-- Grafik Tren Omset & Pesanan -->
                <div class="lg:col-span-8 bg-white p-6 sm:p-7 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <div>
                            <h3 class="font-black text-base text-gray-900 flex items-center gap-2">
                                Tren Pendapatan & Penjualan
                                <span class="px-2 py-0.5 bg-emerald-50 text-emerald-700 text-[10px] font-extrabold rounded-md border border-emerald-200">7 Hari Terakhir</span>
                            </h3>
                            <p class="text-xs text-gray-400 mt-0.5">Monitoring pergerakan omset harian dan volume pesanan masuk</p>
                        </div>
                        <div class="flex items-center gap-3 text-xs font-bold text-gray-500">
                            <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-md bg-[#D4AF37]"></span> Pendapatan (Rp)</span>
                            <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-md bg-black"></span> Pesanan</span>
                        </div>
                    </div>
                    <div class="relative h-[280px] w-full pt-2">
                        <canvas id="revenueTrendChart"></canvas>
                    </div>
                </div>

                <!-- Widget Rincian Finansial Toko -->
                <div class="lg:col-span-4 bg-white p-6 sm:p-7 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex flex-col justify-between space-y-5">
                    <div>
                        <div class="flex items-center justify-between">
                            <h3 class="font-black text-base text-gray-900">Rincian Finansial</h3>
                            <span class="text-[10px] font-black uppercase tracking-wider text-gray-400 bg-gray-50 px-2.5 py-1 rounded-lg border border-gray-100">Ringkasan</span>
                        </div>
                        <p class="text-xs text-gray-400 mt-0.5">Pencatatan arus kas pesanan toko</p>
                    </div>

                    <div class="space-y-3.5">
                        <!-- Total Potensi Omset -->
                        <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100 space-y-1">
                            <div class="text-[11px] font-bold text-gray-500 uppercase tracking-wider">Total Potensi Omset</div>
                            <div class="text-xl font-black text-gray-900">Rp <?php echo e(number_format($grossRevenue, 0, ',', '.')); ?></div>
                            <div class="text-[10px] text-gray-400">Total seluruh pesanan aktif (non-batal)</div>
                        </div>

                        <!-- Progress Realisasi Pendapatan -->
                        <div class="space-y-2 text-xs">
                            <div class="flex justify-between font-bold">
                                <span class="text-gray-600">Realisasi Selesai</span>
                                <span class="text-emerald-600 font-extrabold">
                                    <?php echo e($grossRevenue > 0 ? number_format(($settledRevenue / $grossRevenue) * 100, 1) : 0); ?>%
                                </span>
                            </div>
                            <div class="w-full bg-gray-100 h-2.5 rounded-full overflow-hidden flex">
                                <?php
                                    $settledPct = $grossRevenue > 0 ? min(100, ($settledRevenue / $grossRevenue) * 100) : 0;
                                    $pendingPct = $grossRevenue > 0 ? min(100 - $settledPct, ($pendingRevenue / $grossRevenue) * 100) : 0;
                                ?>
                                <div class="bg-emerald-500 h-full transition-all duration-500" style="width: <?php echo e($settledPct); ?>%" title="Selesai: <?php echo e($settledPct); ?>%"></div>
                                <div class="bg-[#D4AF37] h-full transition-all duration-500" style="width: <?php echo e($pendingPct); ?>%" title="Pending: <?php echo e($pendingPct); ?>%"></div>
                            </div>
                            <div class="flex justify-between text-[11px] text-gray-400 pt-0.5">
                                <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Rp <?php echo e(number_format($settledRevenue, 0, ',', '.')); ?></span>
                                <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span> Rp <?php echo e(number_format($pendingRevenue, 0, ',', '.')); ?></span>
                            </div>
                        </div>

                        <!-- Metrik Tambahan: AOV & Total Botol Terjual -->
                        <div class="grid grid-cols-2 gap-2 pt-1 border-t border-gray-100">
                            <div class="p-3 bg-gray-50/70 rounded-xl border border-gray-100/70">
                                <span class="text-[10px] font-bold text-gray-400 uppercase block">Rata-rata Order</span>
                                <span class="text-xs font-black text-gray-800">Rp <?php echo e(number_format($averageOrderValue, 0, ',', '.')); ?></span>
                            </div>
                            <div class="p-3 bg-gray-50/70 rounded-xl border border-gray-100/70">
                                <span class="text-[10px] font-bold text-gray-400 uppercase block">Parfum Terjual</span>
                                <span class="text-xs font-black text-gray-800"><?php echo e($totalItemsSold); ?> Botol/Pcs</span>
                            </div>
                        </div>
                    </div>

                    <a href="<?php echo e(route('orders.index')); ?>" class="w-full py-2.5 px-4 bg-gray-100 hover:bg-black hover:text-white text-gray-800 rounded-xl text-xs font-bold transition-all text-center flex items-center justify-center gap-1.5 group">
                        Buka Laporan Pesanan Lengkap
                        <svg class="w-3.5 h-3.5 text-gray-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>

            </div>

            <!-- ========================================== -->
            <!-- 3. TABEL PEMBELI & TRANSAKSI TERBARU        -->
            <!-- ========================================== -->
            <div class="bg-white rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 overflow-hidden">
                <!-- Header Tabel -->
                <div class="p-6 sm:p-7 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2.5">
                            <h3 class="font-black text-lg text-gray-900">Daftar Pembeli & Pesanan Terbaru</h3>
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-black bg-black text-[#D4AF37]">Real-time</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Daftar pembeli dan transaksi masuk tanpa perlu memeriksa satu per satu.</p>
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="<?php echo e(route('orders.index')); ?>" class="px-4 py-2 bg-gray-100 hover:bg-black hover:text-white text-gray-800 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5">
                            <span>Lihat Semua Pesanan</span>
                            <span class="px-1.5 py-0.5 rounded-md bg-gray-200 text-gray-700 text-[10px] font-black"><?php echo e($totalOrders); ?></span>
                        </a>
                    </div>
                </div>

                <!-- Konten Tabel -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50/80 text-[11px] uppercase tracking-wider text-gray-400 font-extrabold border-b border-gray-100">
                            <tr>
                                <th class="py-4 px-6">ID & Waktu</th>
                                <th class="py-4 px-6">Pembeli & Kontak</th>
                                <th class="py-4 px-6">Produk Dipesan</th>
                                <th class="py-4 px-6">Total Tagihan</th>
                                <th class="py-4 px-6">Status Pesanan</th>
                                <th class="py-4 px-6 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700">
                            <?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $itemsCount = is_array($order->items) ? collect($order->items)->sum('qty') : 0;
                                    $itemsList = is_array($order->items) ? collect($order->items) : collect([]);
                                    $phoneClean = $order->customer_phone ? preg_replace('/[^0-9]/', '', $order->customer_phone) : null;
                                ?>
                                <tr class="hover:bg-gray-50/70 transition-colors">
                                    <!-- ID & Waktu -->
                                    <td class="py-4 px-6">
                                        <div class="font-black text-gray-900 text-sm">#<?php echo e($order->id); ?></div>
                                        <div class="text-[11px] text-gray-400 font-medium mt-0.5">
                                            <?php echo e($order->created_at->format('d M Y, H:i')); ?>

                                        </div>
                                    </td>

                                    <!-- Pembeli & Kontak -->
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-xl bg-gray-100 text-gray-700 font-black text-xs flex items-center justify-center flex-shrink-0 border border-gray-200">
                                                <?php echo e(strtoupper(substr($order->customer_name ?: 'WA', 0, 2))); ?>

                                            </div>
                                            <div class="min-w-0">
                                                <div class="font-bold text-gray-900 text-sm truncate">
                                                    <?php echo e($order->customer_name ?: 'Pelanggan Online'); ?>

                                                </div>
                                                <?php if($order->customer_phone): ?>
                                                    <div class="flex items-center gap-1.5 mt-0.5">
                                                        <a href="https://wa.me/<?php echo e($phoneClean); ?>" target="_blank" class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-600 hover:text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-100">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                                            <?php echo e($order->customer_phone); ?>

                                                        </a>
                                                    </div>
                                                <?php else: ?>
                                                    <span class="text-[10px] font-semibold text-gray-400">Checkout WhatsApp</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Produk Dipesan -->
                                    <td class="py-4 px-6">
                                        <div class="space-y-1">
                                            <div class="flex items-center gap-1.5">
                                                <span class="font-bold text-gray-900 text-xs"><?php echo e($itemsCount); ?> pcs total</span>
                                            </div>
                                            <div class="text-xs text-gray-500 max-w-xs truncate" title="<?php echo e($itemsList->pluck('name')->join(', ')); ?>">
                                                <?php echo e($itemsList->pluck('name')->join(', ') ?: 'Pesanan langsung'); ?>

                                            </div>
                                        </div>
                                    </td>

                                    <!-- Total Tagihan -->
                                    <td class="py-4 px-6">
                                        <div class="font-black text-gray-900 text-sm">
                                            Rp <?php echo e(number_format($order->total_price, 0, ',', '.')); ?>

                                        </div>
                                    </td>

                                    <!-- Status Pesanan -->
                                    <td class="py-4 px-6">
                                        <?php if($order->status === 'Menunggu konfirmasi'): ?>
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                                Menunggu Konfirmasi
                                            </span>
                                        <?php elseif($order->status === 'Diproses'): ?>
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                                Diproses
                                            </span>
                                        <?php elseif($order->status === 'Dikirim'): ?>
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-purple-50 text-purple-700 border border-purple-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                                                Dikirim
                                            </span>
                                        <?php elseif($order->status === 'Selesai'): ?>
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                Selesai
                                            </span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                                Dibatalkan
                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <!-- Aksi Cepat -->
                                    <td class="py-4 px-6 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <button type="button" @click="openDrawer('<?php echo e(route('orders.show', ['order' => $order->id, 'drawer' => 1])); ?>', 'Detail Pesanan #<?php echo e($order->id); ?>')"
                                                class="p-2 text-gray-500 hover:text-black hover:bg-gray-100 rounded-lg transition-colors cursor-pointer" title="Lihat Detail Pesanan">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                            </button>
                                            <button type="button" @click="openDrawer('<?php echo e(route('orders.edit', ['order' => $order->id, 'drawer' => 1])); ?>', 'Edit Pesanan #<?php echo e($order->id); ?>')"
                                                class="px-3 py-1.5 bg-gray-50 hover:bg-black hover:text-white text-gray-700 text-xs font-bold rounded-lg border border-gray-200 transition-all flex items-center gap-1 cursor-pointer">
                                                <span>Ubah Status</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="p-12 text-center">
                                        <div class="max-w-sm mx-auto space-y-3">
                                            <div class="w-12 h-12 rounded-2xl bg-gray-100 text-gray-400 mx-auto flex items-center justify-center">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                            </div>
                                            <div class="font-bold text-gray-700 text-sm">Belum Ada Transaksi Masuk</div>
                                            <p class="text-xs text-gray-400">Pesanan dari checkout WhatsApp atau penambahan manual akan otomatis muncul di sini.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Footer Tabel -->
                <?php if($recentOrders->count() > 0): ?>
                    <div class="p-4 bg-gray-50/50 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500 px-6">
                        <span>Menampilkan <strong><?php echo e($recentOrders->count()); ?></strong> transaksi terbaru</span>
                        <a href="<?php echo e(route('orders.index')); ?>" class="font-bold text-black hover:text-[#D4AF37] transition-colors flex items-center gap-1">
                            Buka Semua Data Transaksi (<?php echo e($totalOrders); ?>)
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- ========================================== -->
            <!-- 4. PINTASAN CEPAT MANAJEMEN TOKO           -->
            <!-- ========================================== -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <a href="<?php echo e(route('orders.index')); ?>" class="p-4 bg-white hover:bg-black hover:text-white rounded-2xl border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all group flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-50 text-[#D4AF37] group-hover:bg-white/10 flex items-center justify-center flex-shrink-0 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 00-2-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5a3 3 0 016 0m-6 9l2 2 4-4"/></svg>
                    </div>
                    <div>
                        <div class="font-bold text-xs">Manajemen Pesanan</div>
                        <div class="text-[10px] text-gray-400 group-hover:text-gray-300">Kelola status & pengiriman</div>
                    </div>
                </a>

                <a href="<?php echo e(route('products.index')); ?>" class="p-4 bg-white hover:bg-black hover:text-white rounded-2xl border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all group flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 group-hover:bg-white/10 flex items-center justify-center flex-shrink-0 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                    <div>
                        <div class="font-bold text-xs">Katalog Produk</div>
                        <div class="text-[10px] text-gray-400 group-hover:text-gray-300">Kelola stok & harga</div>
                    </div>
                </a>

                <a href="<?php echo e(route('brands.index')); ?>" class="p-4 bg-white hover:bg-black hover:text-white rounded-2xl border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all group flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 group-hover:bg-white/10 flex items-center justify-center flex-shrink-0 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    </div>
                    <div>
                        <div class="font-bold text-xs">Manajemen Brand</div>
                        <div class="text-[10px] text-gray-400 group-hover:text-gray-300">Mitra & merk parfum</div>
                    </div>
                </a>

                <a href="<?php echo e(route('reviews.index')); ?>" class="p-4 bg-white hover:bg-black hover:text-white rounded-2xl border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all group flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 group-hover:bg-white/10 flex items-center justify-center flex-shrink-0 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                    </div>
                    <div>
                        <div class="font-bold text-xs">Ulasan Pembeli</div>
                        <div class="text-[10px] text-gray-400 group-hover:text-gray-300">Moderasi testimoni toko</div>
                    </div>
                </a>
            </div>

        </div>

        <!-- SIDE DRAWER DASHBOARD: untuk tambah, detail, dan edit pesanan tanpa pindah page -->
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
                        <p class="text-[10px] font-black tracking-[0.2em] text-[#D4AF37]">MANAJEMEN PESANAN</p>
                        <h2 class="mt-1 text-lg font-black text-gray-900" x-text="drawerTitle"></h2>
                    </div>
                    <button type="button" @click="closeDrawer()" class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-50 text-gray-500 hover:rotate-90 hover:bg-black hover:text-white transition duration-300 cursor-pointer" aria-label="Tutup panel">✕</button>
                </header>
                
                <!-- Area Iframe Content -->
                <div class="relative flex-1 bg-[#F8F9FA]">
                    <!-- Loading Spinner -->
                    <div x-show="iframeLoading" class="absolute inset-0 flex items-center justify-center z-20 bg-[#F8F9FA]">
                        <svg class="animate-spin h-8 w-8 text-[#D4AF37]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    
                    <!-- Iframe -->
                    <iframe :src="drawerUrl" @load="iframeLoading = false" class="h-full w-full border-0 absolute inset-0 z-10" title="Panel pesanan"></iframe>
                </div>
            </section>
        </div>
    </div>

    <!-- Script Render Chart.js Tren Penjualan -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctxTrend = document.getElementById('revenueTrendChart');
            if (!ctxTrend) return;

            const labels = <?php echo json_encode($chartLabels, 15, 512) ?>;
            const revenues = <?php echo json_encode($chartRevenue, 15, 512) ?>;
            const orders = <?php echo json_encode($chartOrders, 15, 512) ?>;

            new Chart(ctxTrend.getContext('2d'), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Pendapatan (Rp)',
                            data: revenues,
                            borderColor: '#D4AF37',
                            backgroundColor: 'rgba(212, 175, 55, 0.08)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.35,
                            pointBackgroundColor: '#D4AF37',
                            pointHoverRadius: 6,
                            pointRadius: 4,
                            yAxisID: 'y'
                        },
                        {
                            label: 'Jumlah Pesanan',
                            data: orders,
                            borderColor: '#000000',
                            backgroundColor: 'rgba(0, 0, 0, 0.04)',
                            borderWidth: 2,
                            borderDash: [4, 4],
                            fill: false,
                            tension: 0.3,
                            pointBackgroundColor: '#000000',
                            pointHoverRadius: 5,
                            pointRadius: 3,
                            yAxisID: 'y1'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#111827',
                            titleFont: { size: 12, weight: 'bold' },
                            bodyFont: { size: 12 },
                            padding: 12,
                            cornerRadius: 12,
                            callbacks: {
                                label: function(context) {
                                    if (context.dataset.yAxisID === 'y') {
                                        return ' Pendapatan: Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                                    }
                                    return ' Pesanan: ' + context.parsed.y + ' order';
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: {
                                font: { weight: '600', size: 11 },
                                color: '#9CA3AF'
                            }
                        },
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                            beginAtZero: true,
                            grid: { color: '#F3F4F6' },
                            ticks: {
                                font: { size: 10 },
                                color: '#9CA3AF',
                                callback: function(value) {
                                    if (value >= 1000000) return 'Rp ' + (value / 1000000) + 'jt';
                                    if (value >= 1000) return 'Rp ' + (value / 1000) + 'rb';
                                    return 'Rp ' + value;
                                }
                            }
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            beginAtZero: true,
                            grid: { drawOnChartArea: false },
                            ticks: {
                                stepSize: 1,
                                font: { size: 10 },
                                color: '#9CA3AF',
                                callback: function(value) {
                                    return Number.isInteger(value) ? value : '';
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\Faiz\Perfu.me\resources\views\dashboard.blade.php ENDPATH**/ ?>