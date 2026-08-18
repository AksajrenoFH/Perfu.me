<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::latest();

        if ($request->has('type') && $request->type != '') {
            $query->where('category', $request->type);
        }

        // Filter berdasarkan Pencarian Nama Produk (Search)
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(10)->withQueryString();

        return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string',
            'variant' => 'nullable|in:EDP,EDT,Roll-on,Body Mist',
            'gender' => 'nullable|string',
            'top_note' => 'nullable|string',
            'middle_note' => 'nullable|string',
            'base_note' => 'nullable|string',
            'composition' => 'nullable|string',
            'packaging' => 'nullable|string',
            'volume' => 'nullable|integer',
            'price' => 'required|numeric',
            'stock' => 'nullable|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }
        $validatedData['is_best_seller'] = $request->boolean('is_best_seller');

        Product::create($validatedData);

        if ($request->has('drawer')) {
        return response()->view('products.drawer-success', ['message' => 'Produk berhasil ditambahkan']);
    }

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string',
            'variant' => 'nullable|in:EDP,EDT,Roll-on,Body Mist',
            'gender' => 'nullable|string',
            'top_note' => 'nullable|string',
            'middle_note' => 'nullable|string',
            'base_note' => 'nullable|string',
            'composition' => 'nullable|string',
            'packaging' => 'nullable|string',
            'volume' => 'nullable|integer',
            'price' => 'required|numeric',
            'stock' => 'nullable|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }
        if ($request->has('drawer')) {
        return response()->view('products.drawer-success', ['message' => 'Produk berhasil ditambahkan']);
    }

        // Handle Checkbox
        $validatedData['is_best_seller'] = $request->boolean('is_best_seller');

        $product->update($validatedData);


        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}

