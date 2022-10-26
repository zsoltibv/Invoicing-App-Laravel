@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="bg-container bg-gray-30 h-full">
    <div class="mx-auto container py-3 my-6 font-body md:px-0 px-3">
        <h3 class="text-2xl font-bold py-4 text-gray-800">Toate Facturile</h3>
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
                            Serie Factura
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Pret
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Data Emiterii
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Data Scadentei
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Achitat
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($user->dateFactura as $key=>$factura)

                    <tr class="border">
                        <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap">
                            {{$key+1}}
                        </th>
                        <td>
                            <a href="{{route('factura.show', $factura->url)}}" class="py-4 px-6 font-medium hover:underline">
                                {{$factura->serie}}
                            </a>
                        </td>
                        <td class="py-4 px-6 font-semibold text-emerald-600">
                            {{$factura->pret}}
                        </td>
                        <td class="py-4 px-6 font-medium">
                            {{$factura->data_emiterii}}
                        </td>
                        <td class="py-4 px-6 font-medium">
                            {{$factura->data_scadentei}}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                @if($factura->achitata == true)
                                <span
                                    class="inline-flex items-center p-1 mr-2 text-sm font-semibold text-blue-800 bg-blue-100 rounded-full dark:bg-blue-200 dark:text-blue-800">
                                    <svg aria-hidden="true" class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                @else
                                <span
                                    class="inline-flex items-center p-1 mr-2 text-sm font-semibold text-blue-800 bg-blue-100 rounded-full dark:bg-blue-200 dark:text-blue-800">
                                    <svg aria-hidden="true" class="w-3.5 h-3.5" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                @endif
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <form action="{{route('factura.destroy', $factura->id)}}" method="POST" style="display: inline;">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="font-medium text-red-500 hover:underline flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20"
                                        class="fill-red-500">
                                        <path d="M12 12h2v12h-2zm6 0h2v12h-2z" />
                                        <path
                                            d="M4 6v2h2v20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8h2V6zm4 22V8h16v20zm4-26h8v2h-8z" />
                                        <path fill="none" d="M0 0h32v32H0z" data-name="&lt;Transparent Rectangle&gt;" />
                                    </svg>
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