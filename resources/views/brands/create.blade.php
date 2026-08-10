<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Halaman & Tombol Kembali -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-black tracking-tight">
                        Tambah <span class="text-[#D4AF37]">Brand Baru</span>
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">Lengkapi formulir di bawah ini untuk menambahkan brand partner ke sistem Perfu.me.</p>
                </div>
                <a href="{{ route('brands.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:text-black transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali
                </a>
            </div>

            <!-- Form Card Utama -->
            <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- SECTION 1: Informasi Brand -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-gray-100">
                    <div class="border-b border-gray-100 pb-4 mb-6">
                        <h3 class="text-lg font-bold text-black flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#D4AF37]"></span>
                            1. Informasi Identitas Brand
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">Nama resmi dan logo brand parfum.</p>
                    </div>

                    <div class="grid grid-cols-1 gap-6">
                        <!-- Nama Brand -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Brand <span class="text-red-500">*</span></label>
                            <input type="text" name="name" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm py-3 px-4 shadow-sm" value="{{ old('name') }}" placeholder="Contoh: Chanel, Dior, Jo Malone" required>
                            @error('name') <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small> @enderror
                        </div>

                        <!-- Upload Logo Brand -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Unggah Logo Brand (Opsional)</label>
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
                        <textarea name="description" rows="4" class="w-full rounded-xl border-gray-300 focus:border-[#D4AF37] focus:ring focus:ring-[#D4AF37]/20 transition text-sm p-4 shadow-sm" placeholder="Tuliskan sejarah singkat atau profil brand...">{{ old('description') }}</textarea>
                        @error('description') <small class="text-red-500 text-xs mt-1 block">{{ $message }}</small> @enderror
                    </div>
                </div>

                <!-- Tombol Submit Akhir -->
                <div class="flex items-center justify-end gap-4 pt-4">
                    <a href="{{ route('brands.index') }}" class="px-6 py-3 rounded-xl border border-gray-300 text-sm font-semibold text-gray-700 hover:bg-gray-100 transition">
                        Batal
                    </a>
                    <button type="submit" class="px-8 py-3 bg-black hover:bg-[#D4AF37] text-white text-sm font-semibold rounded-xl shadow-lg transition-all duration-300 hover:shadow-[#D4AF37]/30">
                        Simpan Brand
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>