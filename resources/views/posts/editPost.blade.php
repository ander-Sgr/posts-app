@extends('layouts.app')
@section('content')
    <div class="mt-20 flex justify-center items-center h-screen">
        <div class="w-full max-w-md bg-white p-6 rounded-md shadow-md">
            <h1 class="text-2xl font-bold mb-6">Editar Post</h1>
            <form action="{{ url('/editPost/' . $post['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Campo Name -->
                <input type="hidden" name="id" value="{{ $post['id'] }}" />

                <label for="name" class="block mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ $post['name'] }}"
                    class="w-full px-4 py-2 mb-4 border rounded-lg">

                <!-- Campo Slug -->
                <label for="slug" class="block mb-2">Slug</label>
                <input type="text" id="slug" name="slug" value="{{ $post['slug'] }}"
                    class="w-full px-4 py-2 mb-4 border rounded-lg">

                <!-- Campo Extract -->
                <label for="extract" class="block mb-2">Extract</label>
                <input type="text" id="extract" name="extract" value="{{ $post['extract'] }}"
                    class="w-full px-4 py-2 mb-4 border rounded-lg">

                <!-- Campo Body -->
                <label for="body" class="block mb-2">Body</label>
                <textarea id="body" name="body" rows="6" class="w-full px-4 py-2 mb-4 border rounded-lg">{{ $post['body'] }}</textarea>

                <!-- Campo Status -->
                <label for="status" class="block mb-2">Status</label>
                <select id="status" name="status" class="w-full px-4 py-2 mb-4 border rounded-lg">
                    <option value="1" @if ($post['status'] == 1) selected @endif>Publicado</option>
                    <option value="2" @if ($post['status'] == 2) selected @endif>Sin publicar</option>
                </select>

                <!-- Campo Categoría -->

                <label for="category_id" class="block font-semibold mb-2">Categoría</label>
                <select name="category_id" id="category_id"
                    class="w-full bg-gray-100 border border-gray-300 rounded-md p-2">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($post->category->id == $category->id) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach
                    <option value="add-category">Agregar nueva categoría</option>
                    @include('posts/createCategory')
                </select>
                <!-- Botón de Enviar -->
                <button type="submit" class="mt-5 bg-blue-500 text-white px-4 py-2 rounded-lg">Guardar cambios</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('formEdit.js') }}"></script>
@endsection
