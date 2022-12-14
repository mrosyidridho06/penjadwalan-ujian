@extends('layouts.app')
@section('title', 'Sidang Naskah Skripsi')
@section('content')
<div class="section">
    <div class="section-header">
        <h1>Internal Naskah Skripsi</h1>
    </div>
    <div class="card">
        @if(auth()->check())
            @if (auth()->user()->role == 'mahasiswa')
                @if ($sidangnaskah->where('mahasiswa_id','=', auth()->user()->mahasiswa->id)->count() == 0)
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ route('sidangnaskah-skripsi.create') }}" type="button" class="btn btn-light">
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
                        <th>Aksi</th>
                        {{-- <th>Berita Acara</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sidangnaskah as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->mahasiswa->user->name }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->mahasiswa->dospemSatu->user->name }}</td>
                        <td>{{ $item->mahasiswa->dospemDua->user->name }}</td>
                        <td>{{ Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</td>
                        <td>{{ $item->ruangan->name }}</td>
                        <td>{{ $item->sesi->sesi }} {{ $item->sesi->jam_awal }}-{{ $item->sesi->jam_akhir }}</td>
                        <td><a href="{{ asset("/skripsi2/sidang_naskah/" . $item->draft) }}" target="_blank"> {{ $item->draft }}</a></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-primary">
                                    <a class="dropdown-item" href="{{route('sidangnaskah-skripsi.edit',$item->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{route('sidangnaskah-skripsi.destroy', $item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="dropdown-item btn"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>
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
