<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bed Buddy | Find your Match</title>
    @vite('resources/css/app.css')

</head>
<body class="bg-rose-50
 text-gray-800">

    <!-- Header -->
    <header class="flex justify-between items-center p-6 shadow-md">
        <h1 class="text-3xl font-bold text-blue-600">BedBuddy</h1>
        <div class="space-x-4">
            <a href="/login" class="px-4 py-2 border border-blue-500 text-blue-500 rounded hover:bg-blue-50">Login</a>
            <a href="/signup/role" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Signup</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="flex flex-col md:flex-row items-center justify-between px-6 md:px-16 py-20">
        <div class="max-w-xl text-center md:text-left">
           <h2 class="text-8xl md:text-6xl font-bold text-blue-600 mb-6">BedBuddy</h2>
        <p class="text-base md:text-xl text-gray-700">
            A Platform for Bedspace Rental Finder<br>with Roommate Matching
        </p>
        </div>
        <div class="mt-10 md:mt-0">
            <img src="{{ asset('images/room.PNG') }}" alt="Room Image" class="w-72 md:w-96 shadow-lg rounded-lg">
        </div>
    </section>
    <!-- Footer -->
   <!-- Footer -->
    <footer class="bg-black text-white px-6 md:px-16 py-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-1 text-sm mb-8">
            <!-- Left: Links -->
            <div class="flex flex-wrap gap-6">
                <p class="font-semibold">About Us</p>
                <p class="font-semibold">Discover</p>
                <p class="font-semibold">Explore</p>
                <p class="font-semibold">Book</p>
            </div>

            <!-- Right: Social Media -->
            <div class="space-x-4 flex items-center">
                <a href="#"><img src="{{ asset('icons/facebook.PNG') }}" class="w-[100%] h-auto" /></a>
                <a href="#"><img src="{{ asset('icons/ig.PNG') }}" class="w-[100%] h-auto" /></a>
                <a href="#"><img src="{{ asset('icons/x.PNG') }}" class="w-[100%] h-auto" /></a>
                <a href="#"><img src="{{ asset('icons/google.PNG') }}" class="w-[100%] h-auto" /></a>
                <a href="#"><img src="{{ asset('icons/linkedin.PNG') }}" class="w-[100%] h-auto" /></a>
            </div>

        </div>

        <!-- Bottom -->
        <div class="flex flex-col md:flex-row justify-between items-center text-xs border-t border-gray-700 pt-4 space-y-2 md:space-y-0">
            <p>© 2025 BedBuddy. All rights reserved.</p>
            <div class="space-x-4">
                <a href="#" class="hover:underline">Terms of Service</a>
                <a href="#" class="hover:underline">Privacy Policy</a>
            </div>
        </div>
    </footer>

</body>
</html>