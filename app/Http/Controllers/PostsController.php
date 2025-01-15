<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

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

    public function newpost(Request $request){
        if ($request->method() == 'POST'){
            $post = new Post();
            $post->title = $request->get('title');
            $post->body = $request->get('body');
           if ($post->save()){
                echo "Success";
                return redirect('/posts');
        };
    };
    return view("newpost");

}

public function search(Request $request){
    $q = $request->get('q','No results found');
    if (!$request->filled('q')) $q = "No results found";
    else{
      //$posts = Post::where('title', 'like', '%'.$q.'%')->get();
        $posts = Post::where('title', 'like', '%'.$q.'%')->orwhere('body', 'like', '%'.$q.'%')->get();
    }
    return view('posts',['posts' => $posts]);
}


public function post(Post $post){
    return view('post', ['post' => $post]);

   
}

public function edit_post(Post $post){
    return view('post', ['post' => $post]);

   
}

}