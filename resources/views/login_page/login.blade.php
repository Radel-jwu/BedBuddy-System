@vite('resources/css/app.css')

<div class="max-h-screen max-w-screen flex">
  <div class="w-1/2">
      <x-landing_page />
  </div>

  <div class="w-1/2 flex items-center justify-center">
    <div class="w-100 h-screen py-2">
     <div class="flex justify-end">
          <a href="/">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
          </a>
      </div> 

      <h1 class="text-4xl font-medium w-100 text-center p-4">Login</h1>
    <form method="POST" action="{{ route('login') }}">
      @csrf
        <div class="w-100 flex flex-col py-5">
           <label for="username" class="py-2">Email</label>
           <input type="text"  name="username" placeholder="Email or phone number" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-600 p-3">
        </div>

        <div>
        <label for="password" class="block mb-1 text-gray-700 font-medium">Password</label>
        <div class="relative py-5">
          <input type="password" id="password" name="password" placeholder="Enter your password"
            class="w-full px-4 py-2 rounded bg-gray-200 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10" />
          <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer">
          </span>
        </div>
      </div>
      @if ($errors->any())
        <div class="mb-4">
            @foreach ($errors->all() as $error)
                <h1 class="text-red-600 font-bold text-lg text-center">{{ $error }}</h1>
            @endforeach
        </div>
    @endif
      <!-- Remember & Forgot Password -->
      <div class="flex items-center justify-between text-sm mt-1 py-5">
        <label class="flex items-center space-x-2">
          <input type="checkbox" name = "remember" class="form-checkbox rounded text-blue-600" />
          <span class="text-gray-600">Remember me</span>
        </label>
        <a href="#" class="text-blue-600 hover:underline">Forget password?</a>
      </div>

        <div class="w-100 mx-auto my-2 text-center">
        <button  type = "submit" id="proceedBtn" class="w-100 text-xl bg-blue-600 rounded-lg p-3 font-bold text-white">Login</button>
        </div>
    </form>

           <!-- Register Link -->
      <p class="text-center text-sm text-gray-600 mt-4">
        Don’t have an account?
        <a href="signup/role" class="text-blue-600 font-medium hover:underline">Register here</a>
      </p>

      <!-- Footer -->
    <footer class="mt-10 text-1xl text-center text-gray-500 py-20">
      © 2025 BedSpace. All rights reserved.
    </footer>
      
    </div>
  </div>
</div>

