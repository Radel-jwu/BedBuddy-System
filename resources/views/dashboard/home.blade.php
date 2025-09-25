<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BedBuddy Dashboard</title>
  @vite('resources/css/app.css')

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body class="font-sans bg-gray-100">

<x-navbar></x-navbar>

<!-- Hero Section -->
<section class="relative h-screen w-full flex items-center justify-between pt-20 px-8 bg-cover bg-center"
         style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c');">

  <div id="mapContainer"
       class="hidden w-1/2 h-full z-10 mr-4 rounded-xl overflow-hidden shadow-xl">
    <div id="map" class="w-full h-full rounded-xl z-10"></div>
  </div>

  <div id="textSection" class="text-white w-1/2 z-10">
    <h1 class="text-5xl font-bold leading-tight">
      Find your <span class="text-blue-500">Preferred<br>Roommate</span> and
      <span class="text-blue-500">Bedspace</span> in <span class="text-blue-500">Cebu City</span>
    </h1>
  </div>

  <!-- Search Box -->
  <div class="bg-white rounded-xl shadow-xl w-96 p-6 z-10">
    <h2 class="text-xl font-bold mb-4 text-gray-800">Search and Matchmaking</h2>
    <form id="searchForm" class="space-y-4">
      <div>
        <label class="text-sm text-gray-700">Location</label>
        <input id="locationInput" type="text" placeholder="Enter a location or area in Cebu City..."
               class="w-full p-2 mt-1 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" />
      </div>

      <div>
        <label class="text-sm text-gray-700">Type of space</label>
        <select id="typeSelect"
                class="w-full p-2 mt-1 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
          <option value="">Type of space...</option>
          <option value="Room">Room</option>
          <option value="Bedspace">Bedspace</option>
          <option value="Studio">Studio</option>
        </select>
      </div>

      <div>
        <label class="text-sm text-gray-700">Budget range</label>
        <select id="budgetSelect"
                class="w-full p-2 mt-1 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
          <option value="">Budget range...</option>
          <option value="3000">₱1,000 - ₱3,000</option>
          <option value="5000">₱3,000 - ₱5,000</option>
          <option value="999999">₱5,000+</option>
        </select>
      </div>

      <div class="flex items-center space-x-2">
        <input type="checkbox" id="enableMap" class="form-checkbox text-blue-600" onchange="toggleMap()" />
        <label for="enableMap" class="text-sm text-gray-600">Enable map</label>
      </div>

      <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded">
        Search
      </button>
    </form>
  </div>
</section>

<!-- Searched Bedspaces Section -->
<section id="searchedBedspacesSection" class="bg-white px-8 py-16 hidden">
  <div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-semibold text-gray-900">Search Results</h2>
    </div>

    <div id="searchedBedspaces" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <!-- JS will insert search results here -->
    </div>
  </div>
</section>

<!-- Latest Bedspaces Section -->
<section class="bg-white px-8 py-16">
  <div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-semibold text-gray-900">Latest Bedspaces</h2>
    </div>

    <!-- Listings Grid -->
    <div id="latestListings" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($listings as $listing)
            <x-bedspace :listing="$listing" />
        @empty
            <div class="col-span-full text-center text-gray-500">
                No bedspaces available at the moment.
            </div>
        @endforelse
    </div>
    <div class="mt-6">
        {{ $listings->links() }}
    </div>
</div>
</section>

<!-- Recommended Roommates -->
<section class="bg-white px-8 py-16">
  <div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-semibold text-gray-900">Recommended Roommate</h2>
      <div class="space-x-2">
        <a href="roommate-preference">
          <button class="px-4 py-1 rounded-full bg-blue-600 text-white font-medium">Find now your Roommate</button>
        </a>
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @forelse($matches as $match)
          <x-roommate :user="$match" />
      @empty
          <div class="col-span-full text-center text-gray-500">
              No matches yet. Try updating your roommate preferences.
          </div>
      @endforelse
    </div>
  </div>
</section>

<x-footer></x-footer>

<!-- Scripts -->
<script>
document.getElementById("searchForm").addEventListener("submit", async function(e) {
    e.preventDefault();

    const location = document.getElementById("locationInput").value;
    const type = document.getElementById("typeSelect").value;
    const budget = document.getElementById("budgetSelect").value;

    try {
        const response = await fetch(`/properties/search?location=${encodeURIComponent(location)}&type=${encodeURIComponent(type)}&budget=${encodeURIComponent(budget)}`, {
            headers: { "X-Requested-With": "XMLHttpRequest" }
        });

        const data = await response.json();

        const resultsSection = document.getElementById("searchedBedspacesSection");
        const resultsContainer = document.getElementById("searchedBedspaces");

        // Show the section
        resultsSection.classList.remove("hidden");

        // Insert the HTML returned by the server
        resultsContainer.innerHTML = data.html || "<div class='col-span-full text-center text-gray-500'>No results found.</div>";

        resultsSection.scrollIntoView({ behavior: "smooth", block: "start" });
        console.log("Search results updated");
    } catch (err) {
        console.error("Search failed:", err);
    }
});

function toggleMap() {
  const mapContainer = document.getElementById("mapContainer");
  const textSection = document.getElementById("textSection");
  const checkbox = document.getElementById("enableMap");

  if (checkbox.checked) {
    mapContainer.classList.remove("hidden");
    textSection.classList.add("hidden");
    initMap();
  } else {
    mapContainer.classList.add("hidden");
    textSection.classList.remove("hidden");
  }
}

let mapInitialized = false;
async function initMap() {
  if (mapInitialized) return;

  const cebuCity = [10.3157, 123.8854];
  const map = L.map("map").setView(cebuCity, 13);

  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
  }).addTo(map);

  try {
    const response = await fetch("/properties/map");
    const properties = await response.json();

    properties.forEach(prop => {
      if (prop.lat && prop.lng) {
        const marker = L.marker([prop.lat, prop.lng]).addTo(map);
        const priceFormatted = prop.price ? `₱${Number(prop.price).toLocaleString()}/month` : 'Price N/A';
        marker.bindPopup(`
          <b>${prop.property_name}</b><br>
          ${prop.street_address}, ${prop.city}<br>
          <span class="font-semibold text-blue-600">${priceFormatted}</span>
        `);

        marker.on("click", () => {
          document.getElementById("locationInput").value = `${prop.street_address}, ${prop.city}`;
          document.getElementById("typeSelect").value = prop.type || "Bedspace";

          if (prop.price <= 3000) document.getElementById("budgetSelect").value = "3000";
          else if (prop.price <= 5000) document.getElementById("budgetSelect").value = "5000";
          else document.getElementById("budgetSelect").value = "999999";
        });
      }
    });
  } catch (err) {
    console.error("Failed to load properties:", err);
  }

  mapInitialized = true;
}
</script>

</body>
</html>
