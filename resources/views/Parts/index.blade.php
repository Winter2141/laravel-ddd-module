@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Parts
                        <a href="{{ route('parts.create') }}" class="btn btn-primary btn-sm float-right">Add Part</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Vehicle</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($parts as $part)
                                <tr>
                                    <td>{{ $part->name }}</td>
                                    <td>{{ $part->description }}</td>
                                    <td>{{ $part->vehicle->name }}</td>
                                    <td>
                                        <a href="{{ route('parts.edit', $part) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('parts.destroy', $part) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this part?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No parts found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $parts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
