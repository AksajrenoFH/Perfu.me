<x-app-layout>
    <div class="min-h-screen bg-[#F8F9FA] py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-100">
                <div><h1 class="text-2xl font-black text-gray-900">Manajemen Pesanan</h1><p class="text-xs text-gray-500 mt-1">Pesanan dari checkout WhatsApp akan muncul otomatis di sini.</p></div>
                <a href="{{ route('orders.create') }}" class="bg-black text-white px-5 py-3 rounded-2xl text-xs font-bold">Tambah Pesanan</a>
            </div>
            @if(session('success')) <div class="bg-emerald-50 text-emerald-800 border border-emerald-200 p-4 rounded-2xl text-sm">{{ session('success') }}</div> @endif
            <form class="flex flex-col sm:flex-row gap-3 bg-white p-4 rounded-2xl border border-gray-100">
                <input name="search" value="{{ request('search') }}" placeholder="Cari nomor, nama, atau telepon" class="flex-1 rounded-xl border-gray-200 text-sm">
                <select name="status" class="rounded-xl border-gray-200 text-sm"><option value="">Semua status</option>@foreach($statuses as $status)<option value="{{ $status }}" @selected(request('status') === $status)>{{ $status }}</option>@endforeach</select>
                <button class="bg-gray-900 text-white px-5 py-2 rounded-xl text-sm">Filter</button>
            </form>
            <div class="bg-white rounded-3xl border border-gray-100 overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm"><thead class="bg-gray-50 text-xs text-gray-500"><tr><th class="p-4">Pesanan</th><th class="p-4">Pelanggan</th><th class="p-4">Item</th><th class="p-4">Total</th><th class="p-4">Status</th><th class="p-4 text-right">Aksi</th></tr></thead><tbody class="divide-y divide-gray-100">@forelse($orders as $order)<tr><td class="p-4 font-bold">#{{ $order->id }}<div class="font-normal text-xs text-gray-400 mt-1">{{ $order->created_at->format('d M Y H:i') }}</div></td><td class="p-4">{{ $order->customer_name ?: 'Belum diisi' }}<div class="text-xs text-gray-400">{{ $order->customer_phone }}</div></td><td class="p-4 text-xs">{{ collect($order->items)->sum('qty') }} pcs · {{ collect($order->items)->pluck('name')->join(', ') }}</td><td class="p-4 font-bold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td><td class="p-4"><span class="px-3 py-1 rounded-full bg-gray-100 text-xs">{{ $order->status }}</span></td><td class="p-4"><div class="flex justify-end gap-2"><a href="{{ route('orders.show', $order) }}" class="text-gray-700">Detail</a><a href="{{ route('orders.edit', $order) }}" class="text-[#b58d17]">Edit</a><form action="{{ route('orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Hapus pesanan ini?')">@csrf @method('DELETE')<button class="text-red-600">Hapus</button></form></div></td></tr>@empty<tr><td colspan="6" class="p-12 text-center text-gray-400">Belum ada pesanan.</td></tr>@endforelse</tbody></table></div><div class="p-4">{{ $orders->links() }}</div></div>
        </div>
    </div>
</x-app-layout>
