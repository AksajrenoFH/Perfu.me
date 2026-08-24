<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // 1. Original Best Seller products for showcase
        $productOri = Product::where('category', 'Original')
            ->where('is_best_seller', true)
            ->get();

        // 2. Hero Section: strictly Original products that are Best Sellers
        $heroProducts = Product::where('category', 'Original')
            ->where('is_best_seller', true)
            ->get();

        // Fallback if no Original best seller found
        if ($heroProducts->isEmpty()) {
            $heroProducts = Product::where('is_best_seller', true)->get();
        }
        if ($heroProducts->isEmpty()) {
            $heroProducts = Product::latest()->take(5)->get();
        }

        // 3. Refill products preview
        $productRefill = Product::where('category', 'Refill')->get();

        // 4. Reviews filter: ONLY reviews with rating > 3, max 3 items
        $reviews = Review::with('product')
            ->where('rating', '>', 3)
            ->latest()
            ->take(3)
            ->get();

        // 5. Average rating for Hero Social Proof
        $avgRating = round(Review::avg('rating') ?: 5.0, 1);

        // 6. Brands for marquee announcement
        $brands = Brand::orderBy('name')->get();

        return view('customer.home', compact(
            'productOri',
            'heroProducts',
            'productRefill',
            'reviews',
            'avgRating',
            'brands'
        ));
    }
}