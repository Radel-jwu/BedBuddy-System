<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RoommatePreference;

class RoommatePreferenceController extends Controller
{
    public function save(Request $request)
    {
        $user = Auth::user();

        // validate request
        $data = $request->validate([
            'gender_preference' => 'required|string',
            'min_age' => 'required|integer',
            'max_age' => 'required|integer',
            'budget_min' => 'required|integer',
            'budget_max' => 'required|integer',
            'night_owl' => 'boolean',
            'pets' => 'boolean',
            'smoking' => 'boolean',
            'location' => 'nullable|string',
        ]);

        // update or create roommate preference
        RoommatePreference::updateOrCreate(
            ['user_id' => $user->id],
            $data
        );

        return redirect()->route('dashboard.home')->with('success', 'Preferences saved successfully!');
    }
}
