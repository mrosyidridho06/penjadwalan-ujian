@extends('layouts.app')
@section('title', 'Seminar Proposal')
@section('content')
<div class="section">
    <div class="section-header">
        <h1>Seminar Proposal</h1>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus"></i> Ajukan Proposal
                </button>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Dosen Pembimbing</th>
                            <th>Draft</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sempro as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{!! $item->judul !!}</td>
                            <td>{{ $item->dosen->nama }}</td>
                            <td><a href="{{ asset("/ujian/draft_proposal/" . $item->draft) }}" target="_blank"> {{ $item->draft }}</a></td>
                            <td>
                                @if ($item->status == 'menunggu')
                                    <span class="badge badge-info">{{ strtoupper($item->status) }}</span>
                                @elseif ($item->status == 'disetujui')
                                    <span class="badge badge-success">{{ strtoupper($item->status) }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajukan Proposal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('sempro.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="hidden" value="{{ Auth::user()->id }}" name="iduser">
                    <label for="jurusan">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ Auth::user()->name }}" readonly>
                    <br>
                    <label for="judul">Judul</label>
                    <textarea class="summernote-simple" name="judul">{{ old('judul') }}</textarea>
                    @error('judul')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                    <label for="dospem">Dosen Pembimbing</label>
                    <select name="dospem" class="form-control @error('supplier_id') is-invalid @enderror" value="{{ old('dospem') }}">
                        <option value="" selected>Pilih Dosen Pembimbing</option>
                        @foreach ($dosen as $item)
                            @if (old('dospem') == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->user->name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('dospem')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                    <label for="tanggal">tanggal</label>
                    <input type="date" class="form-control">
                    @error('tanggal')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                    <label for="draft">Draft</label>
                    <input type="file" accept="application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control" name="draft">
                    @error('draft')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush
