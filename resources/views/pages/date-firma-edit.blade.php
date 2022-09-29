@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="bg-container bg-gray-30 h-full">
    <div class="mx-auto container py-3 my-6 font-body md:px-0 px-3">

        <h3 class="text-2xl font-bold py-4 text-gray-800 border-b">Date Firma</h3>
        <form action="{{route('date-firma.update', $user->dateFirma->id)}}" method="POST" enctype="multipart/form-data" class="mt-6">
            @csrf
            {{method_field('PUT')}}
            <div
                class="control-wraper pt-3 grid grid-cols-1 xl:grid-cols-4 lg:grid-cols-3 lg:gap-x-3 md:grid-cols-2 md:gap-x-3 text-sm">
                <div class="controls">
                    <label for="nume_firma" class="col-md-4 col-form-label">{{ __('Denumire Firma*') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="nume_firma" type="text" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                 @error('nume_firma') is-invalid @enderror" name="nume_firma" value="{{$user->dateFirma->denumire}}" required autofocus>

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
                        <input id="adresa" type="text" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                 @error('adresa') is-invalid @enderror" name="adresa" value="{{$user->dateFirma->adresa}}" required
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
                        <input id="cod_fiscal" type="text" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                 @error('cod_fiscal') is-invalid @enderror" name="cod_fiscal" value="{{$user->dateFirma->cui}}" required
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
                        <input id="reg_comertului" type="text" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                 @error('reg_comertului') is-invalid @enderror" name="reg_comertului" value="{{$user->dateFirma->reg_com}}" required
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
                        <input id="reg_comertului" type="text" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                 @error('judet') is-invalid @enderror" name="judet" value="{{$user->dateFirma->judet}}" required
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
                        <input id="reg_comertului" type="text" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                 @error('localitate') is-invalid @enderror" name="localitate" value="{{$user->dateFirma->localitate}}" required
                            autocomplete="localitate" autofocus>

                        @error('localitate')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="controls flex space-x-3">
                <a href="{{route('account.date-firma')}}">
                    <div class="pt-6">
                        <div class="h-10 px-9 text-blue-700 border border-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            {{ __('Inapoi') }}
                        </div>
                    </div>
                </a>
                <button type="submit" class="btn btn-primary text-white">
                    <div class="pt-6 w-32">
                        <div class="rounded-md h-10 py-3 text-sm bg-blue-700 flex items-center justify-center">
                            {{ __('Modificare') }}
                        </div>
                    </div>
                </button>
            </div>
        </form>
        @if(Session::has('message'))
            <div class="text-black text-md mt-3">{{Session::get('message')}}</div>
        @endif
    </div>
</div>

@endsection