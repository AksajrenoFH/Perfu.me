<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('product')
            ->latest()
            ->paginate(10);

        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('reviews.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'user_name' => ['required', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'between:1,5'],
            'comment' => ['required', 'string'],
        ]);

        Review::create($validated);

        if ($request->boolean('drawer')) {
            return response()->view('reviews.drawer-success', [
                'message' => 'Ulasan berhasil ditambahkan.',
            ]);
        }

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Ulasan berhasil ditambahkan!');
    }

    public function show(Review $review)
    {
        $review->load('product');

        return view('reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        $products = Product::orderBy('name')->get();

        return view('reviews.edit', compact('review', 'products'));
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'user_name' => ['required', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'between:1,5'],
            'comment' => ['required', 'string'],
        ]);

        $review->update($validated);

        if ($request->boolean('drawer')) {
            return response()->view('reviews.drawer-success', [
                'message' => 'Ulasan berhasil diperbarui.',
            ]);
        }

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Ulasan berhasil diperbarui!');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Ulasan berhasil dihapus!');
    }
}