@extends('layouts.app')
@section('title', 'Jadwal')
@section('content')
<div class="section">
    <div class="section-header">
        <h1>Jadwal Ujian</h1>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus"></i> Tambah Jadwal
                </button>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Waktu Awal</th>
                            <th>Waktu Akhir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date('l, d F Y', strtotime($item->tanggal)) }}</td>
                            <td>{{ $item->waktu_awal }}</td>
                            <td>{{ $item->waktu_akhir }}</td>
                            <td>
                                <div class="form-inline">
                                    <button class="btn btn-primary editButton" data-toggle="modal" data-target="#editModal" value="{{ $item->id}}"><i class="fa fa-edit"></i> Edit</button>
                                    <form class="mx-2" action="{{ route('jadwal.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i> Delete</button>
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
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Program Studi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('jadwal.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jurusan">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal">
                    <br>
                    <label for="jurusan">Waktu Awal</label>
                    <input type="time" class="form-control" name="waktu_awal">
                    <br>
                    <label for="jurusan">Waktu Akhir</label>
                    <input type="time" class="form-control" name="waktu_akhir">
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
{{-- modal edit --}}
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Jadwal</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                <form method="post" id="editModalForm" action="{{route('prodi.store')}}">
                @csrf
                @method("PUT")
                    <div class="modal-body">
                        <label for="jurusan">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                        <br>
                        <label for="jurusan">Waktu Awal</label>
                        <input type="time" class="form-control" name="waktu_awal" id="waktu_awal">
                        <br>
                        <label for="jurusan">Waktu Akhir</label>
                        <input type="time" class="form-control" name="waktu_akhir" id="waktu_akhir">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success" />
                    </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).on("click", ".editButton", function()
        {
            let id = $(this).val();
            $.ajax({
                method: "get",
                url :  "/jadwal/"+id+"/edit",
            }).done(function(response)
            {
                $("#tanggal").val(response.tanggal);
                $("#waktu_awal").val(response.waktu_awal);
                $("#waktu_akhir").val(response.waktu_akhir);
                $("#editModalForm").attr("action", "/jadwal/" + id)
            });
        });

    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endpush
