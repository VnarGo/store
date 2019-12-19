<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a class="nav-link" href="{{ route('products') }}">Products</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('brands') }}">Brands</a>
                    </li>
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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} {{ Auth::user()->surname }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profile"><i class="fas fa-btn fa-user"></i> Profile</a>
                                    @can('admin_panel')
                                        <a class="dropdown-item" href="{{ route('admin.home') }}"><i class="fas fa-btn fa-user-cog"></i> Admin Panel</a>
                                    @endcan
                                <div class="dropdown-divider"></div>
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
                    <li class="nav-item">
                        <div class="navbar-right ">
                            <form action="{{ route('products') }}" method="GET">
                                <input type="text" name="search" placeholder="search">

                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
        @yield('content')
        </div>
    </main>
</div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>



</body>
</html>

{{-- <div class="collapse navbar-collapse" id="app-navbar-collapse">
             <!-- Left Side Of Navbar -->

             --}}{{--Products Page--}}{{--
             <div>
                 <a class="navbar-brand" href="/products">Products</a>
             </div>
             --}}{{--Brands Page--}}{{--
             <div>
                 <a class="navbar-brand" href="/brands">Brands</a>
             </div>
             <ul class="nav navbar-nav">
                 &nbsp;
             </ul>

             <!-- Right Side Of Navbar -->
             <ul class="nav navbar-nav navbar-right">
                 <!-- Authentication Links -->
                 @guest
                     <li><a href="{{ route('login') }}">Login</a></li>
                     <li><a href="{{ route('register') }}">Register</a></li>
                 @else
                     <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                             {{ Auth::user()->name }} {{ Auth::user()->surname }} <span class="caret"></span>
                         </a>

                         <ul class="dropdown-menu">
                             <li><a href="/profile"><i class="fas fa-btn fa-user"></i> Profile</a></li>
                             @can('admin_panel')
                             <li><a href="/admin"><i class="fas fa-btn fa-user-cog"></i> Admin Panel</a></li>
                             @endcan
                             <li>
                                 <a href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"><i class="fas fa-btn fas fa-sign-out-alt"> Logout</i></a>


                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     {{ csrf_field() }}
                                 </form>
                             </li>
                         </ul>
                     </li>
                 @endguest
             </ul>
         </div>--}}