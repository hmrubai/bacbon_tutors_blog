<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

// Public Routes
Route::get('/', [PublicPostController::class, 'latestPosts'])->name('public.home');
Route::get('/public/posts/details/{post}', [PublicPostController::class, 'details'])->name('public.posts.details');
Route::get('/public/categories/{category}', [PublicPostController::class, 'categoryPosts'])->name('public.categories.posts');
Route::get('/public/posts', [PublicPostController::class, 'allPosts'])->name('public.posts.all');
Route::get('/about', [AboutController::class, 'about'])->name('public.about');
Route::get('/contact', [ContactController::class, 'contact'])->name('public.contact');

Route::middleware(['auth', 'verified','roleChecker:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Point to the admin dashboard page
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::resource('posts', PostController::class);
    Route::resource('users', UserController::class);
    Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');
});


require __DIR__ . '/auth.php';
