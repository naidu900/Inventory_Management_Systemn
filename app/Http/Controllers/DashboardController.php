<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Contacts;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
         return view('dashboard', [
           'userCount'    => User::where('role','user')->count(),
           'contactCount' => Contacts::count(),
            'products'=> Product::count(),
            'orders'  => Orders::count(),
            'revenue' => Orders::where('status','paid')->sum('total_amount'),
            'recentOrders' => Orders::latest()->take(5)->get()
        ]);
    }

    // public function dashboard()
    // {
    //     return view('dashboard', [
    //         'userCount'    => User::where('role','user')->count(),
    //         'contactCount' => Contacts::count(),
    //     ]);
    // }

    public function users()
    {
        $users = User::where('role','user')->latest()->get();
        return view('admin.users', compact('users'));
    }

    public function contacts()
    {
        $contacts = Contacts::latest()->get();
        return view('admin.contacts', compact('contacts'));
    }
}
