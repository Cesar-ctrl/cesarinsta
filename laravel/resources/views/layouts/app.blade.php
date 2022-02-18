<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mini Instagramm') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/like.js') }}" defer></script>
    <script src="{{ asset('js/actuallike.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        {{-- <header> --}}
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Mini Instagr') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                            <li class="nav-item">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                @if(Auth::user()->image)
                                <div class="container-avatar">
                                    <img src="{{ route('user.avatar',['filename'=>Auth::user()->image]) }}"
                                        class="avatar" width="40"/>
                                </div>
                                @endif
                                
                               <a class="nav-item" href="{{ route('home') }}">
                                    {{ __('Inicio') }}
                                </a>
                                <a class="nav-item" href="{{ route('config',array("user" => Auth::user()->id)) }}">
                                    {{ __('Gente') }}
                                </a>
                                <a class="nav-item" href="{{ route('likes') }}">
                                    {{ __('Favorita') }}
                                </a>
                                <a class="nav-item" href="{{ route('image.create',["user" => Auth::user()->id]) }}">
                                    {{ __('Subir imagen') }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   <a class="dropdown-item" href="{{ route('user',["user" => Auth::user()->id]) }}">
                                        {{ __('Mi perfil') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('config',array("user" => Auth::user()->id)) }}">
                                        {{ __('Configuración') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        {{-- </header> --}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer">
    <div class="container">
        <span class="text-muted">Mi Instagram</span>
    </div>

</footer>
</body>

</html>