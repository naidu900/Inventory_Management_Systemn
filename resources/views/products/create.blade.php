@extends('layouts.app')

@section('title','Add Product')

@section('content')
<div class="container">
    <h2 class="mb-4">Add Product</h2>

    <!-- IMPORTANT: enctype added -->
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                placeholder="Enter product name"
                required
            >
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input
                type="number"
                name="price"
                id="price"
                class="form-control"
                placeholder="Enter price"
                required
            >
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input
                type="number"
                name="stock"
                id="stock"
                class="form-control"
                placeholder="Enter stock quantity"
                required
            >
        </div>

        <!-- IMAGE FIELD (Spatie) -->
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input
                type="file"
                name="image"
                id="image"
                class="form-control"
                accept="image/*"
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Add Product
        </button>
    </form>
</div>
@endsection
