@if(!request('drawer'))<x-app-layout>@endif
    <div class="py-10 bg-[#F4F5F7] min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <!-- Tombol Kembali -->
            <div class="flex items-center justify-between bg-white px-6 py-4 rounded-2xl shadow-xs border border-gray-100">
                <div class="flex items-center gap-3">
                    <span class="w-3 h-3 rounded-full bg-[#D4AF37] ring-4 ring-[#D4AF37]/10"></span>
                    <span class="text-xs font-black uppercase tracking-widest text-gray-400">Ubah Data Ulasan</span>
                </div>
                <a href="{{ route('reviews.index') }}" class="px-4 py-2 bg-gray-50 hover:bg-black hover:text-white text-gray-700 rounded-xl text-xs font-bold transition-all border border-gray-200">
                    Kembali
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-xs border border-gray-100 p-8">
                <form action="{{ route('reviews.update', $review->id) }}" method="POST" class="space-y-6" target="{{ request('drawer') ? '_parent' : '_self' }}">
                    @csrf
                    @method('PUT')

                    <!-- Pilih Produk -->
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-wider text-gray-700">Pilih Produk <span class="text-red-500">*</span></label>
                        <select name="product_id" required class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:border-black focus:ring-0 text-xs font-bold bg-[#F9FAFB]">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ (old('product_id', $review->product_id) == $product->id) ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <span class="text-red-500 text-[11px] font-bold">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nama Reviewer -->
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-wider text-gray-700">Nama Pemberi Ulasan <span class="text-red-500">*</span></label>
                        <input type="text" name="user_name" value="{{ old('user_name', $review->user_name) }}" required class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:border-black focus:ring-0 text-xs font-bold bg-[#F9FAFB]">
                        @error('user_name')
                            <span class="text-red-500 text-[11px] font-bold">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Rating (1 - 5) -->
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-wider text-gray-700">Rating Bintang <span class="text-red-500">*</span></label>
                        <select name="rating" required class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:border-black focus:ring-0 text-xs font-bold bg-[#F9FAFB]">
                            <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>★★★★★ (5/5 - Sangat Memuaskan)</option>
                            <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>★★★★☆ (4/5 - Bagus)</option>
                            <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>★★★☆☆ (3/5 - Cukup)</option>
                            <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>★★☆☆☆ (2/5 - Kurang)</option>
                            <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>★☆☆☆☆ (1/5 - Buruk)</option>
                        </select>
                        @error('rating')
                            <span class="text-red-500 text-[11px] font-bold">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Komentar -->
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-wider text-gray-700">Isi Komentar / Ulasan <span class="text-red-500">*</span></label>
                        <textarea name="comment" rows="4" required class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:border-black focus:ring-0 text-xs font-medium bg-[#F9FAFB]">{{ old('comment', $review->comment) }}</textarea>
                        @error('comment')
                            <span class="text-red-500 text-[11px] font-bold">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                        <button type="submit" class="flex-1 py-3.5 bg-black hover:bg-[#D4AF37] text-white rounded-2xl text-xs font-bold tracking-wider uppercase transition-all shadow-md">
                            Perbarui Ulasan
                        </button>
                        <a href="{{ route('reviews.index') }}" class="px-6 py-3.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold tracking-wider uppercase transition-all text-center">
                            Batal
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
@if(!request('drawer'))</x-app-layout>@endif
