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
            <select name="category" class="form-control" onchange="this.form.submit()" style="margin-top:20px">
              <option value="">Όλες οι κατηγορίες</option>
              <option value="Ψυχολογία" {{ request('category') == 'Ψυχολογία' ? 'selected' : '' }}>🧠Ψυχολογία</option>
              <option value="Μουσικη" {{ request('category') == 'Μουσικη' ? 'selected' : '' }}>🎵Μουσική</option>
              <option value="Πολιτικο" {{ request('category') == 'Πολιτικο' ? 'selected' : '' }}>📰Πολιτικό</option>
              <option value="Ταινιες" {{ request('category') == 'Ταινιες' ? 'selected' : '' }}>🎞️Ταινίες</option>
              <option value="Χομπι" {{ request('category') == 'Χομπι' ? 'selected' : '' }}>🎮Χόμπι</option>
              <option value="Αθληση" {{ request('category') == 'Αθληση' ? 'selected' : '' }}>⚽Αθληση</option>
              <option value="Βιβλία" {{ request('category') == 'Βιβλία' ? 'selected' : '' }}>📚 Βιβλία</option>
              <option value="Συνταγές / Φαγητό" {{ request('category') == 'Συνταγές / Φαγητό' ? 'selected' : '' }}>🍔 Συνταγές / Φαγητό</option>
              <option value="Τεχνολογία" {{ request('category') == 'Τεχνολογία	' ? 'selected' : '' }}>💻 Τεχνολογία</option>
              <option value="Ταξίδια" {{ request('category') == 'Ταξίδια' ? 'selected' : '' }}>✈️ Ταξίδια</option>
              <option value="Gaming	" {{ request('category') == 'Gaming			' ? 'selected' : '' }}>🎮 Gaming</option>
              <option value="Επικαιρότητα	" {{ request('category') == 'Επικαιρότητα' ? 'selected' : '' }}>📰 Επικαιρότητα	</option>
              <option value="Προσωπικά" {{ request('category') == 'Προσωπικά' ? 'selected' : '' }}>👤 Προσωπικά</option>
              <option value="Φύση & Περιβάλλον" {{ request('category') == 'Φύση & Περιβάλλον' ? 'selected' : '' }}>💡 🌿 Φύση & Περιβάλλον	</option>
              <option value="Χόμπι & DIY" {{ request('category') == 'Χόμπι & DIY' ? 'selected' : '' }}>🧵 Χόμπι & DIY</option>
            </select>
          </div>
          <div class="col-sm-2">
            <button class="btn btn-outline-success w-100" type="submit">Αναζήτηση</button>
          </div>
          @if (Auth::check())
          <div class="col-sm-2 text-end">
            <a href="{{ route('newpost') }}" class="btn btn-success w-100">Νέα Ανάρτηση</a>
          </div>
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
                 {!! strip_tags(Str::limit($post->body, 250)) !!}
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
