<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // show edit profile page
    public function edit()
    {
        return view('profile.edit');
    }

    // update profile
    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile updated successfully');
    }

    // show change password page
public function passwordForm()
{
    return view('profile.password');
}

// update password
public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password'     => 'required|min:8|confirmed',
    ]);

    $user = Auth::user();

    // check old password
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors([
            'current_password' => 'Current password is incorrect'
        ]);
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()
        ->route('password.change')
        ->with('success', 'Password changed successfully');
}

}
