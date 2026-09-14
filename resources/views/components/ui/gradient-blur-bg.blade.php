{{--
  gradient-blur-bg.blade.php
  Blade adaptation of gradient-blur-bg.tsx (React → Blade)

  Usage: @include('components.ui.gradient-blur-bg')
  Or as Blade component: <x-ui.gradient-blur-bg />

  Props (optional):
    $slot  — any child content placed inside the wrapper
--}}

<div class="min-h-screen w-full bg-white relative">
    {{-- Purple Gradient Grid Right Background --}}
    <div
        class="absolute inset-0 z-0"
        style="
            background-image:
                linear-gradient(to right, #f0f0f0 1px, transparent 1px),
                linear-gradient(to bottom, #f0f0f0 1px, transparent 1px),
                radial-gradient(circle 800px at 100% 200px, #d5c5ff, transparent);
            background-size: 96px 64px, 96px 64px, 100% 100%;
        "
    ></div>

    {{-- Content slot --}}
    <div class="relative z-10">
        {{ $slot ?? '' }}
    </div>
</div>
