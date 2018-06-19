<!DOCTYPE html>
<html lang="{{  app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if (isset($title)) 
            {{$title}}
        @else 
            LUBurger
        @endif
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
                        @if (!session()->exists('theme') || session('theme')=='light')
    <link href="{{ asset('css/light.css') }}" rel="stylesheet">
                        @else
    <link href="{{ asset('css/dark.css') }}" rel="stylesheet">
                        @endif 
    <style >
    * {font-family: 'Montserrat', sans-serif;}
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container top">
                <a class="navbar-brand" href="{{ url(App::getLocale()) }}">
                    {{ __('msg.home') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    @if (!Auth::guest())
                    <li><a class="navbar-brand" href="{{ url(App::getLocale().'/orders') }}">{{ __('msg.orders') }}</a></li>
                    <li><a class="navbar-brand" href="{{ url(App::getLocale().'/cart') }}">{{ __('msg.cart') }}</a></li>
                    @if (Auth::User()->isChef())
                    <li><a class="navbar-brand" href="{{ url(App::getLocale().'/ingredients') }}">{{ __('msg.ingred') }}</a></li>
                    <li><a class="navbar-brand" href="{{ url(App::getlocale().'/dish/add')}}">{{__('msg.NewDish')}}</a></li>
                    @elseif (Auth::User()->isAdmin())
                    <li><a class="navbar-brand" href="{{ url(App::getLocale().'/users') }}">{{ __('msg.users') }}</a></li>
                    @endif
                    @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li><a class="nav-link" href="{{ url('theme/light')}}">
                            <img style="height:22px;" src="{{ url('uploads/sun.png')}}" alt=""></a></li>
                        <li><a class="nav-link" href="{{ url('theme/dark')}}">
                            <img style="height:22px;" src="{{ url('uploads/moon.png')}}" alt=""></a></li>
                        <?php $langs=['en', 'lv', 'ru']; ?>
                        @foreach ($langs as $lang) 
                        <li><a class="nav-link" href="{{ url('lang/'.$lang)}}"><img style="height:22px;" src="{{ url('uploads/'.$lang.'.jpg')}}" alt=""></a></li>
                        @endforeach
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('msg.signin') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('msg.signup') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('msg.signout') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
