@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="bg-container bg-gray-30 h-full">
    <div class="mx-auto container py-3 my-6 font-body md:px-0 px-3">
        <h3 class="text-xl font-bold py-4 text-gray-800 border-b-2">Date Clienti</h3>
        <form action="" method="POST" enctype="multipart/form-data" class="mt-6">
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
                                <p class="pr-1">{{ __('Adaugare Client') }}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-white">
                                    <path d="M16.01 11H4v2h12.01v3L20 12l-3.99-4v3z"/>
                                </svg>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
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
                                    <button class="font-medium text-red-500 hover:underline flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" class="fill-red-500"><path d="M12 12h2v12h-2zm6 0h2v12h-2z"/><path d="M4 6v2h2v20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8h2V6zm4 22V8h16v20zm4-26h8v2h-8z"/><path fill="none" d="M0 0h32v32H0z" data-name="&lt;Transparent Rectangle&gt;"/></svg>
                                        <p class="ml-1">Sterge Cont</p>
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