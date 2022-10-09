<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.head')

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            {{-- topnav --}}
            @include('layouts.partials.topnav')
            {{-- sidebar --}}
            @include('layouts.partials.sidebar')
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            @include('layouts.partials.footer')
        </div>
    </div>
    @include('layouts.partials.javascript')
    @include('sweetalert::alert')
</body>
</html>
