<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private const STATUSES = ['Menunggu konfirmasi', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan'];

    public function index(Request $request)
    {
        $query = Order::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('customer_name', 'like', "%{$search}%")
                    ->orWhere('customer_phone', 'like', "%{$search}%")
                    ->orWhere('id', $search);
            });
        }

        $orders = $query->paginate(10)->withQueryString();

        return view('orders.index', ['orders' => $orders, 'statuses' => self::STATUSES]);
    }

    public function create()
    {
        return view('orders.create', ['statuses' => self::STATUSES]);
    }

    public function store(Request $request)
    {
        Order::create($this->validatedData($request));

        if ($request->has('drawer')) {
            return response()->view('orders.drawer-success', [
                'message' => 'Pesanan berhasil ditambahkan.'
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil ditambahkan.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', ['order' => $order, 'statuses' => self::STATUSES]);
    }

    public function update(Request $request, Order $order)
    {
        $order->update($this->validatedData($request));

        if ($request->has('drawer')) {
            return response()->view('orders.drawer-success', [
                'message' => 'Pesanan berhasil diperbarui.'
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus.');
    }

    public function checkout(Request $request)
    {
        $data = $request->validate([
            'items' => ['required', 'array', 'min:1'],
            'items.*.name' => ['required', 'string', 'max:255'],
            'items.*.price' => ['required', 'numeric', 'min:0'],
            'items.*.qty' => ['required', 'integer', 'min:1'],
            'items.*.image' => ['nullable', 'string', 'max:255'],
        ]);

        $items = collect($data['items'])->map(fn ($item) => [
            'name' => $item['name'],
            'price' => (int) $item['price'],
            'qty' => (int) $item['qty'],
            'image' => $item['image'] ?? null,
        ])->values()->all();

        $order = Order::create([
            'items' => $items,
            'total_price' => collect($items)->sum(fn ($item) => $item['price'] * $item['qty']),
            'status' => 'Menunggu konfirmasi',
        ]);

        return response()->json(['id' => $order->id], 201);
    }

    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'customer_name' => ['nullable', 'string', 'max:255'],
            'customer_phone' => ['nullable', 'string', 'max:30'],
            'customer_address' => ['nullable', 'string'],
            'items_text' => ['required', 'string'],
            'total_price' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:' . implode(',', self::STATUSES)],
            'notes' => ['nullable', 'string'],
        ]);

        $data['items'] = collect(preg_split('/\r\n|\r|\n/', $data['items_text']))
            ->filter()
            ->map(function ($line) {
                [$name, $qty, $price] = array_pad(array_map('trim', explode('|', $line)), 3, null);

                return [
                    'name' => $name,
                    'qty' => max(1, (int) ($qty ?: 1)),
                    'price' => max(0, (int) ($price ?: 0)),
                ];
            })
            ->values()
            ->all();
        unset($data['items_text']);

        return $data;
    }
}
