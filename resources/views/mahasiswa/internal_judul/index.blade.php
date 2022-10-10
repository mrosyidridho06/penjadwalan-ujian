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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Dosen Pembimbing Utama</th>
                        <th>Dosen Pembimbing Pendamping</th>
                        <th>Tanggal</th>
                        <th>Ruangan</th>
                        <th>Sesi</th>
                        <th>Draft</th>
                        <th>Status</th>
                        <th>Action</th>
                        {{-- @if (auth()->check())
                            @if (auth()->user()->role == 'dosen')
                            <th>
                                Action
                            </th>
                            @endif
                        @endif --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($interjudul as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{!! $item->judul !!}</td>
                        <td>{{ $item->mahasiswa->dospem_satu }}</td>
                        <td>{{ $item->mahasiswa->dospem_dua }}</td>
                        <td>{{ Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</td>
                        <td>{{ $item->ruangan->name }}</td>
                        <td>{{ $item->sesi->sesi }} {{ $item->sesi->jam_awal }}-{{ $item->sesi->jam_akhir }}</td>
                        <td><a href="{{ asset("/skripsi1/internal_judul/" . $item->draft) }}" target="_blank"> {{ $item->draft }}</a></td>
                        <td>
                            @if ($item->status == 'menunggu')
                                <span class="badge badge-info">{{ strtoupper($item->status) }}</span>
                            @elseif ($item->status == 'disetujui')
                                <span class="badge badge-success">{{ strtoupper($item->status) }}</span>
                            @else
                                <span class="badge badge-danger">{{ strtoupper($item->status) }}</span>
                            @endif
                        </td>
                        @if (auth()->check())
                            @if (auth()->user()->role == 'dosen')
                                @if ($item->status == 'menunggu')
                                <td style="text-align: center">
                                    <a href="{{ route('internal-judul.edit', $item->id) }}" class="btn btn-primary"><i class="fas fa-info-circle"></i></a>
                                </td>
                                @elseif ($item->status == 'ditolak')
                                <td style="text-align: center">
                                    -
                                </td>
                                @else
                                <td>
                                    <form action="{{ route('sertifikat.interjudul') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="nim" value="{{ $item->mahasiswa->nim }}">
                                        <input type="hidden" name="tanggal" value="{{ $item->tanggal }}">
                                        <input type="hidden" name="nama" value="{{ $item->mahasiswa->user->name }}">
                                        <input type="hidden" name="prodi" value="{{ $item->mahasiswa->prodi->jurusan }}">
                                        <input type="hidden" name="ruangan" value="{{ $item->ruangan->name }}">
                                        <input type="hidden" name="sesi" value="{{ $item->sesi->jam_awal }}">
                                        <button class="btn btn-primary" type="submit" target="_blank">Download</button>
                                    </form>
                                </td>
                                @endif
                            @else
                                @if ($item->status == 'disetujui')
                                    <td>
                                        <form action="{{ route('sertifikat.interjudul') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="nim" value="{{ $item->mahasiswa->nim }}">
                                            <input type="hidden" name="tanggal" value="{{ $item->tanggal }}">
                                            <input type="hidden" name="nama" value="{{ $item->mahasiswa->user->name }}">
                                            <input type="hidden" name="prodi" value="{{ $item->mahasiswa->prodi->jurusan }}">
                                            <input type="hidden" name="ruangan" value="{{ $item->ruangan->name }}">
                                            <input type="hidden" name="sesi" value="{{ $item->sesi->jam_awal }}">
                                            <button class="btn btn-primary" type="submit" target="_blank">Download</button>
                                        </form>
                                    </td>
                                @elseif ($item->status == 'ditolak')
                                <td>
                                    <a href="{{ route('internal-judul.edit', $item->id) }}" class="btn btn-primary"><i class="fas fa-info-circle"></i></a>
                                </td>
                                @else
                                <td>
                                    -
                                </td>
                                @endif
                            @endif
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
