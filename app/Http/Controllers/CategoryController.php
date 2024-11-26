<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all categories
        $categories = Category::all();

        // Check if editing is requested
        $editCategory = null;
        if ($request->has('edit')) {
            $editCategory = Category::find($request->edit);
        }

        return view('admin.categories.index', compact('categories', 'editCategory'));
    }

    public function store(Request $request)
    {
        // Validate and create a new category
        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'status' => 'required|boolean',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, Category $category)
    {
        // Validate and update the existing category
        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'status' => 'required|boolean',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // Handle deletion of a category
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
