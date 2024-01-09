@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Pelanggan</h1>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $row->pel_id }}</h5>
                <p class="card-text">Nomor Pelanggan: {{ $row->pel_no }}</p>
                <p class="card-text">Golongan: {{ $row->golongan->gol_nama }}</p>
                <p class="card-text">Nama: {{ $row->pel_nama }}</p>
                <p class="card-text">Alamat: {{ $row->pel_alamat }}</p>
                <p class="card-text">No HP: {{ $row->pel_hp }}</p>
                <p class="card-text">KTP: {{ $row->pel_ktp }}</p>
                <p class="card-text">Kode Pesanan: {{ $row->pel_seri }}</p>
                <p class="card-text">Status: {{ $row->pel_aktif }}</p>
            </div>
        </div>

        <a href="{{ url('/pelanggan') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>
@endsection
