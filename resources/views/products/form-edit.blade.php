<!-- resources/views/products/edit.blade.php -->

<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-extrabold text-black tracking-tight">
                    Edit <span class="text-[#D4AF37]">Produk</span>
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Perbarui informasi untuk produk
                    <span class="font-bold text-gray-800">{{ $product->name }}</span>.
                </p>
            </div>
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6" target="{{ request('drawer') ? '_parent' : '_self' }}">
            @csrf
            @method('PUT')

            <!-- SECTION 1 -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h3 class="text-lg font-bold text-black flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                        1. Informasi Dasar Produk
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Produk / Varian <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                            class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm">
                        @error('name')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Tipe Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="category" required
                            class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm">
                            <option value="">-- Pilih Tipe Kategori --</option>
                            <option value="Original"
                                {{ old('category', $product->category) == 'Original' ? 'selected' : '' }}>
                                Produk Original (Signature)
                            </option>
                            <option value="Refill"
                                {{ old('category', $product->category) == 'Refill' ? 'selected' : '' }}>
                                Parfum Refill
                            </option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Varian / Konsentrasi
                        </label>
                        <select name="variant"
                            class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm">
                            <option value="">-- Pilih Varian --</option>
                            <option value="EDP" {{ old('variant', $product->variant) == 'EDP' ? 'selected' : '' }}>
                                EDP (Eau de Parfum)</option>
                            <option value="EDT" {{ old('variant', $product->variant) == 'EDT' ? 'selected' : '' }}>
                                EDT (Eau de Toilette)</option>
                            <option value="Roll-on"
                                {{ old('variant', $product->variant) == 'Roll-on' ? 'selected' : '' }}>Roll-on</option>
                            <option value="Body Mist"
                                {{ old('variant', $product->variant) == 'Body Mist' ? 'selected' : '' }}>Body Mist
                            </option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Karakter Gender
                        </label>
                        <select name="gender"
                            class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm">
                            <option value="">-- Pilih Gender --</option>
                            <option value="Pria" {{ old('gender', $product->gender) == 'Pria' ? 'selected' : '' }}>
                                Pria (Masculine)</option>
                            <option value="Wanita" {{ old('gender', $product->gender) == 'Wanita' ? 'selected' : '' }}>
                                Wanita (Feminine)</option>
                            <option value="Unisex" {{ old('gender', $product->gender) == 'Unisex' ? 'selected' : '' }}>
                                Unisex (Keduanya)</option>
                        </select>
                    </div>

                </div>
            </div>

            <!-- SECTION 2 -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h3 class="text-lg font-bold text-black flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                        2. Detail Aroma
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Top Note</label>
                        <input type="text" name="top_note" value="{{ old('top_note', $product->top_note) }}"
                            placeholder="Contoh: Bergamot, Lemon, Lavender"
                            class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm">
                        @error('top_note')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Middle Note</label>
                        <input type="text" name="middle_note"
                            value="{{ old('middle_note', $product->middle_note) }}"
                            placeholder="Contoh: Rose, Jasmine, Cinnamon"
                            class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm">
                        @error('middle_note')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Base Note</label>
                        <input type="text" name="base_note" value="{{ old('base_note', $product->base_note) }}"
                            placeholder="Contoh: Vanilla, Musk, Sandalwood"
                            class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm">
                        @error('base_note')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Komposisi</label>
                        <textarea name="composition" rows="3" placeholder="Contoh: Alcohol, fragrance, aqua..."
                            class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm p-4 shadow-sm">{{ old('composition', $product->composition) }}</textarea>
                        @error('composition')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <!-- SECTION 3 -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h3 class="text-lg font-bold text-black flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                        3. Packaging & Volume
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Packaging
                        </label>
                        <input type="text" name="packaging" value="{{ old('packaging', $product->packaging) }}"
                            placeholder="Contoh: Botol kaca, Box premium"
                            class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm">
                        @error('packaging')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Volume (ml)
                        </label>
                        <div class="relative">
                            <input type="number" name="volume" value="{{ old('volume', $product->volume) }}"
                                min="1" placeholder="50"
                                class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 pl-4 pr-14 shadow-sm">
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 text-sm font-medium">
                                ml
                            </span>
                        </div>
                        @error('volume')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <!-- SECTION 4 -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h3 class="text-lg font-bold text-black flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                        4. Harga & Stok
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Harga Jual (Rp) <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 text-sm font-medium">
                                Rp
                            </span>
                            <input type="number" name="price" value="{{ old('price', $product->price) }}"
                                min="0" required
                                class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 pl-12 pr-4 shadow-sm">
                        </div>
                        @error('price')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Stok Tersedia (Pcs)
                        </label>
                        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                            min="0"
                            class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm">
                        @error('stock')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <!-- SECTION 5 -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h3 class="text-lg font-bold text-black flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                        5. Deskripsi & Media
                    </h3>
                </div>

                <div class="space-y-6">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Deskripsi / Karakter Aroma
                        </label>
                        <textarea name="description" rows="5"
                            class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm p-4 shadow-sm">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Ganti Foto Produk
                        </label>

                        <div class="flex flex-col gap-4">

                            <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/webp"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-black file:text-white hover:file:bg-[#D4AF37] file:transition cursor-pointer border border-gray-200 rounded-xl p-2 bg-gray-50/50">

                            @if ($product->image)
                                <div class="flex items-center gap-3 bg-gray-50 p-3 rounded-2xl border border-gray-200">
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                        class="w-16 h-16 object-cover rounded-xl shadow-sm" alt="Foto Produk">
                                    <div class="text-xs">
                                        <span class="font-bold text-gray-800 block">Foto Saat Ini</span>
                                        <span class="text-gray-400">Akan diganti jika upload baru.</span>
                                    </div>
                                </div>
                            @endif

                        </div>

                        @error('image')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Ganti Foto Produk (Hover)
                        </label>

                        <div class="flex flex-col gap-4">

                            <input type="file" name="image_hover"
                                accept="image/jpeg,image/png,image/jpg,image/webp"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-black file:text-white hover:file:bg-[#D4AF37] file:transition cursor-pointer border border-gray-200 rounded-xl p-2 bg-gray-50/50">

                            @if ($product->image_hover)
                                <div class="flex items-center gap-3 bg-gray-50 p-3 rounded-2xl border border-gray-200">
                                    <img src="{{ asset('storage/' . $product->image_hover) }}"
                                        class="w-16 h-16 object-cover rounded-xl shadow-sm" alt="Foto Hover Produk">
                                    <div class="text-xs">
                                        <span class="font-bold text-gray-800 block">Foto Hover Saat Ini</span>
                                        <span class="text-gray-400">Akan diganti jika upload baru.</span>
                                    </div>
                                </div>
                            @endif

                        </div>

                        @error('image_hover')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="flex items-center pt-2">
                        <input type="checkbox" id="is_best_seller" name="is_best_seller" value="1"
                            {{ old('is_best_seller', $product->is_best_seller) ? 'checked' : '' }}
                            class="w-4 h-4 text-black border-gray-300 rounded focus:ring-[#D4AF37]">

                        <label for="is_best_seller" class="ml-2.5 text-sm font-semibold text-gray-900 cursor-pointer">
                            Tandai sebagai
                            <span class="text-[#D4AF37]">Best Seller</span>
                        </label>
                    </div>

                </div>
            </div>

            <div class="flex items-center justify-end gap-4 pt-4">
                <button type="submit"
                    class="px-8 py-3 bg-black hover:bg-[#D4AF37] text-white text-sm font-semibold rounded-xl shadow-lg transition-all duration-300 hover:shadow-[#D4AF37]/30">
                    Perbarui Produk
                </button>
            </div>

        </form>
    </div>
</div>
