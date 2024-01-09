@extends('layouts.app')
@section('content')
    <div class="mt-20 bg-white rounded-lg shadow-lg p-6">
        @if ($post->user_id == auth()->user()->id)
            <div class="flex justify-end mt-4">
                <form action="{{url('/deletePost/'.$post->id)}}" method="POST"
                    class="bg-red-100 py-2 pl-2 pr-2 flex items-center justify-center text-red-500 hover:text-red-600 mr-2">
                    @csrf
                    <button>
                        <i class="fas fa-trash-alt mr-1"></i>
                        Borrar
                    </button>
                </form>
                <a href="{{ url('/editPost/' . $post->id) }}"
                    class="bg-blue-100 py-2 pl-2 pr-2  flex items-center justify-center text-blue-500 hover:text-blue-600">
                    <i class="fas fa-pencil-alt mr-1"></i>
                    Editar
                </a>
            </div>
        @endif

        <h1 class="text-2xl font-semibold mb-2">{{ $post['name'] }}</h1>
        <h2 class="text-gray-600 mb-2">Categoría: <span class="font-medium">{{ $post->category->name }}</span></h2>
        <img src="{{Storage::url($post->image->url)}}" alt="Imagen del Post" style="width: 500px; height: auto;" class="rounded-md mb-4">
        <p class="text-gray-600 mb-2">Slug: <span class="font-medium">{{ $post['slug'] }}</span></p>
        <p class="text-gray-600 mb-2">Número de Extracto: <span class="font-medium">{{ $post['extract'] }}</span></p>
        <p class="text-gray-700 mb-2"> {{ $post['body'] }} </p>
        <p class="text-gray-600 mb-2">Creado por: <span class="font-medium">{{ $post->user->name }}</span></p>
    </div>
@endsection
