<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Review;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Kartu Statistik Utama
        $totalProducts = Product::count();
        $totalBrands = Brand::count();
        $totalReviews = Review::count();
        $totalStock = Product::sum('stock');
        $averageRating = Review::avg('rating') ? number_format(Review::avg('rating'), 1) : 0;

        // 2. Data untuk Chart Donat (Kategori Produk)
        $categoryOriginal = Product::where('category', 'Original')->count();
        $categoryRefill = Product::where('category', 'Refill')->count();

        return view('dashboard', compact(
            'totalProducts', 
            'totalBrands', 
            'totalReviews', 
            'totalStock', 
            'averageRating',
            'categoryOriginal',
            'categoryRefill'
        ));
    }
}
