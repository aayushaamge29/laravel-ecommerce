@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cart Items (User ID: 1)</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cart ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>₹{{ $item->product->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>₹{{ $item->product->price * $item->quantity }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-end"><strong>Total</strong></td>
                <td><strong>₹{{ $total }}</strong></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
