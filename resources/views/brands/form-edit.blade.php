<form action="{{ route('brands.update', $brand) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    @if (request('drawer'))
        <input type="hidden" name="drawer" value="1">
    @endif

    <!-- SECTION 1: Informasi Brand -->
    <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
        <div class="border-b border-gray-100 pb-4 mb-6">
            <h3 class="text-lg font-bold text-black flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                1. Identitas Brand
            </h3>
            <p class="text-xs text-gray-500 mt-0.5">Nama resmi dan logo brand parfum.</p>
        </div>

        <div class="grid grid-cols-1 gap-6">
            <!-- Nama Brand -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Brand <span class="text-red-500">*</span></label>
                <input type="text" name="name" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm" value="{{ old('name', $brand->name) }}" required>
                @error('name') <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small> @enderror
            </div>

            <!-- Upload Logo Brand -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Unggah Logo Brand Baru (Opsional)</label>

                @if($brand->logo)
                    <div class="flex items-center gap-4 mb-3 p-3 bg-gray-50 rounded-xl border border-gray-200">
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="w-12 h-12 object-cover rounded-lg">
                        <span class="text-xs text-gray-500">Logo saat ini</span>
                    </div>
                @endif

                <input type="file" name="logo" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-black file:text-white hover:file:bg-[#D4AF37] hover:file:text-white file:transition cursor-pointer border border-gray-200 rounded-xl p-2 bg-gray-50/50">
                <p class="text-[11px] text-gray-400 mt-1.5">Format yang diizinkan: JPG, JPEG, PNG, WEBP. Maksimal ukuran file 2MB.</p>
                @error('logo') <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small> @enderror
            </div>
        </div>
    </div>

    <!-- SECTION 2: Deskripsi -->
    <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
        <div class="border-b border-gray-100 pb-4 mb-6">
            <h3 class="text-lg font-bold text-black flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                2. Keterangan Tambahan
            </h3>
            <p class="text-xs text-gray-500 mt-0.5">Catatan atau latar belakang mengenai brand tersebut.</p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Brand</label>
            <textarea name="description" rows="4" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm p-4 shadow-sm">{{ old('description', $brand->description) }}</textarea>
            @error('description') <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small> @enderror
        </div>
    </div>

    <!-- Tombol Submit Akhir -->
    <div class="flex items-center justify-end gap-4 pt-4">
        @if(request('drawer'))
            <button type="button" @click="window.parent.document.querySelector('[x-data]').__x.$data.drawerOpen = false" class="px-6 py-3 rounded-xl border border-gray-300 text-sm font-semibold text-gray-700 hover:bg-gray-100 transition cursor-pointer">
                Batal
            </button>
        @else
            <a href="{{ route('brands.index') }}" class="px-6 py-3 rounded-xl border border-gray-300 text-sm font-semibold text-gray-700 hover:bg-gray-100 transition">
                Batal
            </a>
        @endif
        <button type="submit" class="px-8 py-3 bg-black hover:bg-[#D4AF37] text-white text-sm font-semibold rounded-xl shadow-lg transition-all duration-300 hover:shadow-[#D4AF37]/30 cursor-pointer">
            Perbarui Brand
        </button>
    </div>
</form>
