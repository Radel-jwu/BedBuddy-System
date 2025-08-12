<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Zenith Residences</title>
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
  <div class="fixed inset-0 z-4 bg-opacity-30 flex justify-center items-center px-4 py-10">
    <div class="bg-white rounded-xl max-w-6xl w-full shadow-xl relative overflow-hidden max-h-screen overflow-y-auto">
      
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
        
        <!-- Left: Image -->
        <div class="md:col-span-1">
          <div 
            x-data="{
              images: ['{{ asset('images/pic2.jpg') }}', '{{ asset('images/pic5.jpg') }}', '{{ asset('images/pic4.jpg') }}'],
              current: 0,
              showFull: false
            }"
            x-init="setInterval(() => current = (current + 1) % images.length, 5000)"
            class="w-full h-full relative"
          >
            <!-- Main image -->
            <img 
              :src="images[current]" 
              alt="Profile" 
              @click="showFull = true"
              class="rounded-tr-3xl w-full h-full object-cover cursor-pointer transition duration-500"
            >

            <!-- Fullscreen Modal -->
            <div 
              x-show="showFull"
              x-transition
              @click.away="showFull = false"
              class="fixed inset-0 z-50 bg-black bg-opacity-90 flex items-center justify-center"
            >
              <div class="relative p-4 w-full flex justify-center">
                <img 
                  :src="images[current]" 
                  class="w-[40%] h-auto rounded-lg shadow-lg transition-all duration-300"
                />
                <button 
                  @click="showFull = false"
                  class="absolute top-4 right-4 text-white text-3xl font-bold"
                >&times;</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Right: Content -->
        <div class="md:col-span-2 p-6 grid grid-cols-1 lg:grid-cols-3 gap-6 overflow-y-auto max-h-[80vh]">
          
          <!-- Left section (Details) -->
          <div class="lg:col-span-2 space-y-3">
            <h2 class="text-2xl font-bold">The Zenith Residences</h2>
            <p class="text-sm text-gray-500 flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
              </svg>
              V. Rama Avenue | Cebu City
            </p>

            <p class="text-blue-600 font-semibold text-sm">Highlights</p>
            <p>2 bedrooms, 2 bathrooms, Airconditioned, Internet Connection, 3rd Floor</p>

            <p class="text-blue-600 font-semibold text-sm mt-2">Roommate:</p>
            <p class="text-sm text-gray-700 leading-relaxed">1 Roommate</p>

            <p class="text-blue-600 font-semibold text-sm mt-2">Description:</p>
            <p class="text-sm text-gray-700 leading-relaxed">
              The Zenith Residences offers modern and comfortable living in the heart of Cebu City. This newly developed residence provides a stylish urban lifestyle with all the essential amenities for convenient city living.
            </p>

            <p class="text-blue-600 font-semibold text-sm mt-2">Amenities:</p>
            <ul class="text-sm text-gray-700 leading-relaxed space-y-2 mt-1">
              <li class="flex items-center gap-2">
                <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.75 17L7.5 21m6.75-4l2.25 4M6.75 3a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm10.5 0a1.5 1.5 0 100 3 1.5 1.5 0 000-3zM4.5 10.5a7.5 7.5 0 0115 0v4.5a1.5 1.5 0 01-1.5 1.5H6a1.5 1.5 0 01-1.5-1.5v-4.5z"/>
                </svg>
                Laundry
              </li>
              <li class="flex items-center gap-2">
                <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M4.5 5.25l15 13.5"/>
                </svg>
                Swimming Pool
              </li>
              <li class="flex items-center gap-2">
                <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 01-8 0M4 8h16M4 12h16M4 16h16"/>
                </svg>
                Internet Connection
              </li>
            </ul>

            <!-- Ratings & Reviews -->
            <div class="mt-6">
              <h3 class="text-lg font-semibold text-blue-600 mb-2">Ratings & Reviews</h3>
              <div class="bg-white border rounded-lg p-4 shadow-sm w-full max-w-md">
                <div class="flex items-center space-x-4">
                  <div class="text-4xl font-bold text-yellow-500">4.5</div>
                  <div class="text-sm text-gray-600">Out of 5</div>
                </div>
                <div class="mt-4 space-y-2">
                  <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600 w-4">5</span>
                    <div class="bg-gray-200 w-full h-3 rounded">
                      <div class="bg-yellow-400 h-3 rounded" style="width: 100%"></div>
                    </div>
                  </div>
                  <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600 w-4">4</span>
                    <div class="bg-gray-200 w-full h-3 rounded">
                      <div class="bg-yellow-400 h-3 rounded" style="width: 80%"></div>
                    </div>
                  </div>
                  <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600 w-4">3</span>
                    <div class="bg-gray-200 w-full h-3 rounded">
                      <div class="bg-yellow-400 h-3 rounded" style="width: 40%"></div>
                    </div>
                  </div>
                  <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600 w-4">2</span>
                    <div class="bg-gray-200 w-full h-3 rounded">
                      <div class="bg-yellow-400 h-3 rounded" style="width: 20%"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Right Sidebar -->
          <div class="space-y-4">
            <div class="bg-white rounded-lg p-4 shadow-sm">
              <p class="text-blue-600 font-semibold text-xl mt-2">Price starts at:</p>
              <p class="text-sm mb-2 text-gray-600">₱ 21,317/month</p>
              <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Book now</button>
            </div>

            <div class="bg-white border text-blue-600 rounded-lg p-4 shadow-sm">
              <h4 class="font-semibold text-sm mb-2">Subscription Status</h4>
              <p class="text-sm text-green-600">✅ Verified</p>
            </div>

            <div class="bg-white rounded-lg p-4 shadow-sm text-center">
              <img src="{{ asset('images/pic4.jpg') }}" alt="Listing" class="w-24 h-24 object-cover rounded-full mx-auto mb-2" />
              <h4 class="font-semibold text-sm mb-2">Mr. Jose Reyes</h4>
              <p class="text-sm text-gray-600 mb-3">Want more details about this property? Ask a question to the landlord.</p>
              
              <a href = "/dashboard/social"><button class="w-full bg-white border hover:bg-blue-700 hover:text-white text-blue-600 font-semibold py-2 px-4 rounded">Message Me</button></a>
            </div>

            <h2 class="text-2xl font-semibold mb-4">Comments</h2>
             <x-comment>
             </x-comment>
        
            
          </div>

        </div>
      </div>
    </div>
  </div>
</body>
</html>
