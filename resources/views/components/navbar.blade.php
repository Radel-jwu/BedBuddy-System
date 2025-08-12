<!-- Navbar Layout -->
<header class="flex justify-between items-center bg-white px-8 py-4 shadow-md fixed top-0 w-full z-10">
    <div class="text-2xl font-bold text-blue-600">BedBuddy</div>
    <nav class="space-x-8 hidden md:flex text-gray-800 font-medium relative">
        <a href="/dashboard" class="hover:text-blue-600">HOME</a>

        <!-- Billing Dropdown -->
        <div class="relative group" tabindex="0">
            <button class="hover:text-blue-600 flex items-center focus:outline-none">
                BILLING ▾
            </button>
            <!-- Dropdown Menu -->
            <div class="absolute opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition-all duration-300 bg-white shadow-lg rounded-md mt-2 w-40">
                <a href="/dashboard/billing" class="block px-4 py-2 hover:bg-blue-50">Billing</a>
                <a href="/dashboard/billing-history" class="block px-4 py-2 hover:bg-blue-50">Billing History</a>
            </div>
        </div>

        <a href="/dashboard/about-us" class="hover:text-blue-600">ABOUT US</a>
        <a href="/dashboard/socials" class="hover:text-blue-600">SOCIALS</a>
    </nav>

    <!-- User Profile -->
    <div class="flex items-center space-x-2">
        <img src="{{ asset('images/pic3.jpg') }}" alt="Avatar" class="w-10 h-10 rounded-full border" />
        <span class="text-sm font-medium">Ranidel</span>
    </div>
</header>
