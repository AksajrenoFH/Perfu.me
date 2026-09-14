<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private const STATUSES = [
        'Menunggu konfirmasi',
        'Diproses',
        'Dikirim',
        'Selesai',
        'Dibatalkan',
    ];

    /**
     * Menampilkan daftar pesanan.
     */
    public function index(Request $request)
    {
        $query = Order::latest();

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search nama, nomor HP, atau ID order
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($query) use ($search) {
                $query->where(
                    'customer_name',
                    'like',
                    "%{$search}%"
                )
                ->orWhere(
                    'customer_phone',
                    'like',
                    "%{$search}%"
                )
                ->orWhere('id', $search);
            });
        }

        $orders = $query
            ->paginate(10)
            ->withQueryString();

        return view('orders.index', [
            'orders' => $orders,
            'statuses' => self::STATUSES,
        ]);
    }

    /**
     * Form tambah pesanan.
     */
    public function create()
    {
        return view('orders.create', [
            'statuses' => self::STATUSES,
        ]);
    }

    /**
     * Menyimpan pesanan dari admin.
     */
    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        Order::create($data);

        // Jika dibuka melalui drawer
        if ($request->has('drawer')) {
            return response()->view('orders.drawer-success', [
                'message' => 'Pesanan berhasil ditambahkan.',
            ]);
        }

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail pesanan.
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Form edit pesanan.
     */
    public function edit(Order $order)
    {
        return view('orders.edit', [
            'order' => $order,
            'statuses' => self::STATUSES,
        ]);
    }

    /**
     * Update pesanan.
     *
     * Stok dikurangi ketika status berubah dari
     * "Menunggu konfirmasi" ke "Diproses".
     */
    public function update(Request $request, Order $order)
    {
        /*
         * Simpan status lama sebelum order di-update.
         */
        $previousStatus = $order->status;

        /*
         * Simpan items lama karena items lama masih memiliki
         * product_id dari checkout.
         */
        $originalItems = is_array($order->items)
            ? $order->items
            : [];

        /*
         * Validasi + buat data baru.
         *
         * Kita kirim originalItems supaya product_id lama
         * tetap dipertahankan ketika admin edit order.
         */
        $data = $this->validatedData(
            $request,
            $originalItems
        );

        DB::transaction(function () use (
            $order,
            $data,
            $previousStatus,
            $originalItems
        ) {
            /*
             * Update data order terlebih dahulu.
             */
            $order->update($data);

            /*
             * Stok dikurangi ketika:
             *
             * 1. Sebelumnya masih "Menunggu konfirmasi"
             * 2. Sekarang menjadi status proses
             * 3. Stok order belum pernah dikurangi
             */
            $isProcessingStatus = in_array(
                $order->status,
                [
                    'Diproses',
                    'Dikirim',
                    'Selesai',
                ],
                true
            );

            $isLeavingPending =
                $previousStatus === 'Menunggu konfirmasi'
                && $isProcessingStatus;

            if (
                $isLeavingPending
                && !$order->stock_deducted
            ) {
                /*
                 * Gunakan items lama karena items tersebut
                 * masih mempunyai product_id dari checkout.
                 */
                $this->deductStockForItems($originalItems);

                /*
                 * Tandai bahwa stok order ini sudah dikurangi.
                 * Ini mencegah stok berkurang dua kali.
                 */
                $order->update([
                    'stock_deducted' => true,
                ]);
            }
        });

        /*
         * Jika update dilakukan melalui drawer,
         * kirim halaman sukses ke iframe.
         */
        if ($request->has('drawer')) {
            return response()->view('orders.drawer-success', [
                'message' => 'Pesanan berhasil diperbarui.',
            ]);
        }

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Menghapus pesanan.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }

    /**
     * Checkout dari customer.
     *
     * Order dibuat dengan status:
     * "Menunggu konfirmasi"
     *
     * Jadi stok BELUM dikurangi di sini.
     */
    public function checkout(Request $request)
    {
        $data = $request->validate([
            'items' => [
                'required',
                'array',
                'min:1',
            ],

            'items.*.product_id' => [
                'required',
                'integer',
                'exists:products,id',
            ],

            'items.*.name' => [
                'required',
                'string',
                'max:255',
            ],

            'items.*.price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'items.*.qty' => [
                'required',
                'integer',
                'min:1',
            ],

            'items.*.image' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        /*
         * Rapikan format items sebelum disimpan.
         */
        $items = collect($data['items'])
            ->map(function ($item) {
                return [
                    'product_id' => (int) $item['product_id'],
                    'name' => $item['name'],
                    'price' => (int) $item['price'],
                    'qty' => (int) $item['qty'],
                    'image' => $item['image'] ?? null,
                ];
            })
            ->values()
            ->all();

        /*
         * Buat order.
         *
         * stock_deducted = false
         * karena stok baru dikurangi ketika admin
         * mengubah status menjadi "Diproses".
         */
        $order = Order::create([
            'items' => $items,

            'total_price' => collect($items)->sum(
                function ($item) {
                    return $item['price'] * $item['qty'];
                }
            ),

            'status' => 'Menunggu konfirmasi',

            'stock_deducted' => false,
        ]);

        return response()->json([
            'id' => $order->id,
        ], 201);
    }

    /**
     * Mengurangi stok berdasarkan item order.
     */
    private function deductStockForItems(array $items): void
    {
        /*
         * Ambil semua product_id dari order.
         */
        $productIds = collect($items)
            ->pluck('product_id')
            ->filter()
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values();

        /*
         * Kalau tidak ada product_id,
         * tidak ada stok yang bisa dikurangi.
         */
        if ($productIds->isEmpty()) {
            return;
        }

        /*
         * Lock row product selama transaksi berlangsung.
         * Ini membantu mencegah bentrok ketika stok
         * diubah oleh proses lain secara bersamaan.
         */
        $products = Product::whereIn(
            'id',
            $productIds
        )
            ->lockForUpdate()
            ->get()
            ->keyBy('id');

        /*
         * Kurangi stok satu per satu.
         */
        foreach ($items as $item) {
            $productId = $item['product_id'] ?? null;
            $qty = (int) ($item['qty'] ?? 0);

            if (
                !$productId
                || !isset($products[$productId])
                || $qty <= 0
            ) {
                continue;
            }

            $product = $products[$productId];

            /*
             * Jangan sampai stok menjadi minus.
             */
            $newStock = max(
                0,
                $product->stock - $qty
            );

            $product->update([
                'stock' => $newStock,
            ]);
        }
    }

    /**
     * Validasi data order dari admin.
     *
     * $existingItems digunakan untuk mempertahankan
     * product_id dari order customer.
     */
    private function validatedData(
        Request $request,
        array $existingItems = []
    ): array {
        $data = $request->validate([
            'customer_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'customer_phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'customer_address' => [
                'nullable',
                'string',
            ],

            'items_text' => [
                'required',
                'string',
            ],

            'total_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'status' => [
                'required',
                'in:' . implode(',', self::STATUSES),
            ],

            'notes' => [
                'nullable',
                'string',
            ],
        ]);

        /*
         * Format items_text:
         *
         * Nama Produk | Qty | Harga
         *
         * Contoh:
         * Parfum A | 2 | 50000
         * Parfum B | 1 | 75000
         */
        $data['items'] = collect(
            preg_split(
                '/\r\n|\r|\n/',
                $data['items_text']
            )
        )
            ->filter(
                fn ($line) => trim($line) !== ''
            )
            ->values()
            ->map(function ($line, $index) use ($existingItems) {
                [
                    $name,
                    $qty,
                    $price
                ] = array_pad(
                    array_map(
                        'trim',
                        explode('|', $line)
                    ),
                    3,
                    null
                );

                /*
                 * Pertahankan product_id dari item lama
                 * berdasarkan posisi/baris.
                 *
                 * Ini penting supaya order customer
                 * tetap tahu produk mana yang stoknya
                 * harus dikurangi.
                 */
                $productId =
                    $existingItems[$index]['product_id']
                    ?? null;

                return [
                    'product_id' => $productId,
                    'name' => $name,
                    'qty' => max(
                        1,
                        (int) ($qty ?: 1)
                    ),
                    'price' => max(
                        0,
                        (int) ($price ?: 0)
                    ),
                ];
            })
            ->values()
            ->all();

        /*
         * items_text hanya untuk input form,
         * bukan kolom database.
         */
        unset($data['items_text']);

        return $data;
    }
}