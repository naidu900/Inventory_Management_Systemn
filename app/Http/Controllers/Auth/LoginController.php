<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function showlogin(){
        return view('auth.login');
    }

    function login(Request $request){
        $request->validate([
            "email"   => "required|email|unique:users",
            "password"=> "required"
        ]);

        if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email'=>'Invalid email or password',
        ]);
    }


    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
