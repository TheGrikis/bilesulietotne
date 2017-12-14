<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Biļešu lietotne</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                &nbsp;
                @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="#about-us">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                @else
                    <li class="nav-item @if ( Route::is('/')) active @endif">
                        <a class="nav-link" href="/">Sākums</a>
                    </li>
                    <li class="nav-item  @if ( Route::is('events')) active @endif">
                      <a class="nav-link" href="/events">Pasākumi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tickets">Biļetes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/map">Karte</a>
                    </li>
                @endif

            </ul>

            @if (Auth::guest())
                <li><a href="{{ route('login') }}"><button class="btn btn-outline-success my-2 my-sm-0">Login</button></a></li>
                <li><a href="{{ route('register') }}"><button class="btn btn-outline-success my-2 my-sm-0">Register</button></a></li>
                @else
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button class="btn btn-outline-success my-2 my-sm-0">Logout</button></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       {{ csrf_field() }}
                    </form>
                </li>
            @endif
        </div>
    </div>
</nav>
