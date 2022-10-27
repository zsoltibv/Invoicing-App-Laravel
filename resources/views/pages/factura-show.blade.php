@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container mx-auto py-3 my-6 px-3 md:px-0 font-body">
    <h3 class="text-2xl font-bold py-4 text-gray-800 border-b">Previzualizare Factura</h3>
    <div class="inner-container grid md:grid-cols-2">
        <div class="info text-md py-6">
            <div class="section py-3">
                <h2 class="py-3 font-semibold text-blue-700">Status:</span></h2>
                <div class="flex pl-4 text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="mr-2">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M12 2a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0V3a1 1 0 0 1 1-1zm0 15a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0v-3a1 1 0 0 1 1-1zm10-5a1 1 0 0 1-1 1h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 1 1zM7 12a1 1 0 0 1-1 1H3a1 1 0 0 1 0-2h3a1 1 0 0 1 1 1zm12.071 7.071a1 1 0 0 1-1.414 0l-2.121-2.121a1 1 0 0 1 1.414-1.414l2.121 2.12a1 1 0 0 1 0 1.415zM8.464 8.464a1 1 0 0 1-1.414 0l-2.12-2.12a1 1 0 0 1 1.414-1.415l2.12 2.121a1 1 0 0 1 0 1.414zM4.93 19.071a1 1 0 0 1 0-1.414l2.121-2.121a1 1 0 1 1 1.414 1.414l-2.12 2.121a1 1 0 0 1-1.415 0zM15.536 8.464a1 1 0 0 1 0-1.414l2.12-2.121a1 1 0 0 1 1.415 1.414L16.95 8.464a1 1 0 0 1-1.414 0z" />
                    </svg>
                    <p> Neprocesata<br><span class="text-red-600">In curs de emitere.</span></p>
                </div>
            </div>
            <div class="section py-3">
                <h2 class="py-3 font-semibold text-blue-700">Client:</span></h2>
                <div class="flex items-center pl-4 text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="mr-2">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
                    </svg>
                    <p> {{$dateClient->denumire}} (CUI: {{$dateClient->cui}})</p>
                </div>
            </div>
            <div class="section py-3">
                <h2 class="py-3 font-semibold text-blue-700">Data Emiterii:</span></h2>
                <div class="flex items-center pl-4 text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" class="mr-2">
                        <path d="M15 11h2v9h-2zM13 2h6v2h-6z" />
                        <path
                            d="m28 9-1.42-1.41-2.25 2.25a10.94 10.94 0 1 0 1.18 1.65ZM16 26a9 9 0 1 1 9-9 9 9 0 0 1-9 9Z" />
                        <path fill="none" d="M0 0h32v32H0z" />
                    </svg>
                    <p> {{$dataEmiterii}} </p>
                </div>
            </div>
            <div class="section py-3">
                <h2 class="py-3 font-semibold text-blue-700">Data Scadentei:</span></h2>
                <div class="flex items-center pl-4 text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" class="mr-2">
                        <path d="M15 11h2v9h-2zM13 2h6v2h-6z" />
                        <path
                            d="m28 9-1.42-1.41-2.25 2.25a10.94 10.94 0 1 0 1.18 1.65ZM16 26a9 9 0 1 1 9-9 9 9 0 0 1-9 9Z" />
                        <path fill="none" d="M0 0h32v32H0z" />
                    </svg>
                    <p> {{$dataScadentei}} </p>
                </div>
            </div>
        </div>
        <div class="factura h-full py-6">
            <div class="controls mb-3 flex justify-between">
                <a href="{{url()->previous()}}">
                    <button
                        class="text-blue-700 font-semibold rounded-md h-10 text-sm flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20"
                            class="fill-blue-700 mr-2">
                            <path
                                d="M30 8h-4.1c-.5-2.3-2.5-4-4.9-4s-4.4 1.7-4.9 4H2v2h14.1c.5 2.3 2.5 4 4.9 4s4.4-1.7 4.9-4H30V8zm-9 4c-1.7 0-3-1.3-3-3s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3zM2 24h4.1c.5 2.3 2.5 4 4.9 4s4.4-1.7 4.9-4H30v-2H15.9c-.5-2.3-2.5-4-4.9-4s-4.4 1.7-4.9 4H2v2zm9-4c1.7 0 3 1.3 3 3s-1.3 3-3 3-3-1.3-3-3 1.3-3 3-3z" />
                            <path fill="none" d="M0 0h32v32H0z" />
                        </svg>
                        {{ __('Editeaza') }}
                    </button>
                </a>
                <a href="{{route('factura.store', Crypt::encrypt($invoice->url()))}}" onclick="event.preventDefault();
                        document.getElementById('store').submit();">
                    <button
                        class="text-white rounded-md h-10 px-6 text-sm bg-blue-700 flex items-center justify-center">
                        {{ __('Emite') }}
                        <form id="store" action="{{ route('factura.store',  Crypt::encrypt($invoice->url())) }}"
                            method="POST" class="d-none">
                            @csrf
                        </form>
                    </button>
                </a>
            </div>
        <iframe src="{{route('factura.preview', Crypt::encrypt($invoice->url()))}}"
                class="w-full h-screen border rounded-md shadow-md"></iframe>
        </div>
    </div>
</div>

@endsection