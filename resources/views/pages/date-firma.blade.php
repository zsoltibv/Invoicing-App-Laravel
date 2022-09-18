@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="mx-auto container bg-gray-300 py-3 my-6 px-3">
    <p>date firma</p>
    <a href="{{route('account.getdetails')}}" class="text-blue-500">link</a>
</div>

@endsection