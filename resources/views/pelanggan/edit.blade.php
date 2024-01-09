@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Pelanggan</h1>

<form action="{{ url('/pelanggan/' . $row->pel_id) }}" method="POST">
    @csrf
    @method('PATCH')
            <input type="hidden" name="pel_id_user" value="{{ Auth::user()->id }}">

            <div class="mb-3">
                <label for="pel_no" class="form-label">Nomor Pelanggan</label>
                <input type="text" class="form-control" id="pel_no" name="pel_no" value="{{ $row->pel_no }}" required>
            </div>

            <div class="mb-3">
                <label for="pel_id_gol" class="form-label">Golongan</label>
                <select name="pel_id_gol" id="pel_id_gol" class="form-control">
                    @foreach ($golongans as $golongan)
                        <option value="{{ $golongan->gol_id }}" {{ $golongan->gol_id == $row->pel_id_gol ? 'selected' : '' }}>
                            {{ $golongan->gol_nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="pel_nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="pel_nama" name="pel_nama" value="{{ $row->pel_nama }}" required>
            </div>

            <div class="mb-3">
                <label for="pel_alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="pel_alamat" name="pel_alamat" value="{{ $row->pel_alamat }}" required>
            </div>

            <div class="mb-3">
                <label for="pel_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="pel_hp" name="pel_hp" value="{{ $row->pel_hp }}" required>
            </div>

            <div class="mb-3">
                <label for="pel_ktp" class="form-label">KTP</label>
                <input type="text" class="form-control" id="pel_ktp" name="pel_ktp" value="{{ $row->pel_ktp }}" required>
            </div>

            <div class="mb-3">
                <label for="pel_seri" class="form-label">Seri</label>
                <input type="text" class="form-control" id="pel_seri" name="pel_seri" value="{{ $row->pel_seri }}" required>
            </div>


            <div class="mb-3">
                <label for="pel_aktif" class="form-label">Status</label>
                <select name="pel_aktif" id="pel_aktif" class="form-control">
                    <option value="Y" {{ $row->pel_aktif == 'Y' ? 'selected' : '' }}>Aktif</option>
                    <option value="N" {{ $row->pel_aktif == 'N' ? 'selected' : '' }}>NonAktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
