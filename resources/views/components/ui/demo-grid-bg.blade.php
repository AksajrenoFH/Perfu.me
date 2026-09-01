{{--
  demo-grid-bg.blade.php
  Blade adaptation of demo.tsx (React → Blade)

  Usage: @include('components.ui.demo-grid-bg')
  Or as Blade component: <x-ui.demo-grid-bg />

  This creates a full-screen wrapper with a top-fade grid background.
  The grid fades from top (visible) to bottom (transparent) using a CSS mask.
--}}

<div class="min-h-screen w-full bg-[#f8fafc] relative">
    {{-- Top Fade Grid Background --}}
    <div
        class="absolute inset-0 z-0"
        style="
            background-image:
                linear-gradient(to right, #e2e8f0 1px, transparent 1px),
                linear-gradient(to bottom, #e2e8f0 1px, transparent 1px);
            background-size: 20px 30px;
            -webkit-mask-image: radial-gradient(ellipse 70% 60% at 50% 0%, #000 60%, transparent 100%);
            mask-image: radial-gradient(ellipse 70% 60% at 50% 0%, #000 60%, transparent 100%);
        "
    ></div>

    {{-- Content slot --}}
    <div class="relative z-10">
        {{ $slot ?? '' }}
    </div>
</div>
