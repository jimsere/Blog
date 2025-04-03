@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-5" style="font-family: 'Great Vibes', cursive; font-size: 50px;">
    Προφίλ Χρήστη
  </h2>

  {{-- Φόρμα --}}
  <div class="card p-4 mb-5 shadow-sm">
    <form method="POST" action="{{ route('profile.update') }}">
      @csrf

      <div class="mb-3">
        <label>Ονοματεπώνυμο</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
      </div>

      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
      </div>

      <div class="mb-3">
        <label>Νέος Κωδικός (προαιρετικό)</label>
        <input type="password" name="password" class="form-control">
      </div>

      <div class="mb-3">
        <label>Επιβεβαίωση Κωδικού</label>
        <input type="password" name="password_confirmation" class="form-control">
      </div>

      <button class="btn btn-success">Αποθήκευση</button>
    </form>
  </div>

  {{-- Posts χρήστη --}}
  <section class="blog_section">
    <div class="container">
      <h3 class="mb-4">Τα δικά σου άρθρα</h3>
      <div class="row">
        @forelse($posts as $post)
          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-4">
            <div class="box w-100">
              <div class="img-box">
                @if($post->image)
                <img src="{{ asset('storage/uploads/' . $post->image) }}" class="img-fluid post-img">
                @else
                  <img src="{{ asset('images/b1.jpg') }}" class="img-fluid">
                @endif
              </div>
              <div class="detail-box">
                <h5>{{ $post->title }}</h5>
                <p style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                  {{ Str::limit(strip_tags(html_entity_decode($post->body)), 250) }}
                </p>
                <a href="{{ route('post', $post) }}">Περισσότερα</a>
              </div>
            </div>
          </div>
        @empty
          <p class="text-muted">Δεν έχεις δημιουργήσει ακόμα άρθρα.</p>
        @endforelse
      </div>
    </div>
  </section>
</div>
@endsection
