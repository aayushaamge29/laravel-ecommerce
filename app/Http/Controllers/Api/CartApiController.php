<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartApiController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $cart = Cart::create([
            'user_id' => 1, // Hardcoded
            'product_id' => $request->product_id,
            'quantity' => $request->quantity ?? 1,
        ]);

        return response()->json(['success' => true, 'message' => 'Added to cart', 'data' => $cart]);
    }

    public function list()
    {
        $cartItems = Cart::with('product')->where('user_id', 1)->get();

        $total = 0;
        $data = $cartItems->map(function ($item) use (&$total) {
            $subtotal = $item->product->price * $item->quantity;
            $total += $subtotal;

            return [
                'cart_id' => $item->id,
                'product_name' => $item->product->name,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'subtotal' => $subtotal
            ];
        });

        return response()->json([
            'success' => true,
            'cart_items' => $data,
            'total' => $total
        ]);
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update(['quantity' => $request->quantity]);

        return response()->json(['success' => true, 'message' => 'Cart updated']);
    }

    public function delete($id)
    {
        Cart::destroy($id);
        return response()->json(['success' => true, 'message' => 'Cart item deleted']);
    }
}
