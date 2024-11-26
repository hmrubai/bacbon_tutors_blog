<!-- Navigation -->
<nav class="fixed w-full bg-white/95 backdrop-blur-sm shadow-sm z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-2">
                    <!-- Add image logo -->
                    <img src="{{ asset('assets/images/BT_01.png') }}" alt="BACBON Tutors Logo"
                        class="h-36 w-36 object-contain">

                    <!-- Fallback text for accessibility -->
                </a>
            </div>


            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ url('/') }}"
                    class="text-gray-700 font-medium hover:text-blue-600 transition {{ request()->is('/') ? 'border-b-[3px] border-blue-600' : '' }}">Home</a>
                <a href="{{ url('/about') }}"
                    class="text-gray-700 font-medium hover:text-blue-600 transition {{ request()->is('about') ? 'border-b-4 border-blue-600' : '' }}">About
                    Us</a>
                <a href="{{ url('/contact') }}"
                    class="text-gray-700 font-medium hover:text-blue-600 transition {{ request()->is('contact') ? 'border-b-4 border-blue-600' : '' }}">Contact</a>
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-gray-700 hover:text-blue-600 transition px-4 font-medium">Dashboard</a>

                @endauth
                <!-- Hotline Number Display -->
                <div class="flex items-center space-x-2 bg-blue-100 rounded-full px-4 py-2">
                    <i class="fas fa-phone-alt text-blue-600"></i>
                    <span class="text-lg font-semibold text-blue-700">Hotline:</span>
                    <a href="tel:+1234567890" class="text-blue-600 font-bold hover:text-blue-800 transition">+1 234 567
                        890</a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden flex items-center" id="mobile-menu-button">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div class="mobile-menu-hidden md:hidden" id="mobile-menu">
            <div class="flex flex-col space-y-2 pt-4 pb-4 border-t border-gray-200">
                <a href="{{ url('/') }}"
                    class="text-gray-700 font-medium hover:text-blue-600 transition {{ request()->is('/') ? 'border-b-[3px] border-blue-600' : '' }}">Home</a>
                <a href="{{ url('/about') }}"
                    class="text-gray-700 font-medium hover:text-blue-600 transition {{ request()->is('about') ? 'border-b-4 border-blue-600' : '' }}">About
                    Us</a>
                <a href="{{ url('/contact') }}"
                    class="text-gray-700 font-medium hover:text-blue-600 transition {{ request()->is('contact') ? 'border-b-4 border-blue-600' : '' }}">Contact</a>
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-gray-700 hover:text-blue-600 transition px-4 font-medium">Dashboard</a>

                @endauth
                <!-- Mobile Hotline Display -->
                <div class="flex items-center space-x-2 px-4 bg-blue-50 rounded-full py-2">
                    <i class="fas fa-phone-alt text-blue-600"></i>
                    <span class="text-lg font-semibold text-blue-700">Hotline:</span>
                    <a href="tel:+1234567890" class="text-blue-600 font-bold hover:text-blue-800 transition">+1 234 567
                        890</a>
                </div>
            </div>
        </div>
    </div>
</nav>