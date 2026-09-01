<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login · Parfume.me</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Custom Luxury Glow & Mesh Background */
        .mesh-bg {
            background-color: #0b0f19;
            background-image:
                radial-gradient(at 0% 0%, rgba(30, 41, 59, 0.7) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(15, 23, 42, 0.9) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(2, 6, 23, 1) 0px, transparent 100%);
        }

        .glow-orb {
            position: absolute;
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, rgba(255, 255, 255, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
        }
    </style>
</head>

<body class="antialiased bg-gray-50">

    <div class="fixed inset-0 w-full h-full grid grid-cols-1 lg:grid-cols-2" x-data="{ 
             activeSlide: 0, 
             images: [
                 '<?php echo e(asset('storage/image/DSC00068.JPG')); ?>',
                 '<?php echo e(asset('storage/image/DSC00047.JPG')); ?>',
                 '<?php echo e(asset('storage/image/Dinamist-parfu.me.JPG')); ?>'
             ],
             quotes: [
                 'Aroma yang dirancang untuk mempertegas kehadiran dan ketajaman fokus Anda.',
                 'Koleksi eksklusif untuk menemani setiap sesi produktivitas mendalam Anda.',
                 'Harmoni kemewahan dan fungsionalitas harian dalam setiap semprotan.'
             ],
             init() {
                 setInterval(() => {
                     this.activeSlide = (this.activeSlide + 1) % this.images.length;
                 }, 5000);
             }
         }">

        
        <div
            class="hidden lg:relative lg:flex flex-col justify-between mesh-bg p-16 text-white overflow-hidden h-full border-r border-gray-800/60">

            
            <div class="glow-orb -top-20 -left-20"></div>
            <div class="glow-orb -bottom-20 -right-20"></div>

            
            <div class="absolute inset-0 opacity-30 mix-blend-overlay">
                <template x-for="(img, index) in images" :key="index">
                    <img :src="img"
                        onerror="this.src='https://images.unsplash.com/photo-1541643600914-78b084683601?q=80&w=1000&auto=format&fit=crop'"
                        alt="Visual"
                        class="absolute inset-0 w-full h-full object-cover object-center transition-all duration-1000"
                        :class="activeSlide === index ? 'opacity-100 scale-100' : 'opacity-0 scale-105'">
                </template>
            </div>

            <div class="absolute inset-0 bg-gradient-to-t from-[#0b0f19] via-transparent to-[#0b0f19]/60"></div>

            
            <div class="relative z-10 flex justify-between items-center">
                <a href="/" class="flex items-center gap-2.5 text-lg font-extrabold tracking-tight text-white group">
                    perfu.me
                </a>

                <div class="flex gap-2">
                    <template x-for="(img, index) in images" :key="index">
                        <button @click="activeSlide = index"
                            class="h-1 rounded-full transition-all duration-500 cursor-pointer"
                            :class="activeSlide === index ? 'w-8 bg-white' : 'w-2 bg-white/30'"></button>
                    </template>
                </div>
            </div>

            
            <div class="relative z-10 max-w-lg">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 text-[10px] tracking-[0.25em] uppercase text-gray-300 font-semibold mb-6 backdrop-blur-md">
                    Lifestyle & Productivity Division
                </div>
                <blockquote class="text-3xl font-extrabold leading-snug mb-6 tracking-tight text-gray-100 min-h-[120px]"
                    x-text="quotes[activeSlide]" x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
                </blockquote>
                <p class="text-xs text-gray-400 font-medium tracking-wide">© <?php echo e(date('Y')); ?> Perfu.me</p>
            </div>
        </div>

        
        <div class="flex flex-col justify-center px-8 sm:px-16 lg:px-24 py-12 bg-white h-full overflow-y-auto">
            <div class="max-w-md w-full mx-auto my-auto">

                <div class="mb-8">
                    <a href="/"
                        class="lg:hidden text-xl font-extrabold tracking-tight text-black block mb-6">Parfume.me</a>
                    <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Selamat Datang</h2>
                    <p class="text-sm text-gray-500 mt-2">Silakan masuk ke akun Anda untuk melanjutkan.</p>
                </div>

                
                <?php if($errors->any()): ?>
                    <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-100 text-xs text-red-600 space-y-1">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p>• <?php echo e($error); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-5">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-widest mb-2">Email
                            Address</label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus
                            placeholder="nama@email.com"
                            class="block w-full rounded-2xl bg-gray-50 border border-gray-200 px-4 py-4 text-sm text-gray-900 focus:bg-white focus:border-black focus:ring-1 focus:ring-black outline-none transition-all shadow-sm">
                    </div>

                    <!-- Password dengan Show/Hide Icon -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label
                                class="block text-[11px] font-bold text-gray-500 uppercase tracking-widest">Password</label>
                            <?php if(Route::has('password.request')): ?>
                                <a href="<?php echo e(route('password.request')); ?>"
                                    class="text-xs font-semibold text-gray-600 hover:text-black transition">Lupa
                                    password?</a>
                            <?php endif; ?>
                        </div>

                        <div class="relative" x-data="{ showPassword: false }">
                            <input :type="showPassword ? 'text' : 'password'" name="password" required
                                placeholder="••••••••"
                                class="block w-full rounded-2xl bg-gray-50 border border-gray-200 px-4 py-4 pr-12 text-sm text-gray-900 focus:bg-white focus:border-black focus:ring-1 focus:ring-black outline-none transition-all shadow-sm">

                            
                            <button type="button" @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-700 focus:outline-none cursor-pointer">
                                <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.032 10.032 0 012.288-4.038M15 12a3 3 0 11-3-3m5.918 2.918A9.97 9.97 0 0021.542 12c-1.274 4.057-5.064 7-9.542 7a9.97 9.97 0 01-2.192-.25m11.734-11.734L3.146 20.854" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center pt-1">
                        <label class="inline-flex items-center cursor-pointer select-none">
                            <input type="checkbox" name="remember"
                                class="rounded border-gray-300 text-black w-4 h-4 focus:ring-0">
                            <span class="ms-3 text-sm text-gray-600 font-medium">Ingat saya di perangkat ini</span>
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full bg-black text-white text-sm font-semibold rounded-full py-4 px-6 hover:bg-gray-800 transition-all duration-300 shadow-lg shadow-black/10 hover:-translate-y-0.5 cursor-pointer text-center">
                        Masuk ke Akun
                    </button>
                </form>

                <?php if(Route::has('register')): ?>
                    <p class="text-center text-sm text-gray-500 mt-8">
                        Belum punya akun? <a href="<?php echo e(route('register')); ?>"
                            class="font-bold text-black hover:underline underline-offset-4">Daftar sekarang</a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH C:\Users\Faiz\Perfu.me\resources\views\auth\login.blade.php ENDPATH**/ ?>