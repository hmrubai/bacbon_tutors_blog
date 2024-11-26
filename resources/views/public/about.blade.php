@extends('layouts.public')

@section('content')
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes slideRight {
        from {
            transform: translateX(-20px);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideLeft {
        from {
            transform: translateX(20px);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .animate-fade-in {
        animation: fadeIn 1s ease-out forwards;
    }

    .animate-slide-up {
        animation: slideUp 1s ease-out forwards;
    }

    .animate-slide-right {
        animation: slideRight 1s ease-out forwards;
    }

    .animate-slide-left {
        animation: slideLeft 1s ease-out forwards;
    }
</style>
<!-- Hero Section -->
<section class="relative bg-cover bg-center h-[60vh] md:h-[80vh] flex items-center justify-center"
    style="background-image: url('https://picsum.photos/1200/800?random=3');">
    <div class="absolute inset-0 bg-blue-900 bg-opacity-60"></div> <!-- Overlay -->
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fade-in">About Us</h1>
        <p class="text-lg md:text-xl max-w-3xl mx-auto animate-slide-up">
            We are dedicated to providing insightful articles, resources, and support to help our readers grow
            in their educational journey. Learn more about who we are, our mission, and our vision for the
            future.
        </p>
    </div>
</section>
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <!-- Mission and Vision Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
            <div class="space-y-4 animate-slide-right">
                <h2 class="text-3xl font-bold text-gray-800">Our Mission</h2>
                <p class="text-gray-600 text-lg">
                    Our mission is to empower individuals through accessible, high-quality educational content. We
                    believe that knowledge should be free and available to everyone, and we strive to create a platform
                    where readers can expand their horizons.
                </p>
            </div>
            <div class="space-y-4 animate-slide-left">
                <h2 class="text-3xl font-bold text-gray-800">Our Vision</h2>
                <p class="text-gray-600 text-lg">
                    We envision a world where education is within reach for everyone, regardless of background or
                    circumstance. By sharing knowledge, we aim to foster a community that values learning and personal
                    growth.
                </p>
            </div>
        </div>

        <!-- Image and Content Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
            <img src="https://picsum.photos/600/400?random=1" alt="Team working together"
                class="rounded-lg shadow-lg w-full h-72 object-cover animate-fade-in">
            <div class="space-y-4 animate-slide-up">
                <h2 class="text-3xl font-bold text-gray-800">Who We Are</h2>
                <p class="text-gray-600 text-lg">
                    We are a team of passionate individuals from diverse backgrounds, united by our love for education
                    and our desire to make a difference. Our team includes writers, educators, and industry experts who
                    contribute to making our platform a valuable resource.
                </p>
            </div>
        </div>

        <!-- Values Section -->
        <div class="mb-16">
            <h2 class="text-center text-3xl font-bold text-gray-800 mb-12 animate-fade-in">Our Core Values</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2 animate-fade-in">
                    <h3 class="text-2xl font-semibold text-blue-600 mb-2">Integrity</h3>
                    <p class="text-gray-600">
                        We uphold the highest standards of integrity in everything we do, ensuring that our content is
                        honest, reliable, and trustworthy.
                    </p>
                </div>
                <div
                    class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2 animate-fade-in">
                    <h3 class="text-2xl font-semibold text-blue-600 mb-2">Innovation</h3>
                    <p class="text-gray-600">
                        We are always exploring new ways to present information and make learning exciting, engaging,
                        and accessible for all.
                    </p>
                </div>
                <div
                    class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2 animate-fade-in">
                    <h3 class="text-2xl font-semibold text-blue-600 mb-2">Community</h3>
                    <p class="text-gray-600">
                        Our community is at the heart of everything we do. We aim to create a welcoming space where
                        knowledge and ideas can flourish.
                    </p>
                </div>
            </div>
        </div>

        <!-- Team Image Section -->
        <div class="text-center mb-16">
            <img src="https://picsum.photos/800/400?random=2" alt="Our team"
                class="rounded-lg shadow-lg w-full h-72 object-cover mx-auto animate-fade-in">
            <p class="text-gray-600 text-lg mt-6 max-w-2xl mx-auto animate-slide-up">
                Our team is dedicated to creating a positive impact through education. Together, we’re building a
                platform that helps people grow, connect, and achieve their dreams.
            </p>
        </div>
    </div>
</section>

<!-- CSS for animations -->

@endsection