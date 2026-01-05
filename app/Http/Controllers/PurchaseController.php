<?php

namespace App\Http\Controllers;

use App\Jobs\SendPurchaseEmailJob;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function store(Request $request)
    {
        echo "line1";
        $user = Auth::user();
        echo "line2";

        // Example product (from cart or request)
        $product = Product::findOrFail($request->product_id ?? 1);
        echo "line3";

        // Save purchase
        Purchase::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'status' => 'confirmed',
        ]);

        // Dispatch email job
        SendPurchaseEmailJob::dispatch($user, $product);

        // Redirect immediately
        return redirect()->route('thankyou');
    }
}
