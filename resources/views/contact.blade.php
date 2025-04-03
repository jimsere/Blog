@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h1 class="text-center mb-5" style="font-family: 'Great Vibes', cursive; font-size: 60px;">Επικοινωνήστε μαζί μας</h1>

    <div class="row g-5 flex-column flex-md-row">

        <!-- Info Icons -->
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="d-flex flex-column gap-4">

                <div class="d-flex flex-column align-items-center bg-light p-4 rounded text-center" style="box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);">
                    <i class="fa fa-phone fa-2x text-success mb-2"></i>
                    <h5 class="mb-1">Τηλέφωνο</h5>
                    <p class="mb-0">+30 23920 21983</p>
                </div>

                <div class="d-flex flex-column align-items-center bg-light p-4 rounded text-center" style="box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);">
                    <i class="fa fa-envelope fa-2x text-primary mb-2"></i>
                    <h5 class="mb-1">Email</h5>
                    <p class="mb-0">info@blog.com</p>
                </div>

                <div class="d-flex flex-column align-items-center bg-light p-4 rounded text-center" style="box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);">
                    <i class="fa fa-map-marker fa-2x text-danger mb-2"></i>
                    <h5 class="mb-1">Τοποθεσία</h5>
                    <p class="mb-0">Θεσσαλονίκη, Ελλάδα</p>
                </div>

            </div>
        </div>

        <!-- Contact Form -->
        <div class="col-md-6">
            <div class="p-4 bg-white rounded" style="box-shadow: 0 0 15px rgba(40, 167, 69, 0.2);">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
        
                    <div class="mb-3">
                        <label for="name" class="form-label">Όνομα</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="subject" class="form-label">Θέμα</label>
                        <input type="text" name="subject" class="form-control" id="subject">
                    </div>
        
                    <div class="mb-3">
                        <label for="message" class="form-label">Μήνυμα</label>
                        <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
                    </div>
        
                    <button type="submit" class="btn btn-success w-100">Αποστολή</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
