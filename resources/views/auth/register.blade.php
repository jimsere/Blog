@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 60px; margin-bottom: 60px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-4 border-success">
                <div class="card-header text-center bg-white border-success">
                    <h4 class="text-success mb-0">{{ __('Δημιουργία Λογαριασμού') }}</h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Όνομα') }}</label>
                            <input id="name" type="text"
                                   class="form-control border-success @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autofocus>

                            @error('name')
                                <span class="invalid-feedback d-block mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email"
                                   class="form-control border-success @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required>

                            @error('email')
                                <span class="invalid-feedback d-block mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Κωδικός') }}</label>
                            <input id="password" type="password"
                                   class="form-control border-success @error('password') is-invalid @enderror"
                                   name="password" required>

                            @error('password')
                                <span class="invalid-feedback d-block mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Επιβεβαίωση Κωδικού') }}</label>
                            <input id="password-confirm" type="password"
                                   class="form-control border-success"
                                   name="password_confirmation" required>
                        </div>

                        {{-- Submit Button --}}
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4">
                                {{ __('Εγγραφή') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
