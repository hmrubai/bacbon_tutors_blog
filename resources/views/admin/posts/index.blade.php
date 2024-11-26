<!-- resources/views/admin/posts/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts Management') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="grid grid-cols-4">
                    <div class="col-span-3">
                        <!-- Search Form -->
                        <form method="GET" action="{{ route('posts.index') }}" class="mb-6 flex items-center space-x-4">
                            <input type="text" name="search" placeholder="Search by title or category"
                                value="{{ $search ?? '' }}"
                                class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 ">
                            <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center gap-3">
                                <i class="fas fa-search"></i> Search
                            </button>
                            @if($search)
                                <button type="button" onclick="clearSearch()"
                                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition flex items-center gap-3">
                                    <i class="fas fa-times"></i> Clear
                                </button>
                            @endif
                        </form>
                    </div>
                    <div class="col-span-1">
                        <div class="mb-4 text-right">
                            <a href="{{ route('posts.create') }}"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition inline-flex items-center">
                                <i class="fas fa-plus mr-2"></i> Create New Post
                            </a>
                        </div>
                    </div>
                </div>




                <!-- Posts Table -->
                <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Title
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Category
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Author
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="px-6 py-3 text-right text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($posts as $post)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-200">
                                    {{ $post->title }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                    {{ $post->category->name }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                    {{ $post->user->name ?? 'N/A' }} <!-- Display user's name -->
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                                {{ $post->status ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                                        {{ $post->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-500">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('posts.show', $post->id) }}"
                                        class="text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-500">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="delete-form"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-500 delete-btn">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $posts->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach((form) => {
                form.querySelector('.delete-btn').addEventListener('click', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if confirmed
                        }
                    });
                });
            });
        });
        function clearSearch() {
            const searchInput = document.querySelector('input[name="search"]');
            searchInput.value = ''; // Clear the input value
            searchInput.form.submit(); // Submit the form
        }
    </script>

</x-app-layout>