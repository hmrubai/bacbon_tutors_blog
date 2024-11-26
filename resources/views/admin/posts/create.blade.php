<x-app-layout>
    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg p-6">
                <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight border-b-2">
                    {{ __('Create Post') }}
                </h2>
                <form id="postForm" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <!-- Category -->
                    <div>
                        <label for="category_id"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
                        <select name="category_id" id="category_id" required
                            class="block w-full rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 shadow-sm px-4 py-2">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="title"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                        <input type="text" name="title" id="title" required placeholder="Enter post title"
                            class="block w-full rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 shadow-sm px-4 py-2">
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                        <div id="editor"
                            class="block w-full rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 shadow-sm px-4 py-2">
                        </div>
                        <input type="hidden" name="description" id="description">
                    </div>

                    <!-- Image -->
                    <div>
                        <label for="image"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Image</label>
                        <input type="file" name="image" id="image"
                            class="block w-full text-gray-700 dark:text-gray-300 rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 shadow-sm px-4 py-2">
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                        <div class="flex items-center space-x-4">
                            <label for="status-switch" class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="status" id="status-switch" value="1" class="sr-only peer"
                                    {{ old('status', 1) == 1 ? 'checked' : '' }}>
                                <div
                                    class="w-10 h-5 bg-gray-300 peer-focus:ring-4 peer-focus:ring-indigo-500 dark:peer-focus:ring-indigo-600 rounded-full peer dark:bg-gray-700 peer-checked:bg-indigo-600">
                                </div>
                                <div
                                    class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full transition-transform peer-checked:translate-x-5">
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class=" bg-indigo-600 text-white px-4 py-2 rounded-md font-semibold shadow hover:bg-indigo-700 transition focus:outline-none focus:ring focus:ring-indigo-500">
                            Create Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Quill and Initialization Script -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize Quill editor
            const quill = new Quill('#editor', {
                theme: 'snow',
                placeholder: 'Write something...',
                modules: {
                    toolbar: [
                        [{ header: [1, 2, 3, 4, 5, 6, false] }], // Add more header options
                        // [{ size: ['small', false, 'large', 'huge'] }], // Add font size options
                        ['bold', 'italic', 'underline'], // Text formatting
                        [{ list: 'ordered' }, { list: 'bullet' }], // Lists
                        ['link', 'image'], // Links and images
                        [{ align: [] }], // Text alignment
                        [{ color: [] }, { background: [] }] // Text color and background
                    ]
                }
            });


            // Attach event listener to the form
            const form = document.querySelector('#postForm');
            form.addEventListener('submit', (e) => {
                // Populate hidden input with Quill content
                const descriptionInput = document.querySelector('input[name=description]');
                descriptionInput.value = quill.root.innerHTML;

                // Debugging: Ensure the content is logged
                console.log('Description Content:', descriptionInput.value);
            });
        });
    </script>
</x-app-layout>