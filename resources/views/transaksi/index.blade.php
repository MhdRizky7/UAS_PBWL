@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Transaksi Index</h1>
    <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createTransaksiModal">Tambah Transaksi</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pelanggan</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
                <th>Status Pembayaran</th>
                <th>Detail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
            <tr>
                <td>{{ $row->transaksi_id }}</td>
                <td>{{ optional($row->pelanggan)->pel_nama }}</td>
                <td>{{ optional($row->produk)->produk_nama }}</td>
                <td>{{ $row->transaksi_jumlah }}</td>
                <td>{{ $row->transaksi_total_harga }}</td>
                <td>{{ $row->transaksi_tanggal }}</td>
                    <td>{{ $row->status_pembayaran }}</td>
                <td>
                    <a href="{{ url('/transaksi/'.$row->transaksi_id) }}" class="btn btn-sm btn-info">View</a>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editTransaksiModal{{ $row->transaksi_id }}">Edit</a>
                </td>
                <td>
                    <form action="{{ url('transaksi/'.$row->transaksi_id) }}" method="POST" style="display:inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Create Transaksi Modal -->
    <div class="modal fade" id="createTransaksiModal" tabindex="-1" aria-labelledby="createTransaksiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTransaksiModalLabel">Tambah Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/transaksi') }}" method="POST">
                        @csrf

                        <!-- Dropdown untuk memilih pelanggan -->
                        <div class="mb-3">
                            <label for="transaksi_pelanggan_id" class="form-label">Pilih Pelanggan</label>
                            <select name="transaksi_pelanggan_id" id="transaksi_pelanggan_id" class="form-control @error('transaksi_pelanggan_id') is-invalid @enderror" required>
                                <option value="" disabled selected>Pilih Pelanggan</option>
                                @foreach ($pelanggans as $pl)
                                    <option value="{{ $pl->pel_id }}">{{ $pl->pel_nama }}</option>
                                @endforeach
                            </select>
                            @error('transaksi_pelanggan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Dropdown untuk memilih produk -->
                        <div class="mb-3">
                            <label for="transaksi_produk_id" class="form-label">Pilih Produk</label>
                            <select name="transaksi_produk_id" id="transaksi_produk_id" class="form-control @error('transaksi_produk_id') is-invalid @enderror" required>
                                <option value="" disabled selected>Pilih Produk</option>
                                @foreach ($produks as $pr)
                                    <option value="{{ $pr->produk_id }}">{{ $pr->produk_nama }}</option>
                                @endforeach
                            </select>
                            @error('transaksi_produk_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input untuk jumlah transaksi -->
                        <div class="form-group">
                            <label for="transaksi_jumlah">Jumlah Transaksi:</label>
                            <input type="number" name="transaksi_jumlah" id="transaksi_jumlah" class="form-control @error('transaksi_jumlah') is-invalid @enderror" required>
                            @error('transaksi_jumlah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input untuk total harga transaksi -->
                        <div class="form-group">
                            <label for="transaksi_total_harga">Total Harga Transaksi:</label>
                            <input type="text" name="transaksi_total_harga" id="transaksi_total_harga" class="form-control @error('transaksi_total_harga') is-invalid @enderror" required>
                            @error('transaksi_total_harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Input untuk tanggal transaksi -->
    <div class="form-group">
        <label for="transaksi_tanggal">Tanggal Transaksi:</label>
        <input type="date" name="transaksi_tanggal" id="transaksi_tanggal" class="form-control @error('transaksi_tanggal') is-invalid @enderror" required>
        @error('transaksi_tanggal')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <!-- Input untuk status pembayaran -->
<div class="mb-3">
    <label for="transaksi_status_pembayaran" class="form-label">Status Pembayaran:</label>
    <select name="status_pembayaran" id="transaksi_status_pembayaran" class="form-control @error('status_pembayaran') is-invalid @enderror" required>
        <option value="" disabled selected>Pilih Status</option>
        <option value="Lunas">Lunas</option>
        <option value="Belum Lunas">Belum Lunas</option>
    </select>
    @error('status_pembayaran')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Create Transaksi Modal -->

 <!-- Edit Transaksi Modals -->
@foreach ($rows as $row)
<div class="modal fade" id="editTransaksiModal{{ $row->transaksi_id }}" tabindex="-1" aria-labelledby="editTransaksiModalLabel{{ $row->transaksi_id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTransaksiModalLabel{{ $row->transaksi_id }}">Edit Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form action="{{ url('/transaksi/'.$row->transaksi_id) }}" method="POST">
                    @method('PUT') 
                    @csrf

                        <!-- Dropdown untuk memilih pelanggan -->
                    <div class="mb-3">
                        <label for="edit_transaksi_pelanggan_id" class="form-label">Pilih Pelanggan</label>
                        <select name="transaksi_pelanggan_id" id="edit_transaksi_pelanggan_id" class="form-control @error('transaksi_pelanggan_id') is-invalid @enderror" required>
                            @foreach ($pelanggans as $pl)
                                <option value="{{ $pl->pel_id }}" {{ $row->transaksi_pelanggan_id == $pl->pel_id ? 'selected' : '' }}>{{ $pl->pel_nama }}</option>
                            @endforeach
                        </select>
                        @error('transaksi_pelanggan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Dropdown untuk memilih produk -->
                    <div class="mb-3">
                        <label for="edit_transaksi_produk_id" class="form-label">Pilih Produk</label>
                        <select name="transaksi_produk_id" id="edit_transaksi_produk_id" class="form-control @error('transaksi_produk_id') is-invalid @enderror" required>
                            @foreach ($produks as $pr)
                                <option value="{{ $pr->produk_id }}" {{ $row->transaksi_produk_id == $pr->produk_id ? 'selected' : '' }}>{{ $pr->produk_nama }}</option>
                            @endforeach
                        </select>
                        @error('transaksi_produk_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input untuk jumlah transaksi -->
                    <div class="form-group">
                        <label for="edit_transaksi_jumlah">Jumlah Transaksi:</label>
                        <input type="number" name="transaksi_jumlah" id="edit_transaksi_jumlah" class="form-control @error('transaksi_jumlah') is-invalid @enderror" value="{{ $row->transaksi_jumlah }}" required>
                        @error('transaksi_jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input untuk total harga transaksi -->
                    <div class="form-group">
                        <label for="edit_transaksi_total_harga">Total Harga Transaksi:</label>
                        <input type="text" name="transaksi_total_harga" id="edit_transaksi_total_harga" class="form-control @error('transaksi_total_harga') is-invalid @enderror" value="{{ $row->transaksi_total_harga }}" required>
                        @error('transaksi_total_harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input untuk tanggal transaksi -->
                    <div class="form-group">
                        <label for="edit_transaksi_tanggal">Tanggal Transaksi:</label>
                        <input type="date" name="transaksi_tanggal" id="edit_transaksi_tanggal" class="form-control @error('transaksi_tanggal') is-invalid @enderror" value="{{ $row->transaksi_tanggal }}" required>
                        @error('transaksi_tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input untuk status pembayaran -->
<div class="mb-3">
    <label for="edit_transaksi_status_pembayaran" class="form-label">Status Pembayaran:</label>
    <select name="status_pembayaran" id="edit_transaksi_status_pembayaran" class="form-control @error('status_pembayaran') is-invalid @enderror" required>
        <option value="" disabled>Pilih Status</option>
        <option value="Lunas" {{ $row->status_pembayaran == "Lunas" ? 'selected' : '' }}>Lunas</option>
        <option value="Belum Lunas" {{ $row->status_pembayaran == "Belum Lunas" ? 'selected' : '' }}>Belum Lunas</option>
        <!-- Tambahkan opsi lainnya sesuai kebutuhan Anda -->
    </select>
    @error('status_pembayaran')
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
<!-- End Edit Transaksi Modals -->
</div>
@endsection
