@props(['user'])

@php
use Illuminate\Support\Str;

// User avatar (main image)
$avatar = $user->profile_pic 
    ? asset('images/' . $user->profile_pic) 
    : asset('images/default-user.jpg');

// Full name and age
$fullName = trim(($user->firstname ?? '') . ' ' . ($user->lastname ?? '')) ?: ($user->username ?? 'User');
$agePart = $user->age ? ', ' . $user->age : '';

// Address
$address = $user->address ?? '—';

// Roommate preferences
$prefs = $user->roommatePreference;

// Listing & Description (dynamic)
$listingType = $user->listing_type ?? 'Looking for a roommate';
$description = $user->description ?? 'No description provided.';
@endphp

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $fullName }} - Profile</title>
    @vite('resources/css/app.css')
</head>
<body>

<x-navbar />

<!-- Overlay background -->
<div class="fixed inset-0 z-4 bg-opacity-30 flex justify-center items-center px-4 py-10">

  <!-- Modal container -->
  <div class="bg-white rounded-xl max-w-6xl w-full shadow-xl relative overflow-hidden">

    <!-- Close button -->
    <div class="flex justify-end p-4">
        <a href="/dashboard">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </a>
    </div> 

    <!-- Main grid -->
    <div class="grid grid-cols-1 md:grid-cols-3">

      <!-- Left: User Image -->
      <div class="md:col-span-1">
          <img 
              src="{{ $avatar }}" 
              alt="Profile picture of {{ $fullName }}" 
              class="rounded-tr-3xl w-full h-full object-cover"
          >
      </div>

      <!-- Right: Content -->
      <div class="md:col-span-2 p-6 lg:p-10 grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left section (Profile & Description) -->
        <div class="lg:col-span-2 space-y-3">
          <h2 class="text-2xl font-bold">{{ $fullName }}{{ $agePart }}</h2>
          <p class="text-sm text-gray-500 flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" /></svg>
            {{ $address }}
          </p>

          <p class="text-blue-600 font-semibold text-sm">Listing Type:</p>
          <p>{{ $listingType }}</p>

          <p class="text-blue-600 font-semibold text-sm mt-2">Description:</p>
          <p class="text-sm text-gray-700 leading-relaxed">
            {{ $description }}
          </p>
        </div>

        <!-- Sidebar section -->
        <div class="space-y-4">

          <!-- Message -->
          <div class="bg-white rounded-lg p-4 shadow-sm">
            <p class="text-sm mb-2 text-gray-600">Message me through here!</p>
            <a href="/dashboard/social">
              <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Message
              </button>
            </a>
          </div>

          <!-- Verification -->
          <div class="bg-white border rounded-lg p-4 shadow-sm">
            <h4 class="font-semibold text-sm mb-2">Verification Status</h4>
            <p class="text-sm {{ $user->email_verified_at ? 'text-green-600' : 'text-red-600' }}">
                {{ $user->email_verified_at ? '✅ Email Verified' : '❌ Email Not Verified' }}
            </p>
            <p class="text-sm {{ $user->phone_verified ? 'text-green-600' : 'text-red-600' }}">
                {{ $user->phone_verified ? '✅ Phone Verified' : '❌ Phone Not Verified' }}
            </p>
          </div>

          <!-- Roommate Preference -->
          @if($prefs)
          <div class="bg-white border rounded-lg p-4 shadow-sm">
            <h4 class="font-semibold text-sm mb-2">Roommate Preference</h4>
            <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
              <li>Gender: {{ ucfirst($prefs->gender_preference ?? 'Any') }}</li>
              <li>Location: {{ $prefs->location ?? 'Any' }}</li>
              <li>Night Owl: {{ $prefs->night_owl ? 'Yes' : 'No' }}</li>
              <li>Pets: {{ $prefs->pets ? 'Yes' : 'No' }}</li>
              <li>Smoking: {{ $prefs->smoking ? 'Yes' : 'No' }}</li>
            </ul>
          </div>
          @endif

        </div>

      </div>
    </div>
  </div>
</div>

</body>
</html>
