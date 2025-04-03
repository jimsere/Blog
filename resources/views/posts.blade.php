@extends('layouts.app')

@section('content')
<!-- blog section -->
<section class="blog_section layout_padding">
  <div class="container">
    <h2 class="text-center mb-4" style="font-family: 'Great Vibes', cursive; font-size: 88px;">Blogs</h2>

    <div class="d-flex justify-content-between align-items-center mb-4">
      <form class="form-inline w-100" method="GET" action="{{ route('search') }}">
        <div class="row w-100">
          <div class="col-sm-8">
            <input class="form-control w-100" type="search" placeholder="Αναζήτηση" aria-label="Search" name="q">
            @php
              $currentCategory = request()->segment(2); // π.χ. /category/Ψυχολογία → "Ψυχολογία"
            @endphp

            @php
            $categories = [
                'psikhologia' => '🧠 Ψυχολογία',
                'mousiki' => '🎵 Μουσική',
                'politiko' => '📰 Πολιτικό',
                'tainies' => '🎞️ Ταινίες',
                'hobby' => '🎮 Χόμπι',
                'athlisi' => '⚽ Άθληση',
                'vivlia' => '📚 Βιβλία',
                'syntages-faghto' => '🍔 Συνταγές & Φαγητό',
                'texnologia' => '💻 Τεχνολογία',
                'taxidia' => '✈️ Ταξίδια',
                'gaming' => '🎮 Gaming',
                'epikairotita' => '📰 Επικαιρότητα',
                'prosopika' => '👤 Προσωπικά',
                'fysi-perivallon' => '🌿 Φύση & Περιβάλλον',
                'idees-empnefsi' => '💡 Ιδέες & Έμπνευση',
                'hobby-diy' => '🧵 Χόμπι & DIY',
            ];

            $currentCategory = request()->segment(1); // π.χ. mousiki
            @endphp

<select class="form-control" onchange="if(this.value) window.location.href=this.value;" style="margin-top:20px">
  <option value="{{ url('/posts') }}">Όλες οι κατηγορίες</option>
  @foreach($categories as $slug => $label)
      <option value="{{ url("/category/$slug") }}" {{ request()->segment(2) == $slug ? 'selected' : '' }}>
          {{ $label }}
      </option>
  @endforeach
</select>





          </div>
          <div class="col-12 col-sm-6 col-md-2 mt-2 mt-md-0">
            <button class="btn btn-outline-success w-100" type="submit">Αναζήτηση</button>
          </div>          
          @if (Auth::check())
          @if (Auth::check())
          <div class="col-12 col-sm-6 col-md-2 mt-2 mt-md-0 text-sm-end">
            <a href="{{ route('newpost') }}" class="btn btn-success w-100">Νέα Ανάρτηση</a>
          </div>
          @endif

          @endif
        </div>
      </form>
    </div>
    

    <div class="row">
      @foreach($posts as $post)
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-4">
          <div class="box w-100">
            <div class="img-box">
              @if($post->image)
              <img src="{{ asset('storage/uploads/' . $post->image) }}" class="img-fluid post-img">
              @else
                <img src="{{ asset('images/b1.jpg') }}" alt="Προεπιλεγμένη εικόνα" class="img-fluid">
              @endif
            </div>
            <div class="detail-box">
              <h5>{{ $post->title }}</h5>
              <p style="
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
              ">
              {{ Str::limit(strip_tags(html_entity_decode($post->body)), 250) }}
              </p>
              <p><strong>Κατηγορία:</strong> {{ $post->category }}</p>
              <a href="{{ route('post', $post->slug) }}">Περισσότερα</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    

  </div>
</section>
<!-- end blog section -->
@endsection
