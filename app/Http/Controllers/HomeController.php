<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('home', compact('products'));
    }

public function filter(Request $request)
{
    $search = $request->query('search');

    $products = Product::when($search, function ($query) use ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%");
        });
    })
    ->latest()
    ->get();

    return view('home', compact('products', 'search'));
}

}
