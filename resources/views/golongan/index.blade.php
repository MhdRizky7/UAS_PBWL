@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Golongan Index</h1>
        <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Golongan</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Detail</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ $row->gol_id }}</td>
                        <td>{{ $row->gol_kode }}</td>
                        <td>{{ $row->gol_nama }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>{{ $row->updated_at }}</td>
<td>
    <a href="{{ url('golongan/'.$row->gol_id) }}" class="btn btn-sm btn-info">View</a>
</td>

 <td>
                            <a href="#" class="btn btn-sm btn-warning edit-btn" data-bs-toggle="modal" data-bs-target="#editGolonganModal{{ $row->gol_id }}"
                               data-id="{{ $row->gol_id }}" data-kode="{{ $row->gol_kode }}" data-nama="{{ $row->gol_nama }}">Edit</a>
                        </td>


                        <td>
                            <form action="{{ url('golongan/'.$row->gol_id) }}" method="POST" style="display:inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Create Golongan Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createModalLabel">Create Golongan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/golongan') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="gol_kode">Kode</label>
                                <input type="text" name="gol_kode" class="form-control @error('gol_kode') is-invalid @enderror" value="{{ old('gol_kode') }}" required>
                                @error('gol_kode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gol_nama">Nama</label>
                                <input type="text" name="gol_nama" class="form-control @error('gol_nama') is-invalid @enderror" value="{{ old('gol_nama') }}" required>
                                @error('gol_nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Create Golongan Modal -->
      
        <!-- Edit Golongan Modal -->
        @foreach ($rows as $row)
            <div class="modal fade" id="editGolonganModal{{ $row->gol_id }}" tabindex="-1" aria-labelledby="editGolonganModalLabel{{ $row->gol_id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editGolonganModalLabel{{ $row->gol_id }}">Edit Golongan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for editing Golongan -->
                            <form action="{{ url('/golongan/'. $row->gol_id) }}" method="POST">
                                @method('PATCH')
                                @csrf

                                <div class="mb-3">
                                    <label for="edit_gol_kode" class="form-label">Kode Golongan</label>
                                    <input type="text" class="form-control" id="edit_gol_kode" name="gol_kode" value="{{ $row->gol_kode }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="edit_gol_nama" class="form-label">Nama Golongan</label>
                                    <input type="text" class="form-control" id="edit_gol_nama" name="gol_nama" value="{{ $row->gol_nama }}" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            <!-- End Form for editing Golongan -->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- End Edit Golongan Modal -->
    </div>

    <script>
        // Script untuk menampilkan data pada modal edit
        document.addEventListener('DOMContentLoaded', function () {
            $('.edit-btn').on('click', function () {
                var gol_id = $(this).data('id');
                var gol_kode = $(this).data('kode');
                var gol_nama = $(this).data('nama');

                // Menetapkan nilai ke dalam elemen input pada modal
                $('#edit_gol_id').val(gol_id);
                $('#edit_gol_kode').val(gol_kode);
                $('#edit_gol_nama').val(gol_nama);
            });
        });
    </script>
@endsection