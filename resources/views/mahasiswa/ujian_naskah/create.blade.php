@extends('layouts.app')
@section('title', 'Create Ujian Naskah Skripsi')
@section('content')
<div class="section">
    <div class="section-header">
        <h1>Jadwal Ujian Naskah Skripsi</h1>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <form action="{{ route('ujiannaskah-skripsi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="hidden" value="{{ Auth::user()->mahasiswa->id }}" name="iduser">
                <label for="jurusan">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ Auth::user()->name }}" readonly>
                <input type="hidden" name="sidang_type" value="uns">
                <br>
                <label for="judul">Judul</label>
                <textarea class="form-control" name="judul" required>{{ old('judul') }}</textarea>
                @error('judul')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <div class="row">
                    <div class="col-md-4 col-sm-12 form-group">
                        <label for="penguji1">Penguji 1</label>
                        <select name="penguji1" class="form-control @error('penguji1') is-invalid @enderror" value="{{ old('penguji1') }}" required>
                            <option value="" selected>Pilih Penguji 1</option>
                            @foreach ($dosen as $item)
                                @if (old('penguji1') == $item->id)
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
                                @if (old('penguji2') == $item->id)
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
                                @if (old('penguji3') == $item->id)
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
                <select name="ruangan_id" class="form-control @error('ruangan_id') is-invalid @enderror" value="{{ old('ruangan_id') }}" required>
                    <option value="" selected>Pilih Ruangan</option>
                    @foreach ($ruang as $item)
                        @if (old('ruangan_id') == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('ruangan_id')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                @error('tanggal')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <label for="sesi_id">Sesi</label>
                <select name="sesi_id" class="form-control @error('sesi_id') is-invalid @enderror" value="{{ old('sesi_id') }}" required>
                    <option value="" selected>Pilih Sesi</option>
                    @foreach ($sesi as $item)
                        @if (old('sesi_id') == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->sesi }} {{ $item->jam_awal }}-{{ $item->jam_akhir }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->sesi }} {{ $item->jam_awal }}-{{ $item->jam_akhir }}</option>
                        @endif
                    @endforeach
                </select>
                @error('sesi_id')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <label for="draft">Draft</label>
                <input type="file" accept="application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control" name="draft" required>
                <div class="form-text text-danger">*The draft must have a maximum size of 10MB</div>
                @error('draft')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
        <a href="{{ route('ujiannaskah-skripsi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
