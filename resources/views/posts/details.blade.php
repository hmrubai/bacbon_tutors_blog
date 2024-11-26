<!-- resources/views/posts/details.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold">{{ $post->title }}</h3>
                <p class="mt-2 text-gray-600"><strong>Category:</strong> {{ $post->category->name }}</p>
                <p class="mt-2 text-gray-600">{{ $post->description }}</p>
                
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="mt-4 w-full h-auto object-cover">
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
