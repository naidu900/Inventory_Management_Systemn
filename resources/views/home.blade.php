@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">

    <!-- HERO / BANNER -->
    <div class="p-5 mb-5 bg-light rounded-3 text-center shadow-sm">
        <h1 class="display-5 fw-bold">Shop Smart, Shop Fast</h1>
        <p class="lead text-muted">Best products at best prices</p>
    </div>

    <!-- PRODUCTS SECTION -->
    <h2 class="mb-4">Latest Products</h2>

    @if($products->count() == 0)
        <div class="alert alert-info text-center">
            No products available
        </div>
    @else
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">

                        {{-- PRODUCT IMAGE --}}
                        @if($product->hasMedia('products'))
                            <img 
                                src="{{ $product->getFirstMediaUrl('products') }}"
                                class="card-img-top"
                                style="height:180px; object-fit:cover;"
                                alt="{{ $product->name }}"
                            >
                        @else
                            <img 
                                src="https://via.placeholder.com/300x180?text=No+Image"
                                class="card-img-top"
                                alt="No image"
                            >
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>

                            <p class="fw-bold mb-2">
                                ₹ {{ number_format($product->price, 2) }}
                            </p>

                            @if($product->stock > 0)
                                <span class="badge bg-success mb-3 p-2">In Stock</span>
                            @else
                                <span class="badge bg-danger mb-3">Out of Stock</span>
                            @endif

                            <div class="mt-auto d-grid gap-2">
                                @auth
                                    @if($product->stock > 0)
                                        <a href="{{ route('add.cart', $product->id) }}"
                                           class="btn btn-secondary">
                                            Add to Cart
                                        </a>

                                        <a href="#" class="btn btn-outline-warning">
                                            Buy Now
                                        </a>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            Unavailable
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}"
                                       class="btn btn-warning mt-2">
                                        Buy Now
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
