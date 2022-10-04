@extends('layouts.app')

@include('layouts.guest-nav')

@section('content')

<div class="hero relative" style="background-image: url('/img/hero.png'); background-repeat: no-repeat; background-position: right;  background-size: contain;">
    <div class="mx-auto container py-3 my-6 px-3">
        <div class="hero flex lg:items-center font-body" style="height: 65vh;">
            <div class="col-1">
                <h3 class="text-sm md:text-base text-blue-700 mb-3 font-medium">MEET FACTURIL</h3>
                <h1 class="text-2xl 2-xl:text-5xl lg:text-4xl md:text-3xl font-semibold md:pb-3">Simplifică emiterea facturilor.</h1>
                <h1 class="text-2xl 2-xl:text-5xl lg:text-4xl md:text-3xl font-semibold pb-14 md:pb-20">Amplifică încasările.</h1>
                <a href="{{route('register')}}" class="bg-black px-8 py-2.5 md:px-10 md:py-3.5 text-white text-sm">
                        Încearcă Gratuit
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
