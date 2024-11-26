<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
class DashBoardController extends Controller
{
    public function index()
    {
        // Total posts count
        $totalPosts = Post::count();

        // Latest posts
        $latestPosts = Post::latest()->take(5)->get();

        // Posts analytics - count posts for each month
        $postsByMonth = Post::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->mapWithKeys(function ($item) {
                return [Carbon::create()->month($item->month)->format('F') => $item->count];
            });

        // Ensure all months are present in the chart, even with zero posts
        $months = collect(range(1, 12))->mapWithKeys(function ($month) {
            return [Carbon::create()->month($month)->format('F') => 0];
        });
        $postsAnalytics = $months->merge($postsByMonth);

        return view('admin.dashboard', compact('totalPosts', 'latestPosts', 'postsAnalytics'));
    }
}
