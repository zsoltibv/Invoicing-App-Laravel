@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container mx-auto py-3 my-6 px-3 font-body">
    <h3 class="text-2xl font-bold py-4 text-gray-800 border-b">Previzualizare Factura</h3>
    <div class="inner-container md:flex">
        <div class="info md:w-1/2 w-full text-md py-6">
            <h2 class="py-3"><span class="font-semibold text-blue-700">Status:</span> Neincasata</h2>
            <h2 class="py-3"><span class="font-semibold text-blue-700">Client:</span> Client</h2>
        </div>
        <div class="factura md:w-1/2 w-full h-full py-6">
            <div class="controls mb-3 flex justify-between">
                <div class="align-start">
                    <button class="text-blue-700 font-semibold rounded-md h-10 text-sm flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="mr-1.5 fill-blue-700"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-3.5-6H14a.5.5 0 1 0 0-1h-4a2.5 2.5 0 1 1 0-5h1V6h2v2h2.5v2H10a.5.5 0 1 0 0 1h4a2.5 2.5 0 1 1 0 5h-1v2h-2v-2H8.5v-2z"/></svg>
                        {{ __('Incaseaza') }}
                    </button>
                </div>
                <div class="align-end flex gap-3">
                    <button
                        class="h-10 px-3 text-black font-medium text-sm rounded-md flex items-center">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 17h10v5H7v-5zm12 3v-5H5v5H3a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-2zM5 10v2h3v-2H5zm2-8h10a1 1 0 0 1 1 1v3H6V3a1 1 0 0 1 1-1z"/></svg>
                            {{ __('Printeaza') }}
                        </div>
                    </button>
                    <button class="text-white rounded-md h-10 px-6 text-sm bg-blue-700 flex items-center justify-center">
                        {{ __('Descarca') }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" height="15"
                            class="fill-white ml-1.5">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path d="M3 19h18v2H3v-2zM13 9h7l-8 8-8-8h7V1h2v8z" />
                        </svg>
                    </button>
                </div>
            </div>
            <iframe src="{{route('factura.preview', $user->id, $preview)}}" frameborder="0"
                class="w-full h-screen border rounded-md"></iframe>
        </div>
    </div>
</div>

@endsection