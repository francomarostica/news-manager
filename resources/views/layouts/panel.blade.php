<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Panel de control | NewsManager</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/pdc-styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/sweetalert.min.js') }}" defer></script>
        <script src="{{ asset('js/ws.js') }}"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        @include('common.logo')
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/panel/profile">{{ __('mi_profile.title') }}</a>
                            </li>
                            @if($request->user()->hasRole('admin') || $request->user()->hasRole('editor'))
                                <li class="nav-item">
                                    <a class="nav-link" href="/panel/articles">{{ __('articles.title') }}</a>
                                </li>
                            @endif
                            @if($request->user()->hasRole('admin') || $request->user()->hasRole('editor'))
                                <li class="nav-item">
                                    <a class="nav-link" href="/panel/categories">{{ __('categories.title') }}</a>
                                </li>
                            @endif
                            @if($request->user()->hasRole('admin'))
                                <li class="nav-item">
                                    <a class="nav-link" href="/panel/users">{{ __('users.title') }}</a>
                                </li>
                            @endif
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('auth.login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('auth.register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('auth.logout') }}
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
            </nav>
        </header>
        <div class="secondary-nav">
            <div class="container">
                @yield('commands-menu')
            </div>
        </div>
        <div class="container py-4">
            @yield('content')
        </div>
    </body>
    <footer class="text-center">
        <a href="https://github.com/fmarostica/news-manager">
            <img src="/images/GitHub-Mark-Light-32px.png" alt="Follow in GitHub.com" />
            <br/>
            <span>Follow the project on GitHub.com</span>
        </a>
    </footer>
</html>