@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 40px; margin-bottom: 40px;">
    <form action="{{ route('post.edit', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Τίτλος --}}
        <input type="text" name="title" placeholder="Title here" class="form-control mb-3" value="{{ $post->title }}">

        {{-- Κατηγορία --}}
        <select name="category" class="form-control mb-3">
            <option value="">Επιλέξτε Κατηγορία</option>
            <option value="Ψυχολογία" {{ $post->category == 'Ψυχολογία' ? 'selected' : '' }}>🧠 Ψυχολογία</option>
            <option value="Μουσικη" {{ $post->category == 'Μουσικη' ? 'selected' : '' }}>🎵 Μουσική</option>
            <option value="Πολιτικο" {{ $post->category == 'Πολιτικο' ? 'selected' : '' }}>📰 Πολιτικό</option>
            <option value="Ταινιες" {{ $post->category == 'Ταινιες' ? 'selected' : '' }}>🎞️ Ταινίες</option>
            <option value="Χομπι" {{ $post->category == 'Χομπι' ? 'selected' : '' }}>🎮 Χόμπι</option>
            <option value="Αθληση" {{ $post->category == 'Αθληση' ? 'selected' : '' }}>⚽ Αθληση</option>
        </select>

        {{-- Κείμενο --}}
        <textarea name="body" cols="30" rows="8" placeholder="Your text here" class="form-control mb-3">{{ $post->body }}</textarea>

        {{-- Προβολή τρέχουσας εικόνας --}}
        @if($post->image)
            <div class="mb-3">
                <p>Τρέχουσα εικόνα:</p>
                <img src="{{ asset('storage/uploads/' . $post->image) }}" alt="Εικόνα" class="img-fluid mb-2" style="max-height: 300px;">
            </div>
        @endif

        {{-- Επιλογή νέας εικόνας --}}
        <div class="mb-4">
            <label for="image" class="form-label">Αλλαγή εικόνας (προαιρετικά):</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        {{-- Κουμπί --}}
        <button type="submit" class="btn btn-success">Αποθήκευση Αλλαγών</button>
    </form>
</div>
@endsection


@push('scripts')
    <script src="https://cdn.tiny.cloud/1/dx3zgnqvq0m55ouzzvbgzrbqjxgprh94mnrtqscdp3pynjv1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea[name=body]',
            height: 300,
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            language: 'el'
        });
    </script>
@endpush