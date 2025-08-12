<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BedBuddy | Socials</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Navbar (outside the flex container) -->
  <x-navbar></x-navbar>

  <!-- Main Chat Layout -->
  <main class="flex h-[calc(100vh-64px)] mt-20">
    
    <!-- Sidebar -->
    <div class="w-1/4 bg-white border-r overflow-y-auto">
      <div class="p-4 font-bold text-xl">Chats</div>
      <input
        type="text"
        placeholder="Search contacts..."
        class="mx-4 mb-4 px-3 py-2 w-[85%] border rounded-full text-sm"
      />
      <div>
        <!-- Contact Item -->
        <div class="px-4 py-2 hover:bg-gray-100 flex items-center justify-between">
          <div>
            <div class="font-medium">Anya Reyes</div>
            <div class="text-xs text-gray-500">Hi, how are you? An...</div>
          </div>
          <div class="text-xs text-gray-500">2:33 PM</div>
        </div>

        <div class="px-4 py-2 hover:bg-gray-100 flex items-center justify-between">
          <div>
            <div class="font-medium">Javier Cruz</div>
            <div class="text-xs text-gray-500">It’s been a long time...</div>
          </div>
          <div class="text-xs text-gray-500">10:42 PM</div>
        </div>

        <!-- Active Contact -->
        <div class="bg-blue-100 px-4 py-2 flex justify-between">
          <div>
            <div class="font-medium text-blue-700">Mr. Jose Reyes</div>
            <div class="text-xs text-blue-600">Oh, hey! Yeah, the ro...</div>
          </div>
          <div class="text-xs text-blue-700">8:12 PM</div>
        </div>

        <div class="px-4 py-2 hover:bg-gray-100 flex items-center justify-between">
          <div>
            <div class="font-medium">Leilani Santos</div>
            <div class="text-xs text-gray-500">Oh, hey! Yeah, the ro...</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Chat Box -->
    <div class="w-2/4 flex flex-col justify-between border-r bg-white">
      <!-- Header -->
      <div class="flex items-center px-4 py-3 border-b">
        <img src="{{ asset('images/pic1.jpg') }}" class="rounded-full w-10 h-10 mr-3" />
        <div>
          <div class="font-semibold">Mr. Jose Reyes</div>
          <div class="text-sm text-green-500">● Online</div>
        </div>
      </div>

      <!-- Messages Area -->
      <div class="flex-1 p-4 overflow-y-auto">
        <!-- No messages yet -->
      </div>

      <!-- Quick Actions -->
      <div class="flex space-x-2 px-4 pb-2">
        <button class="bg-blue-100 text-blue-700 px-4 py-1 rounded-full text-sm">I want to inquire...</button>
        <button class="bg-blue-100 text-blue-700 px-4 py-1 rounded-full text-sm">I want to book...</button>
      </div>

      <!-- Input -->
      <div class="flex items-center px-4 pb-4 space-x-2">
        <button class="text-blue-600 text-2xl">📷</button>
        <input type="text" placeholder="Write something..." class="flex-1 px-4 py-2 border rounded-full text-sm" />
        <button class="text-white bg-blue-500 px-4 py-2 rounded-full">➤</button>
      </div>
    </div>

    <!-- User Info Panel -->
    <div class="w-1/4 bg-white overflow-y-auto">
      <div class="flex justify-end p-4">
        <a href = "/dashboard/view"><button class="text-white bg-blue-500 px-4 py-1 rounded">Back</button></a>
      </div>
      <div class="flex flex-col items-center mt-4">
        <img src="{{ asset('images/pic1.jpg') }}" class="rounded-full w-20 h-20" />
        <div class="mt-2 font-bold">Mr. Jose Reyes</div>
        <div class="text-sm text-gray-500">Landlord</div>

        <div class="mt-6 space-y-2">
          <button class="border px-4 py-2 rounded w-40">Close conversation</button>
          <button class="border px-4 py-2 rounded w-40 text-red-500">Delete person</button>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
