@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Produk Index</h1>
    <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createProdukModal">Tambah Produk</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Merek</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Pelanggan</th>
                <th>Detail</th>
                 <th>Edit</th>
                  <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
            <tr>
                <td>{{ $row->produk_id }}</td>
                <td>{{ $row->produk_nama }}</td>
                <td>{{ $row->kategori_produk }}</td>
                <td>{{ $row->produk_deskripsi }}</td>
                <td>{{ $row->produk_harga }}</td>
                <td>{{ $row->produk_stok }}</td>
               <td>{{ optional($row->pelanggan)->pel_nama }}</td>
<td>
    <a href="{{ url('/produk/'.$row->produk_id) }}" class="btn btn-sm btn-info">View</a>
</td>

<td>
    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editProdukModal{{ $row->produk_id }}">Edit</a>
</td>

                <td>

                    <form action="{{ url('produk/'.$row->produk_id) }}" method="POST" style="display:inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Create Produk Modal -->
    <div class="modal fade" id="createProdukModal" tabindex="-1" aria-labelledby="createProdukModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createProdukModalLabel">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/produk') }}" method="POST">
                        @csrf

                        <!-- Dropdown untuk memilih pelanggan -->
                        <div class="mb-3">
                            <label for="produk_pelanggan_id" class="form-label">Pilih Pelanggan</label>
                            <select name="produk_pelanggan_id" id="produk_pelanggan_id" class="form-control @error('produk_pelanggan_id') is-invalid @enderror" required>
                                <option value="" disabled selected>Pilih Pelanggan</option>
                                @foreach ($pelanggans as $pl)
                                    <option value="{{ $pl->pel_id }}" {{ old('produk_pelanggan_id') == $pl->pel_id ? 'selected' : '' }}>{{ $pl->pel_nama }}</option>
                                @endforeach
                            </select>
                            @error('produk_pelanggan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input untuk nama produk -->
                        <div class="form-group">
                            <label for="produk_nama">Nama Produk:</label>
                            <input type="text" name="produk_nama" id="produk_nama" class="form-control @error('produk_nama') is-invalid @enderror" value="{{ old('produk_nama') }}" required>
                            @error('produk_nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
    <label for="kategori_produk">Kategori Produk:</label>
    <input type="text" name="kategori_produk" id="kategori_produk" class="form-control @error('kategori_produk') is-invalid @enderror" value="{{ old('kategori_produk') }}" required>
    @error('kategori')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


                        <!-- Input untuk deskripsi produk -->
                        <div class="form-group">
                            <label for="produk_deskripsi">Deskripsi Produk:</label>
                            <textarea name="produk_deskripsi" id="produk_deskripsi" class="form-control @error('produk_deskripsi') is-invalid @enderror">{{ old('produk_deskripsi') }}</textarea>
                            @error('produk_deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input untuk harga produk -->
<div class="form-group">
    <label for="produk_harga">Harga Produk:</label>
    <input type="text" name="produk_harga" id="produk_harga" class="form-control @error('produk_harga') is-invalid @enderror" value="{{ old('produk_harga') }}" required>
    @error('produk_harga')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


                        <!-- Input untuk stok produk -->
                        <div class="form-group">
                            <label for="produk_stok">Stok Produk:</label>
                            <input type="number" name="produk_stok" id="produk_stok" class="form-control @error('produk_stok') is-invalid @enderror" value="{{ old('produk_stok') }}" required>
                            @error('produk_stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Create Produk Modal -->

<!-- Edit Produk Modals -->
@foreach ($rows as $row)
    <div class="modal fade" id="editProdukModal{{ $row->produk_id }}" tabindex="-1" aria-labelledby="editProdukModalLabel{{ $row->produk_id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProdukModalLabel{{ $row->produk_id }}">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('produk/'.$row->produk_id) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <!-- Dropdown untuk memilih pelanggan -->
                        <div class="mb-3">
                            <label for="edit_produk_pelanggan_id" class="form-label">Pilih Pelanggan</label>
                            <select name="produk_pelanggan_id" id="edit_produk_pelanggan_id" class="form-control @error('produk_pelanggan_id') is-invalid @enderror" required>
                                <option value="" disabled>Pilih Pelanggan</option>
                                @foreach ($pelanggans as $pl)
                                    <option value="{{ $pl->pel_id }}" {{ $row->produk_pelanggan_id == $pl->pel_id ? 'selected' : '' }}>{{ $pl->pel_nama }}</option>
                                @endforeach
                            </select>
                            @error('produk_pelanggan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input untuk nama produk -->
                        <div class="form-group">
                            <label for="edit_produk_nama">Nama Produk:</label>
                            <input type="text" name="produk_nama" id="edit_produk_nama" class="form-control @error('produk_nama') is-invalid @enderror" value="{{ $row->produk_nama }}" required>
                            @error('produk_nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
    <label for="edit_produk_kategori">Kategori Produk:</label>
    <input type="text" name="kategori_produk" id="edit_produk_kategori" class="form-control @error('kategori_produk') is-invalid @enderror" value="{{ $row->kategori_produk }}" required>
    @error('kategori')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


                        <!-- Input untuk deskripsi produk -->
                        <div class="form-group">
                            <label for="edit_produk_deskripsi">Deskripsi Produk:</label>
                            <textarea name="produk_deskripsi" id="edit_produk_deskripsi" class="form-control @error('produk_deskripsi') is-invalid @enderror">{{ $row->produk_deskripsi }}</textarea>
                            @error('produk_deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input untuk harga produk -->
                        <div class="form-group">
                            <label for="edit_produk_harga">Harga Produk:</label>
                            <input type="text" name="produk_harga" id="edit_produk_harga" class="form-control @error('produk_harga') is-invalid @enderror" value="{{ $row->produk_harga }}" required>
                            @error('produk_harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input untuk stok produk -->
                        <div class="form-group">
                            <label for="edit_produk_stok">Stok Produk:</label>
                            <input type="number" name="produk_stok" id="edit_produk_stok" class="form-control @error('produk_stok') is-invalid @enderror" value="{{ $row->produk_stok }}" required>
                            @error('produk_stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- End Edit Produk Modals -->


</div>
@endsection
