<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //! SHOW CART PAGE
    public function index()
    {
        $items = Cart::where('user_id', Auth::id())
            ->with('product')
            ->get();

        return view('cart', compact('items'));
    }

    //! ADD TO CART
    public function add($id)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($cart) {
            // increase quantity if already exists
            $cart->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Product added to cart');
    }

    // !REMOVE ITEM
    public function destroy($id)
    {
        Cart::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return redirect()->route('cart')->with('success', 'Product removed from cart');
    }  

    //!quantity code 
    public function increase($id)
{
    $item = Cart::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $item->increment('quantity');

    return back();
}

public function decrease($id)
{
    $item = Cart::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    if ($item->quantity > 1) {
        $item->decrement('quantity');
    } else {
        $item->delete();
    }

    return back();
}
    
}
