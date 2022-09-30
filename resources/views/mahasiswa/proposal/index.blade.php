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
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->user }}</td>
                            <td>{{ $item->draft }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <div class="form-inline">
                                    <button class="btn btn-primary editButton" data-toggle="modal" data-target="#editModal" value="{{ $item->id}}"><i class="fa fa-edit"></i> Edit</button>
                                    <form class="mx-2" action="{{ route('sempro.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </div>
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
            <form action="{{ route('sempro.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="jurusan">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ Auth::user()->name }}" readonly>
                    <br>
                    <label for="judul">Judul</label>
                    <textarea class="summernote-simple" name="judul"></textarea>
                    <br>
                    <label for="dospem">Dosen Pembimbing</label>
                    <input type="text" class="form-control" name="dospem">
                    <br>
                    <label for="draft">Draft</label>
                    <input type="file" accept="application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control" name="draft"> 
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
