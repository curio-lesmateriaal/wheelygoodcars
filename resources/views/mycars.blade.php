@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mijn Auto's</h1>
        <div class="row">
            @if (!is_null($cars) && !$cars->isEmpty())
                @foreach ($cars as $car)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top"
                                alt="{{ $car->brand }} {{ $car->model }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $car->brand }} - {{ $car->model }}</h5>
                                <p class="card-text">Kenteken: {{ $car->license_plate }}</p>
                                @if ($car->sold_at)
                                    <p class="card-text">Status: Verkocht</p>
                                @else
                                    <p class="card-text">Prijs: €{{ $car->price }}</p>
                                @endif
                                <p class="card-text">Views: {{ $car->views }}</p>
                                <!-- Voeg hier andere informatie toe zoals gewenst -->
                                <a href="{{ route('cars.edit', $car) }}" class="btn btn-primary">Bewerken</a>
                                <form action="{{ route('cars.destroy', $car) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Weet je zeker dat je deze auto wilt verwijderen?')">Verwijderen</button>
                                </form>
                                <a href="{{ route('cars.pdf', $car) }}" class="btn btn-success">PDF</a>
                                <!-- PDF-knop toegevoegd -->
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Je hebt nog geen auto's toegevoegd.</p>
            @endif
        </div>
    </div>
@endsection
