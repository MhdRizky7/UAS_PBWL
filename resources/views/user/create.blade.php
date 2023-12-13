@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah User</h1>

        <form action="{{ url('/user') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
