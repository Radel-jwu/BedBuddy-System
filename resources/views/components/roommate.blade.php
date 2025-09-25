@props(['user'])

@php
    use Illuminate\Support\Str;
    $avatar = $user->profile_pic
        ? asset('images/' . $user-> )
        : asset('images/default-user.jpg');
    $fullName = trim(($user->firstname ?? '') . ' ' . ($user->lastname ?? '')) ?: ($user->username ?? 'User');
    $agePart = $user->age ? ', ' . $user->age : '';
    $address = $user->address ?? '—';
    $bio = $user->bio ?? '';
    $prefs = $user->roommatePreference; // ✅ relationship
@endphp

<div class="bg-white rounded-xl shadow-md overflow-hidden border w-96">
    <img src="{{ $avatar }}" alt="Profile picture of {{ $fullName }}" class="w-full h-48 object-cover" />
    <div class="p-4 space-y-1">
        <h3 class="text-lg font-semibold text-gray-900">{{ $fullName }}{{ $agePart }}</h3>
        <p class="text-sm text-gray-500">{{ $address }}</p>
        <p class="text-sm text-gray-500">{{ Str::limit($bio, 90, '...') }}</p>

        {{-- ✅ Show roommate preferences safely --}}
        @if ($prefs)
            <div class="mt-2 text-sm text-gray-700">
                <p>Looking for: {{ ucfirst($prefs->gender_preference ?? 'Any') }}</p>
                <p>Location: {{ $prefs->location ?? 'Any' }}</p>
                <p>Night Owl: {{ $prefs->night_owl ? 'Yes' : 'No' }}</p>
                <p>Pets: {{ $prefs->pets ? 'Yes' : 'No' }}</p>
                <p>Smoking: {{ $prefs->smoking ? 'Yes' : 'No' }}</p>
            </div>
        @endif
    </div>
    <div class="px-4 pb-4">
        <a href="{{ route('roommate.show', $user->id) }}">
            <button class="w-full bg-blue-600 text-white font-medium py-2 rounded hover:bg-blue-700">
                View more
            </button>
        </a>
    </div>
</div>
