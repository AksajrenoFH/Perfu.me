<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-semibold text-2xl text-gray-900 tracking-tight flex items-center gap-2.5">
                    {{ __('Executive Dashboard') }}
                    <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-black text-[#b58d17]">Perfu.me Admin</span>
                </h2>
                <p class="text-xs text-gray-500 mt-1">Pencatatan keuangan, monitoring pesanan real-time, dan status transaksi toko.</p>
            </div>
            <div class="flex items-center gap-2.5">
                <button type="button" @click="openDrawer('{{ route('orders.create', ['drawer' => 1]) }}', 'Tambah Pesanan Baru')"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-black hover:bg-gray-800 transition-colors text-white rounded-xl text-xs font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Pesanan
                </button>
                <button onclick="window.location.reload();" class="inline-flex items-center gap-1.5 px-3.5 py-2.5 bg-white hover:bg-gray-50 transition-colors text-gray-700 border border-gray-200 rounded-xl text-xs font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Segarkan
                </button>
            </div>
        </div>
    </x-slot>

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
         class="py-8 bg-[#F8F9FA] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- 1. Kartu statistik utama --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                <div class="bg-white p-6 rounded-3xl border border-gray-100 flex items-center justify-between">
                    <div class="space-y-1.5">
                        <span class="text-xs text-gray-400">Pendapatan Selesai</span>
                        <h3 class="text-2xl sm:text-3xl font-semibold text-emerald-600 tracking-tight">
                            Rp {{ number_format($settledRevenue, 0, ',', '.') }}
                        </h3>
                        <div class="text-xs text-gray-500 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            {{ $completedOrdersCount }} pesanan lunas
                        </div>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-gray-100 flex items-center justify-between">
                    <div class="space-y-1.5">
                        <span class="text-xs text-gray-400">Pendapatan Sementara</span>
                        <h3 class="text-2xl sm:text-3xl font-semibold text-gray-900 tracking-tight">
                            Rp {{ number_format($pendingRevenue, 0, ',', '.') }}
                        </h3>
                        <div class="text-xs text-amber-600 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                            {{ $pendingOrdersCount + $processingOrdersCount }} pesanan berjalan
                        </div>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-[#b58d17]/10 text-[#b58d17] flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2m5-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-gray-100 flex items-center justify-between">
                    <div class="space-y-1.5">
                        <span class="text-xs text-gray-400">Total Pesanan Masuk</span>
                        <h3 class="text-2xl sm:text-3xl font-semibold text-gray-900 tracking-tight">
                            {{ $totalOrders }} <span class="text-sm font-normal text-gray-400">Order</span>
                        </h3>
                        @if($pendingOrdersCount > 0)
                            <span class="inline-flex items-center gap-1.5 text-xs font-medium px-2.5 py-0.5 rounded-full bg-amber-50 text-amber-700 ring-1 ring-amber-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-current animate-pulse"></span>
                                {{ $pendingOrdersCount }} Butuh Konfirmasi
                            </span>
                        @else
                            <span class="text-xs text-emerald-600 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                Semua Terproses
                            </span>
                        @endif
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-black text-[#b58d17] flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 2.25H7.5A2.25 2.25 0 0 0 5.25 4.5v15a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25V4.5A2.25 2.25 0 0 0 16.5 2.25H15M9 2.25v2.25h6V2.25M9 2.25a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5M9 12h6m-6 3.75h6" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-gray-100 flex items-center justify-between">
                    <div class="space-y-1.5">
                        <span class="text-xs text-gray-400">Katalog & Stok Gudang</span>
                        <h3 class="text-2xl sm:text-3xl font-semibold text-gray-900 tracking-tight">
                            {{ $totalProducts }} <span class="text-sm font-normal text-gray-400">Produk</span>
                        </h3>
                        <span class="text-xs text-purple-600 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                            {{ $totalStock }} pcs total stok
                        </span>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6.75-3v6m3-6v6M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375C2.754 3.75 2.25 4.254 2.25 4.875v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- 2. Grafik tren & rincian finansial --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                <div class="lg:col-span-8 bg-white p-6 sm:p-7 rounded-3xl border border-gray-100 space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <div>
                            <h3 class="font-medium text-base text-gray-900 flex items-center gap-2">
                                Tren Pendapatan & Penjualan
                                <span class="px-2 py-0.5 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-md ring-1 ring-emerald-200">7 Hari Terakhir</span>
                            </h3>
                            <p class="text-xs text-gray-400 mt-0.5">Monitoring pergerakan omset harian dan volume pesanan masuk</p>
                        </div>
                        <div class="flex items-center gap-3 text-xs text-gray-500">
                            <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-md bg-[#b58d17]"></span> Pendapatan (Rp)</span>
                            <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-md bg-black"></span> Pesanan</span>
                        </div>
                    </div>
                    <div class="relative h-[280px] w-full pt-2">
                        <canvas id="revenueTrendChart"></canvas>
                    </div>
                </div>

                <div class="lg:col-span-4 bg-white p-6 sm:p-7 rounded-3xl border border-gray-100 flex flex-col justify-between space-y-5">
                    <div>
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium text-base text-gray-900">Rincian Finansial</h3>
                            <span class="text-xs text-gray-400 bg-gray-50 px-2.5 py-1 rounded-lg">Ringkasan</span>
                        </div>
                        <p class="text-xs text-gray-400 mt-0.5">Pencatatan arus kas pesanan toko</p>
                    </div>

                    <div class="space-y-3.5">
                        <div class="p-4 bg-gray-50 rounded-2xl space-y-1">
                            <div class="text-xs text-gray-500">Total Potensi Omset</div>
                            <div class="text-xl font-semibold text-gray-900">Rp {{ number_format($grossRevenue, 0, ',', '.') }}</div>
                            <div class="text-xs text-gray-400">Total seluruh pesanan aktif (non-batal)</div>
                        </div>

                        <div class="space-y-2 text-xs">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Realisasi Selesai</span>
                                <span class="text-emerald-600 font-medium">
                                    {{ $grossRevenue > 0 ? number_format(($settledRevenue / $grossRevenue) * 100, 1) : 0 }}%
                                </span>
                            </div>
                            <div class="w-full bg-gray-100 h-2.5 rounded-full overflow-hidden flex">
                                @php
                                    $settledPct = $grossRevenue > 0 ? min(100, ($settledRevenue / $grossRevenue) * 100) : 0;
                                    $pendingPct = $grossRevenue > 0 ? min(100 - $settledPct, ($pendingRevenue / $grossRevenue) * 100) : 0;
                                @endphp
                                <div class="bg-emerald-500 h-full transition-all duration-500" style="width: {{ $settledPct }}%" title="Selesai: {{ $settledPct }}%"></div>
                                <div class="bg-[#b58d17] h-full transition-all duration-500" style="width: {{ $pendingPct }}%" title="Pending: {{ $pendingPct }}%"></div>
                            </div>
                            <div class="flex justify-between text-xs text-gray-400 pt-0.5">
                                <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Rp {{ number_format($settledRevenue, 0, ',', '.') }}</span>
                                <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-[#b58d17]"></span> Rp {{ number_format($pendingRevenue, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2 pt-1 border-t border-gray-100">
                            <div class="p-3 bg-gray-50 rounded-xl">
                                <span class="text-xs text-gray-400 block">Rata-rata Order</span>
                                <span class="text-xs font-medium text-gray-800">Rp {{ number_format($averageOrderValue, 0, ',', '.') }}</span>
                            </div>
                            <div class="p-3 bg-gray-50 rounded-xl">
                                <span class="text-xs text-gray-400 block">Parfum Terjual</span>
                                <span class="text-xs font-medium text-gray-800">{{ $totalItemsSold }} Botol/Pcs</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('orders.index') }}" class="inline-flex items-center justify-center gap-1.5 w-full py-2.5 px-4 bg-gray-100 hover:bg-black hover:text-white transition-colors text-gray-800 rounded-xl text-xs font-medium">
                        Buka Laporan Pesanan Lengkap
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- 3. Tabel pembeli & transaksi terbaru --}}
            <div class="bg-white rounded-3xl border border-gray-100 overflow-hidden">
                <div class="p-6 sm:p-7 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2.5">
                            <h3 class="font-medium text-lg text-gray-900">Daftar Pembeli & Pesanan Terbaru</h3>
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-black text-[#b58d17]">Real-time</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Daftar pembeli dan transaksi masuk tanpa perlu memeriksa satu per satu.</p>
                    </div>
                    <a href="{{ route('orders.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-gray-100 hover:bg-black hover:text-white transition-colors text-gray-800 rounded-xl text-xs font-medium">
                        Lihat Semua Pesanan
                        <span class="px-1.5 py-0.5 rounded-md bg-gray-200 text-gray-700 text-xs">{{ $totalOrders }}</span>
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wide">
                            <tr>
                                <th class="p-4 font-medium">ID & Waktu</th>
                                <th class="p-4 font-medium">Pembeli & Kontak</th>
                                <th class="p-4 font-medium">Produk Dipesan</th>
                                <th class="p-4 font-medium">Total Tagihan</th>
                                <th class="p-4 font-medium">Status Pesanan</th>
                                <th class="p-4 font-medium text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($recentOrders as $order)
                                @php
                                    $itemsCount = is_array($order->items) ? collect($order->items)->sum('qty') : 0;
                                    $itemsList = is_array($order->items) ? collect($order->items) : collect([]);
                                    $phoneClean = $order->customer_phone ? preg_replace('/[^0-9]/', '', $order->customer_phone) : null;
                                @endphp
                                <tr class="hover:bg-gray-50/70 transition-colors">
                                    <td class="p-4">
                                        <div class="font-medium text-gray-900">#{{ $order->id }}</div>
                                        <div class="text-xs text-gray-400 mt-0.5">{{ $order->created_at->format('d M Y, H:i') }}</div>
                                    </td>

                                    <td class="p-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-xl bg-gray-100 text-gray-600 font-medium text-xs flex items-center justify-center flex-shrink-0">
                                                {{ strtoupper(substr($order->customer_name ?: 'WA', 0, 2)) }}
                                            </div>
                                            <div class="min-w-0">
                                                <div class="font-medium text-gray-900 truncate">{{ $order->customer_name ?: 'Pelanggan Online' }}</div>
                                                @if($order->customer_phone)
                                                    <a href="https://wa.me/{{ $phoneClean }}" target="_blank" class="inline-flex items-center gap-1 text-xs text-emerald-600 hover:text-emerald-700 mt-0.5">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                                        {{ $order->customer_phone }}
                                                    </a>
                                                @else
                                                    <span class="text-xs text-gray-400">Checkout WhatsApp</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <td class="p-4 text-xs text-gray-600">
                                        <span class="font-medium text-gray-800">{{ $itemsCount }} pcs</span>
                                        <div class="text-gray-400 mt-0.5 max-w-xs truncate" title="{{ $itemsList->pluck('name')->join(', ') }}">
                                            {{ $itemsList->pluck('name')->join(', ') ?: 'Pesanan langsung' }}
                                        </div>
                                    </td>

                                    <td class="p-4 font-medium text-gray-900">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>

                                    <td class="p-4">
                                        @if($order->status === 'Menunggu konfirmasi')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium ring-1 bg-amber-50 text-amber-700 ring-amber-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-current animate-pulse"></span>
                                                Menunggu Konfirmasi
                                            </span>
                                        @elseif($order->status === 'Diproses')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium ring-1 bg-blue-50 text-blue-700 ring-blue-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                                Diproses
                                            </span>
                                        @elseif($order->status === 'Dikirim')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium ring-1 bg-indigo-50 text-indigo-700 ring-indigo-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                                Dikirim
                                            </span>
                                        @elseif($order->status === 'Selesai')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium ring-1 bg-emerald-50 text-emerald-700 ring-emerald-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                                Selesai
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium ring-1 bg-red-50 text-red-700 ring-red-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                                Dibatalkan
                                            </span>
                                        @endif
                                    </td>

                                    <td class="p-4">
                                        <div class="flex items-center justify-end gap-3">
                                            <button type="button" @click="openDrawer('{{ route('orders.show', ['order' => $order->id, 'drawer' => 1]) }}', 'Detail Pesanan #{{ $order->id }}')"
                                                title="Detail" class="text-gray-400 hover:text-gray-700 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </button>
                                            <button type="button" @click="openDrawer('{{ route('orders.edit', ['order' => $order->id, 'drawer' => 1]) }}', 'Edit Pesanan #{{ $order->id }}')"
                                                title="Ubah status" class="text-[#b58d17] hover:text-[#8f6e12] transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-16 text-center">
                                        <div class="flex flex-col items-center gap-3 text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 2.25H7.5A2.25 2.25 0 0 0 5.25 4.5v15a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25V4.5A2.25 2.25 0 0 0 16.5 2.25H15M9 2.25v2.25h6V2.25M9 2.25a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5M9 12h6m-6 3.75h6" />
                                            </svg>
                                            <p class="text-sm font-medium text-gray-700">Belum Ada Transaksi Masuk</p>
                                            <p class="text-xs text-gray-400">Pesanan dari checkout WhatsApp atau penambahan manual akan otomatis muncul di sini.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($recentOrders->count() > 0)
                    <div class="p-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                        <span>Menampilkan {{ $recentOrders->count() }} transaksi terbaru</span>
                        <a href="{{ route('orders.index') }}" class="inline-flex items-center gap-1 font-medium text-black hover:text-[#b58d17] transition-colors">
                            Buka Semua Data Transaksi ({{ $totalOrders }})
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                @endif
            </div>

            {{-- 4. Pintasan cepat --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <a href="{{ route('orders.index') }}" class="p-4 bg-white hover:bg-black hover:text-white transition-colors rounded-2xl border border-gray-100 flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-[#b58d17]/10 text-[#b58d17] group-hover:bg-white/10 flex items-center justify-center flex-shrink-0 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 2.25H7.5A2.25 2.25 0 0 0 5.25 4.5v15a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25V4.5A2.25 2.25 0 0 0 16.5 2.25H15M9 2.25v2.25h6V2.25M9 2.25a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5M9 12h6m-6 3.75h6" />
                        </svg>
                    </div>
                    <div>
                        <div class="font-medium text-xs">Manajemen Pesanan</div>
                        <div class="text-xs text-gray-400 group-hover:text-gray-300">Kelola status & pengiriman</div>
                    </div>
                </a>

                <a href="{{ route('products.index') }}" class="p-4 bg-white hover:bg-black hover:text-white transition-colors rounded-2xl border border-gray-100 flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 group-hover:bg-white/10 flex items-center justify-center flex-shrink-0 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6.75-3v6m3-6v6M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375C2.754 3.75 2.25 4.254 2.25 4.875v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>
                    </div>
                    <div>
                        <div class="font-medium text-xs">Katalog Produk</div>
                        <div class="text-xs text-gray-400 group-hover:text-gray-300">Kelola stok & harga</div>
                    </div>
                </a>

                <a href="{{ route('brands.index') }}" class="p-4 bg-white hover:bg-black hover:text-white transition-colors rounded-2xl border border-gray-100 flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 group-hover:bg-white/10 flex items-center justify-center flex-shrink-0 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5v3.75m0 0-2.25-1.313M21 11.25l-2.25 1.313M21 11.25v3.75l-2.25 1.313M12 12.75l-2.25-1.313M12 12.75l2.25-1.313M12 12.75v3.75m0-10.5L9.75 6l-2.25-1.313M12 6l2.25-1.313M12 6V2.25" />
                        </svg>
                    </div>
                    <div>
                        <div class="font-medium text-xs">Manajemen Brand</div>
                        <div class="text-xs text-gray-400 group-hover:text-gray-300">Mitra & merk parfum</div>
                    </div>
                </a>

                <a href="{{ route('reviews.index') }}" class="p-4 bg-white hover:bg-black hover:text-white transition-colors rounded-2xl border border-gray-100 flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 group-hover:bg-white/10 flex items-center justify-center flex-shrink-0 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.563.563 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>
                    </div>
                    <div>
                        <div class="font-medium text-xs">Ulasan Pembeli</div>
                        <div class="text-xs text-gray-400 group-hover:text-gray-300">Moderasi testimoni toko</div>
                    </div>
                </a>
            </div>
        </div>

        {{-- SIDE DRAWER DASHBOARD --}}
        <div x-show="drawerOpen" x-cloak class="fixed inset-0 z-[100]" style="display: none;">
            <div @click="closeDrawer()" class="absolute inset-0 bg-black/40 backdrop-blur-sm" 
                 x-transition:enter="transition-opacity ease-out duration-300" 
                 x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
                 x-transition:leave="transition-opacity ease-in duration-200" 
                 x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            </div>

            <section class="absolute inset-y-0 right-0 flex w-full max-w-xl flex-col bg-[#F8F9FA] shadow-[-20px_0_60px_rgba(0,0,0,0.15)]" 
                     x-transition:enter="transition ease-out duration-500" 
                     x-transition:enter-start="translate-x-full" 
                     x-transition:enter-end="translate-x-0" 
                     x-transition:leave="transition ease-in duration-300" 
                     x-transition:leave-start="translate-x-0" 
                     x-transition:leave-end="translate-x-full">

                <header class="flex items-center justify-between border-b border-gray-100 bg-white px-6 py-4 shrink-0 z-10 relative">
                    <div>
                        <p class="text-[11px] font-medium tracking-wider text-[#b58d17] uppercase">Manajemen Pesanan</p>
                        <h2 class="mt-1 text-base font-semibold text-gray-900" x-text="drawerTitle"></h2>
                    </div>
                    <button type="button" @click="closeDrawer()" class="flex h-10 w-10 items-center justify-center rounded-2xl bg-gray-50 text-gray-500 hover:bg-black hover:text-white transition-colors" aria-label="Tutup panel">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </header>

                <div class="relative flex-1 bg-[#F8F9FA]">
                    <div x-show="iframeLoading" class="absolute inset-0 flex items-center justify-center z-20 bg-[#F8F9FA]">
                        <svg class="animate-spin h-8 w-8 text-[#b58d17]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    <iframe :src="drawerUrl" @load="iframeLoading = false" class="h-full w-full border-0 absolute inset-0 z-10" title="Panel pesanan"></iframe>
                </div>
            </section>
        </div>
    </div>

    {{-- Script render Chart.js tren penjualan --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctxTrend = document.getElementById('revenueTrendChart');
            if (!ctxTrend) return;

            const labels = @json($chartLabels);
            const revenues = @json($chartRevenue);
            const orders = @json($chartOrders);

            new Chart(ctxTrend.getContext('2d'), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Pendapatan (Rp)',
                            data: revenues,
                            borderColor: '#b58d17',
                            backgroundColor: 'rgba(181, 141, 23, 0.08)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.35,
                            pointBackgroundColor: '#b58d17',
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
                    interaction: { mode: 'index', intersect: false },
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
                            ticks: { font: { weight: '600', size: 11 }, color: '#9CA3AF' }
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
                                callback: function(value) { return Number.isInteger(value) ? value : ''; }
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>