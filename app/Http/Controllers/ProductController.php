<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // 1. READ: Menampilkan semua data (Bisa dikasih pagination)
    public function index(Request $request)
    {
        $query = Product::latest();

        // Filter berdasarkan Tipe (Original / Refill)
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

    // 2. Tampilkan halaman Form Create
    public function create()
    {
        return view('products.create');
    }

    // 3. CREATE: Proses simpan data baru
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

        // Handle File Upload
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        // Handle Checkbox Boolean (kalau dicentang true, kalau nggak false)
        $validatedData['is_best_seller'] = $request->boolean('is_best_seller');

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // 4. READ: Tampilkan detail 1 produk (Opsional untuk admin)
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // 5. Tampilkan halaman Form Edit
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // 6. UPDATE: Proses simpan perubahan data
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

        // Handle File Upload saat Update (PENTING!)
        if ($request->hasFile('image')) {
            // Hapus gambar lama dulu kalau ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            // Simpan gambar baru
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        // Handle Checkbox
        $validatedData['is_best_seller'] = $request->boolean('is_best_seller');

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    }

    // 7. DELETE: Proses hapus data
    public function destroy(Product $product)
    {
        // Hapus file gambar fisik di server dulu sebelum hapus data di database (PENTING!)
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}

