<div x-data="{ deleteModalOpen: false, imageModalOpen: false, activeTab: 'description', activeImage: '{{ $product->image ? asset('storage/' . $product->image) : '' }}' }" class="min-h-screen bg-[#F8F9FA] py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <!-- Breadcrumb / Navigasi Atas -->
            <div class="flex items-center justify-between bg-white px-6 py-3 rounded-2xl shadow-xs border border-gray-100 text-xs">
                <div class="flex items-center gap-2 text-gray-500 font-medium">
                <a href="{{ route('products.index') }}" class="hover:text-black transition" @if(request('drawer')) target="_parent" @endif>Daftar Produk</a>
                    <span>/</span>
                    <span class="text-gray-900 font-bold uppercase tracking-wider">{{ $product->category ?? 'Katalog' }}</span>
                    <span>/</span>
                    <span class="text-gray-400 truncate max-w-xs">{{ $product->name }}</span>
                </div>
                <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-black hover:text-white text-gray-700 rounded-xl font-bold transition-all flex items-center gap-1.5" @if(request('drawer')) target="_parent" @endif>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali
                </a>
            </div>

            <!-- MAIN CONTAINER: E-COMMERCE PRODUCT DETAIL -->
            <div class="bg-white rounded-3xl shadow-xs border border-gray-100 overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-0 lg:divide-x divide-gray-100">
                    
                    <!-- ========================================== -->
                    <!-- KOLOM KIRI: GALERI FOTO (STICKY)          -->
                    <!-- ========================================== -->
                    <div class="lg:col-span-5 p-6 lg:p-8 space-y-4 lg:sticky lg:top-8 lg:self-start">
                        <!-- Foto Utama -->
                        <div class="w-full h-[380px] sm:h-[420px] rounded-2xl overflow-hidden bg-gray-50 border border-gray-100 relative group cursor-pointer shadow-inner" @click="imageModalOpen = true">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                                
                                <!-- Badge Best Seller -->
                                @if($product->is_best_seller)
                                    <div class="absolute top-4 left-4 z-10">
                                        <span class="bg-amber-500 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-lg shadow-md flex items-center gap-1">
                                            ⭐ Best Seller
                                        </span>
                                    </div>
                                @endif

                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <span class="bg-white/90 backdrop-blur-xs text-black px-4 py-2 rounded-xl text-xs font-bold shadow-lg">Perbesar Foto</span>
                                </div>
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 p-6 text-center">
                                    <svg class="w-12 h-12 mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span class="text-xs font-bold tracking-wider">TIDAK ADA FOTO PRODUK</span>
                                </div>
                            @endif
                        </div>

                        <!-- Bagikan / Info Singkat Toko -->
                        <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100 flex items-center justify-between text-xs text-gray-500">
                            <span class="font-medium">Bagikan produk ini ke kolega?</span>
                            <div class="flex items-center gap-2">
                                <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link produk disalin!');" class="p-2 bg-white rounded-xl border border-gray-200 hover:bg-gray-100 transition font-bold text-gray-700 flex items-center gap-1">
                                    🔗 Salin Link
                                </button>
                            </div>
                        </div>

                        <!-- Tombol Aksi Manajemen (Edit & Hapus) -->
                        <div class="flex items-center gap-3 pt-2">
                            <a href="{{ route('products.edit', ['product' => $product->id, 'drawer' => request('drawer')]) }}" class="flex-1 py-3 bg-black hover:bg-gray-800 text-white text-center rounded-xl text-xs font-bold tracking-wider uppercase transition-all shadow-sm flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Edit Produk
                            </a>
                            <button @click="deleteModalOpen = true" type="button" class="py-3 px-4 bg-red-50 hover:bg-red-600 hover:text-white text-red-600 rounded-xl text-xs font-bold tracking-wider uppercase transition-all flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                    </div>

                    <!-- ========================================== -->
                    <!-- KOLOM KANAN: DETAIL INFORMASI PRODUK      -->
                    <!-- ========================================== -->
                    <div class="lg:col-span-7 p-6 lg:p-8 space-y-6">
                        
                        <!-- Nama & Kategori -->
                        <div class="space-y-2">
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="px-3 py-1 rounded-md text-[10px] font-black bg-emerald-50 text-emerald-700 border border-emerald-200 uppercase tracking-widest">
                                    {{ $product->category ?? 'Kategori Umum' }}
                                </span>
                                @if($product->variant)
                                    <span class="px-3 py-1 rounded-md text-[10px] font-black bg-blue-50 text-blue-700 border border-blue-200 uppercase tracking-widest">
                                        Varian: {{ $product->variant }}
                                    </span>
                                @endif
                                @if($product->gender)
                                    <span class="px-3 py-1 rounded-md text-[10px] font-black bg-purple-50 text-purple-700 border border-purple-200 uppercase tracking-widest">
                                        Gender: {{ $product->gender }}
                                    </span>
                                @endif
                            </div>

                            <h1 class="text-2xl sm:text-3xl font-black text-gray-900 tracking-tight">{{ $product->name }}</h1>

                            <!-- Rating Simulasi / Terjual -->
                            <div class="flex items-center gap-4 text-xs text-gray-500 pt-1">
                                <div class="flex items-center text-amber-500 font-bold gap-1">
                                    <span>★ 4.9</span>
                                    <span class="text-gray-400 font-normal">(120+ Ulasan)</span>
                                </div>
                                <span class="text-gray-300">•</span>
                                <span>Terjual <strong class="text-gray-800">500+ pcs</strong></span>
                            </div>
                        </div>

                        <!-- Harga Box Style Tokopedia -->
                        <div class="p-5 rounded-2xl bg-[#FAFAFA] border border-gray-100 space-y-2">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Harga Katalog Toko</span>
                            <div class="flex items-baseline gap-3">
                                <span class="text-3xl sm:text-4xl font-black text-emerald-600 tracking-tight">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <span class="text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded font-bold">Harga Resmi Sistem</span>
                            </div>
                        </div>

                        <!-- Informasi Stok & Pengiriman Ringkas -->
                        <div class="grid grid-cols-2 gap-4 pt-1">
                            <div class="p-4 rounded-xl border border-gray-100 bg-white space-y-1 shadow-2xs">
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Stok Gudang</span>
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full {{ $product->stock < 10 ? 'bg-red-500 animate-pulse' : 'bg-emerald-500' }}"></span>
                                    <span class="font-extrabold text-sm {{ $product->stock < 10 ? 'text-red-600' : 'text-gray-900' }}">
                                        {{ $product->stock }} Unit Tersedia
                                    </span>
                                </div>
                            </div>
                            <div class="p-4 rounded-xl border border-gray-100 bg-white space-y-1 shadow-2xs">
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Pengiriman</span>
                                <span class="font-extrabold text-sm text-gray-900 block">Dikirim dari Bogor</span>
                            </div>
                        </div>

                        <hr class="border-gray-100">

                        <!-- TAB INFORMASI: Deskripsi & Spesifikasi -->
                        <div class="space-y-4">
                            <!-- Navigasi Tab -->
                            <div class="flex items-center gap-6 border-b border-gray-100">
                                <button @click="activeTab = 'description'" :class="activeTab === 'description' ? 'border-black text-black font-black' : 'border-transparent text-gray-400 font-semibold'" class="pb-3 text-xs uppercase tracking-wider border-b-2 transition-all">
                                    Detail & Deskripsi
                                </button>
                                <button @click="activeTab = 'specs'" :class="activeTab === 'specs' ? 'border-black text-black font-black' : 'border-transparent text-gray-400 font-semibold'" class="pb-3 text-xs uppercase tracking-wider border-b-2 transition-all">
                                    Spesifikasi Sistem
                                </button>
                            </div>

                            <!-- Konten Tab 1: Deskripsi -->
                            <div x-show="activeTab === 'description'" class="text-xs text-gray-600 leading-relaxed space-y-3 min-h-[120px]">
                                <p class="whitespace-pre-line">{{ $product->description ?? 'Belum ada catatan deskripsi yang ditambahkan untuk produk ini.' }}</p>
                            </div>

                            <!-- Konten Tab 2: Spesifikasi -->
                            <div x-show="activeTab === 'specs'" class="text-xs text-gray-600 space-y-2.5 min-h-[120px]">
                                <div class="flex justify-between py-1.5 border-b border-gray-100">
                                    <span class="text-gray-400">ID Produk (Database)</span>
                                    <span class="font-bold text-gray-900">#{{ $product->id }}</span>
                                </div>
                                <div class="flex justify-between py-1.5 border-b border-gray-100">
                                    <span class="text-gray-400">Kategori Utama</span>
                                    <span class="font-bold text-gray-900">{{ $product->category ?? '-' }}</span>
                                </div>
                                <div class="flex justify-between py-1.5 border-b border-gray-100">
                                    <span class="text-gray-400">Terakhir Diperbarui</span>
                                    <span class="font-bold text-gray-900">{{ $product->updated_at->diffForHumans() }}</span>
                                </div>
                                <div class="flex justify-between py-1.5">
                                    <span class="text-gray-400">Waktu Ditambahkan</span>
                                    <span class="font-bold text-gray-900">{{ $product->created_at->format('d M Y, H:i') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Catatan Keamanan Belanja / Jaminan Toko -->
                        <div class="p-4 rounded-2xl bg-blue-50/50 border border-blue-100/60 flex items-start gap-3">
                            <span class="text-lg">🛡️</span>
                            <div class="text-xs space-y-0.5">
                                <strong class="text-blue-900 font-bold block">Jaminan Produk Berkualitas</strong>
                                <p class="text-blue-700/80">Semua data produk di dalam database sistem telah diverifikasi dan siap untuk dipublikasikan ke etalase publik.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- MODAL LIGHTBOX ZOOM GAMBAR                -->
        <!-- ========================================== -->
        @if($product->image)
        <div x-show="imageModalOpen" class="fixed inset-0 z-50 bg-black/90 backdrop-blur-sm flex items-center justify-center p-4" style="display: none;" x-transition.opacity>
            <div @click.away="imageModalOpen = false" class="relative max-w-4xl w-full max-h-[90vh] flex flex-col items-center">
                <button @click="imageModalOpen = false" class="absolute -top-12 right-0 text-white hover:text-amber-400 text-xs font-bold uppercase tracking-widest px-4 py-2 bg-white/10 rounded-xl transition">Tutup [X]</button>
                <img src="{{ asset('storage/' . $product->image) }}" class="max-h-[80vh] w-auto rounded-2xl shadow-2xl object-contain border border-white/10" alt="Preview Full">
                <p class="text-white text-xs font-bold tracking-wider mt-4 uppercase">{{ $product->name }}</p>
            </div>
        </div>
        @endif

        <!-- ========================================== -->
        <!-- MODAL KONFIRMASI HAPUS                     -->
        <!-- ========================================== -->
        <div x-show="deleteModalOpen" class="fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-2xs flex items-center justify-center p-4" style="display: none;" x-transition.opacity>
            <div @click.away="deleteModalOpen = false" class="bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-gray-100 text-center space-y-4" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                <div class="w-14 h-14 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center mx-auto border border-red-100 font-black text-xl">!</div>
                <div>
                    <h3 class="text-base font-black text-gray-900">Konfirmasi Hapus Produk</h3>
                    <p class="text-xs text-gray-500 mt-1">Yakin ingin menghapus <span class="font-bold text-gray-800">{{ $product->name }}</span> dari sistem database?</p>
                </div>
                <div class="flex items-center gap-2 pt-2">
                    <button @click="deleteModalOpen = false" type="button" class="flex-1 py-2.5 rounded-xl border border-gray-200 text-xs font-bold text-gray-700 hover:bg-gray-100 transition">Batal</button>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="flex-1" @if(request('drawer')) target="_parent" @endif>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-2.5 rounded-xl bg-red-600 text-white text-xs font-bold hover:bg-red-700 transition shadow-md shadow-red-600/20">Ya, Hapus</button>
                    </form>
                </div>
            </div>
        </div>

    </div>