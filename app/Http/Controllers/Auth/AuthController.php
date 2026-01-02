<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //  REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|min:2|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        // Auto login after register
        Auth::login($user);

        //  Regenerate session to prevent 419
        $request->session()->regenerate();

        //  Redirect to GET route (NOT post)
        return redirect()->route('auth.login')
            ->with('success', 'Registered successfully');
    }

    // LOGIN
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            // 🔥 REQUIRED
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password',
        ]);
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        //  REQUIRED
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
