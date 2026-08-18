<!-- Penyesuaian padding jika di dalam drawer agar tidak terlalu memakan tempat -->
<div class="{{ request('drawer') ? 'py-6' : 'py-12' }} bg-[#F8F9FA] min-h-screen">
    <div class="{{ request('drawer') ? 'max-w-full' : 'max-w-4xl' }} mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Halaman & Tombol Kembali -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-black tracking-tight">
                    Tambah <span class="text-[#D4AF37]">Produk Baru</span>
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-1">Lengkapi formulir di bawah ini untuk menambahkan produk ke katalog.</p>
            </div>
        </div>

        <!-- Form Card Utama (Tambahkan parameter drawer di action) -->
        <form action="{{ route('products.store', request('drawer') ? ['drawer' => 1] : []) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- SECTION 1: Informasi Dasar -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h3 class="text-lg font-bold text-black flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                        1. Informasi Dasar Produk
                    </h3>
                    <p class="text-xs text-gray-500 mt-0.5">Nama, jenis tipe kategori, dan target gender parfum.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Produk -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Produk / Varian <span class="text-red-500">*</span></label>
                        <input type="text" name="name" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm" value="{{ old('name') }}" placeholder="Contoh: Dynamyst atau Baccarat Rouge" required>
                        @error('name') <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small> @enderror
                    </div>

                    <!-- Tipe Kategori -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tipe Kategori <span class="text-red-500">*</span></label>
                        <select name="category" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm" required>
                            <option value="">-- Pilih Tipe Kategori --</option>
                            <option value="Original" {{ old('category') == 'Original' ? 'selected' : '' }}>Produk Original (Signature)</option>
                            <option value="Refill" {{ old('category') == 'Refill' ? 'selected' : '' }}>Parfum Refill</option>
                        </select>
                        @error('category') <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small> @enderror
                    </div>

                    <!-- Varian / Konsentrasi -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Varian / Konsentrasi</label>
                        <select name="variant" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm">
                            <option value="">-- Pilih Varian (Opsional) --</option>
                            <option value="EDP" {{ old('variant') == 'EDP' ? 'selected' : '' }}>EDP (Eau de Parfum)</option>
                            <option value="EDT" {{ old('variant') == 'EDT' ? 'selected' : '' }}>EDT (Eau de Toilette)</option>
                            <option value="Roll-on" {{ old('variant') == 'Roll-on' ? 'selected' : '' }}>Roll-on</option>
                            <option value="Body Mist" {{ old('variant') == 'Body Mist' ? 'selected' : '' }}>Body Mist</option>
                        </select>
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Karakter Gender</label>
                        <select name="gender" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm">
                            <option value="">-- Pilih Gender --</option>
                            <option value="Pria" {{ old('gender') == 'Pria' ? 'selected' : '' }}>Pria (Masculine)</option>
                            <option value="Wanita" {{ old('gender') == 'Wanita' ? 'selected' : '' }}>Wanita (Feminine)</option>
                            <option value="Unisex" {{ old('gender') == 'Unisex' ? 'selected' : '' }}>Unisex (Keduanya)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: Harga, Stok & Volume -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h3 class="text-lg font-bold text-black flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                        2. Harga & Stok
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Harga -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Harga Jual (Rp) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 text-sm font-medium">Rp</span>
                            <input type="number" name="price" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 pl-12 pr-4 shadow-sm" value="{{ old('price') }}" placeholder="45000" required>
                        </div>
                        @error('price') <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small> @enderror
                    </div>

                    <!-- Stok -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Stok (Pcs)</label>
                        <input type="number" name="stock" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm" value="{{ old('stock', 100) }}" placeholder="100">
                    </div>
                </div>
            </div>

            <!-- SECTION 3: Detail Tambahan & Media -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h3 class="text-lg font-bold text-black flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                        3. Deskripsi & Foto Produk
                    </h3>
                </div>

                <div class="space-y-6">
                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Aroma / Catatan</label>
                        <textarea name="description" rows="3" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm p-4 shadow-sm" placeholder="Jelaskan karakter aroma, top notes, atau kesan dari parfum ini...">{{ old('description') }}</textarea>
                    </div>

                    <!-- Upload Foto -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Unggah Foto Produk</label>
                        <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-black file:text-white hover:file:bg-[#D4AF37] file:transition cursor-pointer border border-gray-200 rounded-xl p-2 bg-gray-50/50">
                        @error('image') <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small> @enderror
                    </div>

                    <!-- Checkbox Best Seller -->
                    <div class="flex items-center pt-2">
                        <input type="checkbox" id="is_best_seller" name="is_best_seller" value="1" class="w-4 h-4 text-black border-gray-300 rounded focus:ring-[#D4AF37]">
                        <label for="is_best_seller" class="ml-2.5 text-sm font-semibold text-gray-900 cursor-pointer">
                            Tandai sebagai <span class="text-[#D4AF37]">Best Seller</span> (Produk Unggulan)
                        </label>
                    </div>
                </div>
            </div>

            <!-- Tombol Submit Akhir -->
            <div class="flex items-center justify-end gap-4 pt-4 pb-12">
                @if(request('drawer'))
                    <button type="button" onclick="window.parent.postMessage('close-drawer', '*')" class="px-6 py-3 rounded-xl border border-gray-300 text-sm font-semibold text-gray-700 hover:bg-gray-100 transition">
                        Batal
                    </button>
                @else
                    <a href="{{ route('products.index') }}" class="px-6 py-3 rounded-xl border border-gray-300 text-sm font-semibold text-gray-700 hover:bg-gray-100 transition">
                        Batal
                    </a>
                @endif
                
                <button type="submit" class="px-8 py-3 bg-black hover:bg-[#D4AF37] text-white text-sm font-semibold rounded-xl shadow-lg transition-all duration-300 hover:shadow-[#D4AF37]/30">
                    Simpan Produk
                </button>
            </div>

        </form>
    </div>
</div>