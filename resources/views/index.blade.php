<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Investment Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>

 
    

    </style>
</head>

<body class="m-0 p-0 h-[680px] font-sans">



    <nav class="bg-black shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="text-2xl font-bold text-white">
                        <!-- Replace with your logo image or text -->
                         <img src="assets\images\final logo.jpg" alt="Logo" class="h-8 w-auto">
                    </a>
                </div>
                <!-- Toggle button (hidden on larger screens) -->
                <div class="-mr-2 flex md:hidden">
                    <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-white text-xl hover:text-yellow-400 px-3 py-2 rounded-md text-sm font-medium">
                        Donation
                    </a>
                    <div class="auth-option mt-2">
                        <a href="{{route('loginForm')}}" class="text-white text-xl hover:text-yellow-400 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                    </div>
                    <div class="auth-option mt-2">
                        <a href="{{route('signupForm')}}" class="text-white text-xl hover:text-yellow-400 px-3 py-2 rounded-md text-sm font-medium">Sign Up</a>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    
        <!-- Mobile Menu (hidden on larger screens) -->
        <div class="md:hidden" id="mobile-menu" style="display: none;">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="text-black hover:text-yellow-400 block px-3 py-2 rounded-md text-base font-medium">
                    Donation
                </a>
                <div class="auth-option mt-2">
                    <a href="{{route('loginForm')}}" class="text-white text-xl hover:text-yellow-400 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                </div>
                <div class="auth-option mt-2">
                    <a href="{{route('signupForm')}}" class="text-white text-xl hover:text-yellow-400 px-3 py-2 rounded-md text-sm font-medium">Sign Up</a>
                </div>
            </div>
