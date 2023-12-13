<!-- resources/views/golongan/detail.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Golongan</h1>

        <p><strong>ID:</strong> {{ $row->gol_id }}</p>
        <p><strong>Kode:</strong> {{ $row->gol_kode }}</p>
        <p><strong>Nama:</strong> {{ $row->gol_nama }}</p>

        <!-- Tambahkan tombol untuk kembali ke halaman sebelumnya -->
        <a href="{{ url('/golongan') }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
