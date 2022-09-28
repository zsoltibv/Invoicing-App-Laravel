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
                    <label for="iban" class="col-md-4 col-form-label">{{ __('IBAN*') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="iban" type="text" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                 @error('iban') is-invalid @enderror" name="iban" value="" required autofocus>

                        @error('iban')
                        <span class="invalid-feedback text-md" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="controls">
                    <label for="banca" class="col-md-4 col-form-label">{{ __('Banca*') }}</label>
                    <div class="py-3 flex flex-col">
                        <input id="banca" type="text" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
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
                        <label for="moneda" class="col-md-4 col-form-label text-md-end">{{ __('Moneda*')
                            }}</label>

                        <div class="options py-3">
                            <select name="moneda" id="moneda" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full">
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
                    <div class="rounded-md h-9 py-3 text-sm bg-blue-700 flex items-center justify-center">
                        {{ __('Adauga Cont') }}
                    </div>
                </div>
            </button>
        </form>
        @if(Session::has('message'))
            <div class="text-black text-md mt-3">{{Session::get('message')}}</div>
        @endif

        {{-- Table --}}

        <div class="overflow-x-auto relative mt-6 rounded-t-md">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-500 uppercase bg-gray-100 border rounded-md">
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

                        <tr class="border-r border-l border-b text-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap">
                                {{$key+1}}
                            </th>
                            <td class="py-4 px-6 text-gray-900 font-medium">
                                {{$cont->iban}}
                            </td>
                            <td class="py-4 px-6 text-blue-700">
                                {{$cont->banca}}
                            </td>
                            <td class="py-4 px-6 uppercase font-semibold">
                                {{$cont->moneda}}
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    @if($cont->folosit == true)
                                        <input checked id="checked-checkbox" type="checkbox" value="" class="w-3.5 h-3.5 text-blue-700 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    @else
                                        <input id="default-checkbox" type="checkbox" value="" class="w-3.5 h-3.5 text-blue-700 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">    
                                    @endif    
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <form action="{{route('date-bancare.destroy', $cont->id)}}" method="POST" style="display: inline;">
                                    @csrf 
                                    {{method_field('DELETE')}}
                                    <button class="font-medium text-red-500 hover:underline flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" class="fill-red-500"><path d="M12 12h2v12h-2zm6 0h2v12h-2z"/><path d="M4 6v2h2v20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8h2V6zm4 22V8h16v20zm4-26h8v2h-8z"/><path fill="none" d="M0 0h32v32H0z" data-name="&lt;Transparent Rectangle&gt;"/></svg>
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