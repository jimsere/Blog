@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$post->title}}</h1>
        <p>{{$post->body}}</p>
        @if(Auth::check() && Auth::user()->id == $post->user->id)
        <a href="{{route('post.edit', $post)}}"><div class="btn btn-primary">Edit Post</div></a>
        <a href="{{route('post.delete', $post)}}"><div class="btn btn-danger">Delete Post</div></a>
        @endif 
    </div>
@endsection
