<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('product')->latest()->paginate(10);
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $products = Product::all();
        return view('reviews.create', compact('products'));
    }

    public function edit(Review $review)
    {
        $products = Product::all();
        return view('reviews.edit', compact('review', 'products'));
    }

    public function show(Review $review)
    {
        $review->load('product');
        return view('reviews.show', compact('review'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        Review::create($request->all());

        if ($request->has('drawer')) {
        return response()->view('reviews.drawer-success', ['message' => 'Review berhasil ditambahkan']);
    }

        return redirect()->route('reviews.index')->with('success', 'Review berhasil ditambahkan!');
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $review->update($validated);

        if ($request->has('drawer')) {
        return response()->view('reviews.drawer-success', ['message' => 'Produk berhasil ditambahkan']);
    }

        return redirect()->route('reviews.index')->with('success', 'Review berhasil diperbarui!');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review berhasil dihapus!');
    }
}
