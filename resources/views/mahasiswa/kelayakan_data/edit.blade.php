@extends('layouts.app')
@section('title', 'Edit Sidang Internal Judul')
@section('content')
<div class="section">
    <div class="section-header">
        <h1>Edit Internal Kelayakan Data</h1>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
        <form action="{{ route('kelayakan-data.update', $kelayakanData->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="jurusan">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $kelayakanData->mahasiswa->user->name }}" readonly>
                <br>
                <label for="judul">Judul</label>
                <textarea name="judul" class="form-control">{{ $kelayakanData->judul }}</textarea>
                <br>
                <label for="ruangan_id">Ruangan</label>
                <select name="ruangan_id" class="form-control">
                    @foreach ($ruangan as $itemruang)
                        @if ($kelayakanData->ruangan_id == $itemruang->id)
                        <option value="{{ $itemruang->id }}" selected>{{ $itemruang->name }}</option>
                        @else
                        <option value="{{ $itemruang->id }}">{{ $itemruang->name }}</option>
                        @endif
                    @endforeach
                </select>
                <br>
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="{{ $kelayakanData->tanggal }}">
                <br>
                <label for="sesi_id">Sesi</label>
                <select name="sesi_id" class="form-control">
                    @foreach ($sesi as $itemsesi)
                        @if ($kelayakanData->sesi_id == $itemsesi->id)
                        <option value="{{ $itemsesi->id }}" selected>{{ $itemsesi->sesi }} {{ $itemsesi->jam_awal }}-{{ $itemsesi->jam_akhir }}</option>
                        @else
                        <option value="{{ $itemsesi->id }}">{{ $itemsesi->sesi }} {{ $itemsesi->jam_awal }}-{{ $itemsesi->jam_akhir }}</option>
                        @endif
                    @endforeach
                </select>
                <br>
                <label for="draft">Draft</label>
                <div class="form-control mb-2">
                    <a href="{{ asset("/skripsi2/kelayakan_data/" . $kelayakanData->draft) }}" target="_blank">{{ $kelayakanData->draft }}</a>
                </div>
                <input type="file" name="draft" class="form-control" accept="application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                <br>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('kelayakan-data.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    </div>
</div>
@endsection
