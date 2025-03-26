<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('/posts', function () {
//     return view('posts', ['posts' => [
//         'post 1',
//         'post 2',
//         'post 3'       
//     ]]);
// });

Route::middleware('auth')->group(function () {
    Route::any('/newpost', [PostsController::class, 'newpost'])->name('newpost')->middleware('auth');//easy way to navigate in pages dynamically
    Route::get('/post/{post}', [PostsController::class, 'post'])->name('post')->middleware('auth');//easy way to navigate in pages dynamically
    Route::any('/edit_post/{post}', [PostsController::class, 'edit_post'])->name('post.edit')->middleware('auth');//easy way to navigate in pages dynamically
    Route::get('/delete_post/{post}', [PostsController::class, 'delete_post'])->name('post.delete');

});


Route::get('/posts',[PostsController::class, 'index'])->name('posts');


Route::get('/contactForm', function () {
    return view('contactForm')->name('contactForm');
});


Route::any('/search', [PostsController::class, 'search'])->name('search');

Route::get('/todo', function(){return view('todo');})->name('todo');

Route::get('/About', function(){return view('about');})->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');