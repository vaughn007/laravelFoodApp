<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('page_description', 'A cool social network to share your hobbies')">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title', 'Healthy Food')</title>
    


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{-- <header class="l-header" id="header">
            <nav class="nav bd-container">
                <a href="/hobby" class="nav__link" class="nav__logo">FoodstaEmmy</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        @auth
                        <li class="nav__item"><a {{ Request::is('home') ? ' active' : '' }} href="/home" class="nav__link active-link">Home</a></li>
                        @endauth

                        @guest
                        <li class="nav__item"><a {{ Request::is('/') ? ' active' : '' }} href="/" class="nav__link">Start</a></li>
                        @endguest
                        <li class="nav__item"><a {{ Request::is('info') ? ' active' : '' }} href="/info" class="nav__link">Info</a></li>
                        <li class="nav__item"><a {{ Request::is('hobby*') ? ' active' : '' }} href="/hobby" class="nav__link">Hobbyist Food</a></li>
                        <li class="nav__item"><a {{ Request::is('tag*') ? ' active' : '' }} href="/tag" class="nav__link">Tags</a></li>

                        @guest
                        <li class="nav__item"><a href="{{ route('login') }}" class="nav__link">{{ __('Login') }}</a></li>


                        @if (Route::has('register'))
                        <li class="nav__item"><a href="{{ route('register') }}" class="nav__link">{{ __('Register') }}</a></li>
                        @endif

                        @else
                        <li class="nav__item"><a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                        <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header> --}}

        
        <header class="l-header" id="header">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand  font-weight-bold" href="{{ url('/') }}">
                    Tasty<span class="text-success">CleanEat</span>
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li><a class="nav-link {{ Request::is('home') ? ' active' : '' }}" href="/home">Dashboard</a></li>
                        @endauth

                        {{-- @guest
                        <li><a class="nav-link{{ Request::is('/') ? ' active' : '' }}" href="/">Start</a></li>
                        @endguest
                        <li><a class="nav-link{{ Request::is('info') ? ' active' : '' }}" href="/info">Info</a></li> --}}
                        {{-- <li><a class="nav-link{{ Request::is('hobby*') ? ' active' : '' }}" href="/hobby">Hobbyist Food</a></li>
                        <li><a class="nav-link{{ Request::is('tag*') ? ' active' : '' }}" href="/tag">Tags</a></li> --}}

                    </ul>

                   
                    <ul class="navbar-nav ml-auto">
                       <li><a class="nav-link {{ Request::is('hobby*') ? ' active' : '' }}" href="/hobby"> Hobbyist Food</a></li>
                        <li><a class="nav-link{{ Request::is('tag*') ? ' active' : '' }}" href="/tag">Categories</a></li>
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
                                    {{-- {{ Auth::user()->name }} --}}

                                    {{-- Avatar by login --}}

                                    @if(file_exists('img/users/' . Auth::user()->id . '_thumb.jpg'))
                                    <img class="userOnCard"  src="/img/users/{{Auth::user()->id}}_thumb.jpg" >
                                    @else
                                    {{-- <i class="fas fa-user-circle fa-1x"></i> --}}
                                    {{ Auth::user()->name }}
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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

        
        

        {{--Carousel  --}}
        {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/766/images/healthy-pizza-0-1492548481.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://www.healthymummy.com/wp-content/uploads/2015/04/turkey-burger.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://3i77hz2byv5n1pii73412ndb-wpengine.netdna-ssl.com/wp-content/uploads/2018/09/Cajun-Parsnip-Fries.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div> --}}
        
        {{--  --}}
        <br><br>
        

        <main class="py-4">
            <div class="container">
                @isset($message_success)
                    
                <div class="alert alert-success" role="alert">
                    {!!$message_success!!}
                </div>
            </div>
            @endisset

            @isset($message_warning)
                    
                <div class="alert alert-warning" role="alert">
                    {!!$message_warning!!}
                </div>
            </div>
            @endisset


            @if($errors->any())
            <div class="container">
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
            @yield('content')
        </main>
    </div>

    {{-- footer --}}
    <footer class="footer section bd-container">
        <div class="footer__container bd-grid">
            

            <div class="footer__content">
                {{-- <h3 class="footer__title">Services</h3> --}}
                <ul>
                    <li><a href="#" class="footer__link">Privacy Policy</a></li>
                    <li><a href="#" class="footer__link">About us</a></li>
                    <li><a href="#" class="footer__link">Contact us</a></li>
                    <li><a href="#" class="footer__link">Legal Notices</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <ul>
                    <li><a href="#" class="footer__link">Event</a></li>
                    <li><a href="#" class="footer__link">FAQ</a></li>
                    <li><a href="#" class="footer__link">Advertise</a></li>
                    <li><a href="#" class="footer__link">Terms of services</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <ul>
                    <li><a href="#" class="footer__link">Photo & Recipe Policy</a></li>
                    <li><a href="#" class="footer__link">Code of conduct</a></li>
                    <li><a href="#" class="footer__link">Cookie Policy</a></li>
                    <li><a href="#" class="footer__link">tastycleaneat@gmail.com</a></li>
                </ul>
            </div>
        </div>

        <p class="footer__copy">&#169; <script>var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); 
            var yyyy = today.getFullYear();
            
            today = yyyy;
            document.write(today);
        </script> All right reserved tastyCleanEat</p>
        
    </footer>
    
</body>
</html>
