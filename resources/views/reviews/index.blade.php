<x-app-layout>
    <div x-data="{ deleteModalOpen: false, deleteUrl: '', reviewerName: '' }" class="min-h-screen bg-[#F8F9FA] py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <!-- Top Header & Action Banner -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-6 rounded-3xl shadow-xs border border-gray-100">
                <div>
                    <div class="flex items-center gap-2.5">
                        <span class="w-3 h-3 rounded-full bg-[#D4AF37]"></span>
                        <h1 class="text-2xl font-black text-gray-900 tracking-tight">Manajemen Ulasan Produk</h1>
                    </div>
                    <p class="text-xs text-gray-500 mt-1 ml-5">Kelola seluruh ulasan dan rating produk dari pelanggan setia Perfu.me.</p>
                </div>
                
                <!-- Tombol Tambah Produk (Dengan Efek Shimmer & Ikon Muter Berputar) -->
                <a href="{{ route('reviews.create') }}"
                    class="group relative inline-flex items-center justify-center gap-2.5 bg-black hover:bg-[#D4AF37] text-white px-6 py-3 rounded-2xl font-bold text-xs uppercase tracking-wider overflow-hidden shadow-lg shadow-black/10 hover:shadow-[#D4AF37]/30 hover:-translate-y-0.5 transition-all duration-300">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/15 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]">
                    </div>
                    <svg class="w-4 h-4 text-[#D4AF37] group-hover:text-white transition-transform duration-500 group-hover:rotate-90 flex-shrink-0 relative"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4">
                        </path>
                    </svg>
                    <span class="relative">Tambah Ulasan Baru</span>
                </a>
            </div>

            <!-- Alert Success -->
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" class="bg-emerald-50 border border-emerald-200 p-4 rounded-2xl flex items-center justify-between text-emerald-800 shadow-xs" role="alert">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center font-bold">✓</div>
                        <p class="text-xs font-bold">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="text-emerald-600 hover:text-emerald-800 font-bold px-2">✕</button>
                </div>
            @endif

            <!-- Table Card Area -->
            <div class="bg-white rounded-3xl shadow-xs border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/70 border-b border-gray-100 text-[11px] font-black text-gray-400 uppercase tracking-wider">
                                <th class="py-4 px-6 text-center w-16">No</th>
                                <th class="py-4 px-6">Produk Terkait</th>
                                <th class="py-4 px-6">Nama Reviewer</th>
                                <th class="py-4 px-6">Skor Rating</th>
                                <th class="py-4 px-6">Komentar Ulasan</th>
                                <th class="py-4 px-6 text-right">Aksi Pilihan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 text-xs font-medium text-gray-600">
                            @forelse ($reviews as $index => $review)
                            <tr class="hover:bg-gray-50/60 transition-colors group">
                                <!-- No -->
                                <td class="py-4 px-6 text-center font-bold text-gray-400 group-hover:text-black transition-colors">
                                    {{ $reviews->firstItem() + $index }}
                                </td>
                                
                                <!-- Produk -->
                                <td class="py-4 px-6">
                                    <span class="font-bold text-gray-900 text-sm tracking-tight">{{ $review->product->name ?? 'Produk Telah Dihapus' }}</span>
                                </td>
                                
                                <!-- Nama Reviewer -->
                                <td class="py-4 px-6">
                                    <span class="font-semibold text-gray-800">{{ $review->user_name }}</span>
                                </td>

                                <!-- Rating -->
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <span class="inline-block px-3 py-1 rounded-xl text-xs font-black bg-[#D4AF37]/10 text-[#D4AF37] border border-[#D4AF37]/20">
                                        Rating {{ $review->rating }} / 5
                                    </span>
                                </td>

                                <!-- Komentar -->
                                <td class="py-4 px-6 max-w-xs truncate text-gray-500">
                                    {{ $review->comment }}
                                </td>
                                
                                <!-- Tombol Aksi -->
                                <td class="py-4 px-6 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button @click="deleteModalOpen = true; deleteUrl = '{{ route('reviews.destroy', $review->id) }}'; reviewerName = '{{ $review->user_name }}'" type="button" class="px-3 py-1.5 bg-red-50 hover:bg-red-600 hover:text-white text-red-600 rounded-xl transition-all shadow-xs text-xs font-bold">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="py-16 text-center text-gray-400">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <p class="text-sm font-bold text-gray-700">Belum ada data ulasan produk.</p>
                                        <p class="text-xs text-gray-400">Ulasan dari pelanggan akan muncul di halaman ini.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination Footer -->
                @if ($reviews->hasPages())
                <div class="p-4 bg-gray-50/50 border-t border-gray-100">
                    {{ $reviews->links() }} 
                </div>
                @endif
            </div>
        </div>

        <!-- MODAL POP-UP HAPUS -->
        <div x-show="deleteModalOpen" class="fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-xs flex items-center justify-center p-4" style="display: none;" x-transition.opacity>
            <div @click.away="deleteModalOpen = false" class="bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-gray-100 text-center space-y-4" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                <div>
                    <h3 class="text-base font-black text-gray-900">Konfirmasi Hapus Ulasan</h3>
                    <p class="text-xs text-gray-500 mt-1">Yakin ingin menghapus ulasan dari <span class="font-bold text-gray-800" x-text="reviewerName"></span>? Data yang dihapus tidak bisa dikembalikan.</p>
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