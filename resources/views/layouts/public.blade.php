<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>BacBon Tutors - Educational Blog</title> --}}
    <title>@yield('title', 'BacBon Tutors - Educational Blog')</title>
    <meta name="description" content="@yield('meta_description', 'Discover educational insights, student success stories, and expert teaching resources.')">
    <meta name="keywords" content="@yield('meta_keywords', 'BacBon Tutors, Tutors, Blog, BB Tutors, BacBon')">
    <meta name="author" content="BacBon Tutors - Educational Blog">
    <link rel="icon" href="{{ asset('assets/images/logo2.png') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      src="https://kit.fontawesome.com/c7acf970ff.js"
      crossorigin="anonymous"
    ></script>

    <title>{{ $post->title ?? null }} | BacBon Tutors - Educational Blog</title>
    <meta name="description" content="{{ Str::limit(strip_tags($post->description ?? null), 160) }}">
    {{-- <meta name="keywords" content="{{ implode(',', $post->tags) }}"> --}}
    <meta name="author" content="{{ $post->user->name ?? null }}">
    <meta property="og:title" content="{{ $post->title ?? null  }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->description ?? null ), 160) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {{-- {!! TwitterCard::generate() !!} --}}
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
    <!-- Navbar for Public Pages -->
    @include('components.userNav') <!-- Put your public nav component here -->

     <!-- Main Content -->
     <main>
        @yield('content')
        @section('title', 'Educational Blog')
        @section('meta_description', 'Discover educational insights, student success stories, and expert teaching resources.')
        @section('meta_keywords', 'BacBon Tutors, Tutors, Blog, BB Tutors, BacBon')
    </main>

    <!-- Footer -->
    @include('components.userFooter') <!-- Public footer (if necessary) -->

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
</body>
</html>
