<header id="header" class="header">
    <nav class="navbar navbar-expand-md navbar-light sticky-top justify-content-center">
        <div class="container-fluid custom-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span id="navbarResponsiveClose" class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-branch" href="#">
                <img src="{{ asset('assets/img/hapolearn.png') }}" alt="HapoLearn">        
            </a>
            <div class="collapse navbar-collapse align-items-center justify-content-end" id="navbarResponsive">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item"><a class="nav-link header-nav {{ Route::currentRouteName() == 'home' ? 'nav-link-active' : ''}}" href="{{ route('home') }}">HOME</a></li>
                    <li class="nav-item"><a class="nav-link header-nav {{ Route::currentRouteName() == 'courses' ? 'nav-link-active' : ''}}" href="{{ route('courses') }}">ALL COURSES</a></li>
                   
                    @guest
                        @if (Route::has('login') || Route::has('register'))
                        <li class="nav-item"><a class="nav-link header-nav"  href="{{ route('login') }}" data-toggle="modal" data-target="#modalLoginRegister">LOGIN/REGISTER</a></li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right border-0" aria-labelledby="navbarDropdown">
                                <ul class="list-unstyled">
                                    <li class="nav-item ml-0"><a class="nav-link header-nav text-center" href="#">PROFILE</a></li>
                                    <li class="nav-item ml-0">
                                        <a class="dropdown-item nav-link header-nav text-center" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </li>
                                </ul>
                            </div>
                    @endguest
            
                </ul>
            </div>
        </div>
    </nav>
</header>
