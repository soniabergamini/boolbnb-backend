<header>

    <nav class="navbar navbar-expand-md bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="http://localhost:5173/">
                <img src="/logo4.jpeg" alt="logo" class="img-fluid logo">
                {{-- config('app.name', 'Laravel') --}}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{url('/') }}">{{ __('Home') }}</a>
                    </li> --}}
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name ?? 'User' }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
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
{{-- HIDDEN SECTION --}}

<section>
    <div class="container">
        <div class="row d-none hiddenMenu">
            <nav class="col-12">
                <div>
                    <ul class="nav d-flex justify-content-evenly">

                        <li class="nav-item rounded">
                            <a class="nav-link text-body-secondary py-3" href="/">
                                <i class="fa-solid fa-home-alt fa-lg fa-fw me-3"></i> Home
                            </a>
                        </li>

                        <li class="nav-item rounded">
                            <a class="nav-link text-body-secondary py-3 {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-orange rounded' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <i class="fa-solid fa-tachometer-alt fa-lg fa-fw me-3"></i> Dashboard
                            </a>
                        </li>

                        <li class="nav-item rounded">
                            <a class="nav-link text-body-secondary py-3 {{ Route::currentRouteName() == 'admin.apartments.index' ? 'bg-orange rounded' : '' }}"
                                href="{{ route('admin.apartments.index') }}">
                                <i class="fa-solid fa-building-user  fa-lg fa-fw me-3"></i> Apartments
                            </a>
                        </li>

                        <li class="nav-item rounded">
                            <a class="nav-link text-body-secondary py-3 {{ Route::currentRouteName() == 'admin.apartments.create' ? 'bg-orange rounded' : '' }}"
                                href="{{ route('admin.apartments.create') }}">
                                <i class="fa-solid fa-plus fa-lg fa-fw me-3"></i> Add
                            </a>
                        </li>

                        <li class="nav-item rounded">
                            <a class="nav-link text-body-secondary py-3 {{ Route::currentRouteName() == 'admin.messages.index' ? 'bg-orange rounded' : '' }}"
                                href="{{ route('admin.messages.index') }}">
                                <i class="fa-solid fa-envelope fa-lg fa-fw me-3"></i> Messages
                            </a>
                        </li>

                        <li class="nav-item rounded">
                            <a class="nav-link text-body-secondary py-3" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-sign-out-alt fa-lg fa-fw me-3"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>

                </div>
            </nav>
        </div>
    </div>
</section>

<style scoped>
    /* MEDIA QUERY */

    @media (max-width: 992px) {
        .hiddenMenu {
            display: block !important;
            font-size: 10px;
        }
    }

    @media (max-width: 992px) {
        .hiddenMenu {
            display: block !important;
            font-size: 10px;
        }
    }
</style>
