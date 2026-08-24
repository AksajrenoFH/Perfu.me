<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class RefillController extends Controller
{
    /**
     * Display a listing of all products (Refill, Original, & Best Sellers) with reviews & brands.
     */
    public function index()
    {
        $allProducts = Product::latest()->get();
        $brands = Brand::orderBy('name')->get();
        $reviews = Review::with('product')->where('rating', '>', 3)->latest()->take(3)->get();

        return view('customer.refillpage', compact('allProducts', 'brands', 'reviews'));
    }
}
