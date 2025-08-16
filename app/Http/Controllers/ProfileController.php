<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
/** @var \App\Models\User $user */

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('dashboard.profile-settings', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username'   => 'required|string|max:255',
            'email'      => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone'      => 'nullable|string|max:20',
            'address'    => 'nullable|string|max:255',
            'password'   => 'nullable|string|min:6|confirmed',
            'profilePic' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // file validation
        ]);

        // Update profile picture if uploaded
        if ($request->hasFile('profilePic')) {
            $path = $request->file('profilePic')->store('profile_pics', 'public'); 
            
            // Delete old image if exists
            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }

            $user->profile_pic = $path;
        }

        // Update other fields
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->address  = $request->address;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user = Auth::user();

        $user->save();

        Auth::setUser($user);

        return redirect()->route('dashboard.profile-settings')
                 ->with('success', 'Profile updated successfully!');
    }
}
