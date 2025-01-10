@extends('layouts.layout')

@section('content')
    <div class="container d-flex justify-content-center flex-wrap">
        @foreach ($posts as $post)
            <div class="card my-3 mx-2 shadow-lg" style="width: 18rem; border-radius: 15px; overflow: hidden;">
                <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Card Image">
                <div class="card-body text-center">
                    <h5 class="card-title" style="font-weight: bold;">{{$post->title}}</h5>
                    <p class="card-text text-muted">{{$post->body}}</p>
                    <button type="button" class="btn btn-outline-primary btn-sm" data-mdb-ripple-init>
                        Learn More
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
