<x-app-layout>


    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <!-- Metrics Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Total Posts</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ $totalPosts }}</p>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Total Comments</h3>
                    <p class="text-3xl font-bold text-blue-600">15</p>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Total Users</h3>
                    <p class="text-3xl font-bold text-green-600">95</p>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Total Visitors</h3>
                    <p class="text-3xl font-bold text-red-600">25</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
                <!-- Bar Chart Section -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4 border-b-2 py-2">Posts
                        Analytics</h3>
                    <canvas id="postsChart" class="w-full h-64"></canvas>
                </div>

                <!-- Latest Posts Section -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4 border-b-2 py-2">Latest Posts
                    </h3>
                    <div class="space-y-4">
                        @forelse ($latestPosts as $post)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://picsum.photos/50/50' }}"
                                            alt="Post Image" class="w-12 h-12 rounded-lg">
                                    </div>
                                    <div>
                                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-100">
                                            {{ $post->title }}
                                        </h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            Published on: {{ $post->created_at->format('Y-m-d') }}
                                        </p>
                                    </div>
                                </div>
                                <a href="{{ route('posts.show', $post->id) }}"
                                        class="text-blue-600 font-semibold hover:underline">
                                        View
                                    </a>
                            </div>
                        @empty
                            <p class="text-sm text-gray-600 dark:text-gray-400">No posts available.</p>
                        @endforelse
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('postsChart').getContext('2d');
        const postsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($postsAnalytics->keys()) !!}, // Month names
                datasets: [{
                    label: 'Number of Posts',
                    data: {!! json_encode($postsAnalytics->values()) !!}, // Post counts
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 205, 86, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(201, 203, 207, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 205, 86, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(201, 203, 207, 0.6)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(201, 203, 207, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(201, 203, 207, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>