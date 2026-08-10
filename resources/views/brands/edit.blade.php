<x-app-layout>
    <div class="py-10 bg-[#F4F5F7] min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <!-- Tombol Kembali -->
            <div class="flex items-center justify-between bg-white px-6 py-4 rounded-2xl shadow-xs border border-gray-100">
                <div class="flex items-center gap-3">
                    <span class="w-3 h-3 rounded-full bg-[#D4AF37] ring-4 ring-[#D4AF37]/10"></span>
                    <span class="text-xs font-black uppercase tracking-widest text-gray-400">Ubah Data Brand: {{ $brand->name }}</span>
                </div>
                <a href="{{ route('brands.index') }}" class="px-4 py-2 bg-gray-50 hover:bg-black hover:text-white text-gray-700 rounded-xl text-xs font-bold transition-all border border-gray-200">
                    Kembali
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-xs border border-gray-100 p-8">
                <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nama Brand -->
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-wider text-gray-700">Nama Brand <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $brand->name) }}" required class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:border-black focus:ring-0 text-xs font-bold bg-[#F9FAFB]">
                        @error('name')
                            <span class="text-red-500 text-[11px] font-bold">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Preview Logo Lama & Upload Baru -->
                    <div class="space-y-3">
                        <label class="text-xs font-black uppercase tracking-wider text-gray-700">Logo Brand</label>
                        
                        @if($brand->logo)
                            <div class="flex items-center gap-4 p-4 rounded-2xl bg-gray-50 border border-gray-100">
                                <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="w-16 h-16 object-cover rounded-xl border border-gray-200 shadow-sm">
                                <div>
                                    <span class="text-xs font-bold text-gray-900 block">Logo Saat Ini</span>
                                    <span class="text-[11px] text-gray-400">Unggah file baru di bawah jika ingin menggantinya.</span>
                                </div>
                            </div>
                        @else
                            <p class="text-xs text-gray-400 font-medium italic">Belum ada logo yang diunggah untuk brand ini.</p>
                        @endif

                        <input type="file" name="logo" accept="image/*" class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:border-black focus:ring-0 text-xs font-bold bg-[#F9FAFB] file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-black file:text-white hover:file:bg-gray-800 cursor-pointer mt-2">
                        @error('logo')
                            <span class="text-red-500 text-[11px] font-bold">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Deskripsi Brand -->
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-wider text-gray-700">Deskripsi Brand</label>
                        <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:border-black focus:ring-0 text-xs font-medium bg-[#F9FAFB]">{{ old('description', $brand->description) }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-[11px] font-bold">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                        <button type="submit" class="flex-1 py-3.5 bg-black hover:bg-[#D4AF37] text-white rounded-2xl text-xs font-bold tracking-wider uppercase transition-all shadow-md">
                            Perbarui Brand
                        </button>
                        <a href="{{ route('brands.index') }}" class="px-6 py-3.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold tracking-wider uppercase transition-all text-center">
                            Batal
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>