<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
      public function add($id)
    {
        $product = Product::findOrFail($id);

        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => 1
        ]);

        return redirect()->route('cart')->with('success','Product added to cart');
    }

    public function index()
    {
        $items = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart', compact('items'));
    }

    public function destroy($id){
        Cart::where('id', $id)
        ->where('user_id', Auth::id())
        ->delete();
        return redirect()->route('cart')->with('success','Product remove from cart');
    }
        
    
}
