<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Show dashboard products
     */
    public function index()
    {
        $user = Auth::user();

        // Admin → all products
        if ($user->role === 'admin') {
            $products = Product::latest()->get();
        }
        // User → only own products
        else {
            $products = Product::where('user_id', $user->id)
                               ->latest()
                               ->get();
        }

        return view('dashboard', compact('products'));
    }

    /**
     * Show add product form
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store product (WITH IMAGE - SPATIE)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::create([
            'user_id' => Auth::id(), //  ownership
            'name'    => $request->name,
            'price'   => $request->price,
            'stock'   => $request->stock,
        ]);

        // Save image using Spatie
        if ($request->hasFile('image')) {
            $product
                ->addMediaFromRequest('image')
                ->toMediaCollection('products');
        }

        return redirect()->route('dashboard')->with('success', 'Product added');
    }

    /**
     * Show edit form
     */
    public function edit(Product $product)
    {
        $this->authorizeProduct($product);
        return view('products.edit', compact('product'));
    }

    /**
     * Update product
     */
    public function update(Request $request, Product $product)
    {
        $this->authorizeProduct($product);

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

        if ($request->hasFile('image')) {
            $product->clearMediaCollection('products');
            $product
                ->addMediaFromRequest('image')
                ->toMediaCollection('products');
        }

        return redirect()->route('dashboard')->with('success', 'Product updated');
    }

    /**
     * Delete product
     */
    public function destroy(Product $product)
    {
        $this->authorizeProduct($product);

        $product->clearMediaCollection('products');
        $product->delete();

        return redirect()->route('dashboard')->with('success', 'Product deleted');
    }

    /**
     * Authorization helper
     */
    private function authorizeProduct(Product $product)
    {
        if (
            Auth::user()->role !== 'admin' &&
            $product->user_id !== Auth::id()
        ) {
            abort(403, 'Unauthorized action.');
        }
    }
}
