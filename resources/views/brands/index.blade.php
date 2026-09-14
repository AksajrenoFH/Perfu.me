<x-app-layout>
    <div x-data="{ 
            deleteModalOpen: false, 
            deleteUrl: '', 
            brandName: '', 
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
                setTimeout(() => { this.drawerUrl = ''; }, 300);
                this.iframeLoading = false;
            }
         }" 
         @message.window="if ($event.data === 'brand-saved') { closeDrawer(); window.location.reload(); }"
         class="min-h-screen bg-[#F8F9FA] py-8">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            {{-- Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-100 shadow-xs">
                <div class="flex items-center gap-4">
                    <div class="h-12 w-12 rounded-2xl bg-black flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#D4AF37]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-gray-900 tracking-tight">Manajemen Brand Parfum</h1>
                        <p class="text-xs text-gray-500 mt-1">Kelola seluruh daftar merek atau brand parfum resmi Perfu.me.</p>
                    </div>
                </div>
                
                <button type="button" @click="openDrawer('{{ route('brands.create', ['drawer' => 1]) }}', 'Tambah Brand Baru')"
                    class="inline-flex items-center justify-center gap-2 bg-black hover:bg-gray-800 transition-colors text-white px-5 py-3 rounded-2xl text-xs font-bold shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#D4AF37]" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Brand Baru
                </button>
            </div>

            {{-- Filter & search --}}
            <div class="bg-white p-4 rounded-3xl shadow-xs border border-gray-100">
                <form action="{{ route('brands.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <div class="md:col-span-9">
                        <label for="brand-search" class="block mb-2 text-[11px] font-black uppercase tracking-wider text-gray-400">Cari Brand</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                            <input id="brand-search" type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau slug brand..."
                                class="w-full pl-10 rounded-2xl border-gray-200 bg-gray-50/80 py-2.5 text-xs font-medium focus:border-[#D4AF37] focus:ring-[#D4AF37]/20">
                        </div>
                    </div>
                    <div class="md:col-span-3 flex gap-2">
                        <button type="submit" class="flex-1 bg-black py-2.5 rounded-2xl text-xs font-bold text-white hover:bg-[#D4AF37] transition">Terapkan</button>
                        @if(request('search'))
                            <a href="{{ route('brands.index') }}" class="px-4 py-2.5 rounded-2xl bg-gray-100 text-xs font-bold text-gray-600 hover:bg-gray-200 transition text-center flex items-center justify-center">Reset</a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- Success alert --}}
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                    class="flex items-center justify-between gap-3 bg-emerald-50 text-emerald-800 border border-emerald-200 p-4 rounded-2xl text-sm shadow-xs" role="alert">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center font-bold">✓</div>
                        <p class="text-xs font-bold">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="text-emerald-600 hover:text-emerald-800 font-bold px-2">✕</button>
                </div>
            @endif

            {{-- Table --}}
            <div class="bg-white rounded-3xl border border-gray-100 shadow-xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50/80 text-[11px] uppercase tracking-wider text-gray-400 font-extrabold border-b border-gray-100">
                            <tr>
                                <th class="py-4 px-6 text-center w-16">No</th>
                                <th class="py-4 px-6">Logo Brand</th>
                                <th class="py-4 px-6">Nama Brand</th>
                                <th class="py-4 px-6">Slug URL</th>
                                <th class="py-4 px-6 text-right">Aksi Pilihan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700">
                            @forelse ($brands as $index => $brand)
                                <tr class="hover:bg-gray-50/70 transition-colors">
                                    <td class="py-4 px-6 text-center font-bold text-gray-400">{{ $brands->firstItem() + $index }}</td>
                                    
                                    <td class="py-4 px-6">
                                        <div class="w-12 h-12 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200/60 flex-shrink-0 flex items-center justify-center">
                                            @if($brand->logo)
                                                <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" class="w-full h-full object-cover">
                                            @else
                                                <span class="text-[10px] text-gray-400 font-bold">No Logo</span>
                                            @endif
                                        </div>
                                    </td>
                                    
                                    <td class="py-4 px-6">
                                        <div class="font-bold text-gray-900 text-sm">{{ $brand->name }}</div>
                                        @if($brand->description)
                                            <div class="text-xs text-gray-400 mt-0.5 truncate max-w-xs">{{ $brand->description }}</div>
                                        @endif
                                    </td>

                                    <td class="py-4 px-6 font-mono text-gray-400 text-xs">
                                        /{{ $brand->slug }}
                                    </td>
                                    
                                    <td class="py-4 px-6 text-right">
                                        <div class="flex justify-end items-center gap-3">
                                            <button type="button" @click="openDrawer('{{ route('brands.show', ['brand' => $brand, 'drawer' => 1]) }}', 'Detail Brand')"
                                                title="Detail" class="text-gray-400 hover:text-gray-700 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </button>
                                            <button type="button" @click="openDrawer('{{ route('brands.edit', ['brand' => $brand, 'drawer' => 1]) }}', 'Edit Brand')"
                                                title="Edit" class="text-[#b58d17] hover:text-[#8f6e12] transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                                                </svg>
                                            </button>
                                            <button type="button" @click="deleteModalOpen = true; deleteUrl = '{{ route('brands.destroy', $brand->id) }}'; brandName = '{{ $brand->name }}'"
                                                title="Hapus" class="text-red-500 hover:text-red-700 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397M5.878 5.79c.34-.059.68-.114 1.022-.166m6.892 0a48.667 48.667 0 0 0-6.892 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-16 text-center text-gray-400">
                                        <div class="flex flex-col items-center justify-center space-y-2">
                                            <svg class="w-10 h-10 text-gray-300 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                            <p class="text-sm font-bold text-gray-700">Belum ada data brand tersedia.</p>
                                            <p class="text-xs text-gray-400">Silakan tambahkan brand baru melalui tombol di atas.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if ($brands->hasPages())
                    <div class="p-4 bg-gray-50/50 border-t border-gray-100">
                        {{ $brands->links() }} 
                    </div>
                @endif
            </div>
        </div>

        <!-- SIDE DRAWER: tambah, detail, dan edit brand -->
        <div x-show="drawerOpen" x-cloak class="fixed inset-0 z-[100]" style="display: none;">
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
                        <p class="text-[10px] font-black tracking-[0.2em] text-[#D4AF37]">MANAJEMEN BRAND</p>
                        <h2 class="mt-1 text-lg font-black text-gray-900" x-text="drawerTitle"></h2>
                    </div>
                    <button type="button" @click="closeDrawer()" class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-50 text-gray-500 hover:rotate-90 hover:bg-black hover:text-white transition duration-300" aria-label="Tutup panel">✕</button>
                </header>
                
                <!-- Area Iframe Content -->
                <div class="relative flex-1 bg-[#F8F9FA]">
                    <div x-show="iframeLoading" class="absolute inset-0 flex items-center justify-center z-20 bg-[#F8F9FA]">
                        <svg class="animate-spin h-8 w-8 text-[#D4AF37]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    
                    <iframe :src="drawerUrl" @load="iframeLoading = false" class="h-full w-full border-0 absolute inset-0 z-10" title="Panel brand"></iframe>
                </div>
            </section>
        </div>

        <!-- MODAL POP-UP HAPUS BRAND -->
        <div x-show="deleteModalOpen" class="fixed inset-0 z-[110] overflow-y-auto bg-black/60 backdrop-blur-sm flex items-center justify-center p-4" style="display: none;" x-transition.opacity>
            <div @click.away="deleteModalOpen = false" class="bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-gray-100 text-center space-y-4" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                <div class="w-14 h-14 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center mx-auto border border-red-100">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                </div>
                <div>
                    <h3 class="text-base font-black text-gray-900">Konfirmasi Hapus Brand</h3>
                    <p class="text-xs text-gray-500 mt-1">Yakin ingin menghapus brand <span class="font-bold text-gray-800" x-text="brandName"></span>? Data yang dihapus tidak bisa dikembalikan.</p>
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
