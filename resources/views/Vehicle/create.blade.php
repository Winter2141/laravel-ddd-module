@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Vehicle</h1>
        <form action="{{ route('vehicle.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="manufacturer">Manufacturer</label>
                <input type="text" class="form-control @error('manufacturer') is-invalid @enderror" id="manufacturer" name="manufacturer" value="{{ old('manufacturer') }}">
                @error('manufacturer')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year') }}">
                @error('year')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <h3>Parts</h3>
            <div id="parts-container">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" name="parts[0][name]" placeholder="Part Name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="parts[0][description]" placeholder="Part Description">
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary mt-3" onclick="addPartField()">Add Part</button>
            <button type="submit" class="btn btn-success mt-3">Create</button>
        </form>
    </div>

    <script>
        let partsCount = 1;

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
