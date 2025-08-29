<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $prefs = optional($user->roommatePreference);

        // Basic match example — adapt fields to your schema
        $matches = User::with('roommate_preferences')
            ->where('id', '!=', $user->id)
            ->when($prefs, function ($q) use ($prefs) {
                $q->whereHas('roommatePreference', function ($q) use ($prefs) {
                    if ($prefs->gender_preference && $prefs->gender_preference !== 'any') {
                        $q->where('gender_preference', $prefs->gender_preference);
                    }
                    if (!is_null($prefs->night_owl)) $q->where('night_owl', $prefs->night_owl);
                    if (!is_null($prefs->pets)) $q->where('pets', $prefs->pets);
                    if (!is_null($prefs->smoking)) $q->where('smoking', $prefs->smoking);
                    if ($prefs->location) $q->where('location', $prefs->location);
                });
            })
            ->take(12)
            ->get();

        return view('dashboard.home', compact('matches'));
    }
}