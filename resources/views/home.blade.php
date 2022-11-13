<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIPEDAS</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('images/favicon.ico') }}" rel="icon">
    <link href="{{ asset('images/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('flex/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('flex/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('flex/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('flex/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('flex/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('flex/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">


    <!-- Template Main CSS File -->
    <link href="{{ asset('flex/css/style.css') }}" rel="stylesheet">
</head>

<body>
    @if ($message = Session::has('status'))
        <div class="alert alert-warning">
            {{ $message }}
        </div>
    @endif
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
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
                        <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
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

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Sistem Informasi Penjadwalan Sidang Skripsi Farmasi Unmul</h1>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#features" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Get Started</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('images/schedule.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
    <main id="main">
        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Sidang Skripsi 1</h2>
                </header>
                <!-- Feature Tabs -->
                <div class="row feture-tabs mt-0" data-aos="fade-up">
                    <div class="col-lg-12 col-md-12">
                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li>
                                <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Internal Judul Skripsi</a>
                            </li>
                            <li>
                                <a class="nav-link" data-bs-toggle="pill" href="#tab2">Internal Metode Peneltian</a>
                            </li>
                            <li>
                                <a class="nav-link" data-bs-toggle="pill" href="#tab3">Internal Tinjauan Pustaka</a>
                            </li>
                            <li>
                                <a class="nav-link" data-bs-toggle="pill" href="#tab4">Internal Naskah Proposal</a>
                            </li>
                        </ul><!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="card-body table-responsive">
                                    <table class="table table-hover" id="skripsi1-internaljudul">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Dosen Pembimbing Utama</th>
                                            <th>Dosen Pembimbing Pendamping</th>
                                            <th>Tanggal</th>
                                            <th>Ruangan</th>
                                            <th>Jam</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($InternalJudul as $itemij)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $itemij->mahasiswa->user->name }}</td>
                                                    <td>{!! $itemij->judul !!}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemSatu->user->name }}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemDua->user->name }}</td>
                                                    <td>{{ Carbon\Carbon::parse($itemij->tanggal)->translatedFormat('l, d F Y') }}</td>
                                                    <td>{{ $itemij->ruangan->name }}</td>
                                                    <td>{{ $itemij->sesi->sesi }} {{ $itemij->sesi->jam_awal }}-{{ $itemij->sesi->jam_akhir }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- End Tab 1 Content -->

                            <div class="tab-pane fade show" id="tab2">
                                <div class="card-body table-responsive">
                                    <table class="table table-hover" id="skripsi1-metpen">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Dosen Pembimbing Utama</th>
                                            <th>Dosen Pembimbing Pendamping</th>
                                            <th>Tanggal</th>
                                            <th>Ruangan</th>
                                            <th>Jam</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($metpen as $itemij)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $itemij->mahasiswa->user->name }}</td>
                                                    <td>{!! $itemij->judul !!}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemSatu->user->name }}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemDua->user->name }}</td>
                                                    <td>{{ Carbon\Carbon::parse($itemij->tanggal)->translatedFormat('l, d F Y') }}</td>
                                                    <td>{{ $itemij->ruangan->name }}</td>
                                                    <td>{{ $itemij->sesi->sesi }} {{ $itemij->sesi->jam_awal }}-{{ $itemij->sesi->jam_akhir }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- End Tab 2 Content -->

                            <div class="tab-pane fade show" id="tab3">
                                <div class="card-body table-responsive">
                                    <table class="table table-hover" id="skripsi1-tipus">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Dosen Pembimbing Utama</th>
                                            <th>Dosen Pembimbing Pendamping</th>
                                            <th>Tanggal</th>
                                            <th>Ruangan</th>
                                            <th>Jam</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($tipus as $itemij)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $itemij->mahasiswa->user->name }}</td>
                                                    <td>{!! $itemij->judul !!}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemSatu->user->name }}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemDua->user->name }}</td>
                                                    <td>{{ Carbon\Carbon::parse($itemij->tanggal)->translatedFormat('l, d F Y') }}</td>
                                                    <td>{{ $itemij->ruangan->name }}</td>
                                                    <td>{{ $itemij->sesi->sesi }} {{ $itemij->sesi->jam_awal }}-{{ $itemij->sesi->jam_akhir }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- End Tab 3 Content -->
                            <div class="tab-pane fade" id="tab4">
                                <div class="card-body table-responsive">
                                    <table class="table table-hover" id="skripsi1-pn">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Dosen Pembimbing Utama</th>
                                            <th>Dosen Pembimbing Pendamping</th>
                                            <th>Tanggal</th>
                                            <th>Ruangan</th>
                                            <th>Jam</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($pn as $itemij)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $itemij->mahasiswa->user->name }}</td>
                                                    <td>{!! $itemij->judul !!}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemSatu->user->name }}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemDua->user->name }}</td>
                                                    <td>{{ Carbon\Carbon::parse($itemij->tanggal)->translatedFormat('l, d F Y') }}</td>
                                                    <td>{{ $itemij->ruangan->name }}</td>
                                                    <td>{{ $itemij->sesi->sesi }} {{ $itemij->sesi->jam_awal }}-{{ $itemij->sesi->jam_akhir }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- End Tab 4 Content -->
                        </div>
                    </div>
                </div><!-- End Feature Tabs -->
            </div>
        </section><!-- End Features Section -->
        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Sidang Skripsi 2</h2>
                </header>
                <!-- Feature Tabs -->
                <div class="row feture-tabs mt-0" data-aos="fade-up">
                    <div class="col-lg-12 col-md-12">
                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li>
                                <a class="nav-link active" data-bs-toggle="pill" href="#tab2-1">Internal Prosedural</a>
                            </li>
                            <li>
                                <a class="nav-link" data-bs-toggle="pill" href="#tab2-2">Internal Kemajuan Penelitian</a>
                            </li>
                            <li>
                                <a class="nav-link" data-bs-toggle="pill" href="#tab2-3">Internal Kelayakan Data</a>
                            </li>
                            <li>
                                <a class="nav-link" data-bs-toggle="pill" href="#tab2-4">Internal Naskah Skripsi</a>
                            </li>
                        </ul><!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab2-1">
                                <div class="card-body table-responsive">
                                    <table class="table table-hover" id="skripsi2-prosedural">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Dosen Pembimbing Utama</th>
                                            <th>Dosen Pembimbing Pendamping</th>
                                            <th>Tanggal</th>
                                            <th>Ruangan</th>
                                            <th>Jam</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($prosedural as $itemij)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $itemij->mahasiswa->user->name }}</td>
                                                    <td>{!! $itemij->judul !!}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemSatu->user->name }}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemDua->user->name }}</td>
                                                    <td>{{ Carbon\Carbon::parse($itemij->tanggal)->translatedFormat('l, d F Y') }}</td>
                                                    <td>{{ $itemij->ruangan->name }}</td>
                                                    <td>{{ $itemij->sesi->sesi }} {{ $itemij->sesi->jam_awal }}-{{ $itemij->sesi->jam_akhir }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- End Tab 1 Content -->

                            <div class="tab-pane fade" id="tab2-2">
                                <div class="card-body table-responsive">
                                    <table class="table table-hover" id="skripsi2-kemajuan">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Dosen Pembimbing Utama</th>
                                            <th>Dosen Pembimbing Pendamping</th>
                                            <th>Tanggal</th>
                                            <th>Ruangan</th>
                                            <th>Jam</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($kemajuan as $itemij)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $itemij->mahasiswa->user->name }}</td>
                                                    <td>{!! $itemij->judul !!}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemSatu->user->name }}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemDua->user->name }}</td>
                                                    <td>{{ Carbon\Carbon::parse($itemij->tanggal)->translatedFormat('l, d F Y') }}</td>
                                                    <td>{{ $itemij->ruangan->name }}</td>
                                                    <td>{{ $itemij->sesi->sesi }} {{ $itemij->sesi->jam_awal }}-{{ $itemij->sesi->jam_akhir }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- End Tab 2 Content -->

                            <div class="tab-pane fade" id="tab2-3">
                                <div class="card-body table-responsive">
                                    <table class="table table-hover" id="skripsi2-kelayakan">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Dosen Pembimbing Utama</th>
                                            <th>Dosen Pembimbing Pendamping</th>
                                            <th>Tanggal</th>
                                            <th>Ruangan</th>
                                            <th>Jam</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($kelayakan as $itemij)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $itemij->mahasiswa->user->name }}</td>
                                                    <td>{!! $itemij->judul !!}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemSatu->user->name }}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemDua->user->name }}</td>
                                                    <td>{{ Carbon\Carbon::parse($itemij->tanggal)->translatedFormat('l, d F Y') }}</td>
                                                    <td>{{ $itemij->ruangan->name }}</td>
                                                    <td>{{ $itemij->sesi->sesi }} {{ $itemij->sesi->jam_awal }}-{{ $itemij->sesi->jam_akhir }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- End Tab 1 Content -->

                            <div class="tab-pane fade" id="tab2-4">
                                <div class="card-body table-responsive">
                                    <table class="table table-hover" id="skripsi2-sidangnaskah">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Dosen Pembimbing Utama</th>
                                            <th>Dosen Pembimbing Pendamping</th>
                                            <th>Tanggal</th>
                                            <th>Ruangan</th>
                                            <th>Jam</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($sidangnaskah as $itemij)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $itemij->mahasiswa->user->name }}</td>
                                                    <td>{!! $itemij->judul !!}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemSatu->user->name }}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemDua->user->name }}</td>
                                                    <td>{{ Carbon\Carbon::parse($itemij->tanggal)->translatedFormat('l, d F Y') }}</td>
                                                    <td>{{ $itemij->ruangan->name }}</td>
                                                    <td>{{ $itemij->sesi->sesi }} {{ $itemij->sesi->jam_awal }}-{{ $itemij->sesi->jam_akhir }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- End Tab 1 Content -->
                        </div>
                    </div>
                </div><!-- End Feature Tabs -->
            </div>
        </section><!-- End Features Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Sidang Skripsi 3</h2>
                </header>
                <!-- Feature Tabs -->
                <div class="row feture-tabs mt-0" data-aos="fade-up">
                    <div class="col-lg-12 col-md-12">
                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li>
                                <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Ujian Naskah Skripsi</a>
                            </li>
                        </ul><!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="card-body table-responsive">
                                    <table class="table table-hover table-skripsi3">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Dosen Pembimbing Utama</th>
                                            <th>Dosen Pembimbing Pendamping</th>
                                            <th>Dosen Penguji 1</th>
                                            <th>Dosen Penguji 2</th>
                                            <th>Dosen Penguji 3</th>
                                            <th>Tanggal</th>
                                            <th>Ruangan</th>
                                            <th>Jam</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($ujiannaskah as $itemij)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $itemij->mahasiswa->user->name }}</td>
                                                    <td>{!! $itemij->judul !!}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemSatu->user->name }}</td>
                                                    <td>{{ $itemij->mahasiswa->dospemDua->user->name }}</td>
                                                    <td>{{ $itemij->pengujiSatu->user->name }}</td>
                                                    <td>{{ $itemij->pengujiDua->user->name }}</td>
                                                    <td>{{ $itemij->pengujiTiga->user->name }}</td>
                                                    <td>{{ Carbon\Carbon::parse($itemij->tanggal)->translatedFormat('l, d F Y') }}</td>
                                                    <td>{{ $itemij->ruangan->name }}</td>
                                                    <td>{{ $itemij->sesi->sesi }} {{ $itemij->sesi->jam_awal }}-{{ $itemij->sesi->jam_akhir }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- End Tab 1 Content -->
                        </div>
                    </div>
                </div><!-- End Feature Tabs -->
            </div>
        </section><!-- End Features Section -->
    </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="/" class="logo d-flex align-items-center" style="text-decoration:none;">
                            <img src="{{ asset('images/unmul.png') }}" alt="img">
                            <span>SIPEDAS</span>
                        </a>
                        <p>Sistem Penjadwalan Sidang Skripsi Farmasi Unmul</p>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="/">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="/login">Login</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ asset('dokumentasi/MANUAL BOOK SIPEDAS.pdf') }}" target="_blank">Buku Petunjuk Penggunaan Sipedas</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Video Tutorial Sipedas</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Social Media</h4>
                        <div class="social-links mt-3">
                            <a href="#" class="youtube"><i class="bi bi-youtube"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/kuliahfarm/?igshid=cnnz8azzfqx4" class="instagram"><i
                                    class="bi bi-instagram"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Contact Us</h4>
                        <p>
                            Jalan Penajam, Kampus Unmul Gn Kelua
                            Kota Samarinda<br><br>
                            <strong>Phone:</strong> +62541739491<br>
                            <strong>Email:</strong> fa_mul@farmasi.unmul.ac.id<br>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Farmasi Unmul</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('flex/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('flex/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('flex/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('flex/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('flex/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('flex/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('flex/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js   "></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('flex/js/main.js') }}"></script>

    <script>
        $('#skripsi1-internaljudul').DataTable({
            responsive: true,
            dom: 'lBfrtip',
                orderable: [
                    [7, "asc"]
                ],
                // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
                lengthMenu: [
                    [ 10, 25, 50, 100, 1000, -1 ],
                    [ '10', '25', '50', '100', '1000', 'All' ]
                ],
                buttons: [
                    {
                        extend: 'csv',
                        text: 'Export',
                        title: 'Jadwal Sidang Internal Judul',
                        filename: 'Jadwal Sidang Internal Judul',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Pdf',
                        title: 'Jadwal Sidang Internal Judul',
                        filename: 'Jadwal Sidang Internal Judul',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        title: 'Jadwal Sidang Internal Judul',
                        filename: 'Jadwal Sidang Internal Judul',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                ],
                language: {
                    "searchPlaceholder": "Cari Jadwal",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
        });

        $('#skripsi1-metpen').DataTable({
            responsive: true,
            dom: 'lBfrtip',
                orderable: [
                    [7, "asc"]
                ],
                // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
                lengthMenu: [
                    [ 10, 25, 50, 100, 1000, -1 ],
                    [ '10', '25', '50', '100', '1000', 'All' ]
                ],
                buttons: [
                    {
                        extend: 'csv',
                        text: 'Export',
                        title: 'Jadwal Sidang Metode Penelitian',
                        filename: 'Jadwal Sidang Metode Penelitian',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Pdf',
                        title: 'Jadwal Sidang Metode Penelitian',
                        filename: 'Jadwal Sidang Metode Penelitian',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        title: 'Jadwal Sidang Metode Penelitian',
                        filename: 'Jadwal Sidang Metode Penelitian',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                ],
                language: {
                    "searchPlaceholder": "Cari Jadwal",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
        });

        $('#skripsi1-tipus').DataTable({
            responsive: true,
            dom: 'lBfrtip',
                orderable: [
                    [7, "asc"]
                ],
                // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
                lengthMenu: [
                    [ 10, 25, 50, 100, 1000, -1 ],
                    [ '10', '25', '50', '100', '1000', 'All' ]
                ],
                buttons: [
                    {
                        extend: 'csv',
                        text: 'Export',
                        title: 'Jadwal Sidang Tinjauan Pustaka',
                        filename: 'Jadwal Sidang Tinjauan Pustaka',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Pdf',
                        title: 'Jadwal Sidang Tinjauan Pustaka',
                        filename: 'Jadwal Sidang Tinjauan Pustaka',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        title: 'Jadwal Sidang Tinjauan Pustaka',
                        filename: 'Jadwal Sidang Tinjauan Pustaka',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                ],
                language: {
                    "searchPlaceholder": "Cari Jadwal",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
        });

        $('#skripsi1-pn').DataTable({
            responsive: true,
            dom: 'lBfrtip',
                orderable: [
                    [7, "asc"]
                ],
                // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
                lengthMenu: [
                    [ 10, 25, 50, 100, 1000, -1 ],
                    [ '10', '25', '50', '100', '1000', 'All' ]
                ],
                buttons: [
                    {
                        extend: 'csv',
                        text: 'Export',
                        title: 'Jadwal Sidang Pembimbingan Naskah',
                        filename: 'Jadwal Sidang Pembimbingan Naskah',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Pdf',
                        title: 'Jadwal Sidang Pembimbingan Naskah',
                        filename: 'Jadwal Sidang Pembimbingan Naskah',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        title: 'Jadwal Sidang Pembimbingan Naskah',
                        filename: 'Jadwal Sidang Pembimbingan Naskah',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                ],
                language: {
                    "searchPlaceholder": "Cari Jadwal",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
        });

        $('#skripsi2-prosedural').DataTable({
            responsive: true,
            dom: 'lBfrtip',
                orderable: [
                    [7, "asc"]
                ],
                // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
                lengthMenu: [
                    [ 10, 25, 50, 100, 1000, -1 ],
                    [ '10', '25', '50', '100', '1000', 'All' ]
                ],
                buttons: [
                    {
                        extend: 'csv',
                        text: 'Export',
                        title: 'Jadwal Sidang Internal Prosedural',
                        filename: 'Jadwal Sidang Internal Prosedural',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Pdf',
                        title: 'Jadwal Sidang Internal Prosedural',
                        filename: 'Jadwal Sidang Internal Prosedural',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        title: 'Jadwal Sidang Internal Prosedural',
                        filename: 'Jadwal Sidang Internal Prosedural',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                ],
                language: {
                    "searchPlaceholder": "Cari Jadwal",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
        });

        $('#skripsi2-kemajuan').DataTable({
            responsive: true,
            dom: 'lBfrtip',
                orderable: [
                    [7, "asc"]
                ],
                // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
                lengthMenu: [
                    [ 10, 25, 50, 100, 1000, -1 ],
                    [ '10', '25', '50', '100', '1000', 'All' ]
                ],
                buttons: [
                    {
                        extend: 'csv',
                        text: 'Export',
                        title: 'Jadwal Sidang Kemajuan Penelitian',
                        filename: 'Jadwal Sidang Kemajuan Penelitian',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Pdf',
                        title: 'Jadwal Sidang Kemajuan Penelitian',
                        filename: 'Jadwal Sidang Kemajuan Penelitian',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        title: 'Jadwal Sidang Kemajuan Penelitian',
                        filename: 'Jadwal Sidang Kemajuan Penelitian',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                ],
                language: {
                    "searchPlaceholder": "Cari Jadwal",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
        });

        $('#skripsi2-kelayakan').DataTable({
            responsive: true,
            dom: 'lBfrtip',
                orderable: [
                    [7, "asc"]
                ],
                // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
                lengthMenu: [
                    [ 10, 25, 50, 100, 1000, -1 ],
                    [ '10', '25', '50', '100', '1000', 'All' ]
                ],
                buttons: [
                    {
                        extend: 'csv',
                        text: 'Export',
                        title: 'Jadwal Sidang Kelayakan Data',
                        filename: 'Jadwal Sidang Kelayakan Data',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Pdf',
                        title: 'Jadwal Sidang Kelayakan Data',
                        filename: 'Jadwal Sidang Kelayakan Data',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        title: 'Jadwal Sidang Kelayakan Data',
                        filename: 'Jadwal Sidang Kelayakan Data',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                ],
                language: {
                    "searchPlaceholder": "Cari Jadwal",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
        });

        $('#skripsi2-sidangnaskah').DataTable({
            responsive: true,
            dom: 'lBfrtip',
                orderable: [
                    [7, "asc"]
                ],
                // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
                lengthMenu: [
                    [ 10, 25, 50, 100, 1000, -1 ],
                    [ '10', '25', '50', '100', '1000', 'All' ]
                ],
                buttons: [
                    {
                        extend: 'csv',
                        text: 'Export',
                        title: 'Jadwal Sidang Naskah Ujian',
                        filename: 'Jadwal Sidang Naskah Ujian',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Pdf',
                        title: 'Jadwal Sidang Naskah Ujian',
                        filename: 'Jadwal Sidang Naskah Ujian',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        title: 'Jadwal Sidang Naskah Ujian',
                        filename: 'Jadwal Sidang Naskah Ujian',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                        }
                    },
                ],
                language: {
                    "searchPlaceholder": "Cari Jadwal",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
        });

        $('.table-skripsi3').DataTable({
            responsive: true,
            dom: 'lBfrtip',
                orderable: [
                    [10, "asc"]
                ],
                // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
                lengthMenu: [
                    [ 10, 25, 50, 100, 1000, -1 ],
                    [ '10', '25', '50', '100', '1000', 'All' ]
                ],
                buttons: [
                    {
                        extend: 'csv',
                        text: 'Export',
                        title: 'Jadwal Ujian Naskah Skripsi',
                        filename: 'Jadwal Ujian Naskah Skripsi',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Pdf',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        title: 'Jadwal Ujian Naskah Skripsi',
                        filename: 'Jadwal Ujian Naskah Skripsi',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        title: 'Jadwal Ujian Naskah Skripsi',
                        filename: 'Jadwal Ujian Naskah Skripsi',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            },
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]
                        }
                    },
                ],
                language: {
                    "searchPlaceholder": "Cari Jadwal",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
        });
    </script>

</body>

</html>
