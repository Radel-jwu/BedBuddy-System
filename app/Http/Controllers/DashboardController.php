<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Property;
use App\Models\Bedspace;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $prefs = optional($user->roommatePreference);
        $listings = Bedspace::with('property')->get();
        $listings = Bedspace::with('property')->paginate(6);
        $matches = User::with('roommatePreference')->take(6)->get();

        $matches = User::with('roommatePreference')
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

        // Default: no listings until user searches
        return view('dashboard.home', compact('matches', 'listings'));
    }

    /** ✅ Map endpoint */
    public function map()
    {
        $properties = DB::table('properties')
            ->leftJoin('bedspaces', 'bedspaces.property_id', '=', 'properties.id')
            ->select(
                'properties.id',
                'properties.property_name',
                'properties.street_address',
                'properties.city',
                'properties.type',
                'properties.lat',
                'properties.lng',
                DB::raw('COALESCE(bedspaces.price, 0) as price'),
                'bedspaces.rating'
            )
            ->get();

        return response()->json($properties);
    }
    /** ✅ Search endpoint */
public function search(Request $request)
{
    $location = $request->query('location'); // e.g., "F. Pacana St, Cebu City"
    $type = $request->query('type');
    $budget = $request->query('budget');

    // Split location into street_address and city
    $street_address = null;
    $city = null;
    if ($location) {
    // Find the last comma in the string
    $lastCommaPos = strrpos($location, ',');
    
    if ($lastCommaPos !== false) {
        // Everything before the last comma is street_address
        $street_address = trim(substr($location, 0, $lastCommaPos));
        // Everything after the last comma is city
        $city = trim(substr($location, $lastCommaPos + 1));
    } else {
        // No comma found, treat whole location as street_address
        $street_address = trim($location);
        $city = '';
    }
    }

    $query = Property::query();

    if ($street_address) {
        $query->where('street_address', 'like', "%{$street_address}%");
    }
    if ($city) {
        $query->where('city', 'like', "%{$city}%");
    }
    if ($type) {
        $query->where('type', $type);
    }

    // Join with bedspaces to filter by price
    if ($budget) {
        $query->whereHas('bedspaces', function($q) use ($budget) {
            $q->where('price', '<=', $budget);
        });
    }

    // Load bedspaces
    $properties = $query->with(['bedspaces' => function($q) use ($budget) {
        if ($budget) $q->where('price', '<=', $budget);
    }])->get();

    // Flatten all bedspaces
    $bedspaces = $properties->flatMap->bedspaces;

    // Render HTML for each bedspace
    $html = '';
    foreach ($bedspaces as $bedspace) {
        $html .= view('components.bedspace', ['listing' => $bedspace])->render();
    }

    return response()->json([
        'html' => $html,
        'street_address' => $street_address,
        'city' => $city
    ]);
}












}