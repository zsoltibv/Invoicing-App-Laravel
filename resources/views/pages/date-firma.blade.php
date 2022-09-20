@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="bg-container bg-gray-30 h-full">
    <div class="mx-auto container py-3 my-6 font-body md:px-0 px-3">
        <h3 class="text-xl font-bold py-4 text-gray-800 border-b-2">Date Firma</h3>
        <form action="" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div
                class="control-wraper pt-3 grid grid-cols-1 xl:grid-cols-4 lg:grid-cols-3 lg:gap-x-3 md:grid-cols-2 md:gap-x-3 text-sm">
                <div class="controls">
                    <label for="nume_firma" class="col-md-4 col-form-label">{{ __('Denumire Firma*') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="nume_firma" type="text" class="h-9 p-2 text-sm bg-blue-100
                                 @error('nume_firma') is-invalid @enderror" name="nume_firma" value="" required autofocus>

                        @error('nume_firma')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="controls">
                    <label for="adresa" class="col-md-4 col-form-label">{{ __('Adresa*') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="adresa" type="text" class="h-9 p-2 text-sm bg-blue-100
                                 @error('adresa') is-invalid @enderror" name="adresa" value="" required
                            autocomplete="adresa" autofocus>

                        @error('banca')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="controls">
                    <label for="cod_fiscal" class="col-md-4 col-form-label">{{ __('Cod Fiscal*') }}</label>
                    <div class="py-3 flex items-center">
                        {{-- form to autocomplete --}}
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="35" height="35" class="p-1 bg-sky-800 fill-white"><path d="M23.5 22H23v-2h.5a4.5 4.5 0 0 0 .36-9H23l-.1-.82a7 7 0 0 0-13.88 0L9 11h-.86a4.5 4.5 0 0 0 .36 9H9v2h-.5A6.5 6.5 0 0 1 7.2 9.14a9 9 0 0 1 17.6 0A6.5 6.5 0 0 1 23.5 22Z"/><path d="M17 26.17V14h-2v12.17l-2.59-2.58L11 25l5 5 5-5-1.41-1.41L17 26.17z"/><path fill="none" d="M0 0h32v32H0z" data-name="&lt;Transparent Rectangle&gt;"/></svg>
                        </button>
                        {{-- end --}}
                        <input id="cod_fiscal" type="text" class="h-9 p-2 text-sm bg-blue-100 w-full
                                 @error('cod_fiscal') is-invalid @enderror" name="cod_fiscal" value="" required
                            autocomplete="cod_fiscal" autofocus>

                        @error('cod_fiscal')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="controls">
                    <label for="reg_comertului" class="col-md-4 col-form-label">{{ __('Reg. Comertului*') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="reg_comertului" type="text" class="h-9 p-2 text-sm bg-blue-100
                                 @error('reg_comertului') is-invalid @enderror" name="reg_comertului" value="" required
                            autocomplete="reg_comertului" autofocus>

                        @error('reg_comertului')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="controls">
                    <label for="judet" class="col-md-4 col-form-label">{{ __('Judet*') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="reg_comertului" type="text" class="h-9 p-2 text-sm bg-blue-100
                                 @error('judet') is-invalid @enderror" name="judet" value="" required
                            autocomplete="judet" autofocus>

                        @error('judet')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="controls">
                    <label for="localitate" class="col-md-4 col-form-label">{{ __('Localitate*') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="reg_comertului" type="text" class="h-9 p-2 text-sm bg-blue-100
                                 @error('localitate') is-invalid @enderror" name="localitate" value="" required
                            autocomplete="localitate" autofocus>

                        @error('localitate')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="controls">
                    <label for="localitate" class="col-md-4 col-form-label">{{ __('Email') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="email" type="email" class="h-9 p-2 text-sm bg-blue-100
                                 @error('localitate') is-invalid @enderror" name="email" value="" required
                            autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary text-white">
                <div class="pt-6 w-32">
                    <div class="h-9 py-3 text-md bg-sky-700 flex items-center justify-center">
                        {{ __('Adaugare') }}
                    </div>
                </div>
            </button>
        </form>
        @if(Session::has('message'))
            <div class="text-black text-md mt-3">{{Session::get('message')}}</div>
        @endif
    </div>
</div>

<div class="mx-auto container bg-gray-300 py-3 my-6 px-3">
    <p>date firma</p>
    <a href="{{route('account.getdetails')}}" class="text-blue-500">link</a>
</div>

@endsection