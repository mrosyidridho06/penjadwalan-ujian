@extends('layouts.app')
@section('title', 'Sidang Internal Judul')
@section('content')
<div class="section">
    <div class="section-header">
        <h1>Sidang Internal Judul</h1>
    </div>
    <div class="card">
        @if(auth()->check())
            @if (auth()->user()->role == 'mahasiswa')
                @if ($interjudul->where('mahasiswa_id','=', auth()->user()->mahasiswa->id)->count() == 0)
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ route('internal-judul.create') }}" type="button" class="btn btn-light">
                        <i class="fas fa-plus"></i> Ajukan Jadwal
                    </a>
                </div>
                @endif
            @endif
        @endif
        <div class="card-body table-responsive">
            <table class="table table-hover" id="myTable">
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
                        <th>Draft</th>
                        {{-- <th>Berita Acara</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($interjudul as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->mahasiswa->user->name }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->mahasiswa->dospemSatu->user->name }}</td>
                        <td>{{ $item->mahasiswa->dospemDua->user->name }}</td>
                        <td>{{ Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</td>
                        <td>{{ $item->ruangan->name }}</td>
                        <td>{{ $item->sesi->sesi }} {{ $item->sesi->jam_awal }}-{{ $item->sesi->jam_akhir }}</td>
                        <td><a href="{{ asset("/skripsi1/internal_judul/" . $item->draft) }}" target="_blank"> {{ $item->draft }}</a></td>
                        {{-- <td>
                            <form action="{{ route('sertifikat.interjudul') }}" method="POST">
                                @csrf
                                <input type="hidden" name="nim" value="{{ $item->mahasiswa->nim }}">
                                <input type="hidden" name="tanggal" value="{{ $item->tanggal }}">
                                <input type="hidden" name="nama" value="{{ $item->mahasiswa->user->name }}">
                                <input type="hidden" name="prodi" value="{{ $item->mahasiswa->prodi->jurusan }}">
                                <input type="hidden" name="ruangan" value="{{ $item->ruangan->name }}">
                                <input type="hidden" name="sesi" value="{{ $item->sesi->jam_awal }}">
                                <input type="hidden" name="dospem_satu" value="{{ $item->mahasiswa->dospemSatu->user->name }}">
                                <input type="hidden" name="dospem_dua" value="{{ $item->mahasiswa->dospemDua->user->name }}">
                                <button class="btn btn-primary btn-icon icon-left" type="submit"><i class="fas fa-download"></i> Download</button>
                            </form>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('#myTable').DataTable({
        responsive: true
    });
</script>
@endpush
