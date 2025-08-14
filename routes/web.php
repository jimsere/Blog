<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/posts', [PostsController::class, 'index'])->name('posts');

Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/about', fn() => view('about'))->name('about');
Route::any('/search', [PostsController::class, 'search'])->name('search');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::middleware('auth')->group(function () {
    Route::delete('/delete_post/{post:slug}', [PostsController::class, 'delete_post'])->name('post.delete');
    Route::any('/newpost', [PostsController::class, 'newpost'])->name('newpost');
    Route::any('/edit_post/{post:slug}', [PostsController::class, 'edit_post'])->name('post.edit');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// ✅ Μοναδική διαδρομή για μεμονωμένα posts
Route::get('/post/{post:slug}', [PostsController::class, 'post'])->name('post')->middleware('auth');

// ✅ Κατηγορίες
Route::get('/category/{slug}', [PostsController::class, 'category'])->name('category');

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
    Route::delete('/admin/user/{user}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
    Route::delete('/admin/post/{post}', [AdminController::class, 'deletePost'])->name('admin.post.delete');
});

Route::post('/report-post/{post}', [PostsController::class, 'report'])->name('post.report');
Route::view('/terms', 'terms')->name('terms');
