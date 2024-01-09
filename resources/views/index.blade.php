@extends('layouts.app')
@section('content')
    @auth
        @include('home')
    @else
        <section class="min-h-screen flex items-center justify-center bg-gray-100">
            <div class="bg-white w-full max-w-md p-8 rounded-md shadow-md">
                <h1 class="text-3xl font-semibold text-center mb-6">BIENVENIDO A POSTS APP</h1>
                <div class="relative">
                    <img src="{{ asset('images/post-image.jpg') }}" alt="Imagen de muestra" class="w-full rounded-md">
                </div>
            </div>
        </section>
    @endauth

@endsection
