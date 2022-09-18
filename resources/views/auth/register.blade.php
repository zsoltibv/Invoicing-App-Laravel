@extends('layouts.app')

@include('layouts.guest-nav')

@section('content')
<div class="container mx-auto px-4 flex items-center justify-center " style="height: 80vh;">
    <div class="py-6 font-body">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-6 text-2xl font-bold text-gray-700">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="py-3 flex flex-col">
                                <input id="name" type="text" class="h-9 p-2 text-md bg-blue-100
                                 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="py-3 flex flex-col">
                                <input id="email" type="email" class="h-9 p-2 text-md bg-blue-100
                                 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="py-3 flex flex-col">
                                <input id="password" type="password" class="h-9 p-2 text-md bg-blue-100
                                 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="py-3 flex flex-col">
                                <input id="password-confirm" type="password" class="h-9 p-2 text-md bg-blue-100" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0 py-3">
                            <div class="h-9 py-3 text-md bg-sky-700 flex items-center justify-center">
                                <button type="submit" class="btn btn-primary text-white">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
