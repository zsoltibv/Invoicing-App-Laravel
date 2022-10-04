@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container mx-auto">
    <div class="factura max-w-xl">
        {!! $preview !!}
    </div>
</div>

@endsection