</div>
    </nav>
    {{-- Hero container code --}}
    <div class="relative flex items-center justify-center h-full bg-cover bg-center text-white text-center"
        style="background-image: url('https://static.vecteezy.com/system/resources/previews/025/867/281/original/money-donation-humanitarian-aid-charity-people-donating-finance-money-to-organizations-refugee-help-charitable-help-to-nonprofit-funds-flat-illustration-jar-with-coins-tiny-man-woman-vector.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 max-w-lg">
            <h1 class="text-3xl md:text-5xl">Empower Communities</h1>
            <p class="text-lg md:text-2xl my-5">Invest in Social Causes, Startups, and Community Projects</p>
            <a href="#loginSignup" class="inline-block px-6 py-3 mt-5 bg-transparent border-2 text-white text-xl rounded hover:border-green-300 hover: transition duration-300 ease-in-out">Ask For Dontation</a>
        </div>
    </div>

    <section class="py-8 bg-">
        <div class="container mx-auto mt-4">
            <h2 class="text-3xl font-bold text-center mb-12">What We Do?</h2>
            <div class="flex flex-wrap justify-center gap-8">
                <div class="card bg-white shadow-md rounded-lg overflow-hidden w-full sm:w-96 transform transition duration-500 hover:scale-105 hover:shadow-lg">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqe23wwKi4eQB-0RcVDDOQkI8kT66JFs-aAw&s" 
                         alt="Donation Icon" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Make Donation</h3>
                        <p class="text-gray-600 mb-4">Help today because tomorrow you may be the one who needs helping!</p>
                        <a href="#" class="inline-block px-6 py-3 mt-5 bg-green-400 text-white text-xl rounded hover:bg-green-500 transition duration-300 ease-in-out">Learn more</a>
                    </div>
                </div>
                <div class="card bg-white shadow-md rounded-lg overflow-hidden w-full sm:w-96 transform transition duration-500 hover:scale-105 hover:shadow-lg">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVNbjzwJuopZwepu5s6PxQPa2Ymqmn5aSZUg&s" 
                         alt="Fundraising Icon" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Fundraising</h3>
                        <p class="text-gray-600 mb-4">Help today because tomorrow you may be the one who needs helping!</p>
                        <a href="#" class="inline-block px-6 py-3 mt-5 bg-green-400 text-white text-xl rounded hover:bg-green-500 transition duration-300 ease-in-out">Learn more</a>
                    </div>
                </div>
                <div class="card bg-white shadow-md rounded-lg overflow-hidden w-full sm:w-96 transform transition duration-500 hover:scale-105 hover:shadow-lg">
                    <img src="https://as2.ftcdn.net/v2/jpg/01/92/85/09/1000_F_192850908_uaO86oFbB3KHu9tBBg3gPCNyVj9m56Zp.jpg" 
                         alt="Volunteer Icon" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Become A Volunteer</h3>
                        <p class="text-gray-600 mb-4">Help today because tomorrow you may be the one who needs helping!</p>
                        <a href="#" class="inline-block px-6 py-3 mt-5 bg-green-400 text-white text-xl rounded hover:bg-green-500 transition duration-300 ease-in-out">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Vision and Scope of Social Investment Platform</h1>
        <p class="text-gray-600 mb-8"></p>

        <div class="grid grid-cols-3 gap-8">
            <div class="bg-yellow-100 rounded-lg p-6 shadow-md">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2 class="text-xl font-bold text-gray-800 ml-2">Objectives</h2>
                </div>
                <ul class="list-disc pl-5 text-gray-700">
                    <li>Quality & consistent content</li>
                    <li>To make website user friendly</li>
                    <li>To provide additional features for customer experience</li>
                    <li>Add text here</li>
                </ul>
            </div>
            <div class="bg-yellow-100 rounded-lg p-6 shadow-md">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2 class="text-xl font-bold text-gray-800 ml-2">Scope</h2>
                </div>
                <ul class="list-disc pl-5 text-gray-700">
                    <li>Increase website visibility by using compelling page titles</li>
                    <li>Ensure availability of technical infrastructure for maintaining the site</li>
                    <li>Reduce customers churn rate by 20% by fixing bugs</li>
                    <li>Add text here</li>
                </ul>
            </div>
            <div class="bg-yellow-100 rounded-lg p-6 shadow-md">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292m0 2.502a9 9 0 110 12.998" />
                    </svg>
                    <h2 class="text-xl font-bold text-gray-800 ml-2">Target Audience</h2>
                </div>
                <ul class="list-disc pl-5 text-gray-700">
                    <li>Age group between 18-45 years</li>
                    <li>Add text here</li>
                    <li>Add text here</li>
                    <li>Add text here</li>
                </ul>
                <div class="mt-6">
                    <img src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Target Audience" class="rounded-full w-40 h-40">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-8 mt-12">
            <div class="bg-purple-400 rounded-lg p-6 shadow-md bg-white">
                <h2 class="text-xl font-bold text-gray-800">Project Sponsor</h2>
                <p class="text-gray-700 mt-2">Adam Charles</p>
            </div>
            <div class="bg-purple-200 rounded-lg p-6 shadow-md bg-white">
                <h2 class="text-xl font-bold text-gray-800">Project Manager</h2>
                <p class="text-gray-700 mt-2">James Harrison</p>
            </div>
            <div class="bg-purple-200 rounded-lg p-6 shadow-md bg-white">
                <h2 class="text-xl font-bold text-gray-800">Stakeholders</h2>
                <p class="text-gray-700 mt-2">Philips & John</p>
            </div>
        </div>
    </div>
    {{-- Footer Section --}}
    <footer class="bg-black text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between">
                <!-- About Us Section -->
                <div class="w-full sm:w-1/2 lg:w-1/4 mb-8">
                    <h3 class="text-lg font-semibold mb-4">About Us</h3>
                    <p class="text-white">We are a platform dedicated to connecting people with social causes, fostering community engagement, and driving impactful change.</p>
                </div>
    
                <!-- Quick Links Section -->
                <div class="w-full sm:w-1/2 lg:w-1/4 mb-8">
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul>
                        <li class="mb-2"><a href="#" class="text-gray-400 hover:text-white">Donation</a></li>
                        <li class="mb-2"><a href="#" class="text-gray-400 hover:text-white">Project Owner</a></li>
                        <li class="mb-2"><a href="#" class="text-gray-400 hover:text-white">Inversor</a></li>
                        <li class="mb-2"><a href="#" class="text-gray-400 hover:text-white">Admin</a></li>
                    </ul>
                </div>
    
                <!-- Services Section -->
                <div class="w-full sm:w-1/2 lg:w-1/4 mb-8">
                    <h3 class="text-lg font-semibold mb-4">Our Services</h3>
                    <ul>
                        <li class="mb-2"><a href="#" class="text-gray-400 hover:text-white">Social Investment</a></li>
                        <li class="mb-2"><a href="#" class="text-gray-400 hover:text-white">Fundraising</a></li>
                        <li class="mb-2"><a href="#" class="text-gray-400 hover:text-white">Volunteer </a></li>
                        <li class="mb-2"><a href="#" class="text-gray-400 hover:text-white">Community Platform</a></li>
                    </ul>
                </div>
    
                <!-- Contact Section -->
                <div class="w-full sm:w-1/2 lg:w-1/4 mb-8">
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <p class="text-gray-400 mb-2"><i class="fas fa-map-marker-alt mr-2"></i>Kathmandu Nepal</p>
                    <p class="text-gray-400 mb-2"><i class="fas fa-phone-alt mr-2"></i> +977-9841-00012</p>
                    <p class="text-gray-400"><i class="fas fa-envelope mr-2"></i> info@socialplatform.com</p>
                </div>
            </div>
            <div class="text-center text-gray-400 mt-8">
                &copy; 2024 Social Investment Platform. All rights reserved.
            </div>
        </div>
    </footer>
</body>
</html>
