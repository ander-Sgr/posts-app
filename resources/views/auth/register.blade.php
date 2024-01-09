@extends('layouts.app')

@section('content')
<section class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white w-full max-w-md p-8 rounded-md shadow-md">
        <h1 class="text-3xl font-semibold text-center mb-6">Registrarse</h1>
        <form method="POST" action="/storeUser">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nombre de Usuario</label>
                <input value="{{old('name')}}"  type="text" id="name" name="name" class="w-full px-4 py-3 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-blue-300" placeholder="Introduce un nombre de usuario">
                @error('name')
                <p class="bg-red-500 text-white px-4 py-2 rounded-md m-2">
                    <span class="text-sm">{{ $message }}</span>
                </p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Correo electrónico</label>
                <input value="{{old('email')}}" type="email" id="email" name="email" class="w-full px-4 py-3 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-blue-300" placeholder="Introduce un correo electronico">
                @error('email')
                <p class="bg-red-500 text-white px-4 py-2 rounded-md m-2">
                    <span class="text-sm">{{ $message }}</span>
                </p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-medium mb-2">Contraseña</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-3 rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-blue-300" placeholder="Introduce una contraseña">
                @error('password')
                <p class="bg-red-500 text-white px-4 py-2 rounded-md m-2">
                    <span class="text-sm">{{ $message }}</span>
                </p>
                @enderror
            </div>
            <button type="submit" class="w-full py-3 rounded-md bg-blue-500 text-white font-semibold hover:bg-blue-600 transition duration-300">Registrarse</button>
        </form>
        <p class="mt-4 text-gray-600 text-center">¿Ya tienes una cuenta? <a href="/login" class="text-blue-500 hover:underline">Iniciar sesión</a></p>
    </div>
</section>
@endsection