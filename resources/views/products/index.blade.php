<x-app-layout>
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
                setTimeout(() => { this.drawerUrl = ''; }, 300); // Clear URL setelah transisi selesai
            }
        }" 
        @message.window="if($event.data === 'product-saved') { closeDrawer(); window.location.reload(); }"
        class="min-h-screen bg-[#F8F9FA] py-8">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Top Header & Action Banner -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-6 rounded-3xl shadow-xs border border-gray-100">
                <div>
                    <div class="flex items-center gap-2.5">
                        <span class="w-3 h-3 rounded-full bg-[#D4AF37]"></span>
                        <h1 class="text-2xl font-black text-gray-900 tracking-tight">Manajemen Katalog Produk</h1>
                    </div>
                    <p class="text-xs text-gray-500 mt-1 ml-5">Kelola seluruh stok, harga, dan varian aroma parfum Perfu.me dengan mudah.</p>
                </div>

                <!-- Tombol Tambah Produk -->
                <button type="button" @click="openDrawer('{{ route('products.create', ['drawer' => 1]) }}', 'Tambah Produk Baru')"
                    class="group relative inline-flex items-center justify-center gap-2.5 bg-black hover:bg-[#D4AF37] text-white px-6 py-3 rounded-2xl font-bold text-xs uppercase tracking-wider overflow-hidden shadow-lg shadow-black/10 hover:shadow-[#D4AF37]/30 hover:-translate-y-0.5 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/15 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>
                    <svg class="w-4 h-4 text-[#D4AF37] group-hover:text-white transition-transform duration-500 group-hover:rotate-90 flex-shrink-0 relative" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span class="relative">Tambah Produk Baru</span>
                </button>
            </div>

            <!-- Filter & Search Toolbar -->
            <div class="bg-white p-4 rounded-3xl shadow-xs border border-gray-100">
                <form action="{{ route('products.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <div class="md:col-span-4">
                        <label for="product-type" class="block mb-2 text-[11px] font-black uppercase tracking-wider text-gray-400">Kategori produk</label>
                        <select id="product-type" name="type" class="w-full rounded-2xl border-gray-200 bg-gray-50/80 py-2.5 text-xs font-semibold focus:border-[#D4AF37] focus:ring-[#D4AF37]/20">
                            <option value="">Semua Produk</option>
                            <option value="Original" @selected(request('type') === 'Original')>Produk Original</option>
                            <option value="Refill" @selected(request('type') === 'Refill')>Parfum Refill</option>
                        </select>
                    </div>
                    <div class="md:col-span-5">
                        <label for="product-search" class="block mb-2 text-[11px] font-black uppercase tracking-wider text-gray-400">Cari produk</label>
                        <input id="product-search" type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama parfum..." class="w-full rounded-2xl border-gray-200 bg-gray-50/80 py-2.5 text-xs font-medium focus:border-[#D4AF37] focus:ring-[#D4AF37]/20">
                    </div>
                    <div class="md:col-span-3 flex gap-2">
                        <button type="submit" class="flex-1 bg-black py-2.5 rounded-2xl text-xs font-bold text-white hover:bg-[#D4AF37] transition">Terapkan</button>
                        @if(request('type') || request('search'))
                            <a href="{{ route('products.index') }}" class="px-4 py-2.5 rounded-2xl bg-gray-100 text-xs font-bold text-gray-600 hover:bg-gray-200 transition">Reset</a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Alert Success -->
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                    class="bg-emerald-50 border border-emerald-200 p-4 rounded-2xl flex items-center justify-between text-emerald-800 shadow-xs" role="alert">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center font-bold">✓</div>
                        <p class="text-xs font-bold">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="text-emerald-600 hover:text-emerald-800 font-bold px-2">✕</button>
                </div>
            @endif

            <!-- Table Card Area -->
            <div class="bg-white rounded-3xl shadow-xs border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/70 border-b border-gray-100 text-[11px] font-black text-gray-400 uppercase tracking-wider">
                                <th class="py-4 px-6 text-center w-16">No</th>
                                <th class="py-4 px-6">Informasi Produk</th>
                                <th class="py-4 px-6">Tipe & Varian</th>
                                <th class="py-4 px-6">Kategori</th>
                                <th class="py-4 px-6">Harga Jual</th>
                                <th class="py-4 px-6 text-center">Stok</th>
                                <th class="py-4 px-6 text-center">Status</th>
                                <th class="py-4 px-6 text-right">Aksi Pilihan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 text-xs font-medium text-gray-600">
                            @forelse ($products as $index => $product)
                                <tr class="hover:bg-gray-50/60 transition-colors group">
                                    <td class="py-4 px-6 text-center font-bold text-gray-400 group-hover:text-black transition-colors">{{ $products->firstItem() + $index }}</td>
                                    
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200/60 flex-shrink-0 shadow-xs group-hover:scale-105 transition-transform">
                                                @if($product->image)
                                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center text-[10px] text-gray-400 font-bold">No Pic</div>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="font-bold text-gray-900 text-sm tracking-tight">{{ $product->name }}</div>
                                                <div class="text-[11px] text-gray-400 mt-0.5">Gender: <span class="text-gray-700 font-semibold">{{ $product->gender ?: 'Universal' }}</span></div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="py-4 px-6">
                                        @if($product->category == 'Original')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg text-[11px] font-bold bg-[#D4AF37]/10 text-[#D4AF37] border border-[#D4AF37]/20">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                                </svg>
                                                Original Signature
                                            </span>
                                        @elseif($product->category == 'Refill')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg text-[11px] font-bold bg-black text-white">
                                                <svg class="w-3.5 h-3.5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                                </svg>
                                                Parfum Refill
                                            </span>
                                        @else
                                            <span class="px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-gray-100 text-gray-600">{{ $product->category ?: '-' }}</span>
                                        @endif
                                    </td>

                                    <td class="py-4 px-6">
                                        <span class="px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-gray-100 text-gray-600">{{ $product->variant ?: '-' }}</span>
                                    </td>

                                    <td class="py-4 px-6 font-extrabold text-[#D4AF37] text-sm whitespace-nowrap">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </td>

                                    <td class="py-4 px-6 text-center">
                                        <span class="inline-block px-3 py-1 rounded-xl font-bold text-xs {{ $product->stock < 10 ? 'bg-red-50 text-red-600 border border-red-100' : 'bg-gray-100/80 text-gray-800' }}">
                                            {{ $product->stock }} pcs
                                        </span>
                                    </td>

                                    <td class="py-4 px-6 text-center">
                                        @if($product->is_best_seller)
                                            <span class="inline-block bg-[#D4AF37] text-white text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-wider shadow-xs">Best Seller</span>
                                        @else
                                            <span class="text-gray-400 text-[11px] font-semibold">Standard</span>
                                        @endif
                                    </td>

                                    <td class="py-4 px-6 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <button type="button" @click="openDrawer('{{ route('products.show', ['product' => $product->id, 'drawer' => 1]) }}', 'Detail Produk')"
                                                class="p-2 bg-gray-50 hover:bg-black hover:text-white text-gray-600 rounded-xl transition-all shadow-xs" title="Lihat">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            </button>
                                            <button type="button" @click="openDrawer('{{ route('products.edit', ['product' => $product->id, 'drawer' => 1]) }}', 'Edit Produk')"
                                                class="p-2 bg-[#D4AF37]/10 hover:bg-[#D4AF37] hover:text-white text-[#D4AF37] rounded-xl transition-all shadow-xs" title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </button>
                                            <button @click="deleteModalOpen = true; deleteUrl = '{{ route('products.destroy', $product->id) }}'; productName = '{{ $product->name }}'" type="button"
                                                class="p-2 bg-red-50 hover:bg-red-600 hover:text-white text-red-600 rounded-xl transition-all shadow-xs" title="Hapus">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-16 text-center text-gray-400">
                                        <div class="flex flex-col items-center justify-center space-y-2">
                                            <svg class="w-10 h-10 text-gray-300 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                            <p class="text-sm font-bold text-gray-700">Belum ada data produk tersedia.</p>
                                            <p class="text-xs text-gray-400">Silakan tambahkan produk baru melalui tombol di atas.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($products->hasPages())
                    <div class="p-4 bg-gray-50/50 border-t border-gray-100">
                        {{ $products->links() }}
                    </div>
                @endif
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
                    <!-- Loading Spinner (Tampil saat Iframe memuat) -->
                    <div x-show="iframeLoading" class="absolute inset-0 flex items-center justify-center z-20 bg-[#F8F9FA]">
                        <svg class="animate-spin h-8 w-8 text-[#D4AF37]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    
                    <!-- Iframe -->
                    <iframe :src="drawerUrl" @load="iframeLoading = false" class="h-full w-full border-0 absolute inset-0 z-10" title="Panel produk"></iframe>
                </div>
            </section>
        </div>

        <!-- MODAL POP-UP HAPUS -->
        <!-- (Sama dengan sebelumnya) -->
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
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-2.5 rounded-xl bg-red-600 text-white text-xs font-bold hover:bg-red-700 transition shadow-md shadow-red-600/20">Ya, Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>