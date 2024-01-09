@extends('layouts.app')
@section('content')
    @foreach ($posts as $post)
        <div class="relative mt-20 mb-10 bg-white rounded-lg shadow-lg p-6">
            <div class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none hidden bg-blueGray-800">

                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center">
                    <li class="relative group">
                        <a href="{{ url('/viewPost/'.$post['id']) }}"
                            class="bg-blue flex items-center justify-center h-full px-3 py-2 text-gray-700 hover:bg-gray-200 transition duration-300">
                            <span class="text-sm font-medium">Ver post</span>
                        </a>
                    </li>
                </ul>
            </div>
            <h1 class="text-2xl font-semibold mb-2">{{ $post['name'] }}</h1>
            <p class="text-gray-600 mb-2">Slug: <span class="font-medium">{{ $post['name'] }}</span></p>
            <p class="text-gray-600 mb-2">Categoria: <span class="font-medium">{{ $post->category->name }}</span></p>
            <p class="text-gray-600 mb-2">Creado Por: <span class="font-medium"></span>{{ $post->user->name }}</p>
        </div>
    @endforeach
@endsection
