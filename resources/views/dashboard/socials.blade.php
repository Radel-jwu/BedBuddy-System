<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Socials</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-white p-6 font-sans">
  <x-navbar></x-navbar>

  <div class="flex justify-center">
    <div class="w-full max-w-2xl">
      <!-- Title -->
      <h1 class="text-2xl font-semibold mb-4 mt-15"></h1>

      <!-- Header Buttons -->
      <div class="flex justify-center gap-4 mb-6">
        <button class="px-4 py-2 border border-blue-500 text-blue-500 rounded hover:bg-blue-50 transition">Create Post</button>
        <button class="px-4 py-2 border border-blue-500 text-blue-500 rounded hover:bg-blue-50 transition">Create Discussion</button>
        <button class="px-4 py-2 border border-blue-500 text-blue-500 rounded hover:bg-blue-50 transition">Messages</button>
      </div>

      <!-- Post Card -->
      <div class="bg-white border rounded-lg shadow-md">
        <!-- Images -->
        <div class="grid grid-cols-2 gap-1">
          <img src="{{ asset('images/pic2.jpg') }}" alt="Image 1" class="w-full h-48 object-cover rounded-tl-lg">
          <img src="{{ asset('images/pic5.jpg') }}" alt="Image 2" class="w-full h-48 object-cover rounded-tr-lg">
          <img src="{{ asset('images/pic4.jpg') }}" alt="Image 3" class="w-full h-48 object-cover col-span-2 rounded-b-lg">
        </div>

        <!-- Content -->
        <div class="p-4">
          <!-- User Info -->
          <div class="flex items-center justify-between mb-2">
            <div class="flex items-center space-x-2">
              <img src="https://via.placeholder.com/40" alt="Avatar" class="w-10 h-10 rounded-full">
              <div>
                <p class="font-semibold text-sm">Eleanor Vance</p>
                <p class="text-xs text-gray-500">30 mins ago</p>
              </div>
            </div>
            <button class="text-gray-500 hover:text-black">⋯</button>
          </div>

          <!-- Post Text -->
          <p class="text-sm mb-2">
            Settling into my Cebu City apartment and absolutely loving it! The space is perfect – comfortable, modern, and has all the amenities I need to feel right at home. Plus, the community here is so welcoming! Excited for all the adventures this new chapter holds. 😊
          </p>

          <!-- Hashtags -->
          <div class="text-blue-500 text-sm space-x-2 mb-2">
            <span>#apartmentlivingcebu</span>
            <span>#newhome</span>
            <span>#communityvibes</span>
          </div>

          <!-- Actions -->
          <div class="flex justify-between text-gray-600 text-sm mt-4 border-t pt-2">
            <button class="flex items-center gap-1 hover:text-blue-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M5 15l7-7 7 7" />
              </svg> Like
            </button>
            <button class="flex items-center gap-1 hover:text-blue-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M8 10h.01M12 10h.01M16 10h.01M21 10a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg> Comment
            </button>
            <button class="flex items-center gap-1 hover:text-blue-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 4v16l8-5 8 5V4z" />
              </svg> Share
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
