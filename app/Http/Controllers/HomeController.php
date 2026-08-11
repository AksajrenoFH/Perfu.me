<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $productOri = Product::where('category', 'Original')->first();
        $productRefill = Product::where('category', 'Refill')->first();

        return view('customer.home', compact(
            'productOri',
            'productRefill'
        ));
    }
}