<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoommateMatchController extends Controller
{
     public function show(User $user)
    {
        // eager load roommate preference
        $user->load('roommatePreference');

        return view('dashboard.viewmore', compact('user'));
    }
    
    public function findMatches()
    {
        $user = Auth::user();

        // Logged-in user's preferences
        $prefs = $user->roommatePreference;
        
        if (!$prefs) {
            return back()->with('error', 'You need to set your roommate preferences first.');
        }

        // Step 1: Find users that fit MY preferences
        $matches = User::where('id', '!=', $user->id)
            ->whereHas('roommatePreference', function ($q) use ($prefs) {
                if ($prefs->gender_preference !== 'any') {
                    $q->where('gender_preference', $prefs->gender_preference);
                }
                if ($prefs->night_owl) {
                    $q->where('night_owl', true);
                }
                if ($prefs->pets) {
                    $q->where('pets', true);
                }
                if ($prefs->smoking) {
                    $q->where('smoking', true);
                }
                if ($prefs->location) {
                    $q->where('location', $prefs->location);
                }

                // Budget range
                if ($prefs->budget_min) {
                    $q->where('budget_min', '<=', $prefs->budget_max);
                }
                if ($prefs->budget_max) {
                    $q->where('budget_max', '>=', $prefs->budget_min);
                }
            })
            ->with('roommatePreference')
            ->get()
            // Step 2: Make sure I also fit THEIR preferences
            ->filter(function ($otherUser) use ($prefs, $user) {
                $otherPrefs = $otherUser->roommatePreference;
                if (!$otherPrefs) return false;

                // Gender
                if ($otherPrefs->gender_preference !== 'any' 
                    && $otherPrefs->gender_preference !== $user->gender) {
                    return false;
                }

                // Lifestyle prefs
                if ($otherPrefs->night_owl && !$prefs->night_owl) return false;
                if ($otherPrefs->pets && !$prefs->pets) return false;
                if ($otherPrefs->smoking && !$prefs->smoking) return false;

                // Location
                if ($otherPrefs->location && $otherPrefs->location !== $prefs->location) {
                    return false;
                }

                // Budget range (mutual overlap)
                if ($otherPrefs->budget_min && $prefs->budget_max < $otherPrefs->budget_min) {
                    return false;
                }
                if ($otherPrefs->budget_max && $prefs->budget_min > $otherPrefs->budget_max) {
                    return false;
                }

                // Age range (if you store user age in User model)
                if ($user->age) {
                    if ($otherPrefs->min_age && $user->age < $otherPrefs->min_age) return false;
                    if ($otherPrefs->max_age && $user->age > $otherPrefs->max_age) return false;
                }

                // ✅ If all checks pass, it's a mutual match
                return true;
            });

        return view('dashboard.home', compact('matches'));
    }

    
}
