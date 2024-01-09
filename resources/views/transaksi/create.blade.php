@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Golongan</h1>
        <form action="{{ url('/golongan') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="gol_kode">Kode</label>
                <input type="text" name="gol_kode" class="form-control @error('gol_kode') is-invalid @enderror" value="{{ old('gol_kode') }}" required>
                @error('gol_kode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="gol_nama">Nama</label>
                <input type="text" name="gol_nama" class="form-control @error('gol_nama') is-invalid @enderror" value="{{ old('gol_nama') }}" required>
                @error('gol_nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
