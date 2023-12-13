@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Index</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>{{ $row->updated_at }}</td>
                        <td>
                            <a href="{{ url('user/'.$row->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{ url('user/'.$row->id) }}" method="POST" style="display:inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
