<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfu.me · Refill Collection</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
        }

        .marquee-track {
            display: flex;
            width: max-content;
            animation: scrollLeft 50s linear infinite;
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
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
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
            background: #111;
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
                transform: scale(1.3);
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

<body class="text-[#14161a] antialiased bg-white" x-data="refillPage()">

    {{-- Scrolling Announcement Bar --}}
    @php
        $announcements = [
            'Refill Mulai 15rb',
            'Dior Sauvage',
            'Baccarrat Rouge 405',
            'Bvlgari Extreme',
            'One Million Lucky',
            'YSL Black Opium',
            'Greed Aventus',
            'Vercase Eros',
            'Zara Orchid',
            'Miss Dior Blooming Bouquet',
        ];
    @endphp
    <div class="bg-white border-b border-gray-200 text-gray-800 text-xs tracking-wide overflow-hidden">
        <div class="marquee-track py-2.5">
            <div class="flex items-center shrink-0">
                @foreach ($announcements as $item)
                    <span class="px-8 flex items-center gap-2">✦ {{ $item }}</span>
                @endforeach
            </div>
            <div class="flex items-center shrink-0" aria-hidden="true">
                @foreach ($announcements as $item)
                    <span class="px-8 flex items-center gap-2">✦ {{ $item }}</span>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Navbar --}}
    <header class="bg-white/80 backdrop-blur border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-[1400px] mx-auto flex items-center justify-between px-8 h-[76px]">
            <div class="flex items-center gap-12">
                <a href="{{ route('home') }}" class="text-xl font-extrabold tracking-tight">Perfu.me</a>
                <nav class="hidden md:flex items-center gap-8 text-sm text-black/60">
                    <a href="{{ route('home') }}" class="hover:text-black">Home</a>
                    <a href="{{ route('home') }}#product" class="hover:text-black">Product</a>
                    <a href="#" class="nav-underline text-black font-medium">Refill</a>
                </nav>
            </div>
            <div class="flex items-center gap-4">
                <div
                    class="hidden sm:flex items-center gap-2 bg-gray-100 rounded-full px-4 py-2 w-64 text-black/40 border border-gray-200/50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="7" />
                        <path stroke-linecap="round" d="m21 21-4.3-4.3" />
                    </svg>
                    <input type="text" x-model="search" placeholder="Cari varian aroma..."
                        class="bg-transparent outline-none text-sm w-full placeholder:text-black/40 text-black">
                </div>

                <a href="#refill-grid"
                    class="bg-black text-white text-sm font-semibold rounded-full px-5 py-2.5 hover:bg-gray-800 transition">Shop
                    Now</a>
            </div>
        </div>
    </header>

    {{-- Hero / Page Header --}}
    <section class="bg-gray-50 border-y border-gray-200/60 py-16 reveal-element">
        <div class="max-w-[1400px] mx-auto px-8">
            <p class="text-xs tracking-[0.2em] text-gray-400 font-semibold mb-3">DIVISI GAYA HIDUP</p>
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-5 text-gray-900 max-w-2xl">Refill Collection
            </h1>
            <p class="text-gray-500 leading-relaxed max-w-xl mb-8">Isi ulang aroma favoritmu dari koleksi terlengkap
                kami — mulai dari fragrance house ternama hingga aroma eksklusif Perfu.me. Pilih ukuran botol sesuai
                kebutuhan harianmu.</p>

            <div class="flex flex-wrap gap-6 border-t border-b border-gray-200/60 py-5 max-w-xl">
                <div>
                    <p class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">TOTAL VARIAN</p>
                    <p class="font-bold text-gray-900 text-lg" x-text="totalVariants + ' Aroma'"></p>
                </div>
                <div>
                    <p class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">UKURAN</p>
                    <p class="font-bold text-gray-900 text-lg">3ml · 5ml · 8ml</p>
                </div>
                <div>
                    <p class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">MULAI DARI</p>
                    <p class="font-bold text-gray-900 text-lg">Rp 15.000</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Refill Grid Section --}}
    <section id="refill-grid" class="max-w-[1400px] mx-auto px-8 py-20 bg-white reveal-element">
        <div class="border-b border-gray-100 pb-6 mb-12 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <p class="text-xs tracking-[0.2em] text-gray-400 font-semibold mb-2">ALL VARIANTS</p>
                <h2 class="text-3xl md:text-4xl font-extrabold text-black tracking-tight">Varian Aroma</h2>
            </div>
            <p class="text-sm text-gray-400" x-show="!search">Menampilkan <span class="font-semibold text-gray-700"
                    x-text="totalVariants"></span> aroma</p>
            <p class="text-sm text-gray-400" x-show="search" x-cloak>Menampilkan <span
                    class="font-semibold text-gray-700" x-text="filteredVariants.length"></span> hasil untuk "<span
                    x-text="search"></span>"</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <template x-for="(product, index) in filteredVariants" :key="product.name">
                <div class="card-hover bg-white border border-gray-100 rounded-3xl p-5 flex flex-col shadow-sm">
                    <div
                        class="aspect-square rounded-2xl bg-gray-50 border border-gray-100 mb-4 flex items-center justify-center overflow-hidden">
                        <img :src="'storage/image/refill-placeholder.jpg'"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            class="w-full h-full object-cover" :alt="product.name">
                        <div class="hidden w-full h-full items-center justify-center text-gray-300 text-4xl font-extrabold"
                            x-text="product.name.charAt(0)"></div>
                    </div>

                    <span class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">FRAGRANCE</span>
                    <h3 class="text-sm font-bold text-gray-900 mb-3 leading-snug min-h-[2.5rem]" x-text="product.name">
                    </h3>

                    <div class="flex items-center gap-2 mb-4">
                        <template x-for="size in sizes" :key="size.ml">
                            <button type="button" @click="product.selectedSize = size.ml"
                                :class="product.selectedSize === size.ml ? 'bg-black text-white border-black' : 'bg-white text-gray-600 border-gray-200 hover:border-gray-400'"
                                class="text-xs font-semibold px-3 py-1.5 rounded-full border transition cursor-pointer">
                                <span x-text="size.ml + 'ml'"></span>
                            </button>
                        </template>
                    </div>

                    <p class="text-lg font-extrabold text-gray-900 mb-4" x-text="formatRupiah(currentPrice(product))">
                    </p>

                    <div class="mt-auto flex flex-col gap-2">
                        <button @click="addRefillToCart(product, $event)"
                            class="w-full bg-black text-white text-xs font-semibold py-3 rounded-full hover:bg-gray-800 transition cursor-pointer">
                            + Add to Cart
                        </button>
                        <button
                            @click="directCheckoutWhatsApp(product.name + ' (' + product.selectedSize + 'ml)', formatRupiah(currentPrice(product)))"
                            class="w-full border border-gray-300 text-gray-900 text-xs font-semibold py-3 rounded-full hover:bg-gray-50 transition cursor-pointer">
                            Checkout via WA
                        </button>
                    </div>
                </div>
            </template>
        </div>

        <div x-show="filteredVariants.length === 0" x-cloak class="text-center py-24 text-gray-400">
            <p class="text-sm">Aroma yang kamu cari belum tersedia. Coba kata kunci lain.</p>
        </div>
    </section>

    {{-- Info Strip --}}
    <section class="max-w-[1400px] mx-auto px-8 py-12 border-t border-gray-100 reveal-element">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            <div class="flex items-center gap-4 p-6 rounded-2xl bg-gray-50 border border-gray-100">
                <div
                    class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center shrink-0 text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-gray-900">Aroma Autentik</h4>
                    <p class="text-xs text-gray-500 mt-0.5">Diracik menyerupai aroma original secara presisi.</p>
                </div>
            </div>

            <div class="flex items-center gap-4 p-6 rounded-2xl bg-gray-50 border border-gray-100">
                <div
                    class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center shrink-0 text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-gray-900">Botol Travel Size</h4>
                    <p class="text-xs text-gray-500 mt-0.5">Praktis dibawa kemana saja, muat di tas kecil.</p>
                </div>
            </div>

            <div class="flex items-center gap-4 p-6 rounded-2xl bg-gray-50 border border-gray-100">
                <div
                    class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center shrink-0 text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-gray-900">Harga Bersahabat</h4>
                    <p class="text-xs text-gray-500 mt-0.5">Coba banyak aroma tanpa harus beli full bottle.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FLOATING CART BUTTON --}}
    <div class="fixed bottom-6 right-6 z-40">
        <button id="floating-cart-btn" @click="cartOpen = true"
            class="relative bg-black text-white p-4 rounded-full shadow-2xl hover:bg-gray-800 transition-all duration-300 transform hover:scale-105 flex items-center justify-center cursor-pointer group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <span x-show="totalItems > 0" :key="totalItems" x-text="totalItems"
                class="absolute -top-1 -right-1 bg-white text-black border border-black text-[11px] font-extrabold w-6 h-6 rounded-full flex items-center justify-center shadow-md animate-pop"></span>
        </button>
    </div>

    {{-- Slide-over Cart Drawer Sidebar --}}
    <div x-cloak x-show="cartOpen" class="relative z-50">
        <div x-show="cartOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="cartOpen = false"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <div x-show="cartOpen"
                        x-transition:enter="transform transition ease-in-out duration-300 sm:duration-300"
                        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                        x-transition:leave="transform transition ease-in-out duration-300 sm:duration-300"
                        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                        class="pointer-events-auto w-screen max-w-md bg-white shadow-xl flex flex-col">

                        <div class="flex items-center justify-between px-6 py-6 border-b border-gray-100">
                            <h2 class="text-lg font-bold text-gray-900">Your Shopping Cart</h2>
                            <button @click="cartOpen = false" class="text-gray-400 hover:text-black cursor-pointer">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div class="flex-1 overflow-y-auto px-6 py-4 space-y-4">
                            <template x-if="items.length === 0">
                                <div class="text-center py-20 text-gray-400">
                                    <p class="text-sm">Your cart is currently empty.</p>
                                </div>
                            </template>

                            <template x-for="(item, index) in items" :key="index">
                                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-2xl border border-gray-100">
                                    <div class="w-16 h-16 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-300 font-extrabold text-lg shrink-0"
                                        x-text="item.name.charAt(0)"></div>
                                    <div class="flex-1">
                                        <h4 class="text-xs font-semibold text-gray-900 line-clamp-1" x-text="item.name">
                                        </h4>
                                        <p class="text-xs font-bold text-gray-700 mt-1" x-text="item.price"></p>
                                        <div class="flex items-center gap-2 mt-2">
                                            <button @click="decreaseQty(index)"
                                                class="w-6 h-6 bg-white border border-gray-200 rounded-full text-xs flex items-center justify-center cursor-pointer">-</button>
                                            <span class="text-xs font-semibold" x-text="item.qty"></span>
                                            <button @click="increaseQty(index)"
                                                class="w-6 h-6 bg-white border border-gray-200 rounded-full text-xs flex items-center justify-center cursor-pointer">+</button>
                                        </div>
                                    </div>
                                    <button @click="removeItem(index)"
                                        class="text-gray-400 hover:text-red-500 p-2 cursor-pointer">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </template>
                        </div>

                        <div class="border-t border-gray-100 px-6 py-6 bg-gray-50">
                            <div class="flex justify-between text-sm font-semibold text-gray-900 mb-4">
                                <span>Estimated Total</span>
                                <span x-text="formatRupiah(totalPrice)"></span>
                            </div>
                            <button @click="checkoutWhatsApp()"
                                class="w-full bg-black text-white text-sm font-semibold py-3.5 rounded-full hover:bg-gray-800 transition text-center block cursor-pointer">
                                Checkout via WhatsApp
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="bg-white border-t border-gray-200 pt-16 pb-8 reveal-element">
        <div class="max-w-[1400px] mx-auto px-8 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div>
                <h3 class="text-xl font-extrabold mb-3 text-gray-900">Perfu.me</h3>
                <p class="text-sm text-gray-500 leading-relaxed max-w-xs">Redefining the relationship between
                    professional performance and aesthetic clarity.</p>
                <div class="flex gap-3 mt-5 text-gray-500">
                    <span
                        class="w-8 h-8 rounded-full border border-gray-200 bg-gray-50 flex items-center justify-center">🌐</span>
                    <span
                        class="w-8 h-8 rounded-full border border-gray-200 bg-gray-50 flex items-center justify-center">@</span>
                    <span
                        class="w-8 h-8 rounded-full border border-gray-200 bg-gray-50 flex items-center justify-center">≡</span>
                </div>
            </div>
            <div>
                <p class="text-[11px] tracking-widest text-gray-400 font-semibold mb-4">PLATFORM</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><a href="{{ route('home') }}" class="hover:text-black">Home</a></li>
                    <li><a href="{{ route('home') }}#product" class="hover:text-black">Product</a></li>
                    <li><a href="#refill-grid" class="hover:text-black">Refill</a></li>
                </ul>
            </div>
            <div>
                <p class="text-[11px] tracking-widest text-gray-400 font-semibold mb-4">COMPANY</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><a href="{{ route('home') }}#story" class="hover:text-black">About Us</a></li>
                    <li><a href="#" class="hover:text-black">Careers</a></li>
                    <li><a href="#" class="hover:text-black">Contact</a></li>
                </ul>
            </div>
            <div>
                <p class="text-[11px] tracking-widest text-gray-400 font-semibold mb-4">STAY AHEAD</p>
                <p class="text-sm text-gray-600 mb-4">Receive weekly insights on high-performance workflows and luxury
                    lifestyle curation.</p>
                <form action="#" method="POST" class="flex gap-2">
                    <input type="email" name="email" placeholder="Your work email" required
                        class="bg-gray-50 border border-gray-200 rounded-full px-4 py-2.5 text-sm flex-1 outline-none focus:border-gray-400">
                    <button type="submit"
                        class="bg-black text-white text-sm font-semibold rounded-full px-5 py-2.5 hover:bg-gray-800 transition">Subscribe</button>
                </form>
            </div>
        </div>
        <div
            class="max-w-[1400px] mx-auto px-8 flex flex-col sm:flex-row justify-between items-center gap-3 border-t border-gray-100 mt-10 pt-6 text-xs text-gray-400">
            <span>
                <a href="#" class="hover:text-gray-600">PRIVACY POLICY</a> &nbsp;
                <a href="#" class="hover:text-gray-600">TERMS OF SERVICE</a> &nbsp;
                <a href="#" class="hover:text-gray-600">COOKIE POLICY</a>
            </span>
            <span>&copy; {{ date('Y') }} PERFU.ME DIGITAL GROUP. ESTABLISHED IN INDONESIA.</span>
        </div>
    </footer>

    {{-- Alpine.js & Refill Page Logic --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        function refillPage() {
            return {
                cartOpen: false,
                items: [],
                search: '',
                sizes: [
                    { ml: 3, price: 15000 },
                    { ml: 5, price: 25000 },
                    { ml: 8, price: 35000 },
                ],
                variants: [
                    'Dynamyst', 'Vanessence', 'VS Scandalous', 'VS Romantic Wish', 'Dior Sauvage',
                    'Aigner Blue Emotion', 'Baccarrat Rouge 405', 'CH Good Girl', 'Channel Coco Mademoiselle',
                    'David of Man Cool Water', 'Dunhill Blue', 'Escada Cherry', 'Escada Sexy Grafity',
                    'Aigner Black', 'Aqua Kiss', 'Black XS', 'Bvlgari Extreme', 'Bvlgari Omnia Amethyste',
                    'Escada Sorbeto', 'Greed Aventus', 'Jaguar Blue', 'Miss Dior Blooming Bouquet',
                    'One Million Lucky', 'Polo Sport', 'Vanilla Bodies', 'Vanilla Ice Pink Chiffon',
                    'Vercase Eros', 'VS Amber Romance', 'VS Bomshell', 'VS So Sexy', 'White Musk',
                    'YSL Black Opium', 'YSL Libre Women', 'Zahrat Hawaii', 'Zara Orchid',
                ],

                get products() {
                    return this.variants.map(name => ({ name, selectedSize: 5 }));
                },

                get totalVariants() {
                    return this.variants.length;
                },

                get filteredVariants() {
                    if (!this.search.trim()) return this._productList;
                    const q = this.search.trim().toLowerCase();
                    return this._productList.filter(p => p.name.toLowerCase().includes(q));
                },

                init() {
                    // stateful product list so selectedSize persists per card while filtering
                    this._productList = this.products;
                },

                currentPrice(product) {
                    const size = this.sizes.find(s => s.ml === product.selectedSize);
                    return size ? size.price : this.sizes[0].price;
                },

                addRefillToCart(product, event) {
                    this.playFlyingBallAnimation(event);
                    const price = this.currentPrice(product);
                    const label = `${product.name} (${product.selectedSize}ml)`;
                    let existing = this.items.find(item => item.name === label);
                    if (existing) {
                        existing.qty++;
                    } else {
                        this.items.push({ name: label, price: this.formatRupiah(price), qty: 1 });
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
                    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number);
                },

                async checkoutWhatsApp() {
                    if (this.items.length === 0) {
                        alert('Keranjang belanjaan lu masih kosong!');
                        return;
                    }
                    const orderId = await this.saveOrder(this.items);
                    if (!orderId) return;
                    let phone = '6287774375755';
                    let message = "Halo Kak, saya mau order refill parfum ini ya:\n\n";
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