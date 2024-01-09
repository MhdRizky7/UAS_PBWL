@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Produk</h1>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">ID: {{ $row->produk_id }}</h5>
            <p class="card-text">Nama: {{ $row->produk_nama }}</p>
            <p class="card-text">Kategori: {{ $row->kategori_produk }}</p>
            <p class="card-text">Deskripsi: {{ $row->produk_deskripsi }}</p>
            <p class="card-text">Harga: {{ $row->produk_harga }}</p>
            <p class="card-text">Stok: {{ $row->produk_stok }}</p>
            <!-- Anda bisa menambahkan detail lainnya sesuai kebutuhan -->
        </div>
    </div>

    <a href="{{ url('/produk') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
