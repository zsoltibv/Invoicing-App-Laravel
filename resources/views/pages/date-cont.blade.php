@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="bg-container bg-gray-30 h-full">
    <div class="mx-auto container py-3 my-6 font-body md:px-0 px-3">
        <h3 class="text-2xl font-bold py-4 text-gray-800 border-b">Date Con</h3>
        <form action="{{route('date-cont.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data" class="mt-6">
            @csrf
            {{method_field('PUT')}}
            <div
                class="control-wraper pt-3 grid grid-cols-1 lg:grid-cols-3 lg:gap-x-3 md:grid-cols-2 md:gap-x-3 text-sm">
                <div class="controls">
                    <label for="name" class="col-md-4 col-form-label">{{ __('Nume*') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="name" type="name" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                 @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required
                            autofocus>

                        @error('email')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="controls">
                    <label for="email" class="col-md-4 col-form-label">{{ __('Email*') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="email" type="email" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                 @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required
                            autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="controls">
                    <div class="">
                        <label for="old_password" class="col-md-4 col-form-label text-md-end">{{ __('Parola Curenta*')
                            }}</label>

                        <div class="py-3 flex flex-col">
                            <input id="old_password" type="password" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="old_password" required autocomplete="password">
                        </div>
                    </div>
                </div>
                <div class="controls">
                    <div class="">
                        <label for="new_password" class="col-md-4 col-form-label text-md-end">{{ __('Parola Noua')
                            }}</label>

                        <div class="py-3 flex flex-col">
                            <input id="new_password" type="password" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="new_password" autocomplete="new-password">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary text-white">
                <div class="pt-6">
                    <div class="rounded-md h-10 px-8 text-sm bg-blue-700 flex items-center justify-center">
                        {{ __('Modifica') }}
                    </div>
                </div>
            </button>
        </form>
        @if(Session::has('message'))
            <div class="text-black text-md mt-3">{{Session::get('message')}}</div>
        @endif
    </div>
</div>

@endsection