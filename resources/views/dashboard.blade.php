@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div class="container">
    <h2 class="mb-4">Admin Dashboard</h2>

    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">
        Add Product
    </a>

    @if($products->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Image</th> {{--  NEW --}}
                        <th>Name</th>
                        <th>Price (₹)</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                  

                        <tr>
                            {{-- IMAGE --}}
                            <td>
                                @if($product->hasMedia('products'))
                                    <img
                                        src="{{ $product->getFirstMediaUrl('products') }}"
                                        width="60"
                                        height="60"
                                        style="object-fit:cover;"
                                        class="rounded"
                                    >
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>

                            <td>{{ $product->name }}</td>
                            <td>₹ {{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>

                            <td>
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="btn btn-sm btn-primary">
                                   Edit
                                </a>

                                <form action="{{ route('products.delete', $product->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        onclick="return confirm('Delete product?')"
                                        class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">No products available.</div>
    @endif
</div>
@endsection
