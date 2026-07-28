<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Essence Noir · Apex Noir</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background:#0a0a0a; }
        .icon-btn { transition: all .2s ease; }
        .icon-btn:hover { background: rgba(255,255,255,.06); }
        .nav-active::before {
            content:'';
            position:absolute; left:-16px; top:50%; transform:translateY(-50%);
            width:3px; height:20px; background:#fff; border-radius:2px;
        }
        .card-hover { transition: transform .3s ease, border-color .3s ease; }
        .card-hover:hover { transform: translateY(-4px); border-color: rgba(255,255,255,.15); }
    </style>
</head>
<body class="bg-[#0a0a0a] text-white antialiased">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-[100px] shrink-0 bg-[#0d0d0d] border-r border-white/5 flex flex-col items-center py-6 relative">
            <div class="w-10 h-10 rounded-xl bg-white text-black flex items-center justify-center font-bold mb-10">
                A
            </div>

            <nav class="flex flex-col gap-2 flex-1">
                <a href="#" class="icon-btn relative w-11 h-11 rounded-xl flex items-center justify-center text-white/50 hover:text-white">
                    {{-- Home --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9.5 12 3l9 6.5V20a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1V9.5Z"/>
                    </svg>
                </a>
                <a href="#" class="icon-btn relative w-11 h-11 rounded-xl bg-white/10 flex items-center justify-center text-white nav-active">
                    {{-- Compass / current page --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <circle cx="12" cy="12" r="9"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m15 9-2 6-6 2 2-6 6-2Z"/>
                    </svg>
                </a>
                <a href="#" class="icon-btn relative w-11 h-11 rounded-xl flex items-center justify-center text-white/50 hover:text-white">
                    {{-- Folder --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7a1 1 0 0 1 1-1h4l2 2h10a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7Z"/>
                    </svg>
                </a>
                <a href="#" class="icon-btn relative w-11 h-11 rounded-xl flex items-center justify-center text-white/50 hover:text-white">
                    {{-- Settings --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <circle cx="12" cy="12" r="3"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.6a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1Z"/>
                    </svg>
                </a>
            </nav>

            <img src="https://i.pravatar.cc/80?img=12" alt="User avatar" class="w-9 h-9 rounded-full object-cover mt-auto">
        </aside>

        {{-- Main --}}
        <div class="flex-1 flex flex-col">

            {{-- Top bar --}}
            <header class="flex items-center justify-between px-10 h-[68px] border-b border-white/5">
                <div class="flex items-center gap-8">
                    <span class="text-lg font-bold tracking-tight">Apex</span>
                    <div class="flex items-center gap-2 bg-white/5 rounded-full px-4 py-2 w-80 text-white/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="7"/>
                            <path stroke-linecap="round" d="m21 21-4.3-4.3"/>
                        </svg>
                        <span class="text-sm">Search curated scents...</span>
                    </div>
                </div>
                <div class="flex items-center gap-4 text-white/50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5m6 0v1a3 3 0 1 1-6 0v-1m6 0H9"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 3 4 14h6l-1 7 9-11h-6l1-7Z"/>
                    </svg>
                    <span class="w-6 h-6 rounded-full bg-white/90"></span>
                </div>
            </header>

            <main class="px-10 py-10 max-w-[1400px] w-full mx-auto">

                {{-- Hero: image + info --}}
                <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_1fr] gap-6">
                    {{-- Product image --}}
                    <div class="rounded-2xl overflow-hidden bg-gradient-to-b from-[#1a1a1a] to-[#0d0d0d] aspect-[4/3] flex items-end p-8 relative">
                        <img src="{{ asset('images/essence-noir.jpg') }}"
                             onerror="this.style.display='none'"
                             alt="Essence Noir perfume bottle"
                             class="absolute inset-0 w-full h-full object-cover opacity-80">
                        <span class="relative text-xs tracking-widest text-white/40 uppercase">Essence Noir · Eau de Parfum</span>
                    </div>

                    {{-- Product info --}}
                    <div class="bg-[#111111] border border-white/5 rounded-2xl p-8 flex flex-col">
                        <p class="text-xs tracking-widest text-white/40 uppercase mb-4">
                            Collection <span class="text-white/70">›</span>
                            <span class="text-white font-semibold">Noir Series</span>
                        </p>

                        <h1 class="text-5xl font-extrabold leading-[1.05] mb-3">Essence<br>Noir</h1>
                        <p class="text-white/50 mb-6">Eau de Parfum</p>

                        <div class="flex items-end gap-3 mb-8">
                            <span class="text-3xl font-bold">${{ number_format($product['price'] ?? 285, 2) }}</span>
                            <span class="text-white/40 text-sm mb-1">{{ $product['size'] ?? '100ml / 3.4 fl. oz.' }}</span>
                        </div>

                        <button type="button" class="w-full bg-white text-black font-semibold rounded-xl py-3.5 flex items-center justify-center gap-2 hover:bg-white/90 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h15l-1.5 9h-12L6 6Zm0 0-1-3H2m6 18a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"/>
                            </svg>
                            Add to Cart
                        </button>

                        <button type="button" class="w-full bg-white/5 border border-white/10 text-white font-medium rounded-xl py-3.5 flex items-center justify-center gap-2 mt-3 hover:bg-white/10 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-7-4.35-9.5-8.5C.5 8.5 3 5 6.5 5c2 0 3.4 1.1 4 2.2C11.1 6.1 12.5 5 14.5 5 18 5 20.5 8.5 20.5 12.5 18 16.65 12 21 12 21Z"/>
                            </svg>
                            Save to Wishlist
                        </button>

                        <div class="border-t border-white/10 mt-8 pt-6 flex items-center gap-6 text-sm text-white/50">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.5 12 2.5 2.5 4.5-5"/>
                                </svg>
                                Authenticity Guaranteed
                            </span>
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h11v9H3V7Zm11 3h4l3 3v3h-7v-6Z"/>
                                    <circle cx="7" cy="18" r="1.5"/>
                                    <circle cx="17" cy="18" r="1.5"/>
                                </svg>
                                Express Shipping
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Narrative --}}
                <section class="mt-8 bg-[#111111] border border-white/5 rounded-2xl px-10 py-16 text-center">
                    <p class="text-xs tracking-[0.3em] text-white/40 uppercase mb-8">The Narrative</p>
                    <blockquote class="text-2xl md:text-3xl font-semibold leading-relaxed max-w-3xl mx-auto">
                        &ldquo;{{ $product['narrative'] ?? 'A phantom of the midnight garden, Essence Noir is an olfactory poem written in shadows. It captures the fleeting moment when the silver moon kisses the damp forest floor, awakening a symphony of cold earth and velvet petals.' }}&rdquo;
                    </blockquote>
                    <div class="w-8 h-px bg-white/20 mx-auto mt-10"></div>
                </section>

                {{-- Notes --}}
                <section class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    @php
                        $notes = $product['notes'] ?? [
                            [
                                'label' => 'Top Notes',
                                'title' => 'Bergamot & Pink Pepper',
                                'desc'  => 'The immediate, vibrant spark that greets the senses upon first contact.',
                                'icon'  => 'leaf',
                            ],
                            [
                                'label' => 'Heart Notes',
                                'title' => 'Midnight Rose & Jasmine',
                                'desc'  => 'The core soul of the scent, lingering beautifully as the spirit unfolds.',
                                'icon'  => 'flower',
                            ],
                            [
                                'label' => 'Base Notes',
                                'title' => 'Sandalwood & Vetiver',
                                'desc'  => 'The deep, enduring foundation that anchors the fragrance to the skin.',
                                'icon'  => 'tree',
                            ],
                        ];
                    @endphp

                    @foreach ($notes as $note)
                        <div class="card-hover bg-[#111111] border border-white/5 rounded-2xl p-8 text-center">
                            <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center mx-auto mb-5">
                                @if($note['icon'] === 'leaf')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 19c8 0 14-6 14-14-8 0-14 6-14 14Zm0 0c0-4 2-8 6-10"/>
                                    </svg>
                                @elseif($note['icon'] === 'flower')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                                        <circle cx="12" cy="12" r="2.5"/>
                                        <path stroke-linecap="round" d="M12 4a3 3 0 0 1 0 6M12 20a3 3 0 0 1 0-6M4 12a3 3 0 0 1 6 0M20 12a3 3 0 0 1-6 0"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2 6 11h4l-4 6h5v5h2v-5h5l-4-6h4L12 2Z"/>
                                    </svg>
                                @endif
                            </div>
                            <p class="text-xs tracking-widest text-white/40 uppercase mb-3">{{ $note['label'] }}</p>
                            <h3 class="text-lg font-semibold mb-2">{{ $note['title'] }}</h3>
                            <p class="text-sm text-white/50 leading-relaxed">{{ $note['desc'] }}</p>
                        </div>
                    @endforeach
                </section>

                {{-- Related products --}}
                <section class="mt-14">
                    <div class="flex items-end justify-between mb-6">
                        <div>
                            <p class="text-xs tracking-widest text-white/40 uppercase mb-2">Explore Further</p>
                            <h2 class="text-2xl font-bold">Other curations from Noir Series</h2>
                        </div>
                        <a href="#" class="text-sm text-white/60 hover:text-white flex items-center gap-1">
                            View All
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m0 0-6-6m6 6-6 6"/>
                            </svg>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @php
                            $related = $relatedProducts ?? [
                                ['name' => 'Luna Blanc', 'price' => 265, 'series' => 'Noir Series', 'bg' => 'from-gray-200 to-gray-400'],
                                ['name' => 'Oud Metal', 'price' => 310, 'series' => 'Noir Series', 'bg' => 'from-[#1a1a1a] to-black'],
                                ['name' => 'Chrome Petal', 'price' => 245, 'series' => 'Noir Series', 'bg' => 'from-[#0d1b2a] to-black'],
                            ];
                        @endphp

                        @foreach ($related as $item)
                            <a href="#" class="card-hover block rounded-2xl overflow-hidden border border-white/5">
                                <div class="aspect-[4/5] bg-gradient-to-b {{ $item['bg'] }}"></div>
                                <div class="bg-[#111111] p-5">
                                    <p class="text-xs tracking-widest text-white/40 uppercase mb-1">{{ $item['series'] }}</p>
                                    <h3 class="font-semibold mb-1">{{ $item['name'] }}</h3>
                                    <p class="text-white/50 text-sm">${{ number_format($item['price'], 2) }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
            </main>

            {{-- Footer --}}
            <footer class="border-t border-white/5 px-10 py-14 mt-16">
                <div class="max-w-[1400px] mx-auto grid grid-cols-1 md:grid-cols-4 gap-10">
                    <div class="md:col-span-1">
                        <h3 class="text-lg font-bold mb-3">Apex Noir</h3>
                        <p class="text-sm text-white/40 leading-relaxed">
                            The world's most exclusive fragrance laboratory. Scientifically crafted, artistically inspired.
                        </p>
                    </div>
                    <div>
                        <p class="text-xs tracking-widest text-white/30 uppercase mb-4">Collections</p>
                        <ul class="space-y-2 text-sm text-white/50">
                            <li><a href="#" class="hover:text-white">The Noir Series</a></li>
                            <li><a href="#" class="hover:text-white">Limited Archive</a></li>
                            <li><a href="#" class="hover:text-white">Sample Kits</a></li>
                        </ul>
                    </div>
                    <div>
                        <p class="text-xs tracking-widest text-white/30 uppercase mb-4">Concierge</p>
                        <ul class="space-y-2 text-sm text-white/50">
                            <li><a href="#" class="hover:text-white">Scent Consulting</a></li>
                            <li><a href="#" class="hover:text-white">Order Tracking</a></li>
                            <li><a href="#" class="hover:text-white">Returns</a></li>
                        </ul>
                    </div>
                    <div>
                        <p class="text-xs tracking-widest text-white/30 uppercase mb-4">Social</p>
                        <ul class="space-y-2 text-sm text-white/50">
                            <li><a href="#" class="hover:text-white">Instagram</a></li>
                            <li><a href="#" class="hover:text-white">Journal</a></li>
                        </ul>
                    </div>
                </div>
                <div class="max-w-[1400px] mx-auto flex flex-col sm:flex-row justify-between items-center gap-3 border-t border-white/5 mt-10 pt-6 text-xs text-white/30">
                    <span>&copy; {{ date('Y') }} Apex Digital Luxury. All rights reserved.</span>
                    <div class="flex gap-6">
                        <a href="#" class="hover:text-white/60">Privacy Policy</a>
                        <a href="#" class="hover:text-white/60">Terms of Service</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</body>
</html>