@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="bg-container bg-gray-30 h-full">
    <div class="mx-auto container py-3 my-6 font-body md:px-0 px-3">
        <h3 class="text-xl font-bold py-4 text-gray-800 border-b-2">Emite Factura</h3>
        <form action="{{route('date-bancare.store', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div
                class="control-wraper pt-3 grid grid-cols-1 lg:grid-cols-3 lg:gap-x-3 md:grid-cols-2 md:gap-x-3 text-sm">
                <div class="controls">
                    <label for="client" class="col-md-4 col-form-label">{{ __('Nume client*') }}</label>
                        <div class="options py-3">
                            <select name="client" id="client" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($user->dateClient as $key=>$client)
                                    <option value="{{$client->id}}">{{$client->denumire}}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="controls">
                    <label for="produs" class="col-md-4 col-form-label">{{ __('Produs*') }}</label>
                        <div class="options py-3">
                            <select name="produs" id="produs" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($user->dateProdus as $key=>$produs)
                                    <option value="{{$produs->id}}">{{$produs->nume}}</option>
                                @endforeach
                            </select>
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