@extends('layouts.guest.app')
@section('title', 'Home')
@section('section')
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            {{-- <img src="{{ asset('hero.png') }}" class="img-fluid" alt=""> --}}
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up" class="text-black">Sistem Penjadwalan Sidang Farmasi Unmul</h1>
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
            <h2>Jadwal Sidang</h2>
            <p>Sidang Internal Judul</p>
        </header>
        <div class="card-body table-responsive">
            <table class="table table-hover" id="table-internaljudul">
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
    </div>
    <div class="container">
        <header class="section-header">
            <p>Sidang Internal Penelitian</p>
        </header>
        <div class="card-body table-responsive">
            <table class="table table-hover" id="table-internalpenelitian">
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
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready( function () {
        $('#table-internaljudul').DataTable();
    } );
    $(document).ready( function () {
        $('#table-internalpenelitian').DataTable();
    } );
</script>
@endpush
