<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerProductController extends Controller
{
    public function showDetail($id)
    {
        // Data dummy sementara — nanti bisa diganti ambil dari Product::find($id)
        $catalogProducts = [
            [
                'id' => 1,
                'name' => 'Empire Extrait de Parfum 100ml',
                'price' => 'Rp 499.000,00',
                'image' => 'storage/image/DSC00068.JPG',
                'is_sold_out' => false,
                'description' => 'Wewangian elegan dengan aroma khas yang tahan lama, cocok untuk aktivitas formal maupun santai.',
            ],
            [
                'id' => 2,
                'name' => 'Conquer Extrait de Parfum 50ml',
                'price' => 'Rp 449.000,00',
                'image' => 'storage/image/DSC00047.JPG',
                'is_sold_out' => true,
                'description' => 'Aroma maskulin dan tegas, dirancang untuk pria yang percaya diri.',
            ],
        ];

        $item = collect($catalogProducts)->firstWhere('id', (int) $id);

        if (!$item) {
            abort(404);
        }

        return view('Product_customer.product-detail', compact('item'));
    }
}