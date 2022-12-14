@extends('layouts.app')
@section('title', 'Edit Sidang Internal Judul')
@section('content')
<div class="section">
    <div class="section-header">
        <h1>Edit Sidang Internal Judul</h1>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
        <form action="{{ route('ujiannaskah-skripsi.update', $naskahSkripsi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="jurusan">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $naskahSkripsi->mahasiswa->user->name }}" readonly>
                <br>
                <label for="judul">Judul</label>
                <textarea name="judul" class="form-control">{{ $naskahSkripsi->judul }}</textarea>
                <br>
                <div class="row">
                    <div class="col-md-4 col-sm-12 form-group">
                        <label for="penguji1">Penguji 1</label>
                        <select name="penguji1" class="form-control @error('penguji1') is-invalid @enderror" value="{{ old('penguji1') }}" required>
                            <option value="" selected>Pilih Penguji 1</option>
                            @foreach ($dosen as $item)
                                @if ($naskahSkripsi->penguji1 == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->user->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('penguji1')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12 form-group">
                        <label for="penguji2">Penguji 2</label>
                        <select name="penguji2" class="form-control @error('penguji2') is-invalid @enderror" value="{{ old('penguji2') }}" required>
                            <option value="" selected>Pilih Penguji 2</option>
                            @foreach ($dosen as $item)
                                @if ($naskahSkripsi->penguji2 == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->user->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('penguji2')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4 col-sm-12 form-group">
                        <label for="penguji3">Penguji 3</label>
                        <select name="penguji3" class="form-control @error('penguji3') is-invalid @enderror" value="{{ old('penguji3') }}" required>
                            <option value="" selected>Pilih Penguji 3</option>
                            @foreach ($dosen as $item)
                                @if ($naskahSkripsi->penguji3 == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->user->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('penguji3')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <label for="ruangan_id">Ruangan</label>
                <select name="ruangan_id" class="form-control">
                    @foreach ($ruangan as $itemruang)
                        @if ($naskahSkripsi->ruangan_id == $itemruang->id)
                        <option value="{{ $itemruang->id }}" selected>{{ $itemruang->name }}</option>
                        @else
                        <option value="{{ $itemruang->id }}">{{ $itemruang->name }}</option>
                        @endif
                    @endforeach
                </select>
                <br>
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="{{ $naskahSkripsi->tanggal }}">
                <br>
                <label for="sesi_id">Sesi</label>
                <select name="sesi_id" class="form-control">
                    @foreach ($sesi as $itemsesi)
                        @if ($naskahSkripsi->sesi_id == $itemsesi->id)
                        <option value="{{ $itemsesi->id }}" selected>{{ $itemsesi->sesi }} {{ $itemsesi->jam_awal }}-{{ $itemsesi->jam_akhir }}</option>
                        @else
                        <option value="{{ $itemsesi->id }}">{{ $itemsesi->sesi }} {{ $itemsesi->jam_awal }}-{{ $itemsesi->jam_akhir }}</option>
                        @endif
                    @endforeach
                </select>
                <br>
                <label for="draft">Draft</label>
                <div class="form-control mb-2">
                    <a href="{{ asset("/skripsi3/ujiannaskah_skripsi/" . $naskahSkripsi->draft) }}" target="_blank">{{ $naskahSkripsi->draft }}</a>
                </div>
                <input type="file" name="draft" class="form-control" accept="application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                <br>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('ujiannaskah-skripsi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    </div>
</div>
@endsection
