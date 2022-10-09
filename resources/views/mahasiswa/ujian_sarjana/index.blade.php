@extends('layouts.app')
@section('title', 'Ujian Naskah')
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
                <table class="table table-hover" id="myTable">
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
                        {{-- @foreach ($sempro as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{!! $item->judul !!}</td>
                            <td>{{ $item->dosen->nama }}</td>
                            <td>{{ $item->draft }}</td>
                            <td>
                                @if ($item->status == 'menunggu')
                                    <span class="badge badge-info">{{ strtoupper($item->status) }}</span>
                                @elseif ($item->status == 'disetuji')
                                    <span class="badge badge-success">{{ strtoupper($item->status) }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endpush
