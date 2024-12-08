@extends('layouts.public')

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">{{ $category->name }} Posts</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <article
                    class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 reveal">
                    <div class="relative overflow-hidden">
                        <img src="{{ $post->image ? asset('' . $post->image) : 'https://picsum.photos/800/600?education=' . $loop->iteration }}"
                            alt="{{ $post->title }}"
                            class="w-full h-56 object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>

                    <div class="p-8">
                        <div class="flex items-center mb-4">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name ?? 'Unknown') }}&background=random"
                                alt="Author" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $post->user->name ?? 'Unknown Author' }}</p>
                                <p class="text-sm text-gray-500">{{ $post->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>

                        <h3
                            class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-200">
                            {{ $post->title }}
                        </h3>

                        <div class="text-gray-600 mb-4 line-clamp-2">
                            {!! $post->description !!}
                        </div>


                        <a href="{{ route('public.posts.details', $post->id) }}"
                            class="inline-flex items-center text-blue-600 font-semibold group-hover:text-blue-700">
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

        <!-- Pagination Links -->
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection