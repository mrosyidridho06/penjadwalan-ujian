@extends('layouts.guest.app')
@section('title', 'Home')
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
                    <div class="tab-pane fade" id="tab2">
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
                    </div><!-- End Tab 1 Content -->
                    <div class="tab-pane fade" id="tab3">
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
                    </div><!-- End Tab 1 Content -->
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
                    </div><!-- End Tab 1 Content -->
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
        </div>
    </section>
@endsection
@push('scripts')
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
                        title: 'Jadwal Ujian Metode Penelitian',
                        filename: 'Jadwal Ujian Metode Penelitian',
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
                        title: 'Jadwal Ujian Metode Penelitian',
                        filename: 'Jadwal Ujian Metode Penelitian',
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
                        title: 'Jadwal Ujian Metode Penelitian',
                        filename: 'Jadwal Ujian Metode Penelitian',
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
                        title: 'Jadwal Ujian Tinjauan Pustaka',
                        filename: 'Jadwal Ujian Tinjauan Pustaka',
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
                        title: 'Jadwal Ujian Tinjauan Pustaka',
                        filename: 'Jadwal Ujian Tinjauan Pustaka',
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
                        title: 'Jadwal Ujian Tinjauan Pustaka',
                        filename: 'Jadwal Ujian Tinjauan Pustaka',
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
@endpush
