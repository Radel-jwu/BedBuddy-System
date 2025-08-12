<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body>
    <x-navbar>
    </x-navbar>

<!-- Overlay background -->
<div class="fixed inset-0 z-4 bg-opacity-30 flex justify-center items-center px-4 py-10">
  <!-- Modal container -->
  
  <div class="bg-white rounded-xl max-w-6xl w-full shadow-xl relative overflow-hidden">

    <!-- Close button -->
    <div class="flex justify-end">
          <a href="/dashboard">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
          </a>
      </div> 

    <!-- Main grid -->
    <div class="grid grid-cols- md:grid-cols-3">
      <!-- Left: Image -->
      <div class=" md:col-span-1">
        <div 
        x-data="{ images: ['{{ asset('images/pic1.jpg') }}', '{{ asset('images/pic2.jpg') }}', '{{ asset('images/pic4.jpg') }}'], current: 0 }"
        x-init="setInterval(() => current = (current + 1) % images.length, 3000)"
        class="w-full h-full"
        >
        <img 
            :src="images[current]" 
            alt="Profile" 
            class="rounded-tr-3xl w-full h-full object-cover transition duration-500"
        >
    </div>

      </div>

      <!-- Right: Content -->
      <div class="md:col-span-2 p-6 lg:p-10 grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Left section (Profile & Description) -->
        <div class="lg:col-span-2 space-y-3">
          <h2 class="text-2xl font-bold">Isabella Grace Santos, 22</h2>
          <p class="text-sm text-gray-500 flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" /></svg>
            Osmeña Boulevard | Cebu City
          </p>
          <p class="text-blue-600 font-semibold text-sm">Listing Type:</p>
          <p>Looking for a fellow roommate.</p>
          <p class="text-blue-600 font-semibold text-sm mt-2">Description:</p>
          <p class="text-sm text-gray-700 leading-relaxed">
            Hi there! My name is Isabella Grace Santos, and I’m a student looking for a friendly, compatible female roommate to share a bedspace with here in Cebu City...
          </p>
        </div>

        <!-- Sidebar section -->
        <div class="space-y-4">
          <!-- Message -->
          <div class="bg-white rounded-lg p-4 shadow-sm">
            <p class="text-sm mb-2 text-gray-600">Message me through here!</p>
            <a href = "/dashboard/social"><button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Message</button></a>
          </div>

          <!-- Verification -->
          <div class="bg-white border rounded-lg p-4 shadow-sm">
            <h4 class="font-semibold text-sm mb-2">Verification Status</h4>
            <p class="text-sm text-green-600">✅ Email Verified</p>
            <p class="text-sm text-green-600">✅ Phone Verified</p>
          </div>

          <!-- Roommate Preference -->
          <div class="bg-white border rounded-lg p-4 shadow-sm">
            <h4 class="font-semibold text-sm mb-2">Roommate Preference</h4>
            <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
              <li>Neat/Tidy</li>
              <li>Respectful</li>
              <li>Prefer less noise, sociable</li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
  
</div>

    
</body>
</html>