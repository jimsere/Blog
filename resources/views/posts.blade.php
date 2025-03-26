@extends('layouts.app')

@section('content')
<!-- blog section -->
<section class="blog_section layout_padding">
  <div class="container">

    @if (Auth::check())
      <a href="{{route('newpost')}}">New Post</a>
    @endif

    <div class="d-flex justify-content-center mb-4">
      <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('search') }}">
        <div class="row justify-content-center">
          <div class="col-sm-8">
            <input class="form-control" type="search" placeholder="Αναζήτηση" aria-label="Search" name="q">
          </div>
          <div class="col-sm-4">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </div>
        </div>
      </form>
    </div>

    <div class="row">
      @foreach($posts as $post)
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-4">
          <div class="box w-100">
            <div class="img-box">
              <img src="images/b1.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>{{ $post->title }}</h5>
              <p>{{ $post->body }}</p>
              <a href="{{ route('post', $post) }}">Read more</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>
<!-- end blog section -->
@endsection
