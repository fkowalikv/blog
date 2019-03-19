<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Homepage')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container-fluid bg-primary lajtof-header mb-1">
        <div class="container">
            <ul class="nav flex-column flex-md-row justify-content-md-start lajtof-header-nav">
                <li class="nav-item">
                    <a class="nav-link text-white lajtof-header-nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white lajtof-header-nav-link" href="/posts">Posts</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white lajtof-header-nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white lajtof-header-nav-link" href="{{ route('register') }}">{{ __('header.register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link text-white lajtof-header-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }} <span class="caret"></span>
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

    @yield('content')

    <div class="container-fluid lajtof-footer-copy">
        <div class="container text-center">
            <span class="d-block">Copyright {{ now()->year }}</span>
            <span class="d-block">Design by ₪</span>
        </div>
    </div>
</body>
</html>
