@extends('layouts.app')

@section('title','Cart')

@section('content')
<div class="container">
    <h2 class="mb-4">Your Cart</h2>

    @if($items->count() === 0)
        <div class="alert alert-info">
            Your cart is empty
        </div>
    @else
        <div class="list-group mb-4">

            @foreach($items as $item)
                <div class="list-group-item">
                    <div class="row align-items-center">

                        {{-- PRODUCT IMAGE --}}
                        <div class="col-md-2 text-center">
                            @if($item->product->hasMedia('products'))
                                <img
                                    src="{{ $item->product->getFirstMediaUrl('products') }}"
                                    class="img-fluid rounded"
                                    style="max-height:80px; object-fit:cover;"
                                >
                            @else
                                <span class="text-muted">No image</span>
                            @endif
                        </div>

                        {{-- PRODUCT DETAILS --}}
                        <div class="col-md-6">
                            <h5 class="mb-1">{{ $item->product->name }}</h5>

                            <p class="mb-1">
                                Price: ₹{{ $item->product->price }}
                            </p>

                            {{-- QUANTITY CONTROLS --}}
                            <div class="d-flex align-items-center gap-2">
                                <form action="{{ route('cart.decrease', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-secondary btn-sm">−</button>
                                </form>

                                <span class="fw-bold">{{ $item->quantity }}</span>

                                <form action="{{ route('cart.increase', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-secondary btn-sm">+</button>
                                </form>
                            </div>

                            {{-- ITEM TOTAL --}}
                            <p class="fw-bold mt-2">
                                Total: ₹{{ $item->product->price * $item->quantity }}
                            </p>
                        </div>

                        {{-- ACTIONS --}}
                        <div class="col-md-4 text-end">
                            <form action="{{ route('remove.cart', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    Remove
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

        <a href="{{ route('dashboard') }}" class="btn btn-primary">
            Proceed to Dashboard
        </a>
    @endif
</div>
@endsection
