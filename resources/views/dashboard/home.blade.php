<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BedBuddy Dashboard</title>
  @vite('resources/css/app.css')

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body class="font-sans bg-gray-100">
  
  <x-navbar>
  </x-navbar>

  <!-- Main Hero Section -->
  <section class="relative h-screen w-full flex items-center justify-between pt-20 px-8 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c');">
    
    <!-- Map Container -->
    <div id="mapContainer" class="hidden w-1/2 h-full z-10 mr-4 rounded-xl overflow-hidden shadow-xl">
      <div id="map" class="w-full h-full rounded-xl z-10"></div>
    </div>

    <!-- Text Section -->
    <div id="textSection" class="text-white w-1/2 z-10">
      <h1 class="text-5xl font-bold leading-tight">
        Find your <span class="text-blue-500">Preferred<br>Roommate</span> and
        <span class="text-blue-500">Bedspace</span> in <span class="text-blue-500">Cebu City</span>
      </h1>
    </div>

    <!-- Search Box -->
    <div class="bg-white rounded-xl shadow-xl w-96 p-6 z-10">
      <h2 class="text-xl font-bold mb-4 text-gray-800">Search and Matchmaking</h2>
      <form class="space-y-4" onsubmit="return false;">
        <div>
          <label class="text-sm text-gray-700">Location</label>
          <input type="text" placeholder="Enter a location or area in Cebu City..." class="w-full p-2 mt-1 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <div>
          <label class="text-sm text-gray-700">Type of space</label>
          <select class="w-full p-2 mt-1 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <option>Type of space...</option>
            <option>Room</option>
            <option>Bedspace</option>
            <option>Studio</option>
          </select>
        </div>

        <div>
          <label class="text-sm text-gray-700">Budget range</label>
          <select class="w-full p-2 mt-1 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <option>Budget range...</option>
            <option>₱1,000 - ₱3,000</option>
            <option>₱3,000 - ₱5,000</option>
            <option>₱5,000+</option>
          </select>
        </div>

        <div class="flex items-center space-x-2">
          <input type="checkbox" id="enableMap" class="form-checkbox text-blue-600" onchange="toggleMap()" />
          <label for="enableMap" class="text-sm text-gray-600">Enable map</label>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded">
          Search
        </button>
      </form>
    </div>
  </section>

  <section class="bg-white px-8 py-16">
  <div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-semibold text-gray-900">Recommended</h2>
      <div class="space-x-2">
        <button class="px-4 py-1 rounded-full bg-blue-600 text-white font-medium">Apartments</button>
        <button class="px-4 py-1 rounded-full border border-gray-300 text-gray-700 hover:bg-blue-100">Condominiums</button>
        <button class="px-4 py-1 rounded-full border border-gray-300 text-gray-700 hover:bg-blue-100">Dormitories</button>
        <button class="px-2 py-1 rounded-full border border-gray-300 text-gray-700 hover:bg-blue-100">
          <span class="font-bold text-xl">→</span>
        </button>
      </div>
    </div>

    <!-- Grid of Listings -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <!-- Card (repeat this block for more listings) -->  
      <!--Listing 1-->
      <x-listing>
      </x-listing>
      <!--Listing 2-->
      <x-listing>
      </x-listing>
      <!--Listing 3-->
      <x-listing>
      </x-listing>
      <!--Listing 4-->
      <x-listing>
      </x-listing>
      <!--Listing 5-->
      <x-listing>
      </x-listing>
      <!--Listing 6-->
      <x-listing>
      </x-listing>

      
      <!-- End card -->
      
      <!-- Repeat the above card as needed (6 total) -->
      <!-- Copy/Paste 5 more identical blocks here with unique images/details if desired -->
    </div>

    <div class="text-right mt-6">
      <a href="#" class="text-blue-600 hover:underline font-medium">See more...</a>
    </div>
  </div>
</section>

