<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfu.me · Products Collection</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,400;1,600&display=swap"
        rel="stylesheet">
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

<body class="text-neutral-900 antialiased bg-white selection:bg-neutral-900 selection:text-white"
    x-data="productPage()">

    
    <?php
        $announcements = (isset($brands) && $brands->count() > 0)
            ? $brands->pluck('name')->filter()->values()->toArray()
            : [
                'DYNAMYST (Bold Woody & Fresh)',
                'VANESSENCE (Citrus Warm Earthy)',
                'Dior Sauvage Extrait',
                'Baccarat Rouge 540',
                'Aigner Blue Emotion',
                'Channel Coco Mademoiselle',
                'VS Scandalous',
                '100% Extrait de Parfum Murni',
                'Konsultasi Aroma Gratis via WhatsApp',
            ];
    ?>
    <div id="marquee-bar"
        class="bg-neutral-950 text-neutral-300 text-[11px] font-medium tracking-wider uppercase border-b border-neutral-800 overflow-hidden py-2">
        <div class="marquee-track">
            <div class="flex items-center shrink-0">
                <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="px-6 flex items-center gap-2">
                        <span class="text-neutral-500 text-[10px]">✦</span> <?php echo e($item); ?>

                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="flex items-center shrink-0" aria-hidden="true">
                <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="px-6 flex items-center gap-2">
                        <span class="text-neutral-500 text-[10px]">✦</span> <?php echo e($item); ?>

                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    
    <header id="site-header" class="bg-white/95 backdrop-blur-md border-b border-neutral-100 sticky top-0 z-50">
        <div class="max-w-[1240px] mx-auto flex items-center justify-between px-8 sm:px-10 h-[70px]">
            <div class="flex items-center gap-12">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 group">
                    <span
                        class="w-9 h-9 rounded-full bg-neutral-900 text-white flex items-center justify-center text-sm font-bold font-serif-luxury tracking-tighter shadow-sm">P.</span>
                    <div class="flex flex-col">
                        <span
                            class="text-xl font-extrabold tracking-tight text-neutral-950 leading-none">Perfu.me</span>
                        <span class="text-[9px] tracking-[0.22em] text-neutral-400 font-semibold uppercase mt-0.5">Haute
                            Parfumerie</span>
                    </div>
                </a>

                <nav class="hidden md:flex items-center gap-8 text-sm text-black/60">
                    <a href="<?php echo e(route('home')); ?>" class="hover:text-black">Home</a>
                    <a href="<?php echo e(route('refill')); ?>" class="nav-underline text-black font-medium">Products</a>
                </nav>
            </div>

            <div class="flex items-center gap-3.5">
                
                <button @click="cartOpen = true"
                    class="relative p-2.5 rounded-full border border-neutral-200 hover:border-neutral-900 text-neutral-800 hover:text-neutral-950 transition-colors flex items-center justify-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span x-show="totalItems > 0" x-text="totalItems"
                        class="absolute -top-1 -right-1 bg-neutral-950 text-white text-[9px] font-bold w-5 h-5 rounded-full flex items-center justify-center"></span>
                </button>

                
                <a href="<?php echo e(route('home')); ?>?tour=1"
                    class="hidden sm:inline-flex items-center gap-1.5 text-[12px] font-semibold text-neutral-600 hover:text-neutral-950 border border-neutral-200 hover:border-neutral-900 rounded-full px-3.5 py-2.5 transition cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <circle cx="12" cy="12" r="10" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.5 9a2.5 2.5 0 115 .5c0 1.5-2 1.5-2 3.5" />
                        <circle cx="12" cy="17" r="0.6" fill="currentColor" stroke="none" />
                    </svg>
                    <span>Panduan</span>
                </a>

                <a href="#products-grid"
                    class="bg-neutral-950 text-white text-[13px] font-semibold rounded-full px-5 py-2.5 hover:bg-neutral-800 transition tracking-wide shadow-sm">
                    Shop Now
                </a>
            </div>
        </div>
    </header>

    
    <section class="bg-neutral-50/70 border-b border-neutral-200/70 py-16 reveal-element">
        <div class="max-w-[1240px] mx-auto px-6 sm:px-8">
            <p class="text-xs tracking-[0.25em] text-neutral-400 font-bold uppercase mb-2">PRODUCT CATALOG & REFILL</p>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight mb-4 text-neutral-950 max-w-2xl">
                Products Collection
            </h1>
            <p class="text-neutral-500 leading-relaxed text-xs sm:text-sm max-w-xl mb-8">Temukan seluruh koleksi parfum
                eksklusif Perfu.me — mulai dari Original Signature Series hingga Refill Travel Collection. Pilih varian
                favoritmu sekarang.</p>

            <div class="flex flex-wrap gap-6 border-t border-b border-neutral-200/80 py-5 max-w-2xl">
                <div>
                    <p class="text-[9px] tracking-widest text-neutral-400 font-bold uppercase mb-1">TOTAL PRODUK</p>
                    <p class="font-extrabold text-neutral-950 text-base sm:text-lg" x-text="totalProducts + ' Varian'">
                    </p>
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

    
    <section id="products-grid" class="max-w-[1240px] mx-auto px-6 sm:px-8 py-16 bg-white reveal-element">

        
        <div
            class="flex flex-col md:flex-row md:items-center justify-between gap-6 border-b border-neutral-100 pb-8 mb-10">

            
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

            
            <div class="relative w-full md:w-80">
                <input type="text" x-model="search" placeholder="Cari parfum, aroma, varian..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-full bg-neutral-50 border border-neutral-200 text-xs font-medium text-neutral-900 placeholder:text-neutral-400 focus:outline-none focus:border-neutral-950 focus:ring-1 focus:ring-neutral-950 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-neutral-400 absolute left-3.5 top-3"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="7" />
                    <path stroke-linecap="round" d="m21 21-4.3-4.3" />
                </svg>
                <button x-show="search" @click="search = ''"
                    class="absolute right-3 top-2.5 text-neutral-400 hover:text-neutral-950 text-xs font-bold px-1">✕</button>
            </div>

        </div>

        
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-extrabold text-neutral-950 tracking-tight" x-text="activeTabTitle"></h2>
            <p class="text-xs text-neutral-500">
                Menampilkan <span class="font-bold text-neutral-950" x-text="filteredProducts.length"></span> dari <span
                    x-text="allProducts.length"></span> produk
            </p>
        </div>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <template x-for="(product, index) in filteredProducts" :key="product.id || index">
                <div @click="selectedProduct = product"
                    class="card-hover bg-white border border-neutral-200/80 rounded-3xl p-5 flex flex-col shadow-xs relative cursor-pointer">

                    
                    <span x-show="product.is_best_seller"
                        class="absolute top-3 left-3 z-10 bg-[#D4AF37] text-white text-[9px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider shadow-sm">
                        ★ Best Seller
                    </span>

                    
                    <div
                        class="aspect-square rounded-2xl bg-neutral-50 border border-neutral-100 mb-4 flex items-center justify-center overflow-hidden relative group">
                        <img :src="product.image"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                            :alt="product.name"
                            onerror="this.src='https://images.unsplash.com/photo-1592945403244-b3fbafd7f539?w=400&q=80'">
                        <img x-show="product.image_hover" :src="product.image_hover"
                            class="w-full h-full object-cover absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                            :alt="product.name + ' alternate'">
                    </div>

                    
                    <div class="flex items-center gap-1.5 flex-wrap mb-2">
                        <span
                            class="text-[9px] font-bold px-2 py-0.5 rounded-md bg-neutral-100 text-neutral-600 uppercase"
                            x-text="product.variant || 'EDP'"></span>
                        <span
                            class="text-[9px] font-bold px-2 py-0.5 rounded-md bg-neutral-100 text-neutral-600 uppercase"
                            x-text="'For ' + (product.gender || 'Unisex')"></span>
                        <span
                            class="text-[9px] font-bold px-2 py-0.5 rounded-md bg-neutral-100 text-neutral-700 uppercase"
                            x-text="'Ukuran: ' + formatVolume(product.volume)"></span>
                        <span
                            class="text-[9px] font-bold px-2 py-0.5 rounded-md bg-neutral-100 text-neutral-500 uppercase"
                            x-text="product.category"></span>
                    </div>

                    
                    <h3 class="text-sm font-bold text-neutral-950 mb-1 leading-snug" x-text="product.name"></h3>

                    
                    <p class="text-[11px] text-neutral-500 line-clamp-2 mb-3 leading-relaxed"
                        x-text="product.description || 'Aroma parfum eksklusif berkonsentrasi Extrait murni.'"></p>

                    
                    <template x-if="product.top_note || product.middle_note || product.base_note">
                        <div
                            class="bg-neutral-50 p-2.5 rounded-xl border border-neutral-100 mb-3 space-y-1 text-[10px]">
                            <p class="text-neutral-500 truncate" x-show="product.top_note"><strong
                                    class="text-neutral-800">Top:</strong> <span x-text="product.top_note"></span></p>
                            <p class="text-neutral-500 truncate" x-show="product.middle_note"><strong
                                    class="text-neutral-800">Mid:</strong> <span x-text="product.middle_note"></span>
                            </p>
                            <p class="text-neutral-500 truncate" x-show="product.base_note"><strong
                                    class="text-neutral-800">Base:</strong> <span x-text="product.base_note"></span></p>
                        </div>
                    </template>

                    
                    <template x-if="product.composition || product.packaging">
                        <div class="space-y-1 mb-3 text-[10px]">
                            <p class="text-neutral-500 truncate" x-show="product.packaging"><strong
                                    class="text-neutral-800">Kemasan:</strong> <span x-text="product.packaging"></span>
                            </p>
                            <p class="text-neutral-500 truncate" x-show="product.composition"><strong
                                    class="text-neutral-800">Komposisi:</strong> <span
                                    x-text="product.composition"></span>
                            </p>
                        </div>
                    </template>

                    
                    <div class="mt-auto pt-2 border-t border-neutral-100 mb-2 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] text-neutral-400 font-bold block uppercase">HARGA JUAL</span>
                            <p class="text-base font-extrabold text-neutral-950" x-text="formatRupiah(product.price)">
                            </p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <span :class="product.stock > 0 ? 'text-emerald-600' : 'text-red-500'"
                            class="text-[10px] font-bold"
                            x-text="product.stock > 0 ? 'Stok: ' + product.stock + ' pcs' : 'Stok Habis'"></span>
                    </div>

                    
                    <div class="flex flex-col gap-2">
                        <button @click.stop="addToCart(product, $event)" :disabled="product.stock <= 0"
                            :class="product.stock <= 0 ? 'bg-neutral-300 text-neutral-500 cursor-not-allowed' : 'bg-neutral-950 text-white hover:bg-neutral-800 cursor-pointer'"
                            class="w-full text-xs font-semibold py-3 rounded-full transition shadow-xs active:scale-[0.98]">
                            <span x-text="product.stock > 0 ? '+ Add to Cart' : 'Stok Habis'"></span>
                        </button>
                        <button
                            @click.stop="directCheckoutWhatsApp(product.name + ' (' + formatVolume(product.volume) + ' ' + (product.variant || '') + ')', formatRupiah(product.price))"
                            class="w-full border border-neutral-300 text-neutral-900 text-xs font-semibold py-2.5 rounded-full hover:bg-neutral-50 transition cursor-pointer active:scale-[0.98]">
                            Checkout via WA
                        </button>
                    </div>
                </div>
            </template>
        </div>

        
        <div x-show="filteredProducts.length === 0" x-cloak class="text-center py-24 text-neutral-400 space-y-2">
            <p class="text-sm font-bold text-neutral-700">Produk tidak ditemukan.</p>
            <p class="text-xs text-neutral-400">Tidak ada produk yang cocok dengan pencarian Anda.</p>
            <button @click="activeTab = 'all'; search = ''"
                class="inline-block px-4 py-2 bg-neutral-950 text-white text-xs font-semibold rounded-full mt-2 cursor-pointer">
                Reset Filter
            </button>
        </div>
    </section>

    
    <div x-show="selectedProduct" x-cloak class="fixed inset-0 z-[999] flex items-center justify-center p-4"
        style="display: none;">
        
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="selectedProduct = null"
            x-show="selectedProduct" x-transition.opacity></div>

        
        <div x-show="selectedProduct" x-transition @click.outside="selectedProduct = null"
            class="relative bg-white rounded-3xl w-full max-w-3xl max-h-[88vh] overflow-y-auto shadow-2xl">

            <button @click="selectedProduct = null"
                class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-white/90 border border-neutral-200 flex items-center justify-center text-neutral-600 hover:text-neutral-950 hover:bg-neutral-100 transition cursor-pointer">
                ✕
            </button>

            <template x-if="selectedProduct">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    
                    <div class="aspect-square md:aspect-auto bg-neutral-50 relative">
                        <span x-show="selectedProduct.is_best_seller"
                            class="absolute top-4 left-4 z-10 bg-[#D4AF37] text-white text-[9px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider shadow-sm">
                            ★ Best Seller
                        </span>
                        <img :src="selectedProduct.image" :alt="selectedProduct.name" class="w-full h-full object-cover"
                            onerror="this.src='https://images.unsplash.com/photo-1592945403244-b3fbafd7f539?w=400&q=80'">
                    </div>

                    
                    <div class="p-6 sm:p-8 flex flex-col">
                        <div class="flex items-center gap-1.5 flex-wrap mb-3">
                            <span
                                class="text-[9px] font-bold px-2 py-0.5 rounded-md bg-neutral-100 text-neutral-600 uppercase"
                                x-text="selectedProduct.variant || 'EDP'"></span>
                            <span
                                class="text-[9px] font-bold px-2 py-0.5 rounded-md bg-neutral-100 text-neutral-600 uppercase"
                                x-text="'For ' + (selectedProduct.gender || 'Unisex')"></span>
                            <span
                                class="text-[9px] font-bold px-2 py-0.5 rounded-md bg-neutral-100 text-neutral-700 uppercase"
                                x-text="'Ukuran: ' + formatVolume(selectedProduct.volume)"></span>
                            <span
                                class="text-[9px] font-bold px-2 py-0.5 rounded-md bg-neutral-100 text-neutral-500 uppercase"
                                x-text="selectedProduct.category"></span>
                        </div>

                        <h3 class="text-2xl font-extrabold text-neutral-950 mb-2 font-serif-luxury"
                            x-text="selectedProduct.name"></h3>

                        <p class="text-sm text-neutral-500 leading-relaxed mb-5"
                            x-text="selectedProduct.description || 'Aroma parfum eksklusif berkonsentrasi Extrait murni.'">
                        </p>

                        <template
                            x-if="selectedProduct.top_note || selectedProduct.middle_note || selectedProduct.base_note">
                            <div class="bg-neutral-50 p-4 rounded-2xl border border-neutral-100 mb-5 space-y-2 text-xs">
                                <p class="text-neutral-600" x-show="selectedProduct.top_note"><strong
                                        class="text-neutral-900">Top Notes:</strong> <span
                                        x-text="selectedProduct.top_note"></span></p>
                                <p class="text-neutral-600" x-show="selectedProduct.middle_note"><strong
                                        class="text-neutral-900">Middle Notes:</strong> <span
                                        x-text="selectedProduct.middle_note"></span></p>
                                <p class="text-neutral-600" x-show="selectedProduct.base_note"><strong
                                        class="text-neutral-900">Base Notes:</strong> <span
                                        x-text="selectedProduct.base_note"></span></p>
                            </div>
                        </template>

                        <p class="text-xs text-neutral-500 mb-1" x-show="selectedProduct.composition"><strong
                                class="text-neutral-900">Komposisi:</strong> <span
                                x-text="selectedProduct.composition"></span></p>
                        <p class="text-xs text-neutral-500 mb-4" x-show="selectedProduct.packaging"><strong
                                class="text-neutral-900">Kemasan:</strong> <span
                                x-text="selectedProduct.packaging"></span></p>

                        <p class="text-xs font-bold mb-5"
                            :class="selectedProduct.stock > 0 ? 'text-emerald-600' : 'text-red-500'"
                            x-text="selectedProduct.stock > 0 ? 'Stok tersedia: ' + selectedProduct.stock + ' pcs' : 'Stok Habis'">
                        </p>

                        <div class="mt-auto pt-4 border-t border-neutral-100 mb-5">
                            <span class="text-[10px] text-neutral-400 font-bold block uppercase">HARGA JUAL</span>
                            <p class="text-2xl font-extrabold text-neutral-950"
                                x-text="formatRupiah(selectedProduct.price)"></p>
                        </div>

                        <div class="flex flex-col gap-2">
                            <button @click="addToCart(selectedProduct, $event); selectedProduct = null"
                                :disabled="selectedProduct.stock <= 0"
                                :class="selectedProduct.stock <= 0 ? 'bg-neutral-300 text-neutral-500 cursor-not-allowed' : 'bg-neutral-950 text-white hover:bg-neutral-800 cursor-pointer'"
                                class="w-full text-sm font-semibold py-3 rounded-full transition active:scale-[0.98]">
                                <span x-text="selectedProduct.stock > 0 ? '+ Add to Cart' : 'Stok Habis'"></span>
                            </button>
                            <button
                                @click="directCheckoutWhatsApp(selectedProduct.name + ' (' + formatVolume(selectedProduct.volume) + ' ' + (selectedProduct.variant || '') + ')', formatRupiah(selectedProduct.price))"
                                class="w-full border border-neutral-300 text-neutral-900 text-sm font-semibold py-2.5 rounded-full hover:bg-neutral-50 transition cursor-pointer active:scale-[0.98]">
                                Checkout via WA
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    
    <div class="fixed bottom-6 right-6 z-40">
        <button id="floating-cart-btn" @click="cartOpen = true"
            class="relative bg-neutral-950 text-white p-3.5 rounded-full shadow-2xl hover:bg-neutral-800 transition-all duration-300 transform hover:scale-105 flex items-center justify-center cursor-pointer group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <span x-show="totalItems > 0" :key="totalItems" x-text="totalItems"
                class="absolute -top-1 -right-1 bg-white text-neutral-950 border border-neutral-950 text-[10px] font-extrabold w-5 h-5 rounded-full flex items-center justify-center shadow-sm animate-pop"></span>
        </button>
    </div>

    
    <div x-cloak x-show="cartOpen" class="relative z-50">
        <div x-show="cartOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="cartOpen = false"
            class="fixed inset-0 bg-neutral-950/60 backdrop-blur-xs transition-opacity"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <div x-show="cartOpen" x-transition:enter="transform transition ease-in-out duration-300"
                        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                        x-transition:leave="transform transition ease-in-out duration-300"
                        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                        id="cart-drawer-panel"
                        class="pointer-events-auto w-screen max-w-md bg-white shadow-2xl flex flex-col">

                        <div class="flex items-center justify-between px-6 py-5 border-b border-neutral-100">
                            <div>
                                <h2 class="text-sm font-extrabold text-neutral-900">Your Shopping Cart</h2>
                                <p class="text-[11px] text-neutral-400" x-text="totalItems + ' item(s) selected'"></p>
                            </div>
                            <button @click="cartOpen = false"
                                class="p-1.5 text-neutral-400 hover:text-neutral-950 transition cursor-pointer">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div class="flex-1 overflow-y-auto px-6 py-4 space-y-3">
                            <template x-if="items.length === 0">
                                <div class="text-center py-20 text-neutral-400 space-y-2.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-neutral-300 mx-auto"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    <p class="text-xs font-medium">Keranjang belanjaan Anda masih kosong.</p>
                                    <a href="#products-grid" @click="cartOpen = false"
                                        class="inline-block text-[11px] font-bold text-neutral-950 underline underline-offset-4">Jelajahi
                                        Produk &rarr;</a>
                                </div>
                            </template>

                            <template x-for="(item, index) in items" :key="index">
                                <div
                                    class="flex items-center gap-3.5 p-3 bg-neutral-50 rounded-xl border border-neutral-200/80">
                                    <img :src="item.image"
                                        class="w-14 h-14 object-cover rounded-lg bg-white border border-neutral-200 shrink-0">
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-xs font-bold text-neutral-900 truncate" x-text="item.name"></h4>
                                        <p class="text-xs font-extrabold text-neutral-950 mt-0.5" x-text="item.price">
                                        </p>
                                        <div class="flex items-center gap-2 mt-1.5">
                                            <button @click="decreaseQty(index)"
                                                class="w-5 h-5 bg-white border border-neutral-200 rounded-full text-xs font-bold flex items-center justify-center hover:bg-neutral-100 cursor-pointer">-</button>
                                            <span class="text-xs font-bold px-1" x-text="item.qty"></span>
                                            <button @click="increaseQty(index)"
                                                class="w-5 h-5 bg-white border border-neutral-200 rounded-full text-xs font-bold flex items-center justify-center hover:bg-neutral-100 cursor-pointer">+</button>
                                        </div>
                                    </div>
                                    <button @click="confirmDelete(index, item.name)"
                                        class="text-neutral-400 hover:text-red-400 p-1.5 transition-colors cursor-pointer rounded-lg hover:bg-red-50">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </template>
                        </div>

                        <div class="border-t border-neutral-200 px-6 py-5 bg-neutral-50/80">
                            <div class="flex justify-between text-xs font-bold text-neutral-950 mb-3.5">
                                <span>Subtotal Estimasi</span>
                                <span x-text="formatRupiah(totalPrice)"></span>
                            </div>
                            <button @click="checkoutWhatsApp()"
                                class="w-full bg-neutral-950 text-white text-xs font-semibold py-3.5 rounded-full hover:bg-neutral-800 transition text-center block cursor-pointer shadow-sm">
                                Order via WhatsApp Resmi
                            </button>
                        </div>

                        <div x-show="deleteConfirm.open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="absolute inset-0 z-20 flex items-end sm:items-center justify-center p-5"
                            style="background: rgba(15,15,15,0.55); backdrop-filter: blur(4px);">

                            <div x-show="deleteConfirm.open" x-transition:enter="transition ease-out duration-250"
                                x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="bg-white rounded-2xl shadow-2xl w-full max-w-sm p-6 space-y-4">

                                <div class="flex items-center justify-center w-12 h-12 rounded-2xl bg-red-50 mx-auto">
                                    <svg class="w-6 h-6 text-red-500" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="1.75">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>

                                <div class="text-center space-y-1.5">
                                    <h3 class="text-sm font-extrabold text-neutral-950">Hapus dari Keranjang?</h3>
                                    <p class="text-[12px] text-neutral-500 leading-relaxed">
                                        <span class="font-semibold text-neutral-800" x-text="deleteConfirm.name"></span>
                                        akan dihapus dari keranjang belanjaan Anda.
                                    </p>
                                </div>

                                <div class="flex gap-2.5 pt-1">
                                    <button @click="cancelDelete()"
                                        class="flex-1 border border-neutral-200 text-neutral-700 text-xs font-semibold py-3 rounded-xl hover:bg-neutral-50 transition-colors cursor-pointer">
                                        Batal
                                    </button>
                                    <button @click="confirmRemove()"
                                        class="flex-1 bg-red-500 hover:bg-red-600 text-white text-xs font-semibold py-3 rounded-xl transition-colors cursor-pointer shadow-sm">
                                        Ya, Hapus
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <footer class="bg-neutral-950 text-neutral-400 border-t border-neutral-900 pt-14 pb-8">
        <div class="max-w-[1240px] mx-auto px-6 sm:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-3">
                <div class="flex items-center gap-2">
                    <span
                        class="w-6 h-6 rounded-full bg-white text-neutral-950 flex items-center justify-center text-[10px] font-bold font-serif-luxury">P.</span>
                    <span class="text-lg font-extrabold text-white tracking-tight">Perfu.me</span>
                </div>
                <p class="text-xs text-neutral-400 leading-relaxed max-w-xs">
                    Haute Parfumerie & Extrait de Parfum berstandar internasional. Menghadirkan identitas aroma yang
                    berkelas, elegan, dan tahan lama.
                </p>
                <div class="flex gap-2 pt-1 text-neutral-400">
                    <span
                        class="w-7 h-7 rounded-full border border-neutral-800 bg-neutral-900 flex items-center justify-center text-xs hover:text-white transition cursor-pointer">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path
                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                            </path>
                        </svg>
                    </span>
                    <span
                        class="w-7 h-7 rounded-full border border-neutral-800 bg-neutral-900 flex items-center justify-center text-xs hover:text-white transition cursor-pointer">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </span>
                    <span
                        class="w-7 h-7 rounded-full border border-neutral-800 bg-neutral-900 flex items-center justify-center text-xs hover:text-white transition cursor-pointer">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div>
                <p class="text-[10px] tracking-widest text-neutral-300 font-bold uppercase mb-3">FRAGRANCE SERIES</p>
                <ul class="space-y-1.5 text-xs text-neutral-400">
                    <li><a href="<?php echo e(route('home')); ?>#product" class="hover:text-white transition">Dynamyst Extrait</a>
                    </li>
                    <li><a href="<?php echo e(route('home')); ?>#product" class="hover:text-white transition">Vanessence Extrait</a>
                    </li>
                    <li><a href="#products-grid" class="hover:text-white transition">Discovery Refills</a></li>
                    <li><a href="#products-grid" class="hover:text-white transition">Signature Bundles</a></li>
                </ul>
            </div>

            <div>
                <p class="text-[10px] tracking-widest text-neutral-300 font-bold uppercase mb-3">CUSTOMER CARE</p>
                <ul class="space-y-1.5 text-xs text-neutral-400">
                    <li><a href="https://wa.me/6287774375755" class="hover:text-white transition">Konsultasi Aroma</a>
                    </li>
                    <li><a href="#" class="hover:text-white transition">Garansi Pengiriman</a></li>
                    <li><a href="#" class="hover:text-white transition">Cara Pemesanan</a></li>
                    <li><a href="#" class="hover:text-white transition">Panduan Longevity</a></li>
                </ul>
            </div>

            <div>
                <p class="text-[10px] tracking-widest text-neutral-300 font-bold uppercase mb-3">NEWSLETTER</p>
                <p class="text-xs text-neutral-400 mb-3">Dapatkan info rilis aroma baru dan penawaran terbatas langsung
                    ke email Anda.</p>
                <form action="#" method="POST" class="flex gap-2">
                    <input type="email" placeholder="Email Anda..." required
                        class="bg-neutral-900 border border-neutral-800 rounded-full px-3.5 py-2 text-xs flex-1 outline-none text-white focus:border-neutral-500 placeholder:text-neutral-600">
                    <button type="button"
                        class="bg-white text-neutral-950 text-xs font-bold rounded-full px-3.5 py-2 hover:bg-neutral-200 transition">Join</button>
                </form>
            </div>
        </div>

        <div
            class="max-w-[1240px] mx-auto px-6 sm:px-8 flex flex-col sm:flex-row justify-between items-center gap-2.5 border-t border-neutral-900 mt-10 pt-5 text-[10px] text-neutral-500">
            <span>&copy; <?php echo e(date('Y')); ?> PERFU.ME INDONESIA. ALL RIGHTS RESERVED.</span>
            <span>CRAFTED WITH PRECISION · EXTRAIT DE PARFUM</span>
        </div>
    </footer>

    
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        function productPage() {
            return {
                cartOpen: false,
                items: [],
                deleteConfirm: { open: false, index: null, name: '' },
                search: '',
                activeTab: 'all',
                selectedProduct: null,

                init() {
                    try {
                        const savedCart = localStorage.getItem('perfume_cart_items');
                        if (savedCart) {
                            this.items = JSON.parse(savedCart);
                        }
                    } catch (e) { }

                    this.$watch('items', (val) => {
                        try {
                            localStorage.setItem('perfume_cart_items', JSON.stringify(val));
                        } catch (e) { }
                    });
                },

                allProducts: <?php echo \Illuminate\Support\Js::from(isset($allProducts) ? $allProducts->map(function ($p) {
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
                })->values()->toArray() : [])->toHtml() ?>,

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
                    if (event) this.playFlyingBallAnimation(event);
                    const price = product.price || 0;
                    const label = `${product.name} (${this.formatVolume(product.volume)} ${product.variant || ''})`;
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
                    const button = event.currentTarget || event.target.closest('button') || event.target;
                    const cartIcon = document.getElementById('floating-cart-btn') || document.querySelector('#site-header button');
                    if (!button || !cartIcon) return;

                    const btnRect = button.getBoundingClientRect();
                    const cartRect = cartIcon.getBoundingClientRect();

                    const ball = document.createElement('div');
                    ball.style.position = 'fixed';
                    ball.style.left = `${btnRect.left + btnRect.width / 2 - 8}px`;
                    ball.style.top = `${btnRect.top + btnRect.height / 2 - 8}px`;
                    ball.style.width = '16px';
                    ball.style.height = '16px';
                    ball.style.backgroundColor = '#000000';
                    ball.style.borderRadius = '50%';
                    ball.style.zIndex = '9999';
                    ball.style.pointerEvents = 'none';
                    ball.style.transition = 'all 0.55s cubic-bezier(0.25, 1, 0.5, 1)';
                    document.body.appendChild(ball);

                    setTimeout(() => {
                        ball.style.left = `${cartRect.left + cartRect.width / 2 - 8}px`;
                        ball.style.top = `${cartRect.top + cartRect.height / 2 - 8}px`;
                        ball.style.transform = 'scale(0.2)';
                        ball.style.opacity = '0.4';
                    }, 20);

                    setTimeout(() => { ball.remove(); }, 550);
                },

                increaseQty(index) { this.items[index].qty++; },
                decreaseQty(index) {
                    if (this.items[index].qty > 1) {
                        this.items[index].qty--;
                    } else {
                        this.confirmDelete(index, this.items[index].name);
                    }
                },

                confirmDelete(index, name) {
                    this.deleteConfirm = { open: true, index, name };
                },

                cancelDelete() {
                    this.deleteConfirm = { open: false, index: null, name: '' };
                },

                confirmRemove() {
                    if (this.deleteConfirm.index !== null) {
                        this.items.splice(this.deleteConfirm.index, 1);
                    }
                    this.deleteConfirm = { open: false, index: null, name: '' };
                },

                removeItem(index) { this.items.splice(index, 1); },

                get totalItems() {
                    return this.items.reduce((sum, item) => sum + item.qty, 0);
                },
                get totalPrice() {
                    return this.items.reduce((sum, item) => {
                        let cleanPrice = parseInt(String(item.price).replace(/[^0-9]/g, '')) || 0;
                        return sum + (cleanPrice * item.qty);
                    }, 0);
                },
                formatRupiah(number) {
                    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number || 0);
                },
                // Handles both a single volume value (e.g. 50) and a comma-separated
                // list coming from the "volume[]" checkboxes on the create form
                // (e.g. "30,50,100"), showing every selected size.
                formatVolume(volume) {
                    if (!volume && volume !== 0) return '50ml';
                    const parts = String(volume).split(',').map(v => v.trim()).filter(Boolean);
                    if (parts.length === 0) return '50ml';
                    return parts.map(v => v + 'ml').join(' / ');
                },

                async checkoutWhatsApp() {
                    if (this.items.length === 0) {
                        alert('Keranjang belanjaan Anda masih kosong!');
                        return;
                    }
                    const orderId = await this.saveOrder(this.items);
                    if (!orderId) return;
                    let phone = '6287774375755';
                    let message = "Halo Kak Admin Perfu.me, saya mau pesan parfum berikut:\n\n";
                    this.items.forEach((item, index) => {
                        message += `${index + 1}. *${item.name}* - ${item.qty} pcs (${item.price})\n`;
                    });
                    message += `\n*Nomor Pesanan:* #${orderId}`;
                    message += `\n*Total Belanja:* ${this.formatRupiah(this.totalPrice)}`;
                    message += `\n\nMohon dicekkan ketersediaan stok & ongkir ke alamat saya ya kak. Terima kasih!`;
                    let encodedMessage = encodeURIComponent(message);
                    window.location.href = `https://wa.me/${phone}?text=${encodedMessage}`;
                },

                async directCheckoutWhatsApp(name, price) {
                    const numericPrice = parseInt(String(price).replace(/[^0-9]/g, '')) || 0;
                    const orderId = await this.saveOrder([{ name, price: numericPrice, qty: 1 }]);
                    if (!orderId) return;
                    let phone = '6287774375755';
                    let message = `Halo Kak Admin Perfu.me, saya mau order 1 pcs *${name}* (${price}).\n*Nomor Pesanan:* #${orderId}\n\nMohon info ketersediaan stok dan ongkir ke alamat saya ya kak. Terima kasih!`;
                    let encodedMessage = encodeURIComponent(message);
                    window.location.href = `https://wa.me/${phone}?text=${encodedMessage}`;
                },

                async saveOrder(items) {
                    try {
                        const response = await fetch('<?php echo e(route('orders.checkout')); ?>', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '<?php echo e(csrf_token()); ?>' },
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

</html><?php /**PATH C:\Users\Faiz\Perfu.me\resources\views\customer\refillpage.blade.php ENDPATH**/ ?>