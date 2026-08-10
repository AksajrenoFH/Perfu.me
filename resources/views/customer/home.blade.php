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

        /* --- STYLES FOR SCROLL ANIMATIONS --- */
        .reveal-element {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        /* State saat scroll ke bawah: Muncul */
        .reveal-element.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* State saat scroll ke atas: Keluar */
        .reveal-element.is-exiting {
            opacity: 0;
            transform: translateY(40px);
        }
    </style>
</head>

<body class="text-[#14161a] antialiased bg-white">

    {{-- Scrolling Announcement Bar --}}
    @php
        // Data Dummy untuk Pengumuman
        $announcements = [
            'VS Scandalous',
            'VS Romantic Wish',
            'Dior Sauvage',
            'Aigner Blue Emotion',
            'Baccarrat Rouge 405',
            'CH Good Girl',
            'Channel Coco Mademoiselle',
            'David of Man Cool Water',
            'Dunhill Blue',
            'Escada Cherry',
            'Escada Sexy Grafity',
            'Aigner Black',
            'Aqua Kiss',
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
                <span class="text-xl font-extrabold tracking-tight">Parfume.me</span>
                <nav class="hidden md:flex items-center gap-8 text-sm text-black/60">
                    <a href="#" class="nav-underline text-black font-medium">Home</a>
                    <a href="#product" class="hover:text-black">Product</a>
                    <a href="#" class="hover:text-black">Resources</a>
                    <a href="#" class="hover:text-black">Pricing</a>
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
                <a href="#"
                    class="bg-black text-white text-sm font-semibold rounded-full px-5 py-2.5 hover:bg-gray-800 transition">Get
                    Started</a>
            </div>
        </div>
    </header>

    {{-- Hero Section --}}
    <section class="bg-gray-50 border-y border-gray-200/60 py-10 reveal-element">
        <div class="max-w-[1400px] mx-auto px-8 grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">
            <div
                class="relative rounded-2xl overflow-hidden bg-gray-100 border border-gray-200 aspect-[4/5] flex items-end p-6">
                <img src="{{ $product['image'] }}"
                    onerror="this.style.display='none'; this.parentElement.style.background='#f3f4f6'"
                    alt="Essence Noir bottle" class="absolute inset-0 w-full h-full object-cover">
                <span
                    class="relative bg-white/90 border border-gray-200 text-black text-xs font-semibold rounded-full px-4 py-2 shadow-sm">{{ $product['tag'] }}</span>
            </div>

            <div>
                <p class="text-xs tracking-[0.2em] text-gray-400 font-semibold mb-3">LIFESTYLE DIVISION</p>
                <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-5 text-gray-900">Apex Noir: The Scent of
                    Focus.</h2>
                <p class="text-gray-500 leading-relaxed max-w-md mb-8">Olfactory precision for deep work sessions. Our
                    exclusive fragrance collection is hand-crafted to reduce cognitive load and ground your focus.</p>

                <div class="grid grid-cols-3 gap-6 mb-10 max-w-md">
                    @foreach ($product['notes'] as $note)
                        <div>
                            <p class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">{{ $note['label'] }}</p>
                            <p class="font-semibold text-gray-900">{{ $note['title'] }}</p>
                            <p class="text-xs text-gray-400">{{ $note['desc'] }}</p>
                        </div>
                    @endforeach
                </div>

                <a href="#"
                    class="inline-block bg-black text-white text-sm font-semibold rounded-full px-6 py-3.5 hover:bg-gray-800 transition">Secure
                    the Collection</a>
            </div>
        </div>
    </section>

    {{-- Product Catalog Section (Mykonos Style) --}}
    <section id="product" class="max-w-[1400px] mx-auto px-8 py-16 bg-white reveal-element">
        {{-- Catalog Header --}}
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 border-b border-gray-100 pb-4 gap-4">
            <div class="flex items-center gap-8">
                <h2 href="#" class="text-3xl md:text-4xl font-extrabold text-black tracking-tight cursor-pointer">
                    Parfume
                </h2>
                <a href="{{ route('refill') }}">
                    <h2
                        class="text-3xl md:text-4xl font-extrabold text-gray-300 hover:text-gray-500 transition cursor-pointer">
                        Refill
                    </h2>
                </a>
            </div>

            <a href="#"
                class="text-sm font-semibold text-black underline underline-offset-8 hover:text-gray-600 transition tracking-wide">
                Shop All Products
            </a>
        </div>

        {{-- Catalog Grid --}}
        <div class="flex flex-wrap justify-center gap-6">
            @php
                $catalogProducts = [
                    [
                        'id' => 1,
                        'name' => 'Empire Extrait de Parfum 100ml',
                        'price' => 'Rp 499.000,00',
                        'image' => 'storage/image/DSC00068.JPG',
                        'image_hover' => 'storage/image/DSC00070 (1).JPG', // gambar kedua
                        'is_sold_out' => false,
                    ],
                    [
                        'id' => 2,
                        'name' => 'Conquer Extrait de Parfum 50ml',
                        'price' => 'Rp 449.000,00',
                        'image' => 'storage/image/DSC00047.JPG',
                        'image_hover' => 'storage/image/Dinamist-parfu.me.JPG', // gambar kedua
                        'is_sold_out' => true,
                    ],
                ];
            @endphp

            @foreach ($catalogProducts as $item)
                <a href="{{ route('product.show', $item['id']) }}"
                    class="w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-18px)] group cursor-pointer flex flex-col justify-between rounded-2xl overflow-hidden bg-[#f8f8f8] border border-gray-100 card-hover reveal-element">

                    {{-- Container Foto Produk --}}
                    <div class="relative aspect-[3/4] w-full overflow-hidden bg-[#f8f8f8]">
                        @if ($item['is_sold_out'])
                            <span
                                class="absolute top-4 left-4 bg-[#8a8a8a] text-white text-[11px] font-semibold px-3 py-1 rounded-md shadow-sm z-10 tracking-wide">
                                Sold out
                            </span>
                        @endif

                        {{-- Gambar utama --}}
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-300 ease-in-out opacity-100 group-hover:opacity-0">

                        {{-- Gambar hover --}}
                        @if (!empty($item['image_hover']))
                            <img src="{{ $item['image_hover'] }}" alt="{{ $item['name'] }}"
                                class="absolute inset-0 w-full h-full object-cover transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100">
                        @endif
                    </div>

                    {{-- Detail Produk --}}
                    <div class="p-6 bg-white flex-1 flex flex-col justify-between">
                        <h3 class="text-sm font-semibold text-gray-900 leading-snug line-clamp-2 mb-3">
                            {{ $item['name'] }}
                        </h3>
                        <p class="text-sm font-bold text-gray-900">
                            From {{ $item['price'] }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- CTA --}}
    <section class="max-w-[1400px] mx-auto px-8 py-20 bg-white reveal-element">
        <div class="border border-gray-200 rounded-3xl text-center py-20 px-6 shadow-sm bg-white">
            <h2 class="text-4xl md:text-5xl font-extrabold mb-5 text-gray-900">Ascend to the Apex.</h2>
            <p class="text-gray-500 max-w-xl mx-auto mb-8">Limited intake for Q3 is now open. Join the elite network of
                performers redefining the boundaries of digital efficiency.</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="#"
                    class="bg-black text-white text-sm font-semibold rounded-full px-6 py-3.5 hover:bg-gray-800 transition">Get
                    Started for Free</a>
                <a href="#"
                    class="border border-gray-300 text-gray-800 text-sm font-semibold rounded-full px-6 py-3.5 hover:bg-gray-50 transition">Request
                    a Demo</a>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-white border-t border-gray-200 pt-16 pb-8 reveal-element">
        <div class="max-w-[1400px] mx-auto px-8 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div>
                <h3 class="text-xl font-extrabold mb-3 text-gray-900">Apex</h3>
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
                    <li><a href="#" class="hover:text-black">Features</a></li>
                    <li><a href="#" class="hover:text-black">Security</a></li>
                    <li><a href="#" class="hover:text-black">Integrations</a></li>
                    <li><a href="#" class="hover:text-black">Enterprise</a></li>
                </ul>
            </div>
            <div>
                <p class="text-[11px] tracking-widest text-gray-400 font-semibold mb-4">COMPANY</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li><a href="#" class="hover:text-black">About Us</a></li>
                    <li><a href="#" class="hover:text-black">Careers</a></li>
                    <li><a href="#" class="hover:text-black">Press Kit</a></li>
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
            <span>&copy; {{ date('Y') }} APEX DIGITAL GROUP. ESTABLISHED IN SWITZERLAND.</span>
        </div>
    </footer>

    {{-- Alpine.js untuk carousel --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        function heroCarousel(total) {
            return {
                active: 1,
                total: total,
                autoplayMs: 4000,
                timer: null,
                dragging: false,
                startX: 0,
                deltaX: 0,

                init() {
                    this.startAutoplay();
                },
                startAutoplay() {
                    clearInterval(this.timer);
                    this.timer = setInterval(() => this.next(), this.autoplayMs);
                },
                resetAutoplay() {
                    this.startAutoplay();
                },
                next() {
                    this.active = (this.active + 1) % this.total;
                    this.resetAutoplay();
                },
                prev() {
                    this.active = (this.active - 1 + this.total) % this.total;
                    this.resetAutoplay();
                },
                goTo(i) {
                    this.active = i;
                    this.resetAutoplay();
                },

                dragStart(e) {
                    this.dragging = true;
                    this.startX = e.touches ? e.touches[0].clientX : e.clientX;
                    clearInterval(this.timer);
                },
                dragMove(e) {
                    if (!this.dragging) return;
                    const x = e.touches ? e.touches[0].clientX : e.clientX;
                    this.deltaX = x - this.startX;
                },
                dragEnd() {
                    if (!this.dragging) return;
                    this.dragging = false;
                    if (this.deltaX > 50) {
                        this.prev();
                    } else if (this.deltaX < -50) {
                        this.next();
                    } else {
                        this.resetAutoplay();
                    }
                    this.deltaX = 0;
                },
            };
        }

        // --- SCRIPT INTERSECTION OBSERVER UNTUK ANIMASI MASUK & KELUAR ---
        document.addEventListener('DOMContentLoaded', () => {
            const revealElements = document.querySelectorAll('.reveal-element');

            let lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;
            let isScrollingDown = true;   // anggap "turun" di awal, biar elemen yg sudah kelihatan langsung tampil
            let hasScrolled = false;      // arah baru dipercaya setelah user benar-benar scroll

            // Satu-satunya tempat yang mengubah lastScrollTop/isScrollingDown,
            // supaya tidak balapan dengan pembacaan di dalam observer callback.
            window.addEventListener('scroll', () => {
                const st = window.pageYOffset || document.documentElement.scrollTop;
                isScrollingDown = st > lastScrollTop;
                lastScrollTop = st <= 0 ? 0 : st;
                hasScrolled = true;
            }, { passive: true });

            const observerOptions = {
                root: null,
                threshold: 0.15 // Animasi terdeteksi jika minimal 15% elemen terlihat
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Tampilkan kalau sedang scroll turun, ATAU ini kemunculan pertama
                        // (elemen sudah kelihatan sejak load, sebelum user sempat scroll sama sekali)
                        if (!hasScrolled || isScrollingDown) {
                            // Scroll ke bawah -> Animasi Masuk
                            entry.target.classList.add('is-visible');
                            entry.target.classList.remove('is-exiting');
                        }
                    } else {
                        if (hasScrolled && !isScrollingDown) {
                            // Scroll ke atas -> Animasi Keluar
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