@extends('layouts.public')

@section('content')
<div class="py-16 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 mb-4 reveal">
                All Posts
            </h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <article class="group bg-white overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-1">
                    <!-- Image Container -->
                    <div class="relative h-64 overflow-hidden">
                        <img 
                            src="{{ $post->image ? asset('' . $post->image) : 'https://picsum.photos/800/600?education=' . $loop->iteration }}"
                            alt="{{ $post->title }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <!-- Category Badge -->
                        <span class="absolute top-4 right-4 px-4 py-1.5 bg-white/90 backdrop-blur-sm text-blue-600 rounded-full text-sm font-medium">
                            {{ $post->category->name ?? 'Uncategorized' }}
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="p-8">
                        <!-- Author Info -->
                        <div class="flex items-center mb-6">
                            <img 
                                src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name ?? 'Unknown') }}&background=random" 
                                alt="{{ $post->user->name ?? 'Unknown Author' }}"
                                class="w-12 h-12 rounded-full border-2 border-blue-100"
                            >
                            <div class="ml-4">
                                <p class="text-gray-900 font-semibold">{{ $post->user->name ?? 'Unknown Author' }}</p>
                                <p class="text-gray-500 text-sm">{{ $post->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>

                        <!-- Title & Description -->
                        <h3 class="text-xl font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors duration-300">
                            {{ $post->title }}
                        </h3>
                        <div class="text-gray-600 mb-6 line-clamp-2">
                            {!! $post->description !!}
                        </div>

                        <!-- Read More Link -->
                        <a href="{{ route('public.posts.details', $post->id) }}"
                            class="inline-flex items-center text-blue-600 font-semibold group-hover:text-blue-700">
                            Read Article
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-2 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Custom Pagination -->
        @if ($posts->hasPages())
            <div class="mt-16">
                <div class="flex flex-col items-center gap-6">
                    <!-- Pagination Info -->
                    <div class="text-sm text-gray-500">
                        Showing 
                        <span class="font-medium">{{ $posts->firstItem() }}</span>
                        to
                        <span class="font-medium">{{ $posts->lastItem() }}</span>
                        of
                        <span class="font-medium">{{ $posts->total() }}</span>
                        Posts
                    </div>

                    <!-- Pagination Navigation -->
                    <div class="flex items-center gap-2">
                        <!-- Previous Page -->
                        @if ($posts->onFirstPage())
                            <span class="px-4 py-3 bg-gray-100 text-gray-400 rounded-xl cursor-not-allowed">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </span>
                        @else
                            <a href="{{ $posts->previousPageUrl() }}" 
                                class="px-4 py-3 bg-white hover:bg-gray-50 text-gray-700 rounded-xl transition-all duration-200 shadow-sm hover:shadow-md hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </a>
                        @endif

                        <!-- Page Numbers -->
                        <div class="flex items-center gap-2">
                            @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                @if ($page == $posts->currentPage())
                                    <span class="px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl shadow-lg shadow-blue-600/20">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" 
                                        class="px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 font-medium rounded-xl transition-all duration-200 hover:-translate-y-0.5 shadow-sm hover:shadow-md">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        <!-- Next Page -->
                        @if ($posts->hasMorePages())
                            <a href="{{ $posts->nextPageUrl() }}" 
                                class="px-4 py-3 bg-white hover:bg-gray-50 text-gray-700 rounded-xl transition-all duration-200 shadow-sm hover:shadow-md hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        @else
                            <span class="px-4 py-3 bg-gray-100 text-gray-400 rounded-xl cursor-not-allowed">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection