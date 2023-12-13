<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit User</h1>

        <form action="{{ url('user/'.$user->id) }}" method="POST">
            @method('PATCH') {{-- Use PATCH for updating --}}
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>

            {{-- Add other fields as needed --}}

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
