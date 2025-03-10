<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $posts = Post::with(['category', 'user']) // Eager load 'user' relationship
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhereHas('category', function ($query) use ($search) {
                          $query->where('name', 'like', "%{$search}%");
                      });
            })
            ->paginate(10)
            ->appends(['search' => $search]);
    
        return view('admin.posts.index', compact('posts', 'search'));
    }
    
    public function create()
    {
        $categories = Category::all(); // Get all categories for the dropdown
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        \Log::info($request->input('description'));
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string', // Allow rich-text HTML content
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            $data['image'] = $this->fileUpload($request, 'image', 'image');
        }
    
        $data['user_id'] = auth()->id(); // Assign the authenticated user's ID
    
        Post::create($data);
    
        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully.');
    }
    
    public function show(Post $post)
    {
        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription(substr(strip_tags($post->description), 0, 160));
        SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(), 'property');
        SEOMeta::addKeyword([$post->title]);

        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all(); // Get all categories for the dropdown
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string', // Allow rich-text HTML content
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            
            $data['image'] = $this->fileUpload($request, 'image', 'image');
        }

        $post->update($data);

        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('posts.index')
                         ->with('success', 'Post deleted successfully.');
    }
    protected function fileUpload($request, $fileName, $destination)
    {
        if ($request->hasFile($fileName)) {
            $file = $request->file($fileName);
            $fileName = $fileName.'-'.Str::random(6).time().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'uploads/'.trim($destination, '/');

            // Ensure the destination directory exists
            if (! is_dir($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $fileName);

            return $destinationPath.'/'.$fileName;
        }

        return null;
    }
}
