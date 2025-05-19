<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductApiController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();

        $data = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'images' => $product->images->map(function ($image) {
                    return asset('storage/' . $image->image_path);
                }),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }
}
