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
                      <a id="navbarDropdown" class="nav-link text-white lajtof-header-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <span class="{{ Auth::user()->isAdmin() ? 'font-weight-bold' : '' }}">
                              {{ Auth::user()->username }}
                          </span>
                          <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">
                              {{ __('Your profile') }}
                          </a>

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
            {{-- <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> --}}
          </div>
      </div>
    </nav>
</div>
