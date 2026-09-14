@if (!request('drawer'))
<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-extrabold text-black tracking-tight">
                        Detail <span class="text-[#D4AF37]">Pesanan #{{ $order->id }}</span>
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">{{ $order->created_at->format('d M Y, H:i') }} WIB</p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('orders.edit', $order) }}" class="px-4 py-2 bg-black text-white rounded-xl text-xs font-bold hover:bg-[#D4AF37] transition">Edit Pesanan</a>
                    <a href="{{ route('orders.index') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-xl text-xs font-bold text-gray-700 hover:bg-gray-50 transition">Kembali</a>
                </div>
            </div>

            <!-- Content Card -->
            <div class="bg-white rounded-3xl border border-gray-100 p-6 sm:p-8 shadow-xs space-y-6">
                <!-- Status Banner -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 rounded-2xl bg-gray-50 border border-gray-100">
                    <div>
                        <span class="text-[10px] font-black uppercase tracking-wider text-gray-400">Status Transaksi</span>
                        <div class="mt-1">
                            @if($order->status === 'Menunggu konfirmasi')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                    Menunggu Konfirmasi
                                </span>
                            @elseif($order->status === 'Diproses')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                    Diproses
                                </span>
                            @elseif($order->status === 'Dikirim')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-purple-50 text-purple-700 border border-purple-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                                    Dikirim
                                </span>
                            @elseif($order->status === 'Selesai')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Selesai
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                    Dibatalkan
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="sm:text-right">
                        <span class="text-[10px] font-black uppercase tracking-wider text-gray-400">Total Pembayaran</span>
                        <div class="text-2xl font-black text-gray-900 mt-0.5">Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
                    </div>
                </div>

                <!-- Customer Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                    <div class="p-4 bg-gray-50/70 rounded-2xl border border-gray-100">
                        <span class="text-[10px] font-black uppercase tracking-wider text-gray-400">Nama Pembeli</span>
                        <div class="font-bold text-gray-900 text-sm mt-1">{{ $order->customer_name ?: 'Pelanggan Online (WhatsApp)' }}</div>
                    </div>
                    <div class="p-4 bg-gray-50/70 rounded-2xl border border-gray-100">
                        <span class="text-[10px] font-black uppercase tracking-wider text-gray-400">Kontak Telepon / WhatsApp</span>
                        <div class="mt-1">
                            @if($order->customer_phone)
                                @php $phoneClean = preg_replace('/[^0-9]/', '', $order->customer_phone); @endphp
                                <a href="https://wa.me/{{ $phoneClean }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600 hover:text-emerald-700">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                    {{ $order->customer_phone }} (Chat WhatsApp)
                                </a>
                            @else
                                <span class="text-xs text-gray-400 font-semibold">Tidak ada nomor</span>
                            @endif
                        </div>
                    </div>
                </div>

                @if($order->customer_address)
                    <div class="p-4 bg-gray-50/70 rounded-2xl border border-gray-100">
                        <span class="text-[10px] font-black uppercase tracking-wider text-gray-400">Alamat Pengiriman</span>
                        <div class="text-xs font-semibold text-gray-700 mt-1 whitespace-pre-line">{{ $order->customer_address }}</div>
                    </div>
                @endif

                <!-- Items Table -->
                <div class="space-y-3">
                    <span class="text-[10px] font-black uppercase tracking-wider text-gray-400">Rincian Item Produk</span>
                    <div class="border border-gray-100 rounded-2xl overflow-hidden">
                        <table class="w-full text-left text-xs">
                            <thead class="bg-gray-50 text-gray-400 uppercase font-extrabold text-[10px]">
                                <tr>
                                    <th class="p-3.5">Nama Produk</th>
                                    <th class="p-3.5 text-center">Qty</th>
                                    <th class="p-3.5 text-right">Harga Satuan</th>
                                    <th class="p-3.5 text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @if(is_array($order->items))
                                    @foreach($order->items as $item)
                                        @php
                                            $qty = $item['qty'] ?? 1;
                                            $price = $item['price'] ?? 0;
                                            $subtotal = $qty * $price;
                                        @endphp
                                        <tr>
                                            <td class="p-3.5 font-bold text-gray-900">{{ $item['name'] ?? '-' }}</td>
                                            <td class="p-3.5 text-center font-bold">{{ $qty }} pcs</td>
                                            <td class="p-3.5 text-right text-gray-600">Rp {{ number_format($price, 0, ',', '.') }}</td>
                                            <td class="p-3.5 text-right font-black text-gray-900">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                @if($order->notes)
                    <div class="p-4 bg-amber-50/50 rounded-2xl border border-amber-100">
                        <span class="text-[10px] font-black uppercase tracking-wider text-amber-800">Catatan Khusus</span>
                        <div class="text-xs font-medium text-amber-900 mt-1 whitespace-pre-line">{{ $order->notes }}</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
