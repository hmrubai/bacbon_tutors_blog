@extends('layouts.public')
@section('content')
<!-- Hero Section with Post Image -->
<section class="relative min-h-[60vh]">
    <div class="absolute inset-0 mt-20">
        @if($post->image)
            <img src="{{ asset('' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-contain">
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
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 [text-wrap:balance]" style="line-height: 4rem;">
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

<!-- Content Section -->
<section class="relative -mt-20">
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


                <!-- Content -->
                <div class="mt-8">
                    {!! $post->content !!}
                </div>

                <!-- Tags Section -->
                @if(isset($post->tags) && count($post->tags) > 0)
                    <div class="border-t dark:border-gray-700 mt-12 pt-8">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Related Topics</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($post->tags as $tag)
                                <span
                                    class="px-4 py-1.5 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-sm">
                                    #{{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </article>

            <!-- Share Section -->
            <div class="mt-8 bg-gray-50 dark:bg-gray-800/50 rounded-xl p-6 backdrop-blur-sm mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Share this article</h3>
                <div class="flex space-x-4">
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}"
                        target="_blank"
                        class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-500 text-white hover:bg-blue-600 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                        </svg>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                        target="_blank"
                        class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}"
                        target="_blank"
                        class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-700 text-white hover:bg-blue-800 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Navigation -->
            @if(isset($previousPost) || isset($nextPost))
                <nav class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
                    @if(isset($previousPost))
                        <a href="{{ route('public.posts.details', $previousPost->id) }}"
                            class="group relative bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-200">
                            <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">Previous Article</div>
                            <h4
                                class="text-lg font-semibold text-gray-900 dark:text-white group-hover:text-blue-600 transition-colors duration-200">
                                {{ $previousPost->title }}
                            </h4>
                        </a>
                    @endif

                    @if(isset($nextPost))
                        <a href="{{ route('public.posts.details', $nextPost->id) }}"
                            class="group relative bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-200 text-right">
                            <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">Next Article</div>
                            <h4
                                class="text-lg font-semibold text-gray-900 dark:text-white group-hover:text-blue-600 transition-colors duration-200">
                                {{ $nextPost->title }}
                            </h4>
                        </a>
                    @endif
                </nav>
            @endif
        </div>
    </div>
</section>

<!-- Related Posts -->
@if(isset($relatedPosts) && $relatedPosts->isNotEmpty())
    <section class="py-24 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-12">Related Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($relatedPosts as $relatedPost)
                    <article
                        class="group bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                        <div class="relative overflow-hidden">
                            <img src="{{ $relatedPost->image ? asset('storage/' . $relatedPost->image) : 'https://picsum.photos/800/600?education=' . $loop->iteration }}"
                                alt="{{ $relatedPost->title }}"
                                class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                        </div>

                        <div class="p-6">
                            <h3
                                class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-blue-600 transition-colors duration-200">
                                {{ $relatedPost->title }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-2">
                                {{ $relatedPost->description }}
                            </p>
                            <a href="{{ route('public.posts.details', $relatedPost->id) }}"
                                class="inline-flex items-center text-blue-600 dark:text-blue-400 font-semibold group-hover:text-blue-700 dark:group-hover:text-blue-300">
                                Read Article
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-2 transition-transform duration-200"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
@endsection