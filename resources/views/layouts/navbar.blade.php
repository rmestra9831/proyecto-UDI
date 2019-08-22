<!-- Navbar eliminado-->
<!--
<nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            Left Side Of Navbar 
            <ul class="navbar-nav mr-auto">
                <li>
                    <a class="navbar-brand mb-0 h1" id="h-content-img" href="#">
                        <img id="w-img-log" src="{{ asset('img/logo_udi.png') }}" alt="">
                        @if (Auth::check())
                            @if (Auth::user()->type_user == 1)
                                Administrador
                            @else
                                @if (Auth::user()->type_user == 2)
                                    Admisiones y Registro
                                @else
                                    @if (Auth::user()->type_user == 3)
                                    Direccion                                        
                                    @endif                                 
                                @endif
                            @endif 
                        @else
                            <strong>Sirc UDI</strong>
                        @endif
                    </a>
                </li>
            </ul>

            Right Side Of Navbar 
            <ul class="navbar-nav ml-auto">
                Authentication Links 
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="caret text-capitalize">{{ Auth::user()->name }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>-->