<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parfume.me · Sophisticated Productivity</title>
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
            transform: translateY(40px);
            transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .reveal-element.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-element.is-exiting {
            opacity: 0;
            transform: translateY(40px);
        }

        @keyframes badgePop {
            0% { transform: scale(0.8); }
            50% { transform: scale(1.3); }
            100% { transform: scale(1); }
        }

        .animate-pop {
            animation: badgePop 0.3s ease-in-out;
        }
    </style>
</head>

<body class="text-[#14161a] antialiased bg-white" x-data="cartSystem()">

    {{-- Scrolling Announcement Bar --}}
    @php
        $announcements = [
            'VS Scandalous', 'VS Romantic Wish', 'Dior Sauvage', 'Aigner Blue Emotion',
            'Baccarrat Rouge 405', 'CH Good Girl', 'Channel Coco Mademoiselle',
            'David of Man Cool Water', 'Dunhill Blue', 'Escada Cherry', 'Escada Sexy Grafity', 'Aigner Black', 'Aqua Kiss',
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
                <span class="text-xl font-extrabold tracking-tight">Perfu.me</span>
                <nav class="hidden md:flex items-center gap-8 text-sm text-black/60">
                    <a href="#" class="nav-underline text-black font-medium">Home</a>
                    <a href="#product" class="hover:text-black">Product</a>
                </nav>
            </div>
            <div class="flex items-center gap-4">
                <form action="#" method="GET"
                    class="hidden sm:flex items-center gap-2 bg-gray-100 rounded-full px-4 py-2 w-52 text-black/40 border border-gray-200/50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="7" />
                        <path stroke-linecap="round" d="m21 21-4.3-4.3" />
                    </svg>
                    <input type="text" name="q" placeholder="Search ..."
                        class="bg-transparent outline-none text-sm w-full placeholder:text-black/40">
                </form>

                <a href="#product"
                    class="bg-black text-white text-sm font-semibold rounded-full px-5 py-2.5 hover:bg-gray-800 transition">Shop Now</a>
            </div>
        </div>
    </header>

    {{-- Hero Section --}}
    <section class="bg-gray-50 border-y border-gray-200/60 py-16 reveal-element">
        <div class="max-w-[1400px] mx-auto px-8 grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">
            <div class="relative rounded-3xl overflow-hidden bg-gray-100 border border-gray-200 aspect-[4/5] flex items-end p-8 shadow-sm">
                <img src="storage/image/DSC00057.JPG"
                    onerror="this.src='storage/image/DSC00029.JPG'"
                    alt="Essence Noir bottle" class="absolute inset-0 w-full h-full object-cover">
                <span class="relative bg-white/90 backdrop-blur border border-gray-200 text-black text-xs font-semibold rounded-full px-4 py-2 shadow-sm">
                    Signature Extrait
                </span>
            </div>

            <div>
                <p class="text-xs tracking-[0.2em] text-gray-400 font-semibold mb-3">DIVISI GAYA HIDUP</p>
                <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-5 text-gray-900">Perfu.me</h2>
                <p class="text-gray-500 leading-relaxed max-w-md mb-8">Temukan koleksi parfum pilihan yang dirancang untuk melengkapi suasana hati, meningkatkan kepercayaan diri, dan meninggalkan kesan yang tak terlupakan di setiap momen.</p>

                <div class="grid grid-cols-3 gap-6 mb-10 max-w-md border-t border-b border-gray-200/60 py-5">
                    <div>
                        <p class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">LONGEVITY</p>
                        <p class="font-bold text-gray-900 text-lg">12 Hours</p>
                    </div>
                    <div>
                        <p class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">CONCENTRATION</p>
                        <p class="font-bold text-gray-900 text-lg">Extrait</p>
                    </div>
                    <div>
                        <p class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">CHARACTER</p>
                        <p class="font-bold text-gray-900 text-lg">Sweet</p>
                    </div>
                </div>

                <a href="#product" class="inline-block bg-black text-white text-sm font-semibold rounded-full px-8 py-4 hover:bg-gray-800 transition">
                    Explore Collections
                </a>
            </div>
        </div>
    </section>

    {{-- USP Badges --}}
    <section class="max-w-[1400px] mx-auto px-8 py-12 border-b border-gray-100 reveal-element">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            <div class="flex items-center gap-4 p-6 rounded-2xl bg-gray-50 border border-gray-100">
                <div class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center shrink-0 text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-gray-900">100% Premium Ingredients</h4>
                    <p class="text-xs text-gray-500 mt-0.5">Diracik dari ekstrak pilihan berkualitas tinggi.</p>
                </div>
            </div>

            <div class="flex items-center gap-4 p-6 rounded-2xl bg-gray-50 border border-gray-100">
                <div class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center shrink-0 text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-gray-900">Long-Lasting Formula</h4>
                    <p class="text-xs text-gray-500 mt-0.5">Tahan seharian menemani aktivitas produktifmu.</p>
                </div>
            </div>

            <div class="flex items-center gap-4 p-6 rounded-2xl bg-gray-50 border border-gray-100">
                <div class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center shrink-0 text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-gray-900">Garansi Aman Pengiriman</h4>
                    <p class="text-xs text-gray-500 mt-0.5">Ganti baru jika botol pecah di perjalanan.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- About Us / Story Section --}}
    <section id="story" class="max-w-[1400px] mx-auto px-8 py-20 reveal-element">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <p class="text-xs tracking-[0.2em] text-gray-400 font-semibold mb-3">OUR PHILOSOPHY</p>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">Crafted for Achievers, Designed for Presence.</h2>
                <p class="text-gray-500 leading-relaxed mb-6">
                    Kami percaya bahwa wangi bukan sekadar aroma pendukung penampilan, melainkan alat psikologis untuk membangun suasana hati dan tingkat fokus yang tinggi. Setiap botol di Parfume.me melalui proses kurasi ketat untuk memastikan harmoni antara kemewahan dan fungsionalitas harian.
                </p>
                <div class="space-y-3 mb-8">
                    <div class="flex items-center gap-3 text-sm font-semibold text-gray-800">
                        <span class="w-5 h-5 bg-black text-white rounded-full flex items-center justify-center text-xs">✓</span>
                        <span>Diproduksi dengan standar Extrait de Parfum murni</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm font-semibold text-gray-800">
                        <span class="w-5 h-5 bg-black text-white rounded-full flex items-center justify-center text-xs">✓</span>
                        <span>Aroma eksklusif yang tidak pasaran</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm font-semibold text-gray-800">
                        <span class="w-5 h-5 bg-black text-white rounded-full flex items-center justify-center text-xs">✓</span>
                        <span>Aman di kulit dan tidak meninggalkan noda di baju</span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-100 rounded-3xl aspect-[3/4] overflow-hidden">
                    <img src="storage/image/DSC00047.JPG" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/400x500?text=Brand+1'">
                </div>
                <div class="bg-gray-100 rounded-3xl aspect-[3/4] overflow-hidden mt-8">
                    <img src="storage/image/DSC00068.JPG" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/400x500?text=Brand+2'">
                </div>
            </div>
        </div>
    </section>

    {{-- DETAILED PRODUCT SHOWCASE SECTION (ZIG-ZAG) --}}
    {{-- FIX: header judul & daftar produk (space-y-24) sekarang berada dalam SATU <section>
         yang sama, supaya sama-sama kena wrapper max-w-[1400px] mx-auto px-8.
         Sebelumnya section ditutup terlalu awal sehingga produk kehilangan margin. --}}
    <section id="product" class="max-w-[1400px] mx-auto px-8 py-20 bg-white reveal-element">
        <div class="border-b border-gray-100 pb-6 mb-16 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <p class="text-xs tracking-[0.2em] text-gray-400 font-semibold mb-2">CURATED COLLECTIONS</p>
                <h2 class="text-3xl md:text-4xl font-extrabold text-black tracking-tight">
                    Explore Our Signature Series
                </h2>
                <a href="{{ route('refill') }}">
                    <h2
                        class="text-3xl md:text-4xl font-extrabold text-gray-300 hover:text-gray-500 transition cursor-pointer">
                        Refill
                    </h2>
                </a>
            </div>
            <a href="#" class="text-sm font-semibold text-black underline underline-offset-8 hover:text-gray-600 transition tracking-wide">
                View All Refills & Variants
            </a>
        </div>

        <div class="space-y-24">

            {{-- PRODUK 1: FOTO KIRI, TEKS KANAN --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="relative group aspect-[4/5] rounded-3xl overflow-hidden bg-[#f8f8f8] border border-gray-100 shadow-sm">
                    <img src="storage/image/DSC00029.JPG" alt="Empire Extrait de Parfum"
                        class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 ease-in-out opacity-100 group-hover:opacity-0"
                        onerror="this.src=''">
                    <img src="storage/image/DSC00093.JPG" alt="Empire Extrait de Parfum Hover"
                        class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 ease-in-out opacity-0 group-hover:opacity-100"
                        onerror="this.src='storage/image/DSC00047.JPG'">
                </div>

                <div class="lg:py-6">
                    <span class="inline-block bg-gray-100 text-gray-800 text-[11px] font-semibold px-3 py-1 rounded-md mb-4 tracking-wide">Best Seller</span>
                    <h3 class="text-3xl font-extrabold text-gray-900 mb-3">DYNAMYST</h3>
                    <p class="text-xl font-bold text-gray-900 mb-6">Rp 45.000</p>
                    <p class="text-gray-500 leading-relaxed mb-8">
                        Aroma megah yang memadukan kesegaran buah dan kehangatan woody. Dirancang khusus untuk memberikan kesan wibawa dan karisma tinggi sepanjang hari.
                    </p>

                    <div class="grid grid-cols-3 gap-4 mb-8 bg-gray-50 p-5 rounded-2xl border border-gray-100">
                        <div>
                            <p class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">TOP NOTES</p>
                            <p class="text-xs font-bold text-gray-900">Bergamot, Mandarin, Pink Pepper</p>
                        </div>
                        <div>
                            <p class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">MIDDLE NOTES</p>
                            <p class="text-xs font-bold text-gray-900">Lavender, Cedarwood</p>
                        </div>
                        <div>
                            <p class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">BASE NOTES</p>
                            <p class="text-xs font-bold text-gray-900">Amber, White Musk, Vanilla</p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <button @click="addToCart({ name: 'Empire Extrait de Parfum 100ml', price: 'Rp 499.000', image: 'storage/image/DSC00068.JPG' }, $event)"
                            class="flex-1 bg-black text-white text-sm font-semibold py-3.5 px-6 rounded-full hover:bg-gray-800 transition text-center cursor-pointer">
                            + Add to Cart
                        </button>
                        <button @click="directCheckoutWhatsApp('Empire Extrait de Parfum 100ml', 'Rp 499.000')"
                            class="flex-1 border border-gray-300 text-gray-900 text-sm font-semibold py-3.5 px-6 rounded-full hover:bg-gray-50 transition text-center cursor-pointer">
                            Checkout via WhatsApp
                        </button>
                    </div>
                </div>
            </div>

            {{-- PRODUK 2: TEKS KIRI, FOTO KANAN --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="lg:py-6 order-2 lg:order-1">
                    <span class="inline-block bg-gray-100 text-gray-800 text-[11px] font-semibold px-3 py-1 rounded-md mb-4 tracking-wide">Exclusive Edition</span>
                    <h3 class="text-3xl font-extrabold text-gray-900 mb-3">Vanessence</h3>
                    <p class="text-xl font-bold text-gray-900 mb-6">Rp 45.000</p>
                    <p class="text-gray-500 leading-relaxed mb-8">
                        Karakter wangi yang maskulin dan berani. Menghadirkan kombinasi aroma citrus segar yang disusul dengan kesan earthy yang elegan untuk malam hari.
                    </p>

                    <div class="grid grid-cols-3 gap-4 mb-8 bg-gray-50 p-5 rounded-2xl border border-gray-100">
                        <div>
                            <p class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">TOP NOTES</p>
                            <p class="text-xs font-bold text-gray-900">Lemon, Apple, Mint</p>
                        </div>
                        <div>
                            <p class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">MIDDLE NOTES</p>
                            <p class="text-xs font-bold text-gray-900">Geranium, Ambroxan</p>
                        </div>
                        <div>
                            <p class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">BASE NOTES</p>
                            <p class="text-xs font-bold text-gray-900">Oakmoss, Vetiver, Cedar</p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <button @click="addToCart({ name: 'Conquer Extrait de Parfum 50ml', price: 'Rp 449.000', image: 'storage/image/DSC00047.JPG' }, $event)"
                            class="flex-1 bg-black text-white text-sm font-semibold py-3.5 px-6 rounded-full hover:bg-gray-800 transition text-center cursor-pointer">
                            + Add to Cart
                        </button>
                        <button @click="directCheckoutWhatsApp('Conquer Extrait de Parfum 50ml', 'Rp 449.000')"
                            class="flex-1 border border-gray-300 text-gray-900 text-sm font-semibold py-3.5 px-6 rounded-full hover:bg-gray-50 transition text-center cursor-pointer">
                            Checkout via WhatsApp
                        </button>
                    </div>
                </div>

                <div class="relative group aspect-[4/5] rounded-3xl overflow-hidden bg-[#f8f8f8] border border-gray-100 shadow-sm order-1 lg:order-2">
                    <img src="storage/image/DSC00122.JPG" alt="Conquer Extrait de Parfum"
                        class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 ease-in-out opacity-100 group-hover:opacity-0"
                        onerror="this.src='storage/image/DSC00068.JPG'">
                    <img src="storage/image/DSC00164.JPG" alt="Conquer Extrait de Parfum Hover"
                        class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 ease-in-out opacity-0 group-hover:opacity-100"
                        onerror="this.src='storage/image/DSC00070 (1).JPG'">
                </div>
            </div>

        </div>
    </section>

    {{-- Testimonials / Reviews Section --}}
    <section id="reviews" class="bg-gray-50 py-20 border-t border-b border-gray-200/60 reveal-element">
        <div class="max-w-[1400px] mx-auto px-8">
            <div class="text-center max-w-xl mx-auto mb-16">
                <p class="text-xs tracking-[0.2em] text-gray-400 font-semibold mb-3">SOCIAL PROOF</p>
                <h2 class="text-3xl font-extrabold text-gray-900">Trusted by Professionals</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-3xl border border-gray-200/80 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="text-yellow-400 mb-4 text-sm">★★★★★</div>
                        <p class="text-sm text-gray-600 leading-relaxed mb-6">"Wanginya tahan seharian di kantor, tipe wangi yang nggak bikin pusing tapi ninggalin kesan mewah pas salaman."</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-xs text-gray-700">RD</div>
                        <div>
                            <h4 class="text-xs font-bold text-gray-900">Reza Darmawan</h4>
                            <p class="text-[10px] text-gray-400">Software Engineer</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-3xl border border-gray-200/80 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="text-yellow-400 mb-4 text-sm">★★★★★</div>
                        <p class="text-sm text-gray-600 leading-relaxed mb-6">"Order via WhatsApp gampang banget, tinggal klik langsung otomatis ke format pesanan. Pengirimannya juga cepat dan aman."</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-xs text-gray-700">AN</div>
                        <div>
                            <h4 class="text-xs font-bold text-gray-900">Amanda Nadia</h4>
                            <p class="text-[10px] text-gray-400">Creative Director</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-3xl border border-gray-200/80 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="text-yellow-400 mb-4 text-sm">★★★★★</div>
                        <p class="text-sm text-gray-600 leading-relaxed mb-6">"Kualitas Extrait de Parfum-nya beneran kerasa. Dipakai pagi sampe malam pas pulang kerja masih nempel aromanya."</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-xs text-gray-700">KP</div>
                        <div>
                            <h4 class="text-xs font-bold text-gray-900">Kevin Pratama</h4>
                            <p class="text-[10px] text-gray-400">Entrepreneur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FLOATING CART BUTTON (Kanan Bawah dengan ID untuk target animasi bola) --}}
    <div class="fixed bottom-6 right-6 z-40">
        <button id="floating-cart-btn" @click="cartOpen = true"
            class="relative bg-black text-white p-4 rounded-full shadow-2xl hover:bg-gray-800 transition-all duration-300 transform hover:scale-105 flex items-center justify-center cursor-pointer group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            {{-- Badge Counter --}}
            <span x-show="totalItems > 0"
                  :key="totalItems"
                  x-text="totalItems"
                  class="absolute -top-1 -right-1 bg-white text-black border border-black text-[11px] font-extrabold w-6 h-6 rounded-full flex items-center justify-center shadow-md animate-pop"></span>
        </button>
    </div>

    {{-- Slide-over Cart Drawer Sidebar --}}
    <div x-cloak x-show="cartOpen" class="relative z-50">
        <div x-show="cartOpen"
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             @click="cartOpen = false" class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity"></div>

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
                                    <img :src="item.image"
                                        class="w-16 h-16 object-cover rounded-xl bg-white border border-gray-200">
                                    <div class="flex-1">
                                        <h4 class="text-xs font-semibold text-gray-900 line-clamp-1" x-text="item.name"></h4>
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
                <h3 class="text-xl font-extrabold mb-3 text-gray-900">Parfume.me</h3>
                <p class="text-sm text-gray-500 leading-relaxed max-w-xs">Redefining the relationship between professional performance and aesthetic clarity.</p>
                <div class="flex gap-3 mt-5 text-gray-500">
                    <span class="w-8 h-8 rounded-full border border-gray-200 bg-gray-50 flex items-center justify-center">🌐</span>
                    <span class="w-8 h-8 rounded-full border border-gray-200 bg-gray-50 flex items-center justify-center">@</span>
                    <span class="w-8 h-8 rounded-full border border-gray-200 bg-gray-50 flex items-center justify-center">≡</span>
                </div>
            </div>
            <div>
                <p class="text-[11px] tracking-widest text-gray-400 font-semibold mb-4">PLATFORM</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><a href="#" class="hover:text-black">Features</a></li>
                    <li><a href="#" class="hover:text-black">Security</a></li>
                    <li><a href="#" class="hover:text-black">Integrations</a></li>
                    <li><a href="#" class="hover:text-black">Enterprise</a></li>
                </ul>
            </div>
            <div>
                <p class="text-[11px] tracking-widest text-gray-400 font-semibold mb-4">COMPANY</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><a href="#story" class="hover:text-black">About Us</a></li>
                    <li><a href="#" class="hover:text-black">Careers</a></li>
                    <li><a href="#" class="hover:text-black">Press Kit</a></li>
                    <li><a href="#" class="hover:text-black">Contact</a></li>
                </ul>
            </div>
            <div>
                <p class="text-[11px] tracking-widest text-gray-400 font-semibold mb-4">STAY AHEAD</p>
                <p class="text-sm text-gray-600 mb-4">Receive weekly insights on high-performance workflows and luxury lifestyle curation.</p>
                <form action="#" method="POST" class="flex gap-2">
                    <input type="email" name="email" placeholder="Your work email" required
                        class="bg-gray-50 border border-gray-200 rounded-full px-4 py-2.5 text-sm flex-1 outline-none focus:border-gray-400">
                    <button type="submit"
                        class="bg-black text-white text-sm font-semibold rounded-full px-5 py-2.5 hover:bg-gray-800 transition">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="max-w-[1400px] mx-auto px-8 flex flex-col sm:flex-row justify-between items-center gap-3 border-t border-gray-100 mt-10 pt-6 text-xs text-gray-400">
            <span>
                <a href="#" class="hover:text-gray-600">PRIVACY POLICY</a> &nbsp;
                <a href="#" class="hover:text-gray-600">TERMS OF SERVICE</a> &nbsp;
                <a href="#" class="hover:text-gray-600">COOKIE POLICY</a>
            </span>
            <span>&copy; {{ date('Y') }} PARFUME.ME DIGITAL GROUP. ESTABLISHED IN INDONESIA.</span>
        </div>
    </footer>

    {{-- Alpine.js & Flying Ball Animation Logic Script --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        function cartSystem() {
            return {
                cartOpen: false,
                items: [],
                addToCart(product, event) {
                    // Jalankan Animasi Bola Melayang (Flying Ball)
                    this.playFlyingBallAnimation(event);

                    let existing = this.items.find(item => item.name === product.name);
                    if (existing) {
                        existing.qty++;
                    } else {
                        this.items.push({ ...product, qty: 1 });
                    }
                },
                playFlyingBallAnimation(event) {
                    const button = event.target;
                    const cartIcon = document.getElementById('floating-cart-btn');

                    if (!button || !cartIcon) return;

                    const btnRect = button.getBoundingClientRect();
                    const cartRect = cartIcon.getBoundingClientRect();

                    // Buat elemen bola hitam kecil secara dinamis
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

                    // Paksa browser membaca posisi awal sebelum ditransisikan ke posisi tujuan
                    setTimeout(() => {
                        ball.style.left = `${cartRect.left + cartRect.width / 2 - 10}px`;
                        ball.style.top = `${cartRect.top + cartRect.height / 2 - 10}px`;
                        ball.style.transform = 'scale(0.2)';
                        ball.style.opacity = '0.5';
                    }, 20);

                    // Hapus elemen bola setelah animasi selesai (600ms)
                    setTimeout(() => {
                        ball.remove();
                    }, 600);
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

        document.addEventListener('DOMContentLoaded', () => {
            const revealElements = document.querySelectorAll('.reveal-element');
            let lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;
            let isScrollingDown = true; // anggap "turun" di awal, biar elemen yg sudah kelihatan langsung tampil
            let hasScrolled = false; // arah baru dipercaya setelah user benar-benar scroll

            window.addEventListener('scroll', () => {
                const st = window.pageYOffset || document.documentElement.scrollTop;
                isScrollingDown = st > lastScrollTop;
                lastScrollTop = st <= 0 ? 0 : st;
                hasScrolled = true;
            }, {
                passive: true
            });

            const observerOptions = {
                root: null,
                threshold: 0.15
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        if (!hasScrolled || isScrollingDown) {
                            entry.target.classList.add('is-visible');
                            entry.target.classList.remove('is-exiting');
                        }
                    } else {
                        if (hasScrolled && !isScrollingDown) {
                            entry.target.classList.remove('is-visible');
                            entry.target.classList.add('is-exiting');
                        }
                    }
                });
            }, observerOptions);

            revealElements.forEach(el => observer.observe(el));
        });
    </script>

</body>

</html>