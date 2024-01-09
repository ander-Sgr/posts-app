<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/clients" style="color:#777">
            <span style="font-size:15pt">&#128520;</span> LaMercè</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('') }}">
                        <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                        Ver mis posts 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/create') }}">
                        <span>&#10010;</span> Añadir Alumno
                    </a>
                </li>
            </ul>
        </div>
</nav>
