@extends('layouts.app')
@section('title', 'Create Sidang Internal Judul')
@section('content')
<div class="section">
    <div class="section-header">
        <h1>Ajukan Jadwal Sidang Internal Judul</h1>
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
            @if ($message = Session::has('success'))
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
            @endif
        <form action="{{ route('internal-judul.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="hidden" value="{{ Auth::user()->mahasiswa->id }}" name="iduser">
                <label for="jurusan">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ Auth::user()->name }}" readonly>
                <br>
                <label for="judul">Judul</label>
                <textarea class="form-control" name="judul">{{ old('judul') }}</textarea>
                @error('judul')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <label for="ruangan_id">Ruangan</label>
                <select name="ruangan_id" class="form-control @error('ruangan_id') is-invalid @enderror" value="{{ old('ruangan_id') }}">
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
                <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}">
                {{-- <input id="date1"  placeholder="DD/MM/YYYY" data-input class="form-control" name="tanggal"/> --}}
                @error('tanggal')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <label for="sesi_id">Sesi</label>
                <select name="sesi_id" class="form-control @error('sesi_id') is-invalid @enderror" value="{{ old('sesi_id') }}">
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
                <input type="file" accept="application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control" name="draft">
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
        <a href="{{ route('internal-judul.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $("#date1").flatpickr({
            enableTime: false,
            dateFormat: "Y-m-d",
            "disable": [
                function(date) {
                return (date.getDay() === 0 || date.getDay() === 6);  // disable weekends
                }
            ],
            "locale": {
                "firstDayOfWeek": 1 // set start day of week to Monday
            }
        });
    </script>
@endpush

