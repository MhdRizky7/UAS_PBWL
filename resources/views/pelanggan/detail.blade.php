@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Pelanggan</h1>

        <p><strong>ID:</strong> {{ $row->pel_id }}</p>
        <p><strong>Nomor Pelanggan:</strong> {{ $row->pel_no }}</p>
        <p><strong>Golongan:</strong> {{ $row->golongan->gol_nama }}</p>
        <p><strong>Nama:</strong> {{ $row->pel_nama }}</p>
        <p><strong>Alamat:</strong> {{ $row->pel_alamat }}</p>
        <p><strong>No HP:</strong> {{ $row->pel_hp }}</p>
        <p><strong>KTP:</strong> {{ $row->pel_ktp }}</p>
        <p><strong>Seri:</strong> {{ $row->pel_seri }}</p>
        <p><strong>Meteran:</strong> {{ $row->pel_meteran }}</p>
        <p><strong>Status:</strong> {{ $row->pel_aktif }}</p>
        <p><strong>ID User:</strong> {{ $row->pel_id_user }}</p>

        <a href="{{ url('/pelanggan') }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
