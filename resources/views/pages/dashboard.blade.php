@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="bg-container bg-gray-30 h-full">
    <div class="mx-auto container py-3 my-6 font-body md:px-0 px-3">

        <div class="header flex justify-between">
            <div class="title">
                <h3 class="text-2xl font-bold py-4 text-gray-800">Dashboard</h3>
                <p>Statistici pentru tine.</p>
            </div>
            <a href="{{route('account.factura')}}" class="mt-5 h-10 pl-3 pr-5 bg-blue-700 text-white text-sm rounded-md flex items-center">

                <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="24"
                    height="24">
                    <path d="M17 15V8h-2v7H8v2h7v7h2v-7h7v-2z" />
                    <path fill="none" d="M0 0h32v32H0z" />
                </svg>
                <p>Creaza Factura</p>
            </a>
        </div>

        <div
            class="mt-8 text-gray-700 control-wraper pt-3 grid grid-cols-1 xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 gap-6 text-sm">
            <div class="col-1 border border-gray-300 rounded-lg p-6">
                <div class="rounded-full bg-purple-50 flex items-center justify-center w-14 h-14">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32"
                        class="fill-purple-500">
                        <path
                            d="M16.67 13.13C18.04 14.06 19 15.32 19 17v3h4v-3c0-2.18-3.57-3.47-6.33-3.87zM15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4c-.47 0-.91.1-1.33.24a5.98 5.98 0 0 1 0 7.52c.42.14.86.24 1.33.24zm-6 0c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 7c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6 5H3v-.99C3.2 16.29 6.3 15 9 15s5.8 1.29 6 2v1z" />
                    </svg>
                </div>
                <div class="info">
                    <h2 class="text-md font-semibold uppercase mt-6">Clienti</h2>
                    <p class="text-4xl font-semibold mt-3 text-black">{{$user->dateClient->count()}}</p>
                </div>
            </div>
            <div class="col-2 border border-gray-300 rounded-lg p-6">
                <div class="rounded-full bg-yellow-50 flex items-center justify-center w-14 h-14">
                    <svg class="fill-yellow-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32"
                        height="32">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M15 4H5v16h14V8h-4V4zM3 2.992C3 2.444 3.447 2 3.999 2H16l5 5v13.993A1 1 0 0 1 20.007 22H3.993A1 1 0 0 1 3 21.008V2.992zM11 11V8h2v3h3v2h-3v3h-2v-3H8v-2h3z" />
                    </svg>
                </div>
                <div class="info">
                    <h2 class="text-md font-semibold uppercase mt-6">Facturi</h2>
                    <p class="text-4xl font-semibold mt-3 text-black">0</p>
                </div>
            </div>
            <div class="col-3 border border-gray-300 rounded-lg p-6">
                <div class="rounded-full bg-green-50 flex items-center justify-center w-14 h-14">
                    <svg class="fill-green-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32"
                        height="32">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M12 2a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0V3a1 1 0 0 1 1-1zm0 15a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0v-3a1 1 0 0 1 1-1zm10-5a1 1 0 0 1-1 1h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 1 1zM7 12a1 1 0 0 1-1 1H3a1 1 0 0 1 0-2h3a1 1 0 0 1 1 1zm12.071 7.071a1 1 0 0 1-1.414 0l-2.121-2.121a1 1 0 0 1 1.414-1.414l2.121 2.12a1 1 0 0 1 0 1.415zM8.464 8.464a1 1 0 0 1-1.414 0l-2.12-2.12a1 1 0 0 1 1.414-1.415l2.12 2.121a1 1 0 0 1 0 1.414zM4.93 19.071a1 1 0 0 1 0-1.414l2.121-2.121a1 1 0 1 1 1.414 1.414l-2.12 2.121a1 1 0 0 1-1.415 0zM15.536 8.464a1 1 0 0 1 0-1.414l2.12-2.121a1 1 0 0 1 1.415 1.414L16.95 8.464a1 1 0 0 1-1.414 0z" />
                    </svg>
                </div>
                <div class="info">
                    <h2 class="text-md font-semibold uppercase mt-6">Facturat</h2>
                    <p class="text-4xl font-semibold mt-3 text-black relative">4678 <span
                            class="ml-1 mt-1 font-medium text-sm absolute top-0">RON</span></p>
                </div>
            </div>
            <div class="col-4 border border-gray-300 rounded-lg p-6">
                <div class="rounded-full bg-purple-50 flex items-center justify-center w-14 h-14">
                    <svg class="fill-blue-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="32"
                        height="32">
                        <path
                            d="M320 144c-53.02 0-96 50.14-96 112 0 61.85 42.98 112 96 112 53 0 96-50.13 96-112 0-61.86-42.98-112-96-112zm40 168c0 4.42-3.58 8-8 8h-64c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h16v-55.44l-.47.31a7.992 7.992 0 0 1-11.09-2.22l-8.88-13.31a7.992 7.992 0 0 1 2.22-11.09l15.33-10.22a23.99 23.99 0 0 1 13.31-4.03H328c4.42 0 8 3.58 8 8v88h16c4.42 0 8 3.58 8 8v16zM608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zm-16 272c-35.35 0-64 28.65-64 64H112c0-35.35-28.65-64-64-64V176c35.35 0 64-28.65 64-64h416c0 35.35 28.65 64 64 64v160z" />
                    </svg>
                </div>
                <div class="info">
                    <h2 class="text-md font-semibold uppercase mt-6">INCASAT</h2>
                    <p class="text-4xl font-semibold mt-3 text-black relative">3560 <span
                            class="ml-1 mt-1 font-medium text-sm absolute top-0">RON</span></p>
                </div>
            </div>
        </div>
        <div class="details flex md:flex-row flex-col gap-6 py-8">
            <div class="recent-activity border border-gray-300 rounded-lg p-6 md:w-1/2 w-full">
                <h3 class="font-semibold">Facturi Recente</h3>
                <div class="content">
                    <div class="empty flex flex-col justify-center items-center h-64">
                        <h2 class="text-2xl font-medium mb-3">Nici-o activitate inca.</h2>
                        <p>Creaza o factura.</p>
                        <a href="{{route('account')}}" class="pt-7">
                            <button
                                class="cursor-not-allowed h-10 px-8 border border-gray-300 text-black font-medium text-sm rounded-md flex items-center">
                                <p>Vezi Facturi</p>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="recent-activity border border-gray-300 rounded-lg p-6 md:w-1/2 w-full">
                <h3 class="font-semibold">Produs Recente</h3>
                <div class="content">
                    @if($user->dateProdus->count() == 0)
                    <div class="empty flex flex-col justify-center items-center h-64">
                        <h2 class="text-2xl font-medium mb-3">Nici-un produs inca.</h2>
                        <p>Creaza o factura.</p>
                        <a href="{{route('account.date-produse')}}" class="pt-7">
                            <button
                                class="h-10 px-8 border border-gray-300 text-black font-medium text-sm rounded-md flex items-center">
                                <p>Creaza Produs</p>
                            </button>
                        </a>
                    </div>
                    @else
                    <div class="overflow-x-auto relative mt-6 px-2">
                        <table class="w-full text-sm text-left">
                            <tbody>
                                @foreach($user->dateProdus as $key=>$produs)

                                <tr class="">
                                    <th scope="row" class="font-medium whitespace-nowrap">
                                        <div class="flex items-center justify-center bg-gray-50 rounded-full h-9 w-9">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20"
                                                height="20">
                                                <path
                                                    d="m16.08 189.4 28.58 233.87A28 28 0 0 0 72.52 448h367a28 28 0 0 0 27.86-24.73l28.54-233.87A12 12 0 0 0 484 176H28a12 12 0 0 0-11.92 13.4zM464 124a28 28 0 0 0-28-28H244.84l-48-32H76a28 28 0 0 0-28 28v52h416z" />
                                            </svg>
                                        </div>
                                    </th>
                                    <td class="py-4 px-4 font-medium">
                                        {{$produs->nume}}
                                    </td>
                                    <td class="py-4 px-4 text-blue-700 font-medium">
                                        {{$produs->pret}}
                                    </td>
                                    <td class="py-4 px-4 uppercase font-medium">
                                        {{$produs->moneda}}
                                    </td>
                                    <td class="py-4 px-4">
                                        {{$produs->cota_tva}}%
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            @if($produs->tva == true)
                                            <span
                                                class="inline-flex items-center p-1 mr-2 text-sm font-semibold text-blue-800 bg-blue-100 rounded-full dark:bg-blue-200 dark:text-blue-800">
                                                <svg aria-hidden="true" class="w-3.5 h-3.5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                            @else
                                            <span
                                                class="inline-flex items-center p-1 mr-2 text-sm font-semibold text-blue-800 bg-blue-100 rounded-full dark:bg-blue-200 dark:text-blue-800">
                                                <svg aria-hidden="true" class="w-3.5 h-3.5" aria-hidden="true"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{-- Table End --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection