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
        $posts = Post::with('user')->get();

        // Νέα ενότητα: Αναφορές
        $reportedPosts = Post::with(['reports' => function ($query) {
            $query->select('id', 'post_id', 'reason');
        }])
        ->withCount('reports')
        ->has('reports')
        ->get();

        return view('dashboard', compact('users', 'posts', 'reportedPosts'));
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
