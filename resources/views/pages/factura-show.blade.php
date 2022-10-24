@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container mx-auto py-3 my-6">
    <h3 class="text-2xl font-bold font-body py-4 text-gray-800 border-b">Previzualizare Factura</h3>
    <div class="inner-container flex">
        <div class="info w-1/2 text-md py-6">
            <h2 class="font-body py-3"><span class="font-medium text-blue-700">Status:</span> Neincasata</h2>
            <h2 class="font-body py-3"><span class="font-medium text-blue-700">Client:</span> Client</h2>
        </div>
        <div class="factura w-1/2 h-full py-6">
            <iframe src="{{route('factura.preview', $user->id, $preview)}}" frameborder="0" class="w-full h-screen border"></iframe>
        </div>
    </div>

@endsection