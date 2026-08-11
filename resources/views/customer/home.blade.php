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

        @keyframes cartPulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.25);
                background-color: #333;
            }

            100% {
                transform: scale(1);
            }
        }

        .animate-cart-pulse {
            animation: cartPulse 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes badgePop {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }

            70% {
                transform: scale(1.3);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .animate-badge-pop {
            animation: badgePop 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
    </style>
</head>

<body class="text-[#14161a] antialiased bg-white" x-data="cartSystem()">

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
                    class="bg-black text-white text-sm font-semibold rounded-full px-5 py-2.5 hover:bg-gray-800 transition">Shop
                    Now</a>
            </div>
        </div>
    </header>

    {{-- Hero Section --}}
    <section class="bg-gray-50 border-y border-gray-200/60 py-16 reveal-element">
        <div class="max-w-[1400px] mx-auto px-8 grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">
            <div
                class="relative rounded-2xl overflow-hidden bg-gray-100 border border-gray-200 aspect-[4/5] flex items-end p-6">
                <img src="{{ asset('images/essence-noir.jpg') }}"
                    onerror="this.style.display='none'; this.parentElement.style.background='#f3f4f6'"
                    alt="Essence Noir bottle" class="absolute inset-0 w-full h-full object-cover">
                <span
                    class="relative bg-white/90 border border-gray-200 text-black text-xs font-semibold rounded-full px-4 py-2 shadow-sm">apa
                    weh</span>
            </div>

            <div>
                <p class="text-xs tracking-[0.2em] text-gray-400 font-semibold mb-3">LIFESTYLE DIVISION</p>
                <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-5 text-gray-900">Apex Noir: The Scent of
                    Focus.</h2>
                <p class="text-gray-500 leading-relaxed max-w-md mb-8">Olfactory precision for deep work sessions. Our
                    exclusive fragrance collection is hand-crafted to reduce cognitive load and ground your focus
                    throughout the day.</p>

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
                        <p class="font-bold text-gray-900 text-lg">Bold Woody</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-6 mb-10 max-w-md">
                    <div>
                        <p class="text-[10px] tracking-widest text-gray-400 font-semibold mb-1">apa weh</p>
                        <p class="font-semibold text-gray-900">apa wehp>
                        <p class="text-xs text-gray-400">apaweh</p>
                    </div>
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
                    <h4 class="text-sm font-bold text-gray-900">Long-Lasting Formula</h4>
                    <p class="text-xs text-gray-500 mt-0.5">Tahan seharian menemani aktivitas produktifmu.</p>
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
                    <h4 class="text-sm font-bold text-gray-900">Garansi Aman Pengiriman</h4>
                    <p class="text-xs text-gray-500 mt-0.5">Ganti baru jika botol pecah di perjalanan.</p>
                </div>
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
    </section>

        {{-- Catalog Grid --}}
        <div class="flex flex-wrap justify-center gap-6">
            @foreach ($productOri as $itemOri)
                <div
                    class="w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-18px)] group cursor-pointer flex flex-col justify-between rounded-2xl overflow-hidden bg-[#f8f8f8] border border-gray-100 card-hover reveal-element">

                    {{-- Container Foto Produk --}}
                    <div class="relative aspect-[3/4] w-full overflow-hidden bg-[#f8f8f8]">
                        @if ($itemOri['stock'] === 0)
                            <span
                                class="absolute top-4 left-4 bg-[#8a8a8a] text-white text-[11px] font-semibold px-3 py-1 rounded-md shadow-sm z-10 tracking-wide">
                                Sold out
                            </span>
                        @endif

                        {{-- Gambar utama --}}
                        <img src="{{ 'storage/' . $itemOri['image'] }}" alt="{{ $itemOri['name'] }}"
                            class="absolute inset-0 w-full h-full object-cover duration-300 ease-in-out opacity-100 group-hover:scale-105 transition-all">
                    </div>

                    {{-- Detail Produk --}}
                    <div class="p-6 bg-white flex-1 flex flex-col justify-between">
                        <h3 class="text-sm font-semibold text-gray-900 leading-snug line-clamp-2 mb-3">
                            {{ $itemOri['name'] }}
                        </h3>
                        <p class="text-sm font-bold text-gray-900">
                            From {{ $itemOri['price'] }}
                        </p>
                    </div>
                </div>
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
    </div>

    {{-- Footer --}}
    <footer class="bg-white border-t border-gray-200 pt-16 pb-8 reveal-element">
        <div class="max-w-[1400px] mx-auto px-8 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div>
                <h3 class="text-xl font-extrabold mb-3 text-gray-900">Parfume.me</h3>
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
                    <li><a href="#story" class="hover:text-black">About Us</a></li>
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
            <span>&copy; {{ date('Y') }} PARFUME.ME DIGITAL GROUP. ESTABLISHED IN INDONESIA.</span>
        </div>
    </footer>

    {{-- Alpine.js & Flying Ball Animation Logic Script --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        function cartSystem() {
            return {
                cartOpen: false,
                isAnimating: false,
                items: [],
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
                    const button = event.target;
                    const cartIcon = document.getElementById('floating-cart-btn');

                    if (!button || !cartIcon) return;

                    const btnRect = button.getBoundingClientRect();
                    const cartRect = cartIcon.getBoundingClientRect();

                    const ball = document.createElement('div');
                    ball.style.position = 'fixed';
                    ball.style.left = `${btnRect.left + btnRect.width / 2 - 10}px`;
                    ball.style.top = `${btnRect.top + btnRect.height / 2 - 10}px`;
                    ball.style.width = '18px';
                    ball.style.height = '18px';
                    ball.style.backgroundColor = '#000000';
                    ball.style.borderRadius = '50%';
                    ball.style.zIndex = '9999';
                    ball.style.pointerEvents = 'none';
                    ball.style.boxShadow = '0 4px 10px rgba(0,0,0,0.3)';
                    ball.style.transition = 'all 0.6s cubic-bezier(0.2, 0.8, 0.2, 1)';
                    document.body.appendChild(ball);

                    setTimeout(() => {
                        ball.style.left = `${cartRect.left + cartRect.width / 2 - 9}px`;
                        ball.style.top = `${cartRect.top + cartRect.height / 2 - 9}px`;
                        ball.style.transform = 'scale(0.3)';
                        ball.style.opacity = '0.7';
                    }, 20);
                    setTimeout(() => {
                        ball.remove();
                        this.isAnimating = true;
                        setTimeout(() => {
                            this.isAnimating = false;
                        }, 400); // Durasi pulse
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
                checkoutWhatsApp() {
                    if (this.items.length === 0) {
                        alert('Keranjang belanjaan lu masih kosong!');
                        return;
                    }

                    let phone = '6287774375755';
                    let message = "Halo Kak, saya mau order parfum ini ya:\n\n";

                    this.items.forEach((item, index) => {
                        message += `${index + 1}. *${item.name}* - ${item.qty} pcs (${item.price})\n`;
                    });

                    message += `\n*Total Keseluruhan:* ${this.formatRupiah(this.totalPrice)}`;
                    message += `\n\nBoleh tolong dicekkan stoknya dan total sama ongkir ke alamat saya ya kak? Terima kasih!`;

                    let encodedMessage = encodeURIComponent(message);
                    window.location.href = `https://wa.me/${phone}?text=${encodedMessage}`;
                },
                directCheckoutWhatsApp(name, price) {
                    let phone = '6287774375755';
                    let message = `Halo Kak, saya mau order 1 pcs *${name}* (${price}).\n\nBoleh tolong dicekkan ketersediaan stok dan total beserta ongkir ke alamat saya ya kak? Terima kasih!`;
                    let encodedMessage = encodeURIComponent(message);
                    window.location.href = `https://wa.me/${phone}?text=${encodedMessage}`;
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
