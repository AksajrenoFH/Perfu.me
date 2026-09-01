@if(!request('drawer'))
<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-extrabold text-black tracking-tight">
                        Edit <span class="text-[#D4AF37]">Pesanan #{{ $order->id }}</span>
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">Perbarui status transaksi, detail item, atau info pembeli.</p>
                </div>
                <a href="{{ route('orders.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:text-black transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali
                </a>
            </div>

            <form method="POST" action="{{ route('orders.update', $order) }}" class="bg-white border border-gray-100 rounded-3xl p-6 sm:p-8 shadow-xs space-y-6">
                @csrf
                @method('PUT')
                @include('orders._form')
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('orders.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-xs font-bold text-gray-700 hover:bg-gray-100 transition">Batal</a>
                    <button type="submit" class="px-6 py-2.5 bg-black hover:bg-[#D4AF37] text-white rounded-xl text-xs font-bold transition shadow-md">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
@else
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan #{{ $order->id }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F8F9FA] p-6 antialiased">
    <form method="POST" action="{{ route('orders.update', ['order' => $order->id, 'drawer' => 1]) }}" class="bg-white border border-gray-100 rounded-3xl p-6 shadow-xs space-y-6">
        @csrf
        @method('PUT')
        @include('orders._form')
        <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
            <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-black hover:bg-[#D4AF37] text-white rounded-xl text-xs font-bold transition shadow-md flex items-center justify-center gap-2">
                <svg class="w-4 h-4 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</body>
</html>
@endif
