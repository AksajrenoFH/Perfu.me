<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfu.me · Products Collection</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #ffffff;
            color: #111827;
        }

        .font-serif-luxury {
            font-family: 'Playfair Display', Georgia, serif;
        }

        .marquee-track {
            display: flex;
            width: max-content;
            animation: scrollLeft 45s linear infinite;
        }

        .marquee-track:hover {
            animation-play-state: paused;
        }

        @keyframes scrollLeft {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        .card-hover {
            transition: transform .3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow .3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 30px -8px rgba(0, 0, 0, 0.06);
        }

        .nav-underline {
            position: relative;
        }

        .nav-underline::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: -6px;
            height: 2px;
            background: #000000;
            border-radius: 2px;
        }

        .reveal-element {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes badgePop {
            0% {
                transform: scale(0.8);
            }

            50% {
                transform: scale(1.25);
            }

            100% {
                transform: scale(1);
            }
        }

        .animate-pop {
            animation: badgePop 0.3s ease-in-out;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="text-neutral-900 antialiased bg-white selection:bg-neutral-900 selection:text-white" x-data="productPage()">

    {{-- Scrolling Announcement Bar --}}
    @php
        $announcements = (isset($brands) && $brands->count() > 0)
            ? $brands->pluck('name')->filter()->values()->toArray()
            : [
                'Refill Mulai 15rb',
                'Dior Sauvage',
                'Baccarrat Rouge 540',
                'Bvlgari Extreme',
                'One Million Lucky',
                'YSL Black Opium',
                'Creed Aventus',
                'Versace Eros',
                'Zara Orchid',
                'Miss Dior Blooming Bouquet',
            ];
    @endphp
    <div class="bg-neutral-950 text-neutral-300 text-[11px] font-medium tracking-wider uppercase border-b border-neutral-800 overflow-hidden py-2">
        <div class="marquee-track">
            <div class="flex items-center shrink-0">
                @foreach ($announcements as $item)
                    <span class="px-6 flex items-center gap-2">
                        <span class="text-neutral-500 text-[10px]">✦</span> {{ $item }}
                    </span>
                @endforeach
            </div>
            <div class="flex items-center shrink-0" aria-hidden="true">
                @foreach ($announcements as $item)
                    <span class="px-6 flex items-center gap-2">
                        <span class="text-neutral-500 text-[10px]">✦</span> {{ $item }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Navbar (Identical to Home) --}}
    <header class="bg-white/95 backdrop-blur-md border-b border-neutral-100 sticky top-0 z-50">
        <div class="max-w-[1240px] mx-auto flex items-center justify-between px-8 sm:px-10 h-[70px]">
            <div class="flex items-center gap-12">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <span class="w-9 h-9 rounded-full bg-neutral-900 text-white flex items-center justify-center text-sm font-bold font-serif-luxury tracking-tighter shadow-sm">P.</span>
                    <div class="flex flex-col">
                        <span class="text-xl font-extrabold tracking-tight text-neutral-950 leading-none">Perfu.me</span>
                        <span class="text-[9px] tracking-[0.22em] text-neutral-400 font-semibold uppercase mt-0.5">Haute Parfumerie</span>
                    </div>
                </a>
                
                <nav class="hidden md:flex items-center gap-8 text-sm text-black/60">
                    <a href="{{ route('home') }}" class="hover:text-black">Home</a>
                    <a href="{{ route('refill') }}" class="nav-underline text-black font-medium">Products</a>
                </nav>
            </div>

            <div class="flex items-center gap-3.5">
                {{-- Cart Trigger in Header --}}
                <button @click="cartOpen = true" class="relative p-2.5 rounded-full border border-neutral-200 hover:border-neutral-900 text-neutral-800 hover:text-neutral-950 transition-colors flex items-center justify-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span x-show="totalItems > 0" x-text="totalItems" class="absolute -top-1 -right-1 bg-neutral-950 text-white text-[9px] font-bold w-5 h-5 rounded-full flex items-center justify-center shadow-xs"></span>
                </button>

                <a href="#products-grid" class="bg-neutral-950 text-white text-[13px] font-semibold rounded-full px-5 py-2.5 hover:bg-neutral-800 transition tracking-wide shadow-sm">
                    Shop Now
                </a>
            </div>
        </div>
    </header>

    {{-- Hero / Page Header --}}
    <section class="bg-neutral-50/70 border-b border-neutral-200/70 py-16 reveal-element">
        <div class="max-w-[1240px] mx-auto px-6 sm:px-8">
            <p class="text-xs tracking-[0.25em] text-neutral-400 font-bold uppercase mb-2">PRODUCT CATALOG & REFILL</p>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight mb-4 text-neutral-950 max-w-2xl">Products Collection
            </h1>
            <p class="text-neutral-500 leading-relaxed text-xs sm:text-sm max-w-xl mb-8">Temukan seluruh koleksi parfum eksklusif Perfu.me — mulai dari Original Signature Series hingga Refill Travel Collection. Pilih varian favoritmu sekarang.</p>

            <div class="flex flex-wrap gap-6 border-t border-b border-neutral-200/80 py-5 max-w-2xl">
                <div>
                    <p class="text-[9px] tracking-widest text-neutral-400 font-bold uppercase mb-1">TOTAL PRODUK</p>
                    <p class="font-extrabold text-neutral-950 text-base sm:text-lg" x-text="totalProducts + ' Varian'"></p>
                </div>
                <div>
                    <p class="text-[9px] tracking-widest text-neutral-400 font-bold uppercase mb-1">KATEGORI</p>
                    <p class="font-extrabold text-neutral-950 text-base sm:text-lg">Original · Refill · Best Seller</p>
                </div>
                <div>
                    <p class="text-[9px] tracking-widest text-neutral-400 font-bold uppercase mb-1">KONSENTRASI</p>
                    <p class="font-extrabold text-neutral-950 text-base sm:text-lg">EDP · EDT · Roll-on · Body Mist</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Products Grid Section with Filter Tabs & Search Bar --}}
    <section id="products-grid" class="max-w-[1240px] mx-auto px-6 sm:px-8 py-16 bg-white reveal-element">
        
        {{-- Toolbar: Filter Category Tabs & Search Bar --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 border-b border-neutral-100 pb-8 mb-10">
            
            {{-- Filter Category Buttons --}}
            <div class="flex items-center gap-2 overflow-x-auto pb-2 md:pb-0">
                <button type="button" @click="activeTab = 'all'"
                    :class="activeTab === 'all' ? 'bg-neutral-950 text-white font-bold shadow-md' : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200 font-medium'"
                    class="px-5 py-2.5 rounded-full text-xs transition whitespace-nowrap cursor-pointer">
                    Semua Produk (<span x-text="allProducts.length"></span>)
                </button>

                <button type="button" @click="activeTab = 'Refill'"
                    :class="activeTab === 'Refill' ? 'bg-neutral-950 text-white font-bold shadow-md' : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200 font-medium'"
                    class="px-5 py-2.5 rounded-full text-xs transition whitespace-nowrap cursor-pointer">
                    Parfum Refill (<span x-text="refillCount"></span>)
                </button>

                <button type="button" @click="activeTab = 'Original'"
                    :class="activeTab === 'Original' ? 'bg-neutral-950 text-white font-bold shadow-md' : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200 font-medium'"
                    class="px-5 py-2.5 rounded-full text-xs transition whitespace-nowrap cursor-pointer">
                    Original Signature (<span x-text="originalCount"></span>)
                </button>

                <button type="button" @click="activeTab = 'bestseller'"
                    :class="activeTab === 'bestseller' ? 'bg-[#D4AF37] text-white font-bold shadow-md ring-2 ring-[#D4AF37]/30' : 'bg-amber-50 text-amber-800 hover:bg-amber-100 border border-amber-200/60 font-medium'"
                    class="px-5 py-2.5 rounded-full text-xs transition whitespace-nowrap cursor-pointer flex items-center gap-1.5">
                    <span>★ Best Seller</span>
                    <span>(<span x-text="bestSellerCount"></span>)</span>
                </button>
            </div>

            {{-- Search Bar Input --}}
            <div class="relative w-full md:w-80">
                <input type="text" x-model="search" placeholder="Cari parfum, aroma, varian..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-full bg-neutral-50 border border-neutral-200 text-xs font-medium text-neutral-900 placeholder:text-neutral-400 focus:outline-none focus:border-neutral-950 focus:ring-1 focus:ring-neutral-950 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-neutral-400 absolute left-3.5 top-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="7" />
                    <path stroke-linecap="round" d="m21 21-4.3-4.3" />
                </svg>
                <button x-show="search" @click="search = ''" class="absolute right-3 top-2.5 text-neutral-400 hover:text-neutral-950 text-xs font-bold px-1">✕</button>
            </div>

        </div>

        {{-- Section Subheader --}}
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-extrabold text-neutral-950 tracking-tight" x-text="activeTabTitle"></h2>
            <p class="text-xs text-neutral-500">
                Menampilkan <span class="font-bold text-neutral-950" x-text="filteredProducts.length"></span> dari <span x-text="allProducts.length"></span> produk
            </p>
        </div>

        {{-- Products Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <template x-for="(product, index) in filteredProducts" :key="product.id || index">
                <div class="card-hover bg-white border border-neutral-200/80 rounded-3xl p-5 flex flex-col shadow-xs relative">
                    
                    {{-- Badges Header --}}
                    <div class="flex items-center justify-between gap-2 mb-3">
                        <div class="flex items-center gap-1.5">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase bg-neutral-950 text-white"
                                x-text="product.category || 'Product'"></span>
                            
                            <template x-if="product.is_best_seller">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black uppercase bg-[#D4AF37] text-white shadow-xs">
                                    ★ Best Seller
                                </span>
                            </template>
                        </div>
                        
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold border"
                            :class="product.stock > 0 ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-red-50 text-red-700 border-red-200'"
                            x-text="product.stock > 0 ? 'Stok: ' + product.stock + ' pcs' : 'Stok Habis'"></span>
                    </div>

                    {{-- Image Container (Uses Column Image) --}}
                    <div class="aspect-square rounded-2xl bg-neutral-50 border border-neutral-100 mb-4 flex items-center justify-center overflow-hidden relative group">
                        <img :src="product.image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" :alt="product.name"
                             onerror="this.src='https://images.unsplash.com/photo-1592945403244-b3fbafd7f539?w=400&q=80'">
                    </div>

                    {{-- Attribute Chips --}}
                    <div class="flex items-center gap-1.5 flex-wrap mb-2">
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded-md bg-neutral-100 text-neutral-600 uppercase" x-text="product.variant || 'EDP'"></span>
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded-md bg-neutral-100 text-neutral-600 uppercase" x-text="'For ' + (product.gender || 'Unisex')"></span>
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded-md bg-neutral-100 text-neutral-600" x-text="(product.volume || 50) + ' ml'"></span>
                    </div>

                    {{-- Name --}}
                    <h3 class="text-sm font-bold text-neutral-950 mb-1 leading-snug" x-text="product.name"></h3>

                    {{-- Description Snippet --}}
                    <p class="text-[11px] text-neutral-500 line-clamp-2 mb-3 leading-relaxed" x-text="product.description || 'Aroma parfum eksklusif berkonsentrasi Extrait murni.'"></p>

                    {{-- Aroma Notes breakdown --}}
                    <template x-if="product.top_note || product.middle_note || product.base_note">
                        <div class="bg-neutral-50 p-2.5 rounded-xl border border-neutral-100 mb-4 space-y-1 text-[10px]">
                            <p class="text-neutral-500 truncate" x-show="product.top_note"><strong class="text-neutral-800">Top:</strong> <span x-text="product.top_note"></span></p>
                            <p class="text-neutral-500 truncate" x-show="product.middle_note"><strong class="text-neutral-800">Mid:</strong> <span x-text="product.middle_note"></span></p>
                            <p class="text-neutral-500 truncate" x-show="product.base_note"><strong class="text-neutral-800">Base:</strong> <span x-text="product.base_note"></span></p>
                        </div>
                    </template>

                    {{-- Price --}}
                    <div class="mt-auto pt-2 border-t border-neutral-100 mb-4 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] text-neutral-400 font-bold block uppercase">HARGA JUAL</span>
                            <p class="text-base font-extrabold text-neutral-950" x-text="formatRupiah(product.price)"></p>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col gap-2">
                        <button @click="addToCart(product, $event)"
                            :disabled="product.stock <= 0"
                            :class="product.stock <= 0 ? 'bg-neutral-300 text-neutral-500 cursor-not-allowed' : 'bg-neutral-950 text-white hover:bg-neutral-800 cursor-pointer'"
                            class="w-full text-xs font-semibold py-3 rounded-full transition shadow-xs active:scale-[0.98]">
                            + Add to Cart
                        </button>
                        <button
                            @click="directCheckoutWhatsApp(product.name + ' (' + (product.volume || 50) + 'ml ' + (product.variant || '') + ')', formatRupiah(product.price))"
                            class="w-full border border-neutral-300 text-neutral-900 text-xs font-semibold py-2.5 rounded-full hover:bg-neutral-50 transition cursor-pointer active:scale-[0.98]">
                            Checkout via WA
                        </button>
                    </div>
                </div>
            </template>
        </div>

        {{-- Empty State --}}
        <div x-show="filteredProducts.length === 0" x-cloak class="text-center py-24 text-neutral-400 space-y-2">
            <p class="text-sm font-bold text-neutral-700">Produk tidak ditemukan.</p>
            <p class="text-xs text-neutral-400">Tidak ada produk yang cocok dengan pencarian Anda.</p>
            <button @click="activeTab = 'all'; search = ''" class="inline-block px-4 py-2 bg-neutral-950 text-white text-xs font-semibold rounded-full mt-2 cursor-pointer">
                Reset Filter
            </button>
        </div>
    </section>

    {{-- Footer (Identical Dark Theme to Home) --}}
    <footer class="bg-neutral-950 text-neutral-400 border-t border-neutral-900 pt-14 pb-8">
        <div class="max-w-[1240px] mx-auto px-6 sm:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-3">
                <div class="flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-white text-neutral-950 flex items-center justify-center text-[10px] font-bold font-serif-luxury">P.</span>
                    <span class="text-lg font-extrabold text-white tracking-tight">Perfu.me</span>
                </div>
                <p class="text-xs text-neutral-400 leading-relaxed max-w-xs">
                    Haute Parfumerie & Extrait de Parfum berstandar internasional. Menghadirkan identitas aroma yang berkelas, elegan, dan tahan lama.
                </p>
                <div class="flex gap-2 pt-1 text-neutral-400">
                    <span class="w-7 h-7 rounded-full border border-neutral-800 bg-neutral-900 flex items-center justify-center text-xs hover:text-white transition cursor-pointer">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                    </span>
                    <span class="w-7 h-7 rounded-full border border-neutral-800 bg-neutral-900 flex items-center justify-center text-xs hover:text-white transition cursor-pointer">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </span>
                    <span class="w-7 h-7 rounded-full border border-neutral-800 bg-neutral-900 flex items-center justify-center text-xs hover:text-white transition cursor-pointer">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                    </span>
                </div>
            </div>

            <div>
                <p class="text-[10px] tracking-widest text-neutral-300 font-bold uppercase mb-3">FRAGRANCE SERIES</p>
                <ul class="space-y-1.5 text-xs text-neutral-400">
                    <li><a href="{{ route('home') }}#product" class="hover:text-white transition">Dynamyst Extrait</a></li>
                    <li><a href="{{ route('home') }}#product" class="hover:text-white transition">Vanessence Extrait</a></li>
                    <li><a href="#products-grid" class="hover:text-white transition">Discovery Refills</a></li>
                    <li><a href="#products-grid" class="hover:text-white transition">Signature Bundles</a></li>
                </ul>
            </div>

            <div>
                <p class="text-[10px] tracking-widest text-neutral-300 font-bold uppercase mb-3">CUSTOMER CARE</p>
                <ul class="space-y-1.5 text-xs text-neutral-400">
                    <li><a href="https://wa.me/6287774375755" class="hover:text-white transition">Konsultasi Aroma</a></li>
                    <li><a href="#" class="hover:text-white transition">Garansi Pengiriman</a></li>
                    <li><a href="#" class="hover:text-white transition">Cara Pemesanan</a></li>
                    <li><a href="#" class="hover:text-white transition">Panduan Longevity</a></li>
                </ul>
            </div>

            <div>
                <p class="text-[10px] tracking-widest text-neutral-300 font-bold uppercase mb-3">NEWSLETTER</p>
                <p class="text-xs text-neutral-400 mb-3">Dapatkan info rilis aroma baru dan penawaran terbatas langsung ke email Anda.</p>
                <form action="#" method="POST" class="flex gap-2">
                    <input type="email" placeholder="Email Anda..." required
                        class="bg-neutral-900 border border-neutral-800 rounded-full px-3.5 py-2 text-xs flex-1 outline-none text-white focus:border-neutral-500 placeholder:text-neutral-600">
                    <button type="button" class="bg-white text-neutral-950 text-xs font-bold rounded-full px-3.5 py-2 hover:bg-neutral-200 transition">Join</button>
                </form>
            </div>
        </div>

        <div class="max-w-[1240px] mx-auto px-6 sm:px-8 flex flex-col sm:flex-row justify-between items-center gap-2.5 border-t border-neutral-900 mt-10 pt-5 text-[10px] text-neutral-500">
            <span>&copy; {{ date('Y') }} PERFU.ME INDONESIA. ALL RIGHTS RESERVED.</span>
            <span>CRAFTED WITH PRECISION · EXTRAIT DE PARFUM</span>
        </div>
    </footer>

    {{-- Alpine.js & Product Page Logic --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        function productPage() {
            return {
                cartOpen: false,
                items: [],
                search: '',
                activeTab: 'all',

                allProducts: @js(isset($allProducts) ? $allProducts->map(function($p) {
                    return [
                        'id' => $p->id,
                        'name' => $p->name,
                        'category' => $p->category ?? 'Original',
                        'variant' => $p->variant ?? 'EDP',
                        'gender' => $p->gender ?? 'Unisex',
                        'top_note' => $p->top_note,
                        'middle_note' => $p->middle_note,
                        'base_note' => $p->base_note,
                        'composition' => $p->composition,
                        'packaging' => $p->packaging ?? 'Botol Kaca',
                        'volume' => $p->volume ?? 50,
                        'price' => (int) $p->price,
                        'stock' => (int) $p->stock,
                        'description' => $p->description,
                        'image' => $p->image ? asset('storage/' . $p->image) : 'https://images.unsplash.com/photo-1592945403244-b3fbafd7f539?w=400&q=80',
                        'image_hover' => $p->image_hover ? asset('storage/' . $p->image_hover) : null,
                        'is_best_seller' => (bool) $p->is_best_seller,
                    ];
                })->values()->toArray() : []),

                get refillCount() {
                    return this.allProducts.filter(p => p.category === 'Refill').length;
                },
                get originalCount() {
                    return this.allProducts.filter(p => p.category === 'Original').length;
                },
                get bestSellerCount() {
                    return this.allProducts.filter(p => p.is_best_seller).length;
                },

                get totalProducts() {
                    return this.allProducts.length;
                },

                get activeTabTitle() {
                    if (this.activeTab === 'Refill') return 'Koleksi Parfum Refill';
                    if (this.activeTab === 'Original') return 'Koleksi Original Signature';
                    if (this.activeTab === 'bestseller') return 'Koleksi Produk Best Seller';
                    return 'Semua Katalog Produk';
                },

                get filteredProducts() {
                    let list = this.allProducts;

                    if (this.activeTab === 'Refill') {
                        list = list.filter(p => p.category === 'Refill');
                    } else if (this.activeTab === 'Original') {
                        list = list.filter(p => p.category === 'Original');
                    } else if (this.activeTab === 'bestseller') {
                        list = list.filter(p => p.is_best_seller);
                    }

                    if (this.search.trim()) {
                        const q = this.search.trim().toLowerCase();
                        list = list.filter(p => 
                            p.name.toLowerCase().includes(q) || 
                            (p.category && p.category.toLowerCase().includes(q)) ||
                            (p.variant && p.variant.toLowerCase().includes(q)) ||
                            (p.gender && p.gender.toLowerCase().includes(q)) ||
                            (p.top_note && p.top_note.toLowerCase().includes(q)) ||
                            (p.description && p.description.toLowerCase().includes(q))
                        );
                    }

                    return list;
                },

                addToCart(product, event) {
                    this.playFlyingBallAnimation(event);
                    const price = product.price || 0;
                    const label = `${product.name} (${product.volume || 50}ml ${product.variant || ''})`;
                    const imageUrl = product.image;

                    let existing = this.items.find(item => item.name === label);
                    if (existing) {
                        existing.qty++;
                    } else {
                        this.items.push({ 
                            name: label, 
                            price: this.formatRupiah(price), 
                            image: imageUrl,
                            qty: 1 
                        });
                    }
                },

                playFlyingBallAnimation(event) {
                    const button = event.target.closest('button');
                    const cartIcon = document.getElementById('floating-cart-btn');
                    if (!button || !cartIcon) return;

                    const btnRect = button.getBoundingClientRect();
                    const cartRect = cartIcon.getBoundingClientRect();

                    const ball = document.createElement('div');
                    ball.style.position = 'fixed';
                    ball.style.left = `${btnRect.left + btnRect.width / 2 - 10}px`;
                    ball.style.top = `${btnRect.top + btnRect.height / 2 - 10}px`;
                    ball.style.width = '20px';
                    ball.style.height = '20px';
                    ball.style.backgroundColor = '#000000';
                    ball.style.borderRadius = '50%';
                    ball.style.zIndex = '9999';
                    ball.style.pointerEvents = 'none';
                    ball.style.transition = 'all 0.6s cubic-bezier(0.25, 1, 0.5, 1)';
                    document.body.appendChild(ball);

                    setTimeout(() => {
                        ball.style.left = `${cartRect.left + cartRect.width / 2 - 10}px`;
                        ball.style.top = `${cartRect.top + cartRect.height / 2 - 10}px`;
                        ball.style.transform = 'scale(0.2)';
                        ball.style.opacity = '0.5';
                    }, 20);

                    setTimeout(() => { ball.remove(); }, 600);
                },

                increaseQty(index) { this.items[index].qty++; },
                decreaseQty(index) {
                    if (this.items[index].qty > 1) {
                        this.items[index].qty--;
                    } else {
                        this.removeItem(index);
                    }
                },
                removeItem(index) { this.items.splice(index, 1); },

                get totalItems() {
                    return this.items.reduce((sum, item) => sum + item.qty, 0);
                },
                get totalPrice() {
                    return this.items.reduce((sum, item) => {
                        let cleanPrice = parseInt(item.price.replace(/[^0-9]/g, '')) || 0;
                        return sum + (cleanPrice * item.qty);
                    }, 0);
                },
                formatRupiah(number) {
                    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number || 0);
                },

                async checkoutWhatsApp() {
                    if (this.items.length === 0) {
                        alert('Keranjang belanjaan lu masih kosong!');
                        return;
                    }
                    const orderId = await this.saveOrder(this.items);
                    if (!orderId) return;
                    let phone = '6287774375755';
                    let message = "Halo Kak, saya mau order parfum ini ya:\n\n";
                    this.items.forEach((item, index) => {
                        message += `${index + 1}. *${item.name}* - ${item.qty} pcs (${item.price})\n`;
                    });
                    message += `\n*Nomor Pesanan:* #${orderId}`;
                    message += `\n*Total Keseluruhan:* ${this.formatRupiah(this.totalPrice)}`;
                    message += `\n\nBoleh tolong dicekkan stoknya dan total sama ongkir ke alamat saya ya kak? Terima kasih!`;
                    let encodedMessage = encodeURIComponent(message);
                    window.location.href = `https://wa.me/${phone}?text=${encodedMessage}`;
                },

                async directCheckoutWhatsApp(name, price) {
                    const numericPrice = parseInt(price.replace(/[^0-9]/g, '')) || 0;
                    const orderId = await this.saveOrder([{ name, price: numericPrice, qty: 1 }]);
                    if (!orderId) return;
                    let phone = '6287774375755';
                    let message = `Halo Kak, saya mau order 1 pcs *${name}* (${price}).\n*Nomor Pesanan:* #${orderId}\n\nBoleh tolong dicekkan ketersediaan stok dan total beserta ongkir ke alamat saya ya kak? Terima kasih!`;
                    let encodedMessage = encodeURIComponent(message);
                    window.location.href = `https://wa.me/${phone}?text=${encodedMessage}`;
                },

                async saveOrder(items) {
                    try {
                        const response = await fetch('{{ route('orders.checkout') }}', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}' },
                            body: JSON.stringify({ items: items.map(item => ({ ...item, price: typeof item.price === 'string' ? (parseInt(item.price.replace(/[^0-9]/g, '')) || 0) : item.price })) })
                        });
                        if (!response.ok) throw new Error();
                        return (await response.json()).id;
                    } catch (error) {
                        alert('Pesanan belum bisa disimpan. Silakan coba lagi.');
                        return null;
                    }
                }
            }
        }

    </script>

</body>

</html>