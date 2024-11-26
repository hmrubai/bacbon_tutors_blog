<!-- resources/views/admin/posts/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    <section class="relative min-h-[60vh]">
        <div class="absolute inset-0 ">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                    class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gradient-to-br from-blue-600 to-indigo-900"></div>
            @endif
            <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="max-w-3xl">
                <!-- Category Badge -->
                <a href="{{ route('public.categories.posts', $post->category->id) }}"
                    class="inline-flex items-center px-4 py-1.5 bg-blue-600/20 text-blue-200 rounded-full text-sm font-medium backdrop-blur-sm border border-blue-400/20 hover:bg-blue-600/30 transition-colors duration-200 mb-6">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                        </path>
                    </svg>
                    {{ $post->category->name }}
                </a>

                <!-- Title -->
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 [text-wrap:balance]">
                    {{ $post->title }}
                </h1>

                <!-- Author Info -->
                <div class="flex items-center space-x-4">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name ?? 'Unknown') }}&background=random"
                        alt="{{ $post->user->name ?? 'Unknown Author' }}"
                        class="w-12 h-12 rounded-full border-2 border-white/20">
                    <div>
                        <p class="text-white font-medium">{{ $post->user->name ?? 'Unknown Author' }}</p>
                        <p class="text-blue-200 text-sm">Published on {{ $post->created_at->format('F j, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative -mt-20 mb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <!-- Main Content Card -->
                <article
                    class="bg-white rounded-2xl shadow-xl p-8 md:p-12 prose prose-lg dark:prose-invert max-w-none">
                    <!-- Description -->
                    <p
                        class="text-xl text-justify text-gray-600 dark:text-gray-300 leading-relaxed mb-8 first-letter:text-5xl first-letter:font-bold first-letter:text-blue-600 dark:first-letter:text-blue-400 first-letter:mr-3 first-letter:float-left">
                        {!! $post->description !!}
                    </p>                    
                </article>
            </div>
        </div>
    </section>
</x-app-layout>