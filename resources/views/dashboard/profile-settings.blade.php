<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Settings</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
  <x-navbar></x-navbar>

  <div class="bg-white rounded-5xl shadow-xl w-full max-w-5xl p-8 relative">
    <!-- Close button -->
    <a href = "/dashboard"><button class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">✕</button></a>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="flex flex-col md:flex-row gap-10">
      @csrf

      <!-- Left Profile Info -->
      <div class="flex flex-col items-center md:items-start md:w-1/3 text-center md:text-left space-y-4">
        <div class="relative w-32 h-32">
          <img id="profilePreview" 
               src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : 'https://via.placeholder.com/150' }}" 
               alt="Profile Picture"
               class="w-32 h-32 rounded-full object-cover border shadow">
          <!-- Upload button -->
          <label for="profilePic" 
                 class="absolute bottom-0 right-0 bg-blue-600 text-white p-2 rounded-full cursor-pointer hover:bg-blue-700 shadow">
            ⬆
          </label>
          <input type="file" id="profilePic" name="profilePic" accept="image/*" 
                 class="hidden" onchange="previewProfile(event)">
        </div>
        <h2 class="text-2xl font-bold">{{ $user->username }}</h2>
        <p class="text-gray-500 text-sm">{{ $user->email }}<</p>
      </div>

      <!-- Right Form -->
      <div class="md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Username -->
        <div class="flex flex-col">
          <label class="block text-sm font-medium text-gray-700">Username</label>
          <input type="text" name="username" 
                 value="{{ $user->username }}" 
                 class="w-full mt-1 p-3 border rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Password -->
        <div class="flex flex-col">
          <label class="block text-sm font-medium text-gray-700">Password</label>
          <div class="relative mt-1">
            <input type="password" name="password" id="password" 
                    placeholder = "Enter new Password" 
                   class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <span onclick="togglePassword('password', this)" 
                  class="absolute right-3 top-3 text-gray-500 cursor-pointer select-none">👁</span>
          </div>
        </div>

        <!-- Email -->
        <div class="flex flex-col">
          <label class="block text-sm font-medium text-gray-700">Email Address</label>
          <input type="email" name="email" 
                 value="{{ $user->email }}" 
                 class="w-full mt-1 p-3 border rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Confirm Password -->
        <div class="flex flex-col">
          <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
          <div class="relative mt-1">
            <input type="password" id="confirmPassword" name="password_confirmation"
                    placeholder = "Enter new Password" 
                   class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <span onclick="togglePassword('confirmPassword', this)" 
                  class="absolute right-3 top-3 text-gray-500 cursor-pointer select-none">👁</span>
          </div>
        </div>

        <!-- Phone -->
        <div class="flex flex-col">
          <label class="block text-sm font-medium text-gray-700">Phone number</label>
          <input type="text" name="phone" 
                 value="{{ $user->phone }}" 
                 class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Address -->
        <div class="flex flex-col">
          <label class="block text-sm font-medium text-gray-700">Address</label>
          <input type="text" name="address" 
                 value="{{ $user->address }}" 
                 class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
      </div>
      <!-- Action Buttons -->
      <div class="md:absolute bottom-1 right-1 flex justify-end gap-4">
        <a href="{{ url()->previous() }}" 
           class="px-6 py-2 border border-blue-500 text-blue-500 rounded-lg hover:bg-blue-50">
          Cancel
        </a>
        <button type="submit" 
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow">
          Save changes
        </button>
      </div>
    </form>
  </div>

  <!-- JS -->
  <script>
    function togglePassword(inputId, eyeIcon) {
      const input = document.getElementById(inputId);
      if (input.type === "password") {
        input.type = "text";
        eyeIcon.textContent = "🙈";
      } else {
        input.type = "password";
        eyeIcon.textContent = "👁";
      }
    }

    function previewProfile(event) {
      const reader = new FileReader();
      reader.onload = function(){
        const output = document.getElementById('profilePreview');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
</body>
</html>
