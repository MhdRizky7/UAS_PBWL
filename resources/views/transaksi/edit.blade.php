@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Golongan</h1>

        <form action="{{ url('/golongan/'. $row->gol_id) }}" method="POST">
            @method('PATCH')
            @csrf

            <div class="mb-3">
                <label for="gol_kode" class="form-label">Kode Golongan</label>
                <input type="text" class="form-control" id="gol_kode" name="gol_kode" value="{{ $row->gol_kode }}" required>
            </div>

            <div class="mb-3">
                <label for="gol_nama" class="form-label">Nama Golongan</label>
                <input type="text" class="form-control" id="gol_nama" name="gol_nama" value="{{ $row->gol_nama }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
