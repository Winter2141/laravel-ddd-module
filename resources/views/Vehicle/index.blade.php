@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Vehicles</h1>
        <a href="{{ route('vehicle.create') }}" class="btn btn-primary">Create Vehicle</a>
        <table class="table mt-3">
            <thead>
            <tr>
                <th>Name</th>
                <th>Manufacturer</th>
                <th>Year</th>
                <th>Parts</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->name }}</td>
                    <td>{{ $vehicle->manufacturer }}</td>
                    <td>{{ $vehicle->year }}</td>
                    <td>
                        @foreach ($vehicle->parts as $part)
                            {{ $part->name }}<br>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('vehicle.edit', $vehicle->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('vehicle.destroy', $vehicle->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No vehicles found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
