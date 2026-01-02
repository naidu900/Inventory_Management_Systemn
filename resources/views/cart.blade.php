@extends('layouts.app')

@section('title','Cart')

@section('content')
<h2>Your Cart</h2>

@if($items->count() == 0)
    <p>Your cart is empty</p>
@endif

@foreach($items as $item)
    <div style="border-bottom:1px solid #ddd;padding:10px;">
        <strong>{{ $item->product->name }}</strong>
        <p>₹ {{ $item->product->price }}</p>
        <p>Qty: {{ $item->quantity }}</p>
    </div>
     <form action="{{ route('remove.cart', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button style="color:red;">Remove</button>
    </form>
@endforeach

<a href="{{ route('dashboard') }}">Proceed to Dashboard</a>
@endsection
