<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $posts = Post::all();
        return view('dashboard', compact('users', 'posts'));
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Ο χρήστης διαγράφηκε.');
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('success', 'Το post διαγράφηκε.');
    }
}
