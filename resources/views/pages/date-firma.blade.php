@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="bg-container bg-gray-30 h-full">
    <div class="mx-auto container py-3 my-6 font-body md:px-0 px-3">

        <h3 class="text-xl font-bold py-4 text-gray-800 border-b-2">Date Firma</h3>
        @if($user->dateFirma)
            <div class="mx-auto container bg-gray-300 py-3 my-6 px-3 font-body text-sm">
                    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6 p-3 mb-4">
                        <div class="col">
                            <h3 class="uppercase font-bold">Denumire</h3>
                            <p class="mt-3">{{$user->dateFirma->denumire}}</p>
                        </div>
                        <div class="col">
                            <h3 class="uppercase font-bold">CUI</h3>
                            <p class="mt-3">{{$user->dateFirma->cui}}</p>
                        </div>
                        <div class="col">
                            <h3 class="uppercase font-bold">Reg. Comertului</h3>
                            <p class="mt-3">{{$user->dateFirma->reg_com}}</p>
                        </div>
                        <div class="col">
                            <h3 class="uppercase font-bold">Judet</h3>
                            <p class="mt-3">{{$user->dateFirma->judet}}</p>
                        </div>
                        <div class="col">
                            <h3 class="uppercase font-bold">Oras</h3>
                            <p class="mt-3">{{$user->dateFirma->judet}}</p>
                        </div>
                        <div class="col">
                            <h3 class="uppercase font-bold">Adresa</h3>
                            <p class="mt-3">{{$user->dateFirma->adresa}}</p>
                        </div>
                        <div class="col">
                            <h3 class="uppercase font-bold">Platitor TVA</h3>
                            <p class="mt-3">
                                @if($user->dateFirma->tva == 1)
                                    DA
                                @else
                                    NU
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="actions flex">
                        <form action="{{route('date-firma.destroy', $user->dateFirma->id)}}" method="POST" style="display: inline;">
                            @csrf 
                            {{method_field('DELETE')}}
                            <button class="font-medium text-red-500 hover:underline flex p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" class="fill-red-500"><path d="M12 12h2v12h-2zm6 0h2v12h-2z"/><path d="M4 6v2h2v20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8h2V6zm4 22V8h16v20zm4-26h8v2h-8z"/><path fill="none" d="M0 0h32v32H0z" data-name="&lt;Transparent Rectangle&gt;"/></svg>
                                <p class="ml-1">Sterge Firma</p>
                            </button>
                        </form>
                        <a href="{{route('date-firma.edit', $user->dateFirma->id)}}">
                            <button class="font-medium text-green-700 hover:underline flex p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" class="fill-green-700"><path d="M2 26h28v2H2zM25.4 9c.8-.8.8-2 0-2.8l-3.6-3.6c-.8-.8-2-.8-2.8 0l-15 15V24h6.4l15-15zm-5-5L24 7.6l-3 3L17.4 7l3-3zM6 22v-3.6l10-10 3.6 3.6-10 10H6z"/><path fill="none" d="M0 0h32v32H0z"/></svg>
                                <p class="ml-1">Modifica Date</p>
                            </button>
                        </a>
                    </div>
            </div>
        @else
            <div class="mx-auto containerpy-3 my-6 font-body text-sm">
                <div id="alert-border-1" class="flex p-4 mb-4 bg-red-100 border-t-4 border-red-500 dark:bg-red-200" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div class="ml-3 text-sm font-medium text-red-500">
                        Nu aveti nici-o firma adaugata la momentul actual.
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 dark:bg-red-200 text-red-500 focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 dark:hover:bg-red-300 inline-flex h-8 w-8" data-dismiss-target="#alert-border-1" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg aria-hidden="true" class="w-5 h-5 fill-red-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            </div>

            <form action="{{route('date-firma.getdetails', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data" class="mt-6">
                @csrf
                <label for="cod_fiscal" class="col-md-4 col-form-label">{{ __('Cod Fiscal*') }}</label>
                <div
                    class="control-wraper text-sm flex md:flex-row flex-col md:items-center">
                    <div class="controls">
                        <div class="py-3 flex flex-col">
                            <input id="cod_fiscal" type="text" class="h-9 p-2 text-sm bg-blue-100
                                    @error('cod_fiscal') is-invalid @enderror" name="cod_fiscal" value="" required autofocus>

                            @error('cod_fiscal')
                            <span class="invalid-feedback text-md" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="controls md:pl-3">
                        <button type="submit" class="btn btn-primary text-white">
                            <div class="w-44">
                                <div class="h-9 py-3 text-md bg-sky-700 flex items-center justify-center">
                                    <p class="pr-1">{{ __('Adaugare Firma') }}</p>
                                    <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="24" height="24"><path d="M17 15V8h-2v7H8v2h7v7h2v-7h7v-2z"/><path fill="none" d="M0 0h32v32H0z"/></svg>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
            @if(Session::has('message'))
                <div class="text-black text-md mt-3">{{Session::get('message')}}</div>
            @endif
        @endif
    </div>
</div>

@endsection