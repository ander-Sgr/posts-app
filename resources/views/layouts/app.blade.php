<!doctype html>

<head>
    <title>GESTIO POSTS</title>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>


<body style="font-family: Open Sans, sans-serif;">
    <nav
        class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-blueGray-800">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start ">
                @auth
                <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                href="{{ url('/home') }}">POSTS APP</a>
                @else
                <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                href="{{ url('/') }}">POSTS APP</a>
                @endauth
            </div>
            <div class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none hidden bg-blueGray-800"
                id="example-collapse-navbar">
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center">
                    @auth
                    <li class="relative group">
                        <a href="#" class="mr-4 bg-white flex items-center justify-center h-full px-3 py-2 text-gray-700 hover:bg-gray-200 transition duration-300">
                            <span class="text-sm font-medium">Hola, {{ auth()->user()->name }}</span>
                        </a>
                    </li>
                    <li class="relative group">
                        <a href="{{ url('/viewCreatePost') }}" class="mr-4 bg-white flex items-center justify-center h-full px-3 py-2 text-gray-700 hover:bg-gray-200 transition duration-300">
                            <span class="text-sm font-medium">Crear un Post</span>
                        </a>
                    </li>
                    <li class="relative group">
                        <a href="{{ url('/myPosts') }}" class="mr-4 bg-white flex items-center justify-center h-full px-3 py-2 text-gray-700 hover:bg-gray-200 transition duration-300">
                            <span class="text-sm font-medium">Ver mis posts</span>
                        </a>
                    </li>
                    <form id="logout-form" action="/logout" method="POST">
                        @csrf
                        <button class="ml-4 bg-white hover:bg-red-100 text-red-600 text-sm font-medium px-3 py-2 rounded-md transition duration-300">
                            Cerrar Sesión
                        </button>
                    </form>
                    @else 
                    <li class="inline-block relative">
                        <a class="lg:text-white lg:hover:text-blueGray-200 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="{{ url('/login') }}">
                            Iniciar Sesion
                        </a>
                    </li>
                    <li class="flex items-center">
                        <a class="bg-white text-blueGray-700 active:bg-blueGray-50 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
                            href="{{ url('/register') }}">
                            REGISTRARSE
                        </a>
                    </li> 
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    @if (session()->has('registered'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed bottom-0 right-0 mb-4 mr-4 bg-green-200 text-green-800 px-4 py-2 rounded-md">
        <span class="text-sm font-semibold">¡Éxito!</span>
        <span class="text-sm">{{ session('registered') }}</span>
    </div> @endif
</body>

</html>
