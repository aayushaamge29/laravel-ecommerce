@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products List</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add New Product</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price (₹)</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>₹{{ number_format($product->price, 2) }}</td>
                <td>
                    @foreach ($product->images as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image" width="70" height="70" style="margin-right:5px;">
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
</div>
@endsection
