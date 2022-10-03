@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="bg-container bg-gray-30 h-full">
    <div class="mx-auto container py-3 my-6 font-body md:px-0 px-3">
        <h3 class="text-2xl font-bold py-4 text-gray-800 border-b">Date Produse</h3>
        <form action="{{route('date-produse.store', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data" class="mt-6">
            @csrf
            <div
                class="control-wraper pt-3 grid grid-cols-1 xl:grid-cols-4 lg:grid-cols-3 lg:gap-x-3 md:grid-cols-2 md:gap-x-3 text-sm">
                <div class="controls">
                    <label for="nume" class="col-md-4 col-form-label">{{ __('Nume Produs*') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="nume" type="text" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                 @error('nume') is-invalid @enderror" name="nume" value="" required autofocus>

                        @error('nume')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="controls">
                    <label for="um" class="col-md-4 col-form-label">{{ __('Cantitate*') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="um" type="number" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                 @error('um') is-invalid @enderror" name="um" value="" required
                            autocomplete="um" autofocus>

                        @error('um')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="controls">
                    <label for="pret" class="col-md-4 col-form-label">{{ __('Pret*') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="pret" type="number" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                 @error('pret') is-invalid @enderror" name="pret" value="" required
                            autocomplete="pret" autofocus>

                        @error('pret')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="controls">
                    <div class="flex flex-col">
                        <label for="moneda" class="col-md-4 col-form-label text-md-end">{{ __('Moneda')
                            }}</label>

                        <div class="options py-3">
                            <select name="moneda" id="moneda" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="ron">RON</option>
                                <option value="eur">EUR</option>
                                <option value="usd">USD</option>
                                <option value="huf">HUF</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="controls">
                    <label for="cota_tva" class="col-md-4 col-form-label">{{ __('Cota TVA') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="cota_tva" type="number" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                 @error('cota_tva') is-invalid @enderror" name="cota_tva" value="19" required
                            autocomplete="cota_tva" autofocus>

                        @error('cota_tva')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="controls">
                    <label for="pret" class="col-md-4 col-form-label">{{ __('Pretul include TVA') }}</label>
                    <div class="py-3 flex items-center space-x-3">
                        <div class="flex items-center">
                            <input id="default-radio-1" type="radio" value="1" name="tva" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-700">DA</label>
                        </div>
                        <div class="flex items-center">
                            <input checked id="default-radio-2" type="radio" value="0" name="tva" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-700">NU</label>
                        </div>

                        @error('tva')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary text-white">
                <div class="pt-6">
                    <div class="rounded-md h-10 px-6 text-sm bg-blue-700 flex items-center justify-center">
                        {{ __('Adauga Produs') }}
                    </div>
                </div>
            </button>
        </form>
        @if(Session::has('message'))
            <div class="text-black text-md mt-3">{{Session::get('message')}}</div>
        @endif

        <div class="overflow-x-auto relative mt-6 rounded-t-md">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-500 uppercase bg-gray-100 border rounded-md">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Nr Crt
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Produs
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Cant.
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Pret
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Moneda
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Cota TVA
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Contine TVA?
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($user->dateProdus as $key=>$produs)

                        <tr class="border">
                            <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap">
                                {{$key+1}}
                            </th>
                            <td class="py-4 px-6 font-medium">
                                {{$produs->nume}}
                            </td>
                            <td class="py-4 px-6">
                                {{$produs->um}}
                            </td>
                            <td class="py-4 px-6 text-blue-700 font-medium">
                                {{$produs->pret}}
                            </td>
                            <td class="py-4 px-6 uppercase font-medium">
                                {{$produs->moneda}}
                            </td>
                            <td class="py-4 px-6">
                                {{$produs->cota_tva}}%
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    @if($produs->tva == true)
                                        <span class="inline-flex items-center p-1 mr-2 text-sm font-semibold text-blue-800 bg-blue-100 rounded-full dark:bg-blue-200 dark:text-blue-800">
                                            <svg aria-hidden="true" class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                        </span>
                                    @else
                                        <span class="inline-flex items-center p-1 mr-2 text-sm font-semibold text-blue-800 bg-blue-100 rounded-full dark:bg-blue-200 dark:text-blue-800">
                                            <svg aria-hidden="true" class="w-3.5 h-3.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </span>
                                    @endif    
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <form action="{{route('date-produse.destroy', $produs->id)}}" method="POST" style="display: inline;">
                                    @csrf 
                                    {{method_field('DELETE')}}
                                    <button class="font-medium text-red-500 hover:underline flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" class="fill-red-500"><path d="M12 12h2v12h-2zm6 0h2v12h-2z"/><path d="M4 6v2h2v20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8h2V6zm4 22V8h16v20zm4-26h8v2h-8z"/><path fill="none" d="M0 0h32v32H0z" data-name="&lt;Transparent Rectangle&gt;"/></svg>
                                        <p class="ml-1">Sterge</p>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach 

                </tbody>
            </table>
        </div>
        {{-- Table End --}}
    </div>
</div>

@endsection