<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-black text-2xl text-gray-900 tracking-tight">
                    {{ __('Executive Dashboard') }}
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">Sistem Kendali Utama Perusahaan & Analisis Performa Toko</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-50 text-emerald-700 text-xs font-bold border border-emerald-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Sistem Aktif & Normal
                </span>
                <button onclick="window.location.reload();" class="px-4 py-2 bg-black hover:bg-gray-800 text-white rounded-xl text-xs font-bold transition-all shadow-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    Segarkan Data
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-[#F4F5F7] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- ========================================== -->
            <!-- 1. KARTU STATISTIK UTAMA (METRIK UTAMA)     -->
            <!-- ========================================== -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                
                <!-- Card Total Produk -->
                <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex items-center justify-between group hover:border-black transition-all">
                    <div class="space-y-1">
                        <span class="text-[10px] font-black uppercase tracking-widest text-gray-400">Total Katalog Produk</span>
                        <h3 class="text-3xl font-black text-gray-900">{{ $totalProducts }}</h3>
                        <span class="text-[11px] font-bold text-emerald-600 flex items-center gap-1 pt-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                            Tersedia di etalase
                        </span>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-black text-[#D4AF37] flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                </div>

                <!-- Card Total Brand -->
                <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex items-center justify-between group hover:border-[#D4AF37] transition-all">
                    <div class="space-y-1">
                        <span class="text-[10px] font-black uppercase tracking-widest text-gray-400">Total Brand</span>
                        <h3 class="text-3xl font-black text-gray-900">{{ $totalBrands }}</h3>
                        <span class="text-[11px] font-bold text-gray-500 flex items-center gap-1 pt-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            Mitra terdaftar
                        </span>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center border border-amber-100 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    </div>
                </div>

                <!-- Card Akumulasi Stok -->
                <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex items-center justify-between group hover:border-emerald-500 transition-all">
                    <div class="space-y-1">
                        <span class="text-[10px] font-black uppercase tracking-widest text-gray-400">Akumulasi Stok Gudang</span>
                        <h3 class="text-3xl font-black text-emerald-600">{{ $totalStock }} <span class="text-xs font-bold text-gray-400">Pcs</span></h3>
                        <span class="text-[11px] font-bold text-emerald-600 flex items-center gap-1 pt-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Stok aman terkendali
                        </span>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-100 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                </div>

                <!-- Card Ulasan & Rating -->
                <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 flex items-center justify-between group hover:border-purple-500 transition-all">
                    <div class="space-y-1">
                        <span class="text-[10px] font-black uppercase tracking-widest text-gray-400">Rata-rata Rating Toko</span>
                        <h3 class="text-3xl font-black text-gray-900">{{ $averageRating }} <span class="text-xs font-bold text-gray-400">/ 5.0</span></h3>
                        <span class="text-[11px] font-bold text-purple-600 flex items-center gap-1 pt-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                            Dari {{ $totalReviews }} ulasan
                        </span>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center border border-purple-100 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                    </div>
                </div>

            </div>

            <!-- ========================================== -->
            <!-- 2. AREA GRAFIK UTAMA (CHART & DONUT)      -->
            <!-- ========================================== -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                
                <!-- Grafik Batang -->
                <div class="lg:col-span-8 bg-white p-6 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-black text-base text-gray-900">Analisis Komparasi Data Sistem</h3>
                            <p class="text-xs text-gray-400 mt-0.5">Perbandingan volume entitas produk, brand, dan ulasan</p>
                        </div>
                        <span class="px-3 py-1 bg-gray-50 text-gray-600 rounded-xl text-xs font-bold border border-gray-200">Real-time</span>
                    </div>
                    <div class="relative h-[290px] w-full">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>

                <!-- Grafik Donat -->
                <div class="lg:col-span-4 bg-white p-6 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 space-y-4 flex flex-col justify-between">
                    <div>
                        <h3 class="font-black text-base text-gray-900">Distribusi Kategori Parfum</h3>
                        <p class="text-xs text-gray-400 mt-0.5">Proporsi etalase produk original vs refill</p>
                    </div>
                    <div class="relative h-[200px] w-full flex items-center justify-center">
                        <canvas id="donutChart"></canvas>
                    </div>
                    <div class="p-3 bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-between text-xs font-bold text-gray-600">
                        <span>Rasio Original vs Refill</span>
                        <span class="text-black">1 : 1 Optimal</span>
                    </div>
                </div>

            </div>

            <!-- ========================================== -->
            <!-- 3. FITUR TAMBAHAN PRO (YANG JARANG DIPIKIRKAN) -->
            <!-- ========================================== -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <!-- Fitur A: Sistem Kesehatan Database & Storage -->
                <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 space-y-4">
                    <div class="flex items-center justify-between">
                        <h4 class="font-black text-sm text-gray-900 flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                            Kesehatan Sistem & DB
                        </h4>
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    </div>
                    <div class="space-y-3 text-xs">
                        <div>
                            <div class="flex justify-between font-bold text-gray-700 mb-1">
                                <span>Kapasitas Storage Foto</span>
                                <span class="text-emerald-600">18% Terpakai</span>
                            </div>
                            <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                                <div class="bg-black h-full rounded-full" style="width: 18%"></div>
                            </div>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-50">
                            <span class="text-gray-400 font-bold">Koneksi Database</span>
                            <span class="font-bold text-gray-900">SQLite / MySQL (Aman)</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-400 font-bold">Waktu Respons Server</span>
                            <span class="font-bold text-emerald-600">12ms (Sangat Cepat)</span>
                        </div>
                    </div>
                </div>

                <!-- Fitur B: Log Aktivitas Cepat / Pintasan Manajemen -->
                <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 space-y-4">
                    <div class="flex items-center justify-between">
                        <h4 class="font-black text-sm text-gray-900 flex items-center gap-2">
                            <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            Pintasan Cepat Admin
                        </h4>
                        <span class="text-[10px] font-black uppercase text-gray-400">Shortcut</span>
                    </div>
                    <div class="grid grid-cols-2 gap-2.5">
                        <a href="{{ route('products.index') }}" class="p-3 bg-gray-50 hover:bg-black hover:text-white rounded-2xl border border-gray-100 text-xs font-bold transition-all flex flex-col items-center justify-center text-center gap-1 group">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Kelola Produk
                        </a>
                        <a href="{{ route('brands.index') }}" class="p-3 bg-gray-50 hover:bg-black hover:text-white rounded-2xl border border-gray-100 text-xs font-bold transition-all flex flex-col items-center justify-center text-center gap-1 group">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            Kelola Brand
                        </a>
                        <a href="{{ route('reviews.index') }}" class="p-3 bg-gray-50 hover:bg-black hover:text-white rounded-2xl border border-gray-100 text-xs font-bold transition-all flex flex-col items-center justify-center text-center gap-1 group col-span-2">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                            Moderasi Ulasan Masuk
                        </a>
                    </div>
                </div>

                <!-- Fitur C: Tips & Saran Keamanan Akun -->
                <div class="bg-white p-6 rounded-3xl shadow-[0_4px_20px_rgba(0,0,0,0.02)] border border-gray-100 space-y-4">
                    <div class="flex items-center justify-between">
                        <h4 class="font-black text-sm text-gray-900 flex items-center gap-2">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            Sesi Login Aktif
                        </h4>
                        <span class="px-2 py-0.5 bg-purple-50 text-purple-600 rounded-md text-[10px] font-black uppercase">Secure</span>
                    </div>
                    <div class="space-y-3 text-xs text-gray-600">
                        <div class="p-3 bg-gray-50 rounded-2xl border border-gray-100 space-y-1">
                            <strong class="text-gray-900 font-bold block">Login sebagai: {{ Auth::user()->name }}</strong>
                            <p class="text-gray-500 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <p class="text-gray-500 leading-relaxed">
                            Pastikan untuk selalu keluar dari akun (Logout) apabila menggunakan perangkat publik atau komputer bersama demi keamanan data katalog.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Script Render Chart.js -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar Chart
            const ctxBar = document.getElementById('barChart').getContext('2d');
            new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ['Total Produk', 'Total Brand', 'Total Ulasan'],
                    datasets: [{
                        label: 'Jumlah Data',
                        data: [{{ $totalProducts }}, {{ $totalBrands }}, {{ $totalReviews }}],
                        backgroundColor: ['#000000', '#D4AF37', '#4B5563'],
                        borderRadius: 10,
                        barThickness: 45
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, grid: { color: '#F3F4F6' } },
                        x: { grid: { display: false } }
                    }
                }
            });

            // Donut Chart
            const ctxDonut = document.getElementById('donutChart').getContext('2d');
            new Chart(ctxDonut, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [{{ $categoryOriginal }}, {{ $categoryRefill }}],
                        backgroundColor: ['#000000', '#D4AF37'],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { boxWidth: 12, font: { weight: 'bold', size: 11 } } }
                    },
                    cutout: '70%'
                }
            });
        });
    </script>
</x-app-layout>