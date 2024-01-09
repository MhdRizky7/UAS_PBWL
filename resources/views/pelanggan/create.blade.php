@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Create Pelanggan</h1>

        <form action="{{ url('/pelanggan') }}" method="POST">
            @csrf
            <input type="hidden" name="pel_id_user" value="{{ Auth::user()->id }}">
            <div class="mb-3">
                <label for="pel_no" class="form-label">Nomor Pelanggan</label>
                <input type="text" class="form-control" id="pel_no" name="pel_no" required>
            </div>

            <div class="mb-3">
                <label for="pel_id_gol" class="form-label">Golongan</label>
                <select name="pel_id_gol" id="pel_id_gol" class="form-control">
                    @foreach ($rows as $row)
                        <option value="{{ $row->gol_id }}">{{ $row->gol_nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="pel_nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="pel_nama" name="pel_nama" required>
            </div>


            <div class="mb-3">
                <label for="pel_alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="pel_alamat" name="pel_alamat" required>
            </div>

            <div class="mb-3">
                <label for="pel_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="pel_hp" name="pel_hp" required>
            </div>

            <div class="mb-3">
                <label for="pel_ktp" class="form-label">KTP</label>
                <input type="text" class="form-control" id="pel_ktp" name="pel_ktp" required>
            </div>

            <div class="mb-3">
                <label for="pel_seri" class="form-label">Seri</label>
                <input type="text" class="form-control" id="pel_seri" name="pel_seri" required>
            </div>


            <div class="mb-3">
                <label for="pel_aktif" class="form-label">Status</label>
                <select name="pel_aktif" id="pel_aktif" class="form-control">
                    <option value="Y">Aktif</option>
                    <option value="N">NonAktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
