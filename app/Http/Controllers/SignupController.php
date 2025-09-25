<?php

namespace App\Http\Controllers;

use App\Models\Signup;
use Illuminate\Http\Request;
use App\Models\User;

class SignupController extends Controller
{

    public function create(){

         return view('signup_page.acc_verification');
    }
    //
    public function store(Request $request)                    
                                            {
    $validated = $request->validate([
        'username' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|unique:users,email',
        'address' => 'required|string|max:255',
        'password' => 'required|confirmed|min:6',
        ]);

        User::create($validated);

        return redirect()->route('signup.verification');

    }
}
