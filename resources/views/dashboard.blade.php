@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<h2>Admin Dashboard</h2>

<a href="{{ route('products.create') }}">➕ Add Product</a>

<table border="1" width="100%" cellpadding="8" style="margin-top:15px;">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Action</th>
    </tr>

@foreach($products as $product)
<tr>
    <td>{{ $product->name }}</td>
    <td>₹ {{ $product->price }}</td>
    <td>{{ $product->stock }}</td>
    <td>
        <a href="{{ route('products.edit',$product->id) }}">Edit</a>

        <form action="{{ route('products.delete',$product->id) }}"
              method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Delete product?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach

</table>

@endsection
