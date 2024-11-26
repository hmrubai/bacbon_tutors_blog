<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4">
                <!-- Categories List -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg p-6">
                    <div class="flex justify-between items-center mb-6 border-b-2 py-1">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 ">Categories List</h3>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    Details
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-sm font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($categories as $category)
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-200">
                                        {{ $category->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                        {{ $category->details }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <span
                                            class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $category->status ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                                            {{ $category->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <a href="{{ route('categories.index', ['edit' => $category->id]) }}"
                                            class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-500">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button"
                                            class="delete-btn text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-500"
                                            data-id="{{ $category->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <form id="delete-form-{{ $category->id }}"
                                            action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                            class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Create/Edit Category Form -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg p-6">
                    @php
                        $isEditing = isset($editCategory);
                        $actionRoute = $isEditing ? route('categories.update', $editCategory->id) : route('categories.store');
                        $method = $isEditing ? 'PUT' : 'POST';
                    @endphp

                    <h2
                        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight border-b-2 pb-3 mb-6">
                        {{ $isEditing ? __('Edit Category') : __('Create Category') }}
                    </h2>
                    <form action="{{ $actionRoute }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf
                        @if($isEditing)
                            @method('PUT')
                        @endif

                        <!-- Name Field -->
                        <div>
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category
                                Name</label>
                            <input type="text" name="name" id="name" required placeholder="Enter category name"
                                value="{{ old('name', $isEditing ? $editCategory->name : '') }}"
                                class="block w-full rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 shadow-sm px-4 py-2">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Details Field -->
                        <div>
                            <label for="details"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category
                                Details</label>
                            <textarea name="details" id="details" rows="4"
                                placeholder="Provide details about the category"
                                class="block w-full rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 shadow-sm px-4 py-2">{{ old('details', $isEditing ? $editCategory->details : '') }}</textarea>
                            @error('details')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image Field -->
                        <div>
                            <label for="image"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category
                                Image</label>
                            <input type="file" name="image" id="image"
                                class="block w-full text-gray-700 dark:text-gray-300 rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 shadow-sm px-4 py-2 cursor-pointer">
                            @if ($isEditing && $editCategory->image)
                                <img src="{{ asset('storage/' . $editCategory->image) }}" alt="Category Image"
                                    class="mt-4 w-32 h-32 object-cover rounded-lg shadow">
                            @endif
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Field -->
                        <div>
                            <label for="status"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                            <div class="flex items-center space-x-4">
                                <label for="status-switch" class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="status" id="status-switch" value="1"
                                        class="sr-only peer" {{ old('status', $isEditing ? $editCategory->status : 1) == 1 ? 'checked' : '' }}>
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
                                class="bg-indigo-600 text-white px-4 py-2 rounded-md font-semibold shadow hover:bg-indigo-700 transition focus:outline-none focus:ring focus:ring-indigo-500">
                                {{ $isEditing ? __('Update Category') : __('Create Category') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                const categoryId = e.target.closest('.delete-btn').getAttribute('data-id');
                const deleteForm = document.getElementById(`delete-form-${categoryId}`);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.submit();
                    }
                });
            });
        });
    });
</script>

</x-app-layout>
