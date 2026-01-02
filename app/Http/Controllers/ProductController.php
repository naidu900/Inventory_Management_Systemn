<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show dashboard products
    public function index()
    {
        $products = Product::latest()->get();
        return view('dashboard', compact('products'));
    }

    // Show add product form
    public function create()
    {
        return view('products.create');
    }

    // Store product
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        Product::create($request->all());

        return redirect()->route('dashboard')->with('success','Product added');
    }

    // Show edit form
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update product
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('dashboard')->with('success','Product updated');
    }

    // Delete product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('dashboard')->with('success','Product deleted');
    }
}
