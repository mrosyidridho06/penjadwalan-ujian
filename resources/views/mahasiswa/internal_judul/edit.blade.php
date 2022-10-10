@extends('layouts.app')
@section('title', 'Sidang Internal Judul')
@section('content')
<div class="section">
    <div class="section-header">
        <h1>Sidang Internal Judul</h1>
    </div>
    <div class="card">
        @foreach ($internalJuduls as $internalJudul)
        <div class="card-body table-responsive">
        <form action="{{ route('internal-judul.update', $internalJudul->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="jurusan">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $internalJudul->mahasiswa->user->name }}" readonly>
                <br>
                <label for="judul">Judul</label>
                <div class="form-control" readonly>
                    {!! $internalJudul->judul !!}
                </div>
                <br>
                @if ($internalJudul->where('mahasiswa_id', auth()->user()->mahasiswa->id))
                {{ Auth::user()->name }}
                @endif
                <label for="ruangan_id">Ruangan</label>
                <input type="text" value="{{ $internalJudul->ruangan->name }}" class="form-control" readonly>
                <br>
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="{{ $internalJudul->tanggal }}" readonly>
                <br>
                <label for="sesi_id">Sesi</label>
                <input type="text" class="form-control" value="{{ $internalJudul->sesi->sesi }} {{ $internalJudul->sesi->jam_awal }}-{{ $internalJudul->sesi->jam_akhir }}" readonly>
                <br>
                <label for="draft">Draft</label>
                <div class="form-control">
                    <a href="{{ asset("/skripsi1/internal_judul/" . $internalJudul->draft) }}" target="_blank">{{ $internalJudul->draft }}</a>
                </div>
                <br>
                @if (auth()->check())
                    @if (auth()->user()->role == 'dosen')
                    <label for="status">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="menunggu" <?= $internalJudul->status == 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
                        <option value="disetujui" <?= $internalJudul->status == 'disetujui' ? 'selected' : '' ?>>Disetujui</option>
                        <option value="ditolak" <?= $internalJudul->status == 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
                    </select>
                    @endif
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
        <a href="{{ route('internal-judul.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    @endforeach
    </div>
</div>
@endsection
