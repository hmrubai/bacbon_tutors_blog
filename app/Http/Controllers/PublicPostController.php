<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class PublicPostController extends Controller
{
    public function latestPosts()
    {
        // Retrieve the latest 4 posts with status = 1
        $posts = Post::with('category')
            ->where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        // Retrieve all categories with their posts (only active posts)
        $categories = Category::with([
            'posts' => function ($query) {
                $query->where('status', 1)->latest();
            }
        ])->get();

        return view('public.home', compact('posts', 'categories'));
    }

    public function details(Post $post)
    {
        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription(substr(strip_tags($post->description), 0, 160));
        SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(), 'property');
        SEOMeta::addKeyword([$post->title]);

        OpenGraph::setTitle($post->title)
             ->setDescription(substr(strip_tags($post->description), 0, 160))
             ->setType('article')
             ->setArticle([
                 'published_time' => $post->created_at->toW3CString(),
                //  'author' => $post->author->name
             ]);

        TwitterCard::setTitle($post->title);
        TwitterCard::setSite('@your_twitter_handle');

        return view('public.posts.details', compact('post'));
    }

    public function categoryPosts(Category $category)
    {
        // Retrieve only active posts for the specific category
        $posts = $category->posts()->where('status', 1)->latest()->paginate(9); // Paginate if you want to limit posts per page

        return view('public.posts.category', compact('category', 'posts'));
    }
    public function allPosts()
    {
        // Retrieve all posts with status = 1, paginated
        $posts = Post::with('category')->where('status', 1)->latest()->paginate(9);

        // Retrieve all categories
        $categories = Category::all();

        return view('public.posts.allPost', compact('posts', 'categories'));
    }

}

