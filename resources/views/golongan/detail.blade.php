<!-- resources/views/golongan/detail.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Golongan</h1>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $row->gol_id }}</h5>
                <p class="card-text">Kode: {{ $row->gol_kode }}</p>
                <p class="card-text">Nama: {{ $row->gol_nama }}</p>
            </div>
        </div>

        <!-- Tambahkan tombol untuk kembali ke halaman sebelumnya -->
        <a href="{{ url('/golongan') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>
@endsection
