@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Auto bewerken</h1>
        <form action="{{ route('cars.update', $car) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="license_plate">Kenteken:</label>
                <input type="text" id="license_plate" name="license_plate" class="form-control"
                    value="{{ $car->license_plate }}" readonly>
            </div>
            <div class="form-group">
                <label for="brand">Merk:</label>
                <input type="text" id="brand" name="brand" class="form-control" value="{{ $car->brand }}"
                    required>
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" id="model" name="model" class="form-control" value="{{ $car->model }}"
                    required>
            </div>
            <div class="form-group">
                <label for="price">Prijs:</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ $car->price }}"
                    required>
            </div>
            <div class="form-group">
                <label for="mileage">Kilometerstand:</label>
                <input type="number" id="mileage" name="mileage" class="form-control" value="{{ $car->mileage }}"
                    required>
            </div>
            <div class="form-group">
                <label for="seats">Zitplaatsen:</label>
                <input type="number" id="seats" name="seats" class="form-control" value="{{ $car->seats }}"
                    required>
            </div>
            <div class="form-group">
                <label for="doors">Deuren:</label>
                <input type="number" id="doors" name="doors" class="form-control" value="{{ $car->doors }}"
                    required>
            </div>
            <div class="form-group">
                <label for="production_year">Productie jaar:</label>
                <input type="number" id="production_year" name="production_year" class="form-control"
                    value="{{ $car->production_year }}" required>
            </div>
            <div class="form-group">
                <label for="weight">Gewicht:</label>
                <input type="number" id="weight" name="weight" class="form-control" value="{{ $car->weight }}"
                    required>
            </div>
            <div class="form-group">
                <label for="color">Kleur:</label>
                <input type="text" id="color" name="color" class="form-control" value="{{ $car->color }}"
                    required>
            </div>
            <div class="form-group">
                <label for="image">Afbeelding:</label>
                <input type="file" id="image" name="image" class="form-control">
                @if ($car->image)
                    <img src="{{ asset('storage/' . $car->image) }}" alt="Afbeelding van {{ $car->brand }}"
                        width="100">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
@endsection
