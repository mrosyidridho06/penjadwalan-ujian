<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center" style="text-decoration:none;">
            <img src="{{ asset('images/unmul.png') }}" alt="">
            <span>SIPEDAS</span>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                @if (Route::has('login'))
                    @auth
                    <li>
                        <a href="{{ route('dashboard') }}" class="nav-link scrollto">Dashboard</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('login') }}" class="nav-link scrollto">Log in</a>
                    </li>
                    @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}" class="nav-link scrollto">Register</a>
                    </li>
                    @endif
                    @endauth
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->
