@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- HERO / BANNER -->
<div class="hero">
    <h1>Shop Smart, Shop Fast</h1>
    <p>Best products at best prices</p>

    @auth
        <a href="{{ route('dashboard') }}" class="btn primary">Go to Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="btn primary">Login</a>
        <a href="{{ route('register') }}" class="btn secondary">Register</a>
    @endauth
</div>

<hr>

<!-- PRODUCTS SECTION -->
<h2 class="section-title">Latest Products</h2>

@if($products->count() == 0)
    <p>No products available</p>
@endif

<div class="product-grid">
@foreach($products as $product)
    <div class="product-card">

        <!-- PRODUCT INFO -->
        <h3>{{ $product->name }}</h3>
        <p class="price">₹ {{ number_format($product->price, 2) }}</p>

        @if($product->stock > 0)
            <p class="stock in">In Stock</p>
        @else
            <p class="stock out">Out of Stock</p>
        @endif

        <!-- ACTION -->
        @auth
            @if($product->stock > 0)
                <a href="{{ route('add.cart', $product->id) }}" class="btn add-cart">
                    Add to Cart
                </a>
            @else
                <button class="btn disabled" disabled>Unavailable</button>
            @endif
        @else
            <a href="{{ route('login') }}" class="btn add-cart">
                Login to Buy
            </a>
        @endauth
    </div>
@endforeach
</div>

<!-- STYLES -->
<style>
.hero{
    background:#f1f3f6;
    padding:40px;
    text-align:center;
    border-radius:6px;
}
.section-title{
    margin:30px 0 15px;
}
.product-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(220px,1fr));
    gap:20px;
}
.product-card{
    border:1px solid #ddd;
    padding:15px;
    border-radius:6px;
    background:#fff;
    transition:0.3s;
}
.product-card:hover{
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}
.price{
    font-size:18px;
    font-weight:bold;
}
.stock{
    font-size:14px;
}
.stock.in{
    color:green;
}
.stock.out{
    color:red;
}
.btn{
    display:inline-block;
    padding:8px 15px;
    margin-top:10px;
    text-decoration:none;
    border-radius:4px;
    font-size:14px;
}
.primary{
    background:#28a745;
    color:#fff;
}
.secondary{
    background:#007bff;
    color:#fff;
}
.add-cart{
    background:#ff9f00;
    color:#fff;
}
.disabled{
    background:#ccc;
    color:#666;
    cursor:not-allowed;
}
</style>

@endsection