@else
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan #{{ $order->id }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F8F9FA] p-6 antialiased space-y-5">
    <div class="bg-white rounded-3xl border border-gray-100 p-6 shadow-xs space-y-6">
        <!-- Status & Total -->
        <div class="flex items-center justify-between p-4 rounded-2xl bg-gray-50 border border-gray-100">
            <div>
                <span class="text-[10px] font-black uppercase tracking-wider text-gray-400">Status</span>
                <div class="mt-1">
                    @if($order->status === 'Menunggu konfirmasi')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                            Menunggu Konfirmasi
                        </span>
                    @elseif($order->status === 'Diproses')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                            Diproses
                        </span>
                    @elseif($order->status === 'Dikirim')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-purple-50 text-purple-700 border border-purple-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                            Dikirim
                        </span>
                    @elseif($order->status === 'Selesai')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Selesai
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                            Dibatalkan
                        </span>
                    @endif
                </div>
            </div>
            <div class="text-right">
                <span class="text-[10px] font-black uppercase tracking-wider text-gray-400">Total Bayar</span>
                <div class="text-xl font-black text-gray-900 mt-0.5">Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
            </div>
        </div>

        <!-- Customer Data -->
        <div class="space-y-3 text-xs">
            <div class="flex justify-between py-2 border-b border-gray-50">
                <span class="text-gray-400 font-bold">Nama Pelanggan</span>
                <span class="font-bold text-gray-900">{{ $order->customer_name ?: 'Pelanggan Online' }}</span>
            </div>
            <div class="flex justify-between py-2 border-b border-gray-50">
                <span class="text-gray-400 font-bold">WhatsApp / Telepon</span>
                @if($order->customer_phone)
                    @php $phoneClean = preg_replace('/[^0-9]/', '', $order->customer_phone); @endphp
                    <a href="https://wa.me/{{ $phoneClean }}" target="_blank" class="font-bold text-emerald-600 hover:underline">
                        {{ $order->customer_phone }} ↗
                    </a>
                @else
                    <span class="text-gray-400">-</span>
                @endif
            </div>
            <div class="flex justify-between py-2 border-b border-gray-50">
                <span class="text-gray-400 font-bold">Waktu Masuk</span>
                <span class="font-bold text-gray-900">{{ $order->created_at->format('d M Y, H:i') }} WIB</span>
            </div>
            @if($order->customer_address)
                <div class="py-2 border-b border-gray-50">
                    <span class="text-gray-400 font-bold block mb-1">Alamat</span>
                    <span class="text-gray-700 font-medium whitespace-pre-line">{{ $order->customer_address }}</span>
                </div>
            @endif
            @if($order->notes)
                <div class="py-2">
                    <span class="text-gray-400 font-bold block mb-1">Catatan</span>
                    <span class="text-amber-800 font-medium whitespace-pre-line">{{ $order->notes }}</span>
                </div>
            @endif
        </div>

        <!-- Items -->
        <div class="space-y-2">
            <span class="text-[10px] font-black uppercase tracking-wider text-gray-400">Daftar Item</span>
            <div class="border border-gray-100 rounded-2xl overflow-hidden divide-y divide-gray-50">
                @if(is_array($order->items))
                    @foreach($order->items as $item)
                        <div class="p-3 bg-gray-50/50 flex justify-between items-center text-xs">
                            <div>
                                <div class="font-bold text-gray-900">{{ $item['name'] ?? '-' }}</div>
                                <div class="text-[11px] text-gray-400">{{ $item['qty'] ?? 1 }} pcs × Rp {{ number_format($item['price'] ?? 0, 0, ',', '.') }}</div>
                            </div>
                            <div class="font-black text-gray-900">
                                Rp {{ number_format(($item['qty'] ?? 1) * ($item['price'] ?? 0), 0, ',', '.') }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Action inside drawer -->
        <div class="pt-2 border-t border-gray-100 flex justify-end gap-2">
            <a href="{{ route('orders.edit', ['order' => $order->id, 'drawer' => 1]) }}" class="px-5 py-2.5 bg-black hover:bg-[#D4AF37] text-white text-xs font-bold rounded-xl transition flex items-center gap-1.5">
                <svg class="w-4 h-4 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Ubah Status & Edit
            </a>
        </div>
    </div>
</body>
</html>
@endif
