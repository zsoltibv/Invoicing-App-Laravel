@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="bg-container bg-gray-30 h-full">
    <div class="mx-auto container py-3 my-6 font-body md:px-0 px-3">
        <h3 class="text-xl font-bold py-4 text-gray-800 border-b-2">Conturi Bancare</h3>
        <form action="{{route('date-bancare.store', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div
                class="control-wraper pt-3 grid grid-cols-1 lg:grid-cols-3 lg:gap-x-3 md:grid-cols-2 md:gap-x-3 text-sm">
                <div class="controls">
                    <label for="iban" class="col-md-4 col-form-label">{{ __('IBAN') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="iban" type="text" class="h-9 p-2 text-sm bg-blue-100
                                 @error('iban') is-invalid @enderror" name="iban" value="" required autofocus>

                        @error('iban')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="controls">
                    <label for="banca" class="col-md-4 col-form-label">{{ __('Banca') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="banca" type="text" class="h-9 p-2 text-sm bg-blue-100
                                 @error('banca') is-invalid @enderror" name="banca" value="" required
                            autocomplete="banca" autofocus>

                        @error('banca')
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
                            <select name="moneda" id="moneda" class="h-9 p-2 text-sm bg-blue-100 w-full">
                                <option value="ron">RON</option>
                                <option value="eur">EUR</option>
                                <option value="usd">USD</option>
                                <option value="huf">HUF</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary text-white">
                <div class="pt-6 w-32">
                    <div class="h-9 py-3 text-md bg-sky-700 flex items-center justify-center">
                        {{ __('Add Account') }}
                    </div>
                </div>
            </button>
        </form>
        @if(Session::has('message'))
            <div class="text-black text-md mt-3">{{Session::get('message')}}</div>
        @endif

        {{-- Table --}}

        <div class="overflow-x-auto relative mt-6">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-white uppercase bg-gray-700">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Nr Crt
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Iban
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Banca
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Moneda
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Folosit
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($user->contBancar as $key=>$cont)

                        <tr class="bg-gray-300 border-b">
                            <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap">
                                {{$key+1}}
                            </th>
                            <td class="py-4 px-6">
                                {{$cont->iban}}
                            </td>
                            <td class="py-4 px-6">
                                {{$cont->banca}}
                            </td>
                            <td class="py-4 px-6">
                                {{$cont->moneda}}
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    @if($cont->folosit == true)
                                        <input checked id="checked-checkbox" type="checkbox" value="" class="w-3.5 h-3.5 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    @else
                                        <input id="default-checkbox" type="checkbox" value="" class="w-3.5 h-3.5 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">    
                                    @endif    
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <form action="{{route('date-bancare.destroy', $cont->id)}}" method="POST" style="display: inline;">
                                    @csrf 
                                    {{method_field('DELETE')}}
                                    <button class="font-medium text-red-500 hover:underline">Sterge</button>
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