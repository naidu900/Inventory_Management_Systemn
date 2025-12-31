<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function showRegister(){
        return view('auth.register');
    }

    function register(Request $request){

        $request->validate([
            "name"    => "required|min:2",
            "email"   => "required|email|unique:users",
            "password"=> "required|min:6|confirmed"
        ]);

        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
        ]);
        return redirect()->back()->with('success','Account created successfully!');
    }
}
