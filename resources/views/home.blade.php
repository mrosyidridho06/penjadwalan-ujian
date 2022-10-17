@extends('layouts.guest.app')
@section('title', 'Home')
@section('section')
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
@endsection
@section('content')
    <section id="values" class="values">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2 class="text-center">Jadwal Sidang Skripsi 1</h2>
            </header>
            <div class="feture-tabs" data-aos="fade-up">
                <!-- Tabs -->
                <ul class="nav nav-tabs mb-3">
                    <li>
                        <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Sidang Internal Judul</a>
                    </li>
                    <li>
                        <a class="nav-link" data-bs-toggle="pill" href="#tab2">Ujian Metode Peneltian</a>
                    </li>
                    <li>
                        <a class="nav-link" data-bs-toggle="pill" href="#tab3">Ujian Tinjauan Pustaka</a>
                    </li>
                    <li>
                        <a class="nav-link" data-bs-toggle="pill" href="#tab4">Sidang Pembimbingan Naskah</a>
                    </li>
                </ul><!-- End Tabs -->
                <!-- Tab Content -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab1">
                        <div class="card-body table-responsive">
                            <table class="table table-hover table-skripsi1">
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
                    <div class="tab-pane fade" id="tab2">
                        <div class="card-body table-responsive">
                            <table class="table table-hover table-skripsi1">
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
                    </div><!-- End Tab 1 Content -->
                    <div class="tab-pane fade" id="tab3">
                        <div class="card-body table-responsive">
                            <table class="table table-hover table-skripsi1">
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
                    </div><!-- End Tab 1 Content -->
                    <div class="tab-pane fade" id="tab4">
                        <div class="card-body table-responsive">
                            <table class="table table-hover table-skripsi1">
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
                    </div><!-- End Tab 1 Content -->
                </div>
            </div><!-- End Feature Tabs -->
        </div>
    </section>
    <section id="values" class="values">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2 class="text-center">Jadwal Sidang Skripsi 2</h2>
            </header>
            <div class="feture-tabs" data-aos="fade-up">
                <!-- Tabs -->
                <ul class="nav nav-tabs mb-3">
                    <li>
                        <a class="nav-link active" data-bs-toggle="pill" href="#tab2-1">Sidang Internal Prosedural</a>
                    </li>
                    <li>
                        <a class="nav-link" data-bs-toggle="pill" href="#tab2-2">Sidang Kemajuan Penelitian</a>
                    </li>
                    <li>
                        <a class="nav-link" data-bs-toggle="pill" href="#tab2-3">Sidang Kelayakan Data</a>
                    </li>
                    <li>
                        <a class="nav-link" data-bs-toggle="pill" href="#tab2-4">Sidang Naskah Skripsi</a>
                    </li>
                </ul><!-- End Tabs -->
                <!-- Tab Content -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab2-1">
                        <div class="card-body table-responsive">
                            <table class="table table-hover table-skripsi2">
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
                            <table class="table table-hover table-skripsi2">
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
                    </div><!-- End Tab 1 Content -->
                    <div class="tab-pane fade" id="tab2-3">
                        <div class="card-body table-responsive">
                            <table class="table table-hover table-skripsi2">
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
                            <table class="table table-hover table-skripsi2">
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
            </div><!-- End Feature Tabs -->
        </div>
    </section>
    <section id="values" class="values">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2 class="text-center">Jadwal Ujian Naskah Skripsi</h2>
            </header>
            <div class="card-body table-responsive">
                <table class="table table-hover table-skripsi3">
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
                        @foreach ($ujiannaskah as $itemij)
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
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $('.table-skripsi1').DataTable({
            responsive: true
        });
        // $('a[data-toggle="pills"]').on('shown.bs.tab', function (e) {
        //     $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
        // });

        $('.table-skripsi2').DataTable({
            responsive: true
        });
        // $('a[data-toggle="pill2"]').on('shown.bs.tab', function (e) {
        //     $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
        // });

        $('.table-skripsi3').DataTable({
            responsive: true
        });
    </script>
@endpush
