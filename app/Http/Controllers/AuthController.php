<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login_page.login'); 
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Check if username is email or phone
        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        if (Auth::attempt([$loginType => $request->username, 'password' => $request->password], $request->has('remember'))) {
            $request->session()->regenerate();

            // Store user profile in session, including plain password
            $user = Auth::user();
            $request->session()->put('user_profile', [
                'id'       => $user->id,
                'username' => $user->username,
                'password' => $request->password, // store plain password ⚠️
                'email'    => $user->email,
                'phone'    => $user->phone,
                'address'  => $user->address,
                'role'     => $user->role ?? 'user',
            ]);

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'username' => 'Invalid credentials.',
        ])->withInput();
    }
}
