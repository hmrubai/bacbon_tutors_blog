<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BACBON Tutors - Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
   
    <style>
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Mobile menu transition styles */
        .mobile-menu-hidden {
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
            display: none;
            
        }
        .mobile-menu-visible {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 0.3s ease, transform 0.3s ease;
            display: block;
        }
    </style>
</head>

<body class="font-poppins">
    <!-- Navigation -->
    <nav class="fixed w-full bg-white/95 backdrop-blur-sm shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-blue-600">BACBON School</a>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-blue-600 transition">Home</a>
                    <a href="#blog" class="text-gray-700 hover:text-blue-600 transition">Blog</a>
                    <a href="#about" class="text-gray-700 hover:text-blue-600 transition">About</a>
                    <a href="#contact" class="text-gray-700 hover:text-blue-600 transition">Contact</a>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-blue-600 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Register</a>
                        @endif
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden flex items-center" id="mobile-menu-button">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                </button>
            </div>
            <!-- Mobile Navigation -->
            <!-- Mobile Navigation -->
            <div class="mobile-menu-hidden md:hidden" id="mobile-menu">
                <div class="flex flex-col space-y-2 pt-4 pb-4 border-t border-gray-200">
                    <a href="#home" class="text-gray-700 hover:text-blue-600 transition px-4">Home</a>
                    <a href="#blog" class="text-gray-700 hover:text-blue-600 transition px-4">Blog</a>
                    <a href="#about" class="text-gray-700 hover:text-blue-600 transition px-4">About</a>
                    <a href="#contact" class="text-gray-700 hover:text-blue-600 transition px-4">Contact</a>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-blue-600 transition px-4">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition px-4">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 mx-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with enhanced animations -->
    <section class="relative min-h-screen flex items-center justify-center bg-gradient-to-b from-blue-50/50 to-white">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-[url('https://picsum.photos/1920/1080?education')] bg-cover bg-center"></div>
            <div class="absolute inset-0 bg-blue-900/30 backdrop-blur-sm"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
            <div class="text-center space-y-8">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 opacity-0 animate-[fade-in-up_1s_ease-out_0.2s_forwards]">
                    Welcome to BACBON Tutors Blog
                </h1>
                <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto mb-8 opacity-0 animate-[fade-in-up_1s_ease-out_0.4s_forwards]">
                    Discover educational insights, student success stories, and expert teaching resources.
                </p>
                <a href="#featured" 
                   class="inline-block px-8 py-4 bg-white text-blue-600 rounded-lg text-lg font-semibold 
                          hover:bg-blue-50 transform hover:-translate-y-1 transition-all duration-200 
                          opacity-0 animate-[fade-in-up_1s_ease-out_0.6s_forwards]">
                    Explore Our Blog
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Posts with reveal animation -->
    @if(isset($posts) && $posts->isNotEmpty())
    <section id="featured" class="py-16 bg-white reveal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 reveal">Featured Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                <article class="bg-white shadow-lg overflow-hidden transform hover:-translate-y-2 transition-all duration-300 reveal">
                    <img src="{{ $post->image ? Storage::url($post->image) : 'https://picsum.photos/800/600?education=' . $loop->iteration }}"
                         alt="{{ $post->title }}" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $post->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($post->description, 100) }}</p>
                        <a href="{{ route('posts.details', $post->id) }}" 
                           class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700">
                            Read More 
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Categories with Posts with reveal animation -->
    @if(isset($categories) && $categories->isNotEmpty())
    <section id="categories" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @foreach($categories as $category)
            <div class="mb-16 last:mb-0 reveal">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">{{ $category->name }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($category->posts as $post)
                    <article class="bg-white shadow-lg overflow-hidden transform hover:-translate-y-2 transition-all duration-300 reveal">
                        <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://picsum.photos/800/600?education=' . $loop->parent->iteration . $loop->iteration }}"
                             alt="{{ $post->title }}" 
                             class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($post->description, 100) }}</p>
                            <a href="{{ route('posts.details', $post->id) }}" 
                               class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700">
                                Read More 
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Newsletter -->
    <section class="py-16 bg-blue-600 reveal">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Stay Updated with BACBON School</h2>
            <p class="text-blue-100 mb-8">Get the latest educational insights and updates delivered to your inbox.</p>
            <form class="flex flex-col sm:flex-row gap-4 justify-center">
                <input type="email" 
                       placeholder="Enter your email" 
                       class="px-6 py-3 rounded-lg flex-1 max-w-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>
                <button type="submit" 
                        class="px-8 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-blue-50 transition-colors duration-200">
                    Subscribe
                </button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div>
                    <h3 class="text-xl font-bold mb-4">About BACBON School</h3>
                    <p class="text-gray-400">Empowering students with knowledge and skills for a brighter future through quality education and innovative learning approaches.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="#blog" class="text-gray-400 hover:text-white transition">Blog</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white transition">About</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Connect With Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.441 16.892c-2.102.144-6.784.144-8.883 0-2.276-.156-2.541-1.27-2.558-4.892.017-3.629.285-4.736 2.558-4.892 2.099-.144 6.782-.144 8.883 0 2.277.156 2.541 1.27 2.559 4.892-.018 3.629-.285 4.736-2.559 4.892zm-6.441-7.892l4.917 2.892-4.917 2.892v-5.784z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-800 text-center text-gray-400">
                <p>&copy; 2024 BACBON School. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
         // Toggle mobile menu visibility with smooth transition
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            if (mobileMenu.classList.contains('mobile-menu-hidden')) {
                mobileMenu.classList.remove('mobile-menu-hidden');
                mobileMenu.classList.add('mobile-menu-visible');
            } else {
                mobileMenu.classList.remove('mobile-menu-visible');
                mobileMenu.classList.add('mobile-menu-hidden');
            }
        });

        // Reveal animations on scroll
        const revealElements = document.querySelectorAll('.reveal');

        const reveal = () => {
            revealElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;
                
                if (elementTop < windowHeight - 100) {
                    element.classList.add('active');
                }
            });
        };

        window.addEventListener('scroll', reveal);
        window.addEventListener('load', reveal);
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    keyframes: {
                        'fade-in-up': {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(20px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        'fade-in': {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            }
                        }
                    },
                    animation: {
                        'fade-in-up': 'fade-in-up 0.8s ease-out',
                        'fade-in': 'fade-in 1s ease-out'
                    }
                }
            }
        }
    </script>
     <script>
        
    </script>
</body>
</html>