@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Transaksi</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID Transaksi: {{ $transaksi->transaksi_id }}</h5>
            <p class="card-text">Tanggal Transaksi: {{ $transaksi->transaksi_tanggal }}</p>
            <p class="card-text">Pelanggan: {{ $transaksi->pelanggan->pel_nama }}</p>
            <p class="card-text">Produk: {{ $transaksi->produk->produk_nama }}</p>
            <p class="card-text">Jumlah Transaksi: {{ $transaksi->transaksi_jumlah }}</p>
            <p class="card-text">Total Harga Transaksi: {{ $transaksi->transaksi_total_harga }}</p>
              <p class="card-text">Status Pembayaran: {{ $transaksi->status_pembayaran }}</p>
        </div>
    </div>

    <a href="{{ url('/transaksi') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
