@extends('layouts.app')

@include('layouts.guest-nav')

@section('content')
<div class="container mx-auto px-4 flex items-center justify-center " style="height: 80vh;">
    <div class="py-6 font-body">
        <div class="">
            <div class="max-w-sm">
                <div class="card-header mb-6 text-2xl font-bold text-gray-700">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>

                            <div class="py-3 flex flex-col">
                                <input id="email" type="email" class="h-9 p-2 text-md bg-blue-100
                                 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback text-md" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="py-3 flex flex-col">
                                <input id="password" type="password" class="h-9 p-2 text-md bg-blue-100
                                 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="h-9 py-3 text-md bg-sky-700 flex items-center justify-center">
                                <button type="submit" class="btn btn-primary text-white">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            
                            <div class="pass-forget py-3">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
