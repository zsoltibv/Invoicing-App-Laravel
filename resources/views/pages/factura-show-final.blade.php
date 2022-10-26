@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container mx-auto py-3 my-6 px-3 md:px-0 font-body">
    <h3 class="text-2xl font-bold py-4 text-gray-800 border-b">Vizualizare Factura</h3>
    <div class="inner-container grid md:grid-cols-2">
        <div class="info text-md py-6">
            <div class="section py-3">
                <h2 class="py-3 font-semibold text-blue-700">Status:</span></h2>
                <div class="flex pl-4 text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" class="mr-2">
                        <path
                            d="M12.5 6.9c1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-.39.08-.75.21-1.1.36l1.51 1.51c.32-.08.69-.13 1.09-.13zM5.47 3.92 4.06 5.33 7.5 8.77c0 2.08 1.56 3.22 3.91 3.91l3.51 3.51c-.34.49-1.05.91-2.42.91-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c.96-.18 1.83-.55 2.46-1.12l2.22 2.22 1.41-1.41L5.47 3.92z" />
                    </svg>
                    <p> Neincasata<br><span class="text-red-600">(Rest de incasat {{$factura->pret}})</span></p>
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
                    <p>{{$factura->data_emiterii}}</p>
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
                    <p>{{$factura->data_scadentei}}</p>
                </div>
            </div>
        </div>
        <div class="factura h-full py-6">
            <div class="controls mb-3 flex justify-between">
                <div class="align-start">
                    <button
                        class="text-blue-700 font-semibold rounded-md h-10 text-sm flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                            class="mr-1.5 fill-blue-700">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-3.5-6H14a.5.5 0 1 0 0-1h-4a2.5 2.5 0 1 1 0-5h1V6h2v2h2.5v2H10a.5.5 0 1 0 0 1h4a2.5 2.5 0 1 1 0 5h-1v2h-2v-2H8.5v-2z" />
                        </svg>
                        {{ __('Incaseaza') }}
                    </button>
                </div>
                <div class="align-end flex gap-3">
                    <a href="{{Crypt::decrypt($factura->url)}}">
                        <button class="h-10 px-3 text-black font-medium text-sm rounded-md flex items-center">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                    class="mr-2">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M7 17h10v5H7v-5zm12 3v-5H5v5H3a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-2zM5 10v2h3v-2H5zm2-8h10a1 1 0 0 1 1 1v3H6V3a1 1 0 0 1 1-1z" />
                                </svg>
                                {{ __('Printeaza') }}
                            </div>
                        </button>
                    </a>
                    <a href="{{route('factura.download', $factura->url)}}" onclick="event.preventDefault();
                        document.getElementById('download').submit();">
                        <button
                            class="text-white rounded-md h-10 px-6 text-sm bg-blue-700 flex items-center justify-center">
                            {{ __('Descarca') }}
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" height="15"
                                class="fill-white ml-1.5">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path d="M3 19h18v2H3v-2zM13 9h7l-8 8-8-8h7V1h2v8z" />
                            </svg>
                            <form id="download"
                                action="{{ route('factura.download', $factura->url)}}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </button>
                    </a>
                </div>
            </div>
            <iframe src="{{route('factura.preview', Crypt::encrypt($factura->url))}}"
                class="w-full h-screen border rounded-md shadow-md"></iframe>
        </div>
    </div>

    @if(Session::has('message'))
        <div class="text-black text-md mt-3">{{Session::get('message')}}</div>
    @endif
    @endsection
</div>