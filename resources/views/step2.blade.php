@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Stap 2: Vul de autogegevens in</h1>
        <form action="{{ route('step2') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <p>Kenteken: {{ $license_plate }}</p>
                <input type="hidden" name="license_plate" value="{{ $license_plate }}">
            </div>
            <div class="form-group">
                <label for="brand">Merk:</label>
                <input type="text" id="brand" name="brand" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" id="model" name="model" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Prijs:</label>
                <input type="number" id="price" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mileage">Kilometerstand:</label>
                <input type="number" id="mileage" name="mileage" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="seats">Zitplaatsen:</label>
                <input type="number" id="seats" name="seats" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="doors">Deuren:</label>
                <input type="number" id="doors" name="doors" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="production_year">Productie jaar:</label>
                <input type="number" id="production_year" name="production_year" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="weight">Gewicht:</label>
                <input type="number" id="weight" name="weight" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="color">Kleur:</label>
                <input type="text" id="color" name="color" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Afbeelding:</label>
                <input type="file" id="image" name="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
@endsection
