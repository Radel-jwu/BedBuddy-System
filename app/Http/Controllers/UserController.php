<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show single user profile
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

     public function search(Request $request)
        {
            $q = $request->input('q');

            $users = User::where('firstname', 'like', "%{$q}%")
                ->orWhere('lastname', 'like', "%{$q}%")
                ->orWhereRaw("CONCAT(firstname, ' ', lastname) LIKE ?", ["%{$q}%"])
                ->limit(10)
                ->get([
                    'id',
                    'firstname',
                    'lastname',
                    'email',
                    'profile_pic'
                ]);

            return response()->json($users);
        }

}
