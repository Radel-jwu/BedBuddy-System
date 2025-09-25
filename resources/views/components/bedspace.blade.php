@props(['listing'])

<div class="bg-white rounded-xl shadow-md overflow-hidden border w-96">
    <img src="{{ asset('images/' . ($listing->img ?? 'default.jpg')) }}" 
         alt="Bedspace" 
         class="w-full h-48 object-cover" />
    
    <div class="p-4 space-y-1">
        <h3 class="text-lg font-semibold text-gray-900">
            {{ $listing->property->property_name ?? 'Bedspace' }}
        </h3>
        <p class="text-sm text-gray-500">
            {{ $listing->property->street_address ?? '' }},
            {{ $listing->property->city ?? '' }}
        </p>

        <p class="text-sm text-gray-500">
            Rating:
            <span class="text-yellow-500 font-medium">
                ★ {{ $listing->rating ?? 'N/A' }}
            </span>
        </p>

        <p class="text-blue-600 font-semibold text-right text-sm">
            ₱{{ number_format($listing->price, 0) }}
            <span class="text-gray-400 font-normal">/month</span>
        </p>
    </div>

    <div class="px-4 pb-4">
        <a href="{{ route('dashboard.view', $listing->id) }}">
            <button class="w-full bg-blue-600 text-white font-medium py-2 rounded hover:bg-blue-700">
                View more
            </button>
        </a>
    </div>
</div>
