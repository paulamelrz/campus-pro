<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CampusPro - @yield('title')</title>
    <link rel = "icon" href = "{{ asset('images/logo.jfif') }}"  type = "image/x-icon"> 

      

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap ------->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    

	<!--Font Awesome Icons-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

   
</head>
<body>
    <div id="app">
        <nav class="navbar nav-bar navbar-expand-md navbar-light navbar-laravel">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img id=logo alt="CampusPro" class="logo" src="{{ asset('images/logo.jfif') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item active">
                        @if(Auth::user())
                            <a class="nav-link navlink scroll" href="/home">Home</a>
                        @else
                            <a class="nav-link navlink scroll" href="/">Home</a>
                        @endif
                        </li>
                        
                        <li class="nav-item">
                        @if(Auth::user())
                            <a class="nav-link navlink scroll" href="/stuChannels">Channels</a>
                        @else
                            <a class="nav-link navlink scroll" href="/channels">Channels</a>
                        @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navlink scroll" href="index.php?controller=Tutors">Tutors</a>
                        </li>
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item dropdown">
                                <a class="nav-link navlink dropdown-toggle" href="{{ route('login') }}" id="navbardrop" data-toggle="dropdown">
                                    {{ __('Login') }}
                                </a>
                                <div class="dropdown-menu" >
                                    <a class="dropdown-item" href="/login" >As Student</a>
                                    <a class="dropdown-item"  href="{{route('tutor.login')}}">As Tutor</a>
                                </div>
                            </li> 
                            @if (Route::has('register'))
                            <li class="nav-item dropdown">
                                <a class="nav-link navlink dropdown-toggle" style="margin-right:20px;" href="{{ route('register') }}" id="navbardrop" data-toggle="dropdown">{{ __('Register') }}</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"  href="/register">As Student</a>
                                    <a class="dropdown-item"  href="{{route('tutor.register')}}" >As Tutor</a>
                                </div>
                            </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link navlink dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    @if(Auth::guard('web')->check())
                                    <a class="dropdown-item" href="{{ route('student') }}">Dashboard</a>
                                    @elseif(Auth::guard('tutor')->check())
                                    <a class="dropdown-item" href="{{ route('tutor') }}">Dashboard</a>
                                    @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
        </nav>
       
            @yield('content')
     
    </div>

    <!-- Footer containing site map and social media links-->
    <div class="footer">
            <ul>
                <li><a href="#" class="footer-text">Home</a></li>
                <li><a href="#" class="footer-text">Courses</a></li>
                <li><a href="#" class="footer-text">Login</a></li>
                <li><a href="#" class="footer-text">Register</a></li>
            </ul>
            <hr>
    </div>
</body>
</html>