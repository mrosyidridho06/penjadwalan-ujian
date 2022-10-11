@extends('layouts.app')
@section('title', 'Sidang Internal Judul')
@section('content')
<div class="section">
    <div class="section-header">
        <h1>Sidang Internal Judul</h1>
    </div>
    <div class="card">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body table-responsive">
        {{-- @foreach ($internalJuduls as $internalJudul) --}}
        <form action="{{ route('statusinternal.update', $internalJudul->statusInternalJudul->id) }}" method="POST">
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
                        @if ($internalJudul->mahasiswa->dospem_satu == auth()->user()->dosen->id)
                            <input type="hidden" name="status_dospem2" value="{{ $internalJudul->statusInternalJudul->status_dospem2 }}">
                            <label for="status_dospem1">Status</label>
                            <select name="status_dospem1" id="" class="form-control">
                                <option value="menunggu" <?= $internalJudul->statusInternalJudul->status_dospem1 == 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
                                <option value="disetujui" <?= $internalJudul->statusInternalJudul->status_dospem1 == 'disetujui' ? 'selected' : '' ?>>Disetujui</option>
                                <option value="ditolak" <?= $internalJudul->statusInternalJudul->status_dospem1 == 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
                            </select>
                        @else
                            <input type="hidden" name="status_dospem1" value="{{ $internalJudul->statusInternalJudul->status_dospem1 }}">
                            <label for="status_dospem2">Status</label>
                            <select name="status_dospem2" id="" class="form-control">
                                <option value="menunggu" <?= $internalJudul->statusInternalJudul->status_dospem2 == 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
                                <option value="disetujui" <?= $internalJudul->statusInternalJudul->status_dospem2 == 'disetujui' ? 'selected' : '' ?>>Disetujui</option>
                                <option value="ditolak" <?= $internalJudul->statusInternalJudul->status_dospem2 == 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
                            </select>
                        @endif
                    @endif
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
        {{-- @endforeach --}}
        <a href="{{ route('internal-judul.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    </div>
</div>
@endsection
