@extends('layouts.app')

@section('title','Edit Product')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Product</h2>

    <!-- IMPORTANT: enctype -->
    <form action="{{ route('products.update', $product->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- CURRENT IMAGE --}}
        <div class="mb-3">
            <label class="form-label">Current Image</label><br>

            @if($product->hasMedia('products'))
                <img
                    src="{{ $product->getFirstMediaUrl('products') }}"
                    style="width:150px; height:150px; object-fit:cover;"
                    class="rounded border"
                >
            @else
                <p class="text-muted">No image uploaded</p>
            @endif
        </div>

        {{-- NEW IMAGE --}}
        <div class="mb-3">
            <label for="image" class="form-label">Change Image</label>
            <input
                type="file"
                name="image"
                id="image"
                class="form-control"
                accept="image/*"
            >
            <small class="text-muted">
                Leave empty to keep existing image
            </small>
        </div>

        {{-- NAME --}}
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{ old('name', $product->name) }}"
                required
            >
        </div>

        {{-- PRICE --}}
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input
                type="number"
                name="price"
                id="price"
                class="form-control"
                value="{{ old('price', $product->price) }}"
                required
            >
        </div>

        {{-- STOCK --}}
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input
                type="number"
                name="stock"
                id="stock"
                class="form-control"
                value="{{ old('stock', $product->stock) }}"
                required
            >
        </div>

        <button type="submit" class="btn btn-success">
            Update Product
        </button>
    </form>
</div>
@endsection
