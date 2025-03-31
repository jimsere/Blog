@extends('layouts.app')

@section('content')
    <div class="container my-4" style="margin-top: 20px; margin-bottom: 20px;">

        <h2 class="text-center mb-4" style="font-family: 'Great Vibes', cursive; font-size: 50px;">
            Δημιούργησε το δικό σου blog!
        </h2>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="title" placeholder="Τίτλος" class="form-control mb-3">

            <select name="category" class="form-control mb-3">
                <option value="" disabled selected>Επιλέξτε Κατηγορία</option>
                <option value="Ψυχολογία">🧠Ψυχολογία</option>
                <option value="Μουσικη">🎵Μουσική</option>
                <option value="Πολιτικο">📰Πολιτικό</option>
                <option value="Ταινιες">🎞️Ταινίες</option>
                <option value="Χομπι">🎮Χόμπι</option>
                <option value="Αθληση">⚽Αθληση</option>
            </select>

            <input type="file" name="image" class="form-control mb-3" accept="image/*">

            <textarea name="body" cols="30" rows="10" placeholder="Κείμενο" class="form-control mb-3"></textarea>

            <button class="btn btn-success">Ανάρτηση</button>
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
