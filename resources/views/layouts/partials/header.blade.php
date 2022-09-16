<header>
    <h1>Tony Sys</h1>
    <nav>
        <li>
            <a href="{{route('home')}}" class="{{request()->routeIS('home') ? 'active' : ''}}">Home</a>
        </li>
        <li>
            <a href="{{route('cursos.index')}}" class="{{request()->routeIS('cursos.*') ? 'active' : ''}}">Cursos</a></li>
        <li>
            <a href="{{route('nosotros')}}" class="{{request()->routeIS('nosotros') ? 'active' : ''}}">Nosotros</a>
        </li>

    </nav>
</header>