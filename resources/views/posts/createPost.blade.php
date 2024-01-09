@extends('layouts.app')
@section('content')
    <div class="mt-20 flex justify-center items-center h-screen">
        <div class="w-full max-w-md bg-white p-6 rounded-md shadow-md">
            <h1 class="text-2xl font-bold mb-6">Crear Post</h1>
            <form action="{{ url('/createPost') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <!-- Campo Name -->
                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}" />

                <label for="name" class="block mb-2">Name</label>
                <input type="text" id="name" name="name" value=""
                    class="w-full px-4 py-2 mb-4 border rounded-lg">

                <!-- Input Image -->

                <label class="block mb-2 " for="fitx">Subir Imagen</label>
                <input
                    class=" mb-4 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none  dark:border-gray-600 dark:placeholder-gray-400"
                    id="fitx" name="fitx" type="file" accept="image/png, image/jpeg">

                <!-- Campo Slug -->
                <label for="slug" class="block mb-2">Slug</label>
                <input type="text" id="slug" name="slug" value=""
                    class="w-full px-4 py-2 mb-4 border rounded-lg">

                <!-- Campo Extract -->
                <label for="extract" class="block mb-2">Extract</label>
                <input type="text" id="extract" name="extract" value=""
                    class="w-full px-4 py-2 mb-4 border rounded-lg">

                <!-- Campo Body -->
                <label for="body" class="block mb-2">Body</label>
                <textarea id="body" name="body" rows="6" class="w-full px-4 py-2 mb-4 border rounded-lg"></textarea>

                <!-- Campo Status -->
                <label for="status" class="block mb-2">Status</label>
                <select id="status" name="status" class="w-full px-4 py-2 mb-4 border rounded-lg">
                    <option value="1">Publicado</option>
                    <option value="2">Sin publicar</option>
                </select>

                <!-- Campo Categoría -->

                <label for="category_id" class="block font-semibold mb-2">Categoría</label>
                <select name="category_id" id="category_id"
                    class="w-full bg-gray-100 border border-gray-300 rounded-md p-2">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}</option>
                    @endforeach
                    <option value="add-category">Agregar nueva categoría</option>
                    @include('posts/createCategory')
                </select>

                <!--campo tag tag -->
                <label for="status" class="block mb-2 mt-4">Introduce un Tag</label>

                <input type="text" id="tags-input"
                    class="block w-full py-2 pl-3 pr-10 mt-1 text-gray-900 placeholder-gray-500 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                <!-- Botón de Enviar -->
                <button type="submit" class="mt-5 bg-blue-500 text-white px-4 py-2 rounded-lg">Guardar cambios</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('formEdit.js') }}"></script>
@endsection
