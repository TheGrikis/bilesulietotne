<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-static-top @if (Auth::guest()) fixed-top @endif text-center">
    <div class="container">
        <a class="navbar-brand" href="#"><img class="img-fluid rounded mx-auto d-block logo" src="{{ asset('assets/images/logo.png') }}" alt="Card image cap"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                &nbsp;
                @if (Auth::guest())
                    <li class="nav-item @if ( Request::is('/')) active @endif">
                        <a class="nav-link" href="/">Sākums</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#services">Risinājums</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Par mums</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Sazinieties</a></li>
                @else
                    <li class="nav-item  @if ( Request::is('events')) active @endif">
                      <a class="nav-link" href="/events">Pasākumi</a>
                    </li>
                    <li class="nav-item @if ( Request::is('tickets')) active @endif">
                        <a class="nav-link" href="/tickets">Manas biļetes</a>
                    </li>
                    <li class="nav-item @if ( Request::is('map')) active @endif">
                        <a class="nav-link" href="/map">Karte</a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav mr-right">
            @if (Auth::guest())
                <li class="nav-item"><a href="{{ route('login') }}"><button class="btn btn-outline-primary my-2 my-sm-0">Login</button></a></li>
                <li class="nav-item"><a href="{{ route('register') }}"><button class="btn btn-primary my-2 my-sm-0">Register</button></a></li>
                @else
                  <li class="nav-item">
                        <a class="nav-link" style="pointer-events: none; cursor: default;" href="">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a id="bilance" class="nav-link" style="pointer-events: none; cursor: default;" href=""><strong>0 ETH</strong></a>
                </li>
                <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button class="btn btn-outline-success my-2 my-sm-0">Logout</button></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       {{ csrf_field() }}
                    </form>
                </li>

            @endif
                </ul>
        </div>
    </div>
</nav>
