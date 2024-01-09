<!doctype html>

<head>
    <title>Gestió d'alumnes</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>


<body style="font-family: Open Sans, sans-serif;background-color:aliceblue">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/canela.jpg" alt="Alumnes" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                <a href="/registre" class="text-xs font-bold uppercase ">
                    Registre
                </a>

                <a href="/login" class="ml-6 text-xs font-bold uppercase ">
                    Login
                </a>


            </div>
        </nav>
        @yield('content')
    </section>
</body>

</html>