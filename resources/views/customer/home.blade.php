<!doctype html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfu.me · Haute Parfumerie & Extrait de Parfum</title>
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

        @keyframes badgePop {
            0% { transform: scale(0.8); }
            50% { transform: scale(1.25); }
            100% { transform: scale(1); }
        }

        .animate-pop {
            animation: badgePop 0.3s ease-in-out;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.90);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .glass-dark {
            background: rgba(18, 18, 18, 0.88);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="text-neutral-900 antialiased bg-white selection:bg-neutral-900 selection:text-white" x-data="cartSystem()">

    {{-- Top Announcement Bar --}}
    @php
        $announcementList = (isset($brands) && $brands->count() > 0)
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
    @endphp
    <div id="marquee-bar" class="bg-neutral-950 text-neutral-300 text-[11px] font-medium tracking-wider uppercase border-b border-neutral-800 overflow-hidden py-2">
        <div class="marquee-track">
            <div class="flex items-center shrink-0">
                @foreach ($announcementList as $item)
                    <span class="px-6 flex items-center gap-2">
                        <span class="text-neutral-500 text-[10px]">✦</span> {{ $item }}
                    </span>
                @endforeach
            </div>
            <div class="flex items-center shrink-0" aria-hidden="true">
                @foreach ($announcementList as $item)
                    <span class="px-6 flex items-center gap-2">
                        <span class="text-neutral-500 text-[10px]">✦</span> {{ $item }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Navbar --}}
    <header id="site-header" class="bg-white/95 backdrop-blur-md border-b border-neutral-100 sticky top-0 z-50">
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
                    <a href="{{ route('home') }}" class="nav-underline text-black font-medium">Home</a>
                    <a href="{{ route('refill') }}" class="hover:text-black">Products</a>
                </nav>
            </div>

            <div class="flex items-center gap-3.5">
                {{-- Cart Trigger in Header --}}
                <button @click="cartOpen = true" class="relative p-2.5 rounded-full border border-neutral-200 hover:border-neutral-900 text-neutral-800 hover:text-neutral-950 transition-colors flex items-center justify-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span x-show="totalItems > 0" x-text="totalItems" class="absolute -top-1 -right-1 bg-neutral-950 text-white text-[9px] font-bold w-4.5 h-4.5 w-5 h-5 rounded-full flex items-center justify-center"></span>
                </button>

                <button @click="startTour()" class="hidden sm:inline-flex items-center gap-1.5 text-[12px] font-semibold text-neutral-600 hover:text-neutral-950 border border-neutral-200 hover:border-neutral-900 rounded-full px-3.5 py-2.5 transition cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <circle cx="12" cy="12" r="10" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.5 9a2.5 2.5 0 115 .5c0 1.5-2 1.5-2 3.5" />
                        <circle cx="12" cy="17" r="0.6" fill="currentColor" stroke="none" />
                    </svg>
                    <span>Panduan</span>
                </button>

                <a href="#product" class="bg-neutral-950 text-white text-[13px] font-semibold rounded-full px-5 py-2.5 hover:bg-neutral-800 transition tracking-wide shadow-sm">
                    Shop Now
                </a>
            </div>
        </div>
    </header>
    
    {{-- ================================================================ --}}
    {{-- HERO SECTION — SPLIT SCREEN WITH FLOATING PRODUCT CARDS         --}}
    {{-- ================================================================ --}}
    @php
        $heroScents = (isset($heroProducts) && $heroProducts->count() > 0)
            ? $heroProducts->map(function($product, $index) {
                return [
                    'name' => strtoupper($product->name),
                    'label' => sprintf('%02d', $index + 1),
                    'subname' => ($product->category ?? 'Signature') . ' ' . ($product->variant ?? 'Extrait de Parfum'),
                    'price' => 'Rp ' . number_format($product->price, 0, ',', '.'),
                    'character' => $product->description ? \Illuminate\Support\Str::limit($product->description, 60) : (($product->variant ? $product->variant . ' · ' : '') . ($product->gender ?? 'Universal')),
                    'topNotes' => $product->top_note ?: 'Fresh Notes',
                    'heartNotes' => $product->middle_note ?: 'Floral Notes',
                    'baseNotes' => $product->base_note ?: 'Woody Musk',
                    'tag' => $product->is_best_seller ? 'Best Seller' : 'Featured',
                    'image' => $product->image ? asset('storage/' . $product->image) : asset('storage/image/DSC00057.JPG'),
                    'alt' => $product->name . ' - Perfu.me Collection'
                ];
            })->values()->toArray()
            : [
                [
                    'name' => 'DYNAMYST',
                    'label' => '01',
                    'subname' => 'Signature Extrait de Parfum',
                    'price' => 'Rp 45.000',
                    'character' => 'Bold Woody & Fresh Citrus',
                    'topNotes' => 'Bergamot, Mandarin',
                    'heartNotes' => 'French Lavender',
                    'baseNotes' => 'Amber & White Musk',
                    'tag' => 'Best Seller',
                    'image' => asset('storage/image/DSC00057.JPG'),
                    'alt' => 'Dynamyst Extrait de Parfum – Signature Collection'
                ],
                [
                    'name' => 'VANESSENCE',
                    'label' => '02',
                    'subname' => 'Exclusive Extrait de Parfum',
                    'price' => 'Rp 45.000',
                    'character' => 'Citrus Fresh & Warm Earthy',
                    'topNotes' => 'Lemon Zest, Apple',
                    'heartNotes' => 'Ambroxan',
                    'baseNotes' => 'Oakmoss & Cedar',
                    'tag' => 'Exclusive Series',
                    'image' => asset('storage/image/DSC00122.JPG'),
                    'alt' => 'Vanessence Extrait de Parfum – Exclusive Series'
                ]
            ];
    @endphp
    <section id="hero-section" class="relative overflow-hidden border-b border-neutral-100" style="min-height: 88vh;" x-data="{
        activeScent: 0,
        scents: @js($heroScents)
    }">
        {{-- ── LEFT HALF: Full-bleed Fragrance Image ── --}}
        <div class="hidden lg:block absolute inset-y-0 left-0 w-[48%] overflow-hidden">
            <template x-for="(scent, index) in scents" :key="'bg-' + index">
                <img
                    :src="scent.image"
                    :alt="scent.alt"
                    x-show="activeScent === index"
                    x-transition:enter="transition-opacity ease-out duration-500"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute inset-0 w-full h-full object-cover object-center"
                    onerror="this.src='https://via.placeholder.com/800x900?text=Perfu.me'"
                >
            </template>
            {{-- Gradient overlay — fades the image edge into white on the right --}}
            <div class="absolute inset-y-0 right-0 w-28 bg-gradient-to-l from-white to-transparent pointer-events-none"></div>
            {{-- Floating stat badge — top left --}}
            <div class="absolute top-8 left-8 glass-panel border border-white/60 shadow-lg rounded-2xl px-4 py-3 space-y-0.5">
                <p class="text-[9px] font-bold tracking-widest text-neutral-400 uppercase">Concentration</p>
                <p class="text-sm font-extrabold text-neutral-950">40% Pure Extrait</p>
            </div>
            {{-- Floating stat badge — bottom left --}}
            <div class="absolute bottom-10 left-8 glass-panel border border-white/60 shadow-lg rounded-2xl px-4 py-3 space-y-0.5">
                <p class="text-[9px] font-bold tracking-widest text-neutral-400 uppercase">Longevity</p>
                <p class="text-sm font-extrabold text-neutral-950">12–16 Hours</p>
            </div>
        </div>

        {{-- ── RIGHT HALF: Editorial Content + Product Switcher ── --}}
        <div class="relative z-10 flex flex-col justify-center min-h-screen lg:min-h-0 lg:ml-[48%] px-6 sm:px-10 lg:px-12 py-16 lg:py-20 space-y-8 bg-white">

            {{-- Mobile-only image (shows above text on small screens) --}}
            <div class="lg:hidden relative aspect-[4/3] rounded-2xl overflow-hidden border border-neutral-200 shadow-md">
                <template x-for="(scent, index) in scents" :key="'mob-' + index">
                    <img :src="scent.image" :alt="scent.alt"
                         x-show="activeScent === index"
                         x-transition:enter="transition-opacity duration-300"
                         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                         class="absolute inset-0 w-full h-full object-cover"
                         onerror="this.src='https://via.placeholder.com/600x450?text=Perfu.me'">
                </template>
            </div>

            {{-- ── EDITORIAL HEADER ── --}}
            <div class="space-y-4 max-w-lg">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-neutral-100 border border-neutral-200 text-[10px] font-bold text-neutral-600 tracking-widest uppercase">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>HAUTE PARFUMERIE · EXTRAIT 2025</span>
                </div>

                <h1 class="text-3xl sm:text-4xl xl:text-[44px] font-extrabold tracking-tight text-neutral-950 leading-[1.12]">
                    Aura yang<br>
                    <span class="font-serif-luxury italic font-normal text-neutral-400">Tak Terlupakan</span><br>
                    di Setiap Detik.
                </h1>

                <p class="text-[13px] sm:text-sm text-neutral-500 leading-relaxed max-w-sm">
                    Perfu.me menghadirkan konsentrasi <strong class="text-neutral-800 font-semibold">Extrait de Parfum murni</strong> yang diformulasikan untuk proyeksi aroma lembut dengan ketahanan seharian.
                </p>
            </div>

            {{-- ── PRODUCT SWITCHER CARDS ── --}}
            <div id="scent-switcher" class="space-y-2 max-w-lg">
                <p class="text-[10px] font-bold tracking-widest text-neutral-400 uppercase mb-3">Pilih Aroma Signature</p>

                <template x-for="(scent, index) in scents" :key="'card-' + index">
                    <button
                        @click="activeScent = index"
                        :class="activeScent === index
                            ? 'border-neutral-950 bg-neutral-950 text-white shadow-md'
                            : 'border-neutral-200 bg-white text-neutral-700 hover:border-neutral-400'"
                        class="w-full flex items-center gap-4 p-4 rounded-xl border transition-all duration-200 cursor-pointer text-left group"
                    >
                        {{-- Scent number chip --}}
                        <span
                            :class="activeScent === index ? 'bg-white/15 text-white' : 'bg-neutral-100 text-neutral-500'"
                            class="w-8 h-8 shrink-0 rounded-lg flex items-center justify-center text-[11px] font-extrabold transition-colors"
                            x-text="scent.label"
                        ></span>

                        {{-- Info --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-extrabold tracking-wider" x-text="scent.name"></span>
                                <span
                                    :class="activeScent === index ? 'bg-white/20 text-white' : 'bg-neutral-100 text-neutral-500'"
                                    class="text-[9px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider transition-colors"
                                    x-text="scent.tag"
                                ></span>
                            </div>
                            <p class="text-[11px] mt-0.5 truncate opacity-70" x-text="scent.character"></p>
                        </div>

                        {{-- Price --}}
                        <span class="text-xs font-extrabold shrink-0" x-text="scent.price"></span>
                    </button>
                </template>
            </div>

            {{-- ── ACTIVE SCENT NOTES STRIP ── --}}
            <template x-for="(scent, index) in scents" :key="'notes-' + index">
                <div x-show="activeScent === index"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="max-w-lg grid grid-cols-3 gap-2">
                    <div class="bg-neutral-50 border border-neutral-200/80 rounded-xl p-3">
                        <p class="text-[8px] font-bold tracking-widest text-neutral-400 uppercase mb-1">Top</p>
                        <p class="text-[11px] font-semibold text-neutral-900 leading-snug" x-text="scent.topNotes"></p>
                    </div>
                    <div class="bg-neutral-50 border border-neutral-200/80 rounded-xl p-3">
                        <p class="text-[8px] font-bold tracking-widest text-neutral-400 uppercase mb-1">Heart</p>
                        <p class="text-[11px] font-semibold text-neutral-900 leading-snug" x-text="scent.heartNotes"></p>
                    </div>
                    <div class="bg-neutral-50 border border-neutral-200/80 rounded-xl p-3">
                        <p class="text-[8px] font-bold tracking-widest text-neutral-400 uppercase mb-1">Base</p>
                        <p class="text-[11px] font-semibold text-neutral-900 leading-snug" x-text="scent.baseNotes"></p>
                    </div>
                </div>
            </template>

            {{-- ── CTA BUTTONS ── --}}
            <div id="hero-cta" class="flex flex-col sm:flex-row gap-2.5 max-w-lg">
                <template x-for="(scent, index) in scents" :key="'cta-' + index">
                    <div x-show="activeScent === index" class="flex flex-col sm:flex-row gap-2.5 w-full">
                        <button
                            @click="addToCart({ name: scent.name + ' Extrait 50ml', price: scent.price, image: scent.image }, $event)"
                            class="flex-1 bg-neutral-950 text-white text-xs font-semibold py-3.5 px-5 rounded-full hover:bg-neutral-800 transition-all cursor-pointer flex items-center justify-center gap-2 active:scale-[0.98]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span>Add to Cart</span>
                        </button>
                        <button
                            @click="directCheckoutWhatsApp(scent.name + ' Extrait 50ml', scent.price)"
                            class="flex-1 border border-neutral-300 text-neutral-900 text-xs font-semibold py-3.5 px-5 rounded-full hover:bg-neutral-50 transition-all cursor-pointer flex items-center justify-center gap-2 active:scale-[0.98]">
                            <svg class="w-3.5 h-3.5 text-emerald-600" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                            <span>Order via WhatsApp</span>
                        </button>
                    </div>
                </template>
            </div>

            {{-- ── SOCIAL PROOF ── --}}
            <div class="flex items-center gap-3 pt-1 max-w-lg border-t border-neutral-100">
                <div class="flex -space-x-2 overflow-hidden pt-3">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80" alt="Minjeong" class="inline-block h-7 w-7 rounded-full ring-2 ring-white object-cover">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80" alt="Reza" class="inline-block h-7 w-7 rounded-full ring-2 ring-white object-cover">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80" alt="Amanda" class="inline-block h-7 w-7 rounded-full ring-2 ring-white object-cover">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=80" alt="Kevin" class="inline-block h-7 w-7 rounded-full ring-2 ring-white object-cover">
                </div>
                <div class="pt-3">
                    <div class="flex items-center gap-1 text-amber-500 text-[11px]">
                        <span>★★★★★</span>
                        <span class="font-bold text-neutral-950 ml-0.5">{{ number_format($avgRating ?? 5.0, 1) }}</span>
                        <span class="text-neutral-400 font-normal">/ 5.0</span>
                    </div>
                    <p class="text-[10px] text-neutral-400">Dipercaya 1.400+ pelanggan Indonesia</p>
                </div>
            </div>

        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- VALUE PROPOSITIONS / USP BADGES STRIP (SVG ICONS)        --}}
    {{-- ======================================================== --}}
    <section id="usp-section" class="max-w-[1240px] mx-auto px-6 sm:px-8 py-12 border-b border-neutral-100">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            
            <div class="flex items-start gap-3.5 p-5 rounded-2xl bg-neutral-50/70 border border-neutral-200/70 card-hover">
                <div class="w-10 h-10 rounded-xl bg-white border border-neutral-200/80 shadow-2xs flex items-center justify-center shrink-0 text-neutral-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-neutral-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-neutral-900">100% Pure Extrait Formula</h4>
                    <p class="text-[11px] text-neutral-500 mt-0.5 leading-relaxed">Diracik dengan rasio konsentrasi bibit wangi murni tertinggi tanpa alkohol menyengat.</p>
                </div>
            </div>
            
            <div class="flex items-start gap-3.5 p-5 rounded-2xl bg-neutral-50/70 border border-neutral-200/70 card-hover">
                <div class="w-10 h-10 rounded-xl bg-white border border-neutral-200/80 shadow-2xs flex items-center justify-center shrink-0 text-neutral-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-neutral-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-neutral-900">12+ Hours Longevity</h4>
                    <p class="text-[11px] text-neutral-500 mt-0.5 leading-relaxed">Formulasi aroma yang menempel kuat di serat pakaian dan kulit seharian penuh.</p>
                </div>
            </div>

            <div class="flex items-start gap-3.5 p-5 rounded-2xl bg-neutral-50/70 border border-neutral-200/70 card-hover">
                <div class="w-10 h-10 rounded-xl bg-white border border-neutral-200/80 shadow-2xs flex items-center justify-center shrink-0 text-neutral-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-neutral-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-neutral-900">Garansi Aman Pengiriman</h4>
                    <p class="text-[11px] text-neutral-500 mt-0.5 leading-relaxed">Pengemasan bubble wrap tebal ekstra & garansi ganti botol baru gratis jika pecah di jalan.</p>
                </div>
            </div>

        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- ABOUT US / BRAND PHILOSOPHY                              --}}
    {{-- ======================================================== --}}
    <section id="story" class="max-w-[1240px] mx-auto px-6 sm:px-8 py-16 lg:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-14 items-center">
            
            <div class="lg:col-span-6 space-y-5">
                <p class="text-xs tracking-[0.25em] text-neutral-400 font-bold uppercase">OUR PHILOSOPHY</p>
                
                <h2 class="text-3xl sm:text-4xl font-extrabold text-neutral-950 leading-tight">
                    Crafted for Presence, <br>
                    <span class="font-serif-luxury italic font-normal text-neutral-500">Designed for Achievers.</span>
                </h2>
                
                <p class="text-neutral-500 leading-relaxed text-sm sm:text-[15px]">
                    Kami percaya bahwa wangi bukan sekadar aroma pendukung penampilan, melainkan pernyataan karakter dan rasa percaya diri. Setiap botol di <strong class="text-neutral-900 font-semibold">Perfu.me</strong> melalui proses kurasi presisi untuk memastikan harmoni antara kemewahan dan fungsionalitas pemakaian sehari-hari.
                </p>

                <div class="space-y-3 pt-1">
                    <div class="flex items-center gap-3 text-xs sm:text-sm font-medium text-neutral-800">
                        <span class="w-5 h-5 bg-neutral-950 text-white rounded-full flex items-center justify-center text-[10px] shrink-0">✓</span>
                        <span>Diproduksi dengan standar Extrait de Parfum murni berkualitas tinggi</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs sm:text-sm font-medium text-neutral-800">
                        <span class="w-5 h-5 bg-neutral-950 text-white rounded-full flex items-center justify-center text-[10px] shrink-0">✓</span>
                        <span>Proyeksi aroma lembut dengan jejak wangi (sillage) yang berkesan</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs sm:text-sm font-medium text-neutral-800">
                        <span class="w-5 h-5 bg-neutral-950 text-white rounded-full flex items-center justify-center text-[10px] shrink-0">✓</span>
                        <span>Formula higienis, aman di kulit dan tidak meninggalkan noda di pakaian</span>
                    </div>
                </div>

                <div class="pt-3">
                    <a href="{{ route('refill') }}" class="inline-flex items-center gap-2 text-xs font-bold text-neutral-950 underline underline-offset-8 hover:text-neutral-500 transition tracking-wide uppercase">
                        <span>Lihat Semua Koleksi Aroma</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-6 grid grid-cols-2 gap-4 sm:gap-5">
                <div class="bg-neutral-100 rounded-2xl aspect-[3/4] overflow-hidden shadow-sm border border-neutral-200/80">
                    <img src="{{ asset('storage/image/DSC00122.JPG') }}" 
                         alt="Perfu.me Craftsmanship" 
                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" 
                         onerror="this.src='https://via.placeholder.com/400x500?text=Perfu.me+Bottle+1'">
                </div>
                <div class="bg-neutral-100 rounded-2xl aspect-[3/4] overflow-hidden shadow-sm border border-neutral-200/80 mt-6">
                    <img src="{{ asset('storage/image/DSC00164.JPG') }}" 
                         alt="Perfu.me Essence" 
                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" 
                         onerror="this.src='https://via.placeholder.com/400x500?text=Perfu.me+Bottle+2'">
                </div>
            </div>

        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- DETAILED PRODUCT SHOWCASE SECTION (ZIG-ZAG)              --}}
    {{-- ======================================================== --}}
    <section id="product" class="max-w-[1240px] mx-auto px-6 sm:px-8 py-16 bg-white border-t border-neutral-100">
        <div id="product-intro" class="border-b border-neutral-200/80 pb-5 mb-14 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <p class="text-xs tracking-[0.25em] text-neutral-400 font-bold uppercase mb-1.5">CURATED SIGNATURES</p>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-neutral-950 tracking-tight">
                    Explore Our Masterpieces
                </h2>
            </div>
            <a href="https://wa.me/6287774375755?text=Halo%20Perfu.me,%20saya%20ingin%20melihat%20katalog%20lengkap%20semua%20varian" 
               target="_blank"
               class="text-xs font-bold text-neutral-950 underline underline-offset-8 hover:text-neutral-500 transition tracking-wide uppercase">
                Tanya Katalog Lengkap di WA &rarr;
            </a>
        </div>

        <div class="space-y-20 sm:space-y-24">

            @foreach ($productOri as $ori)
            @php
                $isEven = $loop->even;

                $gender = match($ori->gender){
                    'Pria' => 'Men',
                    'Wanita' => 'Women',
                    'Unisex' => 'Unisex',
                }
            @endphp
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-start">
                
                <div class="relative group rounded-2xl overflow-hidden bg-neutral-100 border border-neutral-200/80 shadow-sm w-full min-h-[480px] {{ $isEven ? 'lg:order-2' : 'lg:order-1'}}">
                    <img
                        src="{{ asset('storage/' . $ori->image) }}"
                        alt="{{ $ori->name }}"
                        class="absolute inset-0 w-full h-full min-h-[480px] object-cover transition-opacity duration-500 opacity-100 group-hover:opacity-0"
                        onerror="console.error('Image failed:', this.src)"
                    >
                    @if($ori->image_hover)
                        <img
                            src="{{ asset('storage/' . $ori->image_hover) }}"
                            alt="{{ $ori->name }} alternate view"
                            class="absolute inset-0 w-full h-full min-h-[480px] object-cover transition-opacity duration-500 opacity-0 group-hover:opacity-100"
                            onerror="console.error('Hover image failed:', this.src)"
                        >
                    @endif

                    <span class="absolute top-4 left-4 bg-neutral-950 text-white text-[9px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                        Best Seller #{{ $loop->iteration }}
                    </span>

                    @if($ori->image_hover)
                        <span class="absolute bottom-4 right-4 glass-panel border border-white/50 text-[10px] font-semibold text-neutral-700 px-3 py-1.5 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            Alternate View
                        </span>
                    @endif
                </div>

                <div class="lg:py-4 space-y-6 {{ $isEven ? 'lg:order-1' : 'lg:order-2' }}">
                    <div class="space-y-2">
                        <span class="inline-block text-[10px] font-bold tracking-widest text-neutral-400 uppercase">{{ $ori->variant }} for {{ $gender }} · {{ $ori->volume }}ml</span>
                        <h3 class="text-3xl sm:text-4xl font-extrabold text-neutral-950 tracking-tight">{{ $ori->name }}</h3>
                        <p class="text-2xl font-extrabold text-neutral-950">Rp {{ number_format($ori->price, 0, ',', '.') }}</p>
                    </div>

                    <p class="text-neutral-500 leading-relaxed text-sm">
                        {{ $ori->description }}
                    </p>

                    <div class="grid grid-cols-3 gap-3 bg-neutral-50 p-4 rounded-xl border border-neutral-200/80">
                        <div>
                            <p class="text-[9px] tracking-widest text-neutral-400 font-bold mb-1">TOP NOTES</p>
                            <p class="text-[11px] font-bold text-neutral-900 leading-snug">{{ $ori->top_note }}</p>
                        </div>
                        <div>
                            <p class="text-[9px] tracking-widest text-neutral-400 font-bold mb-1">MIDDLE NOTES</p>
                            <p class="text-[11px] font-bold text-neutral-900 leading-snug">{{ $ori->middle_note }}</p>
                        </div>
                        <div>
                            <p class="text-[9px] tracking-widest text-neutral-400 font-bold mb-1">BASE NOTES</p>
                            <p class="text-[11px] font-bold text-neutral-900 leading-snug">{{ $ori->base_note }}</p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-2.5">
                        <button @click="addToCart({
                                name: @js($ori->name),
                                price: @js('Rp '.number_format($ori->price, 0, ',', '.')),
                                image: @js(asset('storage/'.$ori->image))
                            }, $event)"
                            class="flex-1 bg-neutral-950 text-white text-xs font-semibold py-3.5 px-5 rounded-full hover:bg-neutral-800 transition text-center cursor-pointer shadow-xs active:scale-[0.98]">
                            + Add to Cart
                        </button>
                        <button @click="directCheckoutWhatsApp(
                                @js($ori->name.' '.$ori->variant.' '.$ori->volume.'ml'),
                                @js('Rp '.number_format($ori->price, 0, ',', '.'))
                            )"
                            class="flex-1 border border-neutral-300 text-neutral-900 text-xs font-semibold py-3.5 px-5 rounded-full hover:bg-neutral-50 transition text-center cursor-pointer active:scale-[0.98]">
                            Checkout via WhatsApp
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- TESTIMONIALS / REVIEWS SECTION                           --}}
    {{-- ======================================================== --}}
    <section id="reviews" class="bg-neutral-50/70 py-16 lg:py-24 border-t border-b border-neutral-200/70">
        <div class="max-w-[1240px] mx-auto px-6 sm:px-8">
            <div class="text-center max-w-lg mx-auto mb-14 space-y-2">
                <p class="text-xs tracking-[0.25em] text-neutral-400 font-bold uppercase">CUSTOMER EXPERIENCE</p>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-neutral-950">Trusted by 1,400+ Perfume Lovers</h2>
                <p class="text-neutral-500 text-xs sm:text-sm">Pendapat jujur dari mereka yang telah merasakan kualitas Extrait de Parfum kami.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @if (isset($reviews) && $reviews->count() > 0)
                    @foreach ($reviews as $review)
                        <div class="bg-white p-6 sm:p-7 rounded-2xl border border-neutral-200/80 shadow-2xs flex flex-col justify-between card-hover">
                            <div>
                                <div class="text-amber-500 mb-3 text-xs tracking-widest">
                                    {{ str_repeat('★', min(5, max(1, (int)$review->rating))) }}{{ str_repeat('☆', max(0, 5 - (int)$review->rating)) }}
                                </div>
                                <p class="text-xs text-neutral-600 leading-relaxed mb-5">"{{ $review->comment }}"</p>
                            </div>
                            <div class="flex items-center gap-3 pt-3 border-t border-neutral-100">
                                @php
                                    $initial = str($review->user_name)->substr(0, 1)->upper();
                                @endphp
                                <div class="w-9 h-9 rounded-full object-cover border border-neutral-200 shadow-xs flex items-center justify-center bg-black/80">
                                    <p class="text-white font-medium">
                                        {{ $initial }}
                                    </p>
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-neutral-900 capitalize">{{ $review->user_name }}</h4>
                                    <p class="text-[10px] text-neutral-400">{{ $review->product->name ?? 'Pelanggan Perfu.me' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="bg-white p-6 sm:p-7 rounded-2xl border border-neutral-200/80 shadow-2xs flex flex-col justify-between card-hover">
                        <div>
                            <div class="text-amber-500 mb-3 text-xs tracking-widest">★★★★★</div>
                            <p class="text-xs text-neutral-600 leading-relaxed mb-5">"Wanginya tahan seharian di kantor ber-AC. Tipe wangi yang nggak bikin pusing tapi ninggalin kesan mewah pas salaman sama klien."</p>
                        </div>
                        <div class="flex items-center gap-3 pt-3 border-t border-neutral-100">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=120&auto=format&fit=crop&q=80" alt="Reza Darmawan" class="w-9 h-9 rounded-full object-cover border border-neutral-200 shadow-xs">
                            <div>
                                <h4 class="text-xs font-bold text-neutral-900">Reza Darmawan</h4>
                                <p class="text-[10px] text-neutral-400">Software Engineer · Jakarta</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 sm:p-7 rounded-2xl border border-neutral-200/80 shadow-2xs flex flex-col justify-between card-hover">
                        <div>
                            <div class="text-amber-500 mb-3 text-xs tracking-widest">★★★★★</div>
                            <p class="text-xs text-neutral-600 leading-relaxed mb-5">"Order via WhatsApp gampang banget, tinggal klik langsung ke format pesan otomatis. Pengiriman aman banget pakai bubble wrap tebal."</p>
                        </div>
                        <div class="flex items-center gap-3 pt-3 border-t border-neutral-100">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=120&auto=format&fit=crop&q=80" alt="Amanda Nadia" class="w-9 h-9 rounded-full object-cover border border-neutral-200 shadow-xs">
                            <div>
                                <h4 class="text-xs font-bold text-neutral-900">Amanda Nadia</h4>
                                <p class="text-[10px] text-neutral-400">Creative Director · Bandung</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 sm:p-7 rounded-2xl border border-neutral-200/80 shadow-2xs flex flex-col justify-between card-hover">
                        <div>
                            <div class="text-amber-500 mb-3 text-xs tracking-widest">★★★★★</div>
                            <p class="text-xs text-neutral-600 leading-relaxed mb-5">"Kualitas Extrait de Parfum-nya beneran kerasa. Dipakai pagi jam 7, sampai pulang kantor malam masih nempel aromanya di kemeja."</p>
                        </div>
                        <div class="flex items-center gap-3 pt-3 border-t border-neutral-100">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=120&auto=format&fit=crop&q=80" alt="Kevin Pratama" class="w-9 h-9 rounded-full object-cover border border-neutral-200 shadow-xs">
                            <div>
                                <h4 class="text-xs font-bold text-neutral-900">Kevin Pratama</h4>
                                <p class="text-[10px] text-neutral-400">Entrepreneur · Surabaya</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- FLOATING GUIDE / TOUR BUTTON --}}
    <div class="fixed bottom-6 left-6 z-40">
        <button @click="startTour()" title="Panduan Penggunaan Website"
            class="bg-white text-neutral-900 border border-neutral-200 p-3.5 rounded-full shadow-xl hover:bg-neutral-50 transition-all duration-300 transform hover:scale-105 flex items-center justify-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                <circle cx="12" cy="12" r="10" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.5 9a2.5 2.5 0 115 .5c0 1.5-2 1.5-2 3.5" />
                <circle cx="12" cy="17" r="0.6" fill="currentColor" stroke="none" />
            </svg>
        </button>
    </div>

    {{-- ===================== ONBOARDING TOUR OVERLAY ===================== --}}
    <template x-if="tourOpen">
        <div class="fixed inset-0 z-[999]">
            {{-- Spotlight highlight (the huge box-shadow dims everything outside the box) --}}
            <div class="fixed rounded-2xl pointer-events-none transition-all duration-300 ease-out"
                 :style="{ top: tourHighlightStyle.top, left: tourHighlightStyle.left, width: tourHighlightStyle.width, height: tourHighlightStyle.height, boxShadow: '0 0 0 9999px rgba(10,10,10,0.65)', border: '2px solid rgba(255,255,255,0.9)' }">
            </div>

            {{-- Popup card, positioned right next to the highlighted feature --}}
            <div class="fixed z-[1000] bg-white rounded-2xl shadow-2xl border border-neutral-200 p-5 space-y-3.5 transition-all duration-300 ease-out"
                 :style="{ top: tourPopupStyle.top, left: tourPopupStyle.left, width: tourPopupStyle.width }">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-bold tracking-widest text-neutral-400 uppercase" x-text="'Panduan ' + (tourStep + 1) + ' / ' + tourSteps.length"></span>
                    <button @click="closeTour()" class="text-neutral-400 hover:text-neutral-950 transition cursor-pointer">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <h3 class="text-sm font-extrabold text-neutral-950" x-text="tourSteps[tourStep]?.title"></h3>
                <p class="text-xs text-neutral-500 leading-relaxed" x-text="tourSteps[tourStep]?.desc"></p>

                <div class="flex items-center justify-between pt-2 border-t border-neutral-100">
                    <button @click="closeTour()" class="text-[11px] font-semibold text-neutral-400 hover:text-neutral-700 transition cursor-pointer">
                        Lewati
                    </button>
                    <div class="flex gap-2">
                        <button x-show="tourStep > 0" @click="prevStep()"
                            class="text-xs font-semibold px-3.5 py-2 rounded-full border border-neutral-200 hover:bg-neutral-50 transition cursor-pointer">
                            Kembali
                        </button>
                        <button @click="tourStep === tourSteps.length - 1 ? closeTour() : nextStep()"
                            class="text-xs font-semibold px-4 py-2 rounded-full bg-neutral-950 text-white hover:bg-neutral-800 transition cursor-pointer">
                            <span x-text="tourStep === tourSteps.length - 1 ? 'Selesai' : 'Lanjut'"></span>
                        </button>
                    </div>
                </div>

                {{-- progress dots --}}
                <div class="flex gap-1 pt-1">
                    <template x-for="(s, i) in tourSteps" :key="i">
                        <span :class="i === tourStep ? 'bg-neutral-950 w-4' : 'bg-neutral-200 w-1.5'"
                              class="h-1.5 rounded-full transition-all duration-300"></span>
                    </template>
                </div>
            </div>
        </div>
    </template>

    {{-- FLOATING CART BUTTON --}}
    <div class="fixed bottom-6 right-6 z-40">
        <button id="floating-cart-btn" @click="cartOpen = true" 
            class="relative bg-neutral-950 text-white p-3.5 rounded-full shadow-2xl hover:bg-neutral-800 transition-all duration-300 transform hover:scale-105 flex items-center justify-center cursor-pointer group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            {{-- Badge Counter --}}
            <span x-show="totalItems > 0"
                  :key="totalItems"
                  x-text="totalItems" 
                  class="absolute -top-1 -right-1 bg-white text-neutral-950 border border-neutral-950 text-[10px] font-extrabold w-5 h-5 rounded-full flex items-center justify-center shadow-sm animate-pop"></span>
        </button>
    </div>

    {{-- Slide-over Cart Drawer Sidebar --}}
    <div x-cloak x-show="cartOpen" class="relative z-50">
        <div x-show="cartOpen"
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             @click="cartOpen = false" class="fixed inset-0 bg-neutral-950/60 backdrop-blur-xs transition-opacity"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <div x-show="cartOpen"
                         x-transition:enter="transform transition ease-in-out duration-300"
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
                            <button @click="cartOpen = false" class="p-1.5 text-neutral-400 hover:text-neutral-950 transition cursor-pointer">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div class="flex-1 overflow-y-auto px-6 py-4 space-y-3">
                            <template x-if="items.length === 0">
                                <div class="text-center py-20 text-neutral-400 space-y-2.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-neutral-300 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    <p class="text-xs font-medium">Keranjang belanjaan Anda masih kosong.</p>
                                    <a href="#product" @click="cartOpen = false" class="inline-block text-[11px] font-bold text-neutral-950 underline underline-offset-4">Jelajahi Produk &rarr;</a>
                                </div>
                            </template>

                            <template x-for="(item, index) in items" :key="index">
                                <div class="flex items-center gap-3.5 p-3 bg-neutral-50 rounded-xl border border-neutral-200/80">
                                    <img :src="item.image"
                                        class="w-14 h-14 object-cover rounded-lg bg-white border border-neutral-200 shrink-0">
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-xs font-bold text-neutral-900 truncate" x-text="item.name"></h4>
                                        <p class="text-xs font-extrabold text-neutral-950 mt-0.5" x-text="item.price"></p>
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

                        {{-- ── DELETE CONFIRMATION MODAL (inline inside cart drawer) ── --}}
                        <div
                            x-show="deleteConfirm.open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="absolute inset-0 z-20 flex items-end sm:items-center justify-center p-5"
                            style="background: rgba(15,15,15,0.55); backdrop-filter: blur(4px);">

                            <div
                                x-show="deleteConfirm.open"
                                x-transition:enter="transition ease-out duration-250"
                                x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="bg-white rounded-2xl shadow-2xl w-full max-w-sm p-6 space-y-4">

                                {{-- Icon --}}
                                <div class="flex items-center justify-center w-12 h-12 rounded-2xl bg-red-50 mx-auto">
                                    <svg class="w-6 h-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>

                                {{-- Copy --}}
                                <div class="text-center space-y-1.5">
                                    <h3 class="text-sm font-extrabold text-neutral-950">Hapus dari Keranjang?</h3>
                                    <p class="text-[12px] text-neutral-500 leading-relaxed">
                                        <span class="font-semibold text-neutral-800" x-text="deleteConfirm.name"></span>
                                        akan dihapus dari keranjang belanjaan Anda.
                                    </p>
                                </div>

                                {{-- Actions --}}
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
                        {{-- ── END DELETE CONFIRMATION MODAL ── --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
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
                    <li><a href="#product" class="hover:text-white transition">Dynamyst Extrait</a></li>
                    <li><a href="#product" class="hover:text-white transition">Vanessence Extrait</a></li>
                    <li><a href="#product" class="hover:text-white transition">Discovery Refills</a></li>
                    <li><a href="#product" class="hover:text-white transition">Signature Bundles</a></li>
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

            <div id="footer-newsletter">
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

    {{-- Alpine.js & Flying Ball Animation Script --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        function cartSystem() {
            return {
                cartOpen: false,
                items: [],
                deleteConfirm: { open: false, index: null, name: '' },

                // ===================== ONBOARDING TOUR =====================
                tourOpen: false,
                tourStep: 0,
                tourHighlightStyle: {},
                tourPopupStyle: {},
                _reposHandler: null,
                init() {
                    // 1) Auto-buka panduan sekali saat pertama kali membuka website
                    try {
                        const alreadySeen = localStorage.getItem('perfume_tour_seen');
                        if (!alreadySeen) {
                            setTimeout(() => this.startTour(), 900);
                        }
                    } catch (e) {
                        // localStorage tidak tersedia (mis. mode private) — abaikan, panduan tetap bisa dibuka manual
                    }
                },
                tourSteps: [
                    {
                        id: 'marquee-bar',
                        title: 'Info Berjalan',
                        desc: 'Pita berjalan ini menampilkan daftar brand/varian yang tersedia beserta info promo. Arahkan kursor ke sini untuk menghentikan sementara animasinya.'
                    },
                    {
                        id: 'site-header',
                        title: 'Navigasi & Keranjang',
                        desc: 'Menu ini untuk berpindah ke halaman Products, mengecek isi keranjang lewat ikon tas, atau klik "Shop Now" untuk langsung menuju koleksi produk.'
                    },
                    {
                        id: 'scent-switcher',
                        title: 'Pilih Aroma Signature',
                        desc: 'Klik salah satu kartu aroma untuk mengganti gambar, harga, dan detail notes (Top / Heart / Base) sesuai varian yang ingin kamu lihat.'
                    },
                    {
                        id: 'hero-cta',
                        title: 'Tambah ke Keranjang / Order Cepat',
                        desc: '"Add to Cart" menyimpan aroma yang sedang dipilih ke keranjang. "Order via WhatsApp" langsung membuka chat dengan pesan otomatis khusus untuk aroma ini.'
                    },
                    {
                        id: 'usp-section',
                        title: 'Keunggulan Produk',
                        desc: 'Tiga poin ini menjelaskan kualitas formula Extrait, daya tahan wangi, dan jaminan keamanan pengiriman dari Perfu.me.'
                    },
                    {
                        id: 'product-intro',
                        title: 'Koleksi Lengkap',
                        desc: 'Scroll di area ini untuk melihat semua varian parfum. Setiap produk punya tombol "+ Add to Cart" dan "Checkout via WhatsApp" masing-masing, lengkap dengan detail notes aromanya.'
                    },
                    {
                        id: 'reviews',
                        title: 'Ulasan Pelanggan',
                        desc: 'Baca pengalaman nyata pelanggan lain sebelum memutuskan aroma pilihanmu.'
                    },
                    {
                        id: 'floating-cart-btn',
                        target: 'cart-drawer-panel',
                        skipScroll: true,
                        title: 'Keranjang Belanja',
                        desc: 'Tombol ini selalu muncul di pojok kanan bawah dari halaman manapun. Klik untuk membuka ringkasan belanja seperti ini, atur jumlah pesanan, lalu checkout langsung via WhatsApp.'
                    },
                    {
                        id: 'footer-newsletter',
                        title: 'Newsletter & Kontak',
                        desc: 'Daftarkan email di sini untuk info rilis aroma baru, atau hubungi kami langsung lewat ikon sosial media di footer.'
                    }
                ],
                startTour() {
                    this.tourOpen = true;
                    this._reposHandler = this.positionTour.bind(this);
                    window.addEventListener('resize', this._reposHandler);
                    window.addEventListener('scroll', this._reposHandler, true);
                    this.goToStep(0);
                },
                closeTour() {
                    this.tourOpen = false;
                    this.cartOpen = false;
                    if (this._reposHandler) {
                        window.removeEventListener('resize', this._reposHandler);
                        window.removeEventListener('scroll', this._reposHandler, true);
                        this._reposHandler = null;
                    }
                    try {
                        localStorage.setItem('perfume_tour_seen', '1');
                    } catch (e) {
                        // abaikan jika localStorage tidak tersedia
                    }
                },
                nextStep() {
                    this.goToStep(this.tourStep + 1);
                },
                prevStep() {
                    this.goToStep(this.tourStep - 1);
                },
                goToStep(index) {
                    if (index < 0 || index >= this.tourSteps.length) {
                        this.closeTour();
                        return;
                    }
                    this.tourStep = index;
                    const step = this.tourSteps[index];
                    // Auto-open the cart drawer when the tour reaches the cart step
                    this.cartOpen = (step.id === 'floating-cart-btn');
                    this.$nextTick(() => {
                        if (!step.skipScroll) {
                            const scrollId = step.target || step.id;
                            const el = document.getElementById(scrollId);
                            if (el) {
                                el.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            }
                        }
                        // wait for smooth-scroll / drawer transition to (mostly) finish before measuring position
                        setTimeout(() => this.positionTour(), step.skipScroll ? 360 : 420);
                    });
                },
                positionTour() {
                    if (!this.tourOpen) return;
                    const step = this.tourSteps[this.tourStep];
                    if (!step) return;
                    const targetId = step.target || step.id;
                    const el = document.getElementById(targetId);
                    if (!el) { this.nextStep(); return; }

                    const raw = el.getBoundingClientRect();
                    const vw = window.innerWidth;
                    const vh = window.innerHeight;
                    const margin = 14;
                    const isMobile = vw < 768;
                    const popupW = isMobile ? Math.min(vw - 32, 320) : 300;
                    const popupHEstimate = 220;
                    const pad = 8;

                    // Clamp the target's rect to the visible viewport. This guarantees the
                    // spotlight and popup stay on-screen and sane even when the target
                    // element is taller/wider than the viewport (e.g. a long product list)
                    // or currently sits partly off-screen.
                    const rTop = Math.min(Math.max(raw.top, pad), vh - pad);
                    const rLeft = Math.min(Math.max(raw.left, pad), vw - pad);
                    const rBottom = Math.max(Math.min(raw.bottom, vh - pad), rTop + 24);
                    const rRight = Math.max(Math.min(raw.right, vw - pad), rLeft + 24);
                    const rWidth = rRight - rLeft;
                    const rHeight = rBottom - rTop;

                    this.tourHighlightStyle = {
                        top: (rTop - 6) + 'px',
                        left: (rLeft - 6) + 'px',
                        width: (rWidth + 12) + 'px',
                        height: (rHeight + 12) + 'px',
                    };

                    let top, left;
                    if (isMobile) {
                        const spaceBelow = vh - rBottom;
                        top = spaceBelow > popupHEstimate
                            ? rBottom + margin
                            : Math.max(margin, rTop - margin - popupHEstimate);
                        left = Math.max(16, Math.min(vw - popupW - 16, rLeft + rWidth / 2 - popupW / 2));
                    } else {
                        const spaceRight = vw - rRight;
                        const spaceLeft = rLeft;
                        if (spaceRight >= popupW + margin * 2) {
                            left = rRight + margin;
                            top = rTop;
                        } else if (spaceLeft >= popupW + margin * 2) {
                            left = rLeft - popupW - margin;
                            top = rTop;
                        } else {
                            left = Math.max(16, Math.min(vw - popupW - 16, rLeft));
                            top = rBottom + margin;
                        }
                        top = Math.max(16, Math.min(vh - popupHEstimate, top));
                    }

                    this.tourPopupStyle = {
                        top: top + 'px',
                        left: left + 'px',
                        width: popupW + 'px',
                    };
                },
                // ===================== END ONBOARDING TOUR =====================

                addToCart(product, event) {
                    this.playFlyingBallAnimation(event);

                    let existing = this.items.find(item => item.name === product.name);
                    if (existing) {
                        existing.qty++;
                    } else {
                        this.items.push({ ...product, qty: 1 });
                    }
                },
                playFlyingBallAnimation(event) {
                    const button = event.currentTarget || event.target;
                    const cartIcon = document.getElementById('floating-cart-btn');

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

                    setTimeout(() => {
                        ball.remove();
                    }, 550);
                },
                increaseQty(index) {
                    this.items[index].qty++;
                },
                decreaseQty(index) {
                    if (this.items[index].qty > 1) {
                        this.items[index].qty--;
                    } else {
                        this.removeItem(index);
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
                removeItem(index) {
                    this.items.splice(index, 1);
                },
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
                    const numericPrice = parseInt(price.replace(/[^0-9]/g, '')) || 0;
                    const orderId = await this.saveOrder([{ name, price: numericPrice, qty: 1 }]);
                    if (!orderId) return;
                    let phone = '6287774375755';
                    let message = `Halo Kak Admin Perfu.me, saya mau order 1 pcs *${name}* (${price}).\n*Nomor Pesanan:* #${orderId}\n\nMohon info ketersediaan stok dan ongkir ke alamat saya ya kak. Terima kasih!`;
                    let encodedMessage = encodeURIComponent(message);
                    window.location.href = `https://wa.me/${phone}?text=${encodedMessage}`;
                },
                async saveOrder(items) {
                    try {
                        const response = await fetch('{{ route('orders.checkout') }}', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
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