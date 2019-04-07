<div class="container-fluid bg-primary lajtof-header mb-1 sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">{{ __('Home') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white lajtof-header-nav-link" href="{{ route('posts.index') }}">{{ __('Posts') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white lajtof-header-nav-link" href="{{ route('users.index') }}">{{ __('Users') }}</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white lajtof-header-nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white lajtof-header-nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link {{ Auth::user()->unreadNotifications()->count() ? 'font-weight-bold text-warning' : 'text-white' }} lajtof-header-nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Notifications') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right p-0 lajtof-header-notifications-dropdown" aria-labelledby="navbarDropdown">
                                <div class="card-header p-1 text-center">{{ __('Notifications') }}</div>
                                @if(Auth::user()->unreadNotifications()->count())
                                    <div class="card-body p-0 my-1 mx-2">
                                        @foreach (Auth::user()->unreadNotifications as $notification)
                                            <div class="font-weight-bold m-0">
                                                <a href="{{ route('posts.show', $notification->data['post_id']) }}">{{ $notification->data['author'] . ' ' . __('commented') . ' ' . $notification->created_at->diffForHumans(['parts' => 1]) }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                @if(Auth::user()->readNotifications()->count())
                                    <div class="card-body p-0 my-1 mx-2">
                                        @foreach (Auth::user()->readNotifications as $notification)
                                            <div class="m-0">
                                                <a href="{{ route('posts.show', $notification->data['post_id']) }}">{{ $notification->data['author'] . ' ' . __('commented') . ' ' . $notification->created_at->diffForHumans(['parts' => 1]) }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link text-white dropdown-toggle lajtof-header-nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="">
                                    {{ Auth::user()->username }}
                                </span>
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">
                                    {{ __('Your profile') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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
    </nav>
</div>
