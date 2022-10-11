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
