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

    // Store product (WITH IMAGE - SPATIE)
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::create([
            'name'  => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // Save image using Spatie
        if ($request->hasFile('image')) {
            $product
                ->addMediaFromRequest('image')
                ->toMediaCollection('products');
        }

        return redirect()->route('dashboard')->with('success', 'Product added');
    }

    // Show edit form
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update product (WITH IMAGE REPLACE)
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product->update([
            'name'  => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // Replace image if new one uploaded
        if ($request->hasFile('image')) {
            $product->clearMediaCollection('products');

            $product
                ->addMediaFromRequest('image')
                ->toMediaCollection('products');
        }

        return redirect()->route('dashboard')->with('success', 'Product updated');
    }

    // Delete product (AUTO DELETE IMAGE)
    public function destroy(Product $product)
    {
        // This deletes all media automatically
        $product->clearMediaCollection('products');
        $product->delete();

        return redirect()->route('dashboard')->with('success', 'Product deleted');
    }
}
