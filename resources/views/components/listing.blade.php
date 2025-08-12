<div class="bg-white rounded-xl shadow-md overflow-hidden border w-96	">
        <img src="{{ asset('images/pic2.jpg') }}" alt="Listing" class="w-full h-48 object-cover" />
        <div class="p-4 space-y-1">
          <h3 class="text-lg font-semibold text-gray-900">The Zenith Residences</h3>
          <p class="text-sm text-gray-500">V. Rama Avenue | Cebu City</p>
          <p class="text-sm text-gray-500">
            Availability: <span class="text-green-600 font-medium">Available</span>
          </p>
          <p class="text-blue-600 font-semibold text-right text-sm">₱21,317<span class="text-gray-400 font-normal">/month</span></p>
        </div>
        <div class="px-4 pb-4">
          <a href="{{ route('dashboard.listing') }}">
            <button class="w-full bg-blue-600 text-white font-medium py-2 rounded hover:bg-blue-700">
            View more
            </button>
          </a>
        </div>
</div>