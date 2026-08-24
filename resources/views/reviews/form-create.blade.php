<div class="{{ request('drawer') ? 'py-6' : 'py-12' }} bg-[#F8F9FA] min-h-screen" x-data="{ rating: '{{ old('rating', '5') }}', tempRating: null }">

    <div class="{{ request('drawer') ? 'max-w-full' : 'max-w-4xl' }} mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header Halaman & Tombol Kembali --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-black tracking-tight">
                    Tambah <span class="text-[#D4AF37]">Ulasan Produk</span>
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-1">
                    Tambahkan ulasan atau testimoni manual untuk produk katalog Perfu.me.
                </p>
            </div>

            @if (!request('drawer'))
                <a href="{{ route('reviews.index') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:text-black transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18">
                        </path>
                    </svg>
                    Kembali
                </a>
            @endif
        </div>

        <form action="{{ route('reviews.store', request('drawer') ? ['drawer' => 1] : []) }}" method="POST" class="space-y-6">
            @csrf

            @if (request('drawer'))
                <input type="hidden" name="drawer" value="1">
            @endif

            <!-- SECTION 1: Relasi & Reviewer -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h3 class="text-lg font-bold text-black flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                        1. Target Produk & Pemberi Ulasan
                    </h3>
                    <p class="text-xs text-gray-500 mt-0.5">Pilih produk yang diulas beserta nama reviewer.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Pilih Produk -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Produk <span
                                class="text-red-500">*</span></label>
                        <select name="product_id"
                            class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm font-medium"
                            required>
                            <option value="">-- Pilih Produk yang Diulas --</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }} (Rp {{ number_format($product->price, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Nama Reviewer -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Pemberi Ulasan <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="user_name"
                            class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm font-medium"
                            value="{{ old('user_name') }}" placeholder="Contoh: Budi Santoso" required>
                        @error('user_name')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- SECTION 2: Penilaian & Komentar -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h3 class="text-lg font-bold text-black flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                        2. Rating & Isi Ulasan
                    </h3>
                    <p class="text-xs text-gray-500 mt-0.5">Penilaian bintang serta komentar performa aroma parfum.</p>
                </div>

                <div class="space-y-6">
                    <!-- Rating Bintang Kustom -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Rating Bintang <span
                                class="text-red-500">*</span></label>

                        <!-- Input tersembunyi untuk backend -->
                        <input type="hidden" name="rating" x-model="rating">

                        <!-- Grid Pilihan Bintang Interaktif -->
                        <div class="grid grid-cols-1 sm:grid-cols-5 gap-3">
                            <template x-for="item in [
                                { val: '5', stars: '★★★★★', label: '5/5 (Sangat Bagus)' },
                                { val: '4', stars: '★★★★☆', label: '4/5 (Bagus)' },
                                { val: '3', stars: '★★★☆☆', label: '3/5 (Cukup)' },
                                { val: '2', stars: '★★☆☆☆', label: '2/5 (Kurang)' },
                                { val: '1', stars: '★☆☆☆☆', label: '1/5 (Buruk)' }
                            ]" :key="item.val">
                                <button type="button" @click="rating = item.val"
                                    @mouseenter="tempRating = item.val"
                                    @mouseleave="tempRating = null"
                                    :class="(tempRating ? tempRating == item.val : rating == item.val) ? 
                                        'border-black bg-black text-white shadow-md scale-[1.02]' : 
                                        'border-gray-200 bg-gray-50 text-gray-700 hover:bg-gray-100'"
                                    class="p-3 rounded-xl border text-xs font-semibold flex flex-col items-center justify-center gap-1 transition-all duration-200">
                                    <span class="text-[#D4AF37] text-base" x-text="item.stars"></span>
                                    <span x-text="item.label"></span>
                                </button>
                            </template>
                        </div>
                        @error('rating')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Komentar -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Komentar / Ulasan <span
                                class="text-red-500">*</span></label>
                        <textarea name="comment" rows="4"
                            class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm p-4 shadow-sm font-medium"
                            placeholder="Tuliskan ulasan detail mengenai ketahanan, aroma, atau pelayanan..." required>{{ old('comment') }}</textarea>
                        @error('comment')
                            <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Tombol Submit Akhir -->
            <div class="flex items-center justify-end gap-4 pt-4 pb-8">
                <a href="{{ route('reviews.index') }}"
                    target="{{ request('drawer') ? '_parent' : '_self' }}"
                    class="px-6 py-3 rounded-xl border border-gray-300 text-sm font-semibold text-gray-700 hover:bg-gray-100 transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-8 py-3 bg-black hover:bg-[#D4AF37] text-white text-sm font-semibold rounded-xl shadow-lg transition-all duration-300 hover:shadow-[#D4AF37]/30">
                    Simpan Ulasan
                </button>
            </div>

        </form>
    </div>
</div>
