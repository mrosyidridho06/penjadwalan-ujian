<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.guest.partials.head')
</head>
<body>
    @include('layouts.guest.partials.header')
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            {{-- <img src="{{ asset('hero.png') }}" class="img-fluid" alt=""> --}}
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up" class="text-black">Sistem Penjadwalan Sidang Skripsi Farmasi Unmul</h1>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('images/schedule.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
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
