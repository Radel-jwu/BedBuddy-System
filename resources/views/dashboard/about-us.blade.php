<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar></x-navbar>

    <!-- About Us Section -->
    <section class="bg-white py-12 mt-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-16 flex flex-col-reverse md:flex-row items-center gap-8">
            
            <!-- Text Content -->
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h2 class="text-3xl sm:text-4xl font-bold text-blue-600 mb-4">About Us</h2>
                <p class="text-gray-700 leading-relaxed mb-6 text-sm sm:text-base">
                    BedBuddy is a Cebu City-based platform designed to simplify the process of finding affordable and convenient shared living spaces. 
                    We know that navigating the rental market can be challenging, especially when you're new to the city or on a budget. 
                    <br><br>
                    Our user-friendly platform allows you to easily search for rooms and roommates, compare prices, and connect with potential matches. 
                    We're committed to making your transition to Cebu City as smooth and stress-free as possible.
                </p>
                
                <!-- Social Icons -->
                <div class="flex justify-center md:justify-start space-x-4 text-xl text-gray-700">
                    <a href="#" class="hover:text-blue-600"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="hover:text-pink-500"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-black"><i class="fab fa-x-twitter"></i></a>
                    <a href="#" class="hover:text-red-500"><i class="fab fa-google"></i></a>
                    <a href="#" class="hover:text-blue-700"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            <!-- Image -->
            <div class="w-full md:w-1/2 flex justify-center">
                <img src="{{ asset('images/pic7.PNG') }}" alt="Team Illustration" class="w-full max-w-xs sm:max-w-sm md:max-w-md rounded-lg shadow-lg">
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
            
            <!-- Mission and Vision Heading -->
            <h2 class="text-3xl sm:text-4xl font-bold text-blue-600 mb-8">Mission and Vision</h2>
            
            <!-- Mission & Vision -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <!-- Mission -->
                <div class="bg-white p-6 sm:p-8 rounded-xl shadow-md hover:shadow-lg transition">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 flex items-center justify-center border-4 border-blue-400 rounded-full">
                            <i class="fas fa-bullseye text-blue-500 text-2xl sm:text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4">Mission</h3>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        To develop and provide a user-friendly platform that connects individuals in Cebu City with compatible roommates and affordable shared living spaces, fostering a sense of community and simplifying the housing search process for students and residents.
                    </p>
                </div>

                <!-- Vision -->
                <div class="bg-white p-6 sm:p-8 rounded-xl shadow-md hover:shadow-lg transition">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 flex items-center justify-center border-4 border-blue-400 rounded-full">
                            <i class="fas fa-eye text-blue-500 text-2xl sm:text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4">Vision</h3>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        To become a leading student-developed platform in Cebu City, recognized for its innovative approach to shared living, empowering individuals to find their ideal homes and build meaningful connections within the community.
                    </p>
                </div>
            </div>

            <!-- Meet the Team -->
            <h2 class="text-3xl sm:text-4xl font-bold text-blue-600 mb-8">Meet the Team</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Team Member -->
                <div class="text-center">
                    <img src="{{ asset('images/pic5.jpg') }}" class="w-28 h-28 sm:w-32 sm:h-32 mx-auto rounded-full shadow-md object-cover" alt="Danielle">
                    <h3 class="mt-4 text-base sm:text-lg font-semibold text-gray-800">Danielle Isaac LocayLocay</h3>
                    <p class="text-gray-500 text-xs sm:text-sm">Project Manager</p>
                    <div class="flex justify-center space-x-3 mt-3 text-lg text-gray-600">
                        <i class="fab fa-facebook hover:text-blue-600"></i>
                        <i class="fab fa-google hover:text-red-500"></i>
                    </div>
                </div>

                <!-- Team Member -->
                <div class="text-center">
                    <img src="{{ asset('images/pic1.jpg') }}" class="w-28 h-28 sm:w-32 sm:h-32 mx-auto rounded-full shadow-md object-cover" alt="Annelob">
                    <h3 class="mt-4 text-base sm:text-lg font-semibold text-gray-800">Annelob Munoz</h3>
                    <p class="text-gray-500 text-xs sm:text-sm">UI/UX Designer</p>
                    <div class="flex justify-center space-x-3 mt-3 text-lg text-gray-600">
                        <i class="fab fa-facebook hover:text-blue-600"></i>
                        <i class="fab fa-google hover:text-red-500"></i>
                    </div>
                </div>

                <!-- Team Member -->
                <div class="text-center">
                    <img src="{{ asset('images/pic3.jpg') }}" class="w-28 h-28 sm:w-32 sm:h-32 mx-auto rounded-full shadow-md object-cover" alt="Rainiel">
                    <h3 class="mt-4 text-base sm:text-lg font-semibold text-gray-800">Ranidel Padoga</h3>
                    <p class="text-gray-500 text-xs sm:text-sm">Database Designer</p>
                    <div class="flex justify-center space-x-3 mt-3 text-lg text-gray-600">
                        <i class="fab fa-facebook hover:text-blue-600"></i>
                        <i class="fab fa-google hover:text-red-500"></i>
                    </div>
                </div>

                <!-- Team Member -->
                <div class="text-center">
                    <img src="{{ asset('images/pic4.jpg') }}" class="w-28 h-28 sm:w-32 sm:h-32 mx-auto rounded-full shadow-md object-cover" alt="Chris">
                    <h3 class="mt-4 text-base sm:text-lg font-semibold text-gray-800">Chris Niño Pagente</h3>
                    <p class="text-gray-500 text-xs sm:text-sm">Developer</p>
                    <div class="flex justify-center space-x-3 mt-3 text-lg text-gray-600">
                        <i class="fab fa-facebook hover:text-blue-600"></i>
                        <i class="fab fa-google hover:text-red-500"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
