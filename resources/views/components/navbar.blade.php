@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp

<!-- Navbar Layout -->
<header class="flex justify-between items-center bg-white px-8 py-4 shadow-md fixed top-0 w-full z-10">
    <!-- Logo -->
    <div class="text-2xl font-bold text-blue-600">BedBuddy</div>

    <!-- Navigation -->
    <nav class="space-x-8 hidden md:flex text-gray-800 font-medium relative">
        <a href="/dashboard" class="hover:text-blue-600">HOME</a>

        <!-- Billing Dropdown -->
        <div class="relative group" tabindex="0">
            <button class="hover:text-blue-600 flex items-center focus:outline-none">
                BILLING ▾
            </button>
            <div class="absolute opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition-all duration-300 bg-white shadow-lg rounded-md mt-2 w-40">
                <a href="/dashboard/billing" class="block px-4 py-2 hover:bg-blue-50">Billing</a>
                <a href="/dashboard/billing-history" class="block px-4 py-2 hover:bg-blue-50">Billing History</a>
            </div>
        </div>

        <a href="/dashboard/about-us" class="hover:text-blue-600">ABOUT US</a>
        <a href="/dashboard/socials" class="hover:text-blue-600">SOCIALS</a>
    </nav>

    <!-- Right Section -->
    <div class="flex items-center space-x-4">
           <!-- Notification Bell -->
        <div class="relative">
            <button class="text-gray-600 hover:text-blue-600 focus:outline-none">
                <!-- Heroicon Bell -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 
                        6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 
                        6 8.388 6 11v3.159c0 .538-.214 1.055-.595 
                        1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>
            <!-- Notification Badge -->
            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-1 py-0.5 text-xs font-bold leading-none text-white bg-red-600 rounded-full">3</span>
        </div>
         <!-- User Profile -->
        <div class="flex items-center space-x-2">
            
            <img src="{{ asset('storage/' . $user->profile_pic ?? 'images/default-avatar.jpg') }}" alt="Avatar" class="w-10 h-10 rounded-full border" />
            <span class="text-sm font-medium">{{ $user->username }}</span>
        </div>
        <!-- Settings Dropdown -->
        <div class="relative group" tabindex="0">
            <button class="flex items-center text-gray-600 hover:text-blue-600 focus:outline-none">
                <!-- Heroicon Cog -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.049 2.927c.3-1.14 1.603-1.14 
                        1.902 0a1.724 1.724 0 002.573 1.021 1.724 
                        1.724 0 012.165.416 1.724 1.724 0 011.021 
                        2.573c.3 1.14-.75 2.275-1.902 
                        1.902a1.724 1.724 0 00-1.021 2.573 1.724 
                        1.724 0 01-.416 2.165 1.724 1.724 0 01-2.573 
                        1.021c-1.14.3-2.275-.75-1.902-1.902a1.724 
                        1.724 0 00-2.573-1.021 1.724 1.724 0 
                        01-2.165-.416 1.724 1.724 0 01-1.021-2.573c-.3-1.14.75-2.275 
                        1.902-1.902a1.724 1.724 0 002.573-1.021c.3-1.14 
                        1.435-2.275 2.573-1.902z" />
                </svg>
            </button>
            <!-- Dropdown Menu -->
            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition-all duration-300">
                <a href="/dashboard/profile-settings" class="block px-4 py-2 hover:bg-blue-50">Profile Settings</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left block px-4 py-2 hover:bg-blue-50">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
