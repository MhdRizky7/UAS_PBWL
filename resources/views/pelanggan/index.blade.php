@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pelanggan Index</h1>
        <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createPelangganModal">Tambah Pelanggan</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode</th>
                    <th>Golongan</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>KTP</th>
                    <th>Kode Pesanan</th>
                    <th>Status</th>
                     <th>Detail</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ $row->pel_id }}</td>
                        <td>{{ $row->pel_no }}</td>
                        <td>{{ $row->golongan->gol_nama }}</td>
                        <td>{{ $row->pel_nama }}</td>
                        <td>{{ $row->pel_alamat }}</td>
                        <td>{{ $row->pel_hp }}</td>
                        <td>{{ $row->pel_ktp }}</td>
                        <td>{{ $row->pel_seri }}</td>
                        <td>{{ $row->pel_aktif }}</td>
<td>
    <a href="{{ url('pelanggan/'.$row->pel_id) }}" class="btn btn-sm btn-info">View</a>
</td>
 <td>
                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPelangganModal{{ $row->pel_id }}">Edit</a>
                        </td>
                        <td>
                            <form action="{{ url('pelanggan/'.$row->pel_id) }}" method="POST" style="display:inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
 <!-- Create Pelanggan Modal -->
    <div class="modal fade" id="createPelangganModal" tabindex="-1" aria-labelledby="createPelangganModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPelangganModalLabel">Tambah Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/pelanggan') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pel_id_user" value="{{ Auth::user()->id }}">
                        <div class="mb-3">
                            <label for="pel_no" class="form-label">Nomor Pelanggan</label>
                            <input type="text" class="form-control" id="pel_no" name="pel_no" required>
                        </div>

                        <div class="mb-3">
                            <label for="pel_id_gol" class="form-label">Golongan</label>
                            <select name="pel_id_gol" id="pel_id_gol" class="form-select">
                                @foreach ($gol as $gl)
                                    <option value="{{ $gl->gol_id }}">{{ $gl->gol_nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="pel_nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="pel_nama" name="pel_nama" required>
                        </div>

                        <div class="mb-3">
                <label for="pel_alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="pel_alamat" name="pel_alamat" required>
            </div>

            <div class="mb-3">
                <label for="pel_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="pel_hp" name="pel_hp" required>
            </div>

            <div class="mb-3">
                <label for="pel_ktp" class="form-label">KTP</label>
                <input type="text" class="form-control" id="pel_ktp" name="pel_ktp" required>
            </div>

            <div class="mb-3">
                <label for="pel_seri" class="form-label">Kode Pesanan</label>
                <input type="text" class="form-control" id="pel_seri" name="pel_seri" required>
            </div>


<div class="mb-3">
    <label for="pel_aktif" class="form-label">Status</label>
    <input type="text" class="form-control" id="pel_aktif" name="pel_aktif" value="Aktif" required>
</div>


                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Create Pelanggan Modal -->

            <!-- Edit Pelanggan Modals -->
        @foreach ($rows as $row)
            <div class="modal fade" id="editPelangganModal{{ $row->pel_id }}" tabindex="-1" aria-labelledby="editPelangganModalLabel{{ $row->pel_id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editPelangganModalLabel{{ $row->pel_id }}">Edit Pelanggan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('pelanggan/'.$row->pel_id) }}" method="POST">
                                @method('PATCH')
                                @csrf

                                <div class="mb-3">
                                    <label for="edit_pel_no" class="form-label">Nomor Pelanggan</label>
                                    <input type="text" class="form-control" id="edit_pel_no" name="pel_no" value="{{ $row->pel_no }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="edit_pel_id_gol" class="form-label">Golongan</label>
                                    <select name="pel_id_gol" id="edit_pel_id_gol" class="form-control">
                                        @foreach ($gol as $gl)
                                            <option value="{{ $gl->gol_id }}" {{ $gl->gol_id == $row->pel_id_gol ? 'selected' : '' }}>{{ $gl->gol_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                 <div class="mb-3">
                <label for="pel_nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="pel_nama" name="pel_nama" value="{{ $row->pel_nama }}" required>
            </div>

            <div class="mb-3">
                <label for="pel_alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="pel_alamat" name="pel_alamat" value="{{ $row->pel_alamat }}" required>
            </div>

            <div class="mb-3">
                <label for="pel_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="pel_hp" name="pel_hp" value="{{ $row->pel_hp }}" required>
            </div>

            <div class="mb-3">
                <label for="pel_ktp" class="form-label">KTP</label>
                <input type="text" class="form-control" id="pel_ktp" name="pel_ktp" value="{{ $row->pel_ktp }}" required>
            </div>

            <div class="mb-3">
                <label for="pel_seri" class="form-label">Kode Pesanan</label>
                <input type="text" class="form-control" id="pel_seri" name="pel_seri" value="{{ $row->pel_seri }}" required>
            </div>

 <div class="mb-3">
    <label for="edit_pel_aktif" class="form-label">Status</label>
    <input type="text" class="form-control" id="edit_pel_aktif" name="pel_aktif" value="{{ $row->pel_aktif }}" required>
</div>


                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- End Edit Pelanggan Modals -->
    </div>
@endsection
