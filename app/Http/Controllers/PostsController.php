<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Purifier;
use App\Models\Post;
use Auth;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::all();
        // return $posts;
       return view('posts', ['posts' => $posts]);
        
    }

    public function hello($name){
        return "Hello $name";
    }

    public function newpost(Request $request)
{
    if ($request->isMethod('post')) {
        $post->slug = Str::slug($request->title);

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'nullable|string',
            'image' => 'nullable|image|max:1024', // Μέγιστο μέγεθος: 1MB
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = Purifier::clean($request->body);
        $post->category = $request->category;
        $post->user_id = Auth::id();

        // Αποθήκευση εικόνας αν υπάρχει
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/uploads', $filename);
            $post->image = $filename;
        }

        $post->save();

        return redirect('/posts')->with('success', 'Το post ανέβηκε με επιτυχία!');
    }

    return view('newpost');
}

public function search(Request $request)
{
    $q = $request->get('q');
    $category = $request->get('category');

    $query = Post::query();

    // Αν υπάρχει λέξη-κλειδί
    if (!empty($q)) {
        $query->where(function ($subQuery) use ($q) {
            $subQuery->where('title', 'like', '%' . $q . '%')
                     ->orWhere('body', 'like', '%' . $q . '%');
        });
    }

    // Αν υπάρχει επιλεγμένη κατηγορία
    if (!empty($category)) {
        $query->where('category', $category);
    }

    $posts = $query->get();

    return view('posts', ['posts' => $posts]);
}



public function post(Post $post)
{
    $postKey = 'viewed_post_' . $post->id;

    // Αν δεν υπάρχει ήδη στο session, αύξησέ το
    if (!session()->has($postKey)) {
        $post->increment('views');
        session()->put($postKey, true);
    }

    return view('post', compact('post'));
}


public function edit_post(Post $post, Request $request)
{
    if ($request->isMethod('post')) {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'nullable|string',
            'image' => 'nullable|image|max:1024', // 1MB μέγιστο
        ]);

        // Αντικαθιστούμε τα πεδία
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->category = $request->get('category');

        // Νέα εικόνα, αν υπάρχει
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/uploads', $filename);
            $post->image = $filename;
        }

        $post->save();

        return redirect('/posts')->with('success', 'Η ανάρτηση ενημερώθηκε με επιτυχία!');
    }

    return view('edit_post', ['post' => $post]);
}


public function delete_post(Post $post){
    if(\Auth::user()->id != $post->user->id) return redirect('posts');

    $post->delete();
    return redirect('posts');

   
}


}