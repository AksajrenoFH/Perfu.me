<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $productOri = Product::where('category', 'Original')->get();
        $productRefill = Product::where('category', 'Refill')->get();

        return view('customer.home', compact(
            'productOri',
            'productRefill'
        ));
    }
}