    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Halaman -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-black tracking-tight">
                        Edit <span class="text-[#D4AF37]">Produk</span>
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">Perbarui informasi untuk produk <span class="font-bold text-gray-800">{{ $product->name }}</span>.</p>
                </div>
            </div>

            <!-- Form Utama -->
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6" target="{{ request('drawer') ? '_parent' : '_self' }}">
                @csrf
                @method('PUT')

                <!-- SECTION 1: Klasifikasi & Nama Produk -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
                    <div class="border-b border-gray-100 pb-4 mb-6">
                        <h3 class="text-lg font-bold text-black flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                            1. Klasifikasi & Nama Produk
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">Ubah tipe kategori atau nama varian parfum.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Tipe Kategori (Original / Refill) -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tipe Kategori <span class="text-red-500">*</span></label>
                            <select name="category" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm" required>
                                <option value="">-- Pilih Tipe Kategori --</option>
                                <option value="Original" {{ old('category', $product->category) == 'Original' ? 'selected' : '' }}>Produk Original (Signature)</option>
                                <option value="Refill" {{ old('category', $product->category) == 'Refill' ? 'selected' : '' }}>Parfum Refill</option>
                            </select>
                            @error('category') <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small> @enderror
                        </div>

                        <!-- Varian / Konsentrasi Parfum (EDP, EDT, dll) -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Varian / Konsentrasi</label>
                            <select name="variant" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm">
                                <option value="">-- Pilih Varian (Opsional) --</option>
                                <option value="EDP" {{ old('variant', $product->variant) == 'EDP' ? 'selected' : '' }}>EDP (Eau de Parfum)</option>
                                <option value="EDT" {{ old('variant', $product->variant) == 'EDT' ? 'selected' : '' }}>EDT (Eau de Toilette)</option>
                                <option value="Roll-on" {{ old('variant', $product->variant) == 'Roll-on' ? 'selected' : '' }}>Roll-on</option>
                                <option value="Body Mist" {{ old('variant', $product->variant) == 'Body Mist' ? 'selected' : '' }}>Body Mist</option>
                            </select>
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Karakter Gender</label>
                            <select name="gender" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm">
                                <option value="">-- Pilih Gender --</option>
                                <option value="Pria" {{ old('gender', $product->gender) == 'Pria' ? 'selected' : '' }}>Pria (Maskulin)</option>
                                <option value="Wanita" {{ old('gender', $product->gender) == 'Wanita' ? 'selected' : '' }}>Wanita (Feminin)</option>
                                <option value="Unisex" {{ old('gender', $product->gender) == 'Unisex' ? 'selected' : '' }}>Unisex (Keduanya)</option>
                            </select>
                        </div>

                        <!-- Nama Produk -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Produk / Varian Aroma <span class="text-red-500">*</span></label>
                            <input type="text" name="name" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm" value="{{ old('name', $product->name) }}" required>
                            @error('name') <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>

                <!-- SECTION 2: Harga & Stok -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
                    <div class="border-b border-gray-100 pb-4 mb-6">
                        <h3 class="text-lg font-bold text-black flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                            2. Harga & Stok Barang
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">Sesuaikan nominal harga jual atau jumlah sisa stok.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Harga -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Harga Jual (Rp) <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 text-sm font-medium">Rp</span>
                                <input type="number" name="price" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 pl-12 pr-4 shadow-sm" value="{{ old('price', $product->price) }}" required>
                            </div>
                            @error('price') <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small> @enderror
                        </div>

                        <!-- Stok -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Stok Tersedia (Pcs)</label>
                            <input type="number" name="stock" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm" value="{{ old('stock', $product->stock) }}">
                        </div>
                    </div>
                </div>

                <!-- SECTION 3: Deskripsi & Foto -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
                    <div class="border-b border-gray-100 pb-4 mb-6">
                        <h3 class="text-lg font-bold text-black flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                            3. Media & Keterangan Tambahan
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">Perbarui catatan aroma atau ganti foto produk.</p>
                    </div>

                    <div class="space-y-6">
                        <!-- Deskripsi -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi / Karakter Aroma</label>
                            <textarea name="description" rows="3" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm p-4 shadow-sm">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <!-- Upload Foto & Preview -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Ganti Foto Produk</label>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                                <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-black file:text-white hover:file:bg-[#D4AF37] hover:file:text-white file:transition cursor-pointer border border-gray-200 rounded-xl p-2 bg-gray-50/50">
                                
                                @if($product->image)
                                    <div class="flex items-center gap-3 bg-gray-50 p-2 rounded-2xl border border-gray-200">
                                        <img src="{{ asset('storage/' . $product->image) }}" class="w-12 h-12 object-cover rounded-xl shadow-xs" alt="Foto Lama">
                                        <div class="text-xs pr-2">
                                            <span class="font-bold text-gray-800 block">Foto Saat Ini</span>
                                            <span class="text-gray-400">Akan diganti jika upload baru</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @error('image') <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small> @enderror
                        </div>

                        <!-- Checkbox Best Seller -->
                        <div class="flex items-center pt-2">
                            <input type="checkbox" id="is_best_seller" name="is_best_seller" value="1" {{ old('is_best_seller', $product->is_best_seller) ? 'checked' : '' }} class="w-4 h-4 text-black border-gray-300 rounded focus:ring-[#D4AF37]">
                            <label for="is_best_seller" class="ml-2.5 text-sm font-semibold text-gray-900 cursor-pointer">
                                Tandai sebagai <span class="text-[#D4AF37]">Best Seller</span> (Produk Pilihan Unggulan)
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-center justify-end gap-4 pt-4">
                    <a href="{{ route('products.index') }}" class="px-6 py-3 rounded-xl border border-gray-300 text-sm font-semibold text-gray-700 hover:bg-gray-100 transition" @if(request('drawer')) target="_parent" @endif>
                        Batal
                    </a>
                    <button type="submit" class="px-8 py-3 bg-black hover:bg-[#D4AF37] text-white text-sm font-semibold rounded-xl shadow-lg transition-all duration-300 hover:shadow-[#D4AF37]/30">
                        Perbarui Produk
                    </button>
                </div>

            </form>
        </div>
    </div>