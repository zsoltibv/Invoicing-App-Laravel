@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="bg-container bg-gray-30 h-full">
    <div class="mx-auto container py-3 my-6 font-body md:px-0 px-3">
        <h3 class="text-2xl font-bold py-4 text-gray-800 border-b">Emite Factura</h3>
        <form action="{{route('date-bancare.store', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data" class="mt-6">
            @csrf
            <div
                class="control-wraper pt-3 grid grid-cols-1 lg:grid-cols-2 lg:gap-x-3 md:grid-cols-2 md:gap-x-3 text-sm">
                <div class="controls">
                    <label for="client" class="col-md-4 col-form-label">{{ __('Nume client*') }}</label>
                        <div class="options py-3 flex">
                            <select name="client" id="client" class="rounded-l-md border-r-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($user->dateClient as $key=>$client)
                                    <option value="{{$client->id}}">{{$client->denumire}}</option>
                                @endforeach
                            </select>
                            <a href="{{route('account.date-clienti')}}" class="inline-flex items-center justify-center w-48 text-sm text-blue-700 font-medium rounded-r-md border border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="fill-blue-700 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="24" height="24"><path d="M17 15V8h-2v7H8v2h7v7h2v-7h7v-2z"/><path fill="none" d="M0 0h32v32H0z"/></svg>
                                <span class="">Client&nbsp;No</span>
                            </a>
                        </div>
                </div>
                <div class="controls">
                    <label for="produs" class="col-md-4 col-form-label">{{ __('Produs*') }}</label>
                        <div class="options py-3 flex">
                            <select name="produs" id="produs" class="rounded-l-md border-r-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($user->dateProdus as $key=>$produs)
                                    <option value="{{$produs->id}}">{{$produs->nume}}</option>
                                @endforeach
                            </select>
                            <a href="{{route('account.date-produse')}}" class="inline-flex items-center justify-center w-48 text-sm text-blue-700 font-medium rounded-r-md border border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="fill-blue-700 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="24" height="24"><path d="M17 15V8h-2v7H8v2h7v7h2v-7h7v-2z"/><path fill="none" d="M0 0h32v32H0z"/></svg>
                                <span class="">Produs&nbsp;Nou</span>
                            </a>
                        </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary text-white">
                <div class="pt-6">
                    <div class="rounded-md h-10 px-12 text-sm bg-blue-700 flex items-center justify-center">
                        {{ __('Emite') }}
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