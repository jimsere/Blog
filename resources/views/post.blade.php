@extends('layouts.app')

@section('content')
<div class="container my-4" style="margin-top: 20px; margin-bottom: 20px;">

    <!-- Τίτλος -->
    <h1 class="text-center mb-3" style="font-size: 48px; font-weight: bold;">
        {{ $post->title }}
    </h1>

    <!-- Κατηγορία + Ημερομηνία -->
    <p class="text-center text-muted mb-4" style="font-size: 18px;">
        <strong>Κατηγορία:</strong> {{ $post->category }} &nbsp; | &nbsp;
        ⏰ {{ $post->created_at->format('d/m/Y H:i') }} &nbsp; | &nbsp;
        👁️ {{ $post->views }} προβολές
    </p>

    <!-- Εικόνα αν υπάρχει -->
    @if($post->image)
        <div class="text-center mb-4">
            <img src="{{ asset('storage/uploads/' . $post->image) }}" alt="Εικόνα άρθρου"
                 class="img-fluid rounded shadow" style="max-height: 500px;">
        </div>
    @endif

    <!-- Κείμενο -->
    <div class="mb-4" style="text-align: justify; font-size: 18px;">
        <div class="post-body">
            {!! $post->body !!}
        </div>
        
    </div>

    <!-- Buttons -->
    @if(Auth::check() && Auth::user()->id == $post->user->id)
        <div class="d-flex gap-2">
            <a href="{{ route('post.edit', $post) }}" class="btn btn-success">Επεξεργασία</a>
            <a href="{{ route('post.delete', $post) }}" class="btn btn-danger">Διαγραφή</a>
        </div>
    @endif

</div>
@endsection

