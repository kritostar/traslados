<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/home"><strong>Traslados</strong> Gestión</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">

      <ul class="nav navbar-nav">
        <!-- Right Side Of Navbar -->

        <!-- Authentication Links -->
        @guest
        <li class="{{Request::is('/login') ? 'active' : ''}}"><a href="/login">Ingrese</a></li>
        @if (Route::has('register'))
        <li class="{{Request::is('/register') ? 'active' : ''}}"><a href="/register">Registrarse</a></li>
        @endif
        @else
        <li class="{{Request::is('/') ? 'active' : ''}}"><a href="/tramites">Listar</a></li>
        <li class="{{Request::is('tramite/alta') ? 'active' : ''}}"><a href="/tramite/alta">Alta</a></li>
        <li> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ Auth::user()->name }} - {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>

        @endguest

      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>