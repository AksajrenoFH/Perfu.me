<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Metrik Finansial & Pendapatan
        $settledRevenue = (float) Order::where('status', 'Selesai')->sum('total_price');
        $pendingRevenue = (float) Order::whereIn('status', ['Menunggu konfirmasi', 'Diproses', 'Dikirim'])->sum('total_price');
        $grossRevenue = (float) Order::where('status', '!=', 'Dibatalkan')->sum('total_price');
        $cancelledRevenue = (float) Order::where('status', 'Dibatalkan')->sum('total_price');
        
        $nonCancelledOrdersCount = Order::where('status', '!=', 'Dibatalkan')->count();
        $averageOrderValue = $nonCancelledOrdersCount > 0 ? ($grossRevenue / $nonCancelledOrdersCount) : 0;

        // 2. Metrik Pesanan & Operasional
        $totalOrders = Order::count();
        $pendingOrdersCount = Order::where('status', 'Menunggu konfirmasi')->count();
        $processingOrdersCount = Order::whereIn('status', ['Diproses', 'Dikirim'])->count();
        $completedOrdersCount = Order::where('status', 'Selesai')->count();
        $cancelledOrdersCount = Order::where('status', 'Dibatalkan')->count();

        // Hitung total item botol parfum terjual (non-dibatalkan)
        $activeOrders = Order::where('status', '!=', 'Dibatalkan')->get();
        $totalItemsSold = $activeOrders->sum(function ($order) {
            if (is_array($order->items)) {
                return collect($order->items)->sum('qty');
            }
            return 0;
        });

        // 3. Data Transaksi & Pembeli Terbaru (Tabel Dashboard)
        $recentOrders = Order::latest()->take(7)->get();

        // 4. Data Katalog & Ulasan
        $totalProducts = Product::count();
        $totalBrands = Brand::count();
        $totalReviews = Review::count();
        $totalStock = Product::sum('stock') ?? 0;
        $averageRating = Review::avg('rating') ? number_format(Review::avg('rating'), 1) : 0;

        // 5. Data Chart: Tren Pendapatan & Pesanan (7 Hari Terakhir)
        $last7Days = collect(range(6, 0))->map(function ($daysAgo) {
            $dt = Carbon::now()->subDays($daysAgo);
            return [
                'date' => $dt->format('Y-m-d'),
                'label' => $dt->format('d M'),
            ];
        });

        $dailyStats = $last7Days->map(function ($item) {
            $orders = Order::whereDate('created_at', $item['date'])->get();
            $revenue = (float) $orders->where('status', '!=', 'Dibatalkan')->sum('total_price');
            $count = $orders->count();
            return [
                'label' => $item['label'],
                'revenue' => $revenue,
                'count' => $count,
            ];
        });

        $chartLabels = $dailyStats->pluck('label')->toArray();
        $chartRevenue = $dailyStats->pluck('revenue')->toArray();
        $chartOrders = $dailyStats->pluck('count')->toArray();

        // 6. Data Donut Chart: Distribusi Status Transaksi
        $statusDistribution = [
            'Menunggu' => $pendingOrdersCount,
            'Diproses / Kirim' => $processingOrdersCount,
            'Selesai' => $completedOrdersCount,
            'Dibatalkan' => $cancelledOrdersCount,
        ];

        return view('dashboard', compact(
            'settledRevenue',
            'pendingRevenue',
            'grossRevenue',
            'cancelledRevenue',
            'averageOrderValue',
            'totalOrders',
            'pendingOrdersCount',
            'processingOrdersCount',
            'completedOrdersCount',
            'cancelledOrdersCount',
            'totalItemsSold',
            'recentOrders',
            'totalProducts',
            'totalBrands',
            'totalReviews',
            'totalStock',
            'averageRating',
            'chartLabels',
            'chartRevenue',
            'chartOrders',
            'statusDistribution'
        ));
    }
}

