<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        // Get cart total
        $carts = Cart::with('product')->where('user_id', 1)->get();
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart->product->price * $cart->quantity;
        }

        $order = $api->order->create([
            'receipt' => 'ORDER_' . uniqid(),
            'amount' => $total * 100, // in paise
            'currency' => 'INR'
        ]);

        return response()->json([
            'order_id' => $order['id'],
            'amount' => $order['amount'],
            'currency' => $order['currency'],
            'razorpay_key' => env('RAZORPAY_KEY'),
        ]);
    }
}
