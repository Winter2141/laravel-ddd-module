@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Vehicle</h1>
        <form action="{{ route('vehicle.update', $vehicle->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $vehicle->name) }}">
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="manufacturer">Manufacturer</label>
                <input type="text" class="form-control @error('manufacturer') is-invalid @enderror" id="manufacturer" name="manufacturer" value="{{ old('manufacturer', $vehicle->manufacturer) }}">
                @error('manufacturer')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year', $vehicle->year) }}">
                @error('year')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <h3>Parts</h3>
            <div id="parts-container">
                @foreach ($vehicle->parts as $index => $part)
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="parts[{{ $index }}][name]" value="{{ old('parts.' . $index . '.name', $part->name) }}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="parts[{{ $index }}][description]" value="{{ old('parts.' . $index . '.description', $part->description) }}">
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-primary mt-3" onclick="addPartField()">Add Part</button>
            <button type="submit" class="btn btn-success mt-3">Update</button>
        </form>
    </div>

    <script>
        let partsCount = {{ count($vehicle->parts) }};

        function addPartField() {
            const partsContainer = document.getElementById('parts-container');

            const formRow = document.createElement('div');
            formRow.classList.add('form-row');

            const col1 = document.createElement('div');
            col1.classList.add('col');

            const col2 = document.createElement('div');
            col2.classList.add('col');

            const partNameInput = document.createElement('input');
            partNameInput.setAttribute('type', 'text');
            partNameInput.classList.add('form-control');
            partNameInput.setAttribute('name', `parts[${partsCount}][name]`);
            partNameInput.setAttribute('placeholder', 'Part Name');

            const partDescInput = document.createElement('input');
            partDescInput.setAttribute('type', 'text');
            partDescInput.classList.add('form-control');
            partDescInput.setAttribute('name', `parts[${partsCount}][description]`);
            partDescInput.setAttribute('placeholder', 'Part Description');

            col1.appendChild(partNameInput);
            col2.appendChild(partDescInput);

            formRow.appendChild(col1);
            formRow.appendChild(col2);

            partsContainer.appendChild(formRow);

            partsCount++;
        }
    </script>
@endsection
