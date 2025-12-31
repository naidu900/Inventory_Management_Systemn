<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;

class RegisterController extends Controller
{
    /**
     * Show Register Page
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle Register Form Submission
     */
    public function register(Request $request)
    {
        //Validate Input
        $validator = Validator::make($request->all(), [
            'name'     => 'required|min:2',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        //Create User
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Generate Token 
        $user->createToken('ecommerce-token')->plainTextToken;

        //Redirect to Login Page
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
