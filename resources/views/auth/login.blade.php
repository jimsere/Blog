@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 60px; margin-bottom: 60px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-4 border-success">
                <div class="card-header text-center bg-white border-success">
                    <h4 class="text-success mb-0">{{ __('Σύνδεση στον Λογαριασμό') }}</h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                       {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email"
                                class="form-control border-success @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autofocus>

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

                        {{-- Remember Me --}}
                        <div class="mb-3 form-check">
                            <input class="form-check-input border-success" type="checkbox" name="remember"
                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Να με θυμάσαι') }}
                            </label>
                        </div>


                        {{-- Submit --}}
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-success px-4">
                                {{ __('Σύνδεση') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="text-decoration-none text-success" href="{{ route('password.request') }}">
                                    {{ __('Ξέχασες τον κωδικό;') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
