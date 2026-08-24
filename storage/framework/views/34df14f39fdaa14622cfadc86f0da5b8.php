<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Splash - Perfu.me</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Poppins:wght@300;400;500&display=swap');

        body { font-family: 'Poppins', sans-serif; }
        .brand-font { font-family: 'Cormorant Garamond', serif; }

        .splash-wrapper {
            background: radial-gradient(circle at 50% 30%, #1a1a1a 0%, #000000 70%);
            transition: opacity 0.7s ease, transform 0.7s ease;
            opacity: 1;
        }

        .splash-wrapper.fade-out {
            opacity: 0;
            transform: scale(1.03);
            pointer-events: none;
        }

        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(16px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes loading {
            0%, 80%, 100% { transform: translateY(0); opacity: .3; }
            40% { transform: translateY(-6px); opacity: 1; }
        }

        .brand-name { opacity: 0; animation: fadeInUp 1s ease-out 0.2s forwards; }
        .brand-tagline { opacity: 0; animation: fadeInUp 1s ease-out 0.6s forwards; }

        .shimmer-text {
            background: linear-gradient(90deg, #d4af37 0%, #fff5d1 50%, #d4af37 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .progress-track { background: rgba(255,255,255,0.1); }
        .progress-bar {
            width: 0%;
            transition: width 0.25s ease-out;
        }

        #dot1 { animation: loading 1s ease-in-out infinite; }
        #dot2 { animation: loading 1s ease-in-out 0.15s infinite; }
        #dot3 { animation: loading 1s ease-in-out 0.3s infinite; }
    </style>
</head>
<body class="overflow-hidden">
    <div id="splash" class="splash-wrapper w-screen h-screen flex flex-col items-center justify-center relative">

        <div class="absolute w-[500px] h-[500px] border border-[#d4af37]/10 rounded-full"></div>
        <div class="absolute w-[380px] h-[380px] border border-[#d4af37]/15 rounded-full"></div>

        <div class="relative flex flex-col items-center">
            <h1 class="brand-name shimmer-text brand-font text-6xl font-semibold tracking-wide">
                Perfu.me
            </h1>

            <p class="brand-tagline text-white/50 text-xs tracking-[0.35em] uppercase mt-3">
                Original Scents &amp; Curated Selections
            </p>

            <div class="mt-10 w-40 h-[2px] progress-track rounded-full overflow-hidden">
                <div id="progressBar" class="progress-bar h-full bg-gradient-to-r from-[#d4af37] to-[#fff5d1] rounded-full"></div>
            </div>

            <div class="flex items-center gap-2 mt-5">
                <span id="dot1" class="bg-[#d4af37] rounded-full w-1.5 h-1.5"></span>
                <span id="dot2" class="bg-[#d4af37] rounded-full w-1.5 h-1.5"></span>
                <span id="dot3" class="bg-[#d4af37] rounded-full w-1.5 h-1.5"></span>
            </div>
        </div>
    </div>

    <script>
        // nnti make <?php echo json_encode($productsImg ?? [], 15, 512) ?> klo udh jdi bekend-nya
        const assetsToPreload = [
            "<?php echo e(asset('images')); ?>",
        ];

        const progressBar = document.getElementById('progressBar');
        const splash = document.getElementById('splash');

        let loadedCount = 0;
        const total = assetsToPreload.length || 1;

        function updateProgress() {
            loadedCount++;
            const percent = Math.min(100, Math.round((loadedCount / total) * 100));
            progressBar.style.width = percent + '%';
        }

        function preloadImage(src) {
            return new Promise((resolve) => {
                const img = new Image();
                img.onload = () => { updateProgress(); resolve(); };
                img.onerror = () => { updateProgress(); resolve(); };
                img.src = src;
            });
        }

        const MIN_DISPLAY_TIME = 1200;
        const startTime = Date.now();

        Promise.all(assetsToPreload.map(preloadImage)).then(() => {
            const elapsed = Date.now() - startTime;
            const remaining = Math.max(0, MIN_DISPLAY_TIME - elapsed);

            setTimeout(() => {
                progressBar.style.width = '100%';
                splash.classList.add('fade-out');

                setTimeout(() => {
                    window.location.href = "/home";
                }, 700);
            }, remaining);
        });
    </script>
</body>
</html><?php /**PATH C:\Users\USER\Perfu.me\resources\views/splash.blade.php ENDPATH**/ ?>