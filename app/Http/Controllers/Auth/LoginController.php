<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show Login Page
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle Login Form Submission
     */
    public function login(Request $request)
    {
        //  Validate Input
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Attempt Login
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // Generate Sanctum Token 
            $user = Auth::user();
            $user->createToken('ecommerce-login-token')->plainTextToken;

            // Redirect to Dashboard (NO JSON)
            return redirect()->route('home')
                ->with('success', 'Login successful');
        }

        //Login Failed
        return back()->withErrors([
            'email' => 'Invalid email or password',
        ])->withInput();
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Logged out successfully');
    }
}