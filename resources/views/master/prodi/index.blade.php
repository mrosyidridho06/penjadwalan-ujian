@extends('layouts.app')
@section('title', 'Program Studi')
@section('content')
<div class="section">
    <div class="section-header">
        <h1>Program Studi</h1>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i> Tambah Prodi
            </button>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Program Studi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prodi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>
                            <div class="form-inline">
                                <button class="btn btn-primary editButton" data-toggle="modal" data-target="#editModal" value="{{ $item->id}}"><i class="fa fa-edit"></i> Edit</button>
                                <form class="mx-2" action="{{ route('prodi.destroy', $item->id) }}" method="POST">
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
            <form action="{{ route('prodi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jurusan">Nama</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan">
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
                <h4 class="modal-title">Edit Program Studi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                <form method="post" id="editModalForm" action="{{route('prodi.store')}}">
                @csrf
                @method("PUT")
                <div class="modal-body">
                        <label>Nama</label>
                        <input type="text" name="jurusan" id="jurusanedit" class="form-control"/>
                        <br/>
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
                url :  "/prodi/"+id+"/edit",
            }).done(function(response)
            {
                $("#jurusanedit").val(response.jurusan);
                $("#editModalForm").attr("action", "/prodi/" + id)
            });
        });
</script>
@endpush
