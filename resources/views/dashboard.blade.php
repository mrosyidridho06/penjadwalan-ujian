@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        @if (auth()->check())
            @if (auth()->user()->role == 'dosen')
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Mahasiswa Bimbingan</h4>
                                </div>
                                <div class="card-body">
                                    {{ $jumlahmhs }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-header">
                        <h4>Jadwal Sidang</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action {{ request()->segment(1) == 'dashboard#internaljudul' ? 'active' : '' }}"
                                        id="list-internaljudul-list" data-toggle="list" href="#internaljudul" role="tab">
                                        Sidang Internal Judul
                                        <span class="badge badge-light badge-pill">14</span>
                                    </a>
                                    <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action {{ request()->segment(1) == 'dashboard#metpen' ? 'active' : '' }}"
                                        id="list-metpen-list" data-toggle="list" href="#metpen" role="tab">
                                        Ujian Metode Penelitian
                                        <span class="badge badge-light badge-pill">14</span>
                                    </a>
                                    <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action {{ request()->segment(1) == 'dashboard#tipus' ? 'active' : '' }}"
                                        id="list-tipus-list" data-toggle="list" href="#tipus" role="tab">
                                        Ujian Tinjaun Pustaka
                                        <span class="badge badge-light badge-pill">14</span>
                                    </a>
                                    <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action {{ request()->segment(1) == 'dashboard#pn' ? 'active' : '' }}"
                                        id="list-pn-list" data-toggle="list" href="#pn" role="tab">
                                        Sidang Pembimbingan Naskah
                                        <span class="badge badge-light badge-pill">14</span>
                                    </a>
                                    <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action {{ request()->segment(1) == 'dashboard#prosedural' ? 'active' : '' }}"
                                        id="list-prosedural-list" data-toggle="list" href="#prosedural" role="tab">
                                        Sidang Internal Prosedural
                                        <span class="badge badge-light badge-pill">14</span>
                                    </a>
                                    <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action {{ request()->segment(1) == 'dashboard#kemajuan' ? 'active' : '' }}"
                                        id="list-kemajuan-list" data-toggle="list" href="#kemajuan" role="tab">
                                        Sidang Kemajuan Penelitian
                                        <span class="badge badge-light badge-pill">14</span>
                                    </a>
                                    <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action {{ request()->segment(1) == 'dashboard#kelayakan' ? 'active' : '' }}"
                                        id="list-kelayakan-list" data-toggle="list" href="#kelayakan" role="tab">
                                        Sidang Kelayakan Data
                                        <span class="badge badge-light badge-pill">14</span>
                                    </a>
                                    <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action {{ request()->segment(1) == 'dashboard#sidangnaskah' ? 'active' : '' }}"
                                        id="list-sidangnaskah-list" data-toggle="list" href="#sidangnaskah" role="tab">
                                        Sidang Naskah Skripsi
                                        <span class="badge badge-light badge-pill">14</span>
                                    </a>
                                    <a class="list-group-item d-flex justify-content-between align-items-center list-group-item-action {{ request()->segment(1) == 'dashboard#uns' ? 'active' : '' }}"
                                        id="list-uns-list" data-toggle="list" href="#uns" role="tab">
                                        Ujian Naskah Skripsi
                                        <span class="badge badge-light badge-pill">14</span>
                                    </a>

                                </div>
                            </div>
                            <div class="col-8">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show" id="internaljudul" role="tabpanel"
                                        aria-labelledby="list-internaljudul-list">
                                        <div class="card table-responsive">
                                            <table class="table-hover" id="table-internaljudul">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul</th>
                                                        <th>Dosen Pembimbing Utama</th>
                                                        <th>Dosen Pembimbing Pendamping</th>
                                                        <th>Penguji</th>
                                                        <th>Tanggal</th>
                                                        <th>Sesi</th>
                                                        <th>Draft</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="metpen" role="tabpanel"
                                        aria-labelledby="list-metpen-list">
                                        Tes 12
                                    </div>
                                    <div class="tab-pane fade" id="tipus" role="tabpanel"
                                        aria-labelledby="list-tipus-list">
                                        tipus
                                    </div>
                                    <div class="tab-pane fade" id="pn" role="tabpanel"
                                        aria-labelledby="list-pn-list">
                                        Pembimbingan Naskah
                                    </div>
                                    <div class="tab-pane fade" id="prosedural" role="tabpanel"
                                        aria-labelledby="list-prosedural-list">
                                        <div class="card-body table-responsive">
                                            <table class="table table-hover" id="table-prosedural">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Judul</th>
                                                        <th>Dosen Pembimbing Utama</th>
                                                        <th>Dosen Pembimbing Pendamping</th>
                                                        <th>Tanggal</th>
                                                        <th>Ruangan</th>
                                                        <th>Sesi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($prosedural as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->mahasiswa->user->name }}</td>
                                                        <td>{{ $item->judul }}</td>
                                                        <td>{{ $item->mahasiswa->dospemSatu->user->name }}</td>
                                                        <td>{{ $item->mahasiswa->dospemDua->user->name }}</td>
                                                        <td>{{ Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</td>
                                                        <td>{{ $item->ruangan->name }}</td>
                                                        <td>{{ $item->sesi->sesi }} {{ $item->sesi->jam_awal }}-{{ $item->sesi->jam_akhir }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kemajuan" role="tabpanel"
                                        aria-labelledby="list-kemajuan-list">
                                        Sidang Kemajuan Penelitian
                                    </div>
                                    <div class="tab-pane fade" id="kelayakan" role="tabpanel"
                                        aria-labelledby="list-kelayakan-list">
                                        Sidang Kelayakan Data
                                    </div>
                                    <div class="tab-pane fade" id="sidangnaskah" role="tabpanel"
                                        aria-labelledby="list-sidangnaskah-list">
                                        Sidang Naskah Skripsi
                                    </div>
                                    <div class="tab-pane fade" id="uns" role="tabpanel"
                                        aria-labelledby="list-uns-list">
                                        Ujian Naskah Skripsi
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
    @else
    <h5>Aplikasi Pendaftaran Sidang Skripsi</h5>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Sarjana Farmasi (S1)</h4>
                    </div>
                    <div class="card-body">
                        <a href="http://bitly.ws/vBYh"  target="_blank" class="btn btn-primary btn-icon btn-sm icon-left"><i class="fas fa-download"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Sarjana Farmasi Klinis (S1 Farmasi Klinis)</h4>
                    </div>
                    <div class="card-body">
                        <a href="http://shorturl.at/CFU18" target="_blank" class="btn btn-primary btn-icon btn-sm icon-left"><i class="fas fa-download"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif
    </div>
@endsection
@push('scripts')
<script>
    $('#table-prosedural').DataTable({
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
</script>
@endpush
