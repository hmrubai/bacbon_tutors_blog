<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users Management') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Search and Create User -->
                <div class="grid grid-cols-4 mb-6">
                    <div class="col-span-4 text-end">
                        <a href="{{ route('users.create') }}"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition inline-flex items-center">
                            <i class="fas fa-plus mr-2"></i> Create New User
                        </a>
                    </div>
                </div>


                <!-- Users Table -->
                <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Name
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Email
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Role
                            </th>
                            <th
                                class="px-6 py-3 text-right text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($users as $user)
                                            <tr>
                                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-200">
                                                    {{ $user->name }}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                                    {{ $user->email }}
                                                </td>
                                                <td class="px-6 py-4 text-sm">
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                                                                            {{ $user->role === 'admin' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300' :
                            ($user->role === 'author' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300' :
                                'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300') }}">
                                                        {{ ucfirst($user->role) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 text-right space-x-2">
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-500">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="delete-form"
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