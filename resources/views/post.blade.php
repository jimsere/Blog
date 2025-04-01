@extends('layouts.app')

@section('content')
<div class="container my-4" style="margin-top: 20px; margin-bottom: 20px;">

    <!-- Τίτλος -->
    <h1 class="text-center mb-3" style="font-size: 48px; font-weight: bold;">
        {{ $post->title }}
    </h1>

    <!-- Κατηγορία + Ημερομηνία -->
    <div class="d-flex justify-content-center align-items-center mb-4 flex-wrap text-muted" style="font-size: 18px;">
        <div>
            <strong>Κατηγορία:</strong> {{ $post->category }} &nbsp; | &nbsp;
            ⏰ {{ $post->created_at->format('d/m/Y H:i') }} &nbsp; | &nbsp;
            👁️ {{ $post->views }} προβολές
        </div>
        <div class="ms-3">
            <a href="{{ route('post', $post->slug) }}" target="_blank" style="font-size: 14px; text-decoration: underline; color: #6c757d; margin-left:10px;">
                🔗Προβολή
            </a>
            &nbsp;|&nbsp;
            <a href="javascript:void(0);" onclick="copyToClipboard('{{ route('post', $post->slug) }}')" style="font-size: 14px; text-decoration: underline; color: #6c757d;">
                📋Αντιγραφή
            </a>
        </div>
    </div>
    

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
    <!-- Buttons -->
@if(Auth::check() && Auth::user()->id == $post->user->id)
<div class="d-flex justify-content-center flex-wrap gap-2 mt-4">
    <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-success">✏️ Επεξεργασία</a>
    <a href="{{ route('post.delete', $post->slug) }}" class="btn btn-danger">🗑️ Διαγραφή</a>
</div>
@endif

</div>
@endsection
<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function () {
            alert("Ο σύνδεσμος αντιγράφηκε!");
        }, function (err) {
            alert("Σφάλμα στην αντιγραφή.");
        });
    }
</script>