<section class="bg-white px-8 py-16">
  <div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-semibold text-gray-900">Look For Roommates</h2>
      <div class="space-x-2">
        <button class="px-4 py-1 rounded-full bg-blue-600 text-white font-medium">Post a Preference</button>
      
      </div>
    </div>

    <!-- Grid of Listings -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 ">
      <!-- Card (repeat this block for more listings) -->
      <x-roommate>
      </x-roommate>

      <x-roommate>
      </x-roommate>
      
      <x-roommate>
      </x-roommate>
    
      <x-roommate>
      </x-roommate>

      <x-roommate>
      </x-roommate>

      <x-roommate>
      </x-roommate>
    
 
    </div>
      
      <!-- End card -->
      
      <!-- Repeat the above card as needed (6 total) -->
      <!-- Copy/Paste 5 more identical blocks here with unique images/details if desired -->
    </div>

    <div class="text-right mt-6">
      <a href="#" class="text-blue-600 hover:underline font-medium">See more...</a>
    </div>
  </div>
</section>

<!-- Recent Reviews Section -->
<section class="bg-white px-8 py-16">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Recent reviews</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <!-- Review Card -->
      <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex items-center space-x-4">
          <img src="{{ asset('images/pic1.jpg') }}" alt="Anneleob" class="w-10 h-10 rounded-full object-cover">
          <h3 class="font-semibold text-gray-900">Annelob Muñoz</h3>
        </div>
        <p class="text-gray-600 text-sm">“I felt safe using the platform because of the verification process for landlords.”</p>
        <div class="flex space-x-1 text-yellow-400">
          <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
        </div>
      </div>

      <!-- Review Card -->
      <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex items-center space-x-4">
          <img src="{{ asset('images/pic3.jpg') }}" alt="Ranidel" class="w-10 h-10 rounded-full object-cover">
          <h3 class="font-semibold text-gray-900">Ranidel Padoga</h3>
        </div>
        <p class="text-gray-600 text-sm">“I really liked how easy it was to filter rooms by location and budget. Saved me a lot of time!”</p>
        <div class="flex space-x-1 text-yellow-400">
          <span>★</span><span>★</span><span>★</span><span>★</span><span class="text-gray-300">★</span>
        </div>
      </div>

      <!-- Review Card -->
      <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div class="flex items-center space-x-4">
          <img src="{{ asset('images/pic4.jpg') }}" class="w-10 h-10 rounded-full object-cover">
          <h3 class="font-semibold text-gray-900">Chrisninfo Pagente</h3>
        </div>
        <p class="text-gray-600 text-sm">“The photos and virtual tours of the rooms were very helpful. It gave me a good sense of the space before I visited.”</p>
        <div class="flex space-x-1 text-yellow-400">
          <span>★</span><span>★</span><span>★</span><span>★</span><span class="text-gray-300">★</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action: List Property -->
   

<section class="bg-white px-8 py-16 w-full h-[300px] bg-[url('{{ asset('images/pic2.jpg') }}')] bg-cover bg-center bg-no-repeat rounded-lg shadow-lg">
  <div class="max-w-7xl mx-auto flex flex-col-reverse lg:flex-row items-center gap-10">
    <!-- Text content -->
    <div class="flex-1">
      <h2 class="text-3xl font-bold text-gray-900 mb-4">List your own property<br> as an owner!</h2>
      <a href="mailto:you@example.com" class="inline-block mt-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-5 rounded-full">
        Email us!
      </a>
    </div>

  </div>
</section>

<x-footer>
</x-footer>

  <script>
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
    function initMap() {
      if (mapInitialized) return;

      const cebuCity = [10.3157, 123.8854];
      const map = L.map('map').setView(cebuCity, 13);
      
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
      }).addTo(map);

      L.marker(cebuCity).addTo(map).bindPopup("Cebu City").openPopup();

      mapInitialized = true;
    }
  </script>
</body>
</html>
