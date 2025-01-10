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
Route::get('/posts',[PostsController::class, 'index'])->name('posts');


Route::get('/contactForm', function () {
    return view('contactForm')->name('contactForm');
});

Route::any('/newpost', [PostsController::class, 'newpost'])->name('newpost');//easy way to navigate in pages dynamically

Route::get('/post/{post}', [PostsController::class, 'post'])->name('post');//easy way to navigate in pages dynamically
