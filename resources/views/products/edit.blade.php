@extends('layouts.app')

@section('title','Edit Product')

@section('content')
<h2>Edit Product</h2>

<form action="{{ route('products.update',$product->id) }}" method="POST">
@csrf
@method('PUT')

<input name="name" value="{{ $product->name }}"><br><br>
<input name="price" value="{{ $product->price }}"><br><br>
<input name="stock" value="{{ $product->stock }}"><br><br>

<button>Update</button>
</form>
@endsection
