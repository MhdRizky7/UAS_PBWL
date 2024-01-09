@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Produk</h1>
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
            <input type="number" name="produk_harga" id="produk_harga" class="form-control @error('produk_harga') is-invalid @enderror" value="{{ old('produk_harga') }}" required>
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
@endsection
