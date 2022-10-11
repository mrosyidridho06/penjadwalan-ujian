<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.guest.partials.head')
</head>
<body>
    @include('layouts.guest.partials.header')
    @yield('section')
    <main id="main">
        <section class="inner-page">
            @yield('content')
        </section>
    </main>
    @include('layouts.guest.partials.footer')
    @include('layouts.guest.partials.javascript')
    @include('sweetalert::alert')
</body>
</html>
