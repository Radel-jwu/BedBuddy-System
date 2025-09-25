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
      <h1 class="text-4xl font-medium w-100 text-center p-4">Register</h1>
      <form action="{{ route('signup.store') }}" method="POST">

        @csrf
        <div class="w-100 flex flex-col">
           <label for="username" class="py-2">Username</label>
           <input type="text"  name="username" placeholder="Email or phone number" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-600 p-3">
        </div>
        <div class="w-100 flex flex-col">
           <label for="username" class="py-2">Phone Number</label>
           <input type="text" name="phone" placeholder="Enter your phone number" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-600 p-3">
        </div>
        <div class="w-100 flex flex-col">
           <label for="username" class="py-2">Email Address</label>
           <input type="text" name="email" placeholder="Enter your email address" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-600 p-3">
        </div>
      
        <div class="w-100 flex flex-col">
           <label for="username" class="py-2">Address</label>
           <input type="text" name="address" placeholder="Enter your address" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-600 p-3">
        </div>
        <div class="w-100 flex flex-col">
           <label for="password" class="block ...">Password</label>
            <input
              id="password"
              name="password"
              type="password"
              placeholder="******************"
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            />
        </div>
        <div class="w-100 flex flex-col">
           <label for="password_confirmation" class="block ...">Confirm Password</label>
            <input
              id="password_confirmation"
              name="password_confirmation"
              type="password"
              placeholder="******************"
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            />
        </div>
        <div class="w-100 mx-auto my-2 text-center">
        <button id="proceedBtn" class="w-100 text-xl bg-blue-600 rounded-lg p-3 font-bold text-white">Register</button>
      </div>
      </form>
  </div>
</div>

<script>
  
</script>