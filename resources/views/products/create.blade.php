@extends('layouts.app')

@section('title','Add Product')

@section('content')
<h2>Add Product</h2>

<form action="{{ route('products.store') }}" method="POST">
@csrf
<input name="name" placeholder="Product Name"><br><br>
<input name="price" placeholder="Price"><br><br>
<input name="stock" placeholder="Stock"><br><br>
<button>Add Product</button>
</form>
@endsection
