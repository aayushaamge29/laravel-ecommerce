@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product Details</h1>

    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <h3>{{ $product->name }}</h3>
    <p><strong>Price:</strong> ₹{{ number_format($product->price, 2) }}</p>

    <div>
        <strong>Images:</strong><br>
        @foreach ($product->images as $image)
            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image" width="150" height="150" style="margin-right:10px;">
        @endforeach
    </div>
</div>
@endsection
