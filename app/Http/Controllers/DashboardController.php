<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
         return view('dashboard', [
            'users'   => User::count(),
            'products'=> Product::count(),
            'orders'  => Orders::count(),
            'revenue' => Orders::where('status','paid')->sum('total_amount'),
            'recentOrders' => Orders::latest()->take(5)->get()
        ]);
    }
}
