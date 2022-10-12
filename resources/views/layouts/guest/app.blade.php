<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.guest.partials.head')
</head>
<body>
    @include('layouts.guest.partials.header')
    @yield('section')
    <main id="main">
        @yield('content')
        <section class="inner-page">
        </section>
    </main>
    @include('layouts.guest.partials.footer')
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @include('layouts.guest.partials.javascript')
    @include('sweetalert::alert')
</body>
</html